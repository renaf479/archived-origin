'use strict';

platformApp.directive('ad', function($rootScope) {
	var elementRow, elementColumn;
	return {
		restrict: 'A',
        link: function(scope, element, attr) {
        	if(scope.ad.OriginAd.content.img_thumbnail) {
	        	element.css('backgroundImage', 'url('+scope.ad.OriginAd.content.img_thumbnail+')');
        	} else {
	        	element.addClass('no-image');
        	}
        	
        	//Scroll to element when open
        	$rootScope.$watch('adShow', function(newVal, oldVal) {
        		if($rootScope.adShow === scope.ad.OriginAd.id) {
        			elementRow		= element.offset().top;
        			elementColumn	= element.offset().left;
        			window.scroll(0, elementRow - 90);
        		}		
        	});
        }
	}
});