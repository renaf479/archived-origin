'use strict';

var demoPublicApp = angular.module('demoPublicApp', [])
					.run(function($rootScope, $compile) {
						$rootScope.demo 			= angular.fromJson(_config);
						$rootScope.embedOptions 	= $rootScope.demo.OriginDemo.config.embedOptions;
						$rootScope.placements		= {};
						$rootScope.demo.template	= '/administrator/get/templates/'+$rootScope.demo.OriginDemo.config.templateAlias;
						
						$rootScope.reskin = {
							backgroundColor:	$rootScope.demo.OriginDemo.config.reskin_color,
							backgroundImage:	'url('+$rootScope.demo.OriginDemo.config.reskin_img+')'
						}
					});
