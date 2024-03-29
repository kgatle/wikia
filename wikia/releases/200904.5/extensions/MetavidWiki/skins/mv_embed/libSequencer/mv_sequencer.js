/*
 * mv_sequencer.js Created on Oct 17, 2007
 *
 * All Metavid Wiki code is Released under the GPL2
 * for more info visit http://metavid.org/wiki/Code
 * 
 * @author Michael Dale
 * @email dale@ucsc.edu
 * @url http://metavid.org
 *
 * 
 * mv_sequencer.js 
 * 	is a basic embeddable sequencer. 
 *  extends the playlist with drag/drop/sortable/add/remove functionality
 *  editing of annotative content (mostly for wiki)
 *  enables more dynamic layouts
 *  exports back out to json or inline format
 */
 
gMsg['menu_clipedit'] = 'Edit Selected Resource';
	gMsg['sc_fileopts']		='Clip Detail';
	gMsg['sc_inoutpoints']	='Set In-Out points';
	gMsg['sc_panzoom']		='Pan zoom Controls';
	gMsg['sc_overlays']		='Overlays';
	gMsg['sc_audio']		='Audio Control';

gMsg['menu_cliplib'] = 'Add Resource';
gMsg['menu_transition'] = 'Transitions Effects';
gMsg['menu_resource_overview'] = 'Resource Overview';
gMsg['menu_options'] = 'Options';

gMsg['loading_timeline'] = 'Loading TimeLine <blink>...</blink>';
gMsg['loading_user_rights'] = 'Loading user rights <blink>...</blink>';

gMsg['no_edit_permissions'] = 'You don\'t have permissions to save changes to this sequence'; 


gMsg['edit_clip'] = 'Edit Clip';
gMsg['edit_save'] = 'Save Changes';
gMsg['edit_cancel'] = 'Cancel Edit';
gMsg['edit_cancel_confirm'] = 'Are you sure you want to cancel your edit, changes will be lost';
		
gMsg['zoom_in'] = 'Zoom In';
gMsg['zoom_out'] = 'Zoom Out';
gMsg['cut_clip'] = 'Cut Clips';
gMsg['expand_track'] = 'Expand Track';
gMsg['colapse_track'] = 'Collapse Track';
gMsg['play_clip'] = 'Play From Playline Position';
gMsg['pixle2sec'] = 'pixles to seconds';
gMsg['rmclip'] = 'Remove Clip';
gMsg['clip_in'] = 'clip in';
gMsg['clip_out'] = 'clip out';

//menu items display helper: 
gMsg['mv_welcome_to_sequencer'] = '<h3>Welcome to the sequencer demo</h3>'+
'very <b>limited</b> functionality right now. Click on a Clip to edit that resource';

gMsg['mv_editor_options'] = 'Editor options';
gMsg['mv_editor_mode'] = 'Editor mode';
gMsg['mv_simple_editor_desc'] = 'simple editor (iMovie style)';
gMsg['mv_advanced_editor_desc'] = 'advanced editor (Final Cut style)';
gMsg['mv_other_options'] = 'Other Options';	
gMsg['mv_contextmenu_opt'] = 'Enable Context Menus';

 //used to set default values and validate the passed init object
var sequencerDefaultValues = {
	
	instance_name:'mvSeq', //for now only one instance by name mvSeq is allowed	
	sequence_container_id:'null',//text value (so that its a valid property) 
	video_container_id:'mv_video_container',
	
	video_width : 400,
	video_height: 300,	
	
	sequence_tools_id:'mv_sequence_tools',
	timeline_id:'mv_timeline',
	plObj_id:'seq_plobj',
	plObj:'null',	
	
	timeline_scale:.06, //in pixel to second ratio ie 100pixles for every ~30seconds
	timeline_duration:500, //default timeline length in seconds
	playline_time:0,
	track_thumb_height:60,
	track_text_height:20,	
		
	//default timeline mode: "story" (i-movie like) or "time" (finalCut like) 
	timeline_mode:'storyboard', 
	
	track_clipThumb_height:80, // how large are the i-movie type clips
	
	base_adj_duration:.5, //default time to subtract or add when adjusting clips. 	
	
	//default clipboard is empty:
	clipboard:new Array(),
	//stores the clipboard edit token (if user has rights to edit their User page) 
	clipboardEditToken:null,
	//stores the sequence edit token (if user has rights to edit the current sequence)	
	sequenceEditToken:null, 
	
	//Msg are all the language specific values ... 
	// (@@todo overwrite by msg values preloaded in the page)	
	//tack/clips can be pushed via json or inline playlist format
	inline_playlist:'null', //text value so its a valid property 
	inline_playlist_id:'null',
	mv_pl_src:'null',
	//the edit stack:
	edit_stack:new Array(),
	
	//trackObj used to payload playlist Track Object (when inline not present) 
	tracks:{}
}
var mvSequencer = function(initObj) {		
	return this.init(initObj);
};
//set up the mvSequencer object
mvSequencer.prototype = {
	//the menu_items Object contains: default html, js setup/loader functions
	menu_items : {
		'clipedit':{
			'd':1,
			'submenu':{
				'fileopts':{},
				'inoutpoints':{},
				'panzoom':{},				
				'overlays':{},
				'audio':{}		
			},
			'html': getMsg('mv_welcome_to_sequencer')			
		},
		'cliplib':{
			'd':0,	
			'html': getMsg('loading_txt'),			
			'js':function( this_seq ){
				
				//load the search interface with sequence tool targets 		
				/*mvJsLoader.doLoad({'remoteSearchDriver':'libRemoteMediaSearch/mv_remote_media_search.js'}, function(){					
					this_seq.mySearch = new remoteSearchDriver({
						'profile':'sequence',
						'p_seq':this_seq,
						'target_id':'cliplib_ic',										
						'instance_name': this.instance_name + '.mySearch'		
					 });
				});*/
			}
		},
		'transition':{
			'd':0,
			'html' : '<h3>' + getMsg('menu_transition') + '</h3>',
			'js':function(this_seq){
				this_seq.renderTransitionsSet('transition_ic');
			}
		},		
		'options':{
			'd':0,	
			'html' : '<h3>' + getMsg('menu_options') + '</h3>' +
				getMsg('mv_editor_mode') + '<br> ' +
				'<blockquote><input type="radio" value="simple_editor" name="opt_editor">' + 
						getMsg('mv_simple_editor_desc') + ' </blockquote>' +
				'<blockquote><input type="radio" value="advanced_editor" name="opt_editor">' +
						getMsg('mv_advanced_editor_desc') + ' </blockquote>'+
				getMsg('mv_other_options') + '<br>' + 
				'<blockquote><input type="checkbox" value="contextmenu_opt" name="contextmenu_opt">' + 
						getMsg('mv_contextmenu_opt') + ' </blockquote>',		
			'js':function(this_seq){
				$j('#options_ic input[value=\'simple_editor\']').attr({
					'checked':(this_seq.timeline_mode=='storyboard')?true:false					
				}).click(function(){
					this_seq.doSimpleTl();
				});
				$j('#options_ic input[value=\'advanced_editor\']').attr({
					'checked':( this_seq.timeline_mode=='time' )?true:false					
				}).click(function(){
					this_seq.doAdvancedTl();
				});
				//set up the options for context menus
			}
		}
	},
	
	//set up initial key states: 
	key_shift_down:false, 
	key_ctrl_down:false,
	
	init:function( initObj ){	
		//set up pointer to this_seq for current scope:		 
		var this_seq = this;
		//set the default values:
		for(var i in sequencerDefaultValues){
			this[ i ] = sequencerDefaultValues[i];
		}
		for(var i in initObj){
			//js_log('on '+ i + ' :' + initObj[i]);
			if(sequencerDefaultValues[i]){ //make sure its a valid property
				this[i] = initObj[i];
			}
		}
		if(this.sequence_container_id==null){
			js_log('Error: no sequence_container_id');
			return false;
		}
			
		//check for sequence_container
		if(this.sequence_container_id=='null'){
			js_log("Error: missing sequence_container_id");
			return false;
		}
		
		//$j('#'+this.sequence_container_id).css('position', 'relative');
		this['base_width']  = $j('#'+this.sequence_container_id).width();
		this['base_height'] = $j('#'+this.sequence_container_id).height();
				
		
		//add the container divs (with basic layout ~universal~ 
		$j('#'+this.sequence_container_id).html(''+
			'<div id="'+this.video_container_id+'" style="position:absolute;right:0px;top:0px;' +
				'width:'+this.video_width+'px;height:'+this.video_height+'px;border:solid thin blue;background:#FFF;font-color:black;"/>'+
			'<div id="'+this.sequence_tools_id+'" style="position:absolute;' +
				'left:0px;right:'+(this.video_width+10)+'px;top:0px;height:'+this.video_height+'px;border:solid thin black;"/>'+
			'<div id="'+this.timeline_id+'" style="position:absolute;' + 
				'left:0px;right:0px;top:'+(this.video_height+10)+'px;bottom:25px;overflow:auto;">'+
					getMsg('loading_timeline')+ '</div>'+
			'<div id="' + this.sequence_container_id + '_status" style="position:absolute;left:0px;width:300px;"></div>'+
			'<div id="' + this.sequence_container_id + '_save_cancel" style="position:absolute;'+
				'right:0px;bottom:0px;height:25px;overflow:hidden;">'+					
					getMsg('loading_user_rights') +
			'</div>'
		);
		
		js_log('set: '+this.sequence_container_id + ' html to:'+ "\n"+
			$j('#'+this.sequence_container_id).html()
		);		
		//first check if we got a cloned PL object:
		//(when the editor is invoked with the plalylist already on the page) 
		//@@NOT WORKING... (need a better "clone" function) 
		/*if( this.plObj != 'null' ){
			js_log('found plObj clone');			
			//extend with mvSeqPlayList object:			
			this.plObj = new mvSeqPlayList(this.plObj);
			js_log('mvSeqPlayList added: ' + this.plObj.org_control_height );
			$j('#'+this.video_container_id).get(0).attachNode( this.plObj );
			this.plObj.getHTML();
			this.checkReadyPlObj();
			return ;
		}*/
				
		//else check for source based sequence editor (a clean page load of the editor) 
		if( this.mv_pl_src != 'null' ) {
			js_log( ' pl src:: ' + this.mv_pl_src );			
			var src_attr=' src="' + this.mv_pl_src+'" ';		
		}else{
			js_log( ' null playlist src .. (start empty) '); 
			var src_attr='';
		}			
		$j('#'+this.video_container_id).html('<playlist ' + src_attr +
			' style="width:' + this.video_width + 'px;height:' + this.video_height + 'px;" '+
			' sequencer="true" id="' + this.plObj_id + '" />');		
		rewrite_by_id( this.plObj_id );	
		setTimeout(this.instance_name +'.checkReadyPlObj()', 25);		
	},
	updateSeqSaveButtons:function(){		
		var cancel_button = '<a style="border:' +
				'solid gray;font-size:1.2em;" onClick="window.confirm(\''+getMsg('edit_cancel_confirm')+'\')" '+ 
				'href="javascript:'+this.instance_name+'.closeModEditor()">'+
					getMsg('edit_cancel') + '</a> ';
		if( this.sequenceEditToken ){
			$j('#'+this.sequence_container_id+'_save_cancel').html( cancel_button + 
				'<a style="border:solid gray;font-size:1.2em;" href="#" onClick="'+this.instance_name+'.getSeqOutputJSON()">'+
					'Preview Json Output'+
				'</a>' +
				'<a style="border:solid gray;font-size:1.2em;" href="#" onClick="'+this.instance_name+'.getSeqOutputHLRDXML()">'+
					'Preview XML Output (will be save shortly) ' + 
				'</a>'); 
		}else{
			$j('#'+this.sequence_container_id+'_save_cancel').html( cancel_button + getMsg('no_edit_permissions') );
		}
	},
	//display a menu item (hide the rest) 
	disp:function( item ){
		js_log('menu_item disp: ' + item);
				
		for(var i in this.menu_items){
			if(i==item){
				$j('#'+i+'_ic').fadeIn("fast");						
			}else{
				$j('#'+i+'_ic').filter(':visible').fadeOut("fast");
			}		
		}
	},
	//setup the menu items: 	
	setupMenuItems:function(){	
		js_log('loadInitMenuItems');
		if( !this.plObj.interface_url ){
			js_log( 'Error:missing interface_url, can not load item' );
			return false;
		}			
		var this_seq = this;
		//do all the menu_items setup: 	@@we could defer this to once the menu item is requested
		for( var i in this.menu_items ){	
			if(	this.menu_items[i].js )	
				this.menu_items[i].js( this );
		}										
	},
	//renders out the transitions effects set			
	renderTransitionsSet:function(target_id){
		js_log('f:renderTransitionsSet:' + target_id);
		var o = '';
		if(typeof mvTransLib == 'undefined'){
			js_log('Error: missing mvTransLib');
			return false;
		}
		
		for(var i in mvTransLib['type']){	
			js_log('on tran type: ' + i);			
			var base_trans_name = i;
			var tLibSet = mvTransLib['type'][ i ];
			for(var j in tLibSet){			
				trans_name=base_trans_name+'_'+j;
				js_log('tname: ' + trans_name);
				o+='<img style="float:left;padding:10px;" '+
					'src="'+mv_embed_path +'/skins/'+mv_skin_name+'/transition_images/'+ trans_name + '.png">';		
			}
		}
		js_log('should set: ' + target_id + ' to: ' + o);
		$j('#'+target_id).append(o);
	},
	renderTimeLine:function(){
		//empty out the top level html: 
		$j('#'+this.timeline_id).html('');
		//add html general for timeline		
		if( this.timeline_mode == 'time'){
			$j('#'+this.timeline_id).html(''+
				'<div id="'+this.timeline_id+'_left_cnt" class="mv_tl_left_cnt">'+
					'<div id="'+this.timeline_id+'_head_control" style="position:absolute;top:0px;left:0px;right:0px;height:30px;">' +
						'<a title="'+getMsg('play_clip')+'" href="javascript:'+this.instance_name+'.play_jt()">'+
							'<img style="width:16px;height:16px;border:0" src="' + mv_embed_path + 'images/control_play_blue.png">'+												
						'</a>'+
						'<a title="'+getMsg('zoom_in')+'" href="javascript:'+this.instance_name+'.zoom_in()">'+
							'<img style="width:16px;height:16px;border:0" src="' + mv_embed_path + 'images/zoom_in.png">'+															
						'</a>'+
						'<a title="'+getMsg('zoom_out')+'" href="javascript:'+this.instance_name+'.zoom_out()">'+
							'<img style="width:16px;height:16px;border:0" src="' + mv_embed_path + 'images/zoom_out.png">'+					
						'</a>'+
						'<a title="'+getMsg('cut_clip')+'" href="javascript:'+this.instance_name+'.cut_mode()">'+
							'<img style="width:16px;height:16px;border:0" src="' + mv_embed_path + 'images/cut.png">'+		
						'</a>'+					
					'</div>' +			
				'</div>' + 
				'<div id="'+this.timeline_id+'_tracks" class="mv_seq_tracks">' +
					'<div id="'+this.timeline_id+'_head_jump" class="mv_head_jump" style="position:absolute;top:0px;left:0px;height:20px;"></div>'+
					'<div id="'+this.timeline_id+'_playline" class="mv_playline"></div>'+
				'</div>'
			);				
			//add playlist hook to update timeline
			this.plObj.update_tl_hook = this.instance_name+'.update_tl_hook';		
			var this_sq = this;
			var top_pos=25;		
			//add tracks:
			for(var i in this.plObj.tracks){
				var track = this.plObj.tracks[i];
				//js_log("on track: "+ i + ' t:'+ $j('#'+this.timeline_id+'_left_cnt').html() );
				//set up track based on disp type
				switch(track.disp_mode){
					case 'timeline_thumb':
						var track_height=60;
						var exc_img = 'opened';
						var exc_action='close';
						var exc_msg = getMsg('colapse_track');
					break;
					case 'text':
						var track_height=20;
						var exc_img = 'closed';
						var exc_action='open';
						var exc_msg = getMsg('expand_track');
					break;
				}
				//add track name:
				$j('#'+this.timeline_id+'_left_cnt').append(
					'<div id="track_cnt_'+i+'" style="top:'+top_pos+'px;height:'+track_height+'px;" class="track_name">'+
						'<a id="mv_exc_'+i+'" title="'+exc_msg+'" href="javascript:'+this_sq.instance_name+'.exc_track('+i+',\''+exc_action+'\')">'+
							'<img id="'+this_sq.timeline_id+'_close_expand" style="width:16px;height:16px;border:0" '+ 
								' src="'+mv_embed_path + 'images/'+exc_img+'.png">'+
						'</a>'+
					track.title+'</div>'
				);
				//also render the clips in the trackset container: (thumb or text view)
				$j('#'+this.timeline_id+'_tracks').append(
					'<div id="container_track_'+i+'" style="top:'+top_pos+'px;height:'+(track_height+2)+'px;left:0px;right:0px;" class="container_track" />'
				);		
				top_pos+=track_height+20;		
			}		
		}
		if( this.timeline_mode=='storyboard'){
			var top_pos=this.plObj.org_control_height;
			//debugger;
			for(var i in this.plObj.tracks){
				var track_height=this.track_clipThumb_height;
				var timeline_id = this.timeline_id
				//add in play box and container tracks
				$j('#'+timeline_id).append(''+
					'<div id="interface_container_track_' + i + '" ' +
					'	style="position:absolute;top:25px;height:'+(track_height+30)+'px;left:10px;right:0px;"' +
					'>'+
						'<div id="container_track_'+i+'" style="position:relative;top:0px;' +
							'height:'+(track_height+30)+'px;left:0px;right:0px;" class="container_track">' +											
						'</div>'+
						'<div id="' + timeline_id + '_playline" class="mv_story_playline">' +
							'<div class="mv_playline_top"/>'+
						'</div>'+
					'</div>'
				);
				top_pos+=track_height+20;
			}
		}
	},
	//once playlist is ready continue 
	checkReadyPlObj:function(){		
		this.plObj = $j('#'+ this.plObj_id ).get(0);
		if( this.plObj )
			if( ! this.plObj.loading )
				this.plReadyInit();
						
		//else keep checking for the playlist to be ready 
		if( this.plObj.loading ){ 
			if(this.plReadyTimeout==200){
				js_error('error playlist never ready');
			}else{
				this.plReadyTimeout++;
				setTimeout(this.instance_name +'.checkReadyPlObj()', 25);
			}
		}		
	},
	plReadyInit:function(){
		var this_seq = this;
		//debugger;
		js_log('plReadyInit');		
		js_log( this.plObj );
		//give the playlist a pointer to its parent seq: 
		this.plObj['seqObj'] = this;
							
		//update playlist (since if its empty right now) 
		if(this.plObj.getClipCount()==0){
			$j('#'+this.plObj_id).html('empty playlist');
		}	
		
		//propagate the edit tokens 
		//if on an edit page just grab from the form:		
		this.sequenceEditToken = $j('input[@wpEditToken]').val();
		if(typeof this.sequenceEditToken == 'undefined'){			
			var reqObj = {'action':'query','prop':'info','intoken':'edit','titles': this_seq.plObj.mTitle};
			var api_url = this.plObj.interface_url.replace(/index\.php/, 'api.php'); 
			do_api_req( reqObj, api_url,function(data){
				for(var i in data.query.pages){ 
					if(data.query.pages[i]['edittoken'])
						this_seq.sequenceEditToken = data.query.pages[i]['edittoken'];
				}
				this_seq.updateSeqSaveButtons();
			});
			reqObj['titles']=this_seq.plObj.mTalk;
			do_api_req(reqObj, api_url, function( data ){
				for(var j in data.query.pages){
					if(data.query.pages[j]['edittoken'])
						this_seq.clipboardEditToken = data.query.pages[j]['edittoken'];
				}
			});
			//also grab permisions for sending clipboard commands to the server
			
			//(calling the sequencer inline) try and get edit token via api call:			
			//(somewhat fragile way to get at the api... should move to config 
			/*var token_url = this.plObj.interface_url.replace(/index\.php/, 'api.php');
			token_url += '?action=query&format=xml&prop=info&intoken=edit&titles=';			
			$j.ajax({
				type: "GET",
				url: token_url + this_seq.plObj.mTitle,				
				success:function(data){							
					var pageElm = data.getElementsByTagName('page')[0];
					if( $j(pageElm).attr('edittoken') ){
						this_seq.sequenceEditToken = $j(pageElm).attr('edittoken');
					}
					
				}
			});*/			
			//also grab permisions for sending clipboard commands to the server
			/*$j.ajax({
				type:"GET",
				url: token_url + this_seq.plObj.mTalk,
				success:function(data){
					var pageElm = data.getElementsByTagName('page')[0];
					if( $j(pageElm).attr('edittoken') ){
						this_seq.clipboardEditToken = $j(pageElm).attr('edittoken');
					}								
				} 
			});*/			
		}
		
		
		//render the menu: 
		var menu_html = '<ul id="seq_menu">';
		var item_containers ='';
		
		//@@todo ~maybe~ load menu via ajax request 
		//(avoid so much hmtl in js? or keep in js to keep high protabillity of sequencer? ) 
	
		$j.each(this.menu_items, function(inx, menu_item){
			var disp_style = (menu_item.d)?'inline':'none';
			var sel_class = (menu_item.d)?'class="mv_selected_item"':''; 
			menu_html+='<li '+sel_class+' id="mv_menu_item_'+inx+'">' + getMsg('menu_' + inx ) +'</li>';						
			item_containers += '<div class="seq_control_container" id="' + inx + 
				'_ic" style="display:' + disp_style +';">'
					//add in subMenus if set
					//check for submenu and add to item container		
					var sub_menu_html='';			
					if( typeof menu_item.submenu != 'undefined'){						
						sub_menu_html+= '<ul id="mv_submenu_' + inx +'" class="mv_submenu">'; 
						$j.each(menu_item.submenu, function(subInx, sub_menu_item){
							var disp_style = (menu_item.d)?'block':'none';
							var sub_sel_class = (sub_menu_item==1)?'class="mv_sub_selected"':'';							 
							sub_menu_html+= '<li ' + sub_sel_class + ' id="mv_sub_menu_item_' + subInx + '">' + 
								getMsg('sc_' + subInx ) + '</li>'; 	
							item_containers+= '<div class="submenu_container" id="sc_' + subInx+'" '+
								' style="display:' + disp_style +';"></div>';
						});
						sub_menu_html+= '</ul>';						
					}
				item_containers += sub_menu_html;				
				item_containers += (menu_item.html) ? menu_item.html : '<h3>' + getMsg('menu_'+inx) + '</h3>';
				item_containers +='</div>';
		});
		menu_html+='</ul>';		
			
		$j('#'+this.sequence_tools_id).html( menu_html + item_containers );
		//add binding for menu
		$j('#seq_menu li').click(function(){
			$j('#seq_menu li').removeClass('mv_selected_item');
			$j(this).addClass('mv_selected_item');
			this_seq.disp( $j(this).attr('id').replace('mv_menu_item_','') );
		});
		
		//load init content into containers 
		this.setupMenuItems();	
		
		//render the timeline					
		this.renderTimeLine();			
		this.do_refresh_timeline();
		
		var this_seq = this;
		
		//set up key bidnings
		$j().keydown(function(e){
			js_log('pushed down on:' + e.which); 
			if( e.which == 16 )
				this_seq.key_shift_down = true;
						
			if( e.which == 17)
				this_seq.key_ctrl_down = true;
				
			if( e.which == 67 && this_seq.key_ctrl_down)
				this_seq.copySelectedClips();
				
			if( e.which == 88 && this_seq.key_ctrl_down)
				this_seq.cutSelectedClips();
			
			if( e.which == 86 && this_seq.key_ctrl_down)
				this_seq.pasteClipBoardClips();
				
		});
		$j().keyup(function(e){
			js_log('key up on ' + e.which);
			//user let go of "shift" turn off multi-select
			if( e.which == 16 )
				this_seq.key_shift_down = false;
				
			if( e.which == 17)
				this_seq.key_ctrl_down = false;							
			
			//backspace or delete key:   
			if( e.which == 8 || e.which == 46 ){					
				this_seq.removeSelectedClips();	
			}		
		});
	},
	update_tl_hook:function(jh_time_ms){			
		//put into seconds scale: 
		var jh_time_sec_float = jh_time_ms/1000;
		//render playline at given time
		//js_log('tl scale: '+this.timeline_scale);
		$j('#'+this.timeline_id+'_playline').css('left', Math.round(jh_time_sec_float/this.timeline_scale)+'px' );
		//js_log('at time:'+ jh_time_sec + ' px:'+ Math.round(jh_time_sec_float/this.timeline_scale));
	},
	/*returns a xml or json representation of the current sequence */
	getSeqOutputJSON:function(){
		js_log('json output');
	},
	getSeqOutputHLRDXML:function(){
		var o='<sequence_hlrd>' +"\n";
		o+="\t<head>";		
		//get transitions 
		for(var i in this.plObj.transitions){
			var tObj = this.plObj.transitions[i].getAttributeObj();
			o+="\t<transition ";
			for(var j in tObj){
				o+=' '+j+'="' + tObj[j] + '"\n\t\t';
			}
			o+='/>'+"\n"; //transitions don't have children
		}
		o+="\t</head>\n";	
			
		//get clips 
		o+="\t<body>\n";
		//output each track: 
		for(var i in this.plObj.tracks){
			var curTrack = this.plObj.tracks[i];			
			o+="\t<seq";
				var tAttr = curTrack.getAttributeObj();
				for(var j in  tAttr){
					o+=' '+j+'="' + tAttr[j] + '"\n\t\t\t';
				}
			o+=">\n";			
			for( var k in curTrack.clips ){
				var curClip = curTrack.clips[k];
				o+="\t\t<ref ";
					var cAttr = curClip.getAttributeObj();
					for(var j in  cAttr){
						var val =  (j=='transIn' || j=='transOut') ? cAttr[j].id : cAttr[j];													
						o+=' '+j+'="' + val + '"\n\t\t\t';
					}
				o+="/>\n" //close the clip
			}
			o+="\n</seq>n";
		}
		o+="\t</body>\n";		
		//close the tag
		o+='</sequence_hlrd>';	
		
		alert('f:getSeqOutputHLRDXML'+ o);
		
		return false;	
	},	
	//@@todo integrate into clip view ...
	editClip:function(track_inx, clip_inx){
		$j('#modalbox').hide();
		if($j('#modal_window').length==0){
			$j('body').append('<div id="modal_window" class="modal_editor" />');	
		}
		//empty out the modal_window and show it
		$j('#modal_window').empty().show();
		//set to the current clip in "clip mode"
		var clip = this.plObj.tracks[track_inx].clips[ clip_inx ];
		//@@todo do per clip type edit modes: 
		$j('#modal_window').append('<div style="position:absolute;top:10px;left:25%;width:'+this.plObj.width+'px;">'+
										'<h3>' + clip.getTitle() + '</h3>'+
										'<video id="chop_clip_' + track_inx + '_' + clip_inx + '" ' +
											'style="width:'+this.plObj.width+'px;height:'+this.plObj.height+'px;" '+
											'poster="'+clip.embed.media_element.getThumbnailURL()+'" '	+									
											'src="' + clip.src + '"></video>'+
									'<div style="padding-top:10px;">'+
										'<span style="position:absolute;left:0px;">'+
											'start time:<input id="chop_start" type="text" size="10" value="0:0:0">'+
										'</span>'+
										'<span style="position:absolute;right:0px;">'+
											'end time:<input id="chop_end" type="text" size="10" '+											 
												'value="' + seconds2ntp(clip.getDuration()) + '" >' +											
										'</span>'+
									'</div>'+																
								   '</div>'
								   //start time end time field display								
								);
		$j('#modal_window').append('<div style="position:absolute;bottom:10px;left:50%;">'+
									'<a style="border:solid gray;font-size:1.2em;" onClick="window.confirm(\''+getMsg('edit_cancel_confirm')+'\')" '+ 
									'href="javascript:'+this.instance_name+'.closeModWindow()">'+
										getMsg('edit_cancel') + '</a> '+
									'<a style="border:solid gray;font-size:1.2em;" href="javascript:'+this.instance_name+'.saveClipEdit()">'+
										getMsg('edit_save')+
									'</a>'+								
								'</div>'
						);
		rewrite_by_id('chop_clip_' + track_inx + '_' + clip_inx ); 
		//@@todo add in-out setters
		
		//@@todo add start / end hooks
		
	},
	//save new clip segment
	saveClipEdit:function(){
		//saves the clip updates
	},
	closeModEditor:function(){
		$j('#modalbox,#mv_overlay').remove();
	},
	closeModWindow:function(){
		$j('#modal_window').hide();
		$j('#modalbox').show();
	},
	pasteClipBoardClips:function(){
		js_log('f:pasteClipBoardClips');
		//@@todo query the server for updated clipboard		
		//paste before the "current clip" 
		this.addClips(this.clipboard, this.plObj.cur_clip.order );		
	},
	copySelectedClips:function(){
		var this_seq = this;
		//set all the selected clips
		this.clipboard = new Array();
		$j('.mv_selected_clip').each(function(){
			//add each clip to the clip board:						
			var cur_clip = this_seq.getClipFromSeqID( $j(this).parent().attr('id') );
			this_seq.clipboard.push( cur_clip.getAttributeObj() );			 						
		});
		//upload clipboard to the server (if possible) 
		if( parseUri(  document.URL ).host != parseUri( this_seq.plObj.interface_url ).host ){
			js_log('error: presently we can\'t copy clips across domains'); 
		}else{								
			var req_url = this_seq.plObj.interface_url + '?action=ajax&rs=mv_seqtool_clipboard&rsargs[]=copy';
			$j.ajax({
				type: "POST",
				url:req_url,
				data: $j.param( { 
					"clipboard_data": $j.toJSON( this_seq.clipboard ),
					"clipboardEditToken": this_seq.clipboardEditToken 
				}),
				success:function(data){		
					//callback( data );
					js_log('did clipboard push ' + $j.toJSON( this_seq.clipboard ) );
				}
			});
		}	
	},
	cutSelectedClips:function(){
		this.copySelectedClips();		
		this.removeSelectedClips();
	},	
	removeSelectedClips:function(){
		var remove_clip_ary=new Array();
		//remove selected clips from display
		$j('.container_track .mv_selected_clip').each(function(){					
			//grab the track index from the id (assumes track_#_clip_# 					
			remove_clip_ary.push ( $j(this).parent().attr('id').replace('track_','').replace('clip_','').split('_') );																				
		});		
		this.removeClips(remove_clip_ary);
	},
	//add a single or set of clips
	//to a given position and track_inx 
	addClips:function( clipSet, before_clip_pos, track_inx){
		this_seq = this;		
		js_log("seq: add clip: at: "+ before_clip_pos + ' in track: ' + track_inx);			
		var cur_pos = before_clip_pos;
		js_log('paste clip before_clip_pos: ' + before_clip_pos);
		var smilXML = 		
		$j.each(clipSet, function(inx, clipInitDom){
			var mediaElement = document.createElement('ref');
			for(var i in clipInitDom){
				if(i!='id')
					$j(mediaElement).attr(i, clipInitDom[i]);
			}						
			if( this_seq.plObj.tryAddMedia(	mediaElement, cur_pos, track_inx ) )	
				cur_pos++;
		}); 		
		//debugger; 
		this.do_refresh_timeline();
	},
	removeClips:function( remove_clip_ary ){					
		var this_seq = this;
		var jselect = coma ='';
		js_log('clip count before removal : ' + this_seq.plObj.default_track.clips.length + ' should remove ' + remove_clip_ary.length );		
		var afected_tracks = new Array();
		//add order to track_clip before we start removing:		
		$j.each( remove_clip_ary, function(inx, track_clip){		
			remove_clip_ary[inx]['order'] = this_seq.plObj.tracks[ track_clip[0] ].clips[ track_clip[1] ].order;
		});		
		$j.each( remove_clip_ary, function(inx, track_clip){
			var track_inx = track_clip[0];
			var clip_inx = track_clip[1];	
			var clip_rm_order = track_clip['order'];										 			
			js_log('remove t:' + track_inx + ' c:'+ clip_inx + ' id:' +' #track_'+track_inx+'_clip_'+clip_inx + ' order:' + clip_rm_order);
			//remove the clips from the base tracks
			for(var i in this_seq.plObj.tracks[ track_inx ].clips){
				cur_clip = this_seq.plObj.tracks[ track_inx ].clips[i]
				if(cur_clip.order == clip_rm_order){
					this_seq.plObj.tracks[ track_clip[0] ].clips.splice( i, 1);
				}
			}
			//add track to affected track list: 
			afected_tracks[ track_inx ]=true;
			jselect += coma + '#track_' +track_inx + '_clip_' + clip_inx;
			coma=',';
		});
		//update/ reorder:
		$j.each(afected_tracks, function(track_inx, affected){
			this_seq.plObj.tracks[track_inx].reOrderClips();				
		});
		
		js_log('clip count after removal : ' + this_seq.plObj.default_track.clips.length);
		//animate the removal (@@todo should be able to call the resulting fadeOut only once without a flag) 
		var done_with_refresh=false;
		$j(jselect).fadeOut("slow", function(){			
			if( !done_with_refresh )						
				this_seq.do_refresh_timeline();
			done_with_refresh=true;
		}).empty(); //empty to remove any persistent bindings  						
	},
	doEdit:function( editObj ){
		//add the current editObj to the edit stack (should allow for "undo")
		this.edit_stack.push( editObj );
		//make the adjustments
		this.makeAdjustment( editObj );		
	},
	/*
	* takes adjust ment object with options: 
	* track_inx, clip_inx, start, end delta
	*/
	makeAdjustment:function(e){	
		switch(e.type){
			case 'resize_start':				
				this.plObj.tracks[e.track_inx].clips[e.clip_inx].doAdjust('start', e.delta);
			break;
			case 'resize_end':
				 this.plObj.tracks[e.track_inx].clips[e.clip_inx].doAdjust('end', e.delta);
			break;
		}
		js_log('re render: '+e.track_inx);
		//refresh the playlist after adjustment
		this.do_refresh_timeline();
	},
	//@@todo set up key bindings for undo
	undoEdit:function(){
		var editObj = this.edit_stack.pop();
		//invert the delta
		
	},
	exc_track:function(inx,req){	
		this_seq = this;			
		if(req=='close'){
			$j('#mv_exc_'+inx).attr('href', 'javascript:'+this.instance_name+'.exc_track('+inx+',\'open\')');
			$j('#mv_exc_'+inx + ' > img').attr('src',mv_embed_path + 'images/closed.png');
			$j('#track_cnt_'+inx+',#container_track_'+inx).animate({height:this.track_text_height}, "slow",'',
				function(){
					this_seq.plObj.tracks[inx].disp_mode='text';
					this_seq.render_tracks( inx );
				});
		}else if(req=='open'){
			$j('#mv_exc_'+inx).attr('href', 'javascript:'+this.instance_name+'.exc_track('+inx+',\'close\')');
			$j('#mv_exc_'+inx + ' > img').attr('src',mv_embed_path + 'images/opened.png');
			$j('#track_cnt_'+inx+',#container_track_'+inx).animate({height:this.track_thumb_height}, "slow",'',
				function(){
					this_seq.plObj.tracks[inx].disp_mode='timeline_thumb';
					this_seq.render_tracks(inx);
				});
			
		}
	},
	//adds tracks 
	add_track:function(inx, track){
	
	},
	//toggle cut mode (change icon to cut)
	cut_mode:function(){
		js_log('do cut mode');
		//add cut layer ontop of clips
	},
	doAdvancedTl:function(){
		this.timeline_mode='time';
		this.renderTimeLine();
		this.do_refresh_timeline();				
		return false;
	},
	doSimpleTl:function(){		
		this.timeline_mode='storyboard';
		this.renderTimeLine();
		this.do_refresh_timeline();	
		return false;
	},
	//renders updates the timeline based on the current scale
	render_tracks:function( track_inx ){		
		js_log("f::render track: "+track_inx);
		var this_seq = this;
		//inject the tracks into the timeline (if not already there)
		for(var track_id in this.plObj.tracks){	
			if( track_inx==track_id || typeof track_inx=='undefined' ){
				//empty out the track container: 
				//$j('#container_track_'+track_id).empty();
				var track_html=droppable_html='';		
				//set up per track vars:
				var track = this.plObj.tracks[track_id];
				var cur_clip_time=0;
			
				//set up some constants for timeline_mode == storyboard: 	
				if(this.timeline_mode == 'storyboard'){			
					var frame_width = Math.round(this.track_clipThumb_height*1.3333333);
					var container_width = frame_width+60;
				}
				
				//for each clip: 
				for(var j in track.clips){
					clip = track.clips[j];					
					//var img = clip.getClipImg('icon');
					if(this.timeline_mode == 'storyboard'){												
						clip.left_px = j*container_width;
						clip.width_px = container_width;
						var base_id = 'track_'+track_id+'_clip_'+j;
						track_html+='<span id="'+base_id+'" '+
										'class="mv_storyboard_container mv_clip_drag" '+  
										'style="'+										
										'left:'+clip.left_px+'px;'+									
										'height:' + (this.track_clipThumb_height+30) + 'px;' +																				
										'width:'+(container_width)+'px;" >';																
						track_html+=clip.embed.renderTimelineThumbnail({
										'width':frame_width,
										'thumb_class':'mv_clip_thumb',
										'height':this.track_clipThumb_height,
										'time':0
									});			
						//render out edit button
						track_html+='<div onClick="'+this.instance_name+'.editClip('+track_id+','+j+')" class="clip_edit_button clip_edit_base"/>';
													
						//render out transition edit box 
						track_html+='<div style="" id="tb_' + base_id + '" class="clip_trans_box"/>';
						
						//render out adjustment text
						track_html+='<div id="' + base_id + '_adj' + '" class="mv_adj_text" style="top:'+ (this.track_clipThumb_height+10 )+'px;">'+
										'<span class="mv_adjust_click" onClick="'+this.instance_name+'.adjClipDur(' + track_id + ',' + j + ',\'-\')" /> - </span>'+
										  ( (clip.getDuration() > 60 )? seconds2ntp(clip.getDuration()): clip.getDuration() )  +
										'<span class="mv_adjust_click" onClick="'+this.instance_name+'.adjClipDur(' + track_id + ',' + j + ',\'+\')" /> + </span>'+ 
									'</div>';																	
						track_html+='</span>';						
													
					}														
					//do per display type rendering: 
					if(this.timeline_mode == 'time'){		
						clip.left_px = Math.round( cur_clip_time/this.timeline_scale);															
						clip.width_px = Math.round( Math.round( clip.getDuration() )/this.timeline_scale);
						js_log('at time:' + cur_clip_time + ' left: ' +clip.left_px + ' clip dur: ' +  Math.round( clip.getDuration() ) + ' clip width:' + clip.width_px);
																
						//for every clip_width pixle output image 
						if(track.disp_mode=='timeline_thumb'){
							track_html+='<span id="track_'+track_id+'_clip_'+j+'" '+
											'class="mv_tl_clip mv_clip_drag" '+ 
											'style="'+
												'left:' + clip.left_px + 'px;'+
												'width:'+ clip.width_px + 'px;'+
												'height:'+ clip.height_px + 'px" >';	
							track_html+= this.render_clip_frames( clip );																				
						}else if(track.disp_mode=='text'){
							//'+left_px+
							track_html+='<span id="track_'+track_id+'_clip_'+j+'" style="left:'+clip.left_px+'px;'+
								'width:'+clip.width_px+'px;background:'+clip.getColor()+
									'" class="mv_time_clip_text mv_clip_drag">'+clip.title;	
						}																																										
						//add in per clip controls
						track_html+='<div title="'+getMsg('clip_in')+' '+clip.embed.start_ntp+'" class="ui-resizable-w ui-resizable-handle" style="width: 16px; height: 16px; left: 0px; top: 2px;background:url(\''+mv_embed_path+'images/application_side_contract.png\');" ></div>'+"\n";
						track_html+='<div title="'+getMsg('clip_out')+' '+clip.embed.end_ntp+'" class="ui-resizable-e ui-resizable-handle" style="width: 16px; height: 16px; right: 0px; top: 2px;background:url(\''+mv_embed_path+'images/application_side_expand.png\');" ></div>'+"\n";
						track_html+='<div title="'+getMsg('rmclip')+'" onClick="'+this.instance_name + '.removeClips(new Array([' + track_id + ',' + j + ']))" style="position:absolute;cursor:pointer;width: 16px; height: 16px; left: 0px; bottom:2px;background:url(\''+mv_embed_path+'images/delete.png\');"></div>'+"\n";
						track_html+='<span style="display:none;" class="mv_clip_stats"></span>';	
																													
						track_html+='</span>';	
						//droppable_html+='<div id="dropBefore_'+i+'_c_'+j+'" class="mv_droppable" style="height:'+this.track_thumb_height+'px;left:'+clip.left_px+'px;width:'+Math.round(clip.width_px/2)+'px"></div>';
						//droppable_html+='<div id="dropAfter_'+i+'_c_'+j+'" class="mv_droppable" style="height:'+this.track_thumb_height+'px;left:'+(clip.left_px+Math.round(clip.width_px/2))+'px;width:'+(clip.width_px/2)+'px"></div>';
						cur_clip_time+=Math.round( clip.getDuration() ); //increment cur_clip_time	
					}				
					
				}	
				
				//js_log("new htmL for track i: "+track_id + ' html:'+track_html);
				$j('#container_track_'+track_id).html( track_html );								
				
				
				//apply edit button mouse over effect:
				$j('.clip_edit_button').hover(function(){
					$j(this).removeClass("clip_edit_base").addClass("clip_edit_over");
				},function(){
					$j(this).removeClass("clip_edit_over").addClass("clip_edit_base");
				});
				
				
				
				//apply onClick edit controls: 
				$j('.mv_clip_thumb').click(function(){								
					var cur_clip_click = this;
					//if not in multi select mode remove all existing selections 
					//(except for the current click which is handled down below)
					js_log(' ks: ' + this_seq.key_shift_down + '  ctrl_down:' +this_seq.key_ctrl_down);
					if( ! this_seq.key_shift_down && ! this_seq.key_ctrl_down){											
						$j('.mv_selected_clip').each(function(inx, selected_clip){							
							if( $j(this).parent().attr('id') != $j(cur_clip_click).parent().attr('id') 
								|| ( $j('.mv_selected_clip').length > 1 ) ){
									$j(this).removeClass("mv_selected_clip");
									$j('#' + $j(this).parent().attr("id") + '_adj').fadeOut("fast");
							}
						});	
					}						
																
					//jump to clip time 
					var sClipObj = this_seq.getClipFromSeqID( $j(this).parent().attr('id') ); 												
					this_seq.plObj.updateCurrentClip( sClipObj  );
					if( $j(this).hasClass("mv_selected_clip") ){
						$j(this).removeClass("mv_selected_clip");
						$j('#' + $j(this).parent().attr("id") + '_adj').fadeOut("fast");
					}else{															
						$j(this).addClass('mv_selected_clip');						
						$j('#' + $j(this).parent().attr("id") + '_adj').fadeIn("fast");
					}	
					//if shift select is down select the in-between clips 
					if( this_seq.key_shift_down ){
						//get the min max of current selection (within the current track)
						var max_order = 0;
						var min_order = 999999999999999;
						$j('.mv_selected_clip').each(function(){
							var cur_clip = this_seq.getClipFromSeqID( $j(this).parent().attr('id') );							
							//get min max
							if(cur_clip.order < min_order)
								min_order = cur_clip.order;
							if(cur_clip.order > max_order)
								max_order = cur_clip.order;
						});
						//select all non-selected between max or min
						js_log('sOrder: ' + sClipObj.order + ' min:' + min_order + ' max:'+ max_order);			
						if( sClipObj.order <= min_order ){							
							for( var i = sClipObj.order; i <= max_order; i++ ){											
								$j('#track_' + track_id + '_clip_' + i + ' > .mv_clip_thumb' ).addClass('mv_selected_clip');	
							} 													
						}
						if( sClipObj.order >= max_order ){
							for( var i =min_order; i <= max_order; i++ ){											
								$j('#track_' + track_id + '_clip_' + i + ' > .mv_clip_thumb' ).addClass('mv_selected_clip');	
							}					
						}
					}
									
				});												
				//add in control for time based display 											
				//debugger;			
				if(this.timeline_mode == 'time'){			
					$j('.ui-resizable-handle').mousedown( function(){
						js_log('hid: ' +  $j(this).attr('class'));
						this_seq.resize_mode = ($j(this).attr('class').indexOf('ui-resizable-e')!=-1)?
										'resize_end':'resize_start';
					});
				}			
				var insert_key='na';
				// drag hooks:
				//@@todo support multiple clips					
				for(var j in track.clips){			
					$j('#track_'+track_id+'_clip_'+j).draggable({ 		
						axis:'x', 
						containment:'#container_track_'+track_id,
						opacity:50,
						handle: ":not(.clip_control)",
						scroll:true,
						drag:function(e, ui){
							//animate re-arrange by left position: 
							//js_log('left: '+ui.position.left);
							//locate clip (based on clip duration not animate) 	
							var id_parts = this.id.split('_');						
							var track_inx = id_parts[1];
							var clip_inx = id_parts[3];
							var clips = this_seq.plObj.tracks[track_inx].clips;
							var cur_drag_clip = clips[clip_inx];		
							var return_org = true;
							$j(this).css('zindex',10);
							//find out where we are inserting and set left border to solid red thick
							for(var k in clips){
								if(	ui.position.left > clips[k].left_px &&
									ui.position.left < (clips[k].left_px + clips[k].width_px)){
									if(clip_inx!=k){
										//also make sure we are not where we started
										if(k-1!=clip_inx){
											$j('#track_'+track_inx+'_clip_'+k).css('border-left', 'solid thick red');									
											insert_key=k;
										}else{
											insert_key='na';
										}
									}else{
										insert_key='na';
									}
								}else{
									$j('#track_'+track_inx+'_clip_'+k).css('border-left', 'solid thin white');
								}
							}	
							//if greater than the last k insert after	
							if(ui.position.left > (clips[k].left_px + clips[k].width_px) &&
								k!=clip_inx ){
									$j('#track_'+track_inx+'_clip_'+k).css('border-right', 'solid thick red');
									insert_key='end';
							}else{
								$j('#track_'+track_inx+'_clip_'+k).css('border-right', 'solid thin white');
							}
						},
						start:function(e,ui){
							js_log('start drag:' + this.id);
							//make sure we are ontop
							$j(this).css({top:'0px',zindex:10});		
						},
						stop:function(e, ui){
							$j(this).css({top:'0px',zindex:0});
							
							var id_parts = this.id.split('_');						
							var track_inx = id_parts[1];
							var clip_inx = id_parts[3];
							var clips = this_seq.plObj.tracks[track_inx].clips;	
							var cur_drag_clip = clips[clip_inx];	
														
							if(insert_key!='na' && insert_key!='end' ){						
								cur_drag_clip.order=insert_key-.5;							
							}else if (insert_key=='end'){
								cur_drag_clip.order=clips.length;
							}							
							//reorder array based on new order
							clips.sort(sort_func);
							function sort_func(a, b){								
								return a.order - b.order;
							}							
							//assign keys back to order:
							this_seq.plObj.tracks[track_inx].reOrderClips();																											
							//redraw: 														 							
							this_seq.do_refresh_timeline();
						}
					});
					//add in resize hook if in time mode: 
					if(this.timeline_mode == 'time'){	
						$j('#track_'+track_id+'_clip_'+j).resizable({		
							minWidth:10,
							maxWidth:6000,
							start: function(e,ui) {									
								//set border to red
								$j(this).css({'border':'solid thin red'});
								//fade In Time stats (end or start based on handle) 							
								//dragging east (adjusting end time) 	
								js_log( 'append to: '+ this.id);												
								$j('#' + this.id + ' > .mv_clip_stats').fadeIn("fast");
							},
							stop: function(e,ui) {
								js_log('stop resize');
								//restore border
								$j(this).css('border', 'solid thin white');
								//remove stats
								var clip_drag = this;
								$j('#'+this.id+' > .mv_clip_stats').fadeOut("fast",function(){
									var id_parts = clip_drag.id.split('_');		
									var track_inx = id_parts[1];
									var clip_inx = id_parts[3];
									//update clip 
									this_seq.doEdit({
										type:this_seq.resize_mode,
										delta:this_seq.edit_delta,
										track_inx:track_inx,
										clip_inx:clip_inx})
									});							
							},
							resize: function(e,ui) {												
								//update time stats & render images: 
								this_seq.update_clip_resize(this);
							}
						});
					}
				}			
				$j('#container_track_'+track_id).width(Math.round(	this.timeline_duration / this.timeline_scale));
			}
			//debugger;
		}
	},
	getClipFromSeqID:function( clip_seq_id ){
		js_log('get id from: ' + clip_seq_id);
		var ct = clip_seq_id.replace('track_','').replace('clip_','').split('_');		
		return this.plObj.tracks[ ct[0] ].clips[ ct[1] ];
	},
	//renders clip frames
	render_clip_frames:function(clip, frame_offset_count){
		js_log('f:render_clip_frames: ' + clip.id + ' foc:' + frame_offset_count); 
		var clip_frames_html='';					
		var frame_width = Math.round(this.track_thumb_height*1.3333333);

		var pint = (frame_offset_count==null)?0:frame_offset_count*frame_width;		
		
		//js_log("pinit: "+ pint+ ' < '+clip.width_px+' ++'+frame_width);
		for(var p=pint;p<clip.width_px;p+=frame_width){								
			var clip_time = (p==0)?0:Math.round(p*this.timeline_scale);
			js_log('rendering clip frames: p:' +p+' '+ (p*this.timeline_scale)+' ' + clip_time);
			clip_frames_html+=clip.embed.renderTimelineThumbnail({
				'width':  frame_width,
				'thumb_class':'mv_tl_thumb',
				'height': this.track_thumb_height,
				'size' : "icon", //set size to "icon" preset
				'time':   clip_time
			});
		}	
		js_log('render_clip_frames:'+clip_frames_html);
		return clip_frames_html;
	},
	update_clip_resize:function(clip_element){
		//js_log('update_clip_resize');
		var this_seq = this;
		var id_parts = clip_element.id.split('_');		
		track_inx = id_parts[1];
		clip_inx = id_parts[3];
		//set clip:
		var clip = this.plObj.tracks[ track_inx ].clips[ clip_inx ];		
		var clip_desc ='';
		//would be nice if getting the width did not flicker the border
		//@@todo do a work around e in resize function has some screen based offset values
		clip.width_px = $j(clip_element).width();
		var width_dif = clip.width_px - Math.round( Math.round( clip.getDuration() )/this.timeline_scale);		
		//var left_px = $j(clip_element).css('left');
		
		var new_clip_dur = Math.round( clip.width_px*this.timeline_scale );
		var clip_dif = (new_clip_dur - clip.getDuration() );
		var clip_dif_str = (clip_dif >0)?'+'+clip_dif:clip_dif;
		//set the edit global delta
		this.edit_delta = clip_dif;
		
		//get new length: 
		clip_desc+='length: ' + seconds2ntp(new_clip_dur) +'('+clip_dif_str+')';	
		if(this_seq.resize_mode=='resize_end'){	
			//expanding right		
			var new_end = seconds2ntp(ntp2seconds(clip.embed.end_ntp)+clip_dif);
			clip_desc+='<br>end time: ' + new_end;		
			//also shift all the other clips (after the current) 
			//js_log("track_inx: " + track_inx + ' clip inx:'+clip_inx);
			//$j('#container_track_'+track_inx+' > .mv_clip_drag :gt('+clip_inx+')').each(function(){
			$j('#container_track_'+track_inx+' > :gt('+clip_inx+')').each(function(){
				var move_id_parts = this.id.split('_');	
				var move_clip = this_seq.plObj.tracks[move_id_parts[1]].clips[move_id_parts[3]];		
				//js_log('should move:'+ this.id);
				$j(this).css('left', move_clip.left_px + width_dif);
			});
		}else{
			//expanding left (resize_start)
			var new_start = seconds2ntp(ntp2seconds(clip.embed.start_ntp)+clip_dif);
			clip_desc+='<br>start time: ' + new_start;					
		}
			
		//update clip stats:
		$j('#'+clip_element.id+' > .mv_clip_stats').html(clip_desc);
		var frame_width = Math.round(this.track_thumb_height*1.3333333);
		//check if we need to append some images:
		var frame_count = $j('#'+clip_element.id+' > img').length;
		if(clip.width_px > (frame_count *  frame_width) ){
			//if dragging left append 
			js_log('width_px:'+clip.width_px+' framecount:'+frame_count+' Xcw='+(frame_count *  frame_width));
			$j('#'+clip_element.id).append(this.render_clip_frames(clip, frame_count));						
		}		
	},
	//renders cnt_time
	render_playheadhead_seeker:function(){	 	
		//render out time stamps and time "jump" links 
		//first get total width
		if(this.timeline_mode=='time'){
			//hide the old control if present	
			$j('#'+this.timeline_id + '_pl_control').remove();
			//set width based on pixle to time and current length:
			pixle_length = Math.round(	this.timeline_duration / this.timeline_scale);
			$j('#'+this.timeline_id+'_head_jump').width(pixle_length);
			//output times every 50pixles 
			var out='';
			//output time-desc every 50pixles and jump links every 10 pixles
			var n=0;
			for(i=0;i<pixle_length;i+=10){
				out+='<div onclick="'+this.instance_name+'.jt('+i*this.timeline_scale+');"' +
						' style="z-index:2;position:absolute;left:'+i+'px;width:10px;height:20px;top:0px;"></div>';			
				if(n==0)				
					out+='<span style="position:absolute;left:'+i+'px;">|'+seconds2ntp(Math.round(i*this.timeline_scale))+'</span>';						
				n++;
				if(n==10)n=0;
			}	
			$j('#'+this.timeline_id+'_head_jump').html(out);
		}
		if(this.timeline_mode=='storyboard'){
			//remove the old one if its still there		
			$j('#'+this.timeline_id +'_pl_control').remove();
			//render out a playlist clip wide and all the way to the right (only playhead and play button) (outside of timeline)
			$j('#'+this.sequence_container_id).append('<div id="'+ this.timeline_id +'_pl_control"'+
				' style="position:absolute;top:' + (this.plObj.height) +'px;'+
				'right:1px;width:'+this.plObj.width+'px;height:'+this.plObj.org_control_height+'" '+
				'class="videoPlayer"><div class="controls">'+
					 	this.plObj.getControlsHTML() +
					 '</div>'+
				'</div>');		
			//update time and render out clip dividers .. should be used to show load progress
			this.plObj.updateBaseStatus();
			
			//once the controls are in the DOM add hooks: 
			ctrlBuilder.addControlHooks(this.plObj);
		}
	},
	jt:function( jh_time ){
		js_log('jt:' + jh_time);
		var this_seq = this;
		this.playline_time = jh_time;
		js_log('time: ' + seconds2ntp(jh_time) + ' ' + Math.round(jh_time/this.timeline_scale));
		//render playline at given time
		$j('#'+this.timeline_id+'_playline').css('left', Math.round(jh_time/this.timeline_scale)+'px' );		 
		cur_pl_time=0;
		//update the thumb with the requested time: 		
		this.plObj.updateThumbTime( jh_time );		
	},
	//adjusts the current scale
	zoom_in:function(){
		this.timeline_scale = this.timeline_scale*.75;
		this.do_refresh_timeline();
		js_log('zoomed in:'+this.timeline_scale);
	},	
	zoom_out:function(){		
		this.timeline_scale = this.timeline_scale*(1+(1/3));
		this.do_refresh_timeline();
		js_log('zoom out: '+this.timeline_scale);
	},
	do_refresh_timeline:function(){	
		//regen duration 
		this.plObj.getDuration( true );
		//refresh player: 		
		this.plObj.getHTML();
		
		this.render_playheadhead_seeker();
		this.render_tracks();
		this.jt(this.playline_time);
	}
		
}
/* extension to mvPlayList to support sequencer features properties */
var mvSeqPlayList = function( element ){
	return this.init( element );
}
mvSeqPlayList.prototype = {
	init:function(element){
		var myPlObj = new mvPlayList(element);
		//inherit mvClip		
		for(var method in myPlObj){			
			if(typeof this[method] != 'undefined' ){				
				this['parent_'+method]=myPlObj[method];				
			}else{		
				this[method] = myPlObj[method];
			}		
		}		
		this.org_control_height = this.pl_layout.control_height;		
		//do specific mods:(controls and title are managed by the sequencer)  
		this.pl_layout.title_bar_height=0;
		this.pl_layout.control_height=0;
	},
	//update the timeline playhead and passalong to parent
	setSliderValue:function( perc ){
		js_log("set " + perc + ' of cur_clip: ' + this.cur_clip.order );
		//$j('#'+ this.seqObj.timeline_id + '_playline').css('left')
		this.parent_setSliderValue( perc );
	},
	getControlsHTML:function(){				
		//get controls from current clip add some playlist specific controls:  		
		this.cur_clip.embed.supports['prev_next'] = true;	
		this.cur_clip.embed.supports['options']   = false;
		return ctrlBuilder.getControls( this.cur_clip.embed );
	},	
	//override renderDisplay
	renderDisplay:function(){
		//setup layout for title and dc_ clip container  
		$j(this).html('<div id="dc_'+this.id+'" style="width:'+this.width+'px;' +
				'height:'+(this.height)+'px;position:relative;" />');			
				
		this.setupClipDisplay();
	}
}
