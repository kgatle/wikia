<?php
/*
 * @author Inez Korczyński
 * @author Bartek Łapiński
 */

class VideoEmbedTool {

	function loadMain( $error = false ) {
		$tmpl = new EasyTemplate(dirname(__FILE__).'/templates/');
		$tmpl->set_vars(array(
				'result' => '',
				'error'  => $error
				)
		);
		return $tmpl->execute("main");
	}


	function recentlyUploaded() {
		global $IP, $wmu;
		require_once($IP . '/includes/SpecialPage.php');
		require_once($IP . '/includes/specials/SpecialNewimages.php');
		// this needs to be revritten, since we will not display recently uploaded, but embedded

		$isp = new IncludableSpecialPage('Newimages', '', 1, 'wfSpecialNewimages', $IP . '/includes/specials/SpecialNewimages.php');
		wfSpecialNewimages(8, $isp);
		$tmpl = new EasyTemplate(dirname(__FILE__).'/templates/');
		$tmpl->set_vars(array('data' => $wmu));
		return $tmpl->execute("results_recently");
	}

	function query() {
		global $wgRequest, $IP;

		$query = $wgRequest->getText('query');
		$page = $wgRequest->getVal('page');
		$sourceId = $wgRequest->getVal('sourceId');

		if($sourceId == 0) { // metacafe
			$page ? $start = ($page - 1) * 8 : $start = 0;
			$query = str_replace(" ", "+", $query);
			$file = @file_get_contents( "http://www.metacafe.com/api/videos?vq=" . $query, FALSE );
                                if ($file) {
                                        $doc = new DOMDocument;
                                        @$doc->loadXML( $file );
					$items = $doc->getElementsByTagName('item');
					$metacafeResult = array();
					$preResult = array();

					$metacafeResult['page'] = $page;
					$count = 0;
					foreach( $items as $item ) {
						$links = split( "/", $item->getElementsByTagName('link')->item(0)->textContent );
						$link = $links[count( $links ) -2];
						$preResult[] = array(
							'provider' => 'metacafe',
							'title' => $item->getElementsByTagName('title')->item(0)->textContent,
							'id' => $item->getElementsByTagName('id')->item(0)->textContent,
							'link' => $link,
						);
						$count++;
					}
					$metacafeResult['total'] = $count;
					$metacafeResult['pages'] = ceil( $metacafeResult['total'] / 8 );
                                }
			$metacafeResult['item'] = array_slice( $preResult, $start, 8 );
			$tmpl = new EasyTemplate(dirname(__FILE__).'/templates/');
			$tmpl->set_vars(array('results' => $metacafeResult, 'query' => addslashes($query)));
			return $tmpl->execute('results_metacafe');
		} else if($sourceId == 1) { // this wiki, to be done later
			$db =& wfGetDB(DB_SLAVE);
			$res = $db->query("SELECT count(*) as count FROM `page` WHERE lower(page_title) LIKE '%".strtolower($db->escapeLike($query))."%' AND page_namespace = 400 ORDER BY page_title ASC LIMIT 8");
			$row = $db->fetchRow($res);
			$results = array();
			$results['total'] = $row['count'];
			$results['pages'] = ceil($row['count']/8);
			$results['page'] = $page;
			$res = $db->query("SELECT page_title FROM `page` WHERE lower(page_title) LIKE '%".strtolower($db->escapeLike($query))."%' AND page_namespace = 400 ORDER BY page_title ASC LIMIT 8 OFFSET ".($page*8-8));
			while($row = $db->fetchObject($res)) {
				$results['images'][] = array('title' => $row->page_title);
			}
			$tmpl = new EasyTemplate(dirname(__FILE__).'/templates/');
			$tmpl->set_vars(array('results' => $results, 'query' => addslashes($query)));
			return $tmpl->execute('results_thiswiki');
		}
	}

	function chooseImage() {
		global $wgRequest, $wgUser, $IP;

		$itemId = $wgRequest->getVal('itemId');
		$sourceId = $wgRequest->getInt('sourceId');
		$itemLink = $wgRequest->getVal('itemLink') . '.swf';
		$itemTitle = $wgRequest->getVal('itemTitle');
		require_once( "$IP/extensions/wikia/WikiaVideo/VideoPage.php" );

		switch( $sourceId ) {
			case 0: //metacafe
				$tempname = 'Temp_video_'.$wgUser->getID().'_'.rand(0, 1000);
				$title = Title::makeTitle( NS_VIDEO, $tempname );
				$video = new VideoPage( $title );

				$video->loadFromPars( VideoPage::V_METACAFE, $itemId, array( $itemLink ) );
				$video->setName( $tempname );
				$props['oname'] = '';
				$props['provider'] = VideoPage::V_METACAFE;
				$props['id'] = $itemId;
				$props['vname'] = $itemTitle;
				$props['metadata'] = $itemLink;
				$props['code'] = $video->getEmbedCode( VIDEO_PREVIEW, true );
				break;
			default:
				break;
		}

		return $this->detailsPage($props);
	}

	function insertVideo() {
		global $IP, $wgRequest, $wgUser, $wgTitle;
		require_once( "$IP/extensions/wikia/WikiaVideo/VideoPage.php" );

		$ns = $wgTitle->getNamespace();

		$url = $wgRequest->getVal( 'wpVideoEmbedUrl' );
		$tempname = 'Temp_video_'.$wgUser->getID().'_'.rand(0, 1000);
		$title = Title::makeTitle( NS_VIDEO, $tempname );
		$video = new VideoPage( $title );

		// todo some safeguard here to take care of bad urls
		if( !$video->parseUrl( $url ) ) {
			header('X-screen-type: error');
			return $this->loadMain( wfMsg( 'vet-bad-url' ) );
		}

		if( !$video->checkIfVideoExists() ) {
			header('X-screen-type: error');
			return $this->loadMain( wfMsg( 'vet-non-existing' ) );
		}

		$props['provider'] = $video->getProvider();
		$props['id'] = $video->getVideoId();
		$props['vname'] = $video->getVideoName();
		$data = $video->getData();
		if (is_array( $data ) ) {
			$props['metadata'] = implode( ",", $video->getData() );
		} else {
			$props['metadata'] = '';
		}
		$props['code'] = $video->getEmbedCode( VIDEO_PREVIEW );
		$props['oname'] = '';

		return $this->detailsPage($props);
	}

	function getVideoFromName() {
                global $wgRequest, $wgUser, $wgContLang, $IP;
                require_once( "$IP/extensions/wikia/WikiaVideo/VideoPage.php" );

                $name = $wgRequest->getVal('name');
		$title = Title::makeTitle( NS_VIDEO, $name );
		$video = new VideoPage( $title );
		$video->load();
		return $video->getEmbedCode();
	}

	function detailsPage($props) {
		$tmpl = new EasyTemplate(dirname(__FILE__).'/templates/');

		$tmpl->set_vars(array('props' => $props));
		return $tmpl->execute('details');
	}

	function insertFinalVideo() {
		global $wgRequest, $wgUser, $wgContLang, $IP;
		require_once( "$IP/extensions/wikia/WikiaVideo/VideoPage.php" );

		$type = $wgRequest->getVal('type');
		$id = $wgRequest->getVal('id');
		$provider = $wgRequest->getVal('provider');
		$name = urldecode( $wgRequest->getVal('name') );
		$oname = urldecode( $wgRequest->getVal('oname') );
		if ('' == $name) {
			$name = $oname;
		}

		$title = Title::makeTitle( NS_VIDEO, $name );

		$extra = 0;
		$metadata = array();
		while( '' != $wgRequest->getVal( 'metadata' . $extra ) ) {
			$metadata[] = $wgRequest->getVal( 'metadata' . $extra );
			$extra++;
		}

		if($name !== NULL) {
			if($name == '') {
				header('X-screen-type: error');
				// todo messagize
				return 'You need to specify file name first!';
			} else {

				$title = Title::makeTitleSafe(NS_VIDEO, $name);
				if(is_null($title)) {
					header('X-screen-type: error');
					return wfMsg ( 'vet-name-incorrect' );
				}
				if($title->exists()) {
					if($type == 'overwrite') {
						// is the target protected?
						$permErrors = $title->getUserPermissionsErrors( 'edit', $wgUser );
						$permErrorsUpload = $title->getUserPermissionsErrors( 'upload', $wgUser );
						$permErrorsCreate = ( $title->exists() ? array() : $title->getUserPermissionsErrors( 'create', $wgUser ) );

						if( $permErrors || $permErrorsUpload || $permErrorsCreate ) {
							header('X-screen-type: error');
							// todo messagize
							return 'This image is protected';
						}

						$video = new VideoPage( $title );
						if ($video instanceof VideoPage) {
							$video->loadFromPars( $provider, $id, $metadata );
							$video->setName( $name );
							$video->save();
						}
					} else if($type == 'existing') {
						header('X-screen-type: existing');
						$title = Title::makeTitle( NS_VIDEO, $name );
						$video = new VideoPage( $title );

						$props = array();
						$video->load();
						$props['provider'] = $video->getProvider();
						$props['id'] = $video->getVideoId();
						$data = $video->getData();
						if (is_array( $data ) ) {
							$props['metadata'] = implode( ",", $video->getData() );
						} else {
							$props['metadata'] = '';
						}
						$props['code'] = $video->getEmbedCode( VIDEO_PREVIEW );
						$props['oname'] = $name;

						return $this->detailsPage($props);
					} else {
						if ('' == $oname) {
							header('X-screen-type: conflict');
							$tmpl = new EasyTemplate(dirname(__FILE__).'/templates/');
							$tmpl->set_vars( array(
										'name' => $name,
										'id' => $id,
										'provider' => $provider,
										'metadata' => $metadata,
									      )
								       );
							return $tmpl->execute('conflict');
						}
					}
				} else {
					// is the target protected?
					$permErrors = $title->getUserPermissionsErrors( 'edit', $wgUser );
					$permErrorsUpload = $title->getUserPermissionsErrors( 'upload', $wgUser );
					$permErrorsCreate = ( $title->exists() ? array() : $title->getUserPermissionsErrors( 'create', $wgUser ) );

					if( $permErrors || $permErrorsUpload || $permErrorsCreate ) {
						header('X-screen-type: error');
						// todo messagize
						return 'This video is protected';
					}

					$video = new VideoPage( $title );
					if ($video instanceof VideoPage) {
						$video->loadFromPars( $provider, $id, $metadata );
						$video->setName( $name );
						$video->save();
					}
				}
			}
		} else {
			$title = Title::newFromText($mwname, 6);
		}


		header('X-screen-type: summary');

		$size = $wgRequest->getVal('size');
		$width = $wgRequest->getVal('width');
		$layout = $wgRequest->getVal('layout');
		$caption = $wgRequest->getVal('caption');
		$slider = $wgRequest->getVal('slider');

		$ns_img = $wgContLang->getFormattedNsText( NS_VIDEO );

		$tag = '[[' . $ns_img . ':'.$name;

		if($size != 'full') {
			$tag .= '|thumb';
		}

		$tag .= '|'.$width;
		$tag .= '|'.$layout;
		if($caption != '') {
			$tag .= '|'.$caption.']]';
		} else {
			$tag .= ']]';
		}

		$tmpl = new EasyTemplate(dirname(__FILE__).'/templates/');
		$tmpl->set_vars(array('tag' => $tag));
		return $tmpl->execute('summary');
	}
}

