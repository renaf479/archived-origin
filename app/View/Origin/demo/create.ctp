<?php
	$app	= ($demoEdit)? 'demoCreatorEditApp': 'demoCreatorApp';
	$button	= ($demoEdit)? 'Update Demo': 'Save &amp; Create Demo';

	echo $this->Minify->script(array('demo/creator/'.$app));
?>
<script type="text/javascript">
	var origin_ad		= '<?php echo addslashes($origin_ad);?>';	
</script>
<div id="" data-ng-controller="demoCreatorController" data-ng-cloak>
	<div id="demo-panel" class="originUI-bgColor originUI-borderColor">
		<form id="demoPanel-form" name="demoPanelForm" class="" novalidate>
			<input type="hidden" name="uploadDir" value="/assets/demos/"/>
			<input type="hidden" data-ng-model="demo.id" value="demo.id"/>
			
			<h3 id="demoPanel-header" class="originUI-tileHeader originUI-textColor">Demo Creator</h3>
			
			<div id="demoPanel-content" class="originUI-tileContent">
				<ul class="originUI-list">
					<li>
						<label>Name</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" data-ng-model="demo.name" placeholder="Demo Page Title" required>
						</div>
					</li>
					<li id="demoPanel-status">
						<label class="inline">Status</label>
						<div class="originUI-switch inline">
						    <input type="checkbox" name="statusSwitch" class="originUI-switchInput" id="statusSwitch" data-ng-model="demo.status" data-ng-checked="demo.statusSwitch">
						    <label class="originUI-switchLabel" for="statusSwitch">
						    	<div class="originUI-switchInner">
						    		<div class="originUI-switchActive">
						    			<div class="originUI-switchText">Active</div>
								    </div>
								    <div class="originUI-switchInactive">
								    	<div class="originUI-switchText">Inactive</div>
									</div>
							    </div>
						    </label>
					    </div> 
					</li>
					<li>
						<label>Template</label>
						<div class="originUI-field">
							<select class="originUI-select originUI-bgColorSecondary" data-ng-model="demo.templateAlias" data-ng-options="template.OriginSite.alias as template.OriginSite.name for template in templates|filter:{OriginSite.status: '1'}">
								<option style="display:none" value="">Select Group</option>
							</select>
						</div>
					</li>
					<li>
						<label>Placement</label>
						<select class="originUI-select originUI-bgColorSecondary" data-ng-model="demo.placement" data-ng-options="placement.id as placement.name for placement in placements" data-ng-change="demoPlacement()">
							<option style="display:none" value="">Select Placement</option>
						</select>
					</li>
					<?php /*
					<li>
						<div class="originUI-upload">
							<span class="originUI-uploadLabel">Reskin Image</span>
							<input type="file" name="files[]" id="demoPanel-upload-icon" class="originUI-uploadInput" data-ng-model="demo.reskin_img" fileupload>
						</div>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" data-ng-model="demo.reskin_img" placeholder="Reskin CDN Link (optional)"/>
						</div>
					</li>
					<li>
						<label>Reskin Color</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" data-ng-model="demo.reskin_color" placeholder="Reskin Hex Code" maxlength="7" hex>
						</div>
					</li>
					*/
					?>
					<li data-ng-show="link">
						<a href="{{link}}" target="_blank">Demo Link</a>
					</li>
				</ul>
			</div>
			<div class="originUI-tileFooter">
				<button class="originUI-tileFooterCenter" data-ng-click="demoSave()" data-ng-disabled="demoPanelForm.$invalid"><?php echo $button;?></button>
			</div>
		</form>
	</div>
	<div id="demo-site" data-ng-include src="demo.template" onload="demoAdTags()"></div>	
</div>
<script>
	
	
</script>