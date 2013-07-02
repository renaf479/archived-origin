'use strict';

platformApp.directive('guidelineImage', function($rootScope) {
	return {
		restrict: 'A',
		scope: {
			guidelineImage: '@'	
		},
		link: function(scope, element, attr) {
			//angular.fromJson(scope.guidelineImage).image;
			/*
scope.$watch('guidelineImage', function() {
				//console.log(angular.fromJson(scope.guidelineImage).image);
				try{
					angular.fromJson(scope.guidelineImage);
				} catch(e) {
					return false;
				}	
				
				//console.log(angular.fromJson(scope.guidelineImage).image);
				element.attr('src', angular.fromJson(scope.guidelineImage).image);
			});
*/
			
			try{
				var image = angular.fromJson(scope.guidelineImage).image;
			} catch(e) {
				return false;
			}
			element.attr('src', image);
			element.css('margin-top', '-'+(element.height()/2)+'px');
			element.css('margin-left', '-'+(element.width()/2)+'px');
			
			angular.element(element).next().css('top', (element.height() + 5)+'px');
		}	
	}
});

platformApp.directive('product', function() {
	return {
		restrict: 'A',
		replace: true,
		scope: {
            product: '@'
        },
        template: '<div ng:transclude></div>',
        transclude: true,
        link: function(scope, element, attr) {
        	//console.log(scope.product);
        }
	}
});