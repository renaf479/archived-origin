<div id="properties-left" class="inline">
	<ul class="originUI-list">
		<li>
			<label class="properties-label inline">Name</label>
			<input type="text" class="properties-input inline" data-ng-model="originAdProperties.name" required input-text/>
		</li>
		<li>
			<label class="properties-label inline">Status</label>
			<input-switch class="properties-input inline originUI-switch" name="statusSwitch" active="Yes" inactive="No" data-ng-model="originAdProperties.status" data-ng-checked="originAdProperties.status === '1'"></input-switch>
		</li>
		<li>
			<label class="properties-label inline">Showcase</label>
			<input-switch class="properties-input inline originUI-switch" name="showcaseSwitch" active="Yes" inactive="No" data-ng-model="originAdProperties.showcase" data-ng-checked="originAdProperties.showcase === '1'"></input-switch>
		</li>
		<li>
			<label class="properties-label inline">Ad Type</label>
			<select class="properties-input inline originUI-select originUI-bgColorSecondary" data-ng-model="originAdProperties.config.type" data-ng-change="templateSelect('editor', editor.config.type)">
				<option style="display:none" value="">Select Type</option>
				<option value="default">Standard</option>
				<option value="expand">Expanding</option>
				<option value="overlay">Overlay</option>
				<option value="prestitial">Prestitial</option>
				<option value="interstitial">Interstitial</option>
			</select>
		</li>
		<li>
			<label class="properties-label inline">Placement</label>
			<select class="properties-input inline originUI-select originUI-bgColorSecondary" data-ng-model="originAdProperties.config.placement">
				<option style="display:none" value="">Select Placement</option>
				<option value="default">Standard (inline)</option>
				<option value="top">Top of the Page</option>
				<option value="bottom">Bottom of the Page</option>
			</select>
		</li>
		<li>
			<label class="properties-label inline">GA ID</label>
			<input type="text" class="properties-input inline" data-ng-model="originAdProperties.content.ga_id" required input-text/>
		</li>
	</ul>
</div>
<div id="properties-right" class="inline">
</div>