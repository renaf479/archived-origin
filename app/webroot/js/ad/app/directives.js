'use strict';

angular.module('originAd.directives', [])
	.directive('analytics', function(OriginAdService) {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				element.bind('mouseenter', function() {
					OriginAdService.analyticsLog('Mouse Over');
				});
				
				element.bind('mouseleave', function() {
					OriginAdService.analyticsLog('Mouse Exit');
				})
				
				element.bind('click', function(event) {
					OriginAdService.analyticsLog('Mouse Click (X:'+event.clientX+', Y:'+event.clientY+')');
				})
			}
		}
	})
	.directive('content', function($compile){
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				//Construct styles object
				var styles = {
					'position':	'absolute',
					'width':	scope.content.config.width,
					'height':	scope.content.config.height,
					'top':		scope.content.config.top,
					'left':		scope.content.config.left,
					'zIndex':	scope.content.order
				},
				render	= angular.element(decodeURIComponent(scope.content.render.replace(/\+/g, ' '))).css(styles);
				element.append($compile(render)(scope));
			}
		}
	})
	.directive('collapse', function($rootScope) {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				switch(attrs.collapse) {
					case 'content':
						element.data('source', element.html());
						break;
					case 'iframe':
						element.data('source', element.attr('src'));
						break;
				}
			
				$rootScope.$watch('hiddenView', function(newValue, oldValue) {
					// && (originAd_action === undefined)
					if(scope.originAd_config.type === 'inpage') {
						//Special case for Overlay type units
						if((typeof originAd_action !== 'undefined') && (originAd_action === 'close')) {
							return false;
						}

						if(element.parent().parent().attr('id') === newValue) {
							/**
							* Hide elements
							*/
							switch(attrs.collapse) {
								case 'content':
									element.html('');
									break;
								case 'iframe':
									element.attr('src', 'about:blank');
									break;
							}
						} else {
							/**
							* Show elements
							*/
							switch(attrs.collapse) {
								case 'content':
									element.html(element.data('source'));
									break;
								case 'iframe':
									element.attr('src', element.data('source'));
									//setInterval(function() {console.log(element.attr('data-status'));}, 3000);
									break;
							}
						}
					}
				});
			}
		}
	})
	.directive('countdown', function($timeout) {
		return {
			restrict: 'E',
			link: function(scope, element, attrs) {
			
				var countdownTimer	= function() {
					scope.countdown -= 1;
					if(scope.countdown > 0) {
						$timeout(countdownTimer, 1000);
					}
				};
				countdownTimer();
			}
		}
	})
	.directive('toggle', function(serviceToggle) {
		var trigger;
		function hoverIntent(scope) {
			//??? clearTimeout(autoClose);
			var onMouseStop = function() {
					serviceToggle[scope.xdDataToggle.callback]();
					trigger	= false;
				};
				
			return function() {
				clearTimeout(trigger);
				trigger = setTimeout(onMouseStop, 1000 * scope.originParams.hover);
			}();
		}
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				switch(attrs.toggle) {
					case 'click':
						element.bind('click', function() {
							serviceToggle[scope.xdDataToggle.callback]();
						});
						break;
					case 'hover':
						element.bind('mousemove', function() {
							hoverIntent(scope);
						});						
					
						element.bind('mouseout', function() {
							clearTimeout(trigger);
						});
						break;
				}
			}
		}	
	});