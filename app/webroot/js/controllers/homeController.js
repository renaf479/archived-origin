var homeController = function($scope, $filter, $timeout, Origin) {
	$scope.products		= {};
	
	$scope.platforms	= [{name: 'Desktop'}, {name: 'Tablet'}, {name: 'Mobile'}];
	$scope.platformShow	= 'Desktop';
/*
	Origin.get('ads').then(function(response) {
		$scope.ads	= response.origin_ads;
	});
*/
	
	Origin.getPublic('templates').then(function(response) {
		$scope.products		= response;
		$scope.loadGuideline(response[0]);
	});
	
	
	$scope.loadGuideline = function(data) {
		$scope.guidelinesDisplay	= false;
		
		//Clear out images
		//document.getElementById('guidelines-imageInitial').setAttribute('src', '');
		//document.getElementById('guidelines-imageTriggered').setAttribute('src', '');
		
		Origin.getPublic('ad/'+data.OriginAds.id).then(function(response) {
			$scope.guidelines			= data;
			var ad 	= response;
			
			$scope.guidelinesInitial	= ($filter('filter')(ad.OriginAdSchedule[0]['OriginAd'+$scope.platformShow+'InitialContent'], 'background').length > 0)? angular.fromJson($filter('filter')(ad.OriginAdSchedule[0]['OriginAd'+$scope.platformShow+'InitialContent'], 'background')[0].content).image: 'http://placehold.it/'+$scope.guidelines.OriginTemplate.config.dimensions.Initial[$scope.platformShow].width+'x'+$scope.guidelines.OriginTemplate.config.dimensions.Initial[$scope.platformShow].height;
			
			$scope.guidelinesTriggered	= ($filter('filter')(ad.OriginAdSchedule[0]['OriginAd'+$scope.platformShow+'TriggeredContent'], 'background').length > 0)? angular.fromJson($filter('filter')(ad.OriginAdSchedule[0]['OriginAd'+$scope.platformShow+'TriggeredContent'], 'background')[0].content).image: 'http://placehold.it/'+$scope.guidelines.OriginTemplate.config.dimensions.Triggered[$scope.platformShow].width+'x'+$scope.guidelines.OriginTemplate.config.dimensions.Triggered[$scope.platformShow].height;
			
			$timeout(function() {$scope.guidelinesDisplay	= true;}, 200);
		});
	}
};