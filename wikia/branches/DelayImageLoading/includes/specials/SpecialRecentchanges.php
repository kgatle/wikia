<?php

/**
 * Implements Special:Recentchanges
 * @ingroup SpecialPage
 */
class SpecialRecentChanges extends SpecialPage {
	public function __construct() {
  		parent::__construct( 'Recentchanges' );
		$this->includable( true );
	}

	/**
	 * Get a FormOptions object containing the default options
	 *
	 * @return FormOptions
	 */
	public function getDefaultOptions() {
		global $wgUser;
		$opts = new FormOptions();

		$opts->add( 'days',  (int)$wgUser->getOption( 'rcdays' ) );
		$opts->add( 'limit', (int)$wgUser->getOption( 'rclimit' ) );
		$opts->add( 'from', '' );

		$opts->add( 'hideminor',     (bool)$wgUser->getOption( 'hideminor' ) );
		$opts->add( 'hidebots',      true  );
		$opts->add( 'hideanons',     false );
		$opts->add( 'hideliu',       false );
		$opts->add( 'hidepatrolled', false );
		$opts->add( 'hidemyself',    false );
		$opts->add( 'hideenhanced', !$wgUser->getOption( 'usenewrc' ) );

		$opts->add( 'namespace', '', FormOptions::INTNULL );
		$opts->add( 'invert', false );

		$opts->add( 'categories', '' );
		$opts->add( 'categories_any', false );
		return $opts;
	}

	/**
	 * Get a FormOptions object with options as specified by the user
	 *
	 * @return FormOptions
	 */
	public function setup( $parameters ) {
		global $wgRequest;
		global $wgUser;

		$opts = $this->getDefaultOptions();
		$opts->fetchValuesFromRequest( $wgRequest );

		$wgUser->setOption( 'usenewrc', !$opts['hideenhanced'] );

		if( $wgUser->isLoggedIn() ) {
			if( $wgUser->getOption( 'usenewrc' ) != !$opts['hideenhanced'] ) {
				$wgUser->saveSettings();
			}
		}

		// Give precedence to subpage syntax
		if( $parameters !== null ) {
			$this->parseParameters( $parameters, $opts );
		}

		// backported http://svn.wikimedia.org/viewvc/mediawiki?view=rev&revision=48735
		$opts->validateIntBounds( 'limit', 0, 500 );
		return $opts;
	}

	/**
	 * Get a FormOptions object sepcific for feed requests
	 *
	 * @return FormOptions
	 */
	public function feedSetup() {
		global $wgFeedLimit, $wgRequest;
		$opts = $this->getDefaultOptions();
		$opts->fetchValuesFromRequest( $wgRequest, array( 'days', 'limit', 'hideminor' ) );
		$opts->validateIntBounds( 'limit', 0, $wgFeedLimit );
		return $opts;
	}

	/**
	 * Main execution point
	 *
	 * @param $parameters string
	 */
	public function execute( $parameters ) {
		global $wgRequest, $wgOut;
		$feedFormat = $wgRequest->getVal( 'feed' );

		# 10 seconds server-side caching max
		// modified by Emil, 10 secs is not enough for us
		// so the most popular URLs are cached longer and purged on every edit
		if( $wgRequest->getFullRequestURL() == SpecialPage::getTitleFor('RecentChanges')->getInternalURL()
		 || $wgRequest->getFullRequestURL() == SpecialPage::getTitleFor('RecentChanges')->getInternalURL('feed=rss')
		 || $wgRequest->getFullRequestURL() == SpecialPage::getTitleFor('RecentChanges')->getInternalURL('feed=atom') ) {
			global $wgSquidMaxage;
			$wgOut->setSquidMaxage( $wgSquidMaxage );
		} else {
			// all others are treated old-fashion
			$wgOut->setSquidMaxage( 10 );
		}
		# Check if the client has a cached version
		$lastmod = $this->checkLastModified( $feedFormat );
		if( $lastmod === false ) {
			return;
		}

		$opts = $feedFormat ? $this->feedSetup() : $this->setup( $parameters );
		$this->setHeaders();
		$this->outputHeader();

		// Fetch results, prepare a batch link existence check query
		$rows = array();
		$conds = $this->buildMainQueryConds( $opts );
		$rows = $this->doMainQuery( $conds, $opts );
		if( $rows === false ){
			if( !$this->including() ) {
				$this->doHeader( $opts );
			}
			return;
		}

		if( !$feedFormat ) {
			$batch = new LinkBatch;
			foreach( $rows as $row ) {
				$batch->add( NS_USER, $row->rc_user_text  );
				$batch->add( NS_USER_TALK, $row->rc_user_text  );
			}
			$batch->execute();
		}

		if( $feedFormat ) {
			list( $feed, $feedObj ) = $this->getFeedObject( $feedFormat );
			$feed->execute( $feedObj, $rows, $opts['limit'], $opts['hideminor'], $lastmod );
		} else {
			$this->webOutput( $rows, $opts );
		}

		$rows->free();
	}

	/**
	 * Return an array with a ChangesFeed object and ChannelFeed object
	 *
	 * @return array
	 */
	public function getFeedObject( $feedFormat ){
		$feed = new ChangesFeed( $feedFormat, 'rcfeed' );
		$feedObj = $feed->getFeedObject(
			wfMsgForContent( 'recentchanges' ),
			wfMsgForContent( 'recentchanges-feed-description' )
		);
		return array( $feed, $feedObj );
	}

	/**
	 * Process $par and put options found if $opts
	 * Mainly used when including the page
	 *
	 * @param $par String
	 * @param $opts FormOptions
	 */
	public function parseParameters( $par, FormOptions $opts ) {
		$bits = preg_split( '/\s*,\s*/', trim( $par ) );
		foreach( $bits as $bit ) {
			if( 'hidebots' === $bit ) $opts['hidebots'] = true;
			if( 'bots' === $bit ) $opts['hidebots'] = false;
			if( 'hideminor' === $bit ) $opts['hideminor'] = true;
			if( 'minor' === $bit ) $opts['hideminor'] = false;
			if( 'hideliu' === $bit ) $opts['hideliu'] = true;
			if( 'hidepatrolled' === $bit ) $opts['hidepatrolled'] = true;
			if( 'hideanons' === $bit ) $opts['hideanons'] = true;
			if( 'hidemyself' === $bit ) $opts['hidemyself'] = true;
			if ( 'hideenhanced' === $bit ) $opts['hideenhanced'] = true;

			if( is_numeric( $bit ) ) $opts['limit'] =  $bit;

			$m = array();
			if( preg_match( '/^limit=(\d+)$/', $bit, $m ) ) $opts['limit'] = $m[1];
			if( preg_match( '/^days=(\d+)$/', $bit, $m ) ) $opts['days'] = $m[1];
		}
	}

	/**
	 * Get last modified date, for client caching
	 * Don't use this if we are using the patrol feature, patrol changes don't
	 * update the timestamp
	 *
	 * @param $feedFormat String
	 * @return string or false
	 */
	public function checkLastModified( $feedFormat ) {
		global $wgUseRCPatrol, $wgOut;
		$dbr = wfGetDB( DB_SLAVE );
		$lastmod = $dbr->selectField( 'recentchanges', 'MAX(rc_timestamp)', false, __FUNCTION__ );
		if( $feedFormat || !$wgUseRCPatrol ) {
			if( $lastmod && $wgOut->checkLastModified( $lastmod ) ) {
				# Client cache fresh and headers sent, nothing more to do.
				return false;
			}
		}
		return $lastmod;
	}

	/**
	 * Return an array of conditions depending of options set in $opts
	 *
	 * @param $opts FormOptions
	 * @return array
	 */
	public function buildMainQueryConds( FormOptions $opts ) {
		global $wgUser;

		$dbr = wfGetDB( DB_SLAVE );
		$conds = array();

		# It makes no sense to hide both anons and logged-in users
		# Where this occurs, force anons to be shown
		$forcebot = false;
		if( $opts['hideanons'] && $opts['hideliu'] ){
			# Check if the user wants to show bots only
			if( $opts['hidebots'] ){
				$opts['hideanons'] = false;
			} else {
				$forcebot = true;
				$opts['hidebots'] = false;
			}
		}

		// Calculate cutoff
		$cutoff_unixtime = time() - ( $opts['days'] * 86400 );
		$cutoff_unixtime = $cutoff_unixtime - ($cutoff_unixtime % 86400);
		$cutoff = $dbr->timestamp( $cutoff_unixtime );

		$fromValid = preg_match('/^[0-9]{14}$/', $opts['from']);
		if( $fromValid && $opts['from'] > wfTimestamp(TS_MW,$cutoff) ) {
			$cutoff = $dbr->timestamp($opts['from']);
		} else {
			$opts->reset( 'from' );
		}

		$conds[] = 'rc_timestamp >= ' . $dbr->addQuotes( $cutoff );


		$hidePatrol = $wgUser->useRCPatrol() && $opts['hidepatrolled'];
		$hideLoggedInUsers = $opts['hideliu'] && !$forcebot;
		$hideAnonymousUsers = $opts['hideanons'] && !$forcebot;

		if( $opts['hideminor'] )  $conds['rc_minor'] = 0;
		if( $opts['hidebots'] )   $conds['rc_bot'] = 0;
		if( $hidePatrol )         $conds['rc_patrolled'] = 0;
		if( $forcebot )           $conds['rc_bot'] = 1;
		if( $hideLoggedInUsers )  $conds[] = 'rc_user = 0';
		if( $hideAnonymousUsers ) $conds[] = 'rc_user != 0';

		if( $opts['hidemyself'] ) {
			if( $wgUser->getId() ) {
				$conds[] = 'rc_user != ' . $dbr->addQuotes( $wgUser->getId() );
			} else {
				$conds[] = 'rc_user_text != ' . $dbr->addQuotes( $wgUser->getName() );
			}
		}

		# Namespace filtering
		if( $opts['namespace'] !== '' ) {
			if( !$opts['invert'] ) {
				$conds[] = 'rc_namespace = ' . $dbr->addQuotes( $opts['namespace'] );
			} else {
				$conds[] = 'rc_namespace != ' . $dbr->addQuotes( $opts['namespace'] );
			}
		}

		return $conds;
	}

	/**
	 * Process the query
	 *
	 * @param $conds array
	 * @param $opts FormOptions
	 * @return database result or false (for Recentchangeslinked only)
	 */
	public function doMainQuery( $conds, $opts ) {
		global $wgUser;

		$tables = array( 'recentchanges' );
		$join_conds = array();

		$uid = $wgUser->getId();
		$dbr = wfGetDB( DB_SLAVE );
		$limit = $opts['limit'];
		$namespace = $opts['namespace'];
		$invert = $opts['invert'];

		// JOIN on watchlist for users
		if( $uid ) {
			$tables[] = 'watchlist';
			$join_conds = array( 'watchlist' => array('LEFT JOIN',
				"wl_user={$uid} AND wl_title=rc_title AND wl_namespace=rc_namespace") );
		}

		wfRunHooks('SpecialRecentChangesQuery', array( &$conds, &$tables, &$join_conds, $opts ) );

		// Is there either one namespace selected or excluded?
		// Also, if this is "all" or main namespace, just use timestamp index.
		if( is_null($namespace) || $invert || $namespace == NS_MAIN ) {
			$res = $dbr->select( $tables, '*', $conds, __METHOD__,
				array( 'ORDER BY' => 'rc_timestamp DESC', 'LIMIT' => $limit,
					'USE INDEX' => array('recentchanges' => 'rc_timestamp') ),
				$join_conds );
		// We have a new_namespace_time index! UNION over new=(0,1) and sort result set!
		} else {
			// New pages
			$sqlNew = $dbr->selectSQLText( $tables, '*',
				array( 'rc_new' => 1 ) + $conds,
				__METHOD__,
				array( 'ORDER BY' => 'rc_timestamp DESC', 'LIMIT' => $limit,
					'USE INDEX' =>  array('recentchanges' => 'new_name_timestamp') ),
				$join_conds );
			// Old pages
			$sqlOld = $dbr->selectSQLText( $tables, '*',
				array( 'rc_new' => 0 ) + $conds,
				__METHOD__,
				array( 'ORDER BY' => 'rc_timestamp DESC', 'LIMIT' => $limit,
					'USE INDEX' =>  array('recentchanges' => 'new_name_timestamp') ),
				$join_conds );
			# Join the two fast queries, and sort the result set
			$sql = "($sqlNew) UNION ($sqlOld) ORDER BY rc_timestamp DESC LIMIT $limit";
			$res = $dbr->query( $sql, __METHOD__ );
		}

		return $res;
	}

	/**
	 * Send output to $wgOut, only called if not used feeds
	 *
	 * @param $rows array of database rows
	 * @param $opts FormOptions
	 */
	public function webOutput( $rows, $opts ) {
		global $wgOut, $wgUser, $wgRCShowWatchingUsers, $wgShowUpdatedMarker;
		global $wgAllowCategorizedRecentChanges;

		$limit = $opts['limit'];

		if( !$this->including() ) {
			// Output options box
			$this->doHeader( $opts );
		}

		// And now for the content
		$wgOut->setSyndicated( true );

		if( $wgAllowCategorizedRecentChanges ) {
			$this->filterByCategories( $rows, $opts );
		}

		$showWatcherCount = $wgRCShowWatchingUsers && $wgUser->getOption( 'shownumberswatching' );
		$watcherCache = array();

		$dbr = wfGetDB( DB_SLAVE );

		$counter = 1;
		$list = ChangesList::newFromUser( $wgUser );

		$s = $list->beginRecentChangesList();
		foreach( $rows as $obj ) {
			if( $limit == 0 ) break;
			$rc = RecentChange::newFromRow( $obj );
			$rc->counter = $counter++;
			# Check if the page has been updated since the last visit
			if( $wgShowUpdatedMarker && !empty($obj->wl_notificationtimestamp) ) {
				$rc->notificationtimestamp = ($obj->rc_timestamp >= $obj->wl_notificationtimestamp);
			} else {
				$rc->notificationtimestamp = false; // Default
			}
			# Check the number of users watching the page
			$rc->numberofWatchingusers = 0; // Default
			if( $showWatcherCount && $obj->rc_namespace >= 0 ) {
				if( !isset($watcherCache[$obj->rc_namespace][$obj->rc_title]) ) {
					$watcherCache[$obj->rc_namespace][$obj->rc_title] =
						 $dbr->selectField( 'watchlist',
							'COUNT(*)',
							array(
								'wl_namespace' => $obj->rc_namespace,
								'wl_title' => $obj->rc_title,
							),
							__METHOD__ . '-watchers' );
				}
				$rc->numberofWatchingusers = $watcherCache[$obj->rc_namespace][$obj->rc_title];
			}
			$s .= $list->recentChangesLine( $rc, !empty( $obj->wl_user ) );
			--$limit;
		}
		$s .= $list->endRecentChangesList();
		$wgOut->addHTML( $s );
	}

	/**
	 * Return the text to be displayed above the changes
	 *
	 * @param $opts FormOptions
	 * @return String: XHTML
	 */
	public function doHeader( $opts ) {
		global $wgScript, $wgOut;

		$this->setTopText( $wgOut, $opts );

		$defaults = $opts->getAllValues();
		$nondefaults = $opts->getChangedValues();
		$opts->consumeValues( array( 'namespace', 'invert' ) );

		$panel = array();
		$panel[] = $this->optionsPanel( $defaults, $nondefaults );
		$panel[] = '<hr />';

		$extraOpts = $this->getExtraOptions( $opts );
		$extraOptsCount = count( $extraOpts );
		$count = 0;
		$submit = ' ' . Xml::submitbutton( wfMsg( 'allpagessubmit' ) );

		$out = Xml::openElement( 'table', array( 'class' => 'mw-recentchanges-table' ) );
		foreach( $extraOpts as $optionRow ) {
			# Add submit button to the last row only
			++$count;
			$addSubmit = $count === $extraOptsCount ? $submit : '';

			$out .= Xml::openElement( 'tr' );
			if( is_array( $optionRow ) ) {
				$out .= Xml::tags( 'td', array( 'class' => 'mw-label' ), $optionRow[0] );
				$out .= Xml::tags( 'td', array( 'class' => 'mw-input' ), $optionRow[1] . $addSubmit );
			} else {
				$out .= Xml::tags( 'td', array( 'class' => 'mw-input', 'colspan' => 2 ), $optionRow . $addSubmit );
			}
			$out .= Xml::closeElement( 'tr' );
		}
		$out .= Xml::closeElement( 'table' );

		$unconsumed = $opts->getUnconsumedValues();
		foreach( $unconsumed as $key => $value ) {
			$out .= Xml::hidden( $key, $value );
		}

		$t = $this->getTitle();
		$out .= Xml::hidden( 'title', $t->getPrefixedText() );
		$form = Xml::tags( 'form', array( 'action' => $wgScript ), $out );
		$panel[] = $form;
		$panelString = implode( "\n", $panel );

		$wgOut->addHTML(
			Xml::fieldset( wfMsg( 'recentchanges-legend' ), $panelString, array( 'class' => 'rcoptions' ) )
		);

		$this->setBottomText( $wgOut, $opts );
	}

	/**
	 * Get options to be displayed in a form
	 *
	 * @param $opts FormOptions
	 * @return array
	 */
	function getExtraOptions( $opts ){
		$extraOpts = array();
		$extraOpts['namespace'] = $this->namespaceFilterForm( $opts );

		global $wgAllowCategorizedRecentChanges;
		if( $wgAllowCategorizedRecentChanges ) {
			$extraOpts['category'] = $this->categoryFilterForm( $opts );
		}

		wfRunHooks( 'SpecialRecentChangesPanel', array( &$extraOpts, $opts ) );
		return $extraOpts;
	}

	/**
	 * Send the text to be displayed above the options
	 *
	 * @param $out OutputPage
	 * @param $opts FormOptions
	 */
	function setTopText( OutputPage $out, FormOptions $opts ){
		$out->addWikiText( wfMsgForContentNoTrans( 'recentchangestext' ) );
	}

	/**
	 * Send the text to be displayed after the options, for use in
	 * Recentchangeslinked
	 *
	 * @param $out OutputPage
	 * @param $opts FormOptions
	 */
	function setBottomText( OutputPage $out, FormOptions $opts ){}

	/**
	 * Creates the choose namespace selection
	 *
	 * @param $opts FormOptions
	 * @return string
	 */
	protected function namespaceFilterForm( FormOptions $opts ) {
		$nsSelect = Xml::namespaceSelector( $opts['namespace'], '' );
		$nsLabel = Xml::label( wfMsg('namespace'), 'namespace' );
		$invert = Xml::checkLabel( wfMsg('invert'), 'invert', 'nsinvert', $opts['invert'] );
		return array( $nsLabel, "$nsSelect $invert" );
	}

	/**
	 * Create a input to filter changes by categories
	 *
	 * @param $opts FormOptions
	 * @return array
	 */
	protected function categoryFilterForm( FormOptions $opts ) {
		list( $label, $input ) = Xml::inputLabelSep( wfMsg('rc_categories'),
			'categories', 'mw-categories', false, $opts['categories'] );

		$input .= ' ' . Xml::checkLabel( wfMsg('rc_categories_any'),
			'categories_any', 'mw-categories_any', $opts['categories_any'] );

		return array( $label, $input );
	}

	/**
	 * Filter $rows by categories set in $opts
	 *
	 * @param $rows array of database rows
	 * @param $opts FormOptions
	 */
	function filterByCategories( &$rows, FormOptions $opts ) {
		$categories = array_map( 'trim', explode( "|" , $opts['categories'] ) );

		if( empty($categories) ) {
			return;
		}

		# Filter categories
		$cats = array();
		foreach( $categories as $cat ) {
			$cat = trim( $cat );
			if( $cat == "" ) continue;
			$cats[] = $cat;
		}

		# Filter articles
		$articles = array();
		$a2r = array();
		foreach( $rows AS $k => $r ) {
			$nt = Title::makeTitle( $r->rc_namespace, $r->rc_title );
			$id = $nt->getArticleID();
			if( $id == 0 ) continue; # Page might have been deleted...
			if( !in_array($id, $articles) ) {
				$articles[] = $id;
			}
			if( !isset($a2r[$id]) ) {
				$a2r[$id] = array();
			}
			$a2r[$id][] = $k;
		}

		# Shortcut?
		if( !count($articles) || !count($cats) )
			return ;

		# Look up
		$c = new Categoryfinder ;
		$c->seed( $articles, $cats, $opts['categories_any'] ? "OR" : "AND" ) ;
		$match = $c->run();

		# Filter
		$newrows = array();
		foreach( $match AS $id ) {
			foreach( $a2r[$id] AS $rev ) {
				$k = $rev;
				$newrows[$k] = $rows[$k];
			}
		}
		$rows = $newrows;
	}

	/**
	 * Makes change an option link which carries all the other options
	 * @param $title see Title
	 * @param $override
	 * @param $options
	 */
	function makeOptionsLink( $title, $override, $options, $active = false ) {
		global $wgUser;
		$sk = $wgUser->getSkin();
		$params = $override + $options;
		return $sk->link( $this->getTitle(), htmlspecialchars( $title ),
			( $active ? array( 'style'=>'font-weight: bold;' ) : array() ), $params, array( 'known' ) );
	}

	/**
	 * Creates the options panel.
	 * @param $defaults array
	 * @param $nondefaults array
	 */
	function optionsPanel( $defaults, $nondefaults ) {
		global $wgLang, $wgUser, $wgRCLinkLimits, $wgRCLinkDays;

		$options = $nondefaults + $defaults;

		$note = '';
		if( $options['from'] ) {
			$note .= wfMsgExt( 'rcnotefrom', array( 'parseinline' ),
				$wgLang->formatNum( $options['limit'] ),
				$wgLang->timeanddate( $options['from'], true ) ) . '<br />';
		}
		if( !wfEmptyMsg( 'rclegend', wfMsg('rclegend') ) ) {
			$note .= wfMsgExt( 'rclegend', array('parseinline') ) . '<br />';
		}

		# Sort data for display and make sure it's unique after we've added user data.
		$wgRCLinkLimits[] = $options['limit'];
		$wgRCLinkDays[] = $options['days'];
		sort( $wgRCLinkLimits );
		sort( $wgRCLinkDays );
		$wgRCLinkLimits = array_unique( $wgRCLinkLimits );
		$wgRCLinkDays = array_unique( $wgRCLinkDays );

		// limit links
		foreach( $wgRCLinkLimits as $value ) {
			$cl[] = $this->makeOptionsLink( $wgLang->formatNum( $value ),
				array( 'limit' => $value ), $nondefaults, $value == $options['limit'] ) ;
		}
		$cl = implode( ' | ', $cl );

		// day links, reset 'from' to none
		foreach( $wgRCLinkDays as $value ) {
			$dl[] = $this->makeOptionsLink( $wgLang->formatNum( $value ),
				array( 'days' => $value, 'from' => '' ), $nondefaults, $value == $options['days'] ) ;
		}
		$dl = implode( ' | ', $dl );


		// show/hide links
		$showhide = array( wfMsg( 'show' ), wfMsg( 'hide' ) );
		$minorLink = $this->makeOptionsLink( $showhide[1-$options['hideminor']],
			array( 'hideminor' => 1-$options['hideminor'] ), $nondefaults);
		$botLink = $this->makeOptionsLink( $showhide[1-$options['hidebots']],
			array( 'hidebots' => 1-$options['hidebots'] ), $nondefaults);
		$anonsLink = $this->makeOptionsLink( $showhide[ 1 - $options['hideanons'] ],
			array( 'hideanons' => 1 - $options['hideanons'] ), $nondefaults );
		$liuLink   = $this->makeOptionsLink( $showhide[1-$options['hideliu']],
			array( 'hideliu' => 1-$options['hideliu'] ), $nondefaults);
		$patrLink  = $this->makeOptionsLink( $showhide[1-$options['hidepatrolled']],
			array( 'hidepatrolled' => 1-$options['hidepatrolled'] ), $nondefaults);
		$myselfLink = $this->makeOptionsLink( $showhide[1-$options['hidemyself']],
			array( 'hidemyself' => 1-$options['hidemyself'] ), $nondefaults);
		$enhancedLink = $this->makeOptionsLink( $showhide[1-$options['hideenhanced']],
			array( 'hideenhanced' => 1-$options['hideenhanced'] ), $nondefaults);

		$links[] = wfMsgHtml( 'rcshowhideminor', $minorLink );
		$links[] = wfMsgHtml( 'rcshowhidebots', $botLink );
		$links[] = wfMsgHtml( 'rcshowhideanons', $anonsLink );
		$links[] = wfMsgHtml( 'rcshowhideliu', $liuLink );
		if( $wgUser->useRCPatrol() )
			$links[] = wfMsgHtml( 'rcshowhidepatr', $patrLink );
		$links[] = wfMsgHtml( 'rcshowhidemine', $myselfLink );
		$links[] = wfMsgHtml( 'rcshowhideenhanced', $enhancedLink );
		$hl = implode( ' | ', $links );

		// show from this onward link
		$now = $wgLang->timeanddate( wfTimestampNow(), true );
		$tl =  $this->makeOptionsLink( $now, array( 'from' => wfTimestampNow() ), $nondefaults );

		$rclinks = wfMsgExt( 'rclinks', array( 'parseinline', 'replaceafter' ),
			$cl, $dl, $hl );
		$rclistfrom = wfMsgExt( 'rclistfrom', array( 'parseinline', 'replaceafter' ), $tl );
		return "{$note}$rclinks<br />$rclistfrom";
	}
}
