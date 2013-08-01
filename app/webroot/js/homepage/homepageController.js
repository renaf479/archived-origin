var homepageController = function($scope, $rootScope, $filter, Rest) {
	$scope.products		= {};
	$scope.product 		= {};
	$scope.platforms	= [{name: 'Desktop'}, {name: 'Tablet'}, {name: 'Mobile'}];
	$scope.platformShow	= 'Desktop';
	
	Rest.get('homepage', 'public').then(function(response) {
		$scope.products		= response;
		$scope.product		= $scope.products[0];
	});
	
	
	$scope.loadProduct = function(model) {
		$scope.product 		= model;
	}
	
/*
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
*/
};