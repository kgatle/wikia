<?php

class GlobalWatchlistBot {

	private $mDb;
	private $mDebugMode;
	private $mDebugMailTo = '';
	private $mUsers;
	private $mStartTime;
	private $mWatchlisters;
	private $dbExistsCheck = false;
	private $mWikiData = array();

	public function __construct($bDebugMode = false, $aUsers = array()) {
	 global $wgExtensionMessagesFiles;
	 $this->mDebugMode = $bDebugMode;
	 $this->mUsers = $aUsers;
	 $this->mDb = wfGetDB(DB_SLAVE);

		$wgExtensionMessagesFiles['GlobalWatchlist'] = dirname(__FILE__) . '/GlobalWatchlist.i18n.php';
	 wfLoadExtensionMessages('GlobalWatchlist');
	}

	public function setDbExistsCheck($value) {
		$this->dbExistsCheck = $value;
	}

	public function setDebugMailTo($value) {
		$this->mDebugMailTo = $value;
	}

	/**
	 * get all global watchlist users
	 */
	public function getGlobalWatchlisters($sFlag = 'watchlistdigest') {
		global $wgSharedDB;
		$aUsers = array();

		if(count($this->mUsers)) {
			// get only users passed by --users argument
			$sUserNames = "";
			foreach($this->mUsers as $sUserName) {
				$sUserNames.= ($sUserNames ? "," : "") . "'" . addslashes($sUserName) . "'";
			}
			$sWhereClause = "user_name IN ($sUserNames)";
		}
		else {
			$sWhereClause = "user_options LIKE '%" . addslashes($sFlag) . "=1%'";
		}

		$oResource = $this->mDb->query("SELECT user_id, user_name, user_email FROM " . $wgSharedDB. ".user WHERE (user_email_authenticated IS NOT NULL) AND " . $sWhereClause . " ORDER BY user_id");

		if($oResource) {
			$iWatchlisters = 0;

			while($oResultRow = $this->mDb->fetchObject($oResource)) {
				$iWatchlisters++;
				$aUsers[$oResultRow->user_id] = array( 'name' => $oResultRow->user_name, 'email' => $oResultRow->user_email );
			}
			$this->printDebug("$iWatchlisters global watchilster(s) found. (time: " . $this->calculateDuration( time() - $this->mStartTime ). ")");
		}
		else {
			$this->printDebug("No global watchlist users were found.", true);
		}

		$this->mWatchlisters = $aUsers;
		return $aUsers;
	}

	/**
	 * get all watchlisted pages by user (per wiki)
	 */
	private function getUserWatchlistPages($iWikiId, $sWikiDb, $iUserId) {
		$aPages = array();

		if($this->dbExistsCheck) {
			$oResource = $this->mDb->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '" . addslashes($sWikiDb) . "'");

			if(!$oResult = $this->mDb->fetchObject($oResource)) {
				$this->printDebug("ERROR: Wiki database: $sWikiDb not found!");
				return $aPages;
			}
		}

		$oResource = $this->mDb->query("SELECT page_id, wl_namespace, wl_title, wl_notificationtimestamp FROM `" . addslashes($sWikiDb) . "`.watchlist, `" . addslashes($sWikiDb) . "`.page WHERE page_title=wl_title AND page_namespace=wl_namespace AND wl_user='" . addslashes($iUserId) . "' AND (wl_notificationtimestamp IS NOT NULL) ORDER BY wl_notificationtimestamp");
		if($oResource) {
			while($oResultRow = $this->mDb->fetchObject($oResource)) {
				$oRevisionResource = $this->mDb->query("SELECT rev_id, rev_timestamp FROM `" . addslashes($sWikiDb) . "`.revision WHERE rev_page='" . $oResultRow->page_id . "' AND rev_timestamp<='" . $oResultRow->wl_notificationtimestamp . "' ORDER BY rev_timestamp DESC LIMIT 1");
				$oRevisionRow = $this->mDb->fetchObject($oRevisionResource);
				$aPages[] = array(
					'namespace' => $oResultRow->wl_namespace,
					'title' => $oResultRow->wl_title,
					'revisionId' => (!empty($oRevisionRow->rev_id) ? $oRevisionRow->rev_id : 0 ),
					'timestamp' => $oResultRow->wl_notificationtimestamp
				);
			}
		}

		return $aPages;
	}

	/**
	 * gather digest data for all users
	 */
	public function fetchWatchlists() {
		global $wgSharedDB;
		$aDigests = array();
		$this->getGlobalWatchlisters();
		$this->printDebug("Gathering watchlist data ...");

	 $dbw = wfGetDB(DB_MASTER);

		$oResource = $this->mDb->query("SELECT city_id, city_dbname, city_lang, city_title FROM " . $wgSharedDB . ".city_list WHERE city_public='1' AND city_useshared='1' ORDER BY city_sitename");

		while($oResultRow = $this->mDb->fetchObject($oResource)) {
			foreach($this->mWatchlisters as $iUserId => $aUserData) {
				$aPages = $this->getUserWatchlistPages($oResultRow->city_id, $oResultRow->city_dbname, $iUserId);

				if(count($aPages)) {
					if(!isset($this->mWikiData[$oResultRow->city_id])) {
						$this->mWikiData[$oResultRow->city_id] = array(
							'wikiName' => $oResultRow->city_title,
							'wikiLangCode' => $oResultRow->city_lang
						);
					}

					foreach($aPages as $aPage) {
						$dbw->query("INSERT INTO " . $wgSharedDB . ".global_watchlist (gwa_user_id, gwa_city_id, gwa_namespace, gwa_title, gwa_rev_id, gwa_timestamp) VALUES ('" . $iUserId . "', '" . $oResultRow->city_id . "','" . $aPage['namespace'] . "', '" . addslashes($aPage['title']) . "', '" . $aPage['revisionId'] . "', '" . $aPage['timestamp']. "')");
					}
				}
			} // foreach
		} // while

		$this->printDebug("Gathering watchlist data ... done! (time: " . $this->calculateDuration(time() - $this->mStartTime ) . ")");
		return $aDigests;
	}

	/**
	 * mark all pages sent as weekly digest as visited (only for users who requested that in Special:Preferences)
	 */
	private function markWeeklyDigestAsVisited() {
		global $wgSharedDB, $wgDefaultUserOptions;
		$dbw = wfGetDB(DB_MASTER);
		$wgDefaultUserOptions['watchlistdigestclear'] = 0;

		foreach($this->mWatchlisters as $iUserId => $aUserData) {
			$this->printDebug("Markig all digested pages as 'visited' for user: ". $aUserData['name']);

			$oResource = $this->mDb->query("SELECT * FROM " . $wgSharedDB . ".global_watchlist WHERE gwa_user_id='" . $iUserId . "' ORDER BY gwa_city_id");
			$iCurrentCityId = 0;
			while($oResultRow = $this->mDb->fetchObject($oResource)) {
				if($iCurrentCityId != $oResultRow->gwa_city_id) {
					$sWikiDbName = WikiFactory::getVarValueByName('wgDBName', $oResultRow->gwa_city_id);
					$iCurrentCityId = $oResultRow->gwa_city_id;
				}
				if(!empty($sWikiDbName)) {
					$dbw->query("UPDATE `" . addslashes($sWikiDbName) . "`.watchlist SET wl_notificationtimestamp=NULL WHERE wl_user='" . $iUserId . "' AND wl_namespace='" . $oResultRow->gwa_namespace . "' AND wl_title='" . addslashes($oResultRow->gwa_title) . "'");
				}
				else {
					$this->printDebug("ERROR: wiki db name not found for city_id=" . $oResultRow->gwa_city_id);
				}
			}

			$dbw->query("DELETE FROM " . $wgSharedDB . ".global_watchlist WHERE gwa_user_id='" . $iUserId . "'");

			$oUser = User::newFromId($iUserId);
			$oUser->setOption('watchlistdigestclear', false);
			$oUser->saveSettings();
		}
	}

	/**
	 * compose digest email for user
	 */
	private function composeMail($oUser, $aDigestsData) {
		global $wgGlobalWatchlistMaxDigestedArticlesPerWiki;

		$sDigests = "";
		$iPagesCount = 1;
		$bTooManyPages = false;
		foreach($aDigestsData as $aDigest) {
			$sDigests .= $aDigest['wikiName'] . ($aDigest['wikiLangCode'] != 'en' ?  " (" . $aDigest['wikiLangCode'] . ")": "") . ":\n";

			foreach($aDigest['pages'] as $aPageData) {
				if($iPagesCount > $wgGlobalWatchlistMaxDigestedArticlesPerWiki) {
					$bTooManyPages = true;
					break;
				}
				$sDigests .= $aPageData['title']->getFullURL(($aPageData['revisionId'] ? "diff=0&oldid=" . $aPageData['revisionId'] : "")) . "\n";
				$iPagesCount++;
			}

			if($bTooManyPages) {
				$sDigests .= $this->getLocalizedMsg('globalwatchlist-see-more', $oUser->getOption('language')) . "\n";
				break;
			}
			$sDigests .= "\n";
		}

		$aEmailArgs = array(
			0 => ucfirst($oUser->getName()),
			1 => $sDigests
		);

		$sMessage = $this->getLocalizedMsg('globalwatchlist-digest-email-body', $oUser->getOption('language'));
		$sBody = wfMsgReplaceArgs($sMessage, $aEmailArgs);

		return $sBody;
	}

	private function getLocalizedMsg($sMsgKey, $sLangCode) {
		$sBody = null;

		if(($sLangCode != 'en') && !empty($sLangCode)) {
			// custom lang translation
			$sBody = wfMsg("$sMsgKey/$sLangCode");
		}

  if(($sBody == null) || wfEmptyMsg("$sMsgKey/$sLangCode", $sBody)) {
  	$sBody = wfMsg($sMsgKey);
  }

		return $sBody;
	}

	public function run() {
		global $wgSharedDB;

		$this->mStartTime = time();
		$this->printDebug("Script started. (" . date('Y-m-d H:i:s'). ")");

		// ditch previous watchlist data
	 $dbw = wfGetDB(DB_MASTER);
		$dbw->query("DELETE FROM " . $wgSharedDB . ".global_watchlist");
		$this->printDebug("Old digest data removed.");

		$this->fetchWatchlists();
		$this->sendDigests();

		$this->printDebug("Script finished. (total time: " . $this->calculateDuration( time() - $this->mStartTime ) . ")");
	}

	/**
	 * clear watchlist mode: marking all pages as "visited"
	 */
	public function clear() {
		$this->mStartTime = time();
		$this->printDebug("Script started. (" . date('Y-m-d H:i:s'). ") - CLEAR MODE");

		$this->getGlobalWatchlisters('watchlistdigestclear');
		$this->markWeeklyDigestAsVisited();

		$this->printDebug("Script finished. (total time: " . $this->calculateDuration( time() - $this->mStartTime ) . ")");		global $wgSharedDB;
	}

	private function sendDigests() {
		global $wgSharedDB;
		$this->printDebug("Sending digest emails ... ");

		foreach($this->mWatchlisters as $iUserId => $aUserData) {
			$oResource = $this->mDb->query("SELECT * FROM " . $wgSharedDB . ".global_watchlist WHERE gwa_user_id='" . $iUserId . "' ORDER BY gwa_city_id");

			$iWikiId = 0;
			$aDigestData = array();
			$aWikiDigest = array( 'pages' => array());
			while($oResultRow = $this->mDb->fetchObject($oResource)) {
				if($iWikiId != $oResultRow->gwa_city_id) {
					if(count($aWikiDigest['pages'])) {
						$aDigestData[] = $aWikiDigest;
					}
					$iWikiId = $oResultRow->gwa_city_id;
					$aWikiDigest = array(
						'wikiName' => $this->mWikiData[$iWikiId]['wikiName'],
						'wikiLangCode' => $this->mWikiData[$iWikiId]['wikiLangCode'],
						'pages' => array()
					);
				}
				$aWikiDigest['pages'][] = array(
					'title' => GlobalTitle::newFromText($oResultRow->gwa_title, $oResultRow->gwa_namespace, $iWikiId),
					'revisionId' => $oResultRow->gwa_rev_id
				);
			} // while

			if(count($aWikiDigest['pages'])) {
				$aDigestData[] = $aWikiDigest;
			}
			if(count($aDigestData)) {
				$this->sendMail($iUserId, $aDigestData);
			}

		} // foreach

		$this->printDebug("Sending digest emails ... Done!");
	}

	private function sendMail($iUserId, $aDigestData) {
		$oUser = User::newFromId($iUserId);
		$oUser->load();

		$sEmailSubject = $this->getLocalizedMsg('globalwatchlist-digest-email-subject', $oUser->getOption('language'));
		$sEmailBody = $this->composeMail($oUser, $aDigestData);

		$sFrom = 'Wikia <community@wikia.com>';
		if(empty($this->mDebugMailTo)) {
			$oUser->sendMail($sEmailSubject, $sEmailBody, $sFrom);
			$this->printDebug("Digest email sent to user: " . $oUser->getName());
		}
		else {
			UserMailer::send(new MailAddress($this->mDebugMailTo), new MailAddress($sFrom), $sEmailSubject, $sEmailBody);
			$this->printDebug("Digest email sent to: " . $this->mDebugMailTo . " (debug mode)");
		}
	}

	private function printDebug($sMessage, $bForceDebugMode = false) {
		if($this->mDebugMode || $bForceDebugMode) {
			print "[GlobalWatchlistBot] " . $sMessage . "\n";
		}
	}

	private function calculateDuration($iSeconds) {
		if(!$iSeconds) {
			return "0s";
		}

		$aValues = array(
			'w' => (int) ($iSeconds / 86400 / 7),
			'd' => $iSeconds / 86400 % 7,
			'h' => $iSeconds / 3600 % 24,
			'm' => $iSeconds / 60 % 60,
			's' => $iSeconds % 60
		);
		$aResult = array();
		$added = false;

		foreach ($aValues as $k => $v) {
			if ($v > 0 || $added) {
				$added = true;
				$aResult[] = $v . $k;
			}
		}

		return join(' ', $aResult);
	}

}
