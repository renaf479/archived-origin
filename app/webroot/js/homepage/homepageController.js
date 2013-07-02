var homepageController = function($scope, $filter, $timeout, Rest) {
	$scope.products		= {};
	$scope.platforms	= [{name: 'Desktop'}, {name: 'Tablet'}, {name: 'Mobile'}];
	$scope.platformShow	= 'Desktop';
	$scope.stateShow	= 'Initial';
	
	$scope.row 			= 0;
	
	Rest.get('templates', 'public').then(function(response) {
		$scope.products		= response;
	});
	
	$scope.state = function(state) {
		$scope.stateShow	= state;
	}
	
	$scope.productExpand = function(state, product, $index) {
		$scope.stateShow	= 'Initial';
		switch(state) {
			case 'close':
				$scope.productShow = '';
				break;
			case 'open':
				//console.log($scope.row <= ($index/3));
				//console.log(($index/3) < ($scope.row + 1));
				//console.log($scope.row !== Math.floor($index/3));
				
				//console.log($scope.row === Math.floor($index/3));
				
				//Determine row
				if($scope.row === Math.floor($index/3)) {
					$scope.rowExpand 	= true;
				} else {
					$scope.rowExpand	= false;
					$scope.row 			= Math.floor($index/3);
				}
				
				
/*
				if(($scope.row <= ($index/3)) 
					&& (($index/3) < ($scope.row + 1))
					&& ($scope.row !== Math.floor($index/3))) {
					//Don't close
					$scope.rowExpand	= true;
					$scope.row 			= Math.floor($index/3);
				}
*/
				
				
			
				$scope.productShow	= product.OriginTemplate.id;
				break;
		}
	}
};