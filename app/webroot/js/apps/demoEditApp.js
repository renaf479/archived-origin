'use strict';
var $j = jQuery.noConflict();

var demoEditApp = angular.module('demoEditApp', ['originApp.services', 'originApp.directives'])
					.run(function($rootScope, Origin) {
						$rootScope.demo 				= {};
						$rootScope.demo.templateAlias	= 'origin';
						$rootScope.demo.embed 			= {};
						$rootScope.placements			= [];
						$rootScope.reskin 				= {};
						$rootScope.origin_ad			= angular.fromJson(origin_ad);
						
						$rootScope.embedOptions = {
							auto: 	0,
							close:	0,
							hover:	0,
							id:		$rootScope.origin_ad.OriginAd.id,
							type:	$rootScope.origin_ad.OriginAd.config.template
						};
						
						Origin.get('sites').then(function(response) {
							$rootScope.templates = response;
							$rootScope.demoTemplate();
						});
						
						$j('#demo-panel').draggable({
							containment:'window',
							handle: 	'#demoPanel-header'
						});	
					});
