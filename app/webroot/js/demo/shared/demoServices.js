'use strict';

angular.module('demoApp.services', [])
	.factory('DemoServices', function($rootScope, $timeout) {
		var DemoServices = {
			adRemove: function() {
				angular.element(document.getElementById('originAd-'+$rootScope.origin_ad.id)).remove();	
			},
			placement: function() {
				for(var i = 0; i < $rootScope.placements.length; i++) {
					$rootScope[$rootScope.placements[i].id] = '';
				}
				
				DemoServices.adRemove();
				//Issue when re-selecting 1st entry - RACE CONDITION?
				$timeout(function (){
					$rootScope[$rootScope.demo.placement]	= $rootScope.render
					}, 0);
			},
			reskinColor: function(hex) {
				if(!$rootScope.reskin) $rootScope.reskin = {};
				$rootScope.reskin.backgroundColor 	= hex;
			},
			reskinImage: function(img) {
				if(!$rootScope.reskin) $rootScope.reskin = {};
				$rootScope.reskin.backgroundImage	= 'url('+img+')';
			},
			scan: function() {
				var adTags	= angular.element(document.body).find('adTag');
				
				for(var i = 0; i < adTags.length; i++) {
					$rootScope.placements[i] = {
						id: 	angular.element(adTags[i]).attr('id'),
						name:	angular.element(adTags[i]).data('name')
					}
				}
			},
			template: function() {
				DemoServices.adRemove();
				$rootScope.demo.template	= '/administrator/get/templates/'+$rootScope.demo.templateAlias;
			}
		}
		return DemoServices;
	});