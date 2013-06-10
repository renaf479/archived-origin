var iframe = (function() {
	var springboardId;

	var springboard = {
		//NEEDS TO FIND FREQUENCY FLAG FROM PARENT... SOMEHOW?
		autoclose: function() {
			$sb(springboardId).onFinish(function() {
				setTimeout(function() {
					console.log('close ad unit');
				}, 5000);
			})
		},
		automute: function() {
			/*
			if(autoOpen) {
					$sb(springboardPlayerId).mute();
				}
			*/
		},
		autoplay: function() {
			//$sb(springboardId).play();
			window.name = 'test';
			console.log(window.name);
		},
		muteplayer: function() {
			/*
			
			if(!autoOpen && toggle === "off") {
					$sb(springboardPlayerId).unmute();
				} else if(!autoOpen && toggle === "on") {
					$sb(springboardPlayerId).mute();
				}
			*/
		},
		unmutehover: function() {
			$sb(springboardId).onMouseOver(function() {
				if($sb(springboardId).getStatus().muted) $sb(springboardId).unmute();
			});
		},
		unmuterestart: function() {
			$sb(springboardId).onUnmute(function() {
				$sb(springboardId).seek(0);
			});
		}
	}

	return {
		springboard: function(id, params) {
			springboardId	= id;
			
			$sb(springboardId).onLoad(function() {
				for(var i in params) {
					if(params.hasOwnProperty(i) && params[i]) {
						springboard[i]();
					}
				}
			});
		}
	}
	
})();