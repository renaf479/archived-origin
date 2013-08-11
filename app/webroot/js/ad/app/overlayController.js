var overlayController = function($scope, $rootScope, OriginAdService, serviceFrequency, serviceToggle) {
	
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
		callback: 	'toggle'+$rootScope.originAd_config.type,
		action:		originAd_action,
		idInitial:	'originAd-'+$scope.origin_ad.OriginAd.id,
		idTriggered:'originAd-'+$scope.origin_ad.OriginAd.id+'-overlay',
		type:		$rootScope.originAd_config.type
	};
	
	
	
	
	
	
	//Special case for interstitials
/*
	switch($rootScope.originAd_config.template) {
		case 'antemeridian':
			$rootScope.xdDataToggle.action 			= 'close';
			$rootScope.xdDataToggle.idTriggered		= 'originAd-'+$scope.origin_ad.OriginAd.id;
			break;
		case 'postmeridian':
			$rootScope.xdDataToggle.action 			= 'continue';
			$rootScope.xdDataToggle.idTriggered		= 'originAd-'+$scope.origin_ad.OriginAd.id;
			break;
	}
	
	
	
*/
	
	
		
	
	OriginAdService.xd($scope.xdData, $scope.originParams.xdSource);
	
	serviceFrequency.init();
	
	$scope.close = function() {
		$rootScope.xdDataToggle.action = 'close';
		serviceToggle.toggleoverlay();
	}
}