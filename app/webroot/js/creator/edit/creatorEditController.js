var creatorEditController = function($scope, $rootScope, $filter, $timeout, $modal, Rest, Notification) {
	var editor = {
			config: {},
			content:{}
		};
	//Auto save timer set for 3 minutes
	var saveTimer	= 3 * 60 * 1000,
		autoSaveTimer;
		
	/**
	* Private Methods
	*/
	//Auto save timer
	var _autoSave = function(status) {
		if(status === 'cancel') {
			$timeout.cancel(autoSaveTimer);
		} else {
			_autoSave('cancel');//Reset timer
			
			autoSaveTimer = $timeout(function test(){
				$scope.uiSave('auto');
				autoSaveTimer = $timeout(_autoSave, saveTimer);
			}, saveTimer);
		}
	}	
	
	//Avgrund methods
	function _avgrundOpen(selector) {
		_autoSave('cancel');
		Avgrund.show(selector);
	}
	
	function _avgrundClose(selector) {
		_autoSave();
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
	$scope._updateAssets = function() {
		Rest.get('library/'+$scope.originAd.id).then(function(response) {
			$rootScope.assets	= response.files;
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
		_updateLayers();
	}	
	
	//Refresh workspace data
	function _updateWorkspace(data) {
		$scope.originAd				= data.OriginAd;
		$scope.originAdSchedule		= data.OriginAdSchedule;
		_updateSchedule();
		_updateLayers();
		_autoSave(); //Begin auto-save timer
	}

	//Initialization
	$scope.init = function() {
		$scope.ui = {
			auto:		'default',
			panel:		false,
			platform:	'Desktop',
			reset:		true,
			schedule:	'',
			scheduleId:	'',
			state:		'Initial',
			stateSwitch:true
		};
		
		$scope.components		= angular.fromJson(components);
		
		_updateWorkspace(angular.fromJson(origin_ad));
		$scope._updateAssets();	
	}

		/**
	* Modal Methods
	*/
	//Modal open
/*
	$scope.modalOpen = function(type, model) {
		switch(type) {
			case 'component':
				$scope.modal = {
					button: {
						cancel: 'Cancel',
						submit: 'Add'	
					},
					class: 		'component',
					content: 	'/administrator/get/components/'+model.alias,
					header:		'Add New Component',
					id:			'component',
					template: 	'/administrator/get/element/creator/componentModal',
					type:		'component'
				}
				
				$rootScope.editor 		= angular.copy(editor);
				$rootScope.editor.type 	= model.alias;
				$rootScope.editor.config = {
					left:	'0px',
					top:	'0px',
					width:	'50px',
					height:	'50px'
				}
				break;
		}
	
		var options = {
			templateUrl: 	'modal',
			//template: 		'test,
			controller:		'modalController',
			resolve: {
				modal: function() {
					return $scope.modal;
				}
			},
			windowClass:	$scope.modal.class,
		};
		var modalInstance = $modal.open(options);
	}
*/

	
	
	
	
	
/*
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
		}
		Rest.post(post).then(function(response) {
			Notification.alert(message);
			$scope.modalClose('modalComponent');
			_updateWorkspace(response);
		});
	}
	
*/
	/**
	* Avgrund Modal
	*/
	//Open
	$scope.avgrundOpen = function(type, model) {
		var selector;
		$rootScope.originAdProperties 	= ''; 
		$scope.originAdScripts 		= '';
		$scope.avgrund 				= '';
		
		switch(type) {
			case 'component':
				$scope.ui.panel 		= 'layers';
				$rootScope.editor 		= angular.copy(model);
				$rootScope.editor.type	= model.alias;
				
				//Match model against list of components and override
				var model = _findComponent(model);
				$scope.avgrund = {
					header: model.name+' Editor',
					content:	'/administrator/get/components/'+model.alias,
					id:			'component',
					name:		'component',
					remove: 	true,
					thumbnail: 	model.config.img_icon,
					ui: {
						cancel: 'Close',
						submit: 'Update'
					}
				}
				break;
			case 'component-new':
				$rootScope.editor 		= angular.copy(editor);
				$rootScope.editor.type	= model.alias;
				$rootScope.editor.config = {
					left:	'0px',
					top:	'0px',
					width:	'50px',
					height:	'50px'
				}
				
				$scope.avgrund = {
					header: 	model.name+' Creator',
					content: 	'/administrator/get/components/'+model.alias,
					id:			'component',
					name:		'component-new',
					remove: 	false,
					thumbnail: 	model.config.img_icon,
					ui: {
						cancel: 'Cancel',
						submit: 'Create'
					}
				}
				break;
			case 'embed':
				$scope.avgrund = {
					header: 'Embed Code',
					id:		'embed',
					name:	'embed',
					ui: {
						cancel: 'Close',
						submit: 'E-mail'
					}
				}
				break;
			case 'properties':
				$rootScope.originAdProperties = angular.copy($scope.originAd);
				$scope.avgrund = {
					header: 'Properties',
					id:		'properties',
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
					id:		'schedule',
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
					id:		'scripts',
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
	
	//Remove component
	$scope.avgrundRemove = function(type) {
		console.log($scope.editor);	
	}
	
	//Save data
	$scope.avgrundSubmit = function(type) {
		var post, message;
		switch(type) {
			case 'component':
			case 'component-new':
				message 			= (type === 'component')? 'Content updated': 'Content added';
				post  				= angular.copy($scope.editor),
				post.data 			= $scope.originAdSchedule;
				post.model			= $scope.ui.platform + $scope.ui.state;
				post.originAd_id	= $scope.originAd.id;
				post.origin_ad_schedule_id 	= $scope.originAdSchedule[$scope.ui.schedule].id;
				post.route					= 'creatorContentSave';
				break;
			case 'component-remove':
				if(confirm('Do you want to remove this component')) {
					post = {
						id:		$scope.editor.id,
						model:	$scope.ui.platform + $scope.ui.state,
						originAd_id: $scope.originAd.id,
						route:	'creatorContentRemove'	
					}
					message 	= 'Content removed';
				}
				break;
			case 'properties':
				post 		= angular.copy($rootScope.originAdProperties);
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
	
	//Saves all changes (resizes, moving) done in workspace
	$scope.uiSave = function(auto) {
		var post = {
			data:			$scope.originAdSchedule,
			originAd_id:	$scope.originAd.id,
			route:			'creatorWorkspaceUpdate'
		}
		
		Rest.post(post).then(function(response) {
			var message = (auto)? 'Progress auto saved': 'Workspace saved';
			Notification.display(message);
			_updateWorkspace(response);
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


platformApp.filter('filterSchedule', function($filter) {
  return function(date) {
  	var display;
  	if(!date.start_date && !date.end_date) {
	  	display	= 'Default State';
  	} else {
  		var start 		= date.start_date.split(/[- :]/),
  			end			= date.end_date.split(/[- :]/),
  			dateStart	= new Date(start[0], start[1]-1, start[2], start[3], start[4], start[5]),
  			dateEnd		= new Date(end[0], end[1]-1, end[2], end[3], end[4], end[5]);
  			
	 	display = 'Start: ' + $filter('date')(dateStart, 'EEE - M/d/yyyy') + ' || Stop: ' + $filter('date')(dateEnd, 'EEE - M/d/yyyy'); 	
  	}
  	
  	return display;
  }
});
