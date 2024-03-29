<?php

/**
 * Special page handler function for Special:HideRevision
 */
class HideRevisionForm extends SpecialPage {
	function __construct() {
		wfLoadExtensionMessages( 'HideRevision' );
		parent::__construct( 'HideRevision', 'hiderevision' );
	}

	function execute( $par ) {
		global $wgUser, $wgRequest, $wgOut;

		$this->setHeaders();

		if( !$this->userCanExecute( $wgUser ) ){
			$this->displayRestrictionError();
			return;
		}
		if( $wgUser->isBlocked( false ) ) {
			$wgOut->blockedPage();
			return;
		}

		$this->outputHeader();

		// For live revisions
		$this->mRevisions = (array)$wgRequest->getIntArray( 'revision' );

		// For deleted/archived revisions
		$this->mTarget = Title::newFromUrl( $wgRequest->getVal( 'target' ) );
		$this->mTimestamps = (array)$wgRequest->getArray( 'timestamp' );
		if( is_null( $this->mTarget ) ) {
			// title and timestamps must go together
			$this->mTimestamps = array();
		}

		$this->mPopulated =
			!empty( $this->mRevisions ) ||
			!empty( $this->mTimestamps );

		$this->mReason = $wgRequest->getText( 'wpReason' );

		$submitted = $wgRequest->wasPosted() &&
			$wgRequest->getVal( 'action' ) == 'submit' &&
			$wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) );
		
		if( $this->mPopulated && $submitted ) {
			$this->submit();
		} elseif( $this->mPopulated ) {
			$this->showForm();
		} else {
			$this->showEmpty();
		}
	}

	/**
	 * If no revisions are specified, prompt for a revision id
	 */
	function showEmpty() {
		global $wgOut, $wgUser;
		$special = Title::makeTitle( NS_SPECIAL, 'HideRevision' );

		$wgOut->addHTML(
			Xml::openElement( 'form', array(
				'action' => $special->getLocalUrl(),
				'method' => 'post' ) ) .

			// Visible fields
			Xml::inputLabel( wfMsg( 'hiderevision-prompt' ), 'revision[]', 'wpRevision', 10 ) .
			"<br />" .
			Xml::inputLabel( wfMsg( 'hiderevision-reason' ), 'wpReason', 'wpReason', 60 ) .
			"<br />" .
			Xml::submitButton( wfMsg( 'hiderevision-continue' ), array( 'id' => 'mw-hiderevision-continue' ) ) .

			Xml::closeElement( 'form' ) );
	}

	/**
	 * Once a set of revisions have been selected,
	 * list them and request a reason/comment for confirmation.
	 */
	function showForm() {
		global $wgOut, $wgUser;
		$special = Title::makeTitle( NS_SPECIAL, 'HideRevision' );

		$wgOut->addWikiText( wfMsg( 'hiderevision-text' ) );
		$wgOut->addHTML(
			$this->revisionList() .

			$this->archiveList() .

			Xml::openElement( 'form', array(
				'action' => $special->getLocalUrl( 'action=submit' ),
				'method' => 'post' ) ) .

			// Visible fields
			"<br />" .
			Xml::inputLabel( wfMsg( 'hiderevision-reason' ), 'wpReason', 'wpReason', 60, $this->mReason ) .
			"<br />" .
			Xml::submitButton( wfMsg( 'hiderevision-submit' ), array( 'id' => 'mw-hiderevision-submit' ) ) .

			// Hidden fields
			$this->revisionFields() .
			Xml::hidden( 'wpEditToken', $wgUser->editToken() ) .

			Xml::closeElement( 'form' ) );
	}

	function revisionList() {
		if( !$this->mRevisions ) {
			return '';
		}

		$dbr = wfGetDB( DB_SLAVE );
		$result = $dbr->select(
			array( 'page', 'revision' ),
			'*, 0 AS rc_id, 1 AS rc_patrolled, 0 AS counter, 0 AS rc_old_len, 0 AS rc_new_len,
			NULL AS rc_log_action, 0 AS rc_deleted, 0 AS rc_logid, NULL AS rc_log_type, \'\' AS rc_params',
			array(
				'rev_id' => $this->mRevisions,
				'rev_page=page_id',
			),
			__METHOD__ );

		return $this->makeList( $dbr->resultObject( $result ) );
	}

	function makeList( $resultSet ) {
		global $IP, $wgUser;
		require_once( "$IP/includes/ChangesList.php" );
		$changes = ChangesList::newFromUser( $wgUser );

		$skin = $wgUser->getSkin();

		$out = $changes->beginRecentChangesList();
		while( $row = $resultSet->fetchObject() ) {
			$rc = RecentChange::newFromCurRow( $row );
			$rc->counter = 0; // ???
			$out .= $changes->recentChangesLine( $rc );
		}
		$out .= $changes->endRecentChangesList();

		$resultSet->free();
		return $out;
	}

	function archiveList() {
		if( !$this->mTarget || !$this->mTimestamps ) {
			return '';
		}

		$dbr = wfGetDB( DB_SLAVE );
		$result = $dbr->select(
			array( 'archive' ),
			array(
				'ar_namespace AS page_namespace',
				'ar_title AS page_title',
				'ar_comment AS rev_comment',
				'ar_user AS rev_user',
				'ar_user_text AS rev_user_text',
				'ar_timestamp AS rev_timestamp',
				'ar_minor_edit AS rev_minor_edit',
				'ar_rev_id AS rev_id',
				'0 AS rc_id',
				'1 AS rc_patrolled',
				'0 AS counter',
				'0 AS page_id',
				'0 AS page_is_new',
				'0 AS rc_old_len',
				'0 AS rc_new_len',
				'0 AS rc_deleted',
				'0 AS rc_logid',
				'NULL AS rc_log_type',
				'NULL AS rc_log_action',
				"'' AS rc_params"
			),
			array(
				'ar_namespace' => $this->mTarget->getNamespace(),
				'ar_title' => $this->mTarget->getDBkey(),
				'ar_timestamp' => array_map( array( $dbr, 'timestamp' ), $this->mTimestamps ),
			),
			__METHOD__ );

		return $this->makeList( $dbr->resultObject( $result ) );
	}

	function revisionFields() {
		$out = '';
		foreach( $this->mRevisions as $id ) {
			$out .= Xml::hidden( 'revision[]', $id );
		}
		if( $this->mTarget ) {
			$out .= Xml::hidden( 'target', $this->mTarget->getPrefixedDbKey() );
		}
		foreach( $this->mTimestamps as $timestamp ) {
			$out .= Xml::hidden( 'timestamp[]', wfTimestamp( TS_MW, $timestamp ) );
		}
		return $out;
	}

	/**
	 * Handle submission of deletion form
	 */
	function submit() {
		global $wgOut;
		if( !$this->mPopulated ) {
			$wgOut->addWikiText( wfMsg( 'hiderevision-norevisions' ) );
			$this->showForm();
		} elseif( empty( $this->mReason ) ) {
			$wgOut->addWikiText( wfMsg( 'hiderevision-noreason' ) );
			$this->showForm();
		} else {
			$dbw = wfGetDB( DB_MASTER );
			$success = $this->hideRevisions( $dbw );
			$wgOut->addWikiText( '* ' . implode( "\n* ", $success ) );
		}
	}

	/**
	 * Go kill the revisions and return status information.
	 * @param $dbw database
	 * @return array of wikitext strings with success/failure messages
	 */
	function hideRevisions( $dbw ) {
		// Live revisions
		foreach( $this->mRevisions as $id ) {
			$success[] = wfMsgHTML( 'hiderevision-status', $id,
				wfMsgHTML( $this->hideRevision( $dbw, $id ) ) );
		}

		// Archived revisions
		foreach( $this->mTimestamps as $timestamp ) {
			global $wgLang;
			$success[] = wfMsgHTML( 'hiderevision-archive-status',
				$wgLang->timeanddate( $timestamp ),
				wfMsgHTML( $this->hideArchivedRevision( $dbw, $timestamp ) ) );
		}
		return $success;
	}

	/**
	 * Actually go in the database and kill things.
	 * @return message key string for success or failure message
	 */
	function hideRevision( $dbw, $id ) {
		global $wgUser;

		$dbw->begin();

		$rev = Revision::newFromId( $id );
		if( is_null( $rev ) ) {
			$dbw->rollback();
			return 'hiderevision-error-missing';
		}
		if( $rev->isCurrent() ) {
			$dbw->rollback();
			return 'hiderevision-error-current';
		}
		$title = $rev->getTitle();

		// Our tasks:
		// Copy revision to "hidden" table
		$this->InsertRevision( $dbw, $title, $rev );

		if( $dbw->affectedRows() != 1 ) {
			$dbw->rollback();
			return 'hiderevision-error-delete';
		}

		// Remove from "revision"
		$dbw->delete( 'revision', array( 'rev_id' => $id ), __METHOD__ );

		// Remove from "recentchanges"
		// The page ID is used to get us a relatively usable index
		$dbw->delete( 'recentchanges',
			array(
				'rc_cur_id'     => $rev->getPage(),
				'rc_this_oldid' => $id
			),
			__METHOD__ );

		// Invalidate cache of page history
		$title->invalidateCache();

		// Done with all database pieces; commit!
		$dbw->immediateCommit();

		// Also purge remote proxies.
		// Ideally this would be built into the above, but squid code is
		// old crappy style.
		global $wgUseSquid;
		if ( $wgUseSquid ) {
			// Send purge
			$update = SquidUpdate::newSimplePurge( $title );
			$update->doUpdate();
		}

		return 'hiderevision-success';
	}

	function hideArchivedRevision( $dbw, $timestamp ) {
		$archive = new PageArchive( $this->mTarget );
		$rev = $archive->getRevision( $timestamp );
		if( !$rev ) {
			$dbw->rollback();
			return 'hiderevision-error-missing';
		}

		$this->insertRevision( $dbw, $this->mTarget, $rev );
		if( $dbw->affectedRows() != 1 ) {
			$dbw->rollback();
			return 'hiderevision-error-delete';
		}

		$dbw->delete( 'archive', array(
			'ar_namespace' => $this->mTarget->getNamespace(),
			'ar_title'     => $this->mTarget->getDBkey(),
			'ar_timestamp' => $dbw->timestamp( $timestamp ) ),
			__METHOD__ );

		$dbw->commit();
		return 'hiderevision-success';
	}

	function insertRevision( $dbw, $title, $rev ) {
		global $wgUser;
		return $dbw->insert( 'hidden',
			array(
				'hidden_page'       => $rev->getPage(),
				'hidden_namespace'  => $title->getNamespace(),
				'hidden_title'      => $title->getDBkey(),

				'hidden_rev_id'     => $rev->getId(),
				'hidden_text_id'    => $rev->getTextId(),

				'hidden_comment'    => $rev->getRawComment(),
				'hidden_user'       => $rev->getRawUser(),
				'hidden_user_text'  => $rev->getRawUserText(),
				'hidden_timestamp'  => $dbw->timestamp( $rev->getTimestamp() ),
				'hidden_minor_edit' => $rev->isMinor() ? 1 : 0,
				'hidden_deleted'    => $rev->mDeleted, // FIXME: private field access

				'hidden_by_user'      => $wgUser->getId(),
				'hidden_on_timestamp' => $dbw->timestamp(),
				'hidden_reason'       => $this->mReason,
			),
			__METHOD__,
			array( 'IGNORE' ) );
	}
}

class SpecialOversight extends SpecialPage {

	function __construct(){
		wfLoadExtensionMessages('HideRevision');
		parent::__construct( 'Oversight', 'oversight' );
	}

	/**
	 * Special page handler function for Special:Oversight
	 */
	function execute( $par ) {
		global $wgRequest, $wgUser;

		$this->setHeaders();

		if( !$this->userCanExecute( $wgUser ) ){
			$this->displayRestrictionError();
			return;
		}

		$this->outputHeader();
		$page = $wgRequest->getVal( 'page' );
		$user = $wgRequest->getVal( 'user' );
		$offender = $wgRequest->getVal( 'author' );
		$revision = $wgRequest->getIntOrNull( 'revision' );
		if( $wgRequest->getCheck( 'diff' ) && !is_null( $revision )) {
			$this->showDiff( $revision);
		} else if( is_null( $revision ) ) {
			$this->showList( $page, $user, $offender );
		} else {
			$this->showRevision( $revision );
		}
	}

	function showList( $page, $user, $offender ) {
		global $wgOut, $wgScript, $wgTitle;
		
		$title = Title::newFromUrl( $page );
		$u = User::newFromName( $user );
		$page = $title ? $page : ''; // blank invalid titles

		$wgOut->addHTML(
			Xml::openElement( 'form', array( 'action' => $wgScript, 'method' => 'get', 'id' => 'mw-hiderevision-form' ) ) .
			Xml::fieldset( wfMsg( 'oversight-legend' ) ) .
			Xml::hidden( 'title', $wgTitle->getPrefixedDbKey() ) .
			Xml::inputLabel( wfMsg( 'oversight-oversighter' ), 'user', 'mw-oversight-user', 20, $user ) . ' ' .
			Xml::inputLabel( wfMsg( 'speciallogtitlelabel' ), 'page', 'mw-oversight-page', 25, $page ) . ' ' .
			Xml::inputLabel( wfMsg( 'oversight-offender' ), 'author', 'mw-oversight-author', 20, $offender ) . ' ' .
			Xml::submitButton( wfMsg( 'allpagessubmit' ), array( 'id' => 'mw-oversight-submit' ) ) .
			Xml::closeElement( 'fieldset' ) .
			Xml::closeElement( 'form' )
		);

		$pager = new HiddenRevisionsPager( $this, array(), $title, $u, $offender );
		if( $pager->getNumRows() ) {
			$wgOut->addHTML( wfMsgExt('oversight-header', array('parse') ) );
			$wgOut->addHTML( $pager->getNavigationBar() );
			$wgOut->addHTML( $pager->getBody() );
			$wgOut->addHTML( $pager->getNavigationBar() );
		} else {
			$wgOut->addHTML( wfMsgExt('specialpage-empty', array('parse') ) );
		}
	}

	function getRevisions( $db, $condition ) {
		return $db->select(
			array( 'hidden', 'user' ),
			$this->getSelectFields(),
			array_merge(
				$condition,
				array( 'hidden_by_user=user_id' ) ),
			__METHOD__,
			array(
				'ORDER BY' => 'hidden_on_timestamp DESC' ) );
	}
	
	public function getSelectFields() {
		return array( 'hidden_page as page_id',
			'hidden_namespace as page_namespace',
			'hidden_title as page_title',

			'hidden_page as rev_page',
			'hidden_comment as rev_comment',
			'hidden_user as rev_user',
			'hidden_user_text as rev_user_text',
			'hidden_timestamp as rev_timestamp',
			'hidden_minor_edit as rev_minor_edit',
			'hidden_deleted as rev_deleted',
			'hidden_rev_id as rev_id',
			'hidden_text_id as rev_text_id',

			'0 as rev_len',

			'hidden_by_user',
			'hidden_on_timestamp',
			'hidden_reason',

			'user_name',

			'0 as page_is_new',
			'0 as rc_id',
			'1 as rc_patrolled',
			'0 as rc_old_len',
			'0 as rc_new_len',
			'0 as rc_params',

			'NULL AS rc_log_action',
			'0 AS rc_deleted',
			'0 AS rc_logid',
			'NULL AS rc_log_type',
			'NULL AS rev_parent_id'
		);
	}

	function listRow( $row ) {
		global $wgUser, $wgLang;
		$skin = $wgUser->getSkin();
		$self = $this->getTitle();
		$userPage = Title::makeTitle( NS_USER, $row->user_name );
		$victim = Title::makeTitle( $row->page_namespace, $row->page_title );
		return "<li>(" .
			$skin->makeKnownLinkObj( $self, wfMsgHTML( 'oversight-view' ),
				'revision=' . $row->rev_id ) .
			") " .
			"(" .
			$skin->makeKnownLinkObj( $self, wfMsgHTML( 'diff' ),
				'revision=' . $row->rev_id . '&diff=1') .
			") " .
			$wgLang->timeanddate( wfTimestamp( TS_MW, $row->hidden_on_timestamp ) ) .
			" " .
			$skin->makeLinkObj( $userPage, htmlspecialchars( $userPage->getText() ) ) .
			" " .
			wfMsgHTML( 'oversight-log-hiderev', $skin->makeLinkObj( $victim ) ) .
			" " .
			$skin->commentBlock( $row->hidden_reason ) .
			"</li>\n";
	}

	function showRevision( $revision ) {
		global $wgOut;

		$dbr = wfGetDB( DB_SLAVE );
		$result = $this->getRevisions( $dbr, array( 'hidden_rev_id' => $revision ) );

		while( $row = $dbr->fetchObject( $result ) ) {
			$info = $this->listRow( $row );
			$list = $this->revisionInfo( $row );
			$rev = new Revision( $row );
			$text = $rev->getText();
			$wgOut->addHTML(
				"<ul>" .
				$info .
				"</ul>\n" .
				$list );
			if ( $text === false ) {
				$wgOut->addWikiText(wfmsg('hiderevision-error-missing'));
			} else {
				$wgOut->addHTML(
					"<div>" .
					Xml::openElement( 'textarea',
						array(
							'cols' => 80,
							'rows' => 25,
							'wrap' => 'virtual',
							'readonly' => 'readonly' ) ) .
					htmlspecialchars( $text ) .
					Xml::closeElement( 'textarea' ) .
					"</div>" );
			}
		}
		$dbr->freeResult( $result );
	}

	function revisionInfo( $row ) {
		global $wgUser;
		$changes = ChangesList::newFromUser( $wgUser );
		$out = $changes->beginRecentChangesList();
		$rc = RecentChange::newFromCurRow( $row );
		$rc->counter = 0; // ???
		$out .= $changes->recentChangesLine( $rc );
		$out .= $changes->endRecentChangesList();
		return $out;
	}

	function showDiff( $revision ){
		global $wgOut;

		$dbr = wfGetDB( DB_SLAVE );
		$result = $this->getRevisions( $dbr, array( 'hidden_rev_id' => $revision ) );

		while( $row = $dbr->fetchObject( $result ) ) {
			$info = $this->listRow( $row );
			$list = $this->revisionInfo( $row );
			$rev = new Revision( $row );
			$rev->mTitle = Title::makeTitle( $row->page_namespace, $row->page_title );
			$prevId = $rev->mTitle->getPreviousRevisionID( $row->rev_id );
			if ( $prevId ) {
				$prev = Revision::newFromTitle( $rev->mTitle, $prevId );
				if( $prev ) {
					$otext = strval( $prev->getText());
				} else {
					$otext = '';
				}
			} else {
				$wgOut->addHTML(
				"<ul>" .
				$info .
				"</ul>\n" .
				$list );
				$wgOut->addWikiText( wfMsgNoTrans( 'oversight-nodiff' ) );
				return;
			}
			$ntext = strval( $rev->getText());

			$diffEngine = new DifferenceEngine();
			$diffEngine->showDiffStyle();
			$wgOut->addHTML(
				"<ul>" .
				$info .
				"</ul>\n" .
				$list .
				"<p><strong>" .
				wfMsgHTML('oversight-difference') .
				"</strong>" .
				"</p>" .
				"<div>" .
				"<table border='0' width='98%' cellpadding='0' cellspacing='4' class='diff'>" .
				"<col class='diff-marker' />" .
				"<col class='diff-content' />" .
				"<col class='diff-marker' />" .
				"<col class='diff-content' />" .
				"<tr>" .
					"<td colspan='2' width='50%' align='center' class='diff-otitle'>" . wfMsgHTML('oversight-prev') . " (#$prevId)" . "</td>" .
					"<td colspan='2' width='50%' align='center' class='diff-ntitle'>" . wfMsgHTML('oversight-hidden') . "</td>" .
				"</tr>" .
				$diffEngine->generateDiffBody( $otext, $ntext ) .
				"</table>" .
				"</div>\n" );
		}
		$dbr->freeResult( $result );
	}
}
	
/**
 * Query to list out stable versions for a page
 */
class HiddenRevisionsPager extends ReverseChronologicalPager {
	public $mForm, $mConds, $namespace, $dbKey, $uid;

	function __construct( $form, $conds = array(), $title = NULL, $user = NULL, $offender = '' ) {
		$this->mForm = $form;
		$this->mConds = $conds;
		$this->namespace = $title ? $title->getNamespace() : -1;
		$this->dbKey = $title ? $title->getDBKey() : null;
		$this->uid = $user ? $user->getId() : null;
		if ( strlen($offender) ) {
			$offender = User::newFromName( $offender );
			$this->author = is_null( $offender ) ? '' : $offender->getName();
		} else {
			$this->author = null;
		}

		parent::__construct();
	}

	function formatRow( $row ) {
		return $this->mForm->listRow( $row );
	}

	function getQueryInfo() {
		$conds = $this->mConds;
		$conds[] = 'hidden_by_user = user_id';
		if( $this->namespace >= 0 && $this->dbKey ) {
			$conds['hidden_namespace'] = $this->namespace;
			$conds['hidden_title'] = $this->dbKey;
		}
		if( !is_null($this->uid) ) {
			$conds['hidden_by_user'] = $this->uid;
		}
		if( !is_null($this->author) ) {
			$conds['hidden_user_text'] = $this->author;
		}
		$indexes = array( 'hidden' => array('hidden_on_timestamp','page_title_timestamp','hidden_by_user') );
		return array(
			'tables'  => array('hidden','user'),
			'fields'  => $this->mForm->getSelectFields(),
			'conds'   => $conds,
			'options' => array( 'USE INDEX' => $indexes )
		);
	}

	function getIndexField() {
		return 'hidden_on_timestamp';
	}
	
	function getStartBody() {
		wfProfileIn( __METHOD__ );
		# Do a link batch query
		$lb = new LinkBatch();
		while( $row = $this->mResult->fetchObject() ) {
			$lb->add( $row->page_namespace, $row->page_title );
		}
		$lb->execute();
		wfProfileOut( __METHOD__ );
		return '<ul>';
	}
	
	function getEndBody() {
		return '</ul>';
	}
}
