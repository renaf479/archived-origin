var singularityController = function($scope, $rootScope, OriginAdService, serviceFrequency) {
	
	$rootScope.xdDataToggle = {
		callback: 	'toggleExpand',
		id:			'originAd-'+$scope.origin_ad.OriginAd.id,
		action:		'open'
	};
	
	OriginAdService.analyticsLog('Load');
	OriginAdService.xd($scope.xdData, $scope.originParams.xdSource);
	
	serviceFrequency.init();
}