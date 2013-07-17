'use strict';

var demoPublicApp = angular.module('demoPublicApp', 
					[
						'demoApp.services'
					])
					.run(function($rootScope, DemoServices) {
						var config	= angular.fromJson(_config),
							render	= config.OriginDemo.render;
							
						$rootScope.demo = {
							template:	'/get/templates/'+config.OriginDemo.config.templateAlias,	
						}
						
						$rootScope[config.OriginDemo.config.placement]	= render;
						
						DemoServices.reskinColor(config.OriginDemo.config.reskin_color);
						DemoServices.reskinImage(config.OriginDemo.config.reskin_img);
					
					
/*
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
*/
					});
