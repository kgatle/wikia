/* 
 * the playlist object code 
 * only included if playlist object found
 * 
 * part of mv_embed: 
 * http://metavid.org/wiki/index.php/Mv_embed 
 */
var mv_default_playlist_attributes = {
	//playlist attributes :
	"id":null,
	"title":null,
	"width":400,
	"height":300,
	"desc":'',
	"controls":true,
	//playlist user controlled features
    "linkback":null, 
	"src":null,
	"embed_link":true,
	
	//enable sequencer? (only display top frame no navigation or accompanying text
	"sequencer":false
}
//the call back rate for animations and internal timers in ms: 33 is about 30 frames a second: 
var MV_ANIMATION_CB_RATE = 33;

//globals:
//10 possible colors for clips: (can be in hexadecimal)
var mv_clip_colors = new Array('aqua', 'blue', 'fuchsia', 'green', 'lime', 'maroon', 'navy', 'olive', 'purple', 'red');
//the base url for requesting stream metadata 
if(typeof wgServer=='undefined'){
	var defaultMetaDataProvider = 'http://metavid.org/overlay/archive_browser/export_cmml?stream_name=';
}else{
	var defaultMetaDataProvider = wgServer+wgScript+'?title=Special:MvExportStream&feed_format=roe&stream_name=';
}

var mvPlayList = function(element) {		
	return this.init(element);
};
//set up the mvPlaylist object
mvPlayList.prototype = {
	instanceOf:'mvPlayList',
	pl_duration:null,
	update_tl_hook:null,
	clip_ready_count:0,
	cur_clip:null,	
	start_clip:null, 
	start_clip_src:null,
	disp_play_head:null,
	userSlide:false,
	loading:true,	
	loading_external_data:true, //if we are loading external data (set to loading by default)
	
	interface_url:null, //the interface url 
	tracks:{},
	default_track:null, // the default track to add clips to.
	//the layout for the playlist object
	pl_layout : {
		seq_title:.1,
		clip_desc:.63, //displays the clip description
		clip_aspect:1.33,  // 4/3 video aspect ratio
		seq:.25,		   	  //display clip thumbnails 
		seq_thumb:.25,	 //size for thumbnails (same as seq by default) 
		seq_nav:0,	//for a nav bar at the base (currently disabled)
		//some pl_layout info:
		title_bar_height:17,
		control_height:29
	},
	init : function(element){
		js_log('mvPlayList:init:');		
		this.tracks={};		
		this.default_track=null;						
	    	
		//add default track & default track pointer: 
		this.tracks[0]= new trackObj();
		this.default_track = this.tracks[0];				
		
		//get all the attributes:
	  	for(var attr in mv_default_playlist_attributes){       
	        if( element.getAttribute(attr) ){
	            this[attr]=element.getAttribute(attr);
	            //js_log('attr:' + attr + ' val: ' + video_attributes[attr] +" "+'elm_val:' + element.getAttribute(attr) + "\n (set by elm)");  
	        }else{        
	            this[attr]=mv_default_playlist_attributes[attr];
	            //js_log('attr:' + attr + ' val: ' + video_attributes[attr] +" "+ 'elm_val:' + element.getAttribute(attr) + "\n (set by attr)");  
	        }
	    }
		//make sure height and width are int:
		this.width =parseInt(this.width);
		this.height=parseInt(this.height);
		
	    //if style is set override width and height
	    if(element.style.width)this.width = parseInt(element.style.width.replace('px',''));
	    if(element.style.height)this.height = parseInt(element.style.height.replace('px',''));	    	   	    	    	   	    	   
	},			
	//the element has now been swapped into the dom: 
	on_dom_swap:function(){
		js_log('pl: dom swap');
		//get and load the html:
		this.getHTML();
	},
	//run inheritEmbedObj on every clip (we have changed the playback method) 
	inheritEmbedObj:function(){		
		$j.each(this.tracks, function(i,track){	
			track.inheritEmbedObj();			
		});
	},	
	doOptionsHTML:function(){
		//grab "options" use current clip:
		this.cur_clip.embed.doOptionsHTML();
	},
	//pulls up the video editor inline
	doEditor:function(){
		//black out the page: 
		$j('body').append('<div id="modalbox" class="modal_editor">' + '<div id="mv_overlay"/> ');
						
		$j('#modalbox').html('loading editor<blink>...</blink>');
		var _this=this;
		js_log("calling sequence with url:" + _this.src);
		
		//clone the playlist (to make for easy cancel) 
		/*var this_plObj_Clone = $j('#'+this.id).get(0).cloneNode(true);
		this_plObj_Clone.sequencer=true;
		this_plObj_Clone.id= 'seq_plobj';
		debugger;
		*/		
		//load sequencer: 
		mv_do_sequence({
				"sequence_container_id":'modalbox', 
				"mv_pl_src":this.src						
			});
					
	},
	selectPlaybackMethod:function(){
		this.cur_clip.embed.selectPlaybackMethod();
	},
	closeDisplayedHTML:function(){
		this.cur_clip.embed.closeDisplayedHTML();
	},
	showVideoDownload:function(){
		this.cur_clip.embed.showVideoDownload();
	},
	showEmbedCode:function(){
		var embed_code = '&lt;script type=&quot;text/javascript&quot; '+
						'src=&quot;'+mv_embed_path+'mv_embed.js&quot;&gt;&lt;/script&gt '+"\n" + 
						'&lt;playlist id=&quot;'+this.id+'&quot; ';
						if(this.src){
							embed_code+='src=&quot;'+this.src+'&quot; /&gt;';
						}else{
							embed_code+='&gt;'+"\n";
							embed_code+= this.data.htmlEntities();
							embed_code+='&lt;playlist/&gt;';
						}
		this.cur_clip.embed.showEmbedCode(embed_code);
	},
	getPlaylist:function(){		
		js_log("f:getPlaylist: " + this.srcType );
		//@@todo lazy load plLib
		eval('var plObj = '+this.srcType+'Playlist;');	
   	  	//import methods from the plObj to this
   	  	for(var method in plObj){
        	//js parent preservation for local overwritten methods
        	if(this[method])this['parent_' + method] = this[method];
            this[method]=plObj[method];
            js_log('inherit:'+ method);
        } 
            
        if(typeof this.doParse != 'function'){
        	js_log('error: method doParse not found in plObj'+ this.srcType);
        	return false;		        	
        }   
                         
        if(typeof this.doParse == 'function'){
	   	  	if( this.doParse() ){
	   	  		this.doWhenParseDone();	
	   	  	}else{
	   	  		js_log("error: failed to parse playlist");
	   	  		return false;
	   	  		//error or parse needs to do ajax requests	
	   	  	}
        }       		
	},
	doWhenParseDone:function(){				
		js_log('f:doWhenParseDone');
		//do additional init for clips: 
		var _this = this;
		var error=false;
		_this.clip_ready_count=0;		
		for( var i in this.default_track.clips ){
			var clip = 	this.default_track.clips[i];
			if(clip.embed.load_error){
				var error = clip.embed.load_error;				
				//break on any clip we can't playback:
				break;
			}
			if( clip.embed.ready_to_play ){
				_this.clip_ready_count++;
				continue;
			}
			//js_log('clip sources count: '+ clip.embed.media_element.sources.length);		
			clip.embed.on_dom_swap();
			if( clip.embed.loading_external_data==false && 
	   			clip.embed.init_with_sources_loadedDone==false){
					clip.embed.init_with_sources_loaded();
			}					
		}
		
		//@@todo for some plugins we have to conform types of clips
		// ie vlc can play flash _followed_by_ ogg _followed_by_ whatever 
		// 		but
		// native ff 3.1a2 can only play ogg 
		if( error){
			this.load_error=error;
			this.is_ready=false;
		}else if( _this.clip_ready_count == _this.getClipCount() ){
			js_log("done init all clips: " +  _this.clip_ready_count + ' = ' + _this.getClipCount());			
			this.doWhenClipLoadDone();
		}else{
			js_log("only "+ _this.clip_ready_count +" clips done, scheduling callback:");
			if( !mvJsLoader.load_error )	//re-issue request if no load error:
				setTimeout('document.getElementById(\''+this.id+'\').doWhenParseDone()', 250);
		}				    	    	
	},
	doWhenClipLoadDone:function(){		
		this.ready_to_play = true;
		this.loading = false;
		this.getHTML();		
	},	
	getDuration:function( regen ){			
		//js_log("GET PL DURRATION for : "+ this.tracks[this.default_track_id].clips.length + 'clips');
		if(!regen && this.pl_duration)
			return this.pl_duration;
						
		var durSum=0;		
		$j.each( this.default_track.clips, function( i, clip ){	
			if( clip.embed ){			
				js_log('plDUR:add : '+ clip.getDuration() + ' src:' + clip.embed.src);
				clip.dur_offset = durSum;
				durSum += clip.getDuration();
			}else{
				js_log("ERROR: clip " +clip.id + " not ready");
			}
		});
		this.pl_duration=durSum;		
		//js_log("return dur: " + this.pl_duration);
		return this.pl_duration;
	},
	getDataSource:function(){	
		js_log("f:getDataSource "+ this.src);
		//determine the type / first is it m3u or xml? 	
		var pl_parent = this;
		this.makeURLAbsolute();
		if(this.src!=null){			
			do_request(this.src, function(data){
				pl_parent.data=data;
				pl_parent.getSourceType();
			});	
		}
	},
	getSourceType:function(){
		js_log('data type of: '+ this.src + ' = ' + typeof (this.data) + "\n"+ this.data);
		this.srcType =null;
		//if not external use different detection matrix
		if(this.loading_external_data){				
			if( typeof this.data == 'object' ){
				js_log('object');		
				//object assume xml (either xspf or rss) 
				plElm = this.data.getElementsByTagName('playlist')[0];
				if( plElm ){
					if(plElm.getAttribute('xmlns')=='http://xspf.org/ns/0/'){
						this.srcType ='xspf';
					}
				}
				//check itunes style rss "items" 
				rssElm = this.data.getElementsByTagName('rss')[0];
				if(rssElm){
					if(rssElm.getAttribute('xmlns:itunes')=='http://www.itunes.com/dtds/podcast-1.0.dtd'){
						this.srcType='itunes';						
					}					
				}				
				//check for smil tag: 
				smilElm = this.data.getElementsByTagName('smil')[0];
				if(smilElm){
					//don't check dtd yet.. (have not defined the smil subset) 
					this.srcType='smil';
				}
			}else if(typeof this.data == 'string'){		
				js_log('String');
				//look at the first line: 
				var first_line = this.data.substring(0, this.data.indexOf("\n"));
				js_log('first line: '+ first_line);	
				//string
				if(first_line.indexOf('#EXTM3U')!=-1){
					this.srcType = 'm3u';
				}else if(first_line.indexOf('<smil')!=-1){
					//@@todo parse string
					this.srcType = 'smil';
				}
			}
		}
		
		if(this.srcType){
			js_log('is of type:'+ this.srcType);
			this.getPlaylist();
		}else{
			//unknown playlist type
			js_log('unknown playlist type?');
			if(this.src){
				this.innerHTML= 'error: unknown playlist type at url:<br> ' + this.src;
			}else{
				this.innerHTML='error: unset src or unknown inline playlist data<br>';
			}
		}			
	},	
	//simple function to make a path into an absolute url if its not already
	makeURLAbsolute:function(){		
		if(this.src){
			if(this.src.indexOf('://')==-1){
				var purl = parseUri(document.URL);			
				if(this.src.charAt(0)=='/'){						
					this.src = purl.protocol +'://'+ purl.host + this.src;
				}else{
					this.src= purl.protocol +'://'+ purl.host + purl.directory + this.src;				
				}
			}
		}
	},	
	//set up minimal media_element emulation: 	
	media_element:{	
		selected_source:{
			supports_url_time_encoding:true
		}
	},
	//@@todo needs to update for multi-track clip counts
	getClipCount:function(){
		return this.default_track.clips.length; 
	},	
	//},
	//takes in the playlist 
	// inherits all the properties 
	// swaps in the playlist object html/interface div	
	getHTML:function(){							
		if(this.loading){
			js_log('called getHTML (loading)');
			$j('#'+this.id).html('loading playlist<blink>...</blink>'); 
			if( this.loading_external_data ){
				//load the data source chain of functions (to update the innerHTML)   			
				this.getDataSource();  
			}else{
				//detect datatype and parse directly: 
				this.getSourceType();
			}
		}else{
			//check for empty playlist otherwise renderDisplay:		
			if(this.default_track.getClipCount()==0){
				$j(this).html('empty playlist');
				return ;
			}else{
				this.renderDisplay();
			}								
		}
	},
	renderDisplay:function(){		
		js_log('track length: ' +this.default_track.getClipCount() );''
		
		var plObj=this;			
		//setup layout for title and dc_ clip container  
		$j(this).html('<div id="dc_'+this.id+'" style="width:'+this.width+'px;' +
				'height:'+(this.height+this.pl_layout.title_bar_height + this.pl_layout.control_height)+'px;position:relative;">' +
				'	<div style="font-size:13px;border:solid thin;width:'+this.width+'px;" id="ptitle_'+this.id+'"></div>' +
				'</div>');									
		
		//add the playlist controls:						
		$j('#dc_'+plObj.id).append(
			'<div class="videoPlayer" style="position:absolute;top:'+(plObj.height+plObj.pl_layout.title_bar_height)+'px">' +
				'<div id="mv_embedded_controls_'+plObj.id+'" ' +
					'style="postion:relative;top:'+(plObj.height+plObj.pl_layout.title_bar_height)+'px;' +
						'width:'+plObj.width+'px" ' +
					'class="controls">' + 
					 plObj.getControlsHTML() +
				'</div>'+
			'</div>'
		);
		//add the play button:						
	  	$j('#dc_'+plObj.id).append(
	  		this.cur_clip.embed.getPlayButton()
	  	);
		//once the controls are in the DOM add hooks: 
		ctrlBuilder.addControlHooks(this);
		
		this.setupClipDisplay();									 	
						
		//update the title and status bar
		this.updateBaseStatus();	
	},
	setupClipDisplay:function(){
		var plObj = this;
		$j.each(this.default_track.clips, function(i, clip){
			$j('#dc_'+plObj.id).append('<div class="clip_container" id="clipDesc_'+clip.id+'" '+
				'style="display:none;position:absolute;text-align: center;border:solid thin;width:'+plObj.width + 'px;'+
				'height:'+(plObj.height )+'px;'+
				'top:' + this.title_bar_height + 'px;left:0px"></div>');	
			//update the embed html: 					
			clip.embed.height=plObj.height;
			clip.embed.width=plObj.width;				
			clip.embed.play_button=false;
			
			clip.embed.getHTML();//get the thubnails for everything			
			$j(clip.embed).css({ 'position':"absolute",'top':"0px", 'left':"0px"});					
			if($j('#clipDesc_'+clip.id).get(0)){
				$j('#clipDesc_'+clip.id).get(0).appendChild(clip.embed);
			}else{
				js_log('cound not find: clipDesc_'+clip.id);					
			}																
		}); 				
		if(this.cur_clip)
			$j('#clipDesc_'+this.cur_clip.id).css( { display:'inline' } );
	},	
	updateThumbPerc:function( perc ){
		//get float seconds:
		var float_sec =  ( this.getDuration() * perc );
		this.updateThumbTime( float_sec );			
	},
	updateThumbTime:function( float_sec ){			
		//update display & cur_clip:
		var pl_sum_time =0; 
		var clip_float_sec=0;		
		//js_log('seeking clip: ');
		for(var i in this.default_track.clips){
			var clip = this.default_track.clips[i];
			if( (clip.getDuration() + pl_sum_time) >= float_sec ){
				if(this.cur_clip.id != clip.id){					
					$j('#clipDesc_'+this.cur_clip.id).hide();
					this.cur_clip = clip;
					$j('#clipDesc_'+this.cur_clip.id).show();
				}								
				break;
			}
			pl_sum_time+=clip.getDuration();
		}		
		
		//update start_offset 
		if(typeof this.cur_clip.embed.start_offset=='undefined'){
			if(!typeof this.cur_clip.embed.media_element.selected_source!='undefined')
				this.cur_clip.embed.start_offset=this.cur_clip.embed.media_element.selected_source.start_offset;
		}							
		
		//issue thumbnail update request: (if plugin supports it will render out frame 
		// if not then we do a call to the server to get a new jpeg thumbnail  
		this.cur_clip.embed.updateThumbTime( float_sec - pl_sum_time );
		
		this.cur_clip.embed.currentTime = (float_sec -pl_sum_time)+this.cur_clip.embed.start_offset ;
		this.cur_clip.embed.seek_time_sec = (float_sec -pl_sum_time );
		
		//render effects ontop: (handled by doSmilActions)		
		this.doSmilActions( single_line = true );	
	},
	updateBaseStatus:function(){
		js_log('f:updateBaseStatus');
		$j('#ptitle_'+this.id).html(''+
			'<b>' + this.title + '</b> '+				
			this.getClipCount()+' clips, <i>'+
			seconds2ntp( this.getDuration() ) + '</i>' + 
			'<a href="#" onclick="$j(\'#'+this.id+'\').get(0).doEditor();" style="position:absolute;top:0px;right:0px">edit</a>');
		//render out the dividers on the timeline: 
		this.colorPlayHead();		
		//update status:
		this.setStatus('0:0:00/'+seconds2ntp( this.getDuration() ));				
	},	
	/*setStatus override (could call the jquery directly) */
	setStatus:function(value){
		$j('#mv_time_'+this.id).html( value );
	},
	setSliderValue:function(value){
		//js_log('calling original embed slider with val: '+value);
		this.cur_clip.embed.pe_setSliderValue( value );
		//call seq playline update here
	},	
	getPlayHeadPos: function(prec_done){
		var	plObj = this;
		if($j('#mv_seeker_'+this.id).length==0){
			//js_log('no playhead so we can\'t get playhead pos' );
			return 0;
		}
		var track_len = $j('#mv_seeker_'+this.id).css('width').replace(/px/, '');
		//assume the duration is static and present at .duration during playback
		var clip_perc = this.cur_clip.embed.duration / this.getDuration();
		var perc_offset =time_offset = 0;
		for(var i in this.default_track.clips){
			var clip = this.default_track.clips[i];
			if(this.cur_clip.id ==clip.id)break;
			perc_offset+=(clip.embed.duration /  plObj.getDuration());
			time_offset+=clip.embed.duration;
		} 		
		//run any update time line hooks:		
		if(this.update_tl_hook){	
			var cur_time_ms = time_offset + Math.round(this.cur_clip.embed.duration*prec_done);
			if(typeof update_tl_hook =='function'){
				this.update_tl_hook(cur_time_ms);
			}else{
				//string type passed use eval: 
				eval(this.update_tl_hook+'('+cur_time_ms+');');
			}
		}
		
		//handle offset hack @@todo fix so this is not needed:
		if(perc_offset > .66)
			perc_offset+=(8/track_len);
		//js_log('perc:'+ perc_offset +' c:'+ clip_perc + '*' + prec_done + ' v:'+(clip_perc*prec_done));
		return perc_offset + (clip_perc*prec_done);
	},
	//attempts to load the embed object with the playlist
	loadEmbedPlaylist: function(){
		//js_log('load playlist');
	},
	//called when the plugin advances to the next clip in the playlist
	playlistNext:function(){
		js_log('pl advance');
		this.cur_clip=this.getClip(1);
	},
	next: function(){		
		//advance the playhead to the next clip			
		var next_clip = this.getClip(1);									
		//@@todo where the plugin supports pre_loading future clips and manage that in javascript
		//stop current clip
		this.cur_clip.embed.stop();
		this.updateCurrentClip(next_clip);				
		this.cur_clip.embed.play();					
	},
	updateCurrentClip:function(new_clip){		
		js_log('f:updateCurrentClip:'+new_clip.id);		
		//do swap:		
		$j('#clipDesc_'+this.cur_clip.id).hide();			
		this.cur_clip=new_clip;			
		$j('#clipDesc_'+this.cur_clip.id).show();
		//update the playhead: 
		this.setSliderValue( this.cur_clip.dur_offset / this.getDuration() ); 			
	},
	prev: function(){
		//advance the playhead to the previous clip			
		var prev_clip = this.getClip(-1);
		//@@todo we could do something fancy like use playlist for sets of clips where supported. 
		// or in cases where the player nativly supports the playlist format we can just pass it in (ie m3u or xspf)
		if(this.cur_clip.embed.supports['playlist_swap_loader']){
			//where the plugin supports pre_loading future clips and manage that in javascript
			//pause current clip
			this.cur_clip.embed.pause;
			//do swap:
			this.updateCurrentClip(prev_clip);			
			this.cur_clip.embed.play();			
		}else{			
			js_log('do prev hard embed swap');										
			this.switchPlayingClip(prev_clip);
		}		
	},
	switchPlayingClip:function(new_clip){
		//swap out the existing embed code for next clip embed code
		$j('#mv_ebct_'+this.id).empty();
		new_clip.embed.width=this.width;
		new_clip.embed.height=this.height;
		//js_log('set embed to: '+ new_clip.embed.getEmbedObj());
		$j('#mv_ebct_'+this.id).html( new_clip.embed.getEmbedObj() );
		this.cur_clip=new_clip;
		//run js code: 
		this.cur_clip.embed.pe_postEmbedJS();
	},
	//playlist play
	play: function(){
		var plObj=this;
		js_log('pl play');
		//hide the playlist play button: 
		$j('#big_play_link_'+this.id).hide();				
		
		//un-pause if paused:
		if(this.paused)
			this.paused=false;
		
		//update the control: 
		
		this.start_clip = this.cur_clip;		
		this.start_clip_src= this.cur_clip.src;
		 
		if(this.cur_clip.embed.supports['playlist_swap_loader'] ){
			//navtive support:
			// * pre-loads clips
			// * mv_playlist smil extension, manages transitions animations overlays etc. 			
			js_log('clip obj supports playlist swap_loader (ie playlist controlled playback)');
			//update cur clip based if sequence playhead set: 
			var d = new Date();
			this.clockStartTime = d.getTime();			
			this.monitor();		
			//@@todo pre-load each clip: 
			this.cur_clip.embed.play();			
		}else if(this.cur_clip.embed.supports['playlist_driver']){				
			js_log('playlist_driver');
			//embedObject is feed the playlist info directly and manages next/prev
			this.cur_clip.embed.playMovieAt(this.cur_clip.order);
		}else{
			//not much playlist support just play the first clip:
			js_log('basic play');
			//play cur_clip			
			this.cur_clip.embed.play();		
		}
	},	
	toggleMute:function(){
		this.cur_clip.embed.toggleMute();
	},	
	pause:function(){		
		js_log('f:pause: playlist');
		var ct = new Date();
		this.pauseTime = this.currentTime;
		this.paused=true;
		js_log('pause time: '+ this.pauseTime + ' call embed pause:');					
		this.cur_clip.embed.pause();		
	},
	fullscreen:function(){
		this.cur_clip.embed.fullscreen();
	},
	//playlist stops playback for the current clip (and resets state for start clips)
	stop:function(){
		/*js_log("pl stop:"+ this.start_clip.id + ' c:'+this.cur_clip.id);
		//if start clip 
		if(this.start_clip.id!=this.cur_clip.id){
			//restore clipDesc visibility & hide desc for start clip: 
			$j('#clipDesc_'+this.start_clip.id).html('');
			this.start_clip.getDetail();
			$j('#clipDesc_'+this.start_clip.id).css({display:'none'});
			this.start_clip.setBaseEmbedDim(this.start_clip.embed);
			//equivalent of base stop
			$j('#'+this.start_clip.embed.id).html(this.start_clip.embed.getThumbnailHTML());
			this.start_clip.embed.thumbnail_disp=true;
		}
		//empty the play-back container
		$j('#mv_ebct_'+this.id).empty();*/
		
		//make sure the current clip is vissable:
		$j('#clipDesc_'+this.cur_clip.id).css({display:'inline'});
		
		//do stop current clip
		this.cur_clip.embed.stop();
		//stop the monitor: 
		window.clearInterval( this.smil_monitorTimerId );	
	},	
	doSeek:function(v){
		js_log('pl:doSeek:'+v);
		var plObj = this;
		var prevClip=null;
		//jump to the clip in the current percent. 
		var perc_offset=0;
		var next_perc_offset=0;
		for(var i in plObj.default_track.clips){
			var clip = plObj.default_track.clips[i];		
			next_perc_offset+=( clip.getDuration() /  plObj.getDuration()) ;
			//js_log('on ' + clip.getDuration() +' next_perc_offset:'+ next_perc_offset);
			if(next_perc_offset > v ){	
				//pass along the relative percentage to embed object: 				
				//js_log('seek:'+ v +' - '+perc_offset + ') /  (' + next_perc_offset +' - '+ perc_offset);
				var relative_perc =  (v -perc_offset) /  (next_perc_offset - perc_offset);  					
				plObj.cur_clip = clip;
				plObj.cur_clip.embed.doSeek( relative_perc );
				this.play();
				return '';
			}
			perc_offset = next_perc_offset;
		} 	
	},
	//gets playlist controls large control height for sporting 
	//next prev button and more status display
	getControlsHTML:function(){
		//get controls from current clip  (add some playlist specific controls:  		
		this.cur_clip.embed.supports['prev_next']=true;		
		return ctrlBuilder.getControls(this.cur_clip.embed);
	},	
	//ads colors/dividers between tracks
	colorPlayHead: function(){
		if( !this.mv_seeker_width)
			this.mv_seeker_width = $j('#mv_seeker_slider_'+this.id).width();								
	
		if( !this.track_len ) 
			this.track_len = $j('#seeker_bar_'+this.id).css('width').replace(/px/, '');
			
		//total duration:		
		var pl_duration = this.getDuration();
		
		var cur_pixle=0;		
		//set up plObj
		var _this = this;
		//js_log("do play head total dur: "+pl_duration );
		$j.each(this.default_track.clips, function(i, clip){			
			var perc = ( clip.getDuration() / pl_duration );
			var pwidth = Math.round( perc * _this.track_len);
			//var pwidth = Math.round( perc  * _this.track_len - (_this.mv_seeker_width*perc) );
			
			var barHtml = '<div id="cl_status_'+clip.id+'" class="cl_status"  style="' +					
					'left:'+cur_pixle +'px;'+
					'width:'+pwidth + 'px;';					
			//set left or right border based on track pos 
			barHtml+=( i == _this.default_track.getClipCount()-1 )?
				 'border-left:solid thin black;':
				 'border-right:solid thin black;';											
			barHtml+= 'filter:alpha(opacity=40);'+
					'-moz-opacity:.40;">'
					'</div>';
			//background:#DDDclip.getColor()
			$j('#seeker_bar_'+_this.id).append(barHtml);
																										
			//js_log('offset:' + cur_pixle +' width:'+pwidth+' add clip'+ clip.id + ' is '+clip.embed.getDuration() +' = ' + perc +' of ' + _this.track_len);
			cur_pixle+=pwidth;								
		});				
	},
	setUpHover:function(){
		js_log('Setup Hover');
		//set up hover for prev,next 
		var th = 50;
		var tw = th*this.pl_layout.clip_aspect;
		var plObj = this;
		$j('#mv_prev_link_'+plObj.id+',#mv_next_link_'+plObj.id).hover(function() {
		  	var clip = (this.id=='mv_prev_link_'+plObj.id)?
		  		plObj.getClip(-1):plObj.getClip(1);
		  	//get the position of #mv_perv|next_link:
  			var loc = getAbsolutePos(this.id);
		  	//js_log('Hover: x:'+loc.x + ' y:' + loc.y + ' :'+clip.img);
		   	$j("body").append('<div id="mv_Athub" style="position:absolute;' +
	   			'top:'+loc.y+'px;left:'+loc.x+'px;width:'+tw+'px;height:'+th+'px;">'+
				'<img style="border:solid 2px '+clip.getColor()+';position:absolute;top:0px;left:0px;" width="'+tw+'" height="'+th+'" src="'+clip.img+'"/>'+
			'</div>');
      }, function() {
      		$j('#mv_Athub').remove();
      });     
	},
	//returns a clip. If offset is out of bound returns first or last clip
	getClip: function(clip_offset){				
		if(!clip_offset)clip_offset=0;	
					
		var cov = parseInt( this.cur_clip.order ) + parseInt( clip_offset );
		var cmax = this.getClipCount()-1;
		js_log( 'f:getClip: '+clip_offset + ' cov:'+cov +' cmax:'+ cmax);
		
		//force first or last clip if offset is outOfBounds 
		if( cov >= 0 && cov <= cmax ){			
			return this.default_track.clips[ cov ];
		}else{
			if(cov < 0) return this.default_track.clips[0];
			if(cov > cmax) return this.default_track.clips[cmax];
		}
	},
	/* 
	 * generic add Clip to ~default~ track
	 */
	addCliptoTrack: function(clipObj, pos){
		if( typeof clipObj['track_id'] =='undefined'){
			var track = this.default_track;
		}else{
			var track = this.tracks[ clipObj.track_id ]
		}
		js_log('add clip' + clipObj.id +' to track: at:' + pos);		
		//set the first clip to current (maybe deprecated ) 
		if(clipObj.order==0){
			if(!this.cur_clip)this.cur_clip=clipObj;
		}		
		track.addClip(clipObj, pos);		
	},
	swapClipDesc: function(req_clipID, callback){
		//hide all but the requested
		var plObj=this;
		js_log('r:'+req_clipID+' cur:'+plObj.id);
		if(req_clipID==plObj.cur_clip.id){
			js_log('no swap to same clip');
		}else{
			//fade out clips
			req_clip=null;
			$j.each(this.default_track.clips, function(i, clip){
				if(clip.id!=req_clipID){
					//fade out if display!=none already
					if($j('#clipDesc_'+clip.id).css('display')!='none'){
						$j('#clipDesc_'+clip.id).fadeOut("slow");
					}
				}else{
					req_clip =clip;
				}
			});
			//fade in requested clip *and set req_clip to current
			$j('#clipDesc_'+req_clipID).fadeIn("slow", function(){
					plObj.cur_clip = req_clip;
					if(callback)
						callback();
			});		
		}
	},	
	getPLControls: function(){
		js_log('getPL cont');
		return 	'<a id="mv_prev_link_'+this.id+'" title="Previus Clip" onclick="document.getElementById(\''+this.id+'\').prev();return false;" href="#">'+
					getTransparentPng({id:'mv_prev_btn_'+this.id,style:'float:left',width:'27', height:'27', border:"0", 
						src:mv_embed_path+'images/vid_prev_sm.png' }) + 
				'</a>'+
				'<a id="mv_next_link_'+this.id+'"  title="Next Clip"  onclick="document.getElementById(\''+this.id+'\').next();return false;" href="#">'+
					getTransparentPng({id:'mv_next_btn_'+this.id,style:'float:left',width:'27', height:'27', border:"0", 
						src:mv_embed_path+'images/vid_next_sm.png' }) + 
				'</a>';		
	},
	run_transition: function( clip_inx, trans_type){		
		if(typeof this.default_track.clips[ clip_inx ][ trans_type ] == 'undefined')
			clearInterval( this.default_track.clips[ clip_inx ].timerId );
		else
			this.default_track.clips[ clip_inx ][ trans_type ].run_transition();		
	}
}

/* Object Stubs: 
 * 
 * @videoTrack ... stores clips and layer info
 * 
 * @clip... each clip segment is a clip object. 
 * */
var mvClip = function(o) {	
	if(o)
		this.init(o);
	return this;
};
//set up the mvPlaylist object
mvClip.prototype = {
	id:null, //clip id
	pp:null, // parent playlist
	order:null, //the order/array key for the current clip
	src:null,
	info:null,
	title:null,
	mvclip:null,
	type:null,
	img:null,
	duration:null,
	loading:false,
	isAnimating:false,			
	init:function(o){		
		//init object including pointer to parent
		for(var i in o){			
			this[i]=o[i];
		};		
		js_log('id is: '+ this.id);
	},
	//setup the embed object:
	setUpEmbedObj:function(){
		js_log('pl:setUpEmbedObj');
		//init:
		//debugger;
		
		this.embed=null;		
		//js_log('setup embed for clip '+ this.id + ':id is a function?'); 
		//set up the pl_mv_embed object:
		var init_pl_embed={id:'e_'+this.id,
			pc:this, //parent clip
			src:this.src
		};

		this.setBaseEmbedDim(init_pl_embed);
		//always display controls for playlists: 
		
		//if in sequence mode hide controls / embed links 		
		//			init_pl_embed.play_button=false;
		init_pl_embed.controls=false;	
		//if(this.pp.sequencer=='true'){
		init_pl_embed.embed_link=null;	
		init_pl_embed.linkback=null;	
		
		if(this.poster)init_pl_embed['thumbnail']=this.poster;
		
		if(this.type)init_pl_embed['type'] = this.type;
		
		this.embed = new PlMvEmbed(init_pl_embed);
				
		js_log('ve src len:' + this.embed.media_element.sources.length);
		//js_log('media element:'+ this.embed.media_element.length);
		//js_log('type of embed:' + typeof(this.embed) + ' seq:' + this.pp.sequencer+' pb:'+ this.embed.play_button);		
	},
	doAdjust:function(side, delta){
		js_log("f:doAdjust: " + side + ' , ' +  delta);
		if(this.embed){		
			if(side=='start'){
				var start_offset =parseInt(this.embed.start_offset)+parseInt(delta*-1);				
				this.embed.updateVideoTime( seconds2ntp(start_offset), seconds2ntp ( this.embed.start_offset + this.embed.getDuration() ) );
			}else if(side=='end'){
				var end_offset = parseInt(this.embed.start_offset) + parseInt( this.embed.getDuration() ) + parseInt(delta);
				this.embed.updateVideoTime( seconds2ntp(this.embed.start_offset), seconds2ntp(end_offset) );
			}
			//update everything: 
			this.pp.refresh();
			/*var base_src = this.src.substr(0,this.src.indexOf('?'));
			js_log("delta:"+ delta);
			if(side=='start'){
				//since we adjust start invert the delta: 
				var start_offset =parseInt(this.embed.start_offset/1000)+parseInt(delta*-1);
				this.src = base_src +'?t='+ seconds2ntp(start_offset) +'/'+ this.embed.end_ntp;							
			}else if(side=='end'){
				//put back into seconds for adjustment: 
				var end_offset = parseInt(this.embed.start_offset/1000) + parseInt(this.embed.duration/1000) + parseInt(delta);
				this.src = base_src +'?t='+ this.embed.start_ntp +'/'+ seconds2ntp(end_offset);
			}				
			this.embed.updateVideoTime( this.src );
			//update values
			this.duration = this.embed.getDuration();
			this.pp.pl_duration=null;
			//update playlist stuff:
			this.pp.updateTitle();*/
		}
	},	
	getDuration:function(){		
		if(!this.embed)this.setUpEmbedObj();		
		return this.embed.getDuration();
	},
	setBaseEmbedDim:function(o){
		if(!o)o=this;
		//o.height=Math.round(pl_layout.clip_desc*this.pp.height)-2;//give it some padding:
		//o.width=Math.round(o.height*pl_layout.clip_aspect)-2;
		o.height=	this.pp.height;
		o.width =	this.pp.width;	
	},		
	//output the detail view:
	//@@todo
	/*getDetail:function(){
		//js_log('get detail:' + this.pp.title);
		var th=Math.round( this.pl_layout.clip_desc * this.pp.height );	
		var tw=Math.round( th * this.pl_layout.clip_aspect );		
		
		var twDesc = (this.pp.width-tw)-2;
		
		if(this.title==null)
			this.title='clip ' + this.order + ' ' +this.pp.title;
		if(this.desc==null)
			this.desc=this.pp.desc;
		//update the embed html: 
		this.embed.getHTML();
					
		$j(this.embed).css({ 'position':"absolute",'top':"0px", 'left':"0px"});
		
		//js_log('append child to:#clipDesc_'+this.id);
		if($j('#clipDesc_'+this.id).get(0)){
			$j('#clipDesc_'+this.id).get(0).appendChild(this.embed);
			
			$j('#clipDesc_'+this.id).append(''+
			'<div id="pl_desc_txt_'+this.id+'" class="pl_desc" style="position:absolute;left:'+(tw+2)+'px;width:'+twDesc+'px;height:'+th+'px;overflow:auto;">'+
					'<b>'+this.title+'</b><br>'+			
					this.desc + '<br>' + 
					'<b>clip length:</b> '+ this.embed.getDurationNTP()+ 
			'</div>');		
		}
	},*/
	getTitle:function(){
		if(typeof this.title == 'string')
			return this.title
			
		return 'untitled clip ' + this.order;
	},
	getClipImg:function(start_offset, size){
		js_log('f:getClipImg ' + start_offset + ' s:'+size);	
		if( !this.img){			
			return mv_default_thumb_url; 
		}else{
			if(!size && !start_offset){			
				return this.img;
			}else{
				//if a metavid image (has request parameters) use size and time args
				if(this.img.indexOf('?')!=-1){
					js_log('get with offset: '+ start_offset);
					var time = seconds2ntp( start_offset+ (this.embed.start_offset/1000) );
					js_log("time is: " + time);
					this.img = this.img.replace(/t\=[^&]*/gi, "t="+time);
					if(this.img.indexOf('&size=')!=-1){
						this.img = this.img.replace(/size=[^&]*/gi, "size="+size);
					}else{
						this.img+='&size='+size;
					}
				}
				return this.img;				
			}
		}
	},
	getColor: function(){
		//js_log('get color:'+ num +' : '+  num.toString().substr(num.length-1, 1) + ' : '+colors[ num.toString().substr(num.length-1, 1)] );
		var num = this.id.substr( this.id.length-1, 1);
		if(!isNaN(num)){
			num=num.charCodeAt(0);
		}
		if(num >= 10)num=num % 10;
		return mv_clip_colors[num];
	}	
}
/* mv_embed extensions for playlists */
var PlMvEmbed=function(vid_init){
	//js_log('PlMvEmbed: '+ vid_init.id);	
	//create the div container
	var ve = document.createElement('div');
	//extend ve with all this 
	this.init(vid_init);	
	for(method in this){
		if(method!='readyState'){					
			ve[method]= this[method];
		}
	}
	js_log('ve src len:'+ ve.media_element.sources.length);
	return ve;
}
//all the overwritten and new methods for playlist extension of mv_embed
PlMvEmbed.prototype = {	
	init:function(vid_init){				
		//send embed_video a created video element: 
		ve = document.createElement('div');
		for(var i in vid_init){		
			//set the parent clip pointer: 	
			if(i=='pc'){
				this['pc']=vid_init['pc'];
			}else{
				ve.setAttribute(i,vid_init[i]);
			}
		}
		var videoInterface = new embedVideo(ve);			
		//inherit the videoInterface
		for(method in videoInterface){			
			if(method!='style'){
				if(this[method]){
					//parent embed method preservation:
					this['pe_'+method]=videoInterface[method];	
				}else{
					this[method]=videoInterface[method];
				}
			}
			//string -> boolean:
			if(this[method]=="false")this[method]=false;
			if(this[method]=="true")this[method]=true;
		}				
	},
	stop:function(){
		//set up convenience pointer to parent playlist
		var plObj = this.pc.pp;
		var plEmbed = this;					
			
		js_log('do stop');
		var th=Math.round( plObj.pl_layout.clip_desc * plObj.height );	
		var tw=Math.round( th * plObj.pl_layout.clip_aspect );
		//run the parent stop:
		this.pe_stop();
		var pl_height = (plObj.sequencer=='true')?plObj.height+27:plObj.height;
		
		plEmbed.getHTML();
		
		//restore control offsets: 		
		/*(if(this.pc.pp.controls){
			$j('#dc_'+plObj.id).animate({
				height:pl_height
			},"slow");
		}*/	
		//if(plObj.sequencer=='true'){						
		/*}else{
			//fade in elements
			$j('#big_play_link_'+this.id+',#lb_'+this.id+',#le_'+this.id+',#seqThumb_'+plObj.id+',#pl_desc_txt_'+this.pc.id).fadeIn("slow");	
			//animate restore of resize 
			var res ={};
			this.pc.setBaseEmbedDim(res);
			//debugger;
			$j('#img_thumb_'+this.id).animate(res,"slow",null,function(){
				plEmbed.pc.setBaseEmbedDim(plEmbed);
				plEmbed.getHTML();
				//restore the detail
				$j('#clipDesc_'+plEmbed.pc.id).empty();
				plEmbed.pc.getDetail();
				//$j('#seqThumb_'+plObj.id).css({position:'absolute',bottom:Math.round(this.height* pl_layout.seq_nav)});
				//$j('#'+plEmbed.id+',#dc_'+plEmbed.id).css({position:'absolute', zindex:0,width:tw,height:th});		
			});
		}*/
	},
	play:function(){
		js_log('pl eb play');		
		var plObj = this.pc.pp;	
		//check if we are already playing
		if( !this.thumbnail_disp ){
			this.pe_play();	
			return '';
		}
		mv_lock_vid_updates=true; 				
		this.pe_play();			
	},
	//do post interface operations
	postEmbedJS:function(){		
		//add playlist clips (if plugin supports it) 
		if(this.pc.pp.cur_clip.embed.playlistSupport())
			this.pc.pp.loadEmbedPlaylist();
		//color playlist points (if play_head present)
		if(this.pc.pp.disp_play_head)
			this.pc.pp.colorPlayHead();
		//setup hover images (for playhead and next/prev buttons)
		this.pc.pp.setUpHover();
		//call the parent postEmbedJS
	 	this.pe_postEmbedJS();
	 	mv_lock_vid_updates=false;
	},
	getPlayButton:function(){
		return this.pe_getPlayButton(this.pc.pp.id);
	},	
	setStatus:function(value){		
		//status updates handled by playlist obj
	},
	setSliderValue:function(value){
		//setSlider value handled by playlist obj		
	}	
}

/* 
 *  m3u parse
 */
var m3uPlaylist = {
	doParse:function(){
		//for each line not # add as clip 
		var inx =0;
		var this_pl = this;
		//js_log('data:'+ this.data.toString());
		$j.each(this.data.split("\n"), function(i,n){			
			//js_log('on line '+i+' val:'+n+' len:'+n.length);
			if(n.charAt(0)!='#'){
				if(n.length>3){ 
					//@@todo make sure its a valid url
					//js_log('add url: '+i + ' '+ n);
					var cur_clip = new mvClip({type:'srcClip',id:'p_'+this_pl.id+'_c_'+inx,pp:this_pl,src:n,order:inx});
					//setup the embed object 
					cur_clip.setUpEmbedObj();
					js_log('m3uPlaylist len:'+ thisClip.embed.media_element.sources.length);	
					this_pl.addCliptoTrack(cur_clip);					
					inx++;
				}
			}
		});
		return true;
	}
}

var itunesPlaylist = {
	doParse:function(){ 
		var properties = { title:'title', linkback:'link', 
						   author:'itunes:author',desc:'description',
						   date:'pubDate' };
		var tmpElm = null;
		for(i in properties){
			tmpElm = this.data.getElementsByTagName(properties[i])[0];
			if(tmpElm){
				this[i] = tmpElm.childNodes[0].nodeValue;
				//js_log('set '+i+' to '+this[i]);
			}
		}
		//image src is nested in itunes rss:
		tmpElm = this.data.getElementsByTagName('image')[0];
		if(tmpElm){
			imgElm = tmpElm.getElementsByTagName('url')[0];
				if(imgElm){
					this.img = imgElm.childNodes[0].nodeValue;
				}
		}
		//get the clips: 
		var clips = this.data.getElementsByTagName("item");
		properties.src = 'guid';
		for (var i=0;i<clips.length;i++){
			var cur_clip = new mvClip({type:'srcClip',id:'p_'+this.id+'_c_'+i,pp:this,order:i});			
			for(var j in properties){
				tmpElm = clips[i].getElementsByTagName( properties[j] )[0];
				if(tmpElm!=null){
					cur_clip[j] = tmpElm.childNodes[0].nodeValue;
					//js_log('set clip property: ' + j+' to '+cur_clip[j]);
				}
			}
			//image is nested
			tmpElm = clips[i].getElementsByTagName('image')[0];
			if(tmpElm){
				imgElm = tmpElm.getElementsByTagName('url')[0];
					if(imgElm){
						cur_clip.img = imgElm.childNodes[0].nodeValue;
					}
			}
			//set up the embed object now that all the values have been set
			cur_clip.setUpEmbedObj();
			
			//add the current clip to the clip list
			this.addCliptoTrack(cur_clip);
		}
		return true;
	}
}

/* 
 * parse xsfp: 
 * http://www.xspf.org/xspf-v1.html
 */
var xspfPlaylist ={
	doParse:function(){
		//js_log('do xsfp parse: '+ this.data.innerHTML);
		var properties = { title:'title', linkback:'info', 
						   author:'creator',desc:'annotation',
						   poster:'image', date:'date' };
		var tmpElm = null;
		//get the first instance of any of the meta tags (ok that may be the meta on the first clip)
		//js_log('do loop on properties:' + properties);
		for(i in properties){
			js_log('on property: '+i);			
			tmpElm = this.data.getElementsByTagName(properties[i])[0];
			if(tmpElm){
				if(tmpElm.childNodes[0]){
					this[i] = tmpElm.childNodes[0].nodeValue;
					js_log('set pl property: ' + i+' to '+this[i]);
				}
			}
		}
		var clips = this.data.getElementsByTagName("track");
		js_log('found clips:'+clips.length);
		//add any clip specific properties 
		properties.src = 'location';
		for (var i=0;i<clips.length;i++){
			var cur_clip = new mvClip({id:'p_'+this.id+'_c_'+i,pp:this,order:i});			
			//js_log('cur clip:'+ cur_clip.id);
			for(var j in properties){
				tmpElm = clips[i].getElementsByTagName( properties[j] )[0];
				if(tmpElm!=null){				
					if( tmpElm.childNodes.length!=0){
						cur_clip[j] = tmpElm.childNodes[0].nodeValue;
						js_log('set clip property: ' + j+' to '+cur_clip[j]);
					}
				}
			}			
			//add mvClip ref from info link: 
			if(cur_clip.linkback){
				//if mv linkback
				mvInx = 'Stream:';
				mvclippos = cur_clip.linkback.indexOf(mvInx);
				if(mvclippos!==false){
					cur_clip.mvclip=cur_clip.linkback.substr( mvclippos+mvInx.length );
				}
			}			
			//set up the embed object now that all the values have been set
			cur_clip.setUpEmbedObj();
			//add the current clip to the clip list
			this.addCliptoTrack(cur_clip);
		}
		//js_log('done with parse');
		return true;
	}
}
/*****************************
 * SMIL CODE (could be put into another js file / lazy_loaded for improved basic playlist performance / modularity)
 *****************************/
/*playlist driver extensions to the playlist object*/
mvPlayList.prototype.monitor = function(){	
	//js_log('pl:monitor');		
	//js_log('mvPlayList:monitor trueTime: '+ ( (ct.getTime() - this.clockStartTime )/1000));	
	//if paused stop updates
	if( this.paused ){
		//clearInterval( this.smil_monitorTimerId );
		return ;
	}
	//js_log("pl check: " + this.currentTime + ' < '+this.getDuration());
	//check if we should be done:
	if( this.currentTime >  this.getDuration() ) 
		this.stop();
	
	//update the playlist current time: 
	this.currentTime = this.cur_clip.dur_offset + this.cur_clip.embed.currentTime;	
	//update slider: 
	if(!this.userSlide){
		this.setStatus(seconds2ntp(this.currentTime) + '/' + seconds2ntp(this.getDuration()) );				
		this.setSliderValue(this.currentTime / this.getDuration());
	}

	//status updates are handled by children clips ... playlist just manages smil actions
	this.doSmilActions();	
	
	if( ! this.smil_monitorTimerId ){
    	if(document.getElementById(this.id)){
        	this.smil_monitorTimerId = setInterval('$j(\'#'+this.id+'\').get(0).monitor()', 250);
    	}
    }
}
//handles the rendering of overlays load of future clips (if necessary)
//@@todo could be lazy loaded if necessary 
mvPlayList.prototype.doSmilActions = function( single_frame ){ 		
	//js_log('f:doSmilActions: ' + this.cur_clip.id + ' tid: ' + this.cur_clip.transOut );
	var offSetTime = 0; //offset time should let us start a transition later on if we have to. 
	var _clip = this.cur_clip;	//setup a local pointer to cur_clip
	
	
	//do any smil time actions that may change the current clip
	if( this.userSlide ){
		//current clip set is set via updateThumbTime function 			
	}else{
		//assume playing and go to next: 
		if( _clip.dur <= _clip.embed.currentTime 
			 && _clip.order != _clip.pp.getClipCount()-1 ){
			//force next clip
			js_log('order:'  + _clip.order + ' != count:' + ( _clip.pp.getClipCount()-1 ) +
				' smil dur: ' + _clip.dur + ' <= curTime: ' + _clip.embed.currentTime + ' go to next clip..');		
				//do a _play next:
				_clip.pp.next();				
		}
	}						
	//@@todo could maybe generalize transIn with trasOut into one "flow" with a few scattered if statements	
	//update/setup all transitions (will render current transition state)	
	var in_range=false;
	//pretty similar actions per transition types so group into a loop:
	var tran_types = {'transIn':true,'transOut':true};
	for(var tid in tran_types ){				
		eval('var tObj =  _clip.'+tid);		
		if(!tObj)
			continue;			
		//js_log('f:doSmilActions: ' + _clip.id + ' tid:'+tObj.id + ' tclip_id:'+ tObj.pClip.id);					
		//make sue we are in range: 
		if( tid=='transIn' )
			in_range = (_clip.embed.currentTime <= tObj.dur)?true:false;			
		
		if( tid=='transOut' )
			in_range = (_clip.embed.currentTime >= (_clip.dur - tObj.dur))?true:false;
		
		if( in_range ){
			if( this.userSlide || single_frame ){				
				if( tid=='transIn' )
					mvTransLib.doUpdate(tObj, (_clip.embed.currentTime / tObj.dur) );
					
				if( tid=='transOut' )
					mvTransLib.doUpdate(tObj, (_clip.embed.currentTime-(_clip.dur - tObj.dur)) /tObj.dur);
					
			}else{
				if( tObj.animation_state==0 ){
					js_log('init/run_transition ');
					tObj.run_transition();	
				}
			}
		}else{
			//close up transition if done & still onDispaly
			if( tObj.overlay_selector_id ){
				js_log('close up transition :'+tObj.overlay_selector_id);
				mvTransLib.doCloseTransition( tObj );
			}
		}
	}																					
}

/*
 * mvTransLib library of transitions
 * a single object called to initiate transition effects can easily be extended in separate js file
 * /mvTransLib is a all static object no instances of mvTransLib/
 * (that way a limited feature set "sequence" need not include a _lot_ of js unless necessary )
 * 
 * Smil Transition Effects see:  
 * http://www.w3.org/TR/SMIL3/smil-transitions.html#TransitionEffects-TransitionAttribute
 */    		
var mvTransLib = {
	/*
	 * function doTransition lookups up the transition in the  mvTransLib obj
	 * 		and init the transition if its available 
	 * @param tObj transition attribute object
	 * @param offSetTime default value 0 if we need to start rendering from a given time 
	 */
	doInitTransition:function(tObj){
		js_log('mvTransLib:f:doInitTransition');		
		if(!tObj.type){
			js_log('transition is missing type attribute');
			return false;
		}
		
		if(!tObj.subtype){
			js_log('transition is missing subtype attribute');
			return false;
		}
		
		if(!this['type'][tObj.type]){
			js_log('mvTransLib does not support type: '+tObj.type);
			return false;
		}
		
		if(!this['type'][tObj.type][tObj.subtype]){
			js_log('mvTransLib does not support subType: '+tObj.subtype);
			return false;
		}				
				
		//setup overlay_selector_id			
		if(tObj.subtype=='crossfade'){
			if(tObj.transAttrType=='transIn')				
				var other_pClip = tObj.pClip.pp.getClip(-1);
			if(tObj.transAttrType=='transOut')
				var other_pClip = tObj.pClip.pp.getClip(1);
				
			if(typeof(other_pClip)=='undefined' ||  other_pClip.id == tObj.pClip.pp.cur_clip.id)
				js_log('Error: crossfade without media asset');
			//if not sliding start playback: 
			if(!tObj.pClip.pp.userSlide)
				other_pClip.embed.play();						
			tObj.overlay_selector_id = 'clipDesc_'+other_pClip.id;			
		}else{
			tObj.overlay_selector_id =this.getOverlaySelector(tObj);																
		}				
					
		//all good call function with  tObj param
		js_log('should call: '+tObj.type + ' ' + tObj.subtype );
		this['type'][tObj.type][tObj.subtype].init(tObj);					
	},
	doCloseTransition:function(tObj){
		if(tObj.subtype=='crossfade'){
			//close up crossfade
			js_log("close up crossfade");	
		}else{
			$j('#'+tObj.overlay_selector_id).remove();
		}
		//null selector: 
		tObj.overlay_selector_id=null;
	},
	getOverlaySelector:function(tObj){	
		var overlay_selector_id= tObj.transAttrType + tObj.pClip.id; 	
		js_log('f:getOverlaySelector: '+overlay_selector_id + ' append to: ' +'#videoPlayer_'+tObj.pClip.embed.id );
		//make sure overlay_selector_id not already here:	
		if( $j('#'+overlay_selector_id).length == 0  ){ 																										
			$j('#videoPlayer_'+tObj.pClip.embed.id).prepend(''+
				'<div id="'+overlay_selector_id+'" ' +
					'style="position:absolute;top:0px;left:0px;' +
					'height:'+parseInt(tObj.pClip.pp.height)+'px;'+
					'width:'+parseInt(tObj.pClip.pp.width)+'px;' +					
					'z-index:2">' +
				'</div>');
		}				
		return overlay_selector_id;	
	},
	doUpdate:function(tObj, percent){
		//init the transition if nessesary:
		if(!tObj.overlay_selector_id)
			this.doInitTransition(tObj);
		
		//@@todo we should ensure visability outside of doUpate loop			
		if(!$j('#'+tObj.overlay_selector_id).is(':visible'))
			$j('#'+tObj.overlay_selector_id).show();
			
		//do update:
		/*js_log('doing update for: '+ tObj.pClip.id + 
			' type:' + tObj.transAttrType +
			' t_type:'+ tObj.type +
			' subypte:'+ tObj.subtype  + 
			' percent:' + percent);*/					
			
		this['type'][tObj.type][tObj.subtype].u(tObj,percent);
	},
	/*
	 * mvTransLib: functional library mapping:
	 */ 
	type:{
		//types:
		fade:{
			fadeFromColor:{
				'init':function(tObj){										
					//js_log('f:fadeFromColor: '+tObj.overlay_selector_id +' to color: '+ tObj.fadeColor);
					if(!tObj.fadeColor)
						js_log('missing fadeColor');							
					if($j('#'+tObj.overlay_selector_id).length==0){
						js_log("ERROR can't find: "+ tObj.overlay_selector_id);
					}	
					//set the initial state
					$j('#'+tObj.overlay_selector_id).css({
						'background-color':tObj.fadeColor,
						'opacity':"1"
					});
				},			
				'u':function(tObj, percent){
					//js_log(':fadeFromColor:update: '+ percent);
					//fade from color (invert the percent)
					var percent = 1- percent;
					$j('#'+tObj.overlay_selector_id).css({
						"opacity" : percent
					});
				}
			},
			//corssFade
			crossfade:{
				"init":function(tObj){
					js_log('f:crossfade: '+tObj.overlay_selector_id);
					if($j('#'+tObj.overlay_selector_id).length==0)
						js_log("ERROR overlay selector not found: "+tObj.overlay_selector_id);
					
					//set the initial state show the zero opacity animation 
					$j('#'+tObj.overlay_selector_id).css({'opacity':0}).show();									
				},
				'u':function(tObj, percent){
					$j('#'+tObj.overlay_selector_id).css({
						"opacity" : percent
					});
				}
			}			
		}							
	}
}
//very limited smile feature set more details soon:  
//region="video_region" transIn="fromGreen" begin="2s"
//http://www.w3.org/TR/2007/WD-SMIL3-20070713/smil-extended-media-object.html#edef-ref
var smilPlaylist ={
	transitions:{},
	doParse:function(){
		var _this = this;
		js_log('f:doParse smilPlaylist');
		//@@todo get/parse meta that we are intersted in: 
		var meta_tags = this.data.getElementsByTagName('meta');
		var metaNames = new Array('title','interface_url', 'linkback', 'mTitle', 'mTalk'); 
		$j.each(meta_tags, function(i,meta_elm){
			js_log( "on META tag: "+ $j(meta_elm).attr('name') );
			for(var i in metaNames){
				var _name = metaNames[i];
				if( $j(meta_elm).attr('name') && $j(meta_elm).attr('content') ){
					if( $j(meta_elm).attr('name')== _name ){
						_this[ _name ] = $j(meta_elm).attr('content');
						js_log('set :' + _name + ' to ' +  _this[ _name ]);	
					}
				}
			}
		});	
		//add transition objects: 
		var transition_tags = this.data.getElementsByTagName('transition');	
		$j.each(transition_tags, function( i, trans_elm ){		
			if( $j(trans_elm).attr("id") ){
				_this.transitions[ $j(trans_elm).attr("id")]= new transitionObj(trans_elm);
			}else{
				js_log('skipping transition: (missing id) ' + trans_elm );
			}
		});
		js_log('loaded transitions:' + _this.transitions.length);			
		//add seq (latter we will have support more than one seq tag) / more than one "track" 
		var seq_tags = this.data.getElementsByTagName('seq');
		$j.each(seq_tags, function(i,seq_elm){
			var inx = 0;
			//get all the clips for the given seq:
			$j.each(seq_elm.childNodes, function(i, mediaElement){ 
				//~complex~ @@todo to handlde a lot like "switch" "region" etc
				//js_log('process: ' + mediaElemnt.tagName); 
				if(typeof mediaElement.tagName!='undefined'){
					if( _this.tryAddMedia( mediaElement, inx ) ){
						inx++;
					}
				}
			});
		});
		js_log("done proc seq tags");		
		return true;
	},
	tryAddMedia:function(mediaElement, order, track_id){	
		js_log('SMIL:tryAddMedia:' + mediaElement);
		//set up basic mvSMILClip send it the mediaElemnt & mvClip init: 
		var clipObj = new mvSMILClip(mediaElement, 
					{
						"id":'p_' + this.id + '_c_' + order,
						"pp":this, //set the parent playlist object pointer
						"order": order									
					}								
				);
		//set optional params track					 					
		if( typeof track_id != 'undefined')
			clipObj["track_id"]	= track_id;
			 
		//debugger;
		if (clipObj ){
			//set up embed:						
			clipObj.setUpEmbedObj();						
			//add clip to track: 
			this.addCliptoTrack( clipObj , order);
			return true;
		}	
		//@@todo we could throw error details here once we integrate try catches everywhere :P
		return false;
	} 
}
/* extension to mvClip to support smil properties */
var mvSMILClip=function(smil_clip_element, mvClipInit){
	return this.init(smil_clip_element, mvClipInit);
}
//all the overwritten and new methods for SMIL extension of mv_embed
mvSMILClip.prototype = {	
	//http://www.w3.org/TR/2007/WD-SMIL3-20070713/smil-extended-media-object.html#smilMediaNS-BasicMedia
	//and added resource description elements
	supported_attributes : new Array(
			'id',
			'src',
			'type',
			'region',
			'transIn',
			'transOut',
			'fill',
			'dur',
			
			'uri',			
			'poster'
	),
	init:function(smil_clip_element, mvClipInit){
		_this = this;				
		
		//make new mvCLip with ClipInit vals  
		var myMvClip = new mvClip( mvClipInit );
		
		//inherit mvClip		
		for(var method in myMvClip){			
			if(typeof this[method] != 'undefined' ){				
				this['parent_'+method]=myMvClip[method];				
			}else{		
				this[method] = myMvClip[method];
			}		
		}				 
		
		//get supported media attr init non-set		
		$j.each(this.supported_attributes, function(i, attr){			
			if( $j(smil_clip_element).attr(attr)){
				_this[attr]=$j(smil_clip_element).attr(attr);
			}
		})				
		this['tagName'] = smil_clip_element.tagName;	
		
		if( smil_clip_element.firstChild ){
			this['wholeText'] = smil_clip_element.firstChild.nodeValue;
			js_log("SET wholeText for: "+this['tagName'] + ' '+ this['wholeText']);
		}
		//debugger;
		//mv_embed specific property: 
		if( $j(smil_clip_element).attr('poster') )
			this['img'] = $j(smil_clip_element).attr('poster');
		
		//lookup and assign copies of transitions 
		// (since transition needs to hold some per-instance state info)		
		if(this.transIn && this.pp.transitions[ this.transIn ]){			
			this.transIn = this.pp.transitions[ this.transIn ].clone();
			this.transIn.pClip = _this;
			this.transIn.transAttrType='transIn'; 		
		}		
		
		if(this.transOut && this.pp.transitions[ this.transOut ]){		
			this.transOut = this.pp.transitions[ this.transOut ].clone();
			this.transOut.pClip = _this;
			this.transOut.transAttrType = 'transOut';		
		}		
		//parse duration / begin times: 
		if(this.dur)
			this.dur = smilParseTime(this.dur);							
		
		//conform type to video/ogg:
		if(this['type']=='application/ogg'){
			this['type']='video/ogg'; //conform to 'video/ogg' type
		}	
			
		return this;		
	},
	//returns the values of supported_attributes: 
	getAttributeObj:function(){
		var elmObj = {};
		for(var i in this.supported_attributes){
			var attr = this.supported_attributes[i];
			if(this[attr])
				elmObj[ attr ] = this[attr]; 
		}		
		return elmObj;
	},
	/*
	 * getDuration
	 * @returns duration in int
	 */
	getDuration:function(){
		//check for smil dur: 
		if( this.dur )
			return this.dur;			
		return this.embed.getDuration();					
	}	
}
/* object to manage embedding html with smil timings 
 *  grabs settings from parent clip 
 */
var transitionObj = function(element) {		
	this.init(element);
};
transitionObj.prototype = {	
	supported_attributes : new Array(
		'id',
		'type',
		'subtype',
		'fadeColor',
		'dur'
	),
	transAttrType:null, //transIn or transOut
	overlay_selector_id:null,
	pClip:null,
	timerId:null,
	animation_state:0, //can be 0=unset, 1=running, 2=done 
	interValCount:0, //inter-intervalCount for animating between time updates
	dur:2, //default duration of 2	
	init:function(element){
		//load supported attributes: 	
		var _this = this;
		$j.each(this.supported_attributes, function(i, attr){
			if(element.getAttribute(attr))
				_this[attr]= element.getAttribute(attr);
		});				
		//@@todo process duration (for now just strip s) per: 
		//http://www.w3.org/TR/SMIL3/smil-timing.html#Timing-ClockValueSyntax
		if(_this.dur)
			_this.dur = smilParseTime(_this.dur);
	},
	//returns the values of supported_attributes: 
	getAttributeObj:function(){
		var elmObj = {};
		for(var i in this.supported_attributes){
			var attr = this.supported_attributes[i];
			if(this[attr])
				elmObj[ attr ] = this[attr]; 
		}		
		return elmObj;
	},
	/*
	 * the main animation loop called every MV_ANIMATION_CB_RATE or 34ms ~around 30frames per second~
	 */
	run_transition:function(){
		//js_log('f:run_transition:' + this.interValCount);
			 			
		//update the time from the video if native:   
		if(typeof this.pClip.embed.vid !='undefined'){
			this.interValCount=0;
			this.pClip.embed.currentTime = this.pClip.embed.vid.currentTime;
		}
		
		//}else{
			//relay on currentTime update grabs (every 250ms or so) (ie for images)
		//	if(this.prev_curtime!=this.pClip.embed.currentTime){	
		//		this.prev_curtime =	this.pClip.embed.currentTime;
		//		this.interValCount=0;
		//	}
		//}		
		//start_time =asigned by doSmilActions
		//base_cur_time = pClip.embed.currentTime;
		//dur = asigned by attribute		
		if(this.animation_state==0){
			mvTransLib.doInitTransition(this);
			this.animation_state=1;
		}
		//set percentage include difrence of currentTime to prev_curTime 
		// ie updated in-between currentTime updates) 
		
		if(this.transAttrType=='transIn')
			var percentage = ( this.pClip.embed.currentTime + 
									( (this.interValCount*MV_ANIMATION_CB_RATE)/1000 )
							) / this.dur ;
				
		if(this.transAttrType=='transOut')
			var percentage = (this.pClip.embed.currentTime  + 
									( (this.interValCount*MV_ANIMATION_CB_RATE)/1000 )
									- (this.pClip.dur - this.dur)
							) /this.dur ;			
		
		/*js_log('percentage = ct:'+this.pClip.embed.currentTime + ' + ic:'+this.interValCount +' * cb:'+MV_ANIMATION_CB_RATE +
			  ' / ' + this.dur + ' = ' + percentage );
		*/
		
		//js_log('cur percentage of transition: '+percentage);
		//update state based on current time + cur_time_offset (for now just use pClip.embed.currentTime)
		mvTransLib.doUpdate(this, percentage);
		
		if( percentage >= 1 ){
			js_log("transition done update with percentage "+percentage);
			this.animation_state=2;					
			clearInterval(this.timerId);	
			mvTransLib.doCloseTransition(this)
			return true;
		}
						
		this.interValCount++;
		//setInterval in we are still in running state and user is not using the playhead 
		if( this.animation_state==1 ){
			if(!this.timerId){
				this.timerId = setInterval('document.getElementById(\'' + this.pClip.pp.id + '\').'+ 
							'run_transition(\'' + this.pClip.pp.cur_clip.order + '\','+
								'\''+ this.transAttrType + '\')',
						 MV_ANIMATION_CB_RATE);
			}
		}else{
			clearInterval(this.timerId);
		}
		return true;
	},
	clone:function(){
		var cObj = new this.constructor();
		for(var i in this)
			cObj[i]=this[i];				
		return cObj;
	}		
}
/*
 * takes an input 
 * @time_str input time string 
 * returns time in seconds 
 * 
 * @@todo process duration (for now just srip s) per: 
 * http://www.w3.org/TR/SMIL3/smil-timing.html#Timing-ClockValueSyntax
 * (probably have to use a Time object to fully support the smil spec
 */
function smilParseTime(time_str){
	return parseInt(time_str.replace('s', ''));
}
/***************************
 * end SMIL specific code
 ***************************/
 var trackObj = function( initObj ){
 	return this.init( initObj );
 }
 var supported_track_attr =
trackObj.prototype = {
	//eventualy should be something like "seq" per SMIL spec
	//http://www.w3.org/TR/SMIL3/smil-timing.html#edef-seq
	// but we don't really support anywhere near the full concept of seq containers yet either
	supported_attributes: new Array(
 		'title',
		'desc:'		
 	),					
	disp_mode:'timeline_thumb',
	init : function(initObj){
		if(!initObj)
			initObj={};
		//make sure clips is new: 
		this.clips = new Array();
				
		var _this = this;
		$j.each(this.supported_attributes, function(i, attr){
			if(initObj[attr])
				_this[attr] = initObj[attr];
		});			
	},
	//returns the values of supported_attributes: 
	getAttributeObj:function(){
		var elmObj = {};
		for(var i in this.supported_attributes){
			var attr = this.supported_attributes[i];
			if(this[attr])
				elmObj[ attr ] = this[attr]; 
		}		
		return elmObj;
	},
	addClip:function(clipObj, pos){
		js_log('pl_Track: AddClip at:' + pos);  
		if( typeof pos == 'undefined' )
			pos = this.clips.length;				
		//get everything after pos	
		this.clips.splice(pos, 0, clipObj);			
		//keep the clip order values accurate:
		this.reOrderClips();				
	},
	reOrderClips:function(){
		for(var k in this.clips){
			this.clips[k].order=k;
		}
	},
	getClipCount:function(){		
		return this.clips.length;
	},
	inheritEmbedObj: function(){
		$j.each(this.clips, function(i, clip){
			clip.embed.inheritEmbedObj();
		});
	}
};			
	
/* utility functions 
 * (could be combined with other stuff) 
 */

function getAbsolutePos(objectId) {
	// Get an object left position from the upper left viewport corner
	o = document.getElementById(objectId);
	oLeft = o.offsetLeft;            // Get left position from the parent object	
	while(o.offsetParent!=null) {   // Parse the parent hierarchy up to the document element
		oParent = o.offsetParent    // Get parent object reference
		oLeft += oParent.offsetLeft // Add parent left position
		o = oParent
	}	
	o = document.getElementById(objectId);
	oTop = o.offsetTop;
	while(o.offsetParent!=null) { // Parse the parent hierarchy up to the document element
		oParent = o.offsetParent  // Get parent object reference
		oTop += oParent.offsetTop // Add parent top position
		o = oParent
	}
	return {x:oLeft,y:oTop};
}
String.prototype.htmlEntities = function(){
  var chars = new Array ('&','à','á','â','ã','ä','å','æ','ç','è','é',
                         'ê','ë','ì','í','î','ï','ð','ñ','ò','ó','ô',
                         'õ','ö','ø','ù','ú','û','ü','ý','þ','ÿ','À',
                         'Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë',
                         'Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö',
                         'Ø','Ù','Ú','Û','Ü','Ý','Þ','€','\"','ß','<',
                         '>','¢','£','¤','¥','¦','§','¨','©','ª','«',
                         '¬','­','®','¯','°','±','²','³','´','µ','¶',
                         '·','¸','¹','º','»','¼','½','¾');

  var entities = new Array ('amp','agrave','aacute','acirc','atilde','auml','aring',
                            'aelig','ccedil','egrave','eacute','ecirc','euml','igrave',
                            'iacute','icirc','iuml','eth','ntilde','ograve','oacute',
                            'ocirc','otilde','ouml','oslash','ugrave','uacute','ucirc',
                            'uuml','yacute','thorn','yuml','Agrave','Aacute','Acirc',
                            'Atilde','Auml','Aring','AElig','Ccedil','Egrave','Eacute',
                            'Ecirc','Euml','Igrave','Iacute','Icirc','Iuml','ETH','Ntilde',
                            'Ograve','Oacute','Ocirc','Otilde','Ouml','Oslash','Ugrave',
                            'Uacute','Ucirc','Uuml','Yacute','THORN','euro','quot','szlig',
                            'lt','gt','cent','pound','curren','yen','brvbar','sect','uml',
                            'copy','ordf','laquo','not','shy','reg','macr','deg','plusmn',
                            'sup2','sup3','acute','micro','para','middot','cedil','sup1',
                            'ordm','raquo','frac14','frac12','frac34');

  newString = this;
  for (var i = 0; i < chars.length; i++)
  {
    myRegExp = new RegExp();
    myRegExp.compile(chars[i],'g')
    newString = newString.replace (myRegExp, '&' + entities[i] + ';');
  }
  return newString;
}