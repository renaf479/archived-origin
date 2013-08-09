var expandController = function($scope, $rootScope, OriginAdService, serviceFrequency) {

	$rootScope.xdDataToggle = {
		callback: 	'toggle'+$rootScope.originAd_config.type,
		id:			'originAd-'+$scope.origin_ad.OriginAd.id,
		action:		'open',
		type:		$rootScope.originAd_config.type
	};
	
	OriginAdService.analyticsLog('Load');
	OriginAdService.xd($scope.xdData, $scope.originParams.xdSource);
	
	serviceFrequency.init();
}