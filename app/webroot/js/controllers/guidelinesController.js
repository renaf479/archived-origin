var guidelinesController = function($scope, $filter, Origin) {
	//$scope.components	= {};
	$scope.guidelines 	= {};
	$scope.showcase		= {};
	$scope.template 	= angular.fromJson(_template);
	$scope.platforms	= [{name: 'Desktop'}, {name: 'Tablet'}, {name: 'Mobile'}];
	$scope.platformShow	= 'Desktop';
	
	
/*
	Origin.get('components').then(function(response) {
		$scope.components = response['raw'];
	});
*/
	
	Origin.get('showcase/'+$scope.template.alias).then(function(response) {
		$scope.showcase		= response['origin_ads'];
		$scope.guidelines	= $scope.showcase[0];
		$scope.loadPreview();
	});
	
	$scope.dimensionsShow = function(platform) {
		$scope.platformShow = platform;
		//Set images
		//{{guidelines.OriginAdSchedule[0].OriginAdDesktopInitialContent[0].content.image|filter:'background'}}
		$scope.loadPreview();
	}
	
	$scope.loadPreview = function() {
		$scope.dimensionsInitial	= angular.fromJson($filter('filter')($scope.guidelines.OriginAdSchedule[0]['OriginAd'+$scope.platformShow+'InitialContent'], 'background')[0].content).image;
		
		$scope.dimensionsTriggered	= angular.fromJson($filter('filter')($scope.guidelines.OriginAdSchedule[0]['OriginAd'+$scope.platformShow+'TriggeredContent'], 'background')[0].content).image;
	}
	
};