'use strict';

var demoPublicApp = angular.module('demoPublicApp', [])
					.run(function($rootScope, $compile) {
						$rootScope.demo 			= angular.fromJson(_config);
						$rootScope.embedOptions 	= $rootScope.demo.OriginDemo.config.embedOptions;
						$rootScope.placements		= {};
						$rootScope.demo.template	= '/get/templates/'+$rootScope.demo.OriginDemo.config.templateAlias;
						$rootScope.reskin 			= {};
						
						if($rootScope.demo.OriginDemo.config.reskin_color) {
							$rootScope.reskin.backgroundColor	= $rootScope.demo.OriginDemo.config.reskin_color;
						}
						
						if($rootScope.demo.OriginDemo.config.reskin_img) {
							$rootScope.reskin.backgroundImage	= 'url('+$rootScope.demo.OriginDemo.config.reskin_img+')';
						}
					});
