var demoCreatorController = function($scope, $rootScope, Rest, DemoServices) {	
		
	/**
	* Template selection
	*/
	$rootScope.demoTemplate = function() {
		DemoServices.template();
	}
	
	/**
	* Placement selection
	*/
	$scope.demoPlacement = function() {
		DemoServices.placement();
	}
	
	/**
	* Scan for new ad placements
	*/
	$scope.demoAdTags = function() {
		DemoServices.scan();
	}
	
	/**
	* Change reskin color when a custom one is available
	*/
	$scope.$watch('demo.reskin_color', function() {
		DemoServices.reskinColor($scope.demo.reskin_color);
	});
	
	/**
	* Saves and creates the demo page for public viewing
	*/
	$scope.demoSave = function() {
		var post = {
			route: 			'demoSave',
			origin_ad_id:	$rootScope.origin_ad.id,
			name:			$scope.demo.name,
			config: {
				placement:		$scope.demo.placement,
				reskin_color:	$scope.demo.reskin_color,
				reskin_img:		$scope.demo.reskin_img,
				templateAlias:	$scope.demo.templateAlias
			},
			render:			$rootScope.render,
			status:			($scope.demo.status === 'true')? 1: 0
		}
		
		Rest.post(post).then(function(response) {
			
		});
		
/*
		Rest.post($scope.demo).then(function(response) {
			if(!$scope.demo.id) {
				$scope.link 	= 'http://'+document.domain+'/demo/'+response;
				window.open('http://'+document.domain+'/demo/'+response, '_blank');
				
				Email.demo({
					id:		$rootScope.origin_ad.OriginAd.id,
					link: 	$scope.link,
					name:	$rootScope.origin_ad.OriginAd.name
				});
				
			}
		});
*/
	}
};