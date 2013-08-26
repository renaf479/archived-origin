var adSitesController	= function($scope, $filter, Rest, Notification, $timeout) {
	$scope.editor		= {};
	$scope.editorModal	= {};
	$scope.status		= {};
	$scope.sites 		= {};
	
	Rest.get('sites').then(function(response) {
		$scope.sites = response;
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
	$scope.siteCreate = function() {
		$scope.editor.route	= 'systemSave';
		$scope.editor.model	= 'OriginSite';
		Rest.post($scope.editor).then(function(response) {
			$scope.editor		= {};
			$scope.sites	 	= response;
			Notification.display('New site template created');
		});
	}
	
	/**
	* Status toggle
	*/
	$scope.toggleStatus = function(model, id, status, site) {
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
			$scope.sites = response;
			
			switch(status) {
				case 'disable':
					Notification.alert('Site template disabled');
					break;
				case 'enable':
					Notification.display('Site template enabled');
					break;
			}
		});
	}	
	
	/**
	* Modal - Open editor
	*/
	$scope.siteEdit = function(model) {
		$scope.originModal = true;
		$scope.editorModal = angular.copy(model.OriginSite);
	}

	/**
	* Modal - Close editor
	*/
	$scope.siteClose = function() {
		$scope.originModal = false;
	}
	
	/**
	* Modal - Remove
	*/
	$scope.siteRemove = function() {
		$scope.editorModal.route	= 'systemRemove';
		$scope.editorModal.model	= 'OriginSite';
		
		var ask = confirm('Do you want to remove this site?');
		if(ask){
			Rest.post($scope.editorModal).then(function(response) {
				Notification.alert('Site template removed');
				$scope.sites 		= response;
				$scope.originModal 	= false;
			});
		}
	}

	/**
	* Modal - Update
	*/
	$scope.siteSave = function() {
		$scope.editorModal.route	= 'systemSave';
		$scope.editorModal.model	= 'OriginSite';
		Rest.post($scope.editorModal).then(function(response) {
			Notification.display('Site template updated');
			$scope.sites 		= response;
			$scope.originModal 	= false;
		});
	}
}