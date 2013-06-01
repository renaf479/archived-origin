var demoPublicController = function($scope, $rootScope, $compile) {

	$scope.demoAdTags = function() {
		var adTags	= angular.element(document.body).find('adTag');
		
		for(var i = 0; i < adTags.length; i++) {
			$rootScope.placements[i] = {
				id: 	angular.element(adTags[i]).attr('id'),
				name:	angular.element(adTags[i]).data('name')
			};
		}
		
		//$rootScope['embedLeaderboard']	= '<scri'+'pt>console.log("test");</scri'+'pt>';
		$rootScope[$rootScope.demo.OriginDemo.config.placement]	= $compile(decodeURIComponent(origin_embed.replace(/\+/g, ' ')))($rootScope);
	}
}