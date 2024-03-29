/*
 * mv_embed version .6
 * for details see: http://metavid.ucsc.edu/wiki/index.php/Mv_embed
 * and or the README
 *
 * All Metavid Wiki code is Released under the GPL2
 * for more info visit http:/metavid.ucsc.edu/code
 *
 * @url http://metavid.ucsc.edu
 * 
 * portions sampled from the vlc browser interface:
 * http://people.videolan.org/~damienf/plugin-0.8.6.html *
 *
 * parseUri:
 * http://stevenlevithan.com/demo/parseuri/js/
 *
 * config values you can manually set the location of the mv_embed folder here
 * (in cases where media will be in a different place than the javascript)
 *
 */
var mv_embed_path = null;
//whether or not to load java from an iframe.
//note: this is necessary for remote embedding because of java security model)
var mv_java_iframe = true;
//media_server mv_embed_path (the path on media servers to mv_embed for java iframe with leading and trailing slashes)
var mv_media_iframe_path = '/mv_embed/';

var global_ogg_list = new Array();
var _global = this;
var mv_init_done=false;

if(!gMsg){var gMsg={};}
//all default msg in [english] should be overwitten by the CMS languge msg system.
gMsg['loading_txt'] ='loading<blink>...</blink>';
gMsg['select_playback']='Set Playback Prefrence';
gMsg['link_back']='Link Back';
gMsg['error_load_lib']='mv_embed: unable to load required javascript libraries\n'+
			 	'insert script via DOM has failed, try reloading?  ';
//plugin names:
gMsg['ogg-player-vlc-mozilla']='VLC Plugin';
gMsg['ogg-player-videoElement']='Native Ogg Video Support';
gMsg['ogg-player-vlc-activex']='VLC ActiveX';
gMsg['ogg-player-oggPlay']='Annodex OggPlay Plugin';
gMsg['ogg-player-oggPlugin']='Generic Ogg Plugin';
gMsg['ogg-player-quicktime-mozilla']='Quicktime Plugin';
gMsg['ogg-player-quicktime-activex']='Quicktime ActiveX';
gMsg['ogg-player-cortado']='Java Cortado';
gMsg['ogg-player-selected']=' (selected)';
gMsg['download_clip']='Download the Clip';
gMsg['generic_missing_plugin']='You don\'t appear to have a supported in browser playback method<br>' +
		'visit the <a href="http://metavid.ucsc.edu/wiki/index.php/Client_Download">Playback Methods</a> page to download a player<br>';

//grabs from the globalMsg obj 
//@@todo integrate msg serving into CMS
function getMsg( key ) {
	 if ( key in gMsg ) {
	 	return gMsg[key];
	 } else{
	 	return '[' + key + ']';
	 }
}

/*
* the base video control JSON object with default attributes
*    for supported attribute details see README
*/
var video_attributes = {
    "id":null,
    "class":null,
    "style":null,
    "name":null,     
    "innerHTML":null,
    "width":"320",
    "height":"240",
    
    "src":null,      
    "autoplay":false,   
    "start":0,
    "end":null,
    "controls":true,            
    
    //custom attributes for mv_embed: 
    "play_button":true,
    "thumbnail":null, 
    "linkback":null, 
    "embed_link":false,
    "download_link":true
};

//the mvEmbed object drives basic loading of libs:
var mvEmbed = {
  Version: '0.7',  
  loaded:false,
  load_time:0,
  flist:Array(),
  load_callback:false,
  loading:false, 
  //plugin libs var names and paths:
  lib_jquery:{'window.jQuery':'jquery/jquery-1.2.1.js'},
  lib_plugins:{		
	'$j.fn.offsetParent':'jquery/plugins/jquery.dimensions.js',
	'$j.ui.mouseInteraction':'jquery/plugins/ui.mouse.js',
	'$j.ui.slider':'jquery/plugins/ui.slider.js'		
  },
  pc:null, //used to store pointer to parent clip (when in playlist mode) 
  load_libs:function(callback){
  	if(callback)this.load_callback = callback;
 	//two loading stages, first get jQuery
	var _this = this;
  	mvJsLoader.doLoad(this.lib_jquery,function(){
  		//once jQuery is loaded set up no conflict & load plugins: 
 		_global['$j'] = jQuery.noConflict();
		mvJsLoader.doLoad(_this.lib_plugins, function(){			
			mvEmbed.init();
		});	
  	});	    		
  },
  userSetPlayerType:function(player){
  	//callback to the embedType obj to set the cookie/pref: 
  	embedTypes.userSetPlayerType(player);
  	//fade out all pref windows and remove: 
  	$j('.set_ogg_player_pref').fadeOut('slow',function(){
  			$j(this).remove();
  	});  	
  	//@@todo temporarily disable playback or set all to loading...

	//request the new player library: 
	var plugins={};
	plugins[embedTypes.getPlayerLib()+'Embed']='mv_'+embedTypes.getPlayerLib()+'Embed.js';
  	mvJsLoader.doLoad(plugins, function(){
  		js_log("done loading: " + embedTypes.getPlayerLib());
  		//re-rewrite all the video objects on the page: 
	  	for(i in global_ogg_list){
	  		js_log('selector: '+'#'+global_ogg_list[i]);
	  		$j('#'+global_ogg_list[i]).get(0).inheritEmbedObj();
	  	}  	
  	})  	
  },
  addLoadEvent:function(fn){  	
  	this.flist.push(fn);  	
  },  
  init: function(){
  	//call the callback:
  	if(this.load_callback)this.load_callback();
	mv_embed();	
  }
}

/*parseUri class:*/
var parseUri=function(d){var o=parseUri.options,value=o.parser[o.strictMode?"strict":"loose"].exec(d);for(var i=0,uri={};i<14;i++){uri[o.key[i]]=value[i]||""}uri[o.q.name]={};uri[o.key[12]].replace(o.q.parser,function(a,b,c){if(b)uri[o.q.name][b]=c});return uri};parseUri.options={strictMode:false,key:["source","protocol","authority","userInfo","user","password","host","port","relative","path","directory","file","query","anchor"],q:{name:"queryKey",parser:/(?:^|&)([^&=]*)=?([^&]*)/g},parser:{strict:/^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,loose:/^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/}};

//get mv_embed location if it has not been set
if(!mv_embed_path){
	getMvEmbedPath();
}
js_log("mv embed path:"+ mv_embed_path);
//the default thumb nail for missing images:
var mv_default_thumb_url = mv_embed_path + 'images/vid_default_thumb.jpg';
/*
 * embedTypes object handles setting and getting of supported embed types:
 * closely mirrors OggHandler so that its easier to share efforts in this area:
 * http://svn.wikimedia.org/viewvc/mediawiki/trunk/extensions/OggHandler/OggPlayer.js
 */
var embedTypes = {
	 // List of players in order of preference
	 playerType:false,
	 // List of players in order of preference (vlc is pretty good on linux (but should not be installed in OSX) 
	 players: ['videoElement','vlc-mozilla', 'vlc-activex', 'oggPlay', 'oggPlugin', 'quicktime-mozilla', 'quicktime-activex', 'cortado'],
	 init: function(){
		//detect supported types
		this.detect();
		//see if we have a cookie set to a clientSupported type: 
		var cookieVal = this.getCookie( 'ogg_player' ); 
		if ( cookieVal && cookieVal != 'thumbnail' ) {
			if(this.clientSupports[cookieVal]){
				this.playerType = cookieVal;
			}
		}
		if(!this.playerType){
			for ( var i = 0; i < this.players.length; i++ ) {
				if ( this.clientSupports[this.players[i]] ) {
					this.playerType = this.players[i];
					break;
				}
			}
		}
		js_log('selected:' + this.playerType);
		js_log( this.clientSupports);
		
		//add the detected plugin playback type to the plugins :
		if(this.playerType){
			js_log('player type ok: '+this.getPlayerLib());
			if( this.getPlayerLib() ){				
				mvEmbed.lib_plugins[this.getPlayerLib()+'Embed']='mv_'+this.getPlayerLib()+'Embed.js';
			}
			js_log('set lib: '  +mvEmbed.lib_plugins[this.getPlayerLib()+'Embed']);
		}	
	},
	getPlayerType:function(){
		if(!this.playerType)return false;
		return this.playerType;
	},
	//provide the name of the javscript library supporting the given request: (group activeX and plugin Controls) 
	getPlayerLib:function(){
	 	switch(this.playerType){
	 		case 'videoElement':
	 			return 'native';break;
	 		case 'vlc-mozilla': 
	 		case 'vlc-activex':
	 			return 'vlc';break;
	 		case 'quicktime-mozilla':
	 		case 'quicktime-activex':
	 			return 'quicktime';	break;
	 		case 'oggPlay':
	 			return 'oggplay'; break;
	 		case 'cortado':
	 			return 'java';break;
	 		case 'oggPlugin':
	 			return 'generic';
	 		break;
	 		default:
	 			return null;
	 	}
	},
	getPlayerSelectList:function(){		
		 var select_html='<ul style="color:white">';
		 for(i in this.players){
			//don't list unsuported players
			if(!this.clientSupports[this.players[i]]){
				continue;
			}
			//list if its the current put a colored plugin icon than name
			if(this.playerType==this.players[i]){
				select_html+='<li>'+
								'<img width="16" height="16" src="'+mv_embed_path+'images/plugin.png">'+
									getMsg('ogg-player-'+this.players[i])+getMsg('ogg-player-selected')+
							'</li>';
			}else{
				//else gray plugin and the plugin with link to select
				select_html+='<li>'+
								'<a style="color:white" href="#" onClick="mvEmbed.userSetPlayerType(\''+this.players[i]+'\');return false;">'+
									'<img border="0" width="16" height="16" src="'+mv_embed_path+'images/plugin_disabled.png">'+								
									getMsg('ogg-player-'+this.players[i]) + 
								'</a>'+
							'</li>';
			}
		 }
		 select_html+='</ul>';
		 return select_html;
	},
	userSetPlayerType : function ( player) {
		if ( player != 'thumbnail' ) {
			var week = 7*86400*1000;
			this.setCookie( 'ogg_player', player, week, false, false, false, false );
		}
		this.playerType=player;
		js_log('embedTypes: player set to: '+ player);
	},
	clientSupports: { 'thumbnail' : true },
 	detect: function() {
		 // First some browser detection
		 this.msie = ( navigator.appName == "Microsoft Internet Explorer" );
		 this.msie6 = ( navigator.userAgent.indexOf("MSIE 6")===false);
		 this.opera = ( navigator.appName == 'Opera' );
		 this.safari = ( navigator.vendor && navigator.vendor.substr( 0, 5 ) == 'Apple' );
		
		 // In Mozilla, navigator.javaEnabled() only tells us about preferences, we need to
		 // search navigator.mimeTypes to see if it's installed
		 var javaEnabled = navigator.javaEnabled();
		 // In Opera, navigator.javaEnabled() is all there is
		 var invisibleJava = this.opera;
		 // Some browsers filter out duplicate mime types, hiding some plugins
		 var uniqueMimesOnly = this.opera || this.safari;
		 // Opera will switch off javaEnabled in preferences if java can't be found.
		 // And it doesn't register an application/x-java-applet mime type like Mozilla does.
		 if ( invisibleJava && javaEnabled ) {
		 	this.clientSupports['cortado'] = true;
		 }
		 // ActiveX plugins
		 // VLC
		 if ( this.testActiveX( 'VideoLAN.VLCPlugin.2' ) ) {
		 	this.clientSupports['vlc-activex'] = true;
		 }
		 // Java
		 if ( javaEnabled && this.testActiveX( 'JavaWebStart.isInstalled' ) ) {
		 	this.clientSupports['cortado'] = true;
		 }
		 // QuickTime
		 if ( this.testActiveX( 'QuickTimeCheckObject.QuickTimeCheck.1' ) ) {
		 	this.clientSupports['quicktime-activex'] = true;
		 }		
		 // <video> element (should not need to be attached to the dom to test)(
		 var v = document.createElement("video");
		 if(v.play){
		 	this.clientSupports['videoElement'] = true;
		 }
		 /*elt.innerHTML = '<video id="testvideo"></video>\n';
		 var testvideo = document.getElementById('testvideo');
		 if (testvideo && testvideo.play) {
		 this.clientSupports['videoElement'] = true;
		 }*/
		 // Mozilla plugins
				if(navigator.mimeTypes && navigator.mimeTypes.length > 0) {
			for ( var i = 0; i < navigator.mimeTypes.length; i++) {
				var type = navigator.mimeTypes[i].type;
				var semicolonPos = type.indexOf( ';' );
				if ( semicolonPos > -1 ) {
					type = type.substr( 0, semicolonPos );
				}
				//js_log('on type: '+type);				
				var pluginName = navigator.mimeTypes[i].enabledPlugin ? navigator.mimeTypes[i].enabledPlugin.name : '';
				if ( !pluginName ) {
					// In case it is null or undefined
					pluginName = '';
				}
				if ( javaEnabled && type == 'application/x-java-applet' ) {
					this.clientSupports['cortado'] = true;
					continue;
				}
				if(type=='application/liboggplay'){
					this.clientSupports['oggPlay']= true;
					continue;
				}
				
				if ( type == 'application/ogg' ) {
					if ( pluginName.toLowerCase() == 'vlc multimedia plugin' ) {
						this.clientSupports['vlc-mozilla'] = true;
					} else if ( pluginName.indexOf( 'QuickTime' ) > -1 ) {
						this.clientSupports['quicktime-mozilla'] = true;
					} else {
						this.clientSupports['oggPlugin'] = true;
					}
					continue;
				} else if ( uniqueMimesOnly ) {
					if ( type == 'application/x-vlc-player' ) {
						this.clientSupports['vlc-mozilla'] = true;
						continue;
					} else if ( type == 'video/quicktime' ) {
						this.clientSupports['quicktime-mozilla'] = true;
						continue;
					}
				}
			
				if ( type == 'video/quicktime' ) {
					this.clientSupports['quicktime-mozilla'] = true;
					continue;
				}
			}
		}
		//@@The xiph quicktime component does not work well with annodex streams (temporarly disable)
		this.clientSupports['quicktime-mozilla'] = false;
		this.clientSupports['quicktime-activex'] = false;
		//js_log(this.clientSupports);
	 },
	 setCookie : function ( name, value, expiry, path, domain, secure ) {
		 var expiryDate = false;
		 if ( expiry ) {
			 expiryDate = new Date();
			 expiryDate.setTime( expiryDate.getTime() + expiry );
		 }
		 document.cookie = name + "=" + escape(value) +
		 (expiryDate ? ("; expires=" + expiryDate.toGMTString()) : "") +
		 (path ? ("; path=" + path) : "") +
		 (domain ? ("; domain=" + domain) : "") +
		 (secure ? "; secure" : "");
		 },
		 testActiveX : function ( name ) {
		 var hasObj = true;
		 try {
			 // No IE, not a class called "name", it's a variable
			 var obj = new ActiveXObject( '' + name );
		 } catch ( e ) {
			 hasObj = false;
		 }
		 return hasObj;
	 },
	 getCookie : function ( cookieName ) {
		 var m = document.cookie.match( cookieName + '=(.*?)(;|$)' );
		 return m ? unescape( m[1] ) : false;
	 }
}
//setup the embed type (cookie preference or javascript detected embed type)
embedTypes.init();
//load an external JS (similar to jquery .require plugin)
//but checks for object availability rather than load state
var mvJsLoader = {
	 libreq:{},
	 load_time:0,
	 doLoad:function(libs,callback){
		 if(libs){this.libs=libs;}else{libs=this.libs;}
		 this.callback=(callback)?callback:this.callback;
		 var loading=0;
		 for(i in libs){
			 //itor the objPath (to avoid 'has no properties' errors)
			 var objPath = i.split('.');
			 var cur_path ='';
			 var cur_load=0;
			 for(p in objPath){
				 cur_path = (cur_path=='')?cur_path+objPath[p]:cur_path+'.'+objPath[p];
				 //js_log("looking at path: "+ cur_path);
				 //js_log("eval:  " + eval('typeof ('+cur_path+');'));
				 if(eval('typeof '+cur_path)=='undefined'){
					 cur_load = loading=1;
					 break;
				 }
				 //if we have made the full comparison break out: 
				 if(cur_path==i){
				 	break;
				 }
		 	 }
			 if(cur_load){
				 //js_log('missing lib:'+i + ' do load:'+mv_embed_path+libs[i]);
				 if(!this.libreq[i])loadExternalJs(mv_embed_path + libs[i]);
				 this.libreq[i]=1;
			 }
		 }
		 if(loading){
			 if( this.load_time++ > 2000){ //time out after ~50seconds
			 	js_error( getMsg('error_load_lib') );
			 }else{
				setTimeout('mvJsLoader.doLoad()',25);
			 }
		 }else{
		 	this.callback();
		 }
	 }
}
//ENTRY POINT when dom ready:
/* jQuery .ready does not work when jQuery is loaded dynamically
 * for an example of the problem see:1.1.3 working:http://pastie.caboo.se/92588
 * and >= 1.1.4 not working: http://pastie.caboo.se/92595
 * $j(document).ready( function(){ */
function init_mv_embed(force){
	js_log('mv_init');
	if(!force){
		if(mv_init_done)return ;
		mv_init_done=true;
	}
	//check if this page does have video or playlist
	if(document.getElementsByTagName("video").length!=0 ||
	   document.getElementsByTagName("playlist").length!=0){
		js_log('we have vids to proccess');
		//if safari we have already foce loadded the libs
		if(embedTypes.safari){
			js_log('run init for safari');
			mvEmbed.init();
		}else{		
			mvEmbed.load_libs();
		}
	}else{
		js_log('no video or playlist on the page... (done)');
	}	
	//affter mv run any queued functions:		
	//js_log('run queue functions:' + mvEmbed.flist);
	while (mvEmbed.flist.length){
		mvEmbed.flist.shift()();
	}
}

/*
 * this function allows for targeted rewriting (the host element does not have to be <video> tag)
 */
function rewrite_by_id(vid_id){
	var vidElm = document.getElementById(vid_id);
	if(vidElm){
		var videoInterface = new embedVideo(vidElm);
		swapEmbedVideoElement(vidElm, videoInterface);
		return videoInterface;
	}else{
		js_log('VID ELM NOT FOUND: '+vid_id);
	}
}


//SET DOM Ready state:
// for Mozilla browsers
if (document.addEventListener) {
    document.addEventListener("DOMContentLoaded", function(){init_mv_embed()}, false);
}
//for IE (temporarally disabled causing empty document rewrites:
/*if (document.all && !window.opera){ //Crude test for IE
	js_log('doing IE on ready');
//Define a "blank" external JavaScript tag
  document.write('<script type="text/javascript" id="contentloadtag" defer="defer" src="javascript:void(0)"><\/script>')
  var contentloadtag=document.getElementById("contentloadtag")
  contentloadtag.onreadystatechange=function(){
    if (this.readyState=="complete" || this.readyState=='loaded')
      init_mv_embed();
  } 
}*/
//for safari just force load all the libraries since it has no dom injection
if(embedTypes.safari){
	//load the base lib_jquery library: 
	for(i in mvEmbed.lib_jquery){
		var cur_lib_url = mv_embed_path + mvEmbed.lib_jquery[i];
		js_log('load lib:' + cur_lib_url);
		document.write('<script type="text/javascript" src="'+cur_lib_url+'"><\/script>');
	}
	
	//load the rest (@@todo we could merge these)
  	for(i in mvEmbed.lib_plugins){
		var cur_lib_url = mv_embed_path + mvEmbed.lib_plugins[i];
		js_log('load lib:' + cur_lib_url);
		document.write('<script type="text/javascript" src="'+cur_lib_url+'"><\/script>');
	}
	window.onload=function(){
		//once jQuery is loaded set up no conflict: 
		_global['$j'] = jQuery.noConflict();
		init_mv_embed();
	}				
}
//backup "onload" in case on DOM ready does not fire
window.onload = init_mv_embed;
/*
* Coverts all occurrences of <video> tag into video object
* (if a native support is not found) 
*/
function mv_embed(){  	  
	//get mv_embed location if it has not been set
	js_log('mv_embed ' + mvEmbed.Version);
    //send a request to load the given type
    js_log('detected: '+ embedTypes.getPlayerType() );
    video_elements = document.getElementsByTagName("video");
    //js_log('found video '+ video_elements.length);
    if( video_elements.length > 0) {     	
        for(i = 0; i < video_elements.length; i++) {           	         	        
            //grab id:
            vid_id = video_elements[i].getAttribute("id");       
            //if vid_id is empty
            if(!vid_id || vid_id==''){
  				video_elements[i].id= 'v'+ global_ogg_list.length;    	
            }
            //create the video interface:
	    var videoInterface = new embedVideo(video_elements[i]);	
            //swap the video element for our own embed video element           
            js_log('made videoInterface: ' + videoInterface.id)
            if( swapEmbedVideoElement(video_elements[i], videoInterface) ){
             	//decrement i cuz we have swaped out the current video element
                i--;
            }                                                   
        }
        //set onBeforeUnload action to stop all videos
        /*document.body.onBeforeUnload= function(){
        	js_log('called before unload');
        	for(i in global_ogg_list){
        		$j('#'+i).stop();
        	}
        	alert('wtf');
        	return false;
        }*/
    }else{
    	js_log('no <video> elements found');
    }
    //if there are no playlist elements do not load the playlist-js
    playlist_elements = document.getElementsByTagName("playlist");
    if( playlist_elements.length > 0) {   
		do_playlist_functions();
    }
}

var sq_load_time=0;
function mv_do_sequence(initObj){
	//issue a request to get the css file (if not already included): 
	if(!styleSheetPresent(mv_embed_path+'mv_sequence.css'))
		loadExternalCss(mv_embed_path+'mv_sequence.css');
	//make sure we have the required mv_ebed libs (they are not loaded when no video element is on the page)
	mvEmbed.load_libs(function(){
		//load playlist object and drag,drop,resize,hoverintent,libs
		mvJsLoader.doLoad({
				'mvPlayList':'mv_playlist.js',
				'$j.ui.resizable':'jquery/plugins/ui.resizable.js',
				'$j.ui.draggable':'jquery/plugins/ui.draggable.js',
				'$j.ui.droppable':'jquery/plugins/ui.droppable.js'
				//'$j.ui.sortable':'jquery/plugins/ui.sortable.js'
			},function(){
				//load the sequencer and draggable ext				
				mvJsLoader.doLoad({
						'mvSequencer':'mv_sequencer.js',
						'$j.ui.draggable.prototype.plugins.drag':'jquery/plugins/ui.draggable.ext.js',
						'$j.ui.droppable.prototype.plugins.over':'jquery/plugins/ui.droppable.ext.js'
					},function(){	
						//init the sequence object (it will take over from there) 
						mvSeq = new mvSequencer(initObj);
					});
		});
	});
}

var pl_load_time=0;
function do_playlist_functions(){
	mvJsLoader.doLoad({'mvPlayList':'mv_playlist.js'},function(){
		playlist_elements = document.getElementsByTagName("playlist");
		js_log('loded pl js ' +playlist_elements.length );
		for(var i = 0; i < playlist_elements.length; i++) {  
			var pl_id = playlist_elements[i].getAttribute('id');
			if(!pl_id || pl_id==''){
  				playlist_elements[i].id = 'v'+ global_ogg_list.length;    	
            }
			//create new playlist interface:
			var playlistInterface = new mvPlayList( playlist_elements[i] );
			if(swapEmbedVideoElement(playlist_elements[i], playlistInterface) ){	                 	   
				i--;			
			}
		}
	});
}

/*
* createEmbedVideoElement 
* takes a video element as input and swaps it out with 
* an embed video interface based on the video_elements attributes
*/
function swapEmbedVideoElement(video_element, videoInterface){
	js_log('do swap');
	embed_video = document.createElement('div');	
	//inherit the video interface  
	for(method in  videoInterface){
		if(method!='readyState'){ //readyState crashes IE
			if(method=='style'){
					embed_video.setAttribute('style', videoInterface[method]);			
			}else if(method=='class'){
				if(embedTypes.msie)
					embed_video.setAttribute("className", videoInterface['class']);
				else
					embed_video.setAttribute("class", videoInterface['class']);
			}else{		
				//normal inherit: 
				embed_video[method]=videoInterface[method];
			}
		}
	}
	///js_log('did vI style');
  	//now swap out the video element for the embed_video obj:
    var parent_elm = video_element.parentNode;
    parent_elm.removeChild(video_element);
    
    //append the object into the dom: 
    parent_elm.appendChild(embed_video);  
   
    
    //now run the getHTML on the new embedVideo Obj:
    embed_video.getHTML(); 
    js_log('html set:' + document.getElementById(embed_video.id).innerHTML);
    
    //store a reference to the id 
    //(for single instance plugins that need to keep track of other instances on the page)
    global_ogg_list.push(embed_video.id);
        
    js_log('append child: ' + embed_video.id + ' len:'+global_ogg_list.length);
 	return true;
}
/* 
*  The base embedVideo object constructor 
*/
var embedVideo = function(element) {	
	return this.init(element);
};
//base embedVideo object
embedVideo.prototype = {
	slider:null,
	//state attributes (per html5 spec http://www.whatwg.org/specs/web-apps/current-work/#video)
	video_states:{
	    "paused":true,
	    "readyState":0,  //http://www.whatwg.org/specs/web-apps/current-work/#readystate
	    "currentTime":0, //current playback position (should be overwritten by local functions) 
	    "duration":NaN   //media duration (read from file)
	},
	//utility functions for property values: 
	hx : function ( s ) {
		if ( typeof s != 'String' ) {
			s = s.toString();
		}
		return s.replace( /&/g, '&amp;' )
			. replace( /</g, '&lt;' )
			. replace( />/g, '&gt;' );
	},
	hq : function ( s ) {
		return '"' + this.hx( s ) + '"';
	},
	init: function(element){		   
	   //inherit all the default video_attributes 
	    for(var attr in video_attributes){       
	        if(element.getAttribute(attr)){
	            this[attr]=element.getAttribute(attr);
	            //js_log('attr:' + attr + ' val: ' + video_attributes[attr] +" "+'elm_val:' + element.getAttribute(attr) + "\n (set by elm)");  
	        }else{        
	            this[attr]=video_attributes[attr];
	            //js_log('attr:' + attr + ' val: ' + video_attributes[attr] +" "+ 'elm_val:' + element.getAttribute(attr) + "\n (set by attr)");  
	        }
	    }
	    //init the default states: 
	    for(var state in this.video_states){
	    	 this[state]=this.video_states[state];
	    }
	    //if the thumbnail is null replace with default thumb:
	    if(!this['thumbnail']){
			this['thumbnail'] = mv_default_thumb_url;
	    }
	    //if style is set override width and height
	    if(element.style.width)this.width = element.style.width.replace('px','');
	    if(element.style.height)this.height = element.style.height.replace('px','');
	    //set the plugin id
	    this.pid = 'pid_' + this.id;
	         
	    //grab any innerHTML and set it to missing_plugin_html
	    if(element.innerHTML!=''){
	        this.user_missing_plugin_html=element.innerHTML;
	    } 
	    /*
	    * override all relevant exported functions with the {embed_type} Object 
	    * place the base functions in parent.{function name}
	    */
	    js_log("PLAYBACK TYPE: "+embedTypes.getPlayerLib());
	    if(embedTypes.getPlayerType()){    
	       this.inheritEmbedObj();
	    }  
	   //do a local call to getDuration (as the plugin may not be loaded yet) 
	   this.getDuration();
	   //test: 
	   //js_log('HTML FROM IN OBJECT' + this.getHTML());
	   //return this object:	   
	   return this;
	},
	inheritEmbedObj:function(){
		//@@note: tricky cuz direct overwrite is not so ideal.. since the extended object is already tied to the dom
		//clear out any non-base embedObj stuff: 
		if(this.instanceOf){
			eval('tmpObj = '+this.instanceOf);
			for(i in tmpObj){
				if(this['parent_'+i]){
					this[i]=this['parent_'+i];
				}else{
					this[i]=null;
				}
			}
		}
		//set up the new embedObj
		eval('embedObj = ' +embedTypes.getPlayerLib() +'Embed;');
        for(method in embedObj){
        	//parent method preservation for local overwritten methods
        	if(this[method])this['parent_' + method] = this[method];
            this[method]=embedObj[method];
        }
        if(this.inheritEmbedOverride){
        	this.inheritEmbedOverride();
        }
	},
	 /*
	  * function getDuration in milliseconds 
	  * special case derive duration from request url (in float seconds) @@todo should be milliseconds
	  * (for media_url?t=ntp_start/ntp_end url request format
	  */  
	 getDuration : function(){	 	
	 	 //js_log('get duration for:' + this.src);	 		 	 
		 var index_time_val = false;		 		 
	     if(this.src.indexOf('?t=')!=-1)index_time_val='?t=';
	     if(this.src.indexOf('&t=')!=-1)index_time_val='&t=';
	     if(index_time_val){
	     	var end_index = (this.src.indexOf('&', this.src.indexOf(index_time_val))==-1)?
	     					this.src.length:
			    			this.src.indexOf('&', this.src.indexOf(index_time_val));
			this.start_ntp = this.src.substring( 
	   				this.src.indexOf(index_time_val)+index_time_val.length,
		    		this.src.indexOf('/', this.src.indexOf(index_time_val) ));
		    this.end_ntp = this.src.substring(
		    		this.src.indexOf('/', this.src.indexOf(index_time_val))+1, end_index);
		    this.start_offset = ntp2seconds(this.start_ntp);
	   		this.duration = ntp2seconds( this.end_ntp ) - this.start_offset;
		    //put values into ms:
		    this.start_offset =  this.start_offset*1000
		    this.duration = this.duration*1000;		    		    
	     }else{
	     	//else normal media request (can't predict the duration without the plugin reading it)
	     	this.duration=null;
	   	 	this.start_offset=0;
	     }
		 //return duration in ms: 
	     return this.duration;
	},
	/* get the duration in ntp format */
	getDurationNTP:function(){
		return seconds2ntp(this.getDuration()/1000);
	},
	getHTML : function (){
		//js_log('get html: ' + $j('#'+this.id).html() );
	    //returns the innerHTML based on auto play option and global_embed_type
	    //if auto play==true directly embed the plugin
	    if(this.autoplay){ 	   
			this.thumbnail_disp = false;			
			this.innerHTML = this.getEmbedHTML();
	    }else{
	        //if autoplay=false or render out a thumbnail with link to embed html      
	       this.thumbnail_disp = true;
	       this.innerHTML = this.getThumbnailHTML();	    
	    }
	},
	/*
	* get missing plugin html (check for user included code)
	*/ 
	getPluginMissingHTML : function(){	
		//keep the box width hight:
		var out = '<span style="width:'+this.width+'px;height:'+this.height+'px">';
	    if(this.user_missing_plugin_html){
	      out+= this.user_missing_plugin_html;
	    }else{
		  out+= getMsg('generic_missing_plugin') + ' or <a title="'+getMsg('download_clip')+'" href="'+this.src +'">'+getMsg('download_clip')+'</a>';
		}
		return out + '</span>';
	},
	//updates the video src
	updateVideoSrc : function(src){
		this.src = src;
	},
	//updates the thumbnail if the thumbnail is being displayed
	updateThumbnail : function(src, quick_switch){
		js_log('set to thumb:'+ src);
		if(quick_switch){
			$j('#img_thumb_'+this.id).attr('src', src);
		}else{
			if(this.thumbnail_disp){
				$j('#dc_'+this.id).append('<img src="'+src+'" ' +
					'style="display:none;position:absolute;zindex:2;top:0px;left:0px;" ' +
					'width="'+this.width+'" height="'+this.height+'" '+
					'id = "new_img_thumb_'+this.id+'" />');
				$j('#new_img_thumb_'+this.id).fadeIn("slow", function(){
						//once faded in remove org and rename new:
						$j('#img_thumb_'+this.id).remove();
						$j('#new_img_thumb_'+this.id).attr('id', 'img_thumb_'+this.id);
						$j('#img_thumb_'+this.id).css('zIndex','1');
				});			
			}
		}
	},
	selectPlaybackMethod:function(){
		 //put select list on-top
		 //make sure the parent is relatively positioned:
		 $j('#'+this.id).css('position', 'relative');
		 //set height width (check for playlist container) 
	 	 var width = (this.pc)?this.pc.pp.width:this.width;
	 	 var height = (this.pc)?this.pc.pp.height:this.height;
	 	 if(width<320)width=320;
	 	 if(height<240)height=240;
	 	 
  		 var sel_id = (this.pc!=null)?this.pc.pp.id:this.id;
		 //fade in a black bg div ontop of everything
		 var select_code = '<div class="set_ogg_player_pref" id="blackbg_'+sel_id+'" ' +
			 'style="position:absolute;display:none;z-index:2;background:black;top:0px;left:0px;' +
				 'height:'+parseInt(height)+'px;width:'+parseInt(width)+'px;">' +
			 '<span style="position:relative;top:20px;left:20px">' +
				 '<b style="color:white;">'+getMsg('select_playback')+':</b><br>'+
					 embedTypes.getPlayerSelectList()+
			 	'<a href="#" style="color:white" onClick="document.getElementById(\''+this.id+'\').closeSelectPlayback();return false;">close</a>'+
			 '</span>'+
		 '</div>';
		 //js_log('appending to: ' + sel_id +' sc: '+ select_code );
		 $j('#'+sel_id).append(select_code);
		 $j('#blackbg_'+sel_id).fadeIn("slow");
		 return false; //onclick action return false
	 },
	 closeSelectPlayback:function(){
	 	 var sel_id = (this.pc!=null)?this.pc.pp.id:this.id;
		 $j('#blackbg_'+sel_id).fadeOut("slow", function(){
			 $j('#blackbg_'+sel_id).remove();
		 });
 		return false;//onclick action return false
	},
	getThumbnailHTML : function (){
	    var thumb_html = '';
	    var class_atr='';
	    var style_atr='';
	    //if(this.class)class_atr = ' class="'+this.class+'"';
	    //if(this.style)style_atr = ' style="'+this.style+'"';
	    //    else style_atr = 'overflow:hidden;height:'+this.height+'px;width:'+this.width+'px;';   
	
	    //put it all in the div container dc_id
	    thumb_html+= '<div id="dc_'+this.id+'" style="position:relative;'+
	    	' overflow:hidden; top:0px; left:0px; width:'+this.width+'px; height:'+this.height+'px; z-index:0;">'+
	        '<img width="'+this.width+'" height="'+this.height+'" style="position:relative;width:'+this.width+';height:'+this.height+'"' +
	        ' id="img_thumb_'+this.id+'" src="' + this.thumbnail + '">';

		js_log("PLAY BUTTON: " + this.play_button);
	    if(this.play_button==true)
		  	thumb_html+=this.getPlayButton();
	  	
	  	 //add plugin config button (don't add for playlists) 
	  	 if(!this.pc){
			 thumb_html+='<div style="position:absolute;top:2px;left:2px;z-index:99;width:28px;height:28px;">' +
				 '<a title="'+getMsg('select_playback')+'" href="#" onClick="document.getElementById(\''+this.id+'\').selectPlaybackMethod();return false;">'+
				 	getTransparentPng({id:'plug_'+this.id,width:'27',height:'27',src:mv_embed_path + 'images/vid_plugin_edit_sm.png'})+
				 '</a>'+
			 '</div>';
	  	 }
	  	
	    //add link back if requested
	    if(this.linkback){
	    	thumb_html+='<div style="position:absolute;bottom:2px;right:2px;z-index:1">'+
		     '<a title="clip linkback" target="_new" href="'+this.linkback+'">';
		    thumb_html+=getTransparentPng({id:'lb_'+this.id, width:"27", height:"27", border:"0", 
						src:mv_embed_path + 'images/vid_info_sm.png' });
			thumb_html+='</div>';    	
	    }
	    //add direct download link if requested:
	    if(this.download_link){
	    	thumb_html+='<div style="position:absolute;bottom:2px;left:2px;z-index:1">'+
		     '<a title="'+getMsg('download_clip')+'" href="'+this.src+'">';
		    thumb_html+=getTransparentPng({id:'lb_'+this.id, width:"27", height:"27", border:"0", 
						src:mv_embed_path + 'images/vid_download_sm.png' });
			thumb_html+='</div>';   
	    }
	    //add in embed link (if requested) 
	    if(this.embed_link){	
	    	var right_offset = (this.linkback)?32:0;
			thumb_html+='<div style="position:absolute;bottom:2px;right:'+right_offset+'px;z-index:1">'+
		     '<a title="Embed Clip Code" href="javascript:document.getElementById(\''+this.id+'\').hideShowEmbedCode();">';
	
			thumb_html+=getTransparentPng(new Object ({id:'le_'+this.id, width:"27", height:"27", border:"0", 
						src:mv_embed_path + 'images/vid_embed_sm.png' }));
			thumb_html+='</a></div>';
			//make link absolute (if it was not already)
			js_log('looking at thumb:'+ this.thumbnail);
			if(this.thumbnail.substring(0,1)=='/'){
				eURL = parseUri(mv_embed_path);
				embed_thumb_html = eURL.protocol + '://' + eURL.host + this.thumbnail;			
				//js_log('set from mv_embed_path:'+embed_thumb_html);
			}else{
				embed_thumb_html = (this.thumbnail.indexOf('http://')!=-1)?this.thumbnail:mv_embed_path + this.thumbnail;
			}
			var embed_code_html = '&lt;script type=&quot;text/javascript&quot; ' +
						'src=&quot;'+mv_embed_path+'mv_embed.js&quot;&gt;&lt;/script&gt' +
						'&lt;video id=&quot;'+this.id+'&quot; ' + 
						'src=&quot;'+this.src+'&quot; ' + 
						'thumbnail=&quot;'+embed_thumb_html+'&quot;/&gt;';
	
			//add the hidden embed code:
			thumb_html+='<div id="embed_code_'+this.id+'" style="border:solid;border-color:black;overflow:hidden;display:none;position:absolute;bottom:2px;right:'+(right_offset+30)+'px;width:'+(this.width-100)+'px;z-index:1">'+
				'<input onClick="this.select();" type="text" size="40" length="1024" value="'+embed_code_html+'">'
				 '</div>';
	    }	
	    thumb_html+='</div>';		  	
	    return thumb_html;
	},
	getPlayButton:function(id){
		if(!id)id=this.id;
		//setup button size
		var play_btn_height = play_btn_width = 109;
		if(this.width<320){
			var play_btn_width= play_btn_height = Math.round(this.width/3);
		}

	    var top = Math.round(this.height/2)- (play_btn_height/2);
	    var left = Math.round(this.width/2)- (play_btn_width/2);
	    
	    out='';
	    out+='<div style="position:absolute;top:'+top+'px;left:'+left+'px;z-index:1">'+
				     '<a id="big_play_link_'+id+'" title="Play Media" href="javascript:document.getElementById(\''+id+'\').play();">';	
				     
	        //fix for IE<7 and its lack of PNG support:
		out+=getTransparentPng(new Object ({id:'play_'+id, width:play_btn_width, height:play_btn_height, border:"0", 
						src:mv_embed_path + 'images/mv_embed_play.png' }));				
		out+='</a></div>';
		return out;
	},
	//display the code to remotely embed this video:
	//if scriptaculus is available animate its appearance. 
	hideShowEmbedCode : function(){
		if($j('#embed_code_'+this.id).css('display')=='none'){
			$j('#embed_code_'+this.id).fadeIn("slow");
		}else{
			$j('#embed_code_'+this.id).fadeOut("slow", function(){
				$j('#embed_code_'+this.id).css('display', 'none');
			});
		}		
		/* this should work but does not! :( 
		$j('#embed_code_'+this.id).toggle(function(){
			$j(this).fadeIn("slow");	
		},function(){
			$j(this).fadeOut("slow");
		} );
		* 
		*/		
	},			
	/*
	*  base embed controls 
	*	the play button calls 
	*/
	play : function(){	
		js_log("mv_embed play");
		//check if thumbnail is being displayed and embed html
		if(this.thumbnail_disp){
			//js_log('rewrite embed');
			if(!embedTypes.getPlayerType()){
				//this.innerHTML = this.getPluginMissingHTML(); 
				//$j('#'+this.id).html(this.getPluginMissingHTML());
				this.innerHTML = this.getPluginMissingHTML();
			}else{						
				//$j('#'+this.id).html(this.getEmbedHTML());
				this.innerHTML = this.getEmbedHTML();
			}
			this.paused = false;
			this.thumbnail_disp=false;	
		}else{
			//the plugin is already being displayed
		}
	},
	play_or_pause : function(){	
		js_log('base play or pause');
		var id = (this.pc!=null)?this.pc.pp.id:this.id;
		
		var play_or_pause = document.getElementById('mv_play_or_pause_'+id);	
		//check if we are in a playlist: 
		
	    if(play_or_pause){
	    	//check state and set play or pause
	    	if(this.paused){
	    		js_log('do play');
				//(paused) do play
				this.play();
				this.paused=false;
				play_or_pause.innerHTML = getTransparentPng(new Object ({id:'mv_pop_btn_'+id,style:'float:left',width:'27', height:'27', border:"0", 
						src:mv_embed_path+'images/vid_pause_sm.png' }));
			}else{
				js_log('do pause');
				//(playing) do pause
				this.pause();
				this.paused=true;
				play_or_pause.innerHTML = getTransparentPng(new Object ({id:'mv_pop_btn_'+id,style:'float:left',width:'27', height:'27', border:"0", 
						src:mv_embed_path+'images/vid_play_sm.png' }));
			}
	    }
	},
	//called when we play to the end of a stream (load the thumbnail)
	streamEnd : function(){
		//if we are not in playlist mode stop:
		if(!this.pc){
			this.stop();
		}
	},
	/*
	 * base embed pause
	 * 	there is no general way to pause the video 
	 *  must be overwritten by embed object to support this functionality. 
	 */
	pause : function(){
		return null
	},
	
	/*
	 * base embed stop (should be overwritten by the plugin) 
	 */
	stop: function(){
		js_log('base stop');
		//check if thumbnail is being displayed in which case do nothing
		if(this.thumbnail_disp){
			//already in stooped state
			js_log('already in stopped state');
		}else{
			//rewrite the html to thumbnail disp 
			//$j(this).html(this.getThumbnailHTML());						
			this.innerHTML = this.getThumbnailHTML();
			this.thumbnail_disp=true;
		}
	},
	/* returns bool true if playing false if paused or stooped
	 */
	isPlaying : function(){
		if(this.thumbnail_disp){
			//in stoped state
			return false;
		}else{
			return true;
		}
	},
	//loads in the css and js for the extended interface (controls = true) 
	get_interface_lib : function(doLoad){				
		//var doLoad = (doLoad==null)? true:doLoad;
		//js_log('get interface:' + doLoad);
		var loading_interface =false;
				
		//grab the css file: 
		if(!styleSheetPresent(mv_embed_path+'mv_embed.css')){	
			if(doLoad) loadExternalCss(mv_embed_path+'mv_embed.css');
			js_log('css und');
			loading_interface=true;
		}	
		if(loading_interface){
			//call get_interface_lib (without requests) until interface is done loading: 
			setTimeout('document.getElementById(\''+this.id+'\').get_interface_lib(false)', 50);
			//if loading interface is not yet available 
			return false;			
		}else{
			//js_log('loading_interface = false');
			//if it was a load request and it was already loaded return true
			if(doLoad){
				return true;
			}else{
				//non loading request means time has passed so we need to update the innerHTML
				//$j('#'+this.id).html(this.getEmbedHTML());
				this.innerHTML = this.getEmbedHTML();
			}
		}
	},
	playlistSupport:function(){
		//by default not supported (implemented in js) 
		return false;
	}, 
	postEmbedJS:function(){
		return '';
	},
	getPluginEmbed : function(){
		if (window.document[this.pid]){
	        return window.document[this.pid];
		}
		if (embedTypes.msie){
			return document.getElementById(this.pid );	       
		}else{
	    	 if (document.embeds && document.embeds[this.pid])
	        	return  document.embeds[this.pid]; 
		}
	},
	activateSlider : function(slider_id){		
		var id = (this.pc)?this.pc.pp.id:this.id;
		var thisVid = this;
		this.sliderVal=0;
		//js_log('parent id: '+ parent_id + ' id: ' + this.id);
		$j('#slider_'+id).slider({
				handle:'#playhead_'+id,
				slide:function(e, ui) {	
					thisVid.userSlide=true;
					thisVid.sliderVal=( ui.pixel/ ( $j('#slider_'+id).width()-
					 $j('#playhead_'+id).width() ));
					//js_log('user slide: ' +thisVid.sliderVal );					 
				},
				change: function(slider){
					//js_log("change: " + thisVid.sliderVal);
					thisVid.doSeek(thisVid.sliderVal);	
					thisVid.userSlide=false;
				}
		});
		//if(!slider_id)slider_id=this.id;
		//get a pointer to this id (as this in onSlide context is not "this") 
		/*var parent_id = this.id;	*/	
		/*this.slider = new Control.Slider('playhead_'+this.id, 'track_'+this.id,{
			sliderValue:0,
			onSlide:function(v){
				if(! thisVid.userSlide){
					//user slide clip:
					thisVid.userSlide=true;
					js_log('user slide: ' + thisVid.userSlide);
				}										
			},
			onChange:function(v){ 
				if(thisVid.userSlide==true){						
					//seek to a given position:
					js_log('this.userSlide seek to: ' + v);	
					thisVid.doSeek(v);	
					thisVid.userSlide=false;
				}
			}
		});*/			
	},
	setSliderValue: function(perc){
		var id = (this.pc)?this.pc.pp.id:this.id;
		//this.slider.setValue(perc);
		var cur_slider = $j('#playhead_'+id).width();
		var offset_perc = 1-(cur_slider / $j('#slider_'+id).width());
		var val = Math.round( offset_perc* (perc *  $j('#slider_'+id).width() ) );
		$j('#playhead_'+id).css('left',val);		
		//js_log('op:' + offset_perc + ' *('+perc+' * ' + $j('#slider_'+id).width() + ')');
	},
	setStatus:function(value){
		var id = (this.pc)?this.pc.pp.id:this.id;
		//update status: 
		$j('#info_'+id).html(value);		
	},
	wrapEmebedContainer:function(embed_code){
		//check if parent clip is set( ie we are in a playlist so name the embed container by playlistID)
		var id = (this.pc!=null)?this.pc.pp.id:this.id;
		return '<div id="mv_ebct_'+id+'" style="width:'+this.width+'px;height:'+this.height+'px;">' + 
					embed_code + 
				'</div>';
	},
	getEmbedHTML:function(){
    	var controls_html ='';
		if(this.controls){
			//all that is supported when we don't know the js hooks is "stop"
			controls_html = this.getControlsHtml('stop');
		}
        return this.wrapEmebedContainer( this.getEmbedObj() ) + controls_html;
    },    
	getControlsHtml : function(type){
		var id = (this.pc)?this.pc.pp.id:this.id;
		switch(type){
			case 'all':
				return 	this.getControlsHtml('play_head') +					
						this.getControlsHtml('play_or_pause') + 
						this.getControlsHtml('stop') + 
						this.getControlsHtml('fullscreen') + 
						this.getControlsHtml('info_span');
			break;
			case 'play_or_pause':
				return '<a id="mv_play_or_pause_'+id+'" title="play_or_pause" href="javascript:document.getElementById(\''+id+'\').play_or_pause();">'+
					getTransparentPng(new Object ({id:'mv_pop_btn_'+id,style:'float:left',width:'27', height:'27', border:"0", 
						src:mv_embed_path+'images/vid_pause_sm.png' })) + 
					'</a>';
			break;
			case 'play':
				return '<a title="play" href="javascript:document.getElementById(\''+id+'\').play();">'+
					getTransparentPng(new Object ({id:'mv_play_btn',style:'float:left',width:'27', height:'27', border:"0", 
						src:mv_embed_path+'images/vid_play_sm.png' })) + 
					'</a>';
			break;
			case 'stop':
				return	'<a title="stop" href="javascript:document.getElementById(\''+id+'\').stop();">'+
					getTransparentPng(new Object ({id:'mv_stop_btn',style:'float:left',width:'27', height:'27', border:"0", 
						src:mv_embed_path+'images/vid_stop_sm.png' })) + 							
					'</a>';
			break;
			case 'fullscreen':
				return '<a title="fullscreen" href="javascript:document.getElementById(\''+id+'\').fullscreen();">'+
					getTransparentPng(new Object ({id:'mv_fs_btn',style:'float:left',width:'27', height:'27', border:"0", 
						src:mv_embed_path+'images/vid_full_screen_sm.png' })) + 
				'</a>';
			break;
			case 'play_head':
				js_log('set pl: '+id);
				return '<div class="mv_track" id="slider_'+id+'" style="width:'+this.width+'px;'+ 
							'z-index:5;height:4px; background: url('+mv_embed_path+'images/bd-gray.gif) repeat scroll 5px 0px;">'+
								' <div id="playhead_'+id+'" class="mv_playhead" ' +
									'style="z-index:5;background-image: url('+mv_embed_path+'images/slider_handle.gif);"></div>' + 						
						'</div>';
				//use style for bg (to use paths
				//position: absolute;'+
				//					'height: 21px; left: 0px; top: 10px; width: 17px;'+
				/*return '<div id="track_'+id+'" class="mv_track" ' +
						'style="background: url('+mv_embed_path+'images/bd-gray.gif);' +
						'width:'+(this.width)+'px; height:4px;">'+
				'<div id="playhead_'+id+'" style="background:url(\''+mv_embed_path+'images/slider_handle.gif\');"' +
					' class="mv_playhead"></div>'+
				'</div>';*/					
			break;
			case 'info_span':
				return '<span id="info_cnt_'+id+'" style="float:left">' +
						' <span id="info_'+id+'" class="mv_status" style="position:relative;top:'+((this.pc)?-10:0)+'px">--</span>'+
						'</span>';
			break;		
		}		
	}
}
/* returns html for a transparent png (for ie<7)*/
function getTransparentPng(image){
	if(!image.style)image.style='';
	if( embedTypes.msie ){
		return '<span id="'+image.id+'" style="display:inline-block;width:'+image.width+'px;height:'+image.height+'px;' +
    		'filter:progid:DXImageTransform.Microsoft.AlphaImageLoader' +
    		'(src=\''+image.src+'\', sizingMethod=\'scale\');"></span>';	
	}else{		
		return '<img id="'+image.id+'" style="'+image.style+'"  width="'+image.width+'" height="'+image.height+'" border="0" src="'+
			image.src + '">';
	}
}
//returns the original name to the faded img (	//take off the new_)
/*function thumbnail_restore_id(obj){
	if(obj.element){
		var default_id=obj.element.id.substr(4);
		var this_id = obj.element.id.substr(14);
		//remove original 
		img_container = document.getElementById('dc_'+this_id);
		if(img_container){
			org_img = document.getElementById(default_id);
			img_container.removeChild(org_img);
			//set the new obj id to the default:
			obj.element.id=default_id;
		}
		//console.log('restore ' + obj.element.id);
	}
}*/

/*
* EMBED OBJECTS:
* (dynamically included)
*/


/*
* utility functions: 
*/
function seconds2ntp(sec){
	sec = parseInt(sec);
	hours = Math.floor(sec/ 3600);
	minutes = Math.floor((sec/60) % 60);
	seconds = sec % 60;
	//if ( hours < 10 ) hours = "0" + hours;
	if ( minutes < 10 ) minutes = "0" + minutes;
	if ( seconds < 10 ) seconds = "0" + seconds;
	return hours+":"+minutes+":"+seconds;
}
/* takes hh:mm:ss input returns number of seconds */
function ntp2seconds(ntp){
	if(!ntp){
		js_log('ntp2seconds:not valid ntp:'+ntp);
		return null;
	}
	times = ntp.split(':');
	if(times.length!=3)
		return null;
	//return seconds float (ie take seconds float value if present): 
	return parseInt(times[0]*3600)+parseInt(times[1]*60)+parseFloat(times[2]);
}
//addLoadEvent for adding functions to be run when the page DOM is done loading
function mv_addLoadEvent(func) {
	mvEmbed.addLoadEvent(func);
}
//load external via dom injection
function loadExternalJs(url){  
   	js_log('load js: '+ url);
	var e = document.createElement("script");
	e.setAttribute('src', url);
	e.setAttribute('type',"text/javascript");
	//e.setAttribute('defer', true);
	document.getElementsByTagName("head")[0].appendChild(e);     
}

function styleSheetPresent(url){
    style_elements = document.getElementsByTagName('link');  
    if( style_elements.length > 0) {
        for(i = 0; i < style_elements.length; i++) {   
			if(style_elements[i].href==url)
				return true;
		}
    }
    return false;
}
function loadExternalCss(url){
   //js_log('load css: ' + url);
   var e = document.createElement("link");
   e.href = url;
   e.type = "text/css";
   e.rel = 'stylesheet';
   document.getElementsByTagName("head")[0].appendChild(e);
}
/*
 * sets the global mv_embed path based on the scripts location
 */
function getMvEmbedPath(){
	js_elements = document.getElementsByTagName("script");
	for(i=0;i<js_elements.length; i++){
		var mstr = js_elements[i].src.indexOf('mv_embed.js');
		if( mstr !=-1){
			mv_embed_path = js_elements[i].src.substr(0,mstr);
		}	
	}	
	//js_log('found mv_embed:'+ mv_embed_path +' '+ mv_embed_path.indexOf('://'));
	//absolute the url (if relative) (if we don't have mv_embed path)
	if(mv_embed_path.indexOf('://')==-1){
		//js_log('url: ' + document.URL);
		var pURL = parseUri(document.URL);		
		if(mv_embed_path.charAt(0)=='/'){
			mv_embed_path = pURL.protocol + '://' + pURL.authority + mv_embed_path;
		}else{
			//relative:
			if(mv_embed_path==''){
				mv_embed_path = pURL.protocol + '://' + pURL.authority + pURL.directory + mv_embed_path; 
			}
		}
	}else{
		js_log('already absolute');
	}
}

/*
* utility functions:
*/
//if(typeof js_log == 'undefined'){
	function js_log(string){
	  if( window.console ){
	        console.log(string); 
	   }else{   	 
	     /*
	      * IE and non-firebug debug:
	      */	     
	     /*var log_elm = document.getElementById('mv_js_log');
	     if(!log_elm){
	     	document.write('<div style="position:absolute;z-index:50;top:0px;left:0px;right:0px;height:150px;"><textarea id="mv_js_log" cols="80" rows="6"></textarea></div>');
	     	var log_elm = document.getElementById('mv_js_log');
	     }
	     if(log_elm){
	     	log_elm.value+=string+"\n";
	     }*/
	   }
	}
//}
//report errors as alerts: 
function js_error(string){
	alert(string);
}
