'use strict';

//Layers
platformApp.directive('layer', function() {
	return {
		restrict: 'A',
		link: function(scope, element, attr) {
			element.sortable({
				'axis':	'y',
				'update': function(event, ui) {
					var newOrder = element.find('li').length-1;
					
					angular.forEach(element.find('li'), function(listItem, listIndex) {	
						angular.forEach(scope.originAdSchedule[scope.ui.schedule]['OriginAd'+scope.ui.platform+scope.ui.state+'Content'], function(contentValue, contentKey) {
							if(angular.element(listItem).scope().layer.id === contentValue.id) {
								scope.$apply(function() {
									contentValue.order = newOrder;
								});
								newOrder--;
							}
						});
					});
				}
			});
		}
	}
});