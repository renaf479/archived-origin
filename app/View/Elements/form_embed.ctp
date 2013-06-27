<div class="originUI-field">
	<div class="originUI-fieldBracket"></div>
	<textarea id="embedModal-content" class="originUI-textarea originUI-bgColorSecondary"><?php echo $this->element('origin_embed');?></textarea>
	
<!-- 	<textarea id="embedModal-content" class="originUI-textarea originUI-bgColorSecondary"><script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/min-js?f=/js/ad/origin.js" data-auto="{{embedOptions.auto}}" data-close="{{embedOptions.close}}" data-hover="{{embedOptions.hover}}" data-dcopt="true" data-id="<?php echo $this->params['originAd_id'];?>" data-type="{{workspace.ad.OriginAd.config.template}}" data-xd="local.origin_test_prod" data-init="true"></script></textarea> -->
</div>
<div id="embedModal-config" ng:controller="embedCtrl">
	<div class="originUI-modalLeft">

		<ul class="originUI-list">
			<li>
				<label class="inline">Auto Open (1 per 24hrs)</label>
				<div id="config-auto" class="inline">
					<div class="originUI-switch">
					    <input type="checkbox" name="editorToggleAutoSwitch" class="originUI-switchInput" id="editorToggleAutoSwitch" ng:model="embedOptions.auto">
					    <label class="originUI-switchLabel" for="editorToggleAutoSwitch">
					    	<div class="originUI-switchInner">
					    		<div class="originUI-switchActive">
					    			<div class="originUI-switchText">Yes</div>
							    </div>
							    <div class="originUI-switchInactive">
							    	<div class="originUI-switchText">No</div>
								</div>
						    </div>
					    </label>
				    </div>
				</div>
			</li>
			<li>
				<label class="inline">Auto Close (when Auto Open)</label>
				<div id="config-close" class="inline">
					<div class="originUI-switch">
					    <input type="checkbox" name="editorToggleCloseSwitch" class="originUI-switchInput" id="editorToggleCloseSwitch" ng:model="embedOptions.close">
					    <label class="originUI-switchLabel" for="editorToggleCloseSwitch">
					    	<div class="originUI-switchInner">
					    		<div class="originUI-switchActive">
					    			<div class="originUI-switchText">Yes</div>
							    </div>
							    <div class="originUI-switchInactive">
							    	<div class="originUI-switchText">No</div>
								</div>
						    </div>
					    </label>
				    </div>
				</div>
			</li>
		</ul>
	</div>
	<div class="originUI-modalRight">
		<ul class="originUI-list">
			<li>
				<label class="inline">Tablet Unit</label>
				<div id="config-tablet" class="inline">
					<div class="originUI-switch">
					    <input type="checkbox" name="editorToggleTabletSwitch" class="originUI-switchInput" id="editorToggleTabletSwitch" ng:model="embedOptions.tablet">
					    <label class="originUI-switchLabel" for="editorToggleTabletSwitch">
					    	<div class="originUI-switchInner">
					    		<div class="originUI-switchActive">
					    			<div class="originUI-switchText">Yes</div>
							    </div>
							    <div class="originUI-switchInactive">
							    	<div class="originUI-switchText">No</div>
								</div>
						    </div>
					    </label>
				    </div>
				</div>
			</li>
			<li>
				<label class="inline">Mobile Unit</label>
				<div id="config-mobile" class="inline">
					<div class="originUI-switch">
					    <input type="checkbox" name="editorToggleMobileSwitch" class="originUI-switchInput" id="editorToggleMobileSwitch" ng:model="embedOptions.mobile">
					    <label class="originUI-switchLabel" for="editorToggleMobileSwitch">
					    	<div class="originUI-switchInner">
					    		<div class="originUI-switchActive">
					    			<div class="originUI-switchText">Yes</div>
							    </div>
							    <div class="originUI-switchInactive">
							    	<div class="originUI-switchText">No</div>
								</div>
						    </div>
					    </label>
				    </div>
				</div>
			</li>
		</ul>
	</div>
	<div class="clear"></div>
	<script type="text/javascript">
		var embedCtrl = function($scope) {
		
			$scope.$watch('embedOptions.close', function(newValue, oldValue) {
				if(newValue === true) {
					$scope.embedOptions.auto = true;
				}
			});
		}
	</script>
</div>