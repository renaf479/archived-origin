var originAd_id		= $j('#originAd_id').val(),
	template_id;
	
	/**
	* Prevent accidental clicks leaving the editor
	*/
	$j('#origin-bar').find('a').not('#originBar-help, #originNotification-close').each(function() {
		$j(this).click(function() {
			var ask = confirm('Do you want to exit Origin\'s Ad Creator?');
			if(ask){
				window.location = $j(this).attr('href');
			} else {
				return false;
			}
		});
	});
	
/*
	//Prevent closing by accident..
	
	$j(window).on('beforeunload', function() {
		return 'Your own message goes here...';
	});
*/

/*
originApp.value('ui.config', {
    codemirror: {
        mode: 			'htmlmixed',
        lineNumbers: 	true,
        lineWrapping:	true,
        theme:			'night'
    }
});
*/

var creatorController = function($scope, $filter, Rest, Notification) {
	$scope.editor				= {};	//Editor model
	$scope.ad 					= {};
	$scope.ad.content 			= {};
	$scope.ad.content.image		= {};
	$scope.scripts 				= {};
    $scope.scriptsCMOptions 	= {
        mode: 			'css',
        lineNumbers: 	true,
        lineWrapping:	true,
        theme:			'night'   
    };
	$scope.workspace			= {};	//Workspace wrapper model
	$scope.workspace.ad 		= {};	//Complete ad unit model
	$scope.workspace.components = {};	//List of all components
	$scope.workspace.componentsRaw	= {};
	//$scope.workspace.display	= {};	//Ad's display model
	$scope.workspace.modal		= {};	//Modal content
	$scope.workspace.template	= {};	//Ad's corresponding template model
	$scope.ui					= {};	//UI wrapper model
	$scope.ui.schedule			= 0;	//Current schedule state
	$scope.ui.layer				= 'Layers';
	$scope.ui.view 				= 'Initial';
	$scope.ui.platform			= 'Desktop';
	$scope.layers				= {};
	$scope.library				= {};
	$scope.creatorModalOptions	= {
		backdropClick: 	false,
		backdropFade:	true
	}
	
	$scope.embedOptions = {
		'auto':		'false',
		'close':	'false',
		'tablet':	'false',
		'mobile':	'false'
	};
	
	$scope.embedCMOptions = {
        mode: 			'htmlmixed',
        lineNumbers: 	true,
        lineWrapping:	true,
        theme:			'night'
    };
	
	
	/**
	* Init
	*/
	Rest.get('components').then(function(response) {
		$scope.workspace.components		= response;
		$scope.workspace.componentsRaw	= $scope.workspace.components['raw'];
		delete $scope.workspace.components['raw'];
		
		$scope.updateLibrary();
		
		Rest.get('ad/'+originAd_id).then(function(response) {
			template_id					= response.OriginAd.config.type_id;//IS THIS USED?
			$scope.workspace.ad			= response;
			$scope.scripts.content 		= (response.OriginAd.content_css)? response.OriginAd.content_css: '<style type="text/css">\n</style>';
			
			
			$scope.$watch('ui.view', function() {
				$scope.updateUI();
			});	
			
			$scope.$watch('ui.platform', function() {
				$scope.updateUI();
			});
			
			Rest.get('templates').then(function(response) {
				$scope.templates		= response;
			});
		});
	});
	
	/**
	* Refreshes the workspace and layers
	*/
	$scope.refreshUI = function(data) {
		$scope.workspace.ad	= data;
		$scope.updateUI();
	}
	
	/**
	* Refreshes the library panel
	*/
	$scope.updateLibrary = function() {
		Rest.get('library/'+originAd_id).then(function(response) {
			$scope.library				= response.files;
		});
	}
	
	/**
	* Core functionality to update the workspace and layers w/respect to current settings
	*/
	$scope.updateUI = function() {
		$scope.ui.content			= 'OriginAd'+$scope.ui.platform+$scope.ui.view+'Content';	//Current view state
		//$scope.workspace.display	= $scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule][$scope.ui.content];
		//$scope.layers				= angular.copy($scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule][$scope.ui.content]);
		
		$scope.layers				= angular.copy($filter('orderBy')($scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule][$scope.ui.content], '-order'));
		
		$scope.ui.origin_ad_schedule_id = $scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule].id;
		$scope.workspaceTemplateConfig = function() {
			return {
				height:	$scope.workspace.ad.OriginAd.config.dimensions[$scope.ui.view][$scope.ui.platform].height+'px',
				width: 	$scope.workspace.ad.OriginAd.config.dimensions[$scope.ui.view][$scope.ui.platform].width+'px'
				/*
height:	$scope.workspace.template.config.dimensions[$scope.ui.view][$scope.ui.platform].height+'px',
				width: 	$scope.workspace.template.config.dimensions[$scope.ui.view][$scope.ui.platform].width+'px'
*/
			}
		}
	}
	
	/**
	* Switch toggles throughout the interface
	*/
	$scope.creatorToggle = function(type) {
		switch(type) {
			case 'library':
				var toggle			= $j('#layerSwitch').prop('checked', false);
				$scope.ui.layer 	= 'Library';
				break;
			case 'view':
				var toggle			= $j('#displaySwitch').prop('checked', !$j('#displaySwitch').prop('checked'));
				$scope.ui.view 		= ($j('#displaySwitch').prop('checked'))? 'Initial': 'Triggered';
				break;
			default:
				var toggle			= $j('#layerSwitch').prop('checked', !$j('#layerSwitch').prop('checked'));
				$scope.ui.layer 	= ($j('#layerSwitch').prop('checked'))? 'Layers': 'Library';
				break;
		}
	}
	
	/**
	* Switches between different platform views
	*/
	$scope.platformSwitch = function(type) {
		$scope.ui.platform = type;
	}
	
/*
	$scope.creatorFocus = function(data) {
		$j('#workspaceContent-'+data.id).attr('tabindex', -1).focus();
		
		
		//Work on this....
		$j('.content-item').removeClass('active');
		$j('#contentItem-'+data.id).addClass('active');
	}
*/
	
	/**
	* Closes the modal window
	*/
	$scope.creatorModalClose = function() {
		$scope.creatorModal	= false;
	}
	
	/**
	* Opens the modal and loads content (if available)
	*/
	$scope.creatorModalOpen = function(type, content, model) {
		$scope.creatorModal = true;
		
		switch(type) {
			case 'component':
				$scope.workspace.modal.title		= content.name + ' Editor';
				$scope.workspace.modal.image		= content.config.img_icon;
				$scope.workspace.modal.alias		= content.alias;
				//$scope.workspace.modal.title		= content.OriginComponent.name;
				break;
			case 'content':
				for(var i in $scope.workspace.componentsRaw) {
					if($scope.workspace.componentsRaw[i].OriginComponent.alias	=== model.content.type) {
						$scope.workspace.modal.title		= $scope.workspace.componentsRaw[i].OriginComponent.name + ' Editor';
						$scope.workspace.modal.image		= $scope.workspace.componentsRaw[i].OriginComponent.config.img_icon;
					}
				}
				$scope.workspace.modal.alias		= model.type;
				break;
			case 'schedule':
				break;
		}
		
		if(model) {
			$scope.editor 			= angular.copy(model);
			$scope.editor.remove 	= true;
		} else {
			$scope.editor 			= {
				content: {
					'title': 	content.name,
					'type': 	content.alias
				},
				config: {
					'height': '50px',
					'left': '0px',
					'top':	'0px',
					'width': '50px'
				},
				type: content.alias,
				remove: false
			};
		}
		componentCtrl			= function(){return false};
		$scope.editor.template	= '/administrator/get/components/'+$scope.workspace.modal.alias;
	}
		
	/**
	* Save/update the content
	*/
	$scope.creatorModalSaveContent = function(data) {
		$scope.editor.route					= 'creatorContentSave';
		$scope.editor.model					= $scope.ui.platform + $scope.ui.view;
		$scope.editor.origin_ad_schedule_id	= $scope.ui.origin_ad_schedule_id;
		$scope.editor.originAd_id			= originAd_id;
		
		$scope.editor.content 				= data.content;
		$scope.editor.render				= data.render;
		$scope.editor.data 					= $scope.workspace.ad.OriginAdSchedule;
		
		Rest.post($scope.editor).then(function(response) {
			$scope.creatorModal	= false;
			$scope.refreshUI(response);
			Notification.display('Content saved');
			$j('#actions-wrapper').fadeOut(200);
		});
	}
	
	/**
	* Removes the content from the ad
	*/
	$scope.creatorModalRemove = function(data) {
		var ask = confirm('Do you want to remove this item?');
		if(ask){
			$scope.editor				= data;
			$scope.editor.route			= 'creatorContentRemove';
			$scope.editor.model			= $scope.ui.platform + $scope.ui.view;
			$scope.editor.originAd_id	= originAd_id;
			$scope.editor.data 			= $scope.workspace.ad.OriginAdSchedule;

			Rest.post($scope.editor).then(function(response) {
				$scope.creatorModal	= false;
				$scope.refreshUI(response);
				Notification.alert('Content removed');
				$j('#actions-wrapper').fadeOut(200);
			});	
		} else {
			return false;
		}
	}
	
	/**
	* Adds content through drag-and-drop directive
	*/
	$scope.creatorLibrarySave = function(data) {
		$scope.editor						= data;
		$scope.editor.route					= 'creatorContentSave';
		$scope.editor.model					= $scope.ui.platform + $scope.ui.view;
		$scope.editor.origin_ad_schedule_id	= $scope.ui.origin_ad_schedule_id;
		$scope.editor.originAd_id			= originAd_id;
		$scope.editor.data 					= $scope.workspace.ad.OriginAdSchedule;
		
		Rest.post($scope.editor).then(function(response) {
			$scope.editor = {};
			$scope.refreshUI(response);
			Notification.display('Asset added to workspace');
			$j('#actions-wrapper').fadeOut(200);
		});
	}
	
	/**
	* Saves any workspace changes and exits to listing page
	*/
	$scope.creatorSaveExit = function() {
		$scope.editor.data			= $scope.workspace.ad.OriginAdSchedule;
		$scope.editor.originAd_id	= originAd_id;
		$scope.editor.route			= 'creatorWorkspaceUpdate';
		
		Rest.post($scope.editor).then(function() {
			window.location		= '/administrator/list';
		});
	}
	
	
	
	
	/**
	* Open Scripts modal window
	*/
	$scope.scriptsModalOpen = function() {
		$scope.scriptsModal = true;
	}
	
	/**
	*
	*/
	$scope.scriptsModalSave = function() {
		$scope.scripts.id		= $scope.workspace.ad.OriginAd.id;
		$scope.scripts.route	= 'cssUpdate';
		
		Rest.post($scope.scripts).then(function(response) {
			//$scope.refreshUI(response);
			//$scope.settingsModalClose();
			Notification.display('CSS updated');
		});
	}
	
	/**
	* Closes the Scripts modal window
	*/
	$scope.scriptsModalClose = function() {
		$scope.scriptsModal	= false;
	}
	
	
	/**
	* Embed code modal window
	*/
	$scope.embedModalOpen = function() {
		$scope.embedOptions.id		= $scope.workspace.ad.OriginAd.id;
		$scope.embedOptions.type	= $scope.workspace.ad.OriginAd.config.template;
		//$scope.embedOptions.dcopt	= ($scope.workspace.ad.OriginAd.config.type === 'outofpage' || $scope.embedOptions.type === 'horizon')? 'true': 'false';
		$scope.embedModal = true;
	}
	
	/**
	* Email embed code to user
	*/
	$scope.embedModalEmail = function() {
		$scope.editor.route		= 'emailEmbed';
		$scope.editor.ad 		= $scope.workspace.ad.OriginAd;
		$scope.editor.embed 	= $j('#embedModal-content').val();
		Rest.post($scope.editor).then(function() {
			$scope.embedModal = false;
			Notification.display('Embed code emailed');
		});
	}
	
	/**
	* Close Embed modal window
	*/
	$scope.embedModalClose = function() {
		$scope.embedModal = false;
	}
	
	/**
	* Settings modal
	*/
	$scope.settingsModalOpen = function() {
		$scope.editor				= angular.copy($scope.workspace.ad.OriginAd);
		$scope.editor.advance		= false;
		$scope.editor.statusSwitch	= ($scope.editor.status === '1')? true: false;
		//$scope.editor.template 		= angular.copy($scope.editor.config.template); WHAT WAS THIS FOR?
		$scope.settingsModal 		= true;
	}
	
	/**
	* Settings modal's template toggle - Part deux (advanced)
	* Wut???
	*/
	$scope.templateLoad = function() {
		//console.log($scope.editor.template);
		$scope.editor.config			= angular.copy($scope.editor.template.OriginTemplate.config);
		$scope.editor.config.template	= $scope.editor.template.OriginTemplate.alias;
	}
	
	/**
	* Update Origin ad settings
	*/
	$scope.settingsModalSave = function() {
		delete $scope.editor.template;
		$scope.editor.route			= 'creatorSettingsUpdate';
		Rest.post($scope.editor).then(function(response) {
			$scope.refreshUI(response);
			$scope.settingsModalClose();
			Notification.alert('Settings updated');
		});
	}
	
	/**
	* Close settings modal window
	*/
	$scope.settingsModalClose = function() {
		$scope.settingsModal = false;
	}
	
	/**
	* Undo workspace changes
	*/
	$scope.workspaceUndo = function() {
		Rest.get('ad/'+originAd_id).then(function(response) {
			$scope.refreshUI(response);
			Notification.alert('Previous workspace loaded');
			$j('#actions-wrapper').fadeOut(200);
		});
	}
	
	/**
	* Saves all changes (resizes, moving) done in workspace
	*/
	$scope.workspaceUpdate = function() {
		$scope.editor.originAd_id	= originAd_id;
		$scope.editor.data			= $scope.workspace.ad.OriginAdSchedule;
		$scope.editor.route			= 'creatorWorkspaceUpdate';
		Rest.post($scope.editor).then(function(response) {
			Notification.display('Workspace saved');
			$j('#actions-wrapper').fadeOut(200);
			$scope.refreshUI(response);
		});
	}
};