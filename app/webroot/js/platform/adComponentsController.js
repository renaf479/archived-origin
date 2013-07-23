var adComponentsController	= function($scope, $filter, Rest, Notification) {
	$scope.editor		= {};
	$scope.editorModal	= {};
	$scope.status		= {};
	$scope.components 	= {};
	$scope.groups = [
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
	
	Rest.get('components').then(function(response) {
		$scope.components = response['raw'];
	});
	
	/**
	* Alias creator
	*/
	$scope.createAlias = function(model) {
		$scope[model].alias 	= $filter('createAlias')(model);
	}
	
	/**
	* Add new
	*/
	$scope.componentCreate = function() {
		$scope.editor.route	= 'systemSave';
		$scope.editor.model	= 'OriginComponent';
		Rest.post($scope.editor).then(function(response) {
			$scope.editor		= {};
			$scope.components 	= response['raw'];
			Notification.display('New ad component created');
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
			$scope.components = response['raw'];
			switch(status) {
				case 'disable':
					Notification.alert('Ad component disabled');
					break;
				case 'enable':
					Notification.display('Ad component enabled');
					break;
			}
		});
	}
	
	/**
	* Modal - Open editor
	*/
	$scope.componentEdit = function(model) {
		$scope.originModal = true;
		$scope.editorModal = angular.copy(model.OriginComponent);
	}
	
	/**
	* Modal - Close editor
	*/
	$scope.componentClose = function() {
		$scope.originModal = false;
	}
	
	/**
	* Modal - Remove
	*/
	$scope.componentRemove = function() {
		$scope.editorModal.route	= 'systemRemove';
		$scope.editorModal.model	= 'OriginComponent';
		
		var ask = confirm('Do you want to remove this component?');
		if(ask){
			Rest.post($scope.editorModal).then(function(response) {
				Notification.alert('Ad component removed');
				$scope.templates = response['raw'];
				$scope.originModal = false;
			});
		}
	}
	
	/**
	* Modal - Update
	*/
	$scope.componentSave = function() {
		$scope.editorModal.route	= 'systemSave';
		$scope.editorModal.model	= 'OriginComponent';
		Rest.post($scope.editorModal).then(function(response) {
			Notification.display('Ad component updated');
			$scope.templates = response['raw'];
			$scope.originModal = false;
		});
	}
}
