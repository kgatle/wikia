<?php
global $wgExtensionMessagesFiles;
$wgExtensionMessagesFiles['WikiaVideo'] = dirname(__FILE__).'/WikiaVideo.i18n.php';

class VideoPage extends Article {

	const V_GAMETRAILERS = 0;
	const V_GAMEVIDEOS = 1;
	const V_GAMESPOT = 2;
	const V_MTVGAMES = 3;
	const V_5MIN = 4;
	const V_YOUTUBE = 5;
	const V_HULU = 6;
	const V_VEOH = 7;
	const V_FANCAST = 8;
	const V_IN2TV = 9;
	const V_BLIPTV = 10;
	const V_METACAFE = 11;
	const V_SEVENLOAD = 12;
	const V_VIMEO = 13;
	const V_CLIPFISH = 14;
	const V_MYVIDEO = 15;
	const V_SOUTHPARKSTUDIOS = 16;

	var	$mName,
		$mVideoName,
		$mId,
		$mProvider,
		$mData,
		$mDataline;

	function __construct(&$title){
		wfLoadExtensionMessages('WikiaVideo');
		parent::__construct(&$title);
	}

	function render() {
		global $wgOut;
		$wgOut->setArticleBodyOnly(true);
		parent::view();
	}

	function delete() {
		// content moved to doDelete
		parent::delete();	
	}

	// wrapper for deletion - two modes, total (deletes article plus all history) or one chosen old history (file) revision
	public function doDelete( $reason, $suppress = false ) {
		global $wgOut, $wgUser, $wgRequest, $wgLang;

		$wgRequest->getVal( 'wpOldVideo' ) ? $oldvideo = $wgRequest->getVal( 'wpOldVideo' ) : $oldvideo = false ;

		if( !$oldvideo ) { 
			// move the history to filearchive
			$this->doDBInserts();
			// and clean it up
			$this->doDBDeletes();	
			// delete the article itself
			parent::doDelete( $reason, $suppress );	

			// clean up cache for all articles that linked to this one
			$title = $this->mTitle;
			if ( $title ) {
				$update = new VideoHTMLCacheUpdate( $title, 'imagelinks' );
				$update->doUpdate();
			}
		} else {
			// delete just this one "file" revision, the article remains intact
			$this->doDBInserts( $oldvideo );
			$this->doDBDeletes( $oldvideo );				

			// supply info about what we have done
			$this->load();
			$data = array(
					$this->mProvider,
					$this->mId,
					$this->mData[0]
				     );
			$data = implode( ",", $data ) ;
			$url = self::getUrl( $data );

			$wgOut->addHTML( wfMsgExt(
						"wikiavideo-deleted-old",
						'parse',
						$url,
						$this->mTitle->getText(),
						$wgLang->date( $oldvideo, true ),
						$wgLang->time( $oldvideo, true )
						) );

			$log = new LogPage( 'delete' );
			$logComment = wfMsgForContent( 'deletedrevision', $oldvideo );
			if( trim( $reason ) != '' )
				$logComment .= ": {$reason}";
			$log->addEntry( 'delete', $this->mTitle, $logComment );

			$this->doPurge();
			$wgOut->addReturnTo( $this->mTitle );
		}
	}

	public function confirmDelete( $reason ) {
		global $wgOut, $wgUser, $wgRequest, $wgLang;

		wfDebug( "VideoPage::confirmDelete\n" );

		$wgRequest->getVal( 'oldvideo' ) ? $oldvideo = $wgRequest->getVal( 'oldvideo' ) : $oldvideo = '';

		$wgOut->setSubtitle( wfMsgHtml( 'delete-backlink', $wgUser->getSkin()->makeKnownLinkObj( $this->mTitle ) ) );
		$wgOut->setRobotPolicy( 'noindex,nofollow' );
		if( '' == $oldvideo ) {
			$wgOut->addWikiMsg( 'confirmdeletetext' );
		} else {
			// supply info about what we have done
			$this->load();
			$data = array(
					$this->mProvider,
					$this->mId,
					$this->mData[0]
				     );
			$data = implode( ",", $data ) ;
			$url = self::getUrl( $data );

			$wgOut->addHTML( wfMsgExt(
                                "wikiavideo-intro-old",
                                'parse',
                                $url,
                                $wgLang->date( $oldvideo, true ),
                                $wgLang->time( $oldvideo, true ),
				self::getOldUrl( $this->mTitle, $oldvideo ),
				$this->mTitle->getText()				
                                ) );			
		}

		if( $wgUser->isAllowed( 'suppressrevision' ) ) {
			$suppress = "<tr id=\"wpDeleteSuppressRow\" name=\"wpDeleteSuppressRow\">
				<td></td>
				<td class='mw-input'>" .
				Xml::checkLabel( wfMsg( 'revdelete-suppress' ),
						'wpSuppress', 'wpSuppress', false, array( 'tabindex' => '4' ) ) .
				"</td>
				</tr>";
		} else {
			$suppress = '';
		}
		$checkWatch = $wgUser->getBoolOption( 'watchdeletion' ) || $this->mTitle->userIsWatching();

		$form = Xml::openElement( 'form', array( 'method' => 'post',
					'action' => $this->mTitle->getLocalURL( 'action=delete' ), 'id' => 'deleteconfirm' ) ) .
			Xml::openElement( 'fieldset', array( 'id' => 'mw-delete-table' ) ) .
			Xml::tags( 'legend', null, wfMsgExt( 'delete-legend', array( 'parsemag', 'escapenoentities' ) ) ) .
			Xml::openElement( 'table', array( 'id' => 'mw-deleteconfirm-table' ) ) .
			"<tr id=\"wpDeleteReasonListRow\">
			<td class='mw-label'>" .
			Xml::label( wfMsg( 'deletecomment' ), 'wpDeleteReasonList' ) .
			"</td>
			<td class='mw-input'>" .
			Xml::listDropDown( 'wpDeleteReasonList',
					wfMsgForContent( 'deletereason-dropdown' ),
					wfMsgForContent( 'deletereasonotherlist' ), '', 'wpReasonDropDown', 1 ) .
			"</td>
			</tr>
			<tr id=\"wpDeleteReasonRow\">
			<td class='mw-label'>" .
			Xml::label( wfMsg( 'deleteotherreason' ), 'wpReason' ) .
			"</td>
			<td class='mw-input'>" .
			Xml::input( 'wpReason', 60, $reason, array( 'type' => 'text', 'maxlength' => '255',
						'tabindex' => '2', 'id' => 'wpReason' ) ) .
			"</td>
			</tr>
			<tr>
			<td></td>
			<td class='mw-input'>" .
			Xml::checkLabel( wfMsg( 'watchthis' ),
					'wpWatch', 'wpWatch', $checkWatch, array( 'tabindex' => '3' ) ) .
			"</td>
			</tr>
			$suppress
			<tr>
			<td></td>
			<td class='mw-submit'>" .
			Xml::submitButton( wfMsg( 'deletepage' ),
					array( 'name' => 'wpConfirmB', 'id' => 'wpConfirmB', 'tabindex' => '5' ) ) .
			"</td>
			</tr>" .
			Xml::closeElement( 'table' ) .
			Xml::closeElement( 'fieldset' ) .
			Xml::hidden( 'wpEditToken', $wgUser->editToken() ) .
			Xml::hidden( 'wpOldVideo', $oldvideo ) .			
			Xml::closeElement( 'form' );

		if( $wgUser->isAllowed( 'editinterface' ) ) {
			$skin = $wgUser->getSkin();
			$link = $skin->makeLink ( 'MediaWiki:Deletereason-dropdown', wfMsgHtml( 'delete-edit-reasonlist' ) );
			$form .= '<p class="mw-delete-editreasons">' . $link . '</p>';
		}

		$wgOut->addHTML( $form );
		LogEventsList::showLogExtract( $wgOut, 'delete', $this->mTitle->getPrefixedText() );
	}

	// handles main video page viewing - two modes, for existing page and for non-existing (not created, deleted...) 
	function view() {
		global $wgOut, $wgUser, $wgRequest;

		if($this->getID()) { // existing video

			$wgOut->addHTML($this->showTOC(''));
			$this->openShowVideo();
			$this->showVideoInfoLine();

			wfRunHooks('WikiaVideo::View:BlueLink');

			Article::view();

			$this->videoHistory();
			$wgOut->addHTML('<br/>');
			$wgOut->addHTML(Xml::element('h2', array('id' => 'filelinks'), wfMsg('wikiavideo-links'))."\n");
			$this->videoLinks();

		} else { // not existing video

			# Just need to set the right headers
			$wgOut->setArticleFlag(true);
			$wgOut->setRobotpolicy('noindex,nofollow');
			$wgOut->setPageTitle($this->mTitle->getPrefixedText());

			wfRunHooks('WikiaVideo::View:RedLink');

			$wgOut->addHTML('<br/>');
			$wgOut->addHTML(Xml::element('h2', array('id' => 'filelinks'), wfMsg('wikiavideo-links'))."\n");
			$this->videoLinks();
			$this->viewUpdates();
		}
	}

	function doCleanup () {
		global $wgUser;
		// when we have a non-existing article (deleted) and upload a new video, perform cleanup for earlier image and oldimage versions
		// if necessary
		$fname = get_class( $this ) . '::' . __FUNCTION__;

		$dbr = wfGetDB( DB_SLAVE );
		// if we had at least one revision in image, that means we have to do this
		// remember, this was deleted
		$row = $dbr->selectRow(
			'image',
			'img_name',
			array(
				'img_name = ' . $dbr->addQuotes( self::getNameFromTitle( $this->mTitle ) ) .' OR img_name = ' . $dbr->addQuotes( $this->mTitle->getPrefixedText() ),
			),
			$fname
		);
		
		if(!$row) {
			return; // no need to run 
		}			

		// move anything from image and oldimage into filearchive, because it wasn't moved before
		$this->doDBInserts();
		$this->doDBDeletes();	
	}

	// take all given video's records from image and oldimage and put into filearchive or just one single old revision
	// performs old format correction along the way	
	function doDBInserts( $oldvideo = false ) {
		global $wgUser;

		$dbw = wfGetDB( DB_MASTER );
		$encTimestamp = $dbw->addQuotes( $dbw->timestamp() );
		$encUserId = $dbw->addQuotes( $wgUser->getId() );
		$encReason = $dbw->addQuotes( $this->reason );
		$encGroup = 'deleted';

		// cater for older format, gather first, insert then

		if( !$oldvideo ) {

			$conditions = array( 'img_name = ' . $dbw->addQuotes( self::getNameFromTitle( $this->mTitle ) ) .' OR img_name = ' . $dbw->addQuotes( $this->mTitle->getPrefixedText() ) );

			$result = $dbw->select( 'image', '*',
					$conditions,
					__METHOD__,
					array( 'ORDER BY' => 'img_timestamp DESC' )
					);

			$insertBatch = array();
			$archiveName = '';
			$first = true;

			while( $row = $dbw->fetchObject( $result ) ) {
				if( $first ) { // this is our new current revision
					$insertCurrent = array(
							'fa_storage_group' => $encGroup,
							'fa_storage_key'   => "",
							'fa_deleted_user'      => $encUserId,
							'fa_deleted_timestamp' => $encTimestamp,
							'fa_deleted_reason'    => $encReason,
							'fa_deleted'               => 0, //todo check

							'fa_name'         => self::getNameFromTitle( $this->mTitle ),
							'fa_archive_name' => 'NULL',
							'fa_size'         => $row->img_size,
							'fa_width'        => $row->img_width,
							'fa_height'       => $row->img_height,
							'fa_metadata'     => $row->img_metadata,
							'fa_bits'         => $row->img_bits,
							'fa_media_type'   => $row->img_media_type,
							'fa_major_mime'   => $row->img_major_mime,
							'fa_minor_mime'   => $row->img_minor_mime,
							'fa_description'  => $row->img_description,
							'fa_user'         => $row->img_user,
							'fa_user_text'    => $row->img_user_text,
							'fa_timestamp'    => $row->img_timestamp
								);
				} else {
					$insertBatchImg = array(
							'fa_storage_group' => $encGroup,
							'fa_storage_key'   => "",
							'fa_deleted_user'      => $encUserId,
							'fa_deleted_timestamp' => $encTimestamp,
							'fa_deleted_reason'    => $encReason,
							'fa_deleted'               => 0, //todo check

							'fa_name'         => self::getNameFromTitle( $this->mTitle ),
							'fa_archive_name' => $archiveName, // todo check
							'fa_size'         => $row->img_size,
							'fa_width'        => $row->img_width,
							'fa_height'       => $row->img_height,
							'fa_metadata'     => $row->img_metadata,
							'fa_bits'         => $row->img_bits,
							'fa_media_type'   => $row->img_media_type,
							'fa_major_mime'   => $row->img_major_mime,
							'fa_minor_mime'   => $row->img_minor_mime,
							'fa_description'  => $row->img_description,
							'fa_user'         => $row->img_user,
							'fa_user_text'    => $row->img_user_text,
							'fa_timestamp'    => $row->img_timestamp
								);
				}
				$deleteIds[] = $row->fa_id;
				$first = false;
			}

			if ( $insertCurrent ) {
				$dbw->insert( 'filearchive', $insertCurrent, __METHOD__ );
			}
			if ( $insertBatchImg ) {
				$dbw->insert( 'filearchive', $insertBatchImg, __METHOD__ );
			}

			$where = array( 'oi_name = ' . $dbw->addQuotes( self::getNameFromTitle( $this->mTitle ) ) .' OR oi_name = ' . $dbw->addQuotes( $this->mTitle->getPrefixedText()) );

		} else { // single old revision to delete
			$where = array(
				'oi_name = ' . $dbw->addQuotes( self::getNameFromTitle( $this->mTitle ) ) .' OR oi_name = ' . $dbw->addQuotes( $this->mTitle->getPrefixedText()),
				'oi_timestamp' => $oldvideo
			);

		}
		$encGroup = $dbw->addQuotes( 'deleted' );

		$dbw->insertSelect( 'filearchive', 'oldimage',
				array(
					'fa_storage_group' => $encGroup,
					'fa_storage_key'   => "''",
					'fa_deleted_user'      => $encUserId,
					'fa_deleted_timestamp' => $encTimestamp,
					'fa_deleted_reason'    => $encReason,
					'fa_name'         => $dbw->addQuotes( self::getNameFromTitle( $this->mTitle ) ),
					'fa_archive_name' => 'oi_archive_name',
					'fa_size'         => 'oi_size',
					'fa_width'        => 'oi_width',
					'fa_height'       => 'oi_height',
					'fa_metadata'     => 'oi_metadata',
					'fa_bits'         => 'oi_bits',
					'fa_media_type'   => 'oi_media_type',
					'fa_major_mime'   => 'oi_major_mime',
					'fa_minor_mime'   => 'oi_minor_mime',
					'fa_description'  => 'oi_description',
					'fa_user'         => 'oi_user',
					'fa_user_text'    => 'oi_user_text',
					'fa_timestamp'    => 'oi_timestamp',
					'fa_deleted'      => 0 // todo check
						), $where, __METHOD__ );


	}

	// delete all given video's records from image and oldimage or just one single old revision
	// complementary function for doDBInserts
	function doDBDeletes( $oldvideo = false ) {
		$dbw = wfGetDB( DB_MASTER );				

		if (!$oldvideo ) {
			// clear current rev
			$dbw->delete( 'image', array( 'img_name = ' . $dbw->addQuotes( self::getNameFromTitle( $this->mTitle ) ) .' OR img_name = ' . $dbw->addQuotes( $this->mTitle->getPrefixedText()) ), __METHOD__ );
			// clear all old revisions
			$where =  array( 'oi_name = ' . $dbw->addQuotes( self::getNameFromTitle( $this->mTitle ) ) .' OR oi_name = ' . $dbw->addQuotes( $this->mTitle->getPrefixedText())  );
		} else { // clear just one given old revision
			$where =  array(
				'oi_name = ' . $dbw->addQuotes( self::getNameFromTitle( $this->mTitle ) ) .' OR oi_name = ' . $dbw->addQuotes( $this->mTitle->getPrefixedText()),
				'oi_timestamp' => $oldvideo
			);			
		}
		
		// clear old revs
		$dbw->delete( 'oldimage', $where, __METHOD__ );

	}

	function showTOC($metadata) {
		global $wgLang;
		$r = '<ul id="filetoc"><li><a href="#file">'.$wgLang->getNsText(NS_VIDEO).'</a></li><li><a href="#filehistory">'.wfMsgHtml( 'filehist' ).'</a></li>'.($metadata ? '<li><a href="#metadata">'.wfMsgHtml('metadata').'</a></li>' : '').'</ul>';
		return $r;
	}

	function getContent() {
		return Article::getContent();
	}

	public function generateWindow($align, $width, $caption, $thumb, $frame) {
		global $wgStylePath;

		if ($frame) { // frame has always native width
			$ratios = split( "x", $this->getTextRatio() );
			$width = intval( trim( $ratios[0] ) );					
		}

		$code = $this->getEmbedCode($width);

		if(empty($thumb)) {
			return "<div class=\"t{$align}\" style=\"width:{$width}px\">{$code}</div>";
		}

		$url = $this->mTitle->getLocalURL('');

		$s = <<<EOD
<div class="thumb t{$align}">
	<div class="thumbinner" style="width:{$width}px;">
		{$code}
		<div class="thumbcaption">
			<div class="magnify"><a href="{$url}" class="internal"><img src="{$wgStylePath}/common/images/magnify-clip.png" width="15" height="11" alt="" /></a></div>
			$caption
		</div>
	</div>
</div>
EOD;
		return str_replace("\n", ' ', $s); // TODO: Figure out what for this string replace is
	}

	public function generateWysiwygWindow($refid, $title, $align, $width, $caption, $thumb) {
		global $wgStylePath, $wgWysiwygMetaData;

		$code = $this->getThumbnailCode($width);

		// fill  meta data
		$wgWysiwygMetaData[$refid]['href'] = !empty($title) ? $title->getPrefixedText() : '';
		$wgWysiwygMetaData[$refid]['align'] = $align;
		if (!empty($width)) $wgWysiwygMetaData[$refid]['width'] = intval($width);

		if(empty($thumb)) {
			return "<div class=\"t{$align}\" refid=\"{$refid}\" style=\"position:relative;width:{$width}px\">{$code}</div>";
		}

		if ($caption != '') $wgWysiwygMetaData[$refid]['caption'] = $caption;

		$wgWysiwygMetaData[$refid]['thumb'] = 1;

		$url = $this->mTitle->getLocalURL('');

		$s = <<<EOD
<div class="thumb t{$align}" refid="{$refid}" style="position:relative">
	<div class="thumbinner" style="width:{$width}px;">
		{$code}
		<div class="thumbcaption">
			<div class="magnify"><a href="{$url}" class="internal"><img src="{$wgStylePath}/common/images/magnify-clip.png" width="15" height="11" alt="" /></a></div>
			$caption
		</div>
	</div>
</div>
EOD;
		return str_replace("\n", ' ', $s); // TODO: Figure out what for this string replace is

	}

	public function parseUrl($url, $load = true) { // TODO: Consider renaming to loadFromURL
		$provider = '';
		$id = '';

		$url = trim($url);

		$fixed_url = strtoupper( $url );
		$test = strpos( $fixed_url, "HTTP://" );
		if( !false === $test ) {
			return false;
		}

		$fixed_url = str_replace( "HTTP://", "", $fixed_url );
		$fixed_parts = split( "/", $fixed_url );
		$fixed_url = $fixed_parts[0];

		$text = strpos( $fixed_url, "METACAFE.COM" );
		if( false !== $text ) { // metacafe
			$provider = self::V_METACAFE;
			// reuse some NY stuff for now
			$standard_url = strpos( strtoupper( $url ), "HTTP://WWW.METACAFE.COM/WATCH/" );
			if( false !== $standard_url ) {
				$id = substr( $url , $standard_url+ strlen("HTTP://WWW.METACAFE.COM/WATCH/") , strlen($url) );
				$last_char = substr( $id,-1 ,1 );

				if($last_char == "/"){
					$id = substr( $id , 0 , strlen($id)-1 );
				}

				if ( !( false !== strpos( $id, ".SWF" ) ) ) {
					$id .= ".swf";
				}

				$data = split( "/", $id );
				if (is_array( $data ) ) {
					$this->mProvider = $provider;
					$this->mId = $data[0];
					$this->mData = array( $data[1] );
					return true;
				}
			}
		}
		$text = strpos( $fixed_url, "YOUTUBE.COM" );
		if( false !== $text ) { // youtube
			$provider = self::V_YOUTUBE;
			// reuse some NY stuff for now
			$standard_url = strpos( strtoupper( $url ), "WATCH?V=");

			if( $standard_url !== false){
				$id = substr( $url , $standard_url+8, strlen($url) );
			} else {
				return false;
			}
			if(!$id){
				$id_test = str_replace("http://www.youtube.com/v/","",$url);
				if( $id_test != $url ){
					$id = $id_test;
				}
			}
			$this->mProvider = $provider;
			$this->mId = $id;
			$this->mData = array();
			return true;
		}

		$text = strpos( $fixed_url, "SEVENLOAD.COM" );
		if( false !== $text ) { // sevenload
			$provider = self::V_SEVENLOAD;
			$parsed = split( "/", $url );
			$id = array_pop( $parsed );
			$parsed_id = split( "-", $id );
			if( is_array( $parsed_id ) ) {
				$this->mProvider = $provider;
				$this->mId = $parsed_id[0];
				array_shift( $parsed_id );
				$this->mData = array(
					'-' . implode( "-", $parsed_id )
				);
				return true;
			}
		}

		$text = strpos( $fixed_url, "MYVIDEO.DE" );
		if( false !== $text ) { // myvideo
			$provider = self::V_MYVIDEO;
			$parsed = split( "/", $url );
			if( is_array( $parsed ) ) {
				$mdata = array_pop( $parsed );
				$this->mProvider = $provider;
				$this->mId = array_pop( $parsed );
				$this->mData = array(
						$mdata
				);
				return true;
			}
		}

		$text = strpos( $fixed_url, "GAMEVIDEOS.1UP.COM" );
		if( false !== $text ) { // gamevideos
			$provider = self::V_GAMEVIDEOS;
			$parsed = split( "/", $url );
			if( is_array( $parsed ) ) {
				$this->mProvider = $provider;
				$this->mId = array_pop( $parsed );
				$this->mData = array();
				return true;
			}
		}


		$text = strpos( $fixed_url, "VIMEO.COM" );
		if( false !== $text ) { // vimeo
			$provider = self::V_VIMEO;
			$parsed = split( "/", $url );
			if( is_array( $parsed ) ) {
				$this->mProvider = $provider;
				$this->mId = array_pop( $parsed );
				$this->mData = array();
				return true;
			}
		}

		$text = strpos( $fixed_url, "5MIN.COM" );
		if( false !== $text ) { // 5min
			$provider = self::V_5MIN;
			$parsed = split( "/", $url );
			if( is_array( $parsed ) ) {
				$this->mProvider = $provider;
				$ids = array_pop( $parsed );
				$parsed_twice = split( "-", $ids );
				$this->mId = array_pop( $parsed_twice );
				$this->mData = array(
						implode( '-', $parsed_twice ) . '-'
					);
				return true;
			}
		}

                $text = strpos( $fixed_url, "SOUTHPARKSTUDIOS.COM" );
                if( false !== $text ) { // southparkstudios
                        $provider = self::V_SOUTHPARKSTUDIOS;
                        $parsed = split( "/", $url );
                        if( is_array( $parsed ) ) {
                                $mdata = array_pop( $parsed );
                                if ( ('' != $mdata ) && ( false === strpos( $mdata, "?" ) ) ) {
                                        $this->mId = $mdata;
                                } else {
                                        $this->mId = array_pop( $parsed );
                                }
                                $this->mProvider = $provider;
                                $this->mData = array();
                                return true;
                        }
                }

		return false;
	}

	public function getRatio() {
		global $wgWikiaVideoProviders;
		$ratio = 0;
		switch( $wgWikiaVideoProviders[$this->mProvider] ) {
			case "metacafe":
				$ratio =  (40 / 35);
				break;
			case "youtube":
				$ratio =  (425 / 355);
				break;
			case "sevenload":
				$ratio =  (500 / 408);
				break;
			case "gamevideos":
				$ratio = (500 / 319);
				break;
			case "5min":
				$ratio = (480 / 401);
				break;
			case "vimeo":
				$ratio = (400 / 225);
				break;
			case "myvideo":
				$ratio = (470 / 406);
				break;
                        case "southparkstudios":
                                $ratio = ( 480 / 400 );
			default:
				$ratio = 1;
				break;
		}
		return $ratio;
	}

	public function getTextRatio() {
		global $wgWikiaVideoProviders;
		$ratio = '';
		switch( $wgWikiaVideoProviders[$this->mProvider] ) {
			case "metacafe":
				$ratio = "400 x 350";
				break;
			case "youtube":
				$ratio = "425 x 355";
				break;
			case "sevenload":
				$ratio = "500 x 408";
				break;
			case "gamevideos":
				$ratio = "500 x 319";
				break;
			case "5min":
				$ratio = "480 x 401";
				break;
			case "vimeo":
				$ratio = "400 x 225";
				break;
			case "myvideo":
				$ratio = "470 x 406";
				break;
                        case "southparkstudios":
                                $ratio = "480 x 400";
				break;
			default:
				$ratio = "300 x 300";
				break;
		}
		return $ratio;
	}

	// run a check from provided api or elsewhere
	// to see if we can go to details page or not
	public function checkIfVideoExists() {
		global $wgWikiaVideoProviders;
		$exists = false;
		switch( $wgWikiaVideoProviders[$this->mProvider] ) {
			case "metacafe":
				$file = @file_get_contents( "http://www.metacafe.com/api/item/" . $this->mId, FALSE );
				if ($file) {
					$doc = new DOMDocument;
					@$doc->loadHTML( $file );
					if( $item = $doc->getElementsByTagName('item')->item( 0 ) ) {
						$this->mVideoName = trim( $item->getElementsByTagName('title')->item(0)->textContent );
						$exists = true;
					}
				}
				break;
			case "youtube":
				$file = @file_get_contents( "http://gdata.youtube.com/feeds/api/videos/" . $this->mId, FALSE );
				if ($file) {
					$doc = new DOMDocument;
					@$doc->loadHTML( $file );
					$this->mVideoName = trim( $doc->getElementsByTagName('title')->item(0)->textContent );
					$exists = true;
				}
				break;
			case "sevenload":
				// needs an API key - to be done last
				// 1. create a token
				// http://api.sevenload.com/rest/1.0/tokens/create with user and password

				// 2. load the data using the token
				// http://api.sevenload.com/rest/1.0/items/A2C4E6G \
				//  ?username=XYZ&token-id=8b8453ca4b79f500e94aac1fc7025b0704f3f2c7

				$exists = true;
				break;
			case "gamevideos":
				$exists = true;
				break;
			case "5min":
				$file = @file_get_contents( "http://api.5min.com/video/" . $this->mId . '/info.xml', FALSE );
				if ($file) {
					$doc = new DOMDocument;
					@$doc->loadHTML( $file );
					if( $item = $doc->getElementsByTagName('item')->item( 0 ) ) {
						$this->mVideoName = trim( $item->getElementsByTagName('title')->item(0)->textContent );
						$exists = true;
					}
				}
				break;
			case "vimeo":
				$file = @file_get_contents( "http://vimeo.com/api/clip/" . $this->mId . '.php', FALSE );
				if ($file) {
					$data = unserialize( $file );
					$this->mVideoName = trim( $data[0]["title"] );
					$exists = true;
				}
				break;
			case "myvideo":
				// entire site is in German? I need help here
				$exists = true;
				break;
			case "southparkstudios": // todo verify if exists
				$exists = true;
				break;
			default:
				break;
		}
		return $exists;
	}


	function loadFromPars( $provider, $id, $data ) { // TODO: Consider renameing
		$this->mProvider = $provider;
		$this->mId = $id;
		$this->mData = $data;
	}

	public function setName( $name ) { // TODO: Maybe redundant - check!
		$this->mName = $name;
	}

	// return provider url
	public function getProviderUrl() {
		global $wgWikiaVideoProviders;
		switch( $wgWikiaVideoProviders[$this->mProvider] ) {
			case "metacafe":
				return 'http://www.metacafe.com';
			case "youtube":
				return 'http://www.youtube.com';
			case "sevenload":
				return 'http://www.sevenload.com';
			case "gamevideos":
				return 'http://gamevideos.1up.com';
			case "5min":
				return 'http://www.5min.com';
			case "myvideo":
				return 'http://www/myvideo.de';
			case "vimeo":
				return 'http://www.vimeo.com';
			case 'southparkstudios':
				return 'http://www.southparkstudios.com';
			default:
				return '';
		}
	}
	
	// return video name
	public function getVideoName() {
		$vname = '';
		isset( $this->mVideoName ) ? $vname = $this->mVideoName : $vname = '';
		return $vname;
	}

	// return url for the video file
	public static function getUrl( $metadata ) {
		global $wgWikiaVideoProviders;
		$meta = split( ",", $metadata );
		if ( is_array( $meta ) ) {
			$provider = $meta[0];
			$id = $meta[1];
			array_splice( $meta, 0, 2 );
			if ( count( $meta ) > 0 ) {
				foreach( $meta as $data  ) {
					$mData[] = $data;
				}
			}
		}
		$url = '';
		switch( $wgWikiaVideoProviders[$provider] ) {
			case "metacafe":
				$url = 'http://www.metacafe.com/watch/' . $id . '/' . $mData[0];
				break;
			case "youtube":
				$url = 'http://www.youtube.com/watch?v=' . $id;
				break;
			case "sevenload":
				$url = 'http://www.sevenload.com/videos/' . $id;
				break;
			case "gamevideos":
				$url = 'http://gamevideos.1up.com/video/id/' . $id;
				break;
			case "5min":
				$url = 'http://www.5min.com/Video/' . $mData[0] . $id;
				break;
			case "myvideo":
				$url = 'http://www/myvideo.de/watch/' . $id;
				break;
			case "vimeo":
				$url = 'http://www.vimeo.com/' . $id;
				break;
			case "southparkstudios":
				$url = 'http://www.southparkstudios.com/clips/' . $id;
                                break;
			default:
				$url = '';
				break;
		}
		return $url;
	}

	public function getProvider() {
		return $this->mProvider;
	}

	public function getVideoId() {
		return $this->mId;
	}

	public function getData() {
		return $this->mData;
	}

	// return normalized name for db purposes
	public static function getNameFromTitle( $title ) {
		global $wgCapitalLinks;
		if ( !$wgCapitalLinks ) {
			$name = $title->getUserCaseDBKey();
		} else {
			$name = $title->getDBkey();
		}
		return ":" . $name;
	}

	// save the video info in db, handles overwrite too
	public function save() {
		global $wgUser, $wgWikiaVideoProviders, $wgContLang;

		$desc = wfMsg( 'wikiavideo-added', $this->mTitle->getText() );

                $dbw = wfGetDB( DB_MASTER );
                $now = $dbw->timestamp();

		switch( $wgWikiaVideoProviders[$this->mProvider] ) {
			case 'metacafe':
			case 'sevenload':
			case 'myvideo':
			case '5min':
				$metadata = $this->mProvider . ',' . $this->mId . ',' . $this->mData[0];
				break;
			case 'youtube':
			case 'gamevideos':
			case 'vimeo':
			case 'southparkstudios':
				$metadata = $this->mProvider . ',' . $this->mId . ',';
				break;
			default:
				$metadata = '';
				break;
		}

		if( $this->mTitle->isDeleted() ) {
			$this->doCleanup(); // if the article was previously deleted, and we're inserting a new one
		}

                $dbw->insert( 'image',
                        array(
                                'img_name' => self::getNameFromTitle( $this->mTitle ),
                                'img_size' => 300,
                                'img_description' => '',
                                'img_user' => $wgUser->getID(),
                                'img_user_text' => $wgUser->getName(),
                                'img_timestamp' => $now,
				'img_metadata'	=> $metadata,
                                'img_media_type' => 'VIDEO',
				'img_major_mime' => 'video',
				'img_minor_mime' => 'swf',
                        ),
                        __METHOD__,
                        'IGNORE'
                );

		$cat = $wgContLang->getFormattedNsText( NS_CATEGORY );
		$saved_text = '[[' . $cat . ':' . wfMsgForContent( 'wikiavideo-category' ) . ']]';

                if( $dbw->affectedRows() == 0 ) {
			// we are updating
                        $desc = "updated video [[" . self::getNameFromTitle( $this->mTitle ) . "]]";
			                        $dbw->insertSelect( 'oldimage', 'image',
                                array(
                                        'oi_name' => 'img_name',
                                        'oi_archive_name' => 'img_name',
                                        'oi_size' => 'img_size',
                                        'oi_width' => 'img_width',
                                        'oi_height' => 'img_height',
                                        'oi_bits' => 'img_bits',
                                        'oi_timestamp' => 'img_timestamp',
                                        'oi_description' => 'img_description',
                                        'oi_user' => 'img_user',
                                        'oi_user_text' => 'img_user_text',
                                        'oi_metadata' => 'img_metadata',
                                        'oi_media_type' => 'img_media_type',
                                        'oi_major_mime' => 'img_major_mime',
                                        'oi_minor_mime' => 'img_minor_mime',
                                        'oi_sha1' => 'img_sha1'
                                ), array( 'img_name' => self::getNameFromTitle( $this->mTitle ) ), __METHOD__
                        );

		        // update the current image row
                        $dbw->update( 'image',
                                array( /* SET */
                                        'img_timestamp' => $now,
                                        'img_user' => $wgUser->getID(),
                                        'img_user_text' => $wgUser->getName(),
                                        'img_metadata' => $metadata,
                                ), array( /* WHERE */
                                        'img_name' => self::getNameFromTitle( $this->mTitle )
                                ), __METHOD__
                        );
			// todo same as image, but how should it really look?
			// may also need modifying watchlist...
			$log = new LogPage( 'upload' );
			$log->addEntry( 'overwrite', $this->mTitle, 'updated video' );
			$saved_text = $this->getContent();
		}

		$this->doEdit( $saved_text, $desc );
		$dbw->immediateCommit();
	}

	// load old video
	public static function getOldUrl( $title, $oldvideo ) {
		$fname = 'VideoPage' . '::' . __FUNCTION__;
		$dbr = wfGetDB( DB_SLAVE );
		$row = $dbr->selectRow(
			'oldimage',
			'oi_metadata',
			array(
				'oi_name = ' . $dbr->addQuotes( self::getNameFromTitle( $title ) ) .' OR oi_name = ' . $dbr->addQuotes( $title->getPrefixedText() ),
				'oi_timestamp' => $oldvideo
			),
			$fname
		);
		if ($row) {
			$metadata = split( ",", $row->oi_metadata );
			if ( is_array( $metadata ) ) {
				$provider = $metadata[0];
				$id = $metadata[1];
				array_splice( $metadata, 0, 2 );
				if ( count( $metadata ) > 0 ) {
					foreach( $metadata as $data  ) {
						$tdata[] = $data;
					}
				}
			}
		}

		$ldata = array(
				$provider,
				$id,
				$tdata[0]
			     );


		$ldata = implode( ",", $ldata ) ;
		$url = self::getUrl( $ldata );
		return $url;
	}


	public function load() {
		$fname = get_class( $this ) . '::' . __FUNCTION__;
		$dbr = wfGetDB( DB_SLAVE );
		$row = $dbr->selectRow(
			'image',
			'img_metadata',
			'img_name = ' . $dbr->addQuotes( self::getNameFromTitle( $this->mTitle ) ) .' OR img_name = ' . $dbr->addQuotes( $this->mTitle->getPrefixedText() ),
			$fname
		);
		if ($row) {
			$metadata = split( ",", $row->img_metadata );
			if ( is_array( $metadata ) ) {
				$this->mProvider = $metadata[0];
				$this->mId = $metadata[1];
				array_splice( $metadata, 0, 2 );
				if ( count( $metadata ) > 0 ) {
					foreach( $metadata as $data  ) {
						$this->mData[] = $data;
					}
				}
			}
		}
	}

	// handle video page revert
	function revert() {
		global $wgOut, $wgRequest, $wgUser;

		// is the target protected?
		$permErrors = $this->mTitle->getUserPermissionsErrors( 'edit', $wgUser );
		$permErrorsUpload = $this->mTitle->getUserPermissionsErrors( 'upload', $wgUser );

		if( $permErrors || $permErrorsUpload ) {
			$wgOut->addHTML( wfMsg( 'wikiavideo-unreverted', '<b>' . $this->mTitle->getText() . '</b>' ) );
			return ;
		}

		$timestamp = $wgRequest->getVal( 'oldvideo' );
		$fname = get_class( $this ) . '::' . __FUNCTION__;
		$dbr = wfGetDB( DB_SLAVE );
		$row = $dbr->selectRow(
			'oldimage',
			'oi_metadata AS img_metadata',
			array(
				'oi_name' => self::getNameFromTitle( $this->mTitle ),
				'oi_timestamp' => $timestamp
			),
			$fname
		);
		if ($row) {
			$metadata = split( ",", $row->img_metadata );
			if ( is_array( $metadata ) ) {
				$this->mProvider = $metadata[0];
				$this->mId = $metadata[1];
				array_splice( $metadata, 0, 2 );
				if ( count( $metadata ) > 0 ) {
					foreach( $metadata as $data  ) {
						$this->mData[] = $data;
					}
				}
			}
		}
		$sk = $wgUser->getSkin();
		$link_back = $sk->makeKnownLinkObj( $this->mTitle );
		$this->setName( $this->mTitle->getText() );
		$this->save();
		$wgOut->addHTML( wfMsg( 'wikiavideo-reverted', '<b>' . $this->mTitle->getText() . '</b>', $link_back ) );
	}

	function videoHistory() {
		global $wgOut;
		$dbr = wfGetDB( DB_SLAVE );
		$list = new VideoHistoryList( $this );
		$s = $list->beginVideoHistoryList();
		$s .= $list->videoHistoryLine( true );
		$s .= $list->videoHistoryLine();
		$s .= $list->endVideoHistoryList();
		$wgOut->addHTML( $s );
	}

       function videoLinks() {
                global $wgUser, $wgOut;
                $limit = 100;

                $dbr = wfGetDB( DB_SLAVE );

                $res = $dbr->select(
                        array( 'imagelinks', 'page' ),
                        array( 'page_namespace', 'page_title' ),
			'(il_to = ' . $dbr->addQuotes( self::getNameFromTitle( $this->mTitle ) ) .' OR il_to = ' . $dbr->addQuotes( $this->mTitle->getPrefixedText() ) . ') AND il_from = page_id',
                        __METHOD__,
                        array( 'LIMIT' => $limit + 1)
                );
                $count = $dbr->numRows( $res );
                if ( $count == 0 ) {
                        $wgOut->addHTML( "<div id='mw-imagepage-nolinkstoimage'>\n" );
                        $wgOut->addWikiMsg( 'nolinkstoimage' );
                        $wgOut->addHTML( "</div>\n" );
                        return;
                }
                $wgOut->addHTML( "<div id='mw-imagepage-section-linkstoimage'>\n" );
                $wgOut->addWikiMsg( 'linkstoimage', $count );
                $wgOut->addHTML( "<ul class='mw-imagepage-linktoimage'>\n" );

                $sk = $wgUser->getSkin();
                $count = 0;
                while ( $s = $res->fetchObject() ) {
                        $count++;
                        if ( $count <= $limit ) {
                                // We have not yet reached the extra one that tells us there is more to fetch
                                $name = Title::makeTitle( $s->page_namespace, $s->page_title );
                                $link = $sk->makeKnownLinkObj( $name, "" );
                                $wgOut->addHTML( "<li>{$link}</li>\n" );
                        }
                }
                $wgOut->addHTML( "</ul></div>\n" );
                $res->free();

                // Add a links to [[Special:Whatlinkshere]]
                if ( $count > $limit )
                        $wgOut->addWikiMsg( 'morelinkstoimage', $this->mTitle->getPrefixedDBkey() );
        }

	// return embed code for the particular video per provider
        public function getEmbedCode( $width = 300, $autoplay = false ) {
		global $wgWikiaVideoProviders;
                $embed = "";
		$code = 'standard';
		$height = round( $width / $this->getRatio() );
                switch( $wgWikiaVideoProviders[$this->mProvider] ) {
                        case "metacafe":
				$url = 'http://www.metacafe.com/fplayer/' . $this->mId . '/' . $this->mData[0];
				$code = 'custom';
				$autoplay ? $auto = 'flashVars="playerVars=autoPlay=yes"' : $auto = '';
				$embed = '<embed ' . $auto . ' src="' . $url . '" width="' . $width . '" height="' . $height . '" wmode="transparent"" allowFullScreen="true" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>';
                                break;
                        case "youtube":
				$url = 'http://www.youtube.com/v/' . $this->mId;
                                break;
			case "sevenload":
				$code = 'custom';
				$embed = '<object style="visibility: visible;" id="sevenloadPlayer_' . $this->mId . '" data="http://static.sevenload.com/swf/player/player.swf" type="application/x-shockwave-flash" height="' . $height . '" width="' . $width . '"><param name="wmode" value="transparent"><param value="always" name="allowScriptAccess"><param value="true" name="allowFullscreen"><param value="configPath=http%3A%2F%2Fflash.sevenload.com%2Fplayer%3FportalId%3Den%26autoplay%3D0%26itemId%3D' . $this->mId . '&amp;locale=en_US&amp;autoplay=0&amp;environment=" name="flashvars"></object>';
				break;
			case 'myvideo':
				$code = 'custom';
				$embed = "<object style='width:{$width}px;height:{$height}px;' type='application/x-shockwave-flash' data='http://www.myvideo.de/movie/{$this->mId}'><param name='wmode' value='transparent'><param name='movie' value='http://www.myvideo.de/movie/{$this->mId}' /> <param name='AllowFullscreen?' value='true' /> </object>";
				break;
			case "gamevideos":
				$code = 'custom';
				$embed = '<embed wmode="transparent" type="application/x-shockwave-flash" width="' . $width . '" height="' . $height . '" src="http://gamevideos.1up.com/swf/gamevideos12.swf?embedded=1&amp;fullscreen=1&amp;autoplay=0&amp;src=http://gamevideos.1up.com/do/videoListXML%3Fid%3D' . $this->mId . '%26adPlay%3Dtrue" align="middle"></embed>';
				break;
			case "5min":
				$code = 'custom';
				$embed = "<object width='{$width}' height='{$height}' id='FiveminPlayer' classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000'><param name='allowfullscreen' value='true'/><param name='wmode' value='transparent'><param name='allowScriptAccess' value='always'/><param name='movie' value='http://www.5min.com/Embeded/{$this->mId}/'/><embed src='http://www.5min.com/Embeded/{$this->mId}/' type='application/x-shockwave-flash' width='{$width}' height='{$height}' allowfullscreen='true' allowScriptAccess='always'></embed></object>";
				break;
			case 'vimeo':
		$code = 'custom';
				$embed = '<object width="'.$width.'" height="'.$height.'"><param name="allowfullscreen" value="true" /><param name="wmode" value="transparent"><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='.$this->mId.'&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id='.$this->mId.'&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="'.$width.'" height="'.$height.'"></embed></object>';
				break;
                        case 'southparkstudios':
                                $code = 'custom';
                                $embed = '<embed src="http://media.mtvnservices.com/mgid:cms:item:southparkstudios.com:' . $this->mId . '" width="' . $width . '" height="' . $height . '" type="application/x-shockwave-flash" wmode="window" flashVars="autoPlay=false&dist=http://www.southparkstudios.com&orig=" allowFullScreen="true" allowScriptAccess="always" allownetworking="all" bgcolor="#000000"></embed>';
                                break;
                        default: break;
                }
			if( 'custom' != $code ) {
                                $embed = "<embed src=\"{$url}\" width=\"{$width}\" height=\"{$height}\" wmode=\"transparent\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\"> </embed>";
			}
                return $embed;
        }

	private function getThumbnailCode($width) {
		global $wgExtensionsPath, $wgWikiaVideoProviders;

		$thumb = $wgExtensionsPath . '/wikia/VideoEmbedTool/images/vid_thumb.jpg';
		switch( $wgWikiaVideoProviders[$this->mProvider] ) {
			case "metacafe":
				$thumb = 'http://www.metacafe.com/thumb/' . $this->mId . '.jpg';	
				break;
			case "youtube":
				$thumb = 'http://img.youtube.com/vi/' . $this->mId . '/0.jpg';
				break;
			case "vimeo":
				$file = @file_get_contents( "http://vimeo.com/api/clip/" . $this->mId . '.php', FALSE );
				if ($file) {
					$data = unserialize( $file );
					$thumb = trim( $data[0]["thumbnail_large"] );
				}
				break;
			case "5min":
				break;
				/* todo test
				$file = @file_get_contents( "http://api.5min.com/video/" . $this->mId . '/info.xml', FALSE );
					if ($file) {
						$doc = new DOMDocument;
						@$doc->loadHTML( $file );
						if( $item = $doc->getElementsByTagName('item')->item( 0 ) ) {
							$thumb = trim( $item->getElementsByTagNameNS('media', 'thumbnail')->item(0)->getAttribute('url') );
						}
					}				
				break;
				*/
			case "sevenload":					
			case "myvideo":
			case "gamevideos":
			case 'southparkstudios': // no API
			default:
				break;
		}

		$height = round( $width / $this->getRatio() );	
		if ( '' != $thumb) {
			$image = "<img src=\"$thumb\" height=\"$height\" width=\"$width\" alt=\"\" />";
		} else {
			$image = '';
		}
						
 		return "$image<div style=\"width: {$width}px; height: {$height}px; background: transparent url({$wgExtensionsPath}/wikia/Wysiwyg/fckeditor/editor/plugins/video/video.png) no-repeat 50% 50%; position: absolute; top: 0; left: 0\"><br /></div>";
	}

	function openShowVideo() {
		global $wgOut;
		$this->getContent();
		$this->load();

		$s = '<div id="file">';
		$s .= $this->getEmbedCode( 400);
		$s .= '</div>';

		$wgOut->addHTML( $s );
	}

	function showVideoInfoLine() {
		global $wgOut, $wgWikiaVideoProviders;
		$data = array(
			$this->mProvider,
			$this->mId,
			$this->mData[0]
		);
		$data = implode( ",", $data ) ;
		$url = self::getUrl( $data );
		$provider = $wgWikiaVideoProviders[$this->mProvider];
		$purl = $this->getProviderUrl();
		$ratio = $this->getTextRatio();
		$s = '<div id="VideoPageInfo"><a href="' . $url . '">' . $this->mTitle->getText() . ' </a> (' . $ratio . wfMsg( 'wikiavideo-pixel' );
		$s .= ', provider: <a href="' . $purl . '" class="external" target="_blank">' . $provider . '</a>)</div>' ;
		$wgOut->addHTML( $s );
	}
}

global $wgWikiaVideoProviders;
$wgWikiaVideoProviders = array(
		VideoPage::V_GAMETRAILERS => 'gametrailers',
		VideoPage::V_GAMEVIDEOS => 'gamevideos',
		VideoPage::V_GAMESPOT => 'gamespot',
		VideoPage::V_MTVGAMES => 'mtvgames',
		VideoPage::V_5MIN => '5min',
		VideoPage::V_YOUTUBE => 'youtube',
		VideoPage::V_HULU => 'hulu',
		VideoPage::V_VEOH => 'veoh',
		VideoPage::V_FANCAST => 'fancast',
		VideoPage::V_IN2TV => 'in2tv',
		VideoPage::V_BLIPTV => 'bliptv',
		VideoPage::V_METACAFE => 'metacafe',
		VideoPage::V_SEVENLOAD => 'sevenload',
		VideoPage::V_VIMEO => 'vimeo',
		VideoPage::V_CLIPFISH => 'clipfish',
		VideoPage::V_MYVIDEO => 'myvideo',
		VideoPage::V_SOUTHPARKSTUDIOS => 'southparkstudios',
		);

class VideoHistoryList {
	var $mTitle;

        function __construct( $article ) {
		$this->mTitle = $article->mTitle;
        }

        public function beginVideoHistoryList() {
                global $wgOut, $wgUser;
                return Xml::element( 'h2', array( 'id' => 'filehistory' ), wfMsg( 'filehist' ) )
                        . Xml::openElement( 'table', array( 'class' => 'filehistory' ) ) . "\n"
                        . '<tr>'
			. '<th>&nbsp;</th>'
			. ( ( $wgUser->isAllowed( 'delete' ) || $wgUser->isAllowed( 'deleterevision' ) ) ? '<th>&nbsp;</th>' : '' )
                        . '<th>' . wfMsgHtml( 'filehist-datetime' ) . '</th>'
                        . '<th>' . wfMsgHtml( 'filehist-user' ) . '</th>'
                        . "</tr>\n";
        }

	public function videoHistoryLine( $iscur = false ) {
		global $wgOut, $wgUser, $wgLang;

		$dbr = wfGetDB( DB_SLAVE );
		$sk = $wgUser->getSkin();

		if ( $iscur ) {
			// load from current db
			$history = $dbr->select( 'image',
					array(
						'img_metadata',
						'img_name',
						'img_user',
						'img_user_text',
						'img_timestamp',
						'img_description',
						"'' AS ov_archive_name"
					     ),
					'img_name = ' . $dbr->addQuotes( VideoPage::getNameFromTitle( $this->mTitle ) ) .' OR img_name = ' . $dbr->addQuotes( $this->mTitle->getPrefixedText() ),
					__METHOD__
					);
			if ( 0 == $dbr->numRows( $history ) ) {
				return '';
			} else {
				$row = $dbr->fetchObject( $history );
				$user = $row->img_user;
				$usertext = $row->img_user_text;
				$url = VideoPage::getUrl( $row->img_metadata );

			        $q = array();
                                $q[] = 'action=delete';
				if( $wgUser->isAllowed('delete') || $wgUser->isAllowed('deleterevision') ) {
					$delete = '<td>' . $sk->makeKnownLinkObj( $this->mTitle,
							wfMsgHtml( 'filehist-deleteall' ),
							implode( '&', $q ) ) . '</td>';
				} else {
					$delete = '';
				}


				$line = '<tr>' . $delete . '<td>' . wfMsgHtml( 'filehist-current' ) . '</td><td><a href="' . $url . '" class="link-video" target="_blank">' . $wgLang->timeAndDate( $row->img_timestamp, true ) . '</a></td>' . '<td>';
				$line .= $sk->userLink( $user, $usertext ) . " <span style='white-space: nowrap;'>" . $sk->userToolLinks( $user, $usertext ) . "</span>";
				$line .= '</td></tr>';
				return $line;
			}
		} else {
			// load from old video db
			$history = $dbr->select( 'oldimage',
					array(
						'oi_metadata AS img_metadata',
						'oi_name AS img_name',
						'oi_user AS img_user',
						'oi_user_text AS img_user_text',
						'oi_timestamp AS img_timestamp',
						'oi_description AS img_description',
					     ),
					'oi_name = ' . $dbr->addQuotes( VideoPage::getNameFromTitle( $this->mTitle ) ) .' OR oi_name = ' . $dbr->addQuotes( $this->mTitle->getPrefixedText() ),
					__METHOD__,
					array( 'ORDER BY' => 'oi_timestamp DESC' )
					);
			$s = '';
			while( $row = $dbr->fetchObject( $history ) ) {
				$user = $row->img_user;
				$usertext = $row->img_user_text;
				$url = VideoPage::getUrl( $row->img_metadata );
			        $q = array();
                                $q[] = 'action=revert';
                                $q[] = 'oldvideo=' . urlencode( $row->img_timestamp );
                                $revert = $sk->makeKnownLinkObj( $this->mTitle,
                                        wfMsgHtml( 'filehist-revert' ),
                                        implode( '&', $q ) );

                                $q[0] = 'action=delete';
				if( $wgUser->isAllowed('delete') || $wgUser->isAllowed('deleterevision') ) {
					$delete = '<td>' . $sk->makeKnownLinkObj( $this->mTitle,
							wfMsgHtml( 'filehist-deleteone' ),
							implode( '&', $q ) ) . '</td>';
				} else {
					$delete = '';
				}

				$s .= '<tr>' . $delete . '<td>' . $revert . '</td><td><a href="' . $url . '" class="link-video" target="_blank">' . $wgLang->timeAndDate( $row->img_timestamp, true ) . '</a></td>' . '<td>';
				$s .= $sk->userLink( $user, $usertext ) . " <span style='white-space: nowrap;'>" . $sk->userToolLinks( $user, $usertext ) . "</span>";
				$s .= '</td></tr>';
			}
			return $s;
		}
	}

        public function endVideoHistoryList() {
                return "</table>\n";
        }
}

class VideoHTMLCacheUpdate extends HTMLCacheUpdate {

	function getToCondition() {
		$prefix = $this->getPrefix();
		switch ( $this->mTable ) {
			case 'pagelinks':
			case 'templatelinks':
			case 'redirect':
				return array(
						"{$prefix}_namespace" => $this->mTitle->getNamespace(),
						"{$prefix}_title" => $this->mTitle->getDBkey()
					    );
			case 'imagelinks':
				return array( 'il_to' => ':' . $this->mTitle->getDBkey() );
			case 'categorylinks':
				return array( 'cl_to' => $this->mTitle->getDBkey() );
		}
		throw new MWException( 'Invalid table type in ' . __CLASS__ );
	}
}

class VideoPageArchive extends PageArchive {

	function listFiles() {
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select( 'filearchive',
				array(
					'fa_id',
					'fa_name',
					'fa_archive_name',
					'fa_storage_key',
					'fa_storage_group',
					'fa_size',
					'fa_width',
					'fa_height',
					'fa_bits',
					'fa_metadata',
					'fa_media_type',
					'fa_major_mime',
					'fa_minor_mime',
					'fa_description',
					'fa_user',
					'fa_user_text',
					'fa_timestamp',
					'fa_deleted' ),
				array( 'fa_name' => VideoPage::getNameFromTitle( $this->title ) ),
				__METHOD__,
				array( 'ORDER BY' => 'fa_timestamp DESC' ) );
		$ret = $dbr->resultObject( $res );
		return $ret;
	}

	function undelete( $timestamps, $comment = '', $fileVersions = array(), $unsuppress = false ) {
		global $wgUser;
		$dbw = wfGetDB( DB_MASTER );

		$conditions = array( 'fa_name' => VideoPage::getNameFromTitle( $this->title ) );

		$result = $dbw->select( 'filearchive', '*',
				$conditions,
				__METHOD__,
				array( 'ORDER BY' => 'fa_timestamp DESC' )
				);

		$insertBatch = array();
		$insertCurrent = false;
		$deleteIds = array();
		$archiveName = '';
		$first = true;

		while( $row = $dbw->fetchObject( $result ) ) {
			if( $first ) { // this is our new current revision
				$insertCurrent = array(
						'img_name'        => $row->fa_name,
						'img_size'        => $row->fa_size,
						'img_width'       => $row->fa_width,
						'img_height'      => $row->fa_height,
						'img_metadata'    => $row->fa_metadata,
						'img_bits'        => $row->fa_bits,
						'img_media_type'  => $row->fa_media_type,
						'img_major_mime'  => $row->fa_major_mime,
						'img_minor_mime'  => $row->fa_minor_mime,
						'img_description' => $row->fa_description,
						'img_user'        => $row->fa_user,
						'img_user_text'   => $row->fa_user_text,
						'img_timestamp'   => $row->fa_timestamp,
						'img_sha1'        => ''
						);
			} else { // older revisions, they could be even elder current ones from ancient deletions
				$insertBatch[] = array(
						'oi_name'         => $row->fa_name,
						'oi_archive_name' => $archiveName, // todo check
						'oi_size'         => $row->fa_size,
						'oi_width'        => $row->fa_width,
						'oi_height'       => $row->fa_height,
						'oi_bits'         => $row->fa_bits,
						'oi_description'  => $row->fa_description,
						'oi_user'         => $row->fa_user,
						'oi_user_text'    => $row->fa_user_text,
						'oi_timestamp'    => $row->fa_timestamp,
						'oi_metadata'     => $row->fa_metadata,
						'oi_media_type'   => $row->fa_media_type,
						'oi_major_mime'   => $row->fa_major_mime,
						'oi_minor_mime'   => $row->fa_minor_mime,
						'oi_deleted'      => $this->unsuppress ? 0 : $row->fa_deleted, // todo check
						'oi_sha1'         => '' );
			}
			$deleteIds[] = $row->fa_id;
			$first = false;
		}

		unset( $result );		

		if ( $insertCurrent ) {
			$dbw->insert( 'image', $insertCurrent, __METHOD__ );
		}
		if ( $insertBatch ) {
			$dbw->insert( 'oldimage', $insertBatch, __METHOD__ );
		}
		if ( $deleteIds ) {
			$dbw->delete( 'filearchive',
					array( 'fa_id IN (' . $dbw->makeList( $deleteIds ) . ')' ),
						__METHOD__ );
					}

		// todo check out and return the proper "file" restoration info
		// the info is put into the log inside the parent function

		// run parent version, because it uses a private function inside
		// files will not be touched anyway here, because it's not NS_FILE
		parent::undelete( $timestamps, $comment, $fileVersions, $unsuppress );

		return array('', '', ''); // todo check out
	}

}

