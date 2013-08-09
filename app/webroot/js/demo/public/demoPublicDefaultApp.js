'use strict';

var demoPublicApp = angular.module('demoPublicApp', 
					[
						'restServices',
						'demoApp.services'
					])
					.run(function($rootScope, $interpolate, Rest, DemoServices) {
						var config		= angular.fromJson(_config),
							position 	= angular.fromJson(config.OriginAd.config).position,
							dimensions	= angular.fromJson(config.OriginAd.config).dimensions;
						
						$rootScope.demo = {
							template:	'/get/templates/origin'	
						}
						
						$rootScope.embedOptions = {
							auto: 		0,
							close: 		0,
							tablet: 	false,
							mobile: 	false,
							id: 		config.OriginAd.id,
							position:	position
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
							switch(position) {
								case 'ascension':
								case 'aurora':
								case 'horizon':
								case 'antemeridian':
								case 'postmeridian':
								case 'rift':
									placement	= 'embedOutOfPage';
									break;
									
								case 'singularity':
								case 'eclipse':
									placement	= 'embedLeaderboard';
									break;
								
								case 'default':
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
