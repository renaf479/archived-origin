var expandController = function($scope, $rootScope, OriginAdService, serviceFrequency) {

	$rootScope.xdDataToggle = {
		callback: 	'toggle'+$rootScope.originAd_config.type,
		id:			$scope.origin_ad.OriginAd.id,
		action:		'open',
		type:		$rootScope.originAd_config.type
	};
	
	//OriginAdService.analyticsLog('Load');
	//OriginAdService.xd($scope.xdAdInit, $scope.originParams.xdSource);
	
	
	switch(originAd_action) {
		case 'close':
			break;
		case 'open':
			OriginAdService.analyticsLog('Load');
			OriginAdService.xd($scope.xdAdInit, $scope.originParams.xdSource);
			serviceFrequency.init();
			break;
	}
	
	//serviceFrequency.init();
}