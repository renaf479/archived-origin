<?php if($view === 'left') { ?>
	<ul class="originUI-list">
		<li>
			<label class="inline adSettings-label">Name</label>
			<div class="originUI-field inline">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.name" required/>
			</div>
		</li>
		<li id="formCreate-status">
			<label class="inline adSettings-label">Status</label>
			<div class="originUI-switch inline">
			    <input type="checkbox" name="statusSwitch" class="originUI-switchInput" id="statusSwitch" ng:model="editor.status" ng:checked="editor.statusSwitch">
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
		<li id="formCreate-analytics">
			<label class="inline adSettings-label">Google Analytics Tracking</label>
			<div class="originUI-field inline">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.content.ga_id"/>
			</div>
		</li>
		<li id="formCreate-hex">
			<label class="inline adSettings-label">BG Color</label>
			<div class="originUI-field inline">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.content.hex" maxlength="7" hex/>
			</div>
		</li>
		<li class="originUI-superAdmin">
			<div id="formCreate-thumbnail" class="originUI-upload">
				<span class="originUI-uploadLabel">Preview Image (optional)</span>
				<input type="file" name="files[]" id="settings-upload-image" class="originUI-uploadInput" ng:model="editor.content.img_thumbnail" fileupload>
			</div>
<!-- 			<div id="formCreate-preview" class="originUI-borderColorSecondary originUI-bgColor" ng:class="{'originUI-placeholder': editor.content.img_thumbnail == ''}" back-img='{{editor.content.img_thumbnail}}'></div> -->
		</li>
<!--
		<li class="originUI-superAdmin">
			<img id="formCreate-preview" ng:src="{{editor.content.img_thumbnail}}"/>
		</li>
-->
	</ul>
<?php } else if($view === 'right') { ?>
	<a href="javascript:void(0)" class="originUI-superAdmin originUI-hover" id="formCreate-toggle" ng:click="templateToggle()"></a>
	<select id="formCreate-template" class="originUI-select originUI-bgColorSecondary" ng:model="editor.template" ng:options="template.OriginTemplate.name for template in templates|filter:{OriginTemplate.status: '1'}" ng:change="templateLoad()" required>
		<option style="display:none" value="">Select Template</option>
	</select>
	<div ng:show="editor.advance == false">
		<div ng:show="editor.template == null">
		</div>
		<div ng:show="editor.template != ''">
			<!-- <img ng:src="{{editor.template.OriginTemplate.content.file_storyboard}}"/> -->
			<!-- {{editor.template.OriginTemplate.content.description}} -->
			<img ng:src="{{editor.template.OriginTemplate.content.file_storyboard}}" ng:show="editor.template.OriginTemplate.content.file_storyboard"/>
		</div>
	</div>
	<div ng:show="editor.advance == true">
		<?php echo $this->element('form_template', array('view'=>'right', 'editor' => 'editor'));?>
	</div>
<?php } ?>