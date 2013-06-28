'use strict';

platformApp.factory('Modal', function($rootScope) {
	var Modal = {
		close: function(modal) {
			modal = false;
		},
		open: function(modal) {
			//console.log($rootScope);
			$rootScope.originModal = true;
		}
	};
	return Modal;
});