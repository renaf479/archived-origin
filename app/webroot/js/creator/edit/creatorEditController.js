var creatorEditController = function($scope, $rootScope, $filter, Rest, Notification) {
	var editor = {
			config: {},
			content:{}
		};
		
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
	
	//Finds the proper schedule ID based on parameters
	function _updateSchedule() {
		angular.forEach($scope.originAdSchedule, function(value, key) {
			//Condition for first run
			//if((!$scope.ui.scheduleId && !$scope.ui.schedule) 
			if($scope.ui.reset && ($scope.ui.auto === value.type && value.start_date === null)) {
				$scope.ui.scheduleId	= value.id;
				$scope.ui.schedule		= key;
				$scope.ui.reset 		= false;
			} else if($scope.ui.auto === value.type && $scope.ui.scheduleId === value.id) {
				$scope.ui.scheduleId	= value.id;
				$scope.ui.schedule		= key;
			}
		});
	}	
	
	//Refresh workspace data
	function _updateWorkspace(data) {
		$scope.originAd				= data.OriginAd;
		$scope.originAdSchedule		= data.OriginAdSchedule;
		_updateSchedule();
		_updateLayers();
	}

	//Initialization
	$scope.init = function() {
		$scope.ui = {
			auto:		'default',
			platform:	'Desktop',
			reset:		true,
			schedule:	'',
			scheduleId:	'',
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
		//Clear component's controller
		componentCtrl = function(){return false};
	}
	
	//Open modal & initialize
	$scope.modalOpen = function(modal, model) {
		//Resets editor model
		$rootScope.editor = angular.copy(editor);
		
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
/*
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
*/
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
/*
			case 'component-update':
				message 					= 'Content updated';
				post.origin_ad_schedule_id 	= $scope.originAdSchedule[$scope.ui.schedule].id;
				post.route					= 'creatorContentSave';
				break;
*/
		}
		Rest.post(post).then(function(response) {
			Notification.alert(message);
			$scope.modalClose('modalComponent');
			_updateWorkspace(response);
		});
	}
	
	/**
	* Avgrund Modal
	*/
	//Open
	$scope.avgrundOpen = function(type, model) {
		var selector;
		$scope.originAdProperties 	= ''; 
		$scope.originAdScripts 		= '';
		$scope.avgrund 				= '';
		
		switch(type) {
			case 'component':
				$rootScope.editor = model;
				//Match model against list of components and override
				var model = _findComponent(model);
				$scope.avgrund = {
					header: model.name+' Editor',
					name:	'component',
					ui: {
						cancel: 'Close',
						submit: 'Update'
					}
				};
				
				$scope.modal = {
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
				}
				break;
			case 'embed':
				$scope.avgrund = {
					header: 'Embed Code',
					name:	'embed',
					ui: {
						cancel: 'Close',
						submit: 'E-mail'
					}
				}
				break;
			case 'properties':
				$scope.originAdProperties = angular.copy($scope.originAd);
				$scope.avgrund = {
					header: 'Properties',
					name:	'properties',
					ui: {
						cancel: 'Cancel',
						submit: 'Save'
					}
				}
				break;
			case 'schedule':
				$scope.avgrund = {
					header: 'Schedule',
					name:	'schedule',
					ui: {
						cancel: 'Cancel',
						submit: 'Save'	
					}
				}
				break;
			case 'scripts':
				$scope.originAdScripts = angular.copy($scope.originAd);
				$scope.avgrund = {
					header:	'Scripts',
					name:	'scripts',
					codeMirror:	true,
					ui: {
						cancel: 'Cancel',
						submit: 'Save'
					}
				}
				break;
		}
		
		if(angular.element('html').hasClass('avgrund-active')) _avgrundClose('.avgrund-popup');
		
		_avgrundOpen('.avgrund-popup');
	}
	
	//Button event
	$scope.avgrundCancel = function() {
		$scope.avgrund = '';
		_avgrundClose('.avgrund-popup');
	}
	
	//Save data
	$scope.avgrundSubmit = function(type) {
		var post, message;
		switch(type) {
			case 'component':
				post  				= angular.copy($scope.editor),
				post.data 			= $scope.originAdSchedule;
				post.model			= $scope.ui.platform + $scope.ui.state;
				post.originAd_id	= $scope.originAd.id;
				message 					= 'Content updated';
				post.origin_ad_schedule_id 	= $scope.originAdSchedule[$scope.ui.schedule].id;
				post.route					= 'creatorContentSave';
				break;
			case 'properties':
				post 		= angular.copy($scope.originAdProperties);
				post.route	= 'creatorSettingsUpdate';
				message		= 'Properties updated';
				break;
			case 'scripts':
				post		= angular.copy($scope.originAdScripts);
				post.route	= 'cssUpdate';
				message		= 'Scripts updated';
				break;
		}
		
		Rest.post(post).then(function(response) {
			Notification.alert(message);
			_avgrundClose('.avgrund-popup');
			_updateWorkspace(response);
		});
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
	$scope.$watch('ui.scheduleId', function(newVal, oldVal) {
		if(newVal) {
			_updateSchedule();
		}
	})
	
	//Auto view
	$scope.$watch('ui.auto', function(newVal) {
		$scope.ui.reset = true;
		_updateSchedule();
	})
	
	//Save and Exit
	$scope.uiExit = function() {
		var post = {};
			post.data			= $scope.originAdSchedule;
			post.originAd_id	= $scope.originAd.id;
			post.route			= 'creatorWorkspaceUpdate';
		
		Rest.post(post).then(function() {
			window.location = '/administrator/';
		});
	}
	
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