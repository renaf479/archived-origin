var antemeridianController = function($scope, $rootScope, $timeout, OriginAdService, serviceFrequency, serviceTimer, serviceToggle) {
	
	$scope.xdData.width		= '100%';
	$scope.xdData.height	= '100%';
	$scope.countdownShow	= true;
	$scope.countdown		= angular.copy($rootScope.timeout);
	var timer 				= $timeout(serviceToggle.toggleOverlay, $rootScope.timeout * 1000);
	
	$rootScope.$watch('timeout', function(newValue, oldValue) {
		if(newValue !== oldValue) {
			$scope.countdownShow	= true;
			$scope.countdown		= angular.copy($rootScope.timeout);
			$timeout.cancel(timer);
			$timeout(serviceToggle.toggleOverlay, $rootScope.timeout * 1000);
		}
	});
	
/*
	$rootScope.countdownCancel = function() {
		$scope.countdownShow = false;
		$timeout.cancel(timer);
	}
*/

	OriginAdService.analyticsLog('Load');
	OriginAdService.xd($scope.xdData, $scope.originParams.xdSource);
	
	$rootScope.xdDataToggle = {
		callback:	'toggleOverlay',
		action:		'close',
		idInitial:	'originAd-'+$scope.origin_ad.OriginAd.id,
		idTriggered:'originAd-'+$scope.origin_ad.OriginAd.id,
		type:		'antemeridian'
	};
	
	$scope.close = function() {
		serviceToggle.toggleOverlay();
	}
	
	//serviceFrequency.init();
	//serviceTimer.init();
}