'use strict';

var demoPublicApp = angular.module('demoPublicApp', 
					[
						'restServices',
						'demoApp.services'
					])
					.run(function($rootScope, $interpolate, Rest, DemoServices) {
						var config		= angular.fromJson(_config),
							placement 	= angular.fromJson(config.OriginAd.config).placement,
							dimensions	= angular.fromJson(config.OriginAd.config).dimensions;
						
						$rootScope.demo = {
							template:	'/get/templates/origin'	
						}
						
						$rootScope.embedOptions = {
							auto: 		'false',
							close: 		'false',
							tablet: 	false,
							mobile: 	false,
							id: 		config.OriginAd.id,
							placement:	placement,
							adtype:		angular.fromJson(config.OriginAd.config).type
						}
						
						/**
						* Load Origin embed code template
						*/
						Rest.get('element/origin_embed').then(function(response) {
							$rootScope.render	= $interpolate(response)($rootScope);
							
							/**
							* Start guessing locations
							*/
							var embed;
							switch(placement) {
								case 'top':
								case 'bottom':
									embed	= 'embedOutOfPage';
									break;
									
								case 'default':
									//Catch special types
									if($rootScope.embedOptions.adtype === 'interstitial' || 
										$rootScope.embedOptions.adtype === 'prestitial') {
											embed = 'embedOutOfPage';
									} else {
								
										//Guess based on dimensions
										if(dimensions.Initial.Desktop.width >= 500 && dimensions.Initial.Desktop.width <= 1000) {
											embed = 'embedLeaderboard';
										} else {
											embed = 'embedSidebar';
										}
									}
									break;
							}
							
							$rootScope[embed]	= $rootScope.render;
						});
					});
