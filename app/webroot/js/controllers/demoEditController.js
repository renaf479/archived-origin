var demoController = function($scope, $rootScope, $compile, $timeout, Origin, Email) {	
	
	$scope.demoPlacement = function() {
		//Reset
		for(var i = 0; i < $scope.placements.length; i++) {
			$scope[$scope.placements[i].id]	= '';
		}
		
		angular.element(document.getElementById('originAd-'+$rootScope.origin_ad.id)).remove();
		
		//Issue when re-selecting 1st entry - RACE CONDITION?
		$timeout(function (){$scope[$scope.demo.placement]	= $rootScope.render}, 0);
	}
	
	/**
	* Change reskin color when a custom one is available
	*/
	$scope.$watch('demo.reskin_color', function() {
		$scope.reskin = {
			backgroundColor: $scope.demo.reskin_color
		}
	});
		
	/**
	* Load different demo templates
	*/
	$rootScope.demoTemplate = function() {
		//Clear any out-of-page ads
		angular.element(document.getElementById('originAd-'+$rootScope.origin_ad.id)).remove();
		$scope.demo.template	= '/administrator/get/templates/'+$scope.demo.templateAlias;
	}
	
	/**
	* Parses template for AdTag elements
	*/
	$scope.demoAdTags = function() {
		var adTags	= angular.element(document.body).find('adTag');
		
		for(var i = 0; i < adTags.length; i++) {
			$scope.placements[i] = {
				id: 	angular.element(adTags[i]).attr('id'),
				name:	angular.element(adTags[i]).data('name')
			};
		}
	}
	
	/**
	* Saves and creates the demo page for public viewing
	*/
	$scope.demoSave = function() {
		$scope.demo.route			= 'demoSave';
		$scope.demo.origin_ad_id	= $rootScope.origin_ad.id;

		$scope.demo.config = {
			embedOptions:	$scope.embedOptions,
			placement:		$scope.demo.placement,
			reskin_color:	$scope.demo.reskin_color,
			reskin_img:		$scope.demo.reskin_img,
			templateAlias:	$scope.demo.templateAlias,
			type:			$rootScope.origin_ad_template
		};
		
		Origin.post($scope.demo).then(function(response) {
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
	}
};