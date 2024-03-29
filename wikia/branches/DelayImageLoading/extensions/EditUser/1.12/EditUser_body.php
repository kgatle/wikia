<?php
/* Shamelessly copied and modified from /includes/specials/SpecialPreferences.php v1.12 */
class EditUser extends SpecialPage {
	var $mQuickbar, $mNewpass, $mRetypePass, $mStubs;
	var $mRows, $mCols, $mSkin, $mMath, $mDate, $mUserEmail, $mEmailFlag, $mNick;
	var $mUserLanguage, $mUserVariant;
	var $mSearch, $mRecent, $mRecentDays, $mHourDiff, $mSearchLines, $mSearchChars, $mAction;
	var $mReset, $mPosted, $mToggles, $mUseAjaxSearch, $mSearchNs, $mRealName, $mImageSize;
	var $mUnderline, $mWatchlistEdits;
	var $user, $target;
	
	function __construct() {
		SpecialPage::SpecialPage('EditUser', 'edituser');
	}
	/**
	 * Constructor
	 * Load some values
	 */
	function loadGlobals( $par ) {
		global $wgContLang, $wgUser, $wgAllowRealName, $wgRequest;
		$request = $wgRequest;
		$this->user = User::newFromName($par);
		$this->user->load();
		$this->mQuickbar = $request->getVal( 'wpQuickbar' );
		$this->mNewpass = $request->getVal( 'wpNewpass' );
		$this->mRetypePass =$request->getVal( 'wpRetypePass' );
		$this->mStubs = $request->getVal( 'wpStubs' );
		$this->mRows = $request->getVal( 'wpRows' );
		$this->mCols = $request->getVal( 'wpCols' );
		$this->mSkin = $request->getVal( 'wpSkin' );
		$this->mMath = $request->getVal( 'wpMath' );
		$this->mDate = $request->getVal( 'wpDate' );
		$this->mUserEmail = $request->getVal( 'wpUserEmail' );
		$this->mRealName = $wgAllowRealName ? $request->getVal( 'wpRealName' ) : '';
		$this->mEmailFlag = $request->getCheck( 'wpEmailFlag' ) ? 0 : 1;
		$this->mNick = $request->getVal( 'wpNick' );
		$this->mUserLanguage = $request->getVal( 'wpUserLanguage' );
		$this->mUserVariant = $request->getVal( 'wpUserVariant' );
		$this->mSearch = $request->getVal( 'wpSearch' );
		$this->mRecent = $request->getVal( 'wpRecent' );
		$this->mRecentDays = $request->getVal( 'wpRecentDays' );
		$this->mHourDiff = $request->getVal( 'wpHourDiff' );
		$this->mSearchLines = $request->getVal( 'wpSearchLines' );
		$this->mSearchChars = $request->getVal( 'wpSearchChars' );
		$this->mImageSize = $request->getVal( 'wpImageSize' );
		$this->mThumbSize = $request->getInt( 'wpThumbSize' );
		$this->mUnderline = $request->getInt( 'wpOpunderline' );
		$this->mAction = $request->getVal( 'action' );
		$this->mReset = $request->getCheck( 'wpReset' );
		$this->mPosted = $request->wasPosted();
		$this->mSuccess = $request->getCheck( 'success' );
		$this->mWatchlistDays = $request->getVal( 'wpWatchlistDays' );
		$this->mWatchlistEdits = $request->getVal( 'wpWatchlistEdits' );
		$this->mUseAjaxSearch = $request->getCheck( 'wpUseAjaxSearch' );
		$this->mSaveprefs = $request->getCheck( 'wpSaveprefs' ) &&
			$this->mPosted &&
			$wgUser->matchEditToken( $request->getVal( 'wpEditToken' ) );

		# User toggles  (the big ugly unsorted list of checkboxes)
		$this->mToggles = array();
		if ( $this->mPosted ) {
			$togs = User::getToggles();
			foreach ( $togs as $tname ) {
				$this->mToggles[$tname] = $request->getCheck( "wpOp$tname" ) ? 1 : 0;
			}
		}

		$this->mUsedToggles = array();

		# Search namespace options
		# Note: namespaces don't necessarily have consecutive keys
		$this->mSearchNs = array();
		if ( $this->mPosted ) {
			$namespaces = $wgContLang->getNamespaces();
			foreach ( $namespaces as $i => $namespace ) {
				if ( $i >= 0 ) {
					$this->mSearchNs[$i] = $request->getCheck( "wpNs$i" ) ? 1 : 0;
				}
			}
		}

		# Validate language
		if ( !preg_match( '/^[a-z\-]*$/', $this->mUserLanguage ) ) {
			$this->mUserLanguage = 'nolanguage';
		}

		wfRunHooks( 'InitPreferencesForm', array( $this, $request ) );
	}

	function execute( $par ) {
		global $wgOut, $wgUser, $wgRequest;
		if( !$wgUser->isAllowed( 'edituser' ) ) {
			$wgOut->permissionRequired( 'edituser' );
			return false;
		}

		wfLoadExtensionMessages( 'EditUser' );

		$this->setHeaders();
		$this->target = (isset($par)) ? $par : $wgRequest->getText('username', '');
		if($this->target === '') {
			$wgOut->addHtml($this->makeSearchForm());
			return;
		}
		$targetuser = User::NewFromName( $this->target );
		if( $targetuser->getID() == 0 ) {
			$wgOut->addWikiText( wfMsg( 'edituser-nouser' ) );
			return;
		}
		if( $targetuser->isAllowed('edituser-exempt') ) {
			$wgOut->addWikiText( wfMsg( 'edituser-exempt' ) );
			return;
		}
		$this->loadGlobals($this->target);
		$wgOut->addHtml($this->makeSearchForm());
		$wgOut->addHtml('<br />');
		if ( wfReadOnly() ) {
			$wgOut->readOnlyPage();
			return;
		}
		if ( $this->mReset ) {
			$this->resetPrefs();
			$this->mainPrefsForm( 'reset', wfMsg( 'prefsreset' ) );
		} else if ( $this->mSaveprefs ) {
			$this->savePreferences();
		} else {
			$this->resetPrefs();
			$this->mainPrefsForm( '' );
		}
	}
	/**
	 * @access private
	 */
	function validateInt( &$val, $min=0, $max=0x7fffffff ) {
		$val = intval($val);
		$val = min($val, $max);
		$val = max($val, $min);
		return $val;
	}

	/**
	 * @access private
	 */
	function validateFloat( &$val, $min, $max=0x7fffffff ) {
		$val = floatval( $val );
		$val = min( $val, $max );
		$val = max( $val, $min );
		return( $val );
	}

	/**
	 * @access private
	 */
	function validateIntOrNull( &$val, $min=0, $max=0x7fffffff ) {
		$val = trim($val);
		if($val === '') {
			return $val;
		} else {
			return $this->validateInt( $val, $min, $max );
		}
	}

	/**
	 * @access private
	 */
	function validateDate( $val ) {
		global $wgLang, $wgContLang;
		if ( $val !== false && (
			in_array( $val, (array)$wgLang->getDatePreferences() ) ||
			in_array( $val, (array)$wgContLang->getDatePreferences() ) ) ) 
		{
			return $val;
		} else {
			return $wgLang->getDefaultDateFormat();
		}
	}

	/**
	 * Used to validate the user inputed timezone before saving it as
	 * 'timecorrection', will return '00:00' if fed bogus data.
	 * Note: It's not a 100% correct implementation timezone-wise, it will
	 * accept stuff like '14:30',
	 * @access private
	 * @param string $s the user input
	 * @return string
	 */
	function validateTimeZone( $s ) {
		if ( $s !== '' ) {
			if ( strpos( $s, ':' ) ) {
				# HH:MM
				$array = explode( ':' , $s );
				$hour = intval( $array[0] );
				$minute = intval( $array[1] );
			} else {
				$minute = intval( $s * 60 );
				$hour = intval( $minute / 60 );
				$minute = abs( $minute ) % 60;
			}
			# Max is +14:00 and min is -12:00, see:
			# http://en.wikipedia.org/wiki/Timezone
			$hour = min( $hour, 14 );
			$hour = max( $hour, -12 );
			$minute = min( $minute, 59 );
			$minute = max( $minute, 0 );
			$s = sprintf( "%02d:%02d", $hour, $minute );
		}
		return $s;
	}

	/**
	 * @access private
	 */
	function savePreferences() {
		global $wgUser, $wgOut, $wgParser;
		global $wgEnableUserEmail, $wgEnableEmail;
		global $wgEmailAuthentication, $wgRCMaxAge;
		global $wgAuth, $wgEmailConfirmToEdit;


		if ( '' != $this->mNewpass && $wgAuth->allowPasswordChange() ) {
			if ( $this->mNewpass != $this->mRetypePass ) {
				wfRunHooks( 'PrefsPasswordAudit', array( $this->user, $this->mNewpass, 'badretype' ) );
				$this->mainPrefsForm( 'error', wfMsg( 'badretype' ) );
				return;
			}
			
			try {
				$this->user->setPassword( $this->mNewpass );
				wfRunHooks( 'PrefsPasswordAudit', array( $this->user, $this->mNewpass, 'success' ) );
				$this->mNewpass = $this->mOldpass = $this->mRetypePass = '';
			} catch( PasswordError $e ) {
				wfRunHooks( 'PrefsPasswordAudit', array( $this->user, $this->mNewpass, 'error' ) );
				$this->mainPrefsForm( 'error', $e->getMessage() );
				return;
			}
		}
		$this->user->setRealName( $this->mRealName );

		if( $this->user->getOption( 'language' ) !== $this->mUserLanguage ) {
			$needRedirect = true;
		} else {
			$needRedirect = false;
		}

		# Validate the signature and clean it up as needed
		global $wgMaxSigChars;
		if( mb_strlen( $this->mNick ) > $wgMaxSigChars ) {
			global $wgLang;
			$this->mainPrefsForm( 'error',
				wfMsg( 'badsiglength', $wgLang->formatNum( $wgMaxSigChars ) ) );
			return;
		} elseif( $this->mToggles['fancysig'] ) {
			if( $wgParser->validateSig( $this->mNick ) !== false ) {
				$this->mNick = $wgParser->cleanSig( $this->mNick );
			} else {
				$this->mainPrefsForm( 'error', wfMsg( 'badsig' ) );
				return;
			}
		} else {
			// When no fancy sig used, make sure ~{3,5} get removed.
			$this->mNick = $wgParser->cleanSigInSig( $this->mNick );
		}

		$this->user->setOption( 'language', $this->mUserLanguage );
		$this->user->setOption( 'variant', $this->mUserVariant );
		$this->user->setOption( 'nickname', $this->mNick );
		$this->user->setOption( 'quickbar', $this->mQuickbar );
		$this->user->setOption( 'skin', $this->mSkin );
		global $wgUseTeX;
		if( $wgUseTeX ) {
			$this->user->setOption( 'math', $this->mMath );
		}
		$this->user->setOption( 'date', $this->validateDate( $this->mDate ) );
		$this->user->setOption( 'searchlimit', $this->validateIntOrNull( $this->mSearch ) );
		$this->user->setOption( 'contextlines', $this->validateIntOrNull( $this->mSearchLines ) );
		$this->user->setOption( 'contextchars', $this->validateIntOrNull( $this->mSearchChars ) );
		$this->user->setOption( 'rclimit', $this->validateIntOrNull( $this->mRecent ) );
		$this->user->setOption( 'rcdays', $this->validateInt($this->mRecentDays, 1, ceil($wgRCMaxAge / (3600*24))));
		$this->user->setOption( 'wllimit', $this->validateIntOrNull( $this->mWatchlistEdits, 0, 1000 ) );
		$this->user->setOption( 'rows', $this->validateInt( $this->mRows, 4, 1000 ) );
		$this->user->setOption( 'cols', $this->validateInt( $this->mCols, 4, 1000 ) );
		$this->user->setOption( 'stubthreshold', $this->validateIntOrNull( $this->mStubs ) );
		$this->user->setOption( 'timecorrection', $this->validateTimeZone( $this->mHourDiff, -12, 14 ) );
		$this->user->setOption( 'imagesize', $this->mImageSize );
		$this->user->setOption( 'thumbsize', $this->mThumbSize );
		$this->user->setOption( 'underline', $this->validateInt($this->mUnderline, 0, 2) );
		$this->user->setOption( 'watchlistdays', $this->validateFloat( $this->mWatchlistDays, 0, 7 ) );
		$this->user->setOption( 'ajaxsearch', $this->mUseAjaxSearch );

		# Set search namespace options
		foreach( $this->mSearchNs as $i => $value ) {
			$this->user->setOption( "searchNs{$i}", $value );
		}

		if( $wgEnableEmail && $wgEnableUserEmail ) {
			$this->user->setOption( 'disablemail', $this->mEmailFlag );
		}

		# Set user toggles
		foreach ( $this->mToggles as $tname => $tvalue ) {
			$this->user->setOption( $tname, $tvalue );
		}

		$error = false;
		if( $wgEnableEmail ) {
			$newadr = $this->mUserEmail;
			$oldadr = $this->user->getEmail();
			if( ($newadr != '') && ($newadr != $oldadr) ) {
				# the user has supplied a new email address on the login page
				if( $this->user->isValidEmailAddr( $newadr ) ) {
					$this->user->mEmail = $newadr; # new behaviour: set this new emailaddr from login-page into user database record
					$this->user->confirmEmail(); #auto-authenticate it
				} else {
					$error = wfMsg( 'invalidemailaddress' );
				}
			} else {
				if( $wgEmailConfirmToEdit && empty( $newadr ) ) {
					$this->mainPrefsForm( 'error', wfMsg( 'noemailtitle' ) );
					return;
				}
				$this->user->setEmail( $this->mUserEmail );
			}
			if( $oldadr != $newadr ) {
				wfRunHooks( 'PrefsEmailAudit', array( $this->user, $oldadr, $newadr ) );
			}
		}

		if (!$wgAuth->updateExternalDB($this->user)) {
			$this->mainPrefsForm( 'error', wfMsg( 'externaldberror' ) );
			return;
		}

		$msg = '';
		if ( !wfRunHooks( 'SavePreferences', array( $this, $this->user, &$msg ) ) ) {
			print "(($msg))";
			$this->mainPrefsForm( 'error', $msg );
			return;
		}

		$this->user->saveSettings();

		if( $needRedirect && $error === false ) {
			$title = SpecialPage::getTitleFor( 'EditUser' );
			$wgOut->redirect($title->getFullURL('success'));
			return;
		}

		$wgOut->setParserOptions( ParserOptions::newFromUser( $this->user ) );
		$this->mainPrefsForm( $error === false ? 'success' : 'error', $error);
	}

	/**
	 * @access private
	 */
	function resetPrefs() {
		global $wgUser, $wgLang, $wgContLang, $wgContLanguageCode, $wgAllowRealName;

		$this->mUserEmail = $this->user->getEmail();
		$this->mUserEmailAuthenticationtimestamp = $this->user->getEmailAuthenticationtimestamp();
		$this->mRealName = ($wgAllowRealName) ? $this->user->getRealName() : '';

		# language value might be blank, default to content language
		$this->mUserLanguage = $this->user->getOption( 'language', $wgContLanguageCode );

		$this->mUserVariant = $this->user->getOption( 'variant');
		$this->mEmailFlag = $this->user->getOption( 'disablemail' ) == 1 ? 1 : 0;
		$this->mNick = $this->user->getOption( 'nickname' );

		$this->mQuickbar = $this->user->getOption( 'quickbar' );
		$this->mSkin = Skin::normalizeKey( $this->user->getOption( 'skin' ) );
		$this->mMath = $this->user->getOption( 'math' );
		$this->mDate = $this->user->getDatePreference();
		$this->mRows = $this->user->getOption( 'rows' );
		$this->mCols = $this->user->getOption( 'cols' );
		$this->mStubs = $this->user->getOption( 'stubthreshold' );
		$this->mHourDiff = $this->user->getOption( 'timecorrection' );
		$this->mSearch = $this->user->getOption( 'searchlimit' );
		$this->mSearchLines = $this->user->getOption( 'contextlines' );
		$this->mSearchChars = $this->user->getOption( 'contextchars' );
		$this->mImageSize = $this->user->getOption( 'imagesize' );
		$this->mThumbSize = $this->user->getOption( 'thumbsize' );
		$this->mRecent = $this->user->getOption( 'rclimit' );
		$this->mRecentDays = $this->user->getOption( 'rcdays' );
		$this->mWatchlistEdits = $this->user->getOption( 'wllimit' );
		$this->mUnderline = $this->user->getOption( 'underline' );
		$this->mWatchlistDays = $this->user->getOption( 'watchlistdays' );
		$this->mUseAjaxSearch = $this->user->getBoolOption( 'ajaxsearch' );

		$togs = User::getToggles();
		foreach ( $togs as $tname ) {
			$this->mToggles[$tname] = $this->user->getOption( $tname );
		}

		$namespaces = $wgContLang->getNamespaces();
		foreach ( $namespaces as $i => $namespace ) {
			if ( $i >= NS_MAIN ) {
				$this->mSearchNs[$i] = $this->user->getOption( 'searchNs'.$i );
			}
		}

		wfRunHooks( 'ResetPreferences', array( $this, $this->user ) );
	}

	/**
	 * @access private
	 */
	function namespacesCheckboxes() {
		global $wgContLang;

		# Determine namespace checkboxes
		$namespaces = $wgContLang->getNamespaces();
		$r1 = null;

		foreach ( $namespaces as $i => $name ) {
			if ($i < 0)
				continue;
			$checked = $this->mSearchNs[$i] ? "checked='checked'" : '';
			$name = str_replace( '_', ' ', $namespaces[$i] );

			if ( empty($name) )
				$name = wfMsg( 'blanknamespace' );

			$r1 .= "<input type='checkbox' value='1' name='wpNs$i' id='wpNs$i' {$checked}/> <label for='wpNs$i'>{$name}</label><br />\n";
		}
		return $r1;
	}


	function getToggle( $tname, $trailer = false, $disabled = false ) {
		global $wgUser, $wgLang;

		$this->mUsedToggles[$tname] = true;
		$ttext = $wgLang->getUserToggle( $tname );

		$checked = $this->user->getOption( $tname ) == 1 ? ' checked="checked"' : '';
		$disabled = $disabled ? ' disabled="disabled"' : '';
		$trailer = $trailer ? $trailer : '';
		return "<div class='toggle'><input type='checkbox' value='1' id=\"$tname\" name=\"wpOp$tname\"$checked$disabled />" .
			" <span class='toggletext'><label for=\"$tname\">$ttext</label>$trailer</span></div>\n";
	}

	function getToggles( $items ) {
		$out = "";
		foreach( $items as $item ) {
			if( $item === false )
				continue;
			if( is_array( $item ) ) {
				list( $key, $trailer ) = $item;
			} else {
				$key = $item;
				$trailer = false;
			}
			$out .= $this->getToggle( $key, $trailer );
		}
		return $out;
	}

	function addRow($td1, $td2) {
		return "<tr><td align='right'>$td1</td><td align='left'>$td2</td></tr>";
	}

	/**
	 * Helper function for user information panel
	 * @param $td1 label for an item
	 * @param $td2 item or null
	 * @param $td3 optional help or null
	 * @return xhtml block
	 */
	function tableRow( $td1, $td2 = null, $td3 = null ) {
		global $wgContLang;

		$align['align'] = $wgContLang->isRtl() ? 'right' : 'left';

		if ( is_null( $td3 ) ) {
			$td3 = '';
		} else {
			$td3 = Xml::tags( 'tr', null,
				Xml::tags( 'td', array( 'colspan' => '2' ), $td3 )
			);
		}

		if ( is_null( $td2 ) ) {
			$td1 = Xml::tags( 'td', $align + array( 'colspan' => '2' ), $td1 );
			$td2 = '';
		} else {
			$td1 = Xml::tags( 'td', $align, $td1 );
			$td2 = Xml::tags( 'td', $align, $td2 );
		}

		return Xml::tags( 'tr', null, $td1 . $td2 ). $td3 . "\n";
	
	}

	/**
	 * @access private
	 */
	function mainPrefsForm( $status , $message = '' ) {
		global $wgUser, $wgOut, $wgLang, $wgContLang;
		global $wgAllowRealName, $wgImageLimits, $wgThumbLimits;
		global $wgDisableLangConversion;
		global $wgEnotifWatchlist, $wgEnotifUserTalk,$wgEnotifMinorEdits;
		global $wgRCShowWatchingUsers, $wgEnotifRevealEditorAddress;
		global $wgEnableEmail, $wgEnableUserEmail, $wgEmailAuthentication;
		global $wgContLanguageCode, $wgDefaultSkin, $wgSkipSkins, $wgAuth;
		global $wgEmailConfirmToEdit, $wgAjaxSearch;

		$wgOut->disallowUserJs();  # Prevent hijacked user scripts from sniffing passwords etc.

		if ( $this->mSuccess || 'success' == $status ) {
			$wgOut->wrapWikiMsg( '<div class="successbox"><strong>$1</strong></div>', 'savedprefs' );
		} else	if ( 'error' == $status ) {
			$wgOut->addWikiText( '<div class="errorbox"><strong>' . $message  . '</strong></div>' );
		} else if ( '' != $status ) {
			$wgOut->addWikiText( $message . "\n----" );
		}

		$qbs = $wgLang->getQuickbarSettings();
		$skinNames = $wgLang->getSkinNames();
		$mathopts = $wgLang->getMathNames();
		$dateopts = $wgLang->getDatePreferences();
		$togs = User::getToggles();

		$titleObj = SpecialPage::getTitleFor( 'EditUser' );
		$action = $titleObj->escapeLocalURL();

		# Pre-expire some toggles so they won't show if disabled
		$this->mUsedToggles[ 'shownumberswatching' ] = true;
		$this->mUsedToggles[ 'showupdated' ] = true;
		$this->mUsedToggles[ 'enotifwatchlistpages' ] = true;
		$this->mUsedToggles[ 'enotifusertalkpages' ] = true;
		$this->mUsedToggles[ 'enotifminoredits' ] = true;
		$this->mUsedToggles[ 'enotifrevealaddr' ] = true;
		$this->mUsedToggles[ 'ccmeonemails' ] = true;
		$this->mUsedToggles[ 'uselivepreview' ] = true;


		if ( !$this->mEmailFlag ) { $emfc = 'checked="checked"'; }
		else { $emfc = ''; }


		if ($wgEmailAuthentication && ($this->mUserEmail != '') ) {
			if( $this->user->getEmailAuthenticationTimestamp() ) {
				$emailauthenticated = wfMsg('emailauthenticated',$wgLang->timeanddate($this->user->getEmailAuthenticationTimestamp(), true ) ).'<br />';
				$disableEmailPrefs = false;
			} else {
				$disableEmailPrefs = true;
				$skin = $this->user->getSkin();
				$emailauthenticated = wfMsg('emailnotauthenticated').'<br />' .
					$skin->makeKnownLinkObj( SpecialPage::getTitleFor( 'Confirmemail' ),
						wfMsg( 'emailconfirmlink' ) ) . '<br />';
			}
		} else {
			$emailauthenticated = '';
			$disableEmailPrefs = false;
		}

		if ($this->mUserEmail == '') {
			$emailauthenticated = wfMsg( 'noemailprefs' ) . '<br />';
		}

		$ps = $this->namespacesCheckboxes();

		$enotifwatchlistpages = ($wgEnotifWatchlist) ? $this->getToggle( 'enotifwatchlistpages', false, $disableEmailPrefs ) : '';
		$enotifusertalkpages = ($wgEnotifUserTalk) ? $this->getToggle( 'enotifusertalkpages', false, $disableEmailPrefs ) : '';
		$enotifminoredits = ($wgEnotifWatchlist && $wgEnotifMinorEdits) ? $this->getToggle( 'enotifminoredits', false, $disableEmailPrefs ) : '';
		$enotifrevealaddr = (($wgEnotifWatchlist || $wgEnotifUserTalk) && $wgEnotifRevealEditorAddress) ? $this->getToggle( 'enotifrevealaddr', false, $disableEmailPrefs ) : '';

		# </FIXME>

		$wgOut->addHTML( "<form action=\"$action\" method='post'>" );
		$wgOut->addHTML( "<div id='preferences'>" );

		# User data

		$wgOut->addHTML(
			Xml::openElement( 'fieldset ' ) .
			Xml::element( 'legend', null, wfMsg('prefs-personal') ) .
			Xml::openElement( 'table' ) .
			$this->tableRow( Xml::element( 'h2', null, wfMsg( 'prefs-personal' ) ) )
		);

		$userInformationHtml =
			$this->tableRow( wfMsgHtml( 'username' ), htmlspecialchars( $this->user->getName() ) ) .
			$this->tableRow( wfMsgHtml( 'uid' ), htmlspecialchars( $this->user->getID() ) ) .
			$this->tableRow(
				wfMsgHtml( 'prefs-edits' ),
				$wgLang->formatNum( User::edits( $this->user->getId() ) )
			);

		if( wfRunHooks( 'PreferencesUserInformationPanel', array( $this, &$userInformationHtml ) ) ) {
			$wgOut->addHtml( $userInformationHtml );
		}

		if ( $wgAllowRealName ) {
			$wgOut->addHTML(
				$this->tableRow(
					Xml::label( wfMsg('yourrealname'), 'wpRealName' ),
					Xml::input( 'wpRealName', 25, $this->mRealName, array( 'id' => 'wpRealName' ) ),
					Xml::tags('div', array( 'class' => 'prefsectiontip' ),
						wfMsgExt( 'prefs-help-realname', 'parseinline' )
					)
				)
			);
		}
		if ( $wgEnableEmail ) {
			$wgOut->addHTML(
				$this->tableRow(
					Xml::label( wfMsg('youremail'), 'wpUserEmail' ),
					Xml::input( 'wpUserEmail', 25, $this->mUserEmail, array( 'id' => 'wpUserEmail' ) ),
					Xml::tags('div', array( 'class' => 'prefsectiontip' ),
						wfMsgExt( $wgEmailConfirmToEdit ? 'prefs-help-email-required' : 'prefs-help-email', 'parseinline' )
					)
				)
			);
		}

		global $wgParser, $wgMaxSigChars;
		if( mb_strlen( $this->mNick ) > $wgMaxSigChars ) {
			$invalidSig = $this->tableRow(
				'&nbsp;',
				Xml::element( 'span', array( 'class' => 'error' ),
					wfMsg( 'badsiglength', $wgLang->formatNum( $wgMaxSigChars ) ) )
			);
		} elseif( !empty( $this->mToggles['fancysig'] ) &&
			false === $wgParser->validateSig( $this->mNick ) ) {
			$invalidSig = $this->tableRow(
				'&nbsp;',
				Xml::element( 'span', array( 'class' => 'error' ), wfMsg( 'badsig' ) )
			);
		} else {
			$invalidSig = '';
		}

		$wgOut->addHTML(
			$this->tableRow(
				Xml::label( wfMsg( 'yournick' ), 'wpNick' ),
				Xml::input( 'wpNick', 25, $this->mNick,
					array(
						'id' => 'wpNick',
						// Note: $wgMaxSigChars is enforced in Unicode characters,
						// both on the backend and now in the browser.
						// Badly-behaved requests may still try to submit
						// an overlong string, however.
						'maxlength' => $wgMaxSigChars ) )
			) .
			$invalidSig .
			$this->tableRow( '&nbsp;', $this->getToggle( 'fancysig' ) )
		);

		list( $lsLabel, $lsSelect) = Xml::languageSelector( $this->mUserLanguage );
		$wgOut->addHTML(
			$this->tableRow( $lsLabel, $lsSelect )
		);

		/* see if there are multiple language variants to choose from*/
		if(!$wgDisableLangConversion) {
			$variants = $wgContLang->getVariants();
			$variantArray = array();

			$languages = Language::getLanguageNames( true );
			foreach($variants as $v) {
				$v = str_replace( '_', '-', strtolower($v));
				if( array_key_exists( $v, $languages ) ) {
					// If it doesn't have a name, we'll pretend it doesn't exist
					$variantArray[$v] = $languages[$v];
				}
			}

			$options = "\n";
			foreach( $variantArray as $code => $name ) {
				$selected = ($code == $this->mUserVariant);
				$options .= Xml::option( "$code - $name", $code, $selected ) . "\n";
			}

			if(count($variantArray) > 1) {
				$wgOut->addHtml(
					$this->tableRow(
						Xml::label( wfMsg( 'yourvariant' ), 'wpUserVariant' ),
						Xml::tags( 'select',
							array( 'name' => 'wpUserVariant', 'id' => 'wpUserVariant' ),
							$options
						)
					)
				);
			}
		}

		# Password
		if( $wgAuth->allowPasswordChange() ) {	
			$wgOut->addHTML(
				$this->tableRow( Xml::element( 'h2', null, wfMsg( 'changepassword' ) ) ) .
				$this->tableRow(
					Xml::label( wfMsg( 'newpassword' ), 'wpNewpass' ),
					Xml::password( 'wpNewpass', 25, $this->mNewpass, array( 'id' => 'wpNewpass' ) )
				) .
				$this->tableRow(
					Xml::label( wfMsg( 'retypenew' ), 'wpRetypePass' ),
					Xml::password( 'wpRetypePass', 25, $this->mRetypePass, array( 'id' => 'wpRetypePass' ) )
				) .
				Xml::tags( 'tr', null,
					Xml::tags( 'td', array( 'colspan' => '2' ),
						$this->getToggle( "rememberpassword" )
					)
				)
			);
		}

		# <FIXME>
		# Enotif
		if ( $wgEnableEmail ) {

			$moreEmail = '';
			if ($wgEnableUserEmail) {
				$emf = wfMsg( 'allowemail' );
				$disabled = $disableEmailPrefs ? ' disabled="disabled"' : '';
				$moreEmail =
				"<input type='checkbox' $emfc $disabled value='1' name='wpEmailFlag' id='wpEmailFlag' /> <label for='wpEmailFlag'>$emf</label>";
			}


			$wgOut->addHTML(
				$this->tableRow( Xml::element( 'h2', null, wfMsg( 'email' ) ) ) .
				$this->tableRow(
					$emailauthenticated.
					$enotifrevealaddr.
					$enotifwatchlistpages.
					$enotifusertalkpages.
					$enotifminoredits.
					$moreEmail.
					$this->getToggle( 'ccmeonemails' )
				)
			);
		}
		# </FIXME>

		$wgOut->addHTML(
			Xml::closeElement( 'table' ) .
			Xml::closeElement( 'fieldset' )
		);


		# Quickbar
		#
		if ($this->mSkin == 'cologneblue' || $this->mSkin == 'standard') {
			$wgOut->addHtml( "<fieldset>\n<legend>" . wfMsg( 'qbsettings' ) . "</legend>\n" );
			for ( $i = 0; $i < count( $qbs ); ++$i ) {
				if ( $i == $this->mQuickbar ) { $checked = ' checked="checked"'; }
				else { $checked = ""; }
				$wgOut->addHTML( "<div><label><input type='radio' name='wpQuickbar' value=\"$i\"$checked />{$qbs[$i]}</label></div>\n" );
			}
			$wgOut->addHtml( "</fieldset>\n\n" );
		} else {
			# Need to output a hidden option even if the relevant skin is not in use,
			# otherwise the preference will get reset to 0 on submit
			$wgOut->addHtml( wfHidden( 'wpQuickbar', $this->mQuickbar ) );
		}

		# Skin
		#
		$wgOut->addHTML( "<fieldset>\n<legend>\n" . wfMsg('skin') . "</legend>\n" );
		$mptitle = Title::newMainPage();
		$previewtext = wfMsg('skinpreview');
		# Only show members of Skin::getSkinNames() rather than
		# $skinNames (skins is all skin names from Language.php)
		$validSkinNames = Skin::getSkinNames();
		# Sort by UI skin name. First though need to update validSkinNames as sometimes
		# the skinkey & UI skinname differ (e.g. "standard" skinkey is "Classic" in the UI).
		foreach ($validSkinNames as $skinkey => & $skinname ) {
			if ( isset( $skinNames[$skinkey] ) )  {
				$skinname = $skinNames[$skinkey];
			}
		}
		asort($validSkinNames);
		foreach ($validSkinNames as $skinkey => $sn ) {
			if ( in_array( $skinkey, $wgSkipSkins ) ) {
				continue;
			}
			$checked = $skinkey == $this->mSkin ? ' checked="checked"' : '';

			$mplink = htmlspecialchars($mptitle->getLocalURL("useskin=$skinkey"));
			$previewlink = "<a target='_blank' href=\"$mplink\">$previewtext</a>";
			if( $skinkey == $wgDefaultSkin )
				$sn .= ' (' . wfMsg( 'default' ) . ')';
			$wgOut->addHTML( "<input type='radio' name='wpSkin' id=\"wpSkin$skinkey\" value=\"$skinkey\"$checked /> <label for=\"wpSkin$skinkey\">{$sn}</label> $previewlink<br />\n" );
		}
		$wgOut->addHTML( "</fieldset>\n\n" );

		# Math
		#
		global $wgUseTeX;
		if( $wgUseTeX ) {
			$wgOut->addHTML( "<fieldset>\n<legend>" . wfMsg('math') . '</legend>' );
			foreach ( $mathopts as $k => $v ) {
				$checked = ($k == $this->mMath);
				$wgOut->addHTML(
					Xml::openElement( 'div' ) .
					Xml::radioLabel( wfMsg( $v ), 'wpMath', $k, "mw-sp-math-$k", $checked ) .
					Xml::closeElement( 'div' ) . "\n"
				);
			}
			$wgOut->addHTML( "</fieldset>\n\n" );
		}

		# Files
		#
		$wgOut->addHTML(
			"<fieldset>\n" . Xml::element( 'legend', null, wfMsg( 'files' ) ) . "\n"
		);

		$imageLimitOptions = null;
		foreach ( $wgImageLimits as $index => $limits ) {
			$selected = ($index == $this->mImageSize);
			$imageLimitOptions .= Xml::option( "{$limits[0]}Ã—{$limits[1]}" .
				wfMsg('unit-pixel'), $index, $selected );
		}

		$imageSizeId = 'wpImageSize';
		$wgOut->addHTML(
			"<div>" . Xml::label( wfMsg('imagemaxsize'), $imageSizeId ) . " " .
			Xml::openElement( 'select', array( 'name' => $imageSizeId, 'id' => $imageSizeId ) ) .
				$imageLimitOptions .
			Xml::closeElement( 'select' ) . "</div>\n"
		);

		$imageThumbOptions = null;
		foreach ( $wgThumbLimits as $index => $size ) {
			$selected = ($index == $this->mThumbSize);
			$imageThumbOptions .= Xml::option($size . wfMsg('unit-pixel'), $index,
				$selected);
		}

		$thumbSizeId = 'wpThumbSize';
		$wgOut->addHTML(
			"<div>" . Xml::label( wfMsg('thumbsize'), $thumbSizeId ) . " " .
			Xml::openElement( 'select', array( 'name' => $thumbSizeId, 'id' => $thumbSizeId ) ) .
				$imageThumbOptions .
			Xml::closeElement( 'select' ) . "</div>\n"
		);

		$wgOut->addHTML( "</fieldset>\n\n" );

		# Date format
		#
		# Date/Time
		#

		$wgOut->addHTML( "<fieldset>\n<legend>" . wfMsg( 'datetime' ) . "</legend>\n" );

		if ($dateopts) {
			$wgOut->addHTML( "<fieldset>\n<legend>" . wfMsg( 'dateformat' ) . "</legend>\n" );
			$idCnt = 0;
			$epoch = '20010115161234'; # Wikipedia day
			foreach( $dateopts as $key ) {
				if( $key == 'default' ) {
					$formatted = wfMsgHtml( 'datedefault' );
				} else {
					$formatted = htmlspecialchars( $wgLang->timeanddate( $epoch, false, $key ) );
				}
				($key == $this->mDate) ? $checked = ' checked="checked"' : $checked = '';
				$wgOut->addHTML( "<div><input type='radio' name=\"wpDate\" id=\"wpDate$idCnt\" ".
					"value=\"$key\"$checked /> <label for=\"wpDate$idCnt\">$formatted</label></div>\n" );
				$idCnt++;
			}
			$wgOut->addHTML( "</fieldset>\n" );
		}

		$nowlocal = $wgLang->time( $now = wfTimestampNow(), true );
		$nowserver = $wgLang->time( $now, false );

		$wgOut->addHTML( '<fieldset><legend>' . wfMsg( 'timezonelegend' ). '</legend><table>' .
		 	$this->addRow( wfMsg( 'servertime' ), $nowserver ) .
			$this->addRow( wfMsg( 'localtime' ), $nowlocal ) .
			$this->addRow(
				'<label for="wpHourDiff">' . wfMsg( 'timezoneoffset' ) . '</label>',
				"<input type='text' name='wpHourDiff' id='wpHourDiff' value=\"" . htmlspecialchars( $this->mHourDiff ) . "\" size='6' />"
			) . "<tr><td colspan='2'>
				<input type='button' value=\"" . wfMsg( 'guesstimezone' ) ."\"
				onclick='javascript:guessTimezone()' id='guesstimezonebutton' style='display:none;' />
				</td></tr></table><div class='prefsectiontip'>Â¹" .  wfMsg( 'timezonetext' ) . "</div></fieldset>
		</fieldset>\n\n" );

		# Editing
		#
		global $wgLivePreview;
		$wgOut->addHTML( '<fieldset><legend>' . wfMsg( 'textboxsize' ) . '</legend>
			<div>' .
				wfInputLabel( wfMsg( 'rows' ), 'wpRows', 'wpRows', 3, $this->mRows ) .
				' ' .
				wfInputLabel( wfMsg( 'columns' ), 'wpCols', 'wpCols', 3, $this->mCols ) .
			"</div>" .
			$this->getToggles( array(
				'editsection',
				'editsectiononrightclick',
				'editondblclick',
				'editwidth',
				'showtoolbar',
				'previewonfirst',
				'previewontop',
				'minordefault',
				'externaleditor',
				'externaldiff',
				$wgLivePreview ? 'uselivepreview' : false,
				'forceeditsummary',
			) ) . '</fieldset>'
		);

		# Recent changes
		$wgOut->addHtml( '<fieldset><legend>' . wfMsgHtml( 'prefs-rc' ) . '</legend>' );
		
		$rc  = '<table><tr>';
		$rc .= '<td>' . Xml::label( wfMsg( 'recentchangesdays' ), 'wpRecentDays' ) . '</td>';
		$rc .= '<td>' . Xml::input( 'wpRecentDays', 3, $this->mRecentDays, array( 'id' => 'wpRecentDays' ) ) . '</td>';		
		$rc .= '</tr><tr>';
		$rc .= '<td>' . Xml::label( wfMsg( 'recentchangescount' ), 'wpRecent' ) . '</td>';
		$rc .= '<td>' . Xml::input( 'wpRecent', 3, $this->mRecent, array( 'id' => 'wpRecent' ) ) . '</td>';
		$rc .= '</tr></table>';
		$wgOut->addHtml( $rc );
		
		$wgOut->addHtml( '<br />' );
		
		$toggles[] = 'hideminor';
		if( $wgRCShowWatchingUsers )
			$toggles[] = 'shownumberswatching';
		$toggles[] = 'usenewrc';
		$wgOut->addHtml( $this->getToggles( $toggles ) );

		$wgOut->addHtml( '</fieldset>' );

		# Watchlist
		$wgOut->addHtml( '<fieldset><legend>' . wfMsgHtml( 'prefs-watchlist' ) . '</legend>' );
		
		$wgOut->addHtml( wfInputLabel( wfMsg( 'prefs-watchlist-days' ), 'wpWatchlistDays', 'wpWatchlistDays', 3, $this->mWatchlistDays ) );
		$wgOut->addHtml( '<br /><br />' );

		$wgOut->addHtml( $this->getToggle( 'extendwatchlist' ) );
		$wgOut->addHtml( wfInputLabel( wfMsg( 'prefs-watchlist-edits' ), 'wpWatchlistEdits', 'wpWatchlistEdits', 3, $this->mWatchlistEdits ) );
		$wgOut->addHtml( '<br /><br />' );

		$wgOut->addHtml( $this->getToggles( array( 'watchlisthideown', 'watchlisthidebots', 'watchlisthideminor' ) ) );
		
		if( $this->user->isAllowed( 'createpage' ) || $this->user->isAllowed( 'createtalk' ) )
			$wgOut->addHtml( $this->getToggle( 'watchcreations' ) );
		foreach( array( 'edit' => 'watchdefault', 'move' => 'watchmoves', 'delete' => 'watchdeletion' ) as $action => $toggle ) {
			if( $this->user->isAllowed( $action ) )
				$wgOut->addHtml( $this->getToggle( $toggle ) );
		}
		$this->mUsedToggles['watchcreations'] = true;
		$this->mUsedToggles['watchdefault'] = true;
		$this->mUsedToggles['watchmoves'] = true;
		$this->mUsedToggles['watchdeletion'] = true;
		
		$wgOut->addHtml( '</fieldset>' );

		# Search
		$ajaxsearch = $wgAjaxSearch ?
			$this->addRow(
				wfLabel( wfMsg( 'useajaxsearch' ), 'wpUseAjaxSearch' ),
				wfCheck( 'wpUseAjaxSearch', $this->mUseAjaxSearch, array( 'id' => 'wpUseAjaxSearch' ) )
			) : '';
		$wgOut->addHTML( '<fieldset><legend>' . wfMsg( 'searchresultshead' ) . '</legend><table>' .
			$ajaxsearch .
			$this->addRow(
				wfLabel( wfMsg( 'resultsperpage' ), 'wpSearch' ),
				wfInput( 'wpSearch', 4, $this->mSearch, array( 'id' => 'wpSearch' ) )
			) .
			$this->addRow(
				wfLabel( wfMsg( 'contextlines' ), 'wpSearchLines' ),
				wfInput( 'wpSearchLines', 4, $this->mSearchLines, array( 'id' => 'wpSearchLines' ) )
			) .
			$this->addRow(
				wfLabel( wfMsg( 'contextchars' ), 'wpSearchChars' ),
				wfInput( 'wpSearchChars', 4, $this->mSearchChars, array( 'id' => 'wpSearchChars' ) )
			) .
		"</table><fieldset><legend>" . wfMsg( 'defaultns' ) . "</legend>$ps</fieldset></fieldset>" );

		# Misc
		#
		$wgOut->addHTML('<fieldset><legend>' . wfMsg('prefs-misc') . '</legend>');
		$wgOut->addHtml( '<label for="wpStubs">' . wfMsg( 'stub-threshold' ) . '</label>&nbsp;' );
		$wgOut->addHtml( Xml::input( 'wpStubs', 6, $this->mStubs, array( 'id' => 'wpStubs' ) ) );
		$msgUnderline = htmlspecialchars( wfMsg ( 'tog-underline' ) );
		$msgUnderlinenever = htmlspecialchars( wfMsg ( 'underline-never' ) );
		$msgUnderlinealways = htmlspecialchars( wfMsg ( 'underline-always' ) );
		$msgUnderlinedefault = htmlspecialchars( wfMsg ( 'underline-default' ) );
		$uopt = $this->user->getOption("underline");
		$s0 = $uopt == 0 ? ' selected="selected"' : '';
		$s1 = $uopt == 1 ? ' selected="selected"' : '';
		$s2 = $uopt == 2 ? ' selected="selected"' : '';
		$wgOut->addHTML("
<div class='toggle'><p><label for='wpOpunderline'>$msgUnderline</label>
<select name='wpOpunderline' id='wpOpunderline'>
<option value=\"0\"$s0>$msgUnderlinenever</option>
<option value=\"1\"$s1>$msgUnderlinealways</option>
<option value=\"2\"$s2>$msgUnderlinedefault</option>
</select></p></div>");

		foreach ( $togs as $tname ) {
			if( !array_key_exists( $tname, $this->mUsedToggles ) ) {
				$wgOut->addHTML( $this->getToggle( $tname ) );
			}
		}
		$wgOut->addHTML( '</fieldset>' );

		wfRunHooks( 'RenderPreferencesForm', array( $this, $wgOut ) );

		$token = htmlspecialchars( $this->user->editToken() );
		$skin = $this->user->getSkin();
		$wgOut->addHTML( "
	<div id='prefsubmit'>
	<div>
		<input type='hidden' name='username' value=\"{$this->target}\" />
		<input type='submit' name='wpSaveprefs' class='btnSavePrefs' value=\"" . wfMsgHtml( 'saveprefs' ) . '"'.$skin->tooltipAndAccesskey('save')." />
		<input type='submit' name='wpReset' value=\"" . wfMsgHtml( 'resetprefs' ) . "\" />
	</div>

	</div>

	<input type='hidden' name='wpEditToken' value=\"{$token}\" />
	</div></form>\n" );

		$wgOut->addHtml( Xml::tags( 'div', array( 'class' => "prefcache" ),
			wfMsgExt( 'clearyourcache', 'parseinline' ) )
		);

	}
	
	function makeSearchForm() {
		$thisTitle = Title::makeTitle( NS_SPECIAL, $this->getName() );
		$form = wfOpenElement( 'form', array( 'method' => 'post', 'action' => $thisTitle->getLocalUrl() ) );
		$form .= wfElement( 'label', array( 'for' => 'username' ), wfMsg( 'edituser-username' ) ) . ' ';
		$form .= wfElement( 'input', array( 'type' => 'text', 'name' => 'username', 'id' => 'username', 'value' => $this->target ) ) . ' ';
		$form .= wfElement( 'input', array( 'type' => 'submit', 'name' => 'dosearch', 'value' => wfMsg( 'edituser-dosearch' ) ) );
		$form .= wfElement( 'input', array( 'type' => 'hidden', 'name' => 'issearch', 'value' => '1' ) );
		$form .= wfCloseElement( 'form' );
		return $form;
	}
}

