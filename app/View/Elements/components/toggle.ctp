<div id="editor-toggle" ng:controller="componentCtrl">
	<div class="originUI-modalLeft">
		<ul class="originUI-list">
			<li>
				<div class="inline">Toggle on</div>
				<div id="editorToggle-type" class="inline">
					<div class="originUI-switch">
					    <input type="checkbox" name="editorToggleTypeSwitch" class="originUI-switchInput" id="editorToggleTypeSwitch" ng:model="editor.content.event" ng:checked="editor.content.event">
					    <label class="originUI-switchLabel" for="editorToggleTypeSwitch">
					    	<div class="originUI-switchInner">
					    		<div class="originUI-switchActive">
					    			<div class="originUI-switchText">Click</div>
							    </div>
							    <div class="originUI-switchInactive">
							    	<div class="originUI-switchText">Hover</div>
								</div>
						    </div>
					    </label>
				    </div>
				</div>
			</li>
<!--
			<li>
				<label id="editorToggle-imageLabel" class="inline">Image (optional)</label>
				<div id="editorToggle-imageField" class="originUI-field inline">
					<div class="originUI-fieldBracket"></div>
					<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.content.image"/>
				</div>
			</li>
			<li>
				<label id="editorToggle-hoverLabel" class="inline">Hover (optional)</label>
				<div id="editorToggle-hoverField" class="originUI-field inline">
					<div class="originUI-fieldBracket"></div>
					<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.content.hover"/>
				</div>
			</li>
-->
		</ul>
	</div>
	<div class="originUI-modalRight" ng:show="test == 'false'">
		<div id="background-upload" class="originUI-upload">
			<span class="originUI-uploadLabel">Upload Background</span>
			<input type="file" name="files[]" id="editorBackground-upload" class="originUI-uploadInput" ng:model="editor.content.bgUpload" fileupload>
		</div>
		<strong>Select Image</strong>
		<ul id="" class="originUI-bgColor">
			<li class="originUIList-item" data-asset="{{$index}}" ng:repeat="asset in library" ng:click="backgroundSelect(asset)">
				<a href="javascript:void(0);" class="originUI-hover">{{asset.name}}</a>
			</li>
		</ul>
	</div>
	<div class="clear"></div>
	
	<script type="text/javascript">
		var componentCtrl = function($scope, $rootScope) {
			var _scope 	= $scope.$parent,
				toggleEvent;
			
			if($scope.editor.content.event === undefined) {
				$scope.editor.content.event = true;
			}
			
			$rootScope.creatorModalSave = function() {				
				toggleEvent 			= ($scope.editor.content.event)? 'click': 'hover';
				$scope.editor.render 	= '<a href="javascript:void(0)" class="cta toggle" toggle="'+toggleEvent+'"></a>';
			
				_scope.creatorModalSaveContent($scope.editor);
			};
		}
	
	
/*
		var componentCtrl = function($scope) {
			var toggleEvent;
			var _scope = angular.element($j('#ad-edit')).scope();

			if(_scope.editor.content.event === undefined) {
				_scope.editor.content.event = true;
			}
			
				_scope.$watch('editor.content', function() {
					switch($scope.editor.content.event) {
						case false:
							toggleEvent 	= 'hover';
							break;
						case true:
							toggleEvent 	= 'click';
							break;
					}
					_scope.editor.render	= '<a href="javascript:void(0)" class="cta toggle" toggle="'+toggleEvent+'"></a>';
				}, true);
		}
*/
	</script>
</div>