<?php

/**
 * @package MediaWiki
 * @subpackage RequestWiki
 * @author Krzysztof Krzyżaniak <eloy@wikia.com> for Wikia.com
 * @author Piotr Molski <moli@wikia-inc.com> for Wikia.com
 * @version: 0.1
 *
 * helper classes & functions
 */

if ( !defined( 'MEDIAWIKI' ) ) {
    echo "This is MediaWiki extension and cannot be used standalone.\n";
    exit( 1 ) ;
}

class AutoCreateWiki {
	/**
	 * isDomainExists
	 *
	 * check in city_domains if we have such wikia in city_domains
	 *
	 * @param string $name: domain name
	 * @param string $language default null - choosen language
	 *
	 * @return integer - 0 or 1
	 */
	public static function domainExists( $name, $language = null  ) {
		$sDomain = Wikia::fixDomainName($name, $language);

		$dbr = wfGetDB( DB_SLAVE );
		$oRow = $dbr->selectRow(
			wfSharedTable("city_domains"),
			array( "count(*) as count" ),
			array( "city_domain" => $sDomain ),
			__METHOD__
		);
		return $oRow->count;
	}
	
	/**
	 * getDomainsLikeOrExact
	 *
	 * check if name is similar or the same, using sql like queries
	 *
	 * @access public
	 * @author Krzysztof Krzyżaniak <eloy@wikia.com>
	 *
	 * @param string $name: name to check
	 * @param string $language default null - choosen language
	 *
	 * @return array with matches
	 */
	function getDomainsLikeOrExact( $name, $language = null ) {

		$dbr = wfGetDB( DB_SLAVE );

		$domains = array();
		$unique = array();

		$name = self::deleteCommonPostfix($name);
		
		$condition = $conditionSimilar = "";

		/**
		 * don't check short names
		 */
		if ( strlen( $name ) > 3 ) {
			$names = explode(" ", $name);
			$skip = false;
			$tmp_array = array();

			if ( is_array( $names ) ) {
				foreach( $names as $n ) {
					if ( !preg_match("/^[\w\.]+$/",$n) ) continue;
					$tmp_array['exact'][] = "city_domain like '{$n}.%'";
					$tmp_array['similar'][] = "city_domain like '%{$n}%'";
				}
				if ( sizeof( $tmp_array ) ) {
					$condition = implode(" or ", $tmp_array['exact']);
					$conditionSimilar = implode(" or ", $tmp_array['similar']);
				} else {
					$skip = true;
				}
			} else {
				$condition = "city_domain like '{$name}.%'";
				$conditionSimilar = "city_domain like '%{$name}%'";
			}

			if ( $skip === false ) {
				#--- exact (but with language prefixes)
				list ($city_domains, $city_list) = array(wfSharedTable("city_domains"), wfSharedTable("city_list"));
				
				$oRes = $dbr->select (
					array ( $city_domains, $city_list ),
					array ( "*" ),
					array (
						$condition,
						"{$city_domains}.city_id = {$city_list}.city_id",
						"{$city_list}.city_public" => 1
					),
					__METHOD__,
					array( "limit" => 20 )
				);

				while ( $oRow = $dbr->fetchObject( $oRes ) ) {
					if ( preg_match( "/^www\./", strtolower( $oRow->city_domain ) ) )
						continue;
					$unique[ strtolower( $oRow->city_domain ) ] = 1;
					$domains["exact"][] = $oRow;
				}
				$dbr->freeResult($oRes);

				#-- 
				# Similar domains
				$oRes = $dbr->select(
					array ( $city_domains, $city_list ),
					array ( "*" ),
					array (
						$conditionSimilar,
						"{$city_domains}.city_id = {$city_list}.city_id",
						"{$city_list}.city_public" => 1
					),
					__METHOD__,
					array( "limit" => 20 )
				);

				while ( $oRow = $dbr->fetchObject( $oRes ) ) {
					if ( preg_match( "/^www\./", strtolower( $oRow->city_domain ) ) )
						continue;
					if ( array_key_exists( strtolower($oRow->city_domain), $unique)
						&& $unique[ strtolower($oRow->city_domain) ] == 1 )
						continue;
					$domains["like"][] = $oRow;
				}
				$dbr->freeResult($oRes);
			}
		}
		return $domains;
	}
	
	/**
	 * wfRequestDeleteCommonPostfix
	 *
	 * deletes common postfixes like 'pedia' or 'wiki'
	 *
	 * @access public
	 * @author Maciej Błaszkowski <marooned at wikia-inc.com>
	 *
	 * @param string $name: name process
	 *
	 * @return string processed name
	 */
	function deleteCommonPostfix($name) {
		$commonPostfixes = array('pedia', 'wikia', 'wiki');
		$regexp = array('/(?:^|(?<!\s))(?:' . implode('|', $commonPostfixes) . ')(?:\s|$)/');
		return preg_replace($regexp, '', $name);
	}
	
	
	/**
	 * wfRequestDeleteCommonPostfix
	 *
	 * deletes common postfixes like 'pedia' or 'wiki'
	 *
	 * @access public
	 * @author Maciej Błaszkowski <marooned at wikia-inc.com>
	 *
	 * @param string $name: name process
	 *
	 * @return string processed name
	 */
	public static function checkDomainIsCorrect($sName, $sLang) {
		wfProfileIn(__METHOD__);

		$sResponse = "";
		
		if ( strlen($sName) === 0 ) {
			#-- empty field
			$sResponse = wfMsg('autocreatewiki-empty-field');
		} elseif ( strlen( $sName ) < 3 ) {
			#-- too short
			$sResponse = wfMsg('autocreatewiki-name-too-short');
		} elseif (preg_match('/[^a-z0-9-]/i', $sName)) {
			#-- invalid name
			$sResponse = wfMsg('autocreatewiki-bad-name');
		} elseif ( in_array( $sName, array_keys( Language::getLanguageNames() )) ) {
			#-- invalid name
			$sResponse = wfMsg('autocreatewiki-violate-policy');
		} else {
			$iExists = AutoCreateWiki::domainExists($sName, $sLang);
			if (!empty($iExists)) {
				#--- domain exists
				$sResponse = wfMsg('autocreatewiki-name-taken');
			} 
		}
		
		wfProfileOut(__METHOD__);
		return $sResponse;
	}
	
	public static function checkUsernameIsCorrect($sValue) {
		wfProfileIn(__METHOD__);
		$sResponse = "";
		if ($sValue == "") {
			$sResponse = wfMsg('autocreatewiki-empty-username');
		} else {
			$u = User::newFromName( $sValue );
			if( is_null( $u ) || !User::isUsableName( $u->getName() ) ) {
				$sResponse = wfMsg('autocreatewiki-invalid-username');
			} else {
				$iId = User::idFromName( $sValue );
				if ( !empty($iId) ) {
					$sResponse = wfMsg('autocreatewiki-busy-username');
				}
			}
		}
		wfProfileOut(__METHOD__);
		return $sResponse;
	}
		
	public static function checkEmailIsCorrect($sValue) {
		wfProfileIn(__METHOD__);
		$sResponse = "";
		if ($sValue != "") {
			if ( !User::isValidEmailAddr( $sValue ) ) {
				$sResponse = wfMsg( 'invalidemailaddress' );
			}
		}
		wfProfileOut(__METHOD__);
		return $sResponse;
	}
	
	public static function checkPasswordIsCorrect($sUsername, $sValue) {
		global $wgMinimalPasswordLength;
		
		wfProfileIn(__METHOD__);
		$sResponse = "";
		if ($sUsername == "") {
			$sResponse = wfMsg('autocreatewiki-set-username');
		} else {
			if ($sValue == "") {
				$sResponse = wfMsg('autocreatewiki-empty-password');
			} else {
				$u = User::newFromName( $sUsername );
				if ( is_null( $u ) ) {
					$u = new StubUser();
				}
				if ( !$u->isValidPassword( $sValue ) ) {
					$sResponse = wfMsgExt( 'passwordtooshort', array( 'parsemag' ), $wgMinimalPasswordLength );
				}
			}
		}
		wfProfileOut(__METHOD__);
		return $sResponse;
	}

	public static function checkRetypePasswordIsCorrect($sPass, $sValue) {	
		wfProfileIn(__METHOD__);
		$sResponse = "";
		if ( $sValue == "" ) {
			$sResponse = wfMsg('autocreatewiki-empty-retype-password');
		} elseif ( strcmp( $sPass, $sValue ) != 0 ) {
			$sResponse = wfMsg('autocreatewiki-invalid-retype-passwd');
		}
		wfProfileOut(__METHOD__);
		return $sResponse;
	}	
	
	public static function checkBirthdayIsCorrect ($sYear, $sMonth, $sDay) {
		wfProfileIn(__METHOD__);
		$sResponse = "";
		if ($sYear == -1 || $sMonth == -1 || $sDay == -1) {
			$sResponse = wfMsg('autocreatewiki-invalid-birthday');
		} elseif ( empty($sYear) || empty($sMonth) || empty($sDay) ) {
			$sResponse = wfMsg('autocreatewiki-invalid-birthday');
		} else {
			$sYear = sprintf("%0d", $sYear);
			$sMonth = sprintf("%0d", $sMonth);
			$sDay = sprintf("%0d", $sDay);
			if ( preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', "{$sYear}-{$sMonth}-{$sDay}") === false ) {
				$sResponse = wfMsg('autocreatewiki-invalid-birthday');
			} else {
				$userBirthDay = strtotime($sYear . '-' . $sMonth . '-' . $sDay);
				if ($userBirthDay > strtotime('-13 years')) {
					$sResponse = wfMsg('autocreatewiki-invalid-birthday');
				} 
			}
		}
		wfProfileOut(__METHOD__);
		return $sResponse;
	}
}
