var overlayController = function($scope, $rootScope, OriginAdService) {

	//Configuration object for trigger
	$rootScope.xdDataToggle = {
		callback: 	'toggleoverlay',
		action:		originAd_action,
		id:			$scope.origin_ad.OriginAd.id,
		type:		$rootScope.originAd_config.type
	}	
	
	switch(originAd_action) {
		case 'close':
			break;
		case 'open':
			OriginAdService.analyticsLog('Load');
			OriginAdService.xd($scope.xdAdInit, $scope.originParams.xdSource);
			break;
	}
}