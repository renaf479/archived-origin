var platformController = function($scope, $filter, Rest, Notification) {
	var that = this,
		header,
		editor			= {},
		fields			= {},
		post			= {},
		notification	= {};
	$scope.model		= {};
	$scope.editor		= {};

	$scope.init = function(model) {
		//Setup presets
		switch(model) {
			case 'components':
				$scope.model	= {name: 'OriginComponent'};
				header 			= 'Add New Component';
				notification	= {
					remove:		'Ad component removed',
					save:		'Ad component created',
					update:		'Ad component updated'
				};
				
				//Page specific models
				$scope.groups 		= [
					{
						name:	'Embed',
						alias:	'embed'
					},
					{
						name:	'CTA',
						alias:	'cta'
					},
					{
						name:	'Media',
						alias:	'media'
					},
					{
						name:	'Link',
						alias:	'link'
					},
					{
						name:	'Video',
						alias:	'video'
					},
				];
				editor 			= {};
				break;
			case 'sites':
				$scope.model	= {name: 'OriginSite'};
				header 			= 'Add Site Template';
				notification	= {
					remove:		'Site template removed',
					save:		'Site template created',
					update:		'Site template updated'
				};
				editor 			= {};
				break;
			case 'templates':
				$scope.model		= {name: 'OriginTemplate'};
				fields		= {
					animations: [
						{
						label:	'Selector',
						name:	'selector'
						},
						{
						label:	'Start Position (px)',
						name:	'start'
						},
						{
						label:	'End Position (px)',
						name:	'end'
						},
						{
						label:	'Opening Duration (ms)',
						name:	'openDuration'
						},
						{
						label:	'Closing Duration (ms)',
						name:	'closeDuration'
						}
					],
					dimensions: [
						{
						label:	'Initial Width (px)',
						name:	'Initial', 
						inputs:	'width'
						},
						{
						label:	'Initial Height (px)',
						name:	'Initial', 
						inputs:	'height'
						},
						{
						label:	'Triggered Width (px)',
						name: 'Triggered', 
						inputs: 'width'
						},
						{
						label:	'Triggered Height (px)',
						name: 'Triggered', 
						inputs: 'height'
						}
					],
					platforms: [
						{name: 'Desktop'},
						{name: 'Tablet'},
						{name: 'Mobile'}
					]
				};
				header 			= 'Create New Ad Template';
				notification	= {
					remove:		'Ad template removed',
					save:		'Ad template created',
					update:		'Ad template updated'
				};
				editor 	= {
					config: {
						Desktop: {
							Initial: {},
							Triggered: {},
							Animations: {},
							status: true
						},
						Tablet: {
							Initial: {},
							Triggered: {},
							Animations: {},
							status: false
						},
						Mobile: {
							Initial: {},
							Triggered: {},
							Animations: {},
							status: false
						}
					}
				}
				
				$scope.fields = angular.copy(fields);
				break;
		}
	
		//Load model data
		Rest.get(model).then(function(response) {
			$scope.list 	= response;		
			
			//Initializes form		
			$scope.add();
		});
	}
	
	/**
	* Add new
	*/
	$scope.add = function() {
		$scope.editor 			= editor;
		$scope.editor.header 	=  header;
		$scope.editor.status 	= 	true;
	}
	
	/**
	* Creates sanitized alias from input
	*/
	$scope.alias = function(data) {
		$scope.editor.alias 	= $filter('createAlias')(data);
	}
	
	/**
	* Edits a selected model
	*/
	$scope.edit = function(model) {
		$scope.editor	= angular.copy(model);
		//Transform the data
		$scope.editor.header 	= $scope.editor.name;
		$scope.editor.status 	= ($scope.editor.status === '1')? true: false;
	}
	
	/**
	* Remove
	*/
	$scope.remove = function() {
		post 			= angular.copy($scope.editor);
		post.route 		= 'systemRemove';
		post.model 		= $scope.model.name;
		var ask = confirm('Do you want to remove this component?');
		if(ask){
			Rest.post($scope.editor).then(function(response) {
				$scope.add();
				$scope.list = response;
				Notification.alert(notification.remove);
			});
		}
	}
	
	/**
	* Save new entry
	*/
	$scope.save = function() {
		var notificationMsg	= ($scope.editor.id)? notification.update: notification.save;
		
		post			= angular.copy($scope.editor);
		post.route		= 'systemSave';
		post.model 		= $scope.model.name;
		
		Rest.post(post).then(function(response) {
			$scope.add();
			$scope.list = response;
			Notification.display(notificationMsg);
		});
	}
	
	
	/**
	* Ad Templates - Selecting type
	*/
	$scope.templateSelect = function(editor, model) {
		//Load up default editor
		$scope.fields = angular.copy(fields);
		
		switch(model) {
			case 'default':
				$scope.fields.dimensions	= [
					{
					label:	'Unit Width (px)',
					name:	'Initial', 
					inputs:	'width'
					},
					{
					label:	'Unit Height (px)',
					name:	'Height', 
					inputs:	'height'
					}
				];
				$scope.fields.animations 	= [];
				break;
			case 'interstitial':
			case 'prestitial':
				$scope.fields.dimensions	= [
					{
					label:	'Unit Width (px)',
					name:	'Initial', 
					inputs:	'width'
					},
					{
					label:	'Unit Height (px)',
					name:	'Height', 
					inputs:	'height'
					}
				];
				$scope.fields.animations 	= [
					{
					label:	'Close Timer (sec)',
					name:	'timer'
					}
				];
				break;
		}
	}
}