var postmeridianController = function($scope, $rootScope, $timeout, OriginAdService, serviceToggle) {
		
	if(originAd_action === 'open') {
		$scope.xdData.id 		= 'originAd-'+$scope.origin_ad.OriginAd.id+'-overlay'
		$scope.xdData.width		= '100%';
		$scope.xdData.height	= '100%';
		$scope.xdData.autoOpen	= false;
		OriginAdService.analyticsLog('Load');
		
		$scope.countdown		= angular.copy($rootScope.timeout);	
		$timeout(serviceToggle.toggleOverlay, $rootScope.timeout * 1000);
	} else {
		$scope.xdData.width			= '0';
		$scope.xdData.height		= '0';
		$scope.xdData.idTriggered	= 'originAd-'+$scope.origin_ad.OriginAd.id+'-overlay';
	}
	
	OriginAdService.xd($scope.xdData, $scope.originParams.xdSource);
	
	$rootScope.xdDataToggle = {
		callback:	'toggleOverlay',
		action:		'continue',
		idInitial:	'originAd-'+$scope.origin_ad.OriginAd.id,
		idTriggered:'originAd-'+$scope.origin_ad.OriginAd.id+'-overlay',
		type:		'postmeridian'
	};
	
	$scope.close = function() {
		serviceToggle.toggleOverlay();
	}
}