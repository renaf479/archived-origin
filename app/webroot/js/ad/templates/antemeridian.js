var antemeridianController = function($scope, $rootScope, $timeout, OriginAdService, serviceToggle) {
	
	$scope.xdData.width		= '100%';
	$scope.xdData.height	= '100%';
	$scope.countdown		= angular.copy($rootScope.timeout);
	$timeout(serviceToggle.toggleOverlay, $rootScope.timeout * 1000);
	
	OriginAdService.analyticsLog('Load');
	OriginAdService.xd($scope.xdData, $scope.originParams.xdSource);
	
	$rootScope.xdDataToggle = {
		callback:	'toggleOverlay',
		action:		'close',
		idInitial:	'originAd-'+$scope.origin_ad.OriginAd.id,
		idTriggered:'originAd-'+$scope.origin_ad.OriginAd.id,
		type:		'antemeridian'
	};
	
	$scope.close = function() {
		serviceToggle.toggleOverlay();
	}
}