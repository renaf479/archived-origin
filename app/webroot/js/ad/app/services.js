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
	.factory('serviceTimer', function($rootScope, $timeout, serviceToggle) {
		var timer;
	
		var serviceTimer = {
			init: function() {
				if($rootScope.timeout > 0 && $rootScope.originParams.auto > 0) {
					timer = $timeout(serviceToggle[$rootScope.xdDataToggle.callback], $rootScope.timeout * 1000);
				}
			},
			cancel: function() {
				if($rootScope.timeout === 0 && $rootScope.originParams.auto > 0) {
					$timeout.cancel(timer);
					$rootScope.countdownShow = false;
				}
			}
		}
		
		return serviceTimer;
	})
	.factory('serviceFrequency', function($rootScope, serviceToggle, serviceTimer, OriginAdService) {
		return {
			init: function() {				
				/**
				* Auto-expand logic
				*/
				if(this.check($rootScope.originAd_id, $rootScope.originParams.auto)) {
					//Initialize Timer service
					serviceTimer.init();
				
					switch($rootScope.xdDataToggle.callback) {
						case 'toggleExpand':
							serviceToggle.toggleExpand('auto');
							break;
						case 'toggleOverlay':
							if(originAd_action !== 'close') {
								serviceToggle.toggleOverlay('auto');
							}
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
			toggleExpand: function(auto) {
				var animateObj 	= angular.copy($rootScope.originAd_config.animations),
					element 	= document.getElementById(animateObj.selector),
					animateTo,
					duration;
				switch($rootScope.xdDataToggle.action) {
					case 'close':
						animateTo	= animateObj.start+'px';
						duration	= animateObj.closeDuration/1000;
						
						$rootScope.xdDataToggle.resizeHeight= $rootScope.originAd_config.dimensions.Initial[origin_platform].height+'px';
						$rootScope.xdDataToggle.resizeWidth	= $rootScope.originAd_config.dimensions.Initial[origin_platform].width+'px';
						$rootScope.xdDataToggle.duration	= animateObj.closeDuration/1000;
						$rootScope.hiddenView				= 'triggered';	
						$rootScope.xdDataToggle.action		= 'open';
						OriginAdService.analyticsLog('Close');
						break;
					case 'open':
						animateTo	= animateObj.end+'px',
						duration	= animateObj.openDuration/1000;
						
						$rootScope.xdDataToggle.resizeHeight= $rootScope.originAd_config.dimensions.Triggered[origin_platform].height+'px';
						$rootScope.xdDataToggle.resizeWidth	= $rootScope.originAd_config.dimensions.Triggered[origin_platform].width+'px';
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
			toggleOverlay: function() {
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