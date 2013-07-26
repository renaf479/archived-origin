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
	
	/**
	* Tile expansion
	*/	
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
	
	//Toggle showcase status
	$scope.adShowcase = function(ad) {
		$scope.post = {};
		$scope.post.route		= 'creatorAdShowcase';
		$scope.post.id 			= ad.id;
		$scope.post.showcase	= (ad.showcase === '1')? '0': '1';
		
		Rest.post($scope.post).then(function(response) {
			Notification.alert('Showcase updated');
			//Manual change to avoid flash
			ad.showcase	= $scope.post.showcase;
		});
	}
	
	//Removes an ad
	$scope.adRemove = function(ad) {
		$scope.post = {};
		
		var ask = confirm('Do you want to delete this ad unit?');
		if(ask){
			$scope.post.route			= 'creatorAdDelete';
			$scope.post.id 				= ad.id;
			
			Rest.post($scope.post).then(function(response) {
				Notification.alert('Ad removed');
				$scope.ads 		= response.origin_ads;
			});
		} else {
			return false;
		}
	}
	
	/**
	* Modal - Embed
	*/	
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
	
	/**
	* Modal - Demo
	*/
	//Open demo modal
	$scope.adDemoOpen = function(ad) {
		AdListServices.modalDemo(ad);
		Modal.open('modalDemo');
	}
	
	//Close demo modal
	$scope.adDemoClose = function() {
		Modal.close('modalDemo');
		$rootScope.demos = '';
	}
	
	//Removes a demo site
	$scope.adDemoRemove = function(demo) {
		$scope.post = {};
		
		var ask = confirm('Do you want to delete this demo page?');
		if(ask){
			$scope.post.route		= 'demoDelete';
			$scope.post.id 			= demo.OriginDemo.id;
			$scope.post.origin_ad_id= demo.OriginDemo.origin_ad_id
			
			Rest.post($scope.post).then(function(response) {
				Notification.alert('Demo page removed');
				$rootScope.demos 	= response;
			});
		} else {
			return false;
		}
	}
	
	
	/**
	* Modal - Create
	*/
	//Load dimensions for advanced create settings
	$scope.templateLoad = function() {
		$scope.editor.config= $scope.editor.template.OriginTemplate.config;
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
		$scope.editor = {
			advance: false
		};
	}

	//Submit and create ad
	$scope.adCreateSave = function() {
		$scope.editor.route				= 'creatorAdCreate';
		$scope.editor.status			= ($scope.editor.statusSwitch)? 1: 0;
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
}