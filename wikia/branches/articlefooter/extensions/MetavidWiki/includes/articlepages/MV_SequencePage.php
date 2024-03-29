<?php
/*
 * MV_SequencePage.php Created on Oct 17, 2007
 * 
 * All Metavid Wiki code is Released Under the GPL2
 * for more info visit http:/metavid.ucsc.edu/code
 * 
 * @author Michael Dale
 * @email dale@ucsc.edu
 * @url http://metavid.ucsc.edu
 * 
 * redirects the user to the sequence interface. 
 */
 //sequence just adds some sequence hooks: 
 
define('SEQUENCE_TAG', 'sequence');
 


 class MV_SequencePage extends Article{
 	var $outMode='page';
 	var $clips=array();
 	function __construct($title){  		
 		global $wgRequest; 		
 		mvfAddHTMLHeader('sequence');
 		parent::__construct($title); 		
 		return $this;
 	}
 	/*function doSeqReplace(&$input, &$argv, &$parser){
 		return 
 	}*/
 	function parsePlaylist(){
 		global $wgParser,$wgOut;
 		//valid playlist in-line-attributes:
		$mvInlineAttr = array('wClip', 'mvClip', 'title','linkback','desc','desc','image');
 		
 		//build a associative array of "clips" 
 		$seq_text = $this->getSequenceText();		
 		$seq_lines = explode("\n",$seq_text);
 		$parseBucket=$cur_attr='';
 		$clip_inx=-1; 		
 		foreach($seq_lines as $line){ 			
 			//actions start with | 
			$e = strpos($line, '=');
			if($e!==false){
				$cur_attr = substr($line, 1,$e-1);
			}					
			if(in_array($cur_attr, $mvInlineAttr)){
				if($cur_attr=='mvClip'){
					$clip_inx++;
				}
				//close the parse bucket (found a valid inline attr)
				if($parseBucket!=''&& $cur_attr!='desc'){		
					$output = $wgParser->parse( $parseBucket, $parser->mTitle, $parser->mOptions, true, false );
					$parseBucket='';
				}
			}			
			$start_pos = ($e!==false)?$e+1:0;
			if($clip_inx!=-1){
				if(!isset($this->clips[$clip_inx]))$this->clips[$clip_inx]=array();
				if(!isset($this->clips[$clip_inx][$cur_attr]))$this->clips[$clip_inx][$cur_attr]='';
				$this->clips[$clip_inx][$cur_attr].= substr($line, $start_pos);
			} 
 		} 	
 		//poluate data (this could go here or somewhere else) 		
 		foreach($this->clips as $inx=>&$clip){
 			if(trim($clip['mvClip'])==''){
 				unset($this->clips[$inx]);
 				continue;	
 			}
 			if($clip['mvClip']){
 				$sn = str_replace('?t=','/', $clip['mvClip']);
 				$streamTitle = new MV_Title($sn);  
 				$wgStreamTitle = Title::newFromText($sn, MV_NS_STREAM);			
 				if($streamTitle->doesStreamExist()){		
 					//mvClip is a substitue for src so assume its there: 
 					$clip['src']=$streamTitle->getWebStreamURL(); 		
 					//title
 					if(!isset($clip['title']))$clip['title']='';
 					if($clip['title']=='')
 						$clip['title']=$streamTitle->getTitleDesc();
 								
 					if(!isset($clip['info']))$clip['info']='';
 					if($clip['info']=='')
 						$clip['info']=$wgStreamTitle->getFullURL();
 				}
				//check if we should look up the image:  		
				if(!isset($clip['image']))$clip['image']=='';
				if($clip['image']=='')
					$clip['image'] = $streamTitle->getStreamImageURL();
				//check if desc was present: 				
				if(!isset($clip['desc']))$clip['desc']='';
				//for now just lookup all ... @@todo future expose diffrent language tracks
				if($clip['desc']==''){
					$dbr =& wfGetDB(DB_SLAVE);	
					$mvd_res = MV_Index::getMVDInRange($streamTitle->getStreamId(),
						$streamTitle->getStartTimeSeconds(), 
						$streamTitle->getEndTimeSeconds());
					if(count($dbr->numRows($mvd_res))!=0){ 
						$MV_Overlay = new MV_Overlay();	
						$wgOut->clearHTML();	
						while($mvd = $dbr->fetchObject($mvd_res)){								
							$MV_Overlay->get_article_html($mvd);	
						}
						$clip['desc']=$wgOut->getHTML();
						$wgOut->clearHTML();	
					}
				}
 			}
 					
 		}
 		//print_r($this->clips);
 	}
 	function doSeqReplace(&$input, &$argv, &$parser){	
 		global $wgTitle,$wgUser, $markerList;
 		
 		$sk = $wgUser->getSkin();
 		$title = Title::MakeTitle(NS_SPECIAL, 'MvExportSequence/'.$wgTitle->getDBKey() );
 		
 		$vidtag = '<div id="file" class="fullImageLink"><playlist';						
		$vidtag.=' width="400" height="300" src="'.$title->getFullURL().'">';
		$vidtag.='</playlist></div><hr>';
		
		$marker = "xx-marker".count($markerList)."-xx";
	    $markerList[] = $vidtag;
	    return $marker;
 	}
	/*function doSeqReplace(&$input, &$argv, &$parser){	
		global $mv_video_attr, $wgOut, $markerList;
		$mv_pl_inline_attr = array('wClip', 'mvClip', 'title','linkback','desc','desc','image');
		//check for external embed: 	
		$lparse = clone $parser;
			
		$inline_out='';
		//do media lookup for wClip=Name  where appropriate 
		//valid properties:	
		$lines = explode("\n", $input);	
		$parseBucket=$cur_attr='';	
		foreach($lines as $line){	
			$e = strpos($line, '=');
			if($e!==false){
				$cur_attr = substr($line, 1,$e-1);
			}
			
			if(in_array($cur_attr, $mv_pl_inline_attr)){
				//close the parse bucket (found a valid inline attr)	
				if($parseBucket!=''&& $cur_attr!='desc'){		
					$output = $lparse->parse( $parseBucket, $parser->mTitle, $parser->mOptions, true, false );
					$inline_out.= '|desc=' . $output->getText() . "\n";
					$parseBucket='';
				}
			}		
			//for expanding reference to Media hosted on the wiki: 
			// || $cur_attr=='image'
			if($cur_attr=='wClip'){
				$title_str = substr($line, $e+1); 
	*/
				/*if( stripos($title_str, NS_IMAGE)===false && stripos($title_str, NS_MEDIA)===false){
					$mTitle = Title::newFromText($title_str, NS_IMAGE);					
				}else{					
					$mTitle = Title::newFromText($title_str);
				}
				if($mTitle->exists()){
					if($mTitle->getNamespace()==NS_IMAGE ||	$mTitle->getNamespace()==NS_MEDIA){									
						$img  = new Image( $mTitle );
						if($img->exists()){		
							if($cur_attr=='wClip'){			
								$line = "\n".'|srcClip='. $img->getUrl();
							}else if($cur_attr=='image'){
								$line = '|image='. $img->getUrl();
							}
						}
					}
				}*/
	/*		}
			//wiki parse the desc: 
			if($cur_attr=='desc'){
				//make sure its not -->			
				if($parseBucket==''){	
					if($e!==false){			
						$parseBucket.=substr($line, $e+1)."\n";
					}
				}else{	
					$parseBucket.=$line."\n";					
				}			
			}			
			//if not collecting for the parse bucket go directly to the inline output
			if(	$parseBucket==''){	
				//if line not being wiki-parsed send it to htmlspecialchars
				$inline_out.=$line . "\n";		
			}
		}	
		//if we have lefter over parseBucket add it in:
		if($parseBucket!=''){
			$output= $lparse->parse( $parseBucket, $parser->mTitle, $parser->mOptions, true, false );
			$inline_out.= '|desc=' .$output->getText() . "\n";
		}
		//print 'pl:' .$inline_out . "\n*****end******\n";
		$vidtag = '<div style="float:left;padding:5px;"><playlist';
		foreach($argv as $attr=>$val){
			//make sure its a valid attribute: 
			if(in_array($attr, $mv_video_attr)){
				$vidtag.=' ' . $attr .'="'.htmlspecialchars(trim($val)).'"';
			}
		}
		$vidtag.='>';
		$vidtag.='<!--'.$inline_out.'--></playlist></div><br>';
		
		$marker = "xx-marker".count($markerList)."-xx";
	    $markerList[] = $vidtag;
	    return $marker;
	}*/
 	function getPageContent(){
 		global $wgRequest;
 		$base_text = parent::getContent();
 		//strip the sequence
 		$seqClose = strpos($base_text, '</'.SEQUENCE_TAG.'>');
 		if($seqClose!==false){
 			return trim(substr($base_text, $seqClose+strlen('</'.SEQUENCE_TAG.'>')));
 		}
 	}
 	function getSequenceText(){
 		//check if the current article exists: 
 		if($this->mTitle->exists()){
	 		$base_text = parent::getContent();
	 		$seqClose = strpos($base_text, '</'.SEQUENCE_TAG.'>');
	 		if($seqClose!==false){
	 			//strip the sequence tag: 
	 			return "\n".trim(substr($base_text, strlen('<'.SEQUENCE_TAG.'>'), $seqClose-strlen('</'.SEQUENCE_TAG.'>') ))."\n";
	 		}else{
	 			return $base_text;
	 		}
 		}else{
 			//return a "new empty sequence ..only set the title:"
 			return '|title=' . $this->mTitle->getText()."\n";
 		}
 	} 
 }
?>
