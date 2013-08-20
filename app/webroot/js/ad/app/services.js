'use strict';

angular.module('originAd.services', [])
	.factory('OriginAdService', function($rootScope) {
		var OriginAdService = {
			analyticsLog: function(type, data) {
				if(typeof(_gaq) !== 'undefined') {
					console.log('Tracking:'+document.title+' [OriginID: '+originAd_id+'] '+type);
					//_gaq.push(['_trackEvent', document.title+' [OriginID: ]', type]);
				}
			},
			xd: function(data, xdSource) {
				XD.postMessage(JSON.stringify(data), xdSource);
			}	
		}
		return OriginAdService;
	})
	.factory('serviceCountdown', function($rootScope, $timeout, serviceToggle) {
		var timer,
			countdownTimer = function() {
			$rootScope.countdown -= 1;
			if($rootScope.countdown > 0) {
				timer = $timeout(countdownTimer, 1000);
			} else {
				serviceToggle[$rootScope.xdDataToggle.callback]();
			}
		}
		
		
		var serviceCountdown = {
			init: function() {
				$rootScope.countdown = $rootScope.originAd_config[origin_platform].Animations.timer;
				countdownTimer();
			},
			cancel: function() {
				$timeout.cancel(timer);
			},
			hide: function() {
				$rootScope.countdownHide = 'true';
			},
			show: function() {
				$rootScope.countdownHide = 'false';
			},
			restart: function(timer) {
				this.cancel();
				this.show();
				$rootScope.countdown = timer;
				countdownTimer();
			}
		};
		
		return serviceCountdown;
	})
	.factory('serviceTimer', function($rootScope, $timeout, serviceToggle) {
		var timer;
	
		var serviceTimer = {
			init: function() {
				if($rootScope.timeout > 0 && $rootScope.originParams.auto === 'true') {
					timer = $timeout(serviceToggle[$rootScope.xdDataToggle.callback], $rootScope.timeout * 1000);
				}
			},
			cancel: function() {
				$timeout.cancel(timer);
				$rootScope.countdownShow = false;
			}
		}
		
		return serviceTimer;
	})
	.factory('serviceFrequency', function($rootScope, serviceToggle, serviceTimer, OriginAdService, $timeout) {
		/**
		* Only in use with non-Meridian type units
		*/
		return {
			init: function() {				
				/**
				* Auto-expand logic
				*/
				var auto 	= ($rootScope.originParams.auto === 'true')? '1': '0';
				
				if(this.check($rootScope.originAd_id, auto)) {
				
					//Flag to know if the unit has been auto-opened
					window.originAuto	= true;
					
					switch($rootScope.xdDataToggle.callback) {
						case 'toggleexpand':
							serviceToggle.toggleexpand('auto');
							break;
						case 'toggleoverlay':
							serviceToggle.toggleoverlay('auto');
							break;
					}
				}
			},
			frequency: function(cookieName) {
				/**
				* Sets cookie if unavailable
				* Returns frequency value in cookie
				*/
				if(!this.get(cookieName)) {
					this.set(cookieName, 0, false);
				}
				
				return this.get(cookieName);
			},
			check: function(cookieName, frequency) {
				if(frequency > this.frequency(cookieName)) {
					var newValue	= this.frequency(cookieName) + 1;
					this.set(cookieName, newValue, true);
					return true;
				} else {
					return false;	
				}
			},
			get: function(cookieName) {
				return CM.get(cookieName);
			},
			set: function(cookieName, value, overwrite) {
				if(overwrite) {
					CM.set(cookieName, value);
				} else {
					var date 	= new Date(),
						expire 	= new Date(date.getTime() + 24 * 60 * 60 * 1000);
					CM.set(cookieName, value, expire);
				}
			},
			unset: function(cookieName) {
				CM.unset(cookieName);
			}
		}
	})
	.factory('serviceToggle', function($rootScope, OriginAdService) {	
		var serviceToggle 	= {
			toggleexpand: function(auto) {
				var animateObj 	= angular.copy($rootScope.originAd_config[origin_platform].Animations),
					element 	= document.getElementById(animateObj.selector),
					animateTo,
					duration;
					
				$rootScope.xdDataToggle.placement		= $rootScope.originAd_config.placement;
					
				switch($rootScope.xdDataToggle.action) {
					case 'close':
						animateTo	= animateObj.start+'px';
						duration	= animateObj.closeDuration/1000;
						
						/*
$rootScope.xdDataToggle.resizeHeight 	= (dimensionObj.Initial[origin_platform].height === dimensionObj.Triggered[origin_platform].height)? '': dimensionObj.Initial[origin_platform].height+'px';
						$rootScope.xdDataToggle.resizeWidth		= (dimensionObj.Initial[origin_platform].width === dimensionObj.Triggered[origin_platform].width)? '': dimensionObj.Initial[origin_platform].width+'px';
*/
						$rootScope.xdDataToggle.resizeHeight	= $rootScope.originAd_config[origin_platform].Initial.height+'px';
						$rootScope.xdDataToggle.resizeWidth		= $rootScope.originAd_config[origin_platform].Initial.width+'px';
						$rootScope.xdDataToggle.duration		= animateObj.closeDuration/1000;
						$rootScope.hiddenView					= 'triggered';	
						$rootScope.xdDataToggle.action			= 'open';
						OriginAdService.analyticsLog('Close');
						break;
					case 'open':
						animateTo	= animateObj.end+'px',
						duration	= animateObj.openDuration/1000;
						$rootScope.xdDataToggle.resizeHeight= $rootScope.originAd_config[origin_platform].Triggered.height+'px';
						$rootScope.xdDataToggle.resizeWidth	= $rootScope.originAd_config[origin_platform].Triggered.width+'px';
						
/*
						$rootScope.xdDataToggle.resizeHeight 	= (dimensionObj.Initial[origin_platform].height === dimensionObj.Triggered[origin_platform].height)? '': dimensionObj.Triggered[origin_platform].height+'px';
						$rootScope.xdDataToggle.resizeWidth		= (dimensionObj.Initial[origin_platform].width === dimensionObj.Triggered[origin_platform].width)? '': dimensionObj.Triggered[origin_platform].width+'px';
*/
						
						$rootScope.xdDataToggle.duration	= animateObj.openDuration/1000;
						$rootScope.hiddenView				= 'initial';
						$rootScope.xdDataToggle.action		= 'close';
						OriginAdService.analyticsLog('Open');
						break;
				}
				if(auto !== 'auto') $rootScope.$apply();//IS THIS A GOOD IDEA???
				OriginAdService.xd($rootScope.xdDataToggle, $rootScope.originParams.xdSource);
				anim(document.getElementById(animateObj.selector), {top:animateTo}, duration, 'ease-out');
			},
			toggleoverlay: function() {
				switch($rootScope.xdDataToggle.action) {
					case 'close':
						OriginAdService.analyticsLog('Close');
						break;
					case 'open':
						OriginAdService.analyticsLog('Open');
						break;
				}
				OriginAdService.xd($rootScope.xdDataToggle, $rootScope.originParams.xdSource);
			}
		}
		
		return serviceToggle;
	});