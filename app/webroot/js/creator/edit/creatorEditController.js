var creatorEditController = function($scope, $filter, Rest, Notification) {
	$scope.originAd				= {};
	$scope.originAdSchedule		= {};
	
	$scope.components			= {};
	
	$scope.ui = {
		auto:		false,
		platform:	'Desktop',
		schedule:	0,
		state:		'Initial'
	}

	/**
	* Initialization
	*/
	$scope.init = function() {
		$scope.originAd			= angular.fromJson(origin_ad).OriginAd;
		$scope.originAdSchedule	= angular.fromJson(origin_ad).OriginAdSchedule;
	
/*
		Rest.get('ad/'+originAd_id).then(function(response) {
			$scope.originAd			= response.OriginAd;
			$scope.originAdSchedule	= response.OriginAdSchedule;
		});
*/
	
		Rest.get('componentsraw').then(function(response) {
			$scope.components		= response;
		});
		/*
		
		Rest.get('components').then(function(response) {
		$scope.workspace.components		= response;
		$scope.workspace.componentsRaw	= $scope.workspace.components['raw'];
		delete $scope.workspace.components['raw'];
		
		$scope.updateLibrary();
		
		Rest.get('ad/'+originAd_id).then(function(response) {
			template_id					= response.OriginAd.config.type_id;//IS THIS USED?
			$scope.workspace.ad			= response;
			$scope.scripts.content 		= (response.OriginAd.content_css)? response.OriginAd.content_css: '<style type="text/css">\n</style>';
			
			
			$scope.$watch('ui.view', function() {
				$scope.updateUI();
			});	
			
			$scope.$watch('ui.platform', function() {
				$scope.updateUI();
			});
			
			Rest.get('templates').then(function(response) {
				$scope.templates		= response;
			});
		});
	});
		*/
		
		
	}
};