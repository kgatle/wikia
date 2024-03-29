<?php

// use the same namespace as in old NY extension
define( 'NS_VIDEO', 400 );

// main video page class
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

	var	$mName,
		$mId,
		$mProvider,
		$mData,
		$mDataline;

        function __construct (&$title){
                parent::__construct(&$title);
        }

        function render() {
                global $wgOut;
                $wgOut->setArticleBodyOnly( true );
                parent::view();
        }

	function view() {
		global $wgOut, $wgUser, $wgRequest;		
		if ( $this->getID() ) {
			$wgOut->addHTML( $this->showTOC('') );
			$this->openShowVideo();
			Article::view();
			$this->videoHistory();
		} else {
			# Just need to set the right headers
			$wgOut->setArticleFlag( true );
			$wgOut->setRobotpolicy( 'noindex,nofollow' );
			$wgOut->setPageTitle( $this->mTitle->getPrefixedText() );
			$this->viewUpdates();
		}
	}

        function showTOC( $metadata ) {
                global $wgLang;
                $r = '<ul id="filetoc">
                        <li><a href="#file">' . $wgLang->getNsText( NS_VIDEO ) . '</a></li>
                        <li><a href="#filehistory">' . wfMsgHtml( 'filehist' ) . '</a></li>' .
                        ($metadata ? ' <li><a href="#metadata">' . wfMsgHtml( 'metadata' ) . '</a></li>' : '') . '
                </ul>';
                return $r;
        }

	function getContent() {
		return Article::getContent();
	}

	public function generateWindow( $align = 'left', $width = 400, $caption = '', $thumb ) {
		global $wgStylePath;
		$code = $this->getEmbedCode( $width );
		if ( 'false' == $thumb ) {
			return "<div class=\"t{$align}\">" . $code . "</div>";
		}
		$s = "<div class=\"thumb t{$align}\"><div class=\"thumbinner\" style=\"width:{$width}px;\">";
		$s .= $code;
				
		$url = $this->mTitle->getLocalURL( '' );

		if ( isset( $fp['framed'] ) ) {
			$zoomicon="";
		} else {
			$zoomicon =  '<div class="magnify">'.
				'<a href="'.$url.'" class="internal" title="'.$caption.'">'.
				'<img src="'.$wgStylePath.'/common/images/magnify-clip.png" ' .
				'width="15" height="11" alt="" /></a></div>';
		}
		$s .= '  <div class="thumbcaption">'.$zoomicon.$caption."</div></div></div>";
		return str_replace("\n", ' ', $s);
	}

	public function parseUrl( $url, $load = true ) {
		$provider = '';
		$id = '';

		$url = trim( $url );
		// todo make sure to check just http://something.else/ part, omit whatever follows
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

		return false;
	}

	public function getRatio() {
		global $wgWikiaVideoProviders;
		switch( $wgWikiaVideoProviders[$this->mProvider] ) {
			case "metacafe": 
				return (40 / 35);
				break;			
			case "youtube": 
				return (425 / 355);
				break;
			case "sevenload":
				return (500 / 408);
				break;
			case "gamevideos":
				return (500 / 319);
				break;
			case "5min":
				return (480 / 401);
				break;
			case "vimeo":
				return (400 / 225);
				break;
			case "myvideo":
				return (470 / 406);
				break;
			default:
				return 1;
				break;
		}
	}

	function loadFromPars( $provider, $id, $data ) {
		$this->mProvider = $provider;
		$this->mId = $id;
		$this->mData = $data;		
	}

	public function setName( $name ) {
		$this->mName = $name;
	}

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
		switch( $wgWikiaVideoProviders[$provider] ) {
			case "metacafe": 
				return 'http://www.metacafe.com/watch/' . $id . '/' . $mData[0];
			case "youtube": 
				return 'http://www.youtube.com/watch?v=' . $id;
			case "sevenload":
				return 'http://www.sevenload.com/videos/' . $id;
			case "gamevideos":
				return 'http://gamevideos.1up.com/video/id/' . $id;
				break;
			case "5min":
				return 'http://www.5min.com/Video/' . $mData[0] . $id;
				break;
			case "myvideo":
				return 'http://www/myvideo.de/watch/' . $id;
				break;
			case "vimeo":
				return 'http://www.vimeo.com/' . $id;
				break;
			default:
				return '';
		}
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
	
	public function save() {
		global $wgUser, $wgWikiaVideoProviders;

		$this->mTitle = Title::newFromText($this->mName, NS_VIDEO );
		$desc = "added video [[" . $this->mTitle->getPrefixedText() . "]]";			

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
				$metadata = $this->mProvider . ',' . $this->mId . ',';
				break;
			default: 
				$metadata = '';
				break;
		}

                $dbw->insert( 'image',
                        array(
                                'img_name' => $this->mTitle->getPrefixedText(),
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

                if( $dbw->affectedRows() == 0 ) {
			// we are updating
                        $desc = "updated video [[" . $this->mTitle->getPrefixedText() . "]]";
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
                                ), array( 'img_name' => $this->mTitle->getPrefixedText() ), __METHOD__
                        );

		        // update the current image row
                        $dbw->update( 'image',
                                array( /* SET */
                                        'img_timestamp' => $now,
                                        'img_user' => $wgUser->getID(),
                                        'img_user_text' => $wgUser->getName(),
                                        'img_metadata' => $metadata,
                                ), array( /* WHERE */
                                        'img_name' => $this->mTitle->getPrefixedText()
                                ), __METHOD__
                        );
		}
		
		// todo make those categories more flexible
		$this->doEdit( "[[Category:Videos]]", $desc );			

		$dbw->immediateCommit();
		
	}

	public function load() {
		$fname = get_class( $this ) . '::' . __FUNCTION__;
		$dbr = wfGetDB( DB_SLAVE );		
		$row = $dbr->selectRow(
			'image',
			'img_metadata',
			array( 'img_name' => $this->mTitle->getPrefixedText() ),
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

	function revert() {


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


	}

        public function getEmbedCode( $width = 300 ) {
		global $wgWikiaVideoProviders;
                $embed = "";
		$code = 'standard';
		$height = round( $width / $this->getRatio() );
                switch( $wgWikiaVideoProviders[$this->mProvider] ) {
                        case "metacafe":
				$url = 'http://www.metacafe.com/fplayer/' . $this->mId . '/' . $this->mData[0];
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
                        default: break;
                }	
			if( 'custom' != $code ) { 
                                $embed = "<embed src=\"{$url}\" width=\"{$width}\" height=\"{$height}\" wmode=\"transparent\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\"> </embed>";
			}

                return $embed;
        }

	function openShowVideo() {
		global $wgOut;
		$this->getContent();
		$this->load();	
		$wgOut->addHTML( $this->getEmbedCode( 400) );
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
		VideoPage::V_MYVIDEO => 'myvideo'	
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
					array( 'img_name' => $this->mTitle->getPrefixedText() ),
					__METHOD__
					);
			if ( 0 == $dbr->numRows( $history ) ) {
				return '';
			} else {
				$row = $dbr->fetchObject( $history );
				$user = $row->img_user;
				$usertext = $row->img_user_text;
				$url = VideoPage::getUrl( $row->img_metadata );
				$line = '<tr>' . '<td><a href="' . $url . '">' . $wgLang->timeAndDate( $row->img_timestamp, true ) . '</a></td>' . '<td>';
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
					array( 'oi_name' => $this->mTitle->getPrefixedText() ),
					__METHOD__,
					array( 'ORDER BY' => 'oi_timestamp DESC' )
					);
			$s = '';
			while( $row = $dbr->fetchObject( $history ) ) {
				$user = $row->img_user;
				$usertext = $row->img_user_text;
				$url = VideoPage::getUrl( $row->img_metadata );	
				$s .= '<tr>' . '<td><a href="' . $url . '">' . $wgLang->timeAndDate( $row->img_timestamp, true ) . '</a></td>' . '<td>';
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
