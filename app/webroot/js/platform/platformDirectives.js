'use strict';

angular.module('platformApp.directives', [])
	.directive('alias', function(){
		/**
		* Alias name creator
		*/
		return {
			require: 'ngModel',
			restrict: 'A',
			link: function(scope, element, attrs, modelCtrl) {
			
				modelCtrl.$parsers.push(function (inputValue) {
				
					var transformedInput = inputValue.toLowerCase().replace(/ /g, '-'); 
					
					if (transformedInput!=inputValue) {
						modelCtrl.$setViewValue(transformedInput);
						modelCtrl.$render();
					}         
					
					return transformedInput;         
				});
			}
		}
	})
	.directive('nanoscroller', function() {
		return {
			restrict: 'A',
			link: function(scope, element) {
				element.nanoScroller({contentClass: 'nano-content'});
			}
		}
	})
	.directive('draggable', function() {
		return {
			replace: true,
			restrict: 'A',
			scope: {
				draggable: '@'	
			},
			template: '<div ng:transclude></div>',
			transclude: true,
			link: function(scope, element) {
				element.draggable({
					containment: 'window',
					handle: scope.draggable
				});
			}
		}
	})
	.directive('fileupload', function() {
		/**
		* AJAX uploader
		*/
		return {
			restrict: 'A',
			scope: {
				ngModel: '='
      		},
			link: function(scope, element, attrs) {
				element.fileupload({
					dataType: 'json',
					url: '/administrator/Origin/upload',
					add: function(e, data) {
						data.submit();
					},
					done: function(e, data) {
						scope.$apply(function() {
							scope.ngModel	= data.result[0].path;
						});
					}
				});
			}
		}
	})
	.directive('flashMessage', function(Notification) {
		/**
		* AngularJS wrapper for CakePHP's Session message
		*/
		return {
			restrict: 'E',
			link: function(scope, element, attrs) {
				//scope.notificationOpen(angular.element(element).html());
				Notification.alert(angular.element(element).html());
			}
		}
	}).directive('hex', function(){
		/**
		* Input field for hex codes
		*/
		return {
			require: 'ngModel',
			restrict: 'A',
			link: function(scope, element, attrs, modelCtrl) {
			
				modelCtrl.$parsers.push(function (inputValue) {
					
					var transformedInput = '#'+inputValue.replace(/#/g, ''); 
				
					if (transformedInput!=inputValue) {
						modelCtrl.$setViewValue(transformedInput);
						modelCtrl.$render();
					}
					
					$j(element).prev().css('backgroundColor', transformedInput);
					$j(element).css('borderColor', transformedInput);
					
					
					return transformedInput; 
				});
			}
		}
	})
	.directive('help', function(){
		/**
		* ChardinJS help overlay
		*/
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				element.click(function() {
					angular.element(document.body).chardinJs('start');
				});
			}
		}
	});