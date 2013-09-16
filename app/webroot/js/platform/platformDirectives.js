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
	.directive('backImg', function() {
		return function(scope, element, attrs) {
			attrs.$observe('backImg', function(value) {
				if(value) {
					element.css({
						'background-image': 'url('+value+')'
					});
				}
			});
		}
	})
	.directive('kinetic', function() {
		//FIX THIS!!
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				element.kinetic({
					filterTarget: function(target) {
						return !$j(target).hasClass('ui-draggable');
					}
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
	})
	.directive('inputCheckbox', function() {
		var template = '<div class="originUI-checkbox">'+
							'<input type="checkbox" id="{{name}}" name="{{name}}" class="originUI-checkboxInput" data-ng-change="ngChange" data-ng-checked="ngChecked" data-ng-class="ngClass" data-ng-disabled="ngDisabled" data-ng-model="ngModel" data-ng-true-value="{{ngTrueValue}}" data-ng-false-value="{{ngFalseValue}}"/>'+
							'<label for="{{name}}" class="originUI-checkboxLabel"></label>'+
						'</div>';
		return {
			replace: true,
			restrict: 'E',
			scope: {
				name:		'@',
				ngChange:	'=',
				ngChecked:	'=',
				ngClass:	'=',
				ngDisabled:	'=',
				ngModel:	'=',
				ngTrueValue:'@',
				ngFalseValue:'@'
			},
			template: template
		}
		/*
		
		<input type="checkbox" data-ng-checked="ui.auto === 'auto'" data-ng-click="uiAuto()"/>
		
						<div class="squaredThree">
	<input type="checkbox" value="None" id="squaredThree" name="check" />
	<label for="squaredThree"></label>
</div>
		*/
	})
	.directive('inputSwitch', function() {
		var template = '<div>' + 
							'<input type="checkbox" name="{{name}}" class="originUI-switchInput" data-ng-class="ngClass" id="{{name}}" data-ng-model="ngModel" data-ng-change="ngChange()" data-ng-checked="ngChecked" data-ng-disabled="ngDisabled"/>'+
							'<label class="originUI-switchLabel" for="{{name}}">'+
								'<div class="originUI-switchInner">'+ 
									'<div class="originUI-switchActive">'+
										'<div class="originUI-switchText">{{active}}</div>'+
									'</div>'+
									'<div class="originUI-switchInactive">'+
										'<div class="originUI-switchText">{{inactive}}</div>'+
									'</div>'+
								'</div>'+
							'</label>'+
						'</div>';
		return {
			replace: true,
			restrict: 'E',
			scope: {
				name: 	'@',
				active:	'@',
				inactive:'@',
				ngChange:'&',
				ngChecked:'=',
				ngClass: '=',
				ngDisabled:'=',
				ngModel:'=',
			},
			template: template
		}	
	})
	.directive('inputText', function() {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				element.addClass('originUI-input originUI-bgColorSecondary');
				element.wrap('<div class="originUI-field '+attrs.class+'"/>');
				element.parent().prepend('<div class="originUI-fieldBracket"/>');
			}
		}		
	})
	;