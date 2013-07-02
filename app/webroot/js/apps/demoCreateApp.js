'use strict';
var $j = jQuery.noConflict();

var demoCreateApp = angular.module('demoCreateApp', ['originApp.services', 'originApp.directives'])
					.run(function($rootScope, $compile, Origin) {
						$rootScope.demo 				= {};
						$rootScope.demo.status			= true;
						$rootScope.demo.statusSwitch	= true;
						$rootScope.demo.templateAlias	= 'gamerevolution';
						$rootScope.demo.embed 			= {};
						$rootScope.placements			= [];
						$rootScope.reskin 				= {};
						$rootScope.origin_ad			= angular.fromJson(origin_ad);
						$rootScope.origin_ad.id 		= $rootScope.origin_ad.OriginAd.id;
						
						$rootScope.embedOptions = {
							auto: 	0,
							close:	0,
							hover:	0,
							id:		$rootScope.origin_ad.OriginAd.id,
							type:	$rootScope.origin_ad.OriginAd.config.template
						};
						
						
						var originEmbed	= decodeURIComponent(origin_embed.replace(/\+/g, ' '));
							originEmbed = originEmbed.replace(/{{embedOptions.id}}/g, $rootScope.embedOptions.id);
							originEmbed = originEmbed.replace(/{{embedOptions.auto}}/g, $rootScope.embedOptions.auto);
							originEmbed = originEmbed.replace(/{{embedOptions.close}}/g, $rootScope.embedOptions.close);
							originEmbed = originEmbed.replace(/{{embedOptions.type}}/g, $rootScope.embedOptions.type);
			
							originEmbed = originEmbed.replace(/{{embedOptions.tablet}}/g, $rootScope.embedOptions.tablet);
							originEmbed = originEmbed.replace(/{{embedOptions.mobile}}/g, $rootScope.embedOptions.mobile);
						
						$rootScope.render 	= originEmbed;
						//$rootScope.render	= $compile(decodeURIComponent(origin_embed.replace(/\+/g, ' ')))($rootScope)
						
						Origin.get('sites').then(function(response) {
							$rootScope.templates = response;
							$rootScope.demoTemplate();
						});
						
						$j('#demo-panel').draggable({
							containment:'window',
							handle: 	'#demoPanel-header'
						});	
					});
