var demoPublicController = function($scope, $rootScope, $compile) {

	$scope.demoAdTags = function() {
		var adTags	= angular.element(document.body).find('adTag');
		
		for(var i = 0; i < adTags.length; i++) {
			$rootScope.placements[i] = {
				id: 	angular.element(adTags[i]).attr('id'),
				name:	angular.element(adTags[i]).data('name')
			};
		}
		
		//FIND A BETTER WAY
		
		var originEmbed	= decodeURIComponent(origin_embed.replace(/\+/g, ' '));
			originEmbed = originEmbed.replace(/{{embedOptions.id}}/g, $rootScope.embedOptions.id);
			originEmbed = originEmbed.replace(/{{embedOptions.auto}}/g, $rootScope.embedOptions.auto);
			originEmbed = originEmbed.replace(/{{embedOptions.close}}/g, $rootScope.embedOptions.close);
			originEmbed = originEmbed.replace(/{{embedOptions.hover}}/g, $rootScope.embedOptions.hover);
			originEmbed = originEmbed.replace(/{{embedOptions.hex}}/g, $rootScope.embedOptions.hex);
			originEmbed = originEmbed.replace(/{{embedOptions.dcopt}}/g, $rootScope.embedOptions.dcopt);
			originEmbed = originEmbed.replace(/{{embedOptions.type}}/g, $rootScope.embedOptions.type);

		
		$rootScope[$rootScope.demo.OriginDemo.config.placement]	= originEmbed;
		//$rootScope[$rootScope.demo.OriginDemo.config.placement]	= $compile(decodeURIComponent(origin_embed.replace(/\+/g, ' ')))($rootScope);

	}
}