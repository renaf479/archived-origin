var novaController = function($scope, $rootScope, OriginAdService, serviceFrequency) {
	
	//OriginAdService.init();
		
	if(originAd_action === 'close') {
		$scope.xdData.id 		= 'originAd-'+$scope.origin_ad.OriginAd.id+'-overlay'
		$scope.xdData.width		= '100%';
		$scope.xdData.height	= '100%';
		$scope.xdData.autoOpen	= false;
	} else {
		//OriginAdService.analyticsLog('Load');
	}
	
	$rootScope.xdDataToggle = {
		callback:	'toggleOverlay',
		action:		originAd_action,
		idInitial:	'originAd-'+$scope.origin_ad.OriginAd.id,
		idTriggered:'originAd-'+$scope.origin_ad.OriginAd.id+'-overlay',
		type:		'nova'
	};
	
	OriginAdService.xd($scope.xdData, $scope.originParams.xdSource);
	
	serviceFrequency.init();
}