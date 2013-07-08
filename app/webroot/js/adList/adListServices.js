'use strict';

platformApp.factory('AdListServices', function($rootScope, Rest) {
	var AdList = {
		close: function(ad) {
			$rootScope.adShow	= '';
		},
		expand: function(ad) {
			$rootScope.adShow	= ad.id;
			Rest.get('demo/'+ad.id).then(function(response) {
				$rootScope.demos = response;
			});
			Rest.get('adExpand/'+ad.id).then(function(response) {
				//Run through Desktop/Mobile/Tablet to find first compatible image
				if(response.Desktop.content) {
					$rootScope.backgroundImage 	= angular.fromJson(response.Desktop.content).image;
				} else if(response.Tablet.content) {
					$rootScope.backgroundImage 	= angular.fromJson(response.Tablet.content).image;
				} else if(response.Mobile.content) {
					$rootScope.backgroundImage 	= angular.fromJson(response.Mobile.content).image;
				} else {
					$rootScope.backgroundImage	= '';
				}
			});
		}
	};
	return AdList;
});