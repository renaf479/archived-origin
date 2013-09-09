'use strict';
var $j = jQuery.noConflict();

var platformApp = angular.module('creatorApp', 
					[
					/* 'ngAnimate', */
					/* 'ui', */ 
					'ui.bootstrap',
					'ui.codemirror',
					//'originApp.services', 
					//'originApp.directives',
					'restServices',
					'notificationServices',
					'platformApp.directives',
					'platformApp.filters'
					])
					.run(function($rootScope) {
						//Modal Operations
						$rootScope.originModalOptions = {
							backdropClick:	false,
							backdropFade: 	true
						}
					});