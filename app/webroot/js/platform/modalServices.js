'use strict';

platformApp.factory('Modal', function($rootScope) {
	var Modal = {
		close: function(modal) {
			$rootScope[modal] = false;
		},
		open: function(modal) {
			$rootScope[modal] = true;
		}
	};
	return Modal;
});