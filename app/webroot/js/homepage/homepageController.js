var homepageController = function($scope, $filter, $timeout, Rest) {
	$scope.products		= {};
	$scope.platforms	= [{name: 'Desktop'}, {name: 'Tablet'}, {name: 'Mobile'}];
	$scope.platformShow	= 'Desktop';
	
	Rest.get('templates', 'public').then(function(response) {
		$scope.products		= response;
	});
	
	
	
	$scope.productExpand = function(state, product, $event) {
		//$rootScope.productShow	= scope.product.OriginTemplate.id;
		switch(state) {
			case 'close':
				$scope.productShow = '';
				break;
			case 'open':
				$scope.productShow	= product.OriginTemplate.id;
				break;
		}
	}
};