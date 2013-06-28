var adTemplatesController	= function($scope, $filter, Rest, Notification) {
	$scope.editor		= {};
	$scope.editorModal	= {};
	$scope.status		= {};
	$scope.templates 	= {};
	
	Rest.get('templates').then(function(response) {
		$scope.templates = $scope.$parent.listRefresh(response);
	});
	
	$scope.templateCreate = function() {
		$scope.editor.route	= 'systemSave';
		$scope.editor.model	= 'OriginTemplate';
		Rest.post($scope.editor).then(function(response) {
			$scope.editor		= {};
			$scope.templates 	= response;
			Notification.display('New ad template created');
			//$scope.$parent.notificationOpen('Template created');
		});
	}
	
	$scope.templateEdit = function(model) {
		$scope.$parent.originModalOpen();
		$scope.editorModal = angular.copy(model.OriginTemplate);
	}
	
	$scope.templateRemove = function() {
		$scope.editorModal.route	= 'systemRemove';
		$scope.editorModal.model	= 'OriginTemplate';
		
		var ask = confirm('Do you want to remove this template?');
		if(ask){
			Rest.post($scope.editorModal).then(function(response) {
				//$scope.$parent.notificationOpen('Template removed', 'alert');
				Notification.alert('Ad template removed');
				$scope.templates = response;
				$scope.$parent.originModalClose();
			});
		}
	}
	
	$scope.templateSave = function() {
		$scope.editorModal.route	= 'systemSave';
		$scope.editorModal.model	= 'OriginTemplate';
		Rest.post($scope.editorModal).then(function(response) {
			//$scope.$parent.notificationOpen('Template updated');
			Notification.display('Ad template updated');
			$scope.templates = response;
			$scope.$parent.originModalClose();
		});
	}
	
	$scope.toggleStatus = function(model, id, status) {
		Rest.post($scope.$parent.toggleStatus(model, id, status)).then(function(response) {
			$scope.templates = response;
			switch(status) {
				case 'disable':
					Notification.alert('Ad template disabled');
					break;
				case 'enable':
					Notification.display('Ad template enabled');
					break;
			}
			//$scope.$parent.notificationOpen(notification.message, notification.type);
		});
	}
}
