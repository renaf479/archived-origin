'use strict';

angular.module('notificationServices', [])
	.factory('Notification', function($rootScope, $timeout) {
		var notificationTimeout;
	
		$rootScope.notification	= {
			icon:	'/img/notification-26x26.png'
		};
		
		$rootScope.notificationClose = function() {
			Notification._hide();
		}
		
		var Notification = {
			_hide: function() {
				$rootScope.notification.show 	= false;
			},
			_show: function() {
				$timeout.cancel(notificationTimeout);
				$rootScope.notification.show	= true;
				notificationTimeout = $timeout(function() {
					Notification._hide();
				}, 3000);
			},
			alert: function(msg) {
				$rootScope.notification.content = msg;
				$rootScope.notification.type 	= 'originNotification-alert';
				Notification._show();
			},
			display: function(msg) {
				$rootScope.notification.content = msg;
				$rootScope.notification.type 	= 'originNotification-default';
				Notification._show();
			}
		};
		
		return Notification;
	});