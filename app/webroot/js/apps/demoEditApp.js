'use strict';
var $j = jQuery.noConflict();

var demoEditApp = angular.module('demoEditApp', ['originApp.services', 'originApp.directives'])
					.run(function($rootScope, $compile, Origin) {
						//$rootScope.demo 				= {};
						//$rootScope.demo.templateAlias	= 'origin';
						//$rootScope.demo.embed 			= {};
						$rootScope.placements			= [];
						$rootScope.reskin 				= {};
						
						
						$rootScope.origin_ad			= angular.fromJson(origin_ad).OriginDemo;
						$rootScope.origin_ad_template	= $rootScope.origin_ad.config.type;
						$rootScope.embedOptions			= $rootScope.origin_ad.config.embedOptions;
						$rootScope.render				= $compile(decodeURIComponent(origin_embed.replace(/\+/g, ' ')))($rootScope);
						$rootScope.demo = {
							alias:			$rootScope.origin_ad.alias,
							embed:			{},
							id: 			$rootScope.origin_ad.id,
							name:			$rootScope.origin_ad.name,
							statusSwitch:	($rootScope.origin_ad.status === '1')? true: false,
							placement:		$rootScope.origin_ad.config.placement,
							reskin_color:	$rootScope.origin_ad.config.reskin_color,
							reskin_img:		$rootScope.origin_ad.config.reskin_img,
							templateAlias:	$rootScope.origin_ad.config.templateAlias
						}
						
						$rootScope[$rootScope.demo.placement]	= $rootScope.render;
						
						
						Origin.get('sites').then(function(response) {
							$rootScope.templates = response;
							$rootScope.demoTemplate();
						});
						
						$j('#demo-panel').draggable({
							containment:'window',
							handle: 	'#demoPanel-header'
						});	
					});
