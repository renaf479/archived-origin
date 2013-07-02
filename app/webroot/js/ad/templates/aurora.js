var auroraController = function($scope, $rootScope, OriginAdService, serviceFrequency) {

	//$scope.xdData.width		= '100%';
	$scope.xdData.hex 		= $rootScope.originAd_configContent.hex;
	$scope.xdData.selector 	= $rootScope.originAd_config.animations.selector;
	
	$rootScope.xdDataToggle = {
		callback: 	'toggle'+$rootScope.originAd_config.animations.trigger,
		id:			'originAd-'+$scope.origin_ad.OriginAd.id,
		action:		'open',
		type:		'ascension'
	};
	
	OriginAdService.analyticsLog('Load');
	OriginAdService.xd($scope.xdData, $scope.originParams.xdSource);
	
	serviceFrequency.init();
}