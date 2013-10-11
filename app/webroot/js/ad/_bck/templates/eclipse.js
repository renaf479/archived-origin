var eclipseController = function($scope, $rootScope, OriginAdService, serviceFrequency) {
	
	//OriginAdService.init();
	/**
	* Horizon units are always 100% page width
	*/
	$rootScope.xdData.width	= '100%';

	$rootScope.xdDataToggle = {
		callback: 	'toggle'+$rootScope.originAd_config.animations.trigger,
		id:			'originAd-'+$scope.origin_ad.OriginAd.id,
		action:		'open',
		type:		'eclipse'
	};
	
	OriginAdService.analyticsLog('Load');
	OriginAdService.xd($scope.xdData, $scope.originParams.xdSource);
	
	serviceFrequency.init();
}