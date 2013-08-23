var adComponentsController	= function($scope, $filter, Rest, Notification) {
	
	$scope.status		= {};
	$scope.components 	= {};
	//WF
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
	
	//WF
	Rest.get('components').then(function(response) {
		$scope.components = response['raw'];
		$scope.add();
	});
	
	/**
	* Alias creator WF
	*/
	$scope.alias = function(data) {
		$scope.editor.alias 	= $filter('createAlias')(data);
	}
	
	/**
	* Add new WF
	*/
	$scope.add = function() {
		$scope.editor		= {
			header: 'Add New Component',
			status: true
		};
	}

	/**
	* Save new entry WF
	*/
	$scope.save = function() {
		var notification	= ($scope.editor.id)? 'Ad component updated': 'New ad component created';
		
		$scope.editor.route	= 'systemSave';
		$scope.editor.model	= 'OriginComponent';
		
		Rest.post($scope.editor).then(function(response) {
			$scope.add();
			$scope.components = response['raw'];
			Notification.display(notification);
		});
	}
	
	/**
	* Edit WF
	*/
	$scope.edit = function(model) {
		$scope.editor	= angular.copy(model.OriginComponent);
		//Transform the data
		$scope.editor.header 	= $scope.editor.name;
		$scope.editor.status 	= ($scope.editor.status === '1')? true: false;
	}

	/**
	* Remove WF
	*/
	$scope.remove = function() {
		var notification	= 'Ad component removed';
		
		$scope.editor.route	= 'systemRemove';
		$scope.editor.model	= 'OriginComponent';
		
		var ask = confirm('Do you want to remove this component?');
		if(ask){
			Rest.post($scope.editor).then(function(response) {
				$scope.add();
				$scope.templates = response['raw'];
				Notification.alert(notification);
			});
		}
	}
}
