'use strict';

var platformApp = angular.module('platformApp', 
					[
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