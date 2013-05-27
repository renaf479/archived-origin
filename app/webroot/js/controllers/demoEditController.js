var demoController = function($scope, $rootScope, $compile, Origin) {	
	
	
		

	$scope.demoPlacement = function() {
		//Reset
		for(var i = 0; i < $scope.placements.length; i++) {
			$scope[$scope.placements[i].id]	= '';
		}
		
		//Issue when re-selecting 1st entry
		angular.element(document.getElementById('originAd-'+$scope.origin_ad.OriginAd.id)).remove();
		$scope[$scope.demo.placement]	= $compile(decodeURIComponent(origin_embed.replace(/\+/g, ' ')))($scope);
	}
	

	/**
	* Loads the site demo templates
	*/
/*
	$scope.demoInit = function() {		
		Origin.get('sites').then(function(response) {
			$scope.templates = response;
			$scope.demoTemplate();
		});
		
		$j('#demo-panel').draggable({
			containment:'window',
			handle: 	'#demoPanel-header'
		});	
	}
*/
	
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
		angular.element(document.getElementById('originAd-'+$scope.origin_ad.OriginAd.id)).remove();
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
		$scope.demo.origin_ad_id	= $scope.origin_ad.OriginAd.id;

		$scope.demo.config = {
			embedOptions:	$scope.embedOptions,
			placement:		$scope.demo.placement,
			reskin_color:	$scope.demo.reskin_color,
			reskin_img:		$scope.demo.reskin_img,
			templateAlias:	$scope.demo.templateAlias,
			type:			$scope.origin_ad.OriginAd.config.template
		};
		
		Origin.post($scope.demo).then(function(response) {
			$scope.link 	= 'http://'+document.domain+'/demo/'+response;
			//window.open('http://'+document.domain+'/demo/'+response,'_blank');
		});
	}
};