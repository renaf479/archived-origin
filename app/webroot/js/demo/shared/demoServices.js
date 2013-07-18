'use strict';

angular.module('demoApp.services', [])
	.factory('DemoServices', function($rootScope, $timeout) {
		var DemoServices = {
			adRemove: function() {
				angular.element(document.getElementById('originAd-'+$rootScope.origin_ad.id)).remove();	
			},
			meny: function(menuSelector, contentSelector, open) {
				var meny = Meny.create({
				    // The element that will be animated in from off screen
				    menuElement: document.querySelector(menuSelector),
				
				    // The contents that gets pushed aside while Meny is active
				    contentsElement: document.querySelector(contentSelector),
				
				    // The alignment of the menu (top/right/bottom/left)
				    position: 'left',
				
				    // The height of the menu (when using top/bottom position)
				    height: 200,
				
				    // The width of the menu (when using left/right position)
				    width: 300,
				
				    // Use mouse movement to automatically open/close
				    mouse: true,
				
				    // Use touch swipe events to open/close
				    touch: true
				});
				
				if(open) {meny.open();}
			},
			placement: function() {
				for(var i = 0; i < $rootScope.placements.length; i++) {
					$rootScope[$rootScope.placements[i].id] = '';
				}
				
				DemoServices.adRemove();
				//Issue when re-selecting 1st entry - RACE CONDITION?
				$timeout(function (){
					$rootScope[$rootScope.demo.placement]	= $rootScope.render;
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