'use strict';

/*
platformApp.directive('product', function($rootScope) {
	var elementRow	= 0;
	return {
		//replace: false,
		restrict: 'A',
		//template: '<div ng:transclude></div>',
		//transclude: true,
        link: function(scope, element, attr) {
        	element.click(function() {
        		$rootScope.productShow	= scope.product.OriginTemplate.id;
        		$rootScope.$apply();
        		
        		if(elementRow !== element.offset().top) {
        			console.log('open new');
        		}
        		elementRow	= element.offset().top;
        		window.scroll(0, elementRow - 90);
        	})
        }
	}
});

platformApp.directive('productImage', function() {
	return {
		replace: true,
		restrict: 'A',
		scope: {
			productImage: '@'
		},
		template: '<div ng:transclude></div>',
		transclude: true,
		link: function(scope, element, attr) {
			try{
				var imagePath = angular.fromJson(scope.productImage).image;
			} catch(e) {
				angular.element(element).remove();
				return false;
			}
			element.find('img').attr('src', imagePath);
		}
	}
});
*/