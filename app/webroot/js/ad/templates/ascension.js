var ascensionController = function($scope, $rootScope, OriginAdService, serviceFrequency) {
	
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