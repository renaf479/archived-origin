var iframe = (function() {
	var springboardId,
		springboardObj;
	
	function xd(data) {
		XD.postMessage(JSON.stringify(data), window.parent.document.location.href);
	}

	var springboard = {
		analytics: function() {
			$sb(springboardObj.id).onStart(function() {
				xd({'originAdAction': 'timeout', 'timeout': Math.floor(springboardObj.clip.duration)});
			
				var quartiles	= new Array(),
					_25			= springboardObj.clip.duration/4,
					_50			= springboardObj.clip.duration/2,
					_75			= parseInt(_50) + parseInt(_25);
					
				quartiles.push({time: parseInt(_25)*1000, title: '25%'});
				quartiles.push({time: parseInt(_50)*1000, title: '50%'});
				quartiles.push({time: parseInt(_75)*1000, title: '75%'});
				
				$sb(springboardObj.id).onCuepoint(quartiles, function(clip, cuepoints) {
					xd({'originAdAction': 'analytics', 'type': 'Video '+cuepoints.title+' ['+springboardObj.title+']', 'data': ''});	
				});
			});
		
			$sb(springboardObj.id).onBegin(function() {
				xd({'originAdAction': 'analytics', 'type': 'Video Begin ['+springboardObj.title+']', 'data': ''});		
			});
		
			$sb(springboardObj.id).onFinish(function() {
				xd({'originAdAction': 'analytics', 'type': 'Video Complete ['+springboardObj.title+']', 'data': ''});		
			});
			
			$sb(springboardObj.id).onMouseOut(function() {
				xd({'originAdAction': 'analytics', 'type': 'Video MouseExit ['+springboardObj.title+']', 'data': ''});		
			});
			
			$sb(springboardObj.id).onMouseOver(function() {
				xd({'originAdAction': 'analytics', 'type': 'Video MouseOver ['+springboardObj.title+']', 'data': ''});		
			});
			
			$sb(springboardObj.id).onMute(function() {
				xd({'originAdAction': 'analytics', 'type': 'Video Mute ['+springboardObj.title+']', 'data': ''});		
			});

			$sb(springboardObj.id).onPause(function() {
				xd({'originAdAction': 'analytics', 'type': 'Video Pause ['+springboardObj.title+']', 'data': ''});		
			});
			
			$sb(springboardObj.id).onResume(function() {
				xd({'originAdAction': 'analytics', 'type': 'Video Resume ['+springboardObj.title+']', 'data': ''});		
			});
			
			$sb(springboardObj.id).onSeek(function() {
				xd({'originAdAction': 'analytics', 'type': 'Video Seek ['+springboardObj.title+']', 'data': ''});		
			});
			
			$sb(springboardObj.id).onStop(function() {
				xd({'originAdAction': 'analytics', 'type': 'Video Stop ['+springboardObj.title+']', 'data': ''});		
			});
			
			$sb(springboardObj.id).onUnmute(function() {
				xd({'originAdAction': 'analytics', 'type': 'Video Unmute ['+springboardObj.title+']', 'data': ''});		
			});
		
		},
		autoclose: function() {
			$sb(springboardObj.id).onFinish(function() {
				setTimeout(function() {
					xd({'originAdAction': 'toggle'});
				}, springboardObj.timeout * 1000);
			})
		},
		mute: function() {
			$sb(springboardObj.id).mute();
		},
		play: function() {
			$sb(springboardObj.id).play();	
		},
		unmute: function() {
			$sb(springboardObj.id).unmute();
		},
		unmutehover: function() {
			$sb(springboardObj.id).onMouseOver(function() {
				springboard.unmute();
			});
		}
	}

	return {
		springboard: function(id, params) {
			springboardId	= id;
			xd({'originAdAction': 'timeouthide'});
			
			$sb(id).onLoad(function() {
				var sbClip	 	= $sb(id).getClip($sb(id).getIndex());
				
				springboardObj 	= {
					id:		id,
					clip:	sbClip,
					title:	decodeURIComponent(sbClip.title),
					timeout: '1.5'
				}
				
/*
				//Oh what to do here...?
				for(var i in params) {
					if(params.hasOwnProperty(i) && params[i]) {
						springboard[i]();
					}
				}
*/
				
				if(window.parent.originAuto) {
					//If auto-triggered unit then mute and auto close
					springboard.autoclose();
					springboard.mute();
					springboard.unmutehover();
				} else {
					springboard.unmute();
				}
				
				springboard.play();
				springboard.analytics();
			});
		},
		xd: function(data) {
			xd(data);
		}
	}
	
})();