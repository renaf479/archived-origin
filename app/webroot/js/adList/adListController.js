var adListController = function($scope, $rootScope, $filter, Notification, Rest, AdListServices, Modal) {
	$scope.expandShow 		= 'details';
	$scope.editor 			= {};
	$scope.editor.advance 	= false;


	Rest.get('templates').then(function(response) {
		$scope.templates = response;
		Rest.get('ads').then(function(response) {
			$scope.ads	= response.origin_ads;
		});
	});
	
	//Load dimensions for advanced create settings
	$scope.templateLoad = function() {
		$scope.editor.config= $scope.editor.template.OriginTemplate.config;
	}
	
	//Open embed code modal
	$scope.adEmbedOpen = function(ad) {
		$scope.adEmbedParams	= {
			id: 	ad.id,
			type: 	ad.type
		}
		Modal.open('modalEmbed');
	}
	
	//Close embed code modal
	$scope.adEmbedClose = function() {
		Modal.close('modalEmbed');
	}
	
	//Email embed code
	$scope.adEmbedEmail = function() {
		//HOW WILL THIS WORK INSIDE AN IFRAME???
	}
	
	
	//Open ad creator modal
	$scope.adCreateOpen = function() {
		$scope.editor.content 		= {};
		$scope.editor.content.ga_id = 'UA-12310597-73';
		$scope.editor.content.img_thumbnail='';
		$scope.editor.content.hex 	= '#000000';
		$scope.editor.statusSwitch	= true;
		//$scope.editor.template 		= $scope.templates[0];
		$scope.editor.type			= 'create';
		Modal.open('modalCreate');
	}
	
	//Close ad creator modal
	$scope.adCreateClose = function() {
		Modal.close('modalCreate');
	}

	//Submit and create ad
	$scope.adCreateSave = function() {
		$scope.editor.route				= 'adCreate';
		$scope.editor.status			= ($scope.editor.status)? 1: 0;
		//$scope.editor.content.ga_id		= $scope.editor.ga_id;
		$scope.editor.type 				= $scope.editor.template.OriginTemplate.alias;
		$scope.editor.type_id			= parseInt($scope.editor.template.OriginTemplate.id);
		$scope.editor.config			= $scope.editor.template.OriginTemplate.config;
		$scope.editor.config.template	= $scope.editor.template.OriginTemplate.alias;
		
		delete $scope.editor.advance;
		delete $scope.editor.ga_id;
		delete $scope.editor.header;
		delete $scope.editor.statusSwitch;
		delete $scope.editor.template;
		//delete $scope.editor.type;
		
		Modal.close('modalCreate');
		
		Rest.post($scope.editor).then(function(response) {
			window.location		= '/administrator/Origin/ad/edit/'+response;
		});
	}
	
	//Create ad advance toggle
	$scope.templateToggle = function() {
		switch($scope.editor.advance) {
			case false:
				$scope.editor.advance = true;
				break;
			case true:
				$scope.editor.advance = false;
				break;
		}
	}
	
	//Close expanded state
	$scope.adClose = function(ad) {
		AdListServices.close(ad);
	}
	
	//Open ad details
	$scope.adExpand = function(ad) {
		//if same element, close
		if($scope.adShow === ad.id) {
			AdListServices.close(ad);
		} else {
			AdListServices.expand(ad);
		}
	}
	
}