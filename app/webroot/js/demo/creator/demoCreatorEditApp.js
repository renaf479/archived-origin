'use strict';

var $j = jQuery.noConflict();

var demoCreatorApp = angular.module('demoCreatorApp', 
						[
						'restServices',
						'platformApp.directives',
						'demoApp.directives',
						'demoApp.services'
						])
						.run(function($rootScope, $interpolate, Rest){
							$rootScope.demo = {
								embed:			{}
							};
														
							$rootScope.placements	= [];
							$rootScope.reskin		= {};
							$rootScope.origin_ad	= angular.fromJson(origin_ad).OriginDemo;
							
							
							$rootScope.demo = {
								name:			$rootScope.origin_ad.name,
								statusSwitch:	($rootScope.origin_ad.status === '1')? true: false,
								reskin_color:	$rootScope.origin_ad.config.reskin_color,
								reskin_img:		$rootScope.origin_ad.config.reskin_img,
								templateAlias:	$rootScope.origin_ad.config.templateAlias
							}
							
/*
							$rootScope.origin_ad.id	= $rootScope.origin_ad.OriginDemo.id;
							$rootScope.embedOptions = {
								auto: 	0,
								close: 	0,
								tablet: false,
								mobile: false,
								id: 	$rootScope.origin_ad.OriginDemo.id,
								type:	$rootScope.origin_ad.OriginDemo.config.template
							}
*/
							
							/**
							* Load Origin embed code template
							*/
/*
							Rest.get('element/origin_embed').then(function(response) {
								$rootScope.render	= $interpolate(response)($rootScope);
							});
*/
							
							/**
							* Load site template listing
							*/
							Rest.get('sites').then(function(response) {
								$rootScope.templates = response;
								$rootScope.demoTemplate();
							});

						});