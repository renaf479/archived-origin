'use strict';

//Layers
platformApp.directive('layer', function() {
	return {
		restrict: 'A',
		link: function(scope, element, attr) {
			element.sortable({
				'axis':	'y',
				'update': function(event, ui) {
					var newOrder = element.find('li').length-1;
					
					angular.forEach(element.find('li'), function(listItem, listIndex) {	
						angular.forEach(scope.originAdSchedule[scope.ui.schedule]['OriginAd'+scope.ui.platform+scope.ui.state+'Content'], function(contentValue, contentKey) {
							if(angular.element(listItem).scope().layer.id === contentValue.id) {
								scope.$apply(function() {
									contentValue.order = newOrder;
								});
								newOrder--;
							}
						});
					});
				}
			});
		}
	}
});

//Displays workspace content. Permits dragging, resizing and selection functions
platformApp.directive('workspaceContent', function() {
	return {
		restrict: 'E',
		scope: {
			ngModel: 	'='
		},
		link: function(scope, element, attrs) {
			//Updates the workspace z-index based on layer panel updates
			scope.$watch('ngModel.order', function(newValue, oldValue) {
				if(newValue !== oldValue) {
					element.css({'zIndex': scope.ngModel.order});
				}
			});
			
			//Prep CSS
			var css = {
				'height':	scope.ngModel.config.height,
				'width':	scope.ngModel.config.width,
				'left':		scope.ngModel.config.left,
				'top':		scope.ngModel.config.top,
				'zIndex':	scope.ngModel.order
			};
			
			//Prep render
			var render = scope.ngModel.render;
			
			element.attr('id', 'content-'+scope.ngModel.id);
			
			//Compile config into inline styles
			element.css(css).html(render).append('<span class="workspace-content-label">'+scope.ngModel.content.title+'</span>').addClass('content-'+scope.ngModel.content.type);
			
			
			//Make it draggable
/*
			element.draggable({
				cancel: '.content-background',
				containment: $j('#creator-panel-workspace'),
				iframeFix: true,
				//snap: true,
				//snapTolerance: 7,
				stop: function(event, ui) {
					//$j('#actions-wrapper').fadeIn(300);
					
					//construct config dataset
					scope.ngModel.config = {
						top: 	Math.round(ui.position.top)+'px',
						left: 	Math.round(ui.position.left)+'px',
						width: 	Math.round(ui.helper.width())+'px',
						height: Math.round(ui.helper.height())+'px'
					}
				}
			});
*/
			
			//Make it resizable
/*
			element.resizable({
				cancel: '.content-image, .content-background',
				containment: $j('#creator-panel-workspace'),
				handles: 'all',
				stop: function(event, ui) {
					//$j('#actions-wrapper').fadeIn(300);
					
					//construct config dataset
					scope.ngModel.config = {
						top: 	Math.round(ui.position.top)+'px',
						left: 	Math.round(ui.position.left)+'px',
						width: 	Math.round(ui.helper.width())+'px',
						height: Math.round(ui.helper.height())+'px'
					}
					
					switch(scope.ngModel.type) {
						case 'springboard':
							var width	= ui.originalSize.width+'px',
								height	= ui.originalSize.height+'px';
							
							scope.ngModel.content.embed = scope.ngModel.content.embed.replace(width, scope.ngModel.config.width);
							scope.ngModel.content.embed = scope.ngModel.content.embed.replace(height, scope.ngModel.config.height);
							break;
					}
				}
			});	
*/
			
			//Selecting a content item will highlight the companion content throughout the UI
/*
			element.click(function() {
				element.attr('tabindex', -1).focus().keydown(function(event) {
					if((event.keyCode >= 37 && event.keyCode <= 40) || event.keyCode === 8) {
						event.preventDefault();
						var position  = element.position();
						switch(event.keyCode) {
							case 37:
								var value 	= position.left - 1;
                    				element.css({left: value+'px'});
								break;
							case 38:
								var value 	= position.top - 1;
                    				element.css({top: value+'px'});
								break;
							case 39:
								var value 	= position.left + 1;
                    				element.css({left: value+'px'});
								break;
							case 40:
								var value 	= position.top + 1;
                    				element.css({top: value+'px'});
								break;
							case 8:
								scope.$parent.creatorModalRemove(scope.ngModel);
								break;
						}
						
						if(event.keyCode !== 8) {							
							//$j('#actions-wrapper').fadeIn(300);
							var newPosition  = element.position();
							//construct config dataset
							scope.ngModel.config = {
								top: 	newPosition.top+'px',
								left: 	newPosition.left+'px',
								width: 	element.width()+'px',
								height: element.height()+'px'
							}
						}
					}
					
				}).blur(function() {
					//console.log('here');
					$j('.content-item').removeClass('active');
				});
			
				$j('.content-item').removeClass('active');
				$j('#contentItem-'+scope.ngModel.id).addClass('active');	
			});	
*/
		}
	}
});