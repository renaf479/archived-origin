var adComponentsController	= function($scope, $filter, Rest, Notification) {
	
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
		$scope.add();
		
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
	$scope.add = function() {
		$scope.editor		= {
			header: 'Add New Component',
			status: true
		};
	}

	/**
	* Save new entry
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
	$scope.statusToggle = function() {
		
	}
	
	/**
	* Edit
	*/
	$scope.edit = function(model) {
		$scope.editor	= angular.copy(model.OriginComponent);
		//Transform the data
		$scope.editor.header 	= $scope.editor.name;
		$scope.editor.status 	= ($scope.editor.status === '1')? true: false;
		
		//console.log(model.OriginComponent);
	}
/*
	$scope.componentEdit = function(model) {
		$scope.originModal = true;
		$scope.editorModal = angular.copy(model.OriginComponent);
	}
*/
	
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
