'use strict';

angular.module('originApp.filters', [])
	.filter('createAlias', function() {
		return function(input) {
			if(input) return input.replace(/ /g,'-').toLowerCase();
		}
	});
	

platformApp.module('createAlias', );


	
/*
'use strict';

platformApp.factory('Notification', function($rootScope, $timeout) {
	$rootScope.notification	= {
*/