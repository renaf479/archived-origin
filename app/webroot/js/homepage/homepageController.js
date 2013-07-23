var homepageController = function($scope, $rootScope, $filter, $timeout, Rest) {
	$scope.products		= {};
	$scope.platforms	= [{name: 'Desktop'}, {name: 'Tablet'}, {name: 'Mobile'}];
	$scope.platformShow	= 'Desktop';
	$scope.stateShow	= 'Initial';
	
	$scope.row 			= 0;
	
	Rest.get('homepage', 'public').then(function(response) {
		$scope.products		= response;
	});
	
	$scope.state = function(state) {
		$scope.stateShow	= state;
	}
	
	$scope.productExpand = function(state, product, $index) {
		$scope.stateShow	= 'Initial';
		switch(state) {
			case 'close':
				$rootScope.productShow = '';
				break;
			case 'open':
				//$scope.productShow	= product.OriginTemplate.id;
				break;
		}
	}
};