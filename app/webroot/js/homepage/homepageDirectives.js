'use strict';

platformApp.directive('guidelineImage', function factory($rootScope) {
	return {
		restrict: 'A',
		scope: {
			guidelineImage: '@'	
		},
		link: function(scope, element, attr) {
			//angular.fromJson(scope.guidelineImage).image;
			
			try{
				angular.fromJson(scope.guidelineImage);
			} catch(e) {
				return false;
			}		
			element.attr('src', angular.fromJson(scope.guidelineImage).image);
		}	
	}
});