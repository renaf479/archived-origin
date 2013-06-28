var originComponents	= function($scope, $filter, Notification, Rest) {
	$scope.components 	= {};
	$scope.editor							= {};
	$scope.editorModal						= {};
	$scope.status							= {};
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
		$scope.components = $scope.$parent.listRefresh(response['raw']);
	});
	
	$scope.createAlias = function(model) {
		$scope[model].alias		= $scope.$parent.createAlias($scope[model].name);
	}
	
	$scope.componentCreate = function() {
		$scope.editor.route	= 'systemSave';
		$scope.editor.model	= 'OriginComponent';
		Rest.post($scope.editor).then(function(response) {
			$scope.components = response['raw'];
			//$scope.$parent.notificationOpen('Component created');
			Notification.display('New ad component created');
		});
	}
	
	$scope.componentEdit = function(model) {
		$scope.$parent.originModalOpen();
		$scope.editorModal = angular.copy(model.OriginComponent);
	}
	
	$scope.componentRemove = function() {
		$scope.editorModal.route	= 'systemRemove';
		$scope.editorModal.model	= 'OriginComponent';
		
		var ask = confirm('Do you want to remove this component?');
		if(ask){
			Rest.post($scope.editorModal).then(function(response) {
				//$scope.$parent.notificationOpen('Component removed', 'alert');
				Notification.alert('Ad component removed');
				$scope.components = response['raw'];
				$scope.$parent.originModalClose();
			});
		}
	}
	
	$scope.componentSave = function() {
		$scope.editorModal.route	= 'systemSave';
		$scope.editorModal.model	= 'OriginComponent';
		Rest.post($scope.editorModal).then(function(response) {
			//$scope.$parent.notificationOpen('Component updated');
			Notification.display('Ad component updated');
			$scope.components = response['raw'];
			$scope.$parent.originModalClose();
		});
	}
	
	$scope.toggleStatus = function(model, id, status) {
		Rest.post($scope.$parent.toggleStatus(model, id, status)).then(function(response) {
			$scope.components = response['raw'];
			switch(status) {
				case 'disable':
					Notification.alert('Ad component disabled');
					break;
				case 'enable':
					Notification.display('Ad component enabled');
					break;
			}
			//$scope.$parent.notificationOpen(notification.message, notification.type);
		});
	}
}
