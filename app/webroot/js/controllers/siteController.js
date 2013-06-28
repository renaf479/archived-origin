var siteController	= function($scope, $filter, Rest, Notification) {
	$scope.sites 		= {};
	$scope.editor		= {};
	$scope.editorModal	= {};
	$scope.status		= {};

	
	Rest.get('sites').then(function(response) {
		$scope.sites = $scope.$parent.listRefresh(response);
	});
	
	$scope.createAlias = function(model) {
		$scope[model].alias		= $scope.$parent.createAlias($scope[model].name);
	}
	
	$scope.siteCreate = function() {
		$scope.editor.route	= 'systemSave';
		$scope.editor.model	= 'OriginSite';
		Rest.post($scope.editor).then(function(response) {
			$scope.sites = response;
			Notification.display('Demo site template created');
			//$scope.$parent.notificationOpen('Site created');
		});
	}
	
	$scope.siteEdit = function(model) {
		$scope.$parent.originModalOpen();
		$scope.editorModal = angular.copy(model.OriginSite);
	}
	
	$scope.siteRemove = function() {
		$scope.editorModal.route	= 'systemRemove';
		$scope.editorModal.model	= 'OriginSite';
		
		var ask = confirm('Do you want to remove this site?');
		if(ask){
			Rest.post($scope.editorModal).then(function(response) {
				//$scope.$parent.notificationOpen('Site removed', 'alert');
				Notification.alert('Demo site template removed');
				$scope.sites = response;
				$scope.$parent.originModalClose();
			});
		}
	}
	
	$scope.siteSave = function() {
		$scope.editorModal.route	= 'systemSave';
		$scope.editorModal.model	= 'OriginSite';
		Rest.post($scope.editorModal).then(function(response) {
			Notification.display('Demo site template updated');
			$scope.sites = response;
			$scope.$parent.originModalClose();
		});
	}
	
	$scope.toggleStatus = function(model, id, status) {
		Rest.post($scope.$parent.toggleStatus(model, id, status)).then(function(response) {
			$scope.sites = response;
			switch(status) {
				case 'disable':
					Notification.alert('Demo site template disabled');
					break;
				case 'enable':
					Notification.display('Demo site template enabled');
					break;
			}
		});
	}
}
