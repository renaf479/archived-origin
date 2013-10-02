'use strict';

var $j = jQuery.noConflict();

var demoCreatorApp = angular.module('demoCreatorApp', 
						[
						'restServices',
						'platformApp.directives',
						'demoApp.directives',
						'demoApp.services'
						])
						.run(function($rootScope, $interpolate, Rest, DemoServices){
							$rootScope.demo = {
								status:			true,
								statusSwitch: 	true,
								templateAlias:	'origin',
								embed:			{}
							};
							
							$rootScope.placements	= [];
							$rootScope.reskin		= {};
							$rootScope.origin_ad	= angular.fromJson(origin_ad);
							$rootScope.origin_ad.id	= $rootScope.origin_ad.OriginAd.id;
							$rootScope.embedOptions = {
								auto: 	0,
								close: 	0,
								tablet: false,
								mobile: false,
								id: 	$rootScope.origin_ad.OriginAd.id,
								placement:	$rootScope.origin_ad.OriginAd.config.placement
							}
							
							/**
							* Load Origin embed code template
							*/
							Rest.element('creator', 'origin_embed').then(function(response) {
								$rootScope.render	= $interpolate(response)($rootScope);
							});
							
							/**
							* Load site template listing
							*/
							Rest.get('sites').then(function(response) {
								$rootScope.templates = response;
							});
							
							DemoServices.meny('#demo-panel', '#demo-site', true);
						})

/*
var demoCreatorApp = angular.module('demoCreatorApp', ['platformApp.directives'])
					.run(function($rootScope, $compile, Rest) {
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
						
						Rest.get('sites').then(function(response) {
							$rootScope.templates = response;
							$rootScope.demoTemplate();
						});
						
						$j('#demo-panel').draggable({
							containment:'window',
							handle: 	'#demoPanel-header'
						});	
					});
*/