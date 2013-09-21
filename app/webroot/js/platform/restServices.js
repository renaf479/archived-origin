'use strict';

angular.module('restServices', [])
	.factory('Rest', function($http) {
		var Rest = {
			element: function(folder, element) {
				var promise = $http.get('/administrator/get/element/'+folder+'/'+element).then(function(response) {
					return response.data;
				});
				return promise;
			},
			get: function(action, type) {
				var path 	= (type === 'public')? '': '/administrator';
				
				var promise = $http.get(path+'/get/'+action+'.json').then(function(response) {
					return response.data;
				});
				return promise;
			},
			getRss: function(url) {
				var promise = $http.get('/administrator/get/rss/'+url).then(function(response) {
					return response.data;
				});
				return promise;
			},
			post: function(data) {
				var promise = $http.post('/administrator/Origin/Post', data).then(function(response) {
					return response.data;
				});
				return promise;
			}
		};
		return Rest;
	});