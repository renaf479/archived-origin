'use strict';

angular.module('platformApp.filters', [])
	.filter('createAlias', function() {
		return function(input) {
			if(input) return input.replace(/ /g,'-').toLowerCase();
		}
	});