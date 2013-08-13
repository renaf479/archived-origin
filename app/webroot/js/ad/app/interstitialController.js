var interstitialController = function($scope, $rootScope, $timeout, OriginAdService, serviceToggle) {
	
	console.log(originAd_action);
	
	switch(originAd_action) {
		case 'close':
			
			break;
		case 'open':
			$scope.xdAdInit.config.width = $scope.xdAdInit.config.height = 0;
			OriginAdService.xd($scope.xdAdInit, $scope.originParams.xdSource);
			break;
	}
	
	
/*
	if(originAd_action === 'open') {
		$scope.xdData.id 		= 'originAd-'+$scope.origin_ad.OriginAd.id;
		$scope.xdData.width		= '0';
		$scope.xdData.height	= '0';
		$scope.xdData.autoOpen	= false;
		OriginAdService.analyticsLog('Load');
		
		$rootScope.timeout		= '15';
		$scope.countdown		= angular.copy($rootScope.timeout);	
		var timer 				= $timeout(serviceToggle.toggleoverlay, $rootScope.timeout * 1000);
	
		$rootScope.$watch('timeout', function(newValue, oldValue) {
			if(newValue !== oldValue) {
				$scope.countdownShow	= true;
				$scope.countdown		= angular.copy($rootScope.timeout);
				$timeout.cancel(timer);
				$timeout(serviceToggle.toggleoverlay, $rootScope.timeout * 1000);
			}
		});
		
		$rootScope.countdownCancel = function() {
			$scope.countdownShow = false;
			$timeout.cancel(timer);
		}
		
	} else {
		$scope.xdData.width			= '0';
		$scope.xdData.height		= '0';
		$scope.xdData.idTriggered	= 'originAd-'+$scope.origin_ad.OriginAd.id+'-overlay';
	}
	
	OriginAdService.xd($scope.xdData, $scope.originParams.xdSource);
	
	$rootScope.xdDataToggle = {
		callback: 	'toggleoverlay',
		action:		'continue',
		idInitial:	'originAd-'+$scope.origin_ad.OriginAd.id,
		idTriggered:'originAd-'+$scope.origin_ad.OriginAd.id+'-overlay',
		type:		'postmeridian'
	};
	
	$scope.close = function() {
		serviceToggle.toggleoverlay();
	}
*/
}