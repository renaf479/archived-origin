var horizonController = function($scope, $rootScope, OriginAdService, serviceFrequency) {
	
	//OriginAdService.init();
	/**
	* Horizon units are always 100% page width
	*/
	$scope.xdData.width		= '100%';
	
	
	$rootScope.xdDataToggle = {
		callback: 	'toggleExpand',
		id:			'originAd-'+$scope.origin_ad.OriginAd.id,
		action:		'open',
		type:		'horizon'
	};
	
	OriginAdService.analyticsLog('Load');
	OriginAdService.xd($scope.xdData, $scope.originParams.xdSource);
	
	serviceFrequency.init();
}