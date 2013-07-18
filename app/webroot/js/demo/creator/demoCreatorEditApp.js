'use strict';

var $j = jQuery.noConflict();

var demoCreatorApp = angular.module('demoCreatorApp', 
						[
						'restServices',
						'platformApp.directives',
						'demoApp.directives',
						'demoApp.services'
						])
						.run(function($rootScope, Rest, DemoServices){
							$rootScope.placements	= [];
							$rootScope.reskin		= {};
							$rootScope.origin_ad	= angular.fromJson(origin_ad).OriginDemo;
							$rootScope.render		= $rootScope.origin_ad.render;
							
							
							$rootScope.demo = {
								id:				$rootScope.origin_ad.id,
								name:			$rootScope.origin_ad.name,
								placement:		$rootScope.origin_ad.config.placement,
								status:			$rootScope.origin_ad.status,
								statusSwitch:	($rootScope.origin_ad.status === '1')? true: false,
								reskin_color:	$rootScope.origin_ad.config.reskin_color,
								reskin_img:		$rootScope.origin_ad.config.reskin_img,
								templateAlias:	$rootScope.origin_ad.config.templateAlias
							}			
				
							/**
							* Load site template listing
							*/
							Rest.get('sites').then(function(response) {
								$rootScope.templates = response;
							});
							
							DemoServices.meny('#demo-panel', '#demo-site');
						});