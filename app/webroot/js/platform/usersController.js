var usersController	= function($scope, Rest, Notification) {
	$scope.editor		= {};
	$scope.editorModal	= {};
	$scope.status		= {};
	$scope.users 		= {};

	
	$scope.loadUsers = function() {
		Rest.get('users').then(function(response) {
			$scope.users = response;
		});
	}
	
	/**
	* Add new
	*/
	$scope.userCreate = function() {
		$scope.editor.route	= 'dashboardUserAdd';
		Rest.post($scope.editor).then(function(response) {
			$scope.editor		= {};
			$scope.loadUsers();
			Notification.display('User account created');
		});
	}

	/**
	* Status toggle
	*/
	
	$scope.toggleStatus = function(id, status) {
		var post = {
			route: 'dashboardUserStatus',
			id:		id
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
			$scope.loadUsers();
			switch(status) {
				case 'disable':
					Notification.alert('User account disabled');
					break;
				case 'enable':
					Notification.display('User account enabled');
					break;
			}
		});
	}
	
	/**
	* Modal - Open editor
	*/
	$scope.userEdit = function(model) {
		$scope.originModal = true;
		$scope.editorModal = angular.copy(model.User);
		$scope.editorModal.password = $scope.editorModal.cpassword = '';
	}

	
	/**
	* Modal - Close editor
	*/
	$scope.userClose = function() {
		$scope.originModal = false;
	}
	
	/**
	* Modal - Remove
	*/
	$scope.userRemove = function() {
		//WHY IS THIS INACTIVE?
/*
		$scope.editorModal.route	= 'systemRemove';
		$scope.editorModal.model	= 'User';
		
		var ask = confirm('Do you want to remove this user?');
		if(ask){
			Rest.post($scope.editorModal).then(function(response) {
				Notification.alert('User removed');
				$scope.templates = response;
				$scope.originModal = false;
			});
		}
*/
	}
	
	/**
	* Modal - Update
	*/
	$scope.userSave = function() {
		$scope.editorModal.route	= 'dashboardUserUpdate';

		Rest.post($scope.editorModal).then(function(response) {
			Notification.display('User account updated');
			$scope.loadUsers();
			$scope.originModal = false;
		});
	}

	$scope.loadUsers();
}
