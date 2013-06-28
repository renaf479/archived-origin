var usersController = function($scope, $filter, Origin, Rest, Notification) {
	$scope.editor		= {};
	$scope.editorModal	= {};
	$scope.status		= {};
	$scope.users 		= {};
	
	$scope.loadUsers = function() {
		Rest.get('users').then(function(response) {
			$scope.users = $scope.$parent.listRefresh(response);
		});

	}
	
	$scope.userCreate = function() {
		$scope.editor.route	= 'dashboardUserAdd';
		Rest.post($scope.editor).then(function(response) {
			Notification.display('User account created');
			$scope.loadUsers();
			$scope.editor 		= {};
		});
	}
	
	$scope.userEdit = function(model) {
		$scope.$parent.originModalOpen();
		$scope.editorModal = angular.copy(model.User);
		$scope.editorModal.password = $scope.editorModal.cpassword = '';
	}
	
	$scope.userRemove = function() {
/*
		$scope.editorModal.route	= 'systemRemove';
		$scope.editorModal.model	= 'User';
		
		var ask = confirm('Do you want to remove this user?');
		if(ask){
			Origin.post($scope.editorModal).then(function(response) {
				$scope.$parent.notificationOpen('User removed', 'alert');
				$scope.users = response;
				$scope.$parent.originModalClose();
			});
		}
*/
	}
	
	$scope.userSave = function() {
		$scope.editorModal.route = 'dashboardUserUpdate';
		
		Rest.post($scope.editorModal).then(function() {
			$scope.loadUsers();
			$scope.$parent.originModalClose();
			Notification.display('User account updated');
		});
	}
	
	$scope.toggleStatus = function(id, status) {
		$scope.status.route			= 'dashboardUserStatus';
		$scope.status.id			= id;
		
		switch(status) {
			case 'disable':
				$scope.status.status	= 0;
				Notification.alert('User account disabled');
				break;
			case 'enable':
				$scope.status.status	= 1;
				Notification.display('User account enabled');
				break;
		}
		
		Rest.post($scope.status).then(function() {
			$scope.loadUsers();
			//$scope.$parent.notificationOpen(notification.message, notification.type);
		});
	}
	
	$scope.loadUsers();	
}
