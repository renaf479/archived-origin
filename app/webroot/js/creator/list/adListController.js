var adListController = function($scope, $rootScope, $filter, $modal, Notification, Rest, AdListServices, Modal) {
	$scope.expandShow 		= 'details';
	$scope.editor 			= {};
	$scope.editor.advance 	= false;
	
	//Init
	$scope.init = function() {
		Rest.get('templates').then(function(response) {
			$scope.templates = response;
			Rest.get('ads').then(function(response) {
				$scope.ads	= response.origin_ads;
			});
		});	
	}
	
	/**
	* Modal Methods
	*/
	//Modal open
	$scope.modal = function(type) {
		switch(type) {
			case 'create':
				$scope.modalScope = {
					button: {
						cancel: 'Cancel',
						submit: 'Create'	
					},
					class:		(originAdmin)? 'modalCreateExpand':'modalCreate',
					header: 	'Create New Ad',
					id:			'properties',
					template: 	'/administrator/get/element/creator/properties',
					type:		'create'
				}
				break;
			case 'demo':
				$scope.modalScope = {
					button: {
						cancel: 'Close',
						submit: 'Create'
					},
					class: 		'modalDemo',
					header: 	'Demo Pages',
					id:			'demo',
					template:	'/administrator/get/element/creator/demo',
					type:		'demo'
				}
				break;
			case 'embed':
				$scope.modalScope = {
					button: {
						cancel: 'Close',
						submit: 'Email'
					},
					class:		'',
					header:		'Ad Embed Code',
					id:			'embed',
					template: 	'/administrator/get/element/creator/embed',
					type:		'embed'
				}
				break;
		}
	
		var options = {
			templateUrl: 	'modal',
			//template: 		'test,
			controller:		'modalController',
			resolve: {
				modalScope: function() {
					return $scope.modalScope;
				}
			},
			windowClass:	$scope.modalScope.class,
		};
		var modalInstance = $modal.open(options);
	}

	
	
	
	
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
}

var modalController = function($scope, $rootScope, $modalInstance, modalScope, Rest) {
	$scope.modalScope = modalScope;
	
	//Modal close
	$scope.cancel = function() {
		switch(modalScope.type) {
			case 'create':
				delete $rootScope.originAdProperties;
				break;
		}
		$modalInstance.dismiss('cancel');
	}
	
	//Modal submit
	$scope.submit = function() {
		var post;
		switch(modalScope.type) {
			case 'create':
				post		= $rootScope.originAdProperties;
				post.route 	= 'creatorAdCreate';
				
				Rest.post(post).then(function(response) {
					window.location = '/administrator/Origin/ad/edit/'+response;
				});
				break;
			case 'demo':
				window.open('/administrator/demo/create/'+$rootScope.originAd.id);
				break;
			case 'embed':
				break;
		}
	}
}