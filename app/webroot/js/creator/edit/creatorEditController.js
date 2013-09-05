var creatorEditController = function($scope, $rootScope, $filter, Rest, Notification) {

	/**
	* Private Methods
	*/
	//Avgrund methods
	function _avgrundOpen(selector) {
		Avgrund.show(selector);
	}
	
	function _avgrundClose(selector) {
		Avgrund.hide(selector);
	}
	
	//Finds the component object form the alias
	function _findComponent(model) {
		for(var i in $scope.components) {
			if($scope.components[i].alias === model.type) {
				return $scope.components[i];
			}
		}
		return false;
	}
	
	//Refreshes the assets library
	function _updateAssets() {
		Rest.get('library/'+$scope.originAd.id).then(function(response) {
			$scope.assets	= response.files;
		});
	}
	
	//Refreshes layers
	function _updateLayers() {
		$scope.layers 			= angular.copy($filter('orderBy')($scope.originAdSchedule[$scope.ui.schedule]['OriginAd'+$scope.ui.platform+$scope.ui.state+'Content'], '-order'));
		//Appends image data to layers
		angular.forEach($scope.layers, function(value, key) {
			value.img_icon	= _findComponent(value).config.img_icon;
		});
	}
	
	//Refresh workspace data
	function _updateWorkspace(data) {
		$scope.originAd				= data.OriginAd;
		$scope.originAdSchedule		= data.OriginAdSchedule;
		_updateLayers();
	}

	/**
	* Initialization
	*/
	$scope.init = function() {
		$rootScope.editor = {
			content: {},
			config: {}	
		};
		
		$scope.ui = {
			auto:		false,
			platform:	'Desktop',
			schedule:	0,
			state:		'Initial',
			stateSwitch:true
		};
		
		$scope.components		= angular.fromJson(components);
		
		_updateWorkspace(angular.fromJson(origin_ad));
		_updateAssets();	
	}
	
	/**
	* Modal methods
	*/
	//Close modal
	$scope.modalClose = function(modal) {
		$scope[modal]	= false;
	}
	
	//Open modal & initialize
	$scope.modalOpen = function(modal, model) {
		switch(modal) {
			case 'component-add':
				$rootScope.editor.type 	= model.alias;
				$rootScope.editor.config = {
					left:	'0px',
					top:	'0px',
					width:	'50px',
					height:	'50px'
				};
				$scope.modal = {
					id:			'componentModal',
					callback: {
						close:	'modalComponent',
						submit:	'component-add'
					},
					class:		'modal-'+model.alias,
					config:		true,
					content:	'/administrator/get/components/'+model.alias,
					modal:		'modalComponent',
					remove:		false,
					submit:		'Create',
					title:		'Add New '+model.name,
					thumbnail:	model.config.img_icon
				};
				break;
			case 'component-load':
				$rootScope.editor = model;
				//Match model against list of components and override
				var model = _findComponent(model);
				$scope.modal = {
					id:			'componentModal',
					callback: {
						close:	'modalComponent',
						remove:	'component-remove',
						submit:	'component-update'	
					},
					class:		'modal-'+model.alias,
					config:		true,
					content:	'/administrator/get/components/'+model.alias,
					modal:		'modalComponent',
					remove:		true,
					submit:		'Update',
					title:		model.name+' Editor',
					thumbnail:	model.config.img_icon
				};
				break;
		}
		
		$scope[$scope.modal.modal] = true;
	}
	
	//Modal config options
	$scope.modalOption = {
		backdropClick: 	false,
		backdropFade:	true
	}
	
	//Submit modal data
	$scope.modalSubmit = function(modal) {
		var post  = angular.copy($scope.editor),
			message;
			
			post.data 			= $scope.originAdSchedule;
			post.model			= $scope.ui.platform + $scope.ui.state;
			post.originAd_id	= $scope.originAd.id;
		switch(modal) {
			case 'component-add':
				message 					= 'Content added';
				post.origin_ad_schedule_id 	= $scope.originAdSchedule[$scope.ui.schedule].id;
				post.route					= 'creatorContentSave';
				break;
			case 'component-remove':
				var ask = confirm('Do you want to remove this component?');
				if(ask) {					
					message 	= 'Content removed';
					post.route	= 'creatorContentRemove';
				}
				break;
			case 'component-update':
				break;
		}
		
		Rest.post(post).then(function(response) {
			Notification.alert(message);
			$scope.modalClose('modalComponent');
			_updateWorkspace(response);
		});
	}
	
	/**
	* Properties
	*/
	$scope.avgrundOpen = function(type) {
		var selector;
		$scope.originAdProperties = $scope.avgrund = '';
		switch(type) {
			case 'properties':
				$scope.originAdProperties = angular.copy($scope.originAd);
				$scope.avgrund = {
					header: 'Properties',
					name:	'properties'
				}
				break;
			case 'scripts':
				$scope.originAdScripts = '';
				$scope.avgrund = {
					header:	'Scripts',
					name:	'scripts'	
				}
				break;
		}
		
		if(angular.element('html').hasClass('avgrund-active')) _avgrundClose('.avgrund-popup');
		
		_avgrundOpen('.avgrund-popup');
	}
	
	//Button event
	$scope.avgrundCancel = function() {
		_avgrundClose('.avgrund-popup');
	}
	
	//Save data
	$scope.avgrundSubmit = function(type) {
		var post, message;
		
		switch(type) {
			case 'properties':
				post 		= angular.copy($scope.originAdProperties);
				post.route	= 'creatorSettingsUpdate';
				message		= 'Properties updated';
				break;
			case 'scripts':
				post 		= angular.copy($scope.originAdScripts);
				post.route	= 'cssUpdate';
				message		= 'Scripts updated';
				break;
		}
		Rest.post(post).then(function(response) {
			Notification.alert(message);
			_avgrundClose('.avgrund-popup');
			_updateWorkspace(response);
		})
	}
	
	/**
	* Workspace methods
	*/
	//Clears focus
	$scope.workspaceClear = function(id) {
		angular.element('#content-'+id).removeAttr('tabindex').blur();
	}
	
	//Triggers hover effect over workspace item
	$scope.workspaceFocus = function(id) {
		angular.element('#content-'+id).attr('tabindex', -1).focus();
	}
	
		
	/**
	* UI methods
	*/
	//Switches platform view
	$scope.uiPlatform = function(model) {
		$scope.ui.platform = model;
		_updateLayers();
	}
	
	//Switches state view
	$scope.uiState = function() {
		$scope.ui.state	= ($scope.ui.stateSwitch)? 'Triggered': 'Initial';
		_updateLayers();
	}
};