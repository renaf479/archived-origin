var homepageController = function($scope, $rootScope, $location, Rest) {
	$scope.products		= {};
	$scope.product 		= {};
	$scope.platforms	= [{name: 'Desktop'}, {name: 'Tablet'}, {name: 'Mobile'}];
	$scope.platformShow	= 'Desktop';
	$scope.preview 		= 'Initial';
	
	Rest.get('homepage', 'public').then(function(response) {
		$scope.products		= response;
		
		//If URL hash, try to load that object
		if($location.hash()) {
			var id 	= $location.hash().split('--');
				id	= id[0];
			
			for(var i in $scope.products) {
				if($scope.products[i].OriginTemplate.id === id) {
					$scope.loadProduct($scope.products[i]);
				}
			}
		}
	});
	
	
	$scope.loadProduct = function(model) {
		$scope.product 		= model;
		$scope.selected 	= model.OriginTemplate.id;
		
		$location.hash(model.OriginTemplate.id+'--'+model.OriginTemplate.name.replace(/[^a-zA-Z0-9]+/g,'-'));
	}
	
	$scope.previewToggle = function() {
		switch($scope.preview) {
			case 'Initial':
				$scope.preview 	= 'Triggered';
				break;
			case 'Triggered':
				$scope.preview 	= 'Initial';
				break;
		}
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