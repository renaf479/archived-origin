var adTemplatesController	= function($scope, Rest, Notification) {
	$scope.editor = {
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
				status: true
			},
			Mobile: {
				Initial: {},
				Triggered: {},
				Animations: {},
				status: true
			}
		}
	};
	$scope.editorModal	= {};
	$scope.platforms	= [
		{
			title: 'Desktop'
		},
		{ 
			title: 'Tablet'
		}, 
		{
			title: 'Mobile'
		}];
	$scope.status		= {};
	$scope.templates 	= {};
	$scope.editor.templateType = {
		initialWidth:	'Initial Width',
		initialHeight:	'Initial Height'	
	};
	
	Rest.get('templates').then(function(response) {
		$scope.templates = response;
	});
	
	/**
	* Add new
	*/
	$scope.templateCreate = function() {
		$scope.editor.route	= 'systemSave';
		$scope.editor.model	= 'OriginTemplate';
		Rest.post($scope.editor).then(function(response) {
			$scope.editor		= {};
			$scope.templates 	= response;
			Notification.display('New ad template created');
		});
	}
	
	/**
	* Status toggle
	*/
	$scope.toggleStatus = function(model, id, status) {
		var post = {
			route: 'toggleStatus',
			id:		id,
			model:	model	
		};
	
		switch(status) {
			case 'disable':
				post.status	= 0;
				break;
			case 'enable':
				post.status	= 1;
				break;
		}
	
		Rest.post(post).then(function(response) {
			$scope.templates = response;
			switch(status) {
				case 'disable':
					Notification.alert('Ad template disabled');
					break;
				case 'enable':
					Notification.display('Ad template enabled');
					break;
			}
		});
	}
	
	/**
	* Toggles status of platform's config
	*/
	$scope.templatePlatform = function(editor, data) {
		$scope[editor].config[data.title].Initial = {};
		$scope[editor].config[data.title].Triggered = {};
		$scope[editor].config[data.title].Animations = {};
	}
	
	/**
	*
	*/
	$scope.templateSelect = function(editor, model) {
		//Set defaults
		switch(model) {
			case 'expand':
				$scope[editor].templateType = {
					initialWidth:	'Initial Width',
					initialHeight:	'Initial Height',
					hide: 			['timer']
				}
				break;
			case 'overlay':
				$scope[editor].templateType = {
					initialWidth:	'Initial Width',
					initialHeight:	'Initial Height',
					hide: 			['animation', 'timer']
				}
				break;
			case 'default':
				$scope[editor].templateType = {
					initialWidth:	'Unit Width',
					initialHeight:	'Unit Height',
					hide:			['triggered', 'animation', 'timer']
				};
				break;
			case 'interstitial':
			case 'prestitial':
				$scope[editor].templateType = {
					initialWidth:	'Unit Width',
					initialHeight:	'Unit Height',
					hide:			['triggered', 'animation']
				};
				break;
		}
	}
	
	/**
	* Modal - Open editor
	*/
	$scope.templateEdit = function(model) {
		$scope.originModal = true;
		$scope.editorModal = angular.copy(model.OriginTemplate);
		$scope.editorModal.templateType = {
			initialWidth:	'Initial Width',
			initialHeight:	'Initial Height'	
		};
		$scope.templateSelect('editorModal', $scope.editorModal.config.type);
	}
	
	/**
	* Modal - Close editor
	*/
	$scope.templateClose = function() {
		$scope.originModal = false;
	}
	
	/**
	* Modal - Remove
	*/
	$scope.templateRemove = function() {
		$scope.editorModal.route	= 'systemRemove';
		$scope.editorModal.model	= 'OriginTemplate';
		
		var ask = confirm('Do you want to remove this template?');
		if(ask){
			Rest.post($scope.editorModal).then(function(response) {
				Notification.alert('Ad template removed');
				$scope.templates = response;
				$scope.originModal = false;
			});
		}
	}
	
	/**
	* Modal - Update
	*/
	$scope.templateSave = function() {
		$scope.editorModal.route	= 'systemSave';
		$scope.editorModal.model	= 'OriginTemplate';
		Rest.post($scope.editorModal).then(function(response) {
			Notification.display('Ad template updated');
			$scope.templates = response;
			$scope.originModal = false;
		});
	}
}
