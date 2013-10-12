'use strict';

/**
* Draggable directive for library asset items
*/
platformApp.directive('asset', function() {
	return {
		restrict: 'A',
		link: function(scope, element, attrs) {
			element.draggable({
				appendTo: 'body',
				cursorAt: {
					top: 16,
					left: 16 
				},
				helper: 'clone',
				revert: true,
				revertDuration: 0,
				scroll: false,
				start: function(event, ui) {
					//scope.panelSlide('close');
					//element.data('asset', scope.asset);
				}
			});
		}
	}
});

/**
* Keystroke functionality for component configuration fields - ISOLATED USE
*/
platformApp.directive('config', function() {
	return {
		restrict: 'A',
		link: function(scope, element, attrs) {			
			element.keypress(function(event) {
				if(event.keyCode === 38 || event.keyCode === 40) {
					switch(event.keyCode) {
						case 38:
							var value 	= element.val().split('px')[0],
                    			value 	= Number(value) + 1;
                    			element.val(value+'px');
							break;
						case 40:
							var value 	= element.val().split('px')[0],
                    			value 	= Number(value) - 1;
                    			element.val(value+'px');
							break;
					}
					scope.$apply(function() {
                    	scope.editor.config[attrs.config] 	= element.val();
                    	//Update workspace - SHOULD THIS UPDATE WORKSPACE???
                    	//console.log(scope.originEditor.content_config[attrs.config]);
                    	//$j('#workspace #content-'+scope.originEditor.id).css(attrs.config, element.val());
                    });
				}
			});
			element.blur(function(event) {
				var value 	= element.val(),
                    value 	= value.match(/[0-9]+/g);
                element.val(value[0]+'px');
                
                scope.$apply(function() {
                    scope.editor.config[attrs.config] 		= element.val();
                    //$j('#workspace #content-'+scope.originEditor.id).css(attrs.config, element.val());
                });              
			});
		}
	}
});

/**
* Layer sorting for components list
*/
platformApp.directive('layerSortable', function() {
	var template = '<li id="contentItem-{{content.id}}" class="content-item" ng:repeat="content in layers|orderBy:\'-order\'" data-layer-id="{{content.id}}">'+
						'<span class="content-item-wrapper">'+
							'<span class="content-handle inline originUI-hover">handle</span>'+
							'<span class="content-label inline">{{content.content.title}}-{{content.id}}</span>'+
							'<span class="content-edit inline originUI-hover" ng:click="creatorModalOpen(\'content\', \'\', content)">edit</span>'+
						'</span>'+
					'</li>';
	return {
		restrict: 'A',
		replace: false,
		scope: true,
		template: template,
		link: function(scope, element, attr) {
			element.sortable({
				'axis':		'y',
				'handle':	'.content-handle, .content-label',
				'update': function(event, ui) {
					var newOrder	= $j(element).find('.content-item').length - 1;
					
					$j(element).find('.content-item').each(function() {
						//console.log($j(this).data('id'));
						
						for(var i in scope.workspace.ad.OriginAdSchedule[scope.ui.schedule][scope.ui.content]) {
							
							if($j(this).data('layer-id').toString() === scope.workspace.ad.OriginAdSchedule[scope.ui.schedule][scope.ui.content][i].id.toString()) {
								scope.$apply(function() {
									scope.workspace.ad.OriginAdSchedule[scope.ui.schedule][scope.ui.content][i].order = newOrder;
								});
								
								newOrder--;
							}
						}
						
					});
					//$j('#actions-wrapper').fadeIn(300);
				}
			});
		}
	}
});

/**
* Drag and drop uploader
*/
platformApp.directive('panelUpload', function() {
	return {
		restrict: 'A',
		link: function(scope, element, attrs) {
			$j(document).bind('drop dragover', function (e) {
				e.preventDefault();
			});
		
			element.fileupload({
				dataType: 	'json',
				dropZone: 	$j('#creator-panel-left'),
				url: 		'/administrator/Origin/upload',
				add: function(e, data) {
					data.submit();
					//console.log(data);	
				},
				stop: function(e, data) {
					scope.updateLibrary();
					scope.creatorToggle('library');
					scope.$apply();
				}
			});
		}
	}
});



