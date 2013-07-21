'use strict';

var demoPublicApp = angular.module('demoPublicApp', 
					[
						'restServices',
						'demoApp.services'
					])
					.run(function($rootScope, $interpolate, Rest, DemoServices) {
						var config		= angular.fromJson(_config),
							dimensions	= angular.fromJson(config.OriginAd.config).dimensions;
						
						$rootScope.demo = {
							template:	'/get/templates/origin'	
						}
						
						$rootScope.embedOptions = {
							auto: 	0,
							close: 	0,
							tablet: false,
							mobile: false,
							id: 	config.OriginAd.id,
							type:	config.OriginAd.type
						}
						
						/**
						* Load Origin embed code template
						*/
						Rest.get('element/origin_embed').then(function(response) {
							$rootScope.render	= $interpolate(response)($rootScope);
							
							
							
							/**
							* Start guessing locations
							*/
							var placement;
							switch(config.OriginAd.type) {
								case 'ascension':
								case 'aurora':
								case 'horizon':
								case 'antemeridian':
								case 'postmeridian':
									placement	= 'embedOutOfPage';
									break;
									
								case 'singularity':
								case 'eclipse':
									placement	= 'embedLeaderboard';
									break;
									
								case 'nova':
									//Guess based on dimensions
									if(dimensions.Initial.Desktop.width >= 500 && dimensions.Initial.Desktop.width <= 1000) {
										placement = 'embedLeaderboard';
									} else {
										placement = 'embedSidebar';
									}
									break;
							}
							
							$rootScope[placement]	= $rootScope.render;
						});
					});
