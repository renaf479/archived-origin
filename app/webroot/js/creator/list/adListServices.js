'use strict';

platformApp.factory('AdListServices', function($rootScope, Rest) {
	var AdList = {
		close: function(ad) {
			$rootScope.adShow	= '';
		},
		expand: function(ad) {
			$rootScope.adShow	= ad.id;
			
			//Prevents repeated requests for data already in DOM
			//if(!ad.backgroundImage) {			
				Rest.get('adExpand/'+ad.id).then(function(response) {
					//Run through Desktop/Mobile/Tablet to find first compatible image
					if(response.Desktop.content) {
						ad.backgroundImage = angular.fromJson(response.Desktop.content).image;
					} else if(response.Tablet.content) {
						ad.backgroundImage 	= angular.fromJson(response.Tablet.content).image;
					} else if(response.Mobile.content) {
						ad.backgroundImage 	= angular.fromJson(response.Mobile.content).image;
					} else {
						ad.backgroundImage	= '/img/logo-small.png';
					}
					
					$rootScope.originAd = response.OriginAd;
				});
			//}
		},
		modalDemo: function(ad) {
			Rest.get('demo/'+ad.id).then(function(response) {
				$rootScope.demos 	= response;
				$rootScope.demos.id	= ad.id;
			});
		}
	};
	return AdList;
});