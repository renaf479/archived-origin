<?php if($view === 'left') { ?>

<ul class="originUI-list">
<!--
	<li>
		<label>Display</label>
		<select class="originUI-select originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.type">
			<option style="display:none" value="">Select Display Type</option>
			<option value="inline">Inline</option>
			<option value="outOfPage">Out of Page</option>
			<option value="inlineTop">Top (inline)</option>
			<option value="outOfPageBottom">Bottom (out of page)</option>
		</select>
	</li>
-->
	<li>
		<label>Ad Type</label>
		<select class="originUI-select originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.type">
			<option style="display:none" value="">Select Type</option>
			<option value="default">Standard</option>
			<option value="expand">Expanding</option>
			<option value="overlay">Overlay</option>
			<option value="prestitial">Prestitial</option>
			<option value="interstitial">Interstitial</option>
			<!-- <option value="interstitial" data-ng-show="<?php echo $editor;?>.alias === 'antemeridian' || <?php echo $editor;?>.alias === 'postmeridian'">Interstitial</option> -->
		</select>
	</li>
	<li>
		<label>Position</label>
		<select class="originUI-select originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.position">
			<option style="display:none" value="">Select Position</option>
			<option value="default">Standard (inline)</option>
			<!-- <option value="meridian">Out of Page</option> -->
			<option value="top">Top of the Page</option>
			<option value="bottom">Bottom of the Page</option>
<!--
			<option value="antemeridian">Prestitial</option>
			<option value="postmeridian">Interstitial</option>
-->
			<!--
<option value="ascension">Ascension</option>
			<option value="aurora">Aurora</option>
			<option value="eclipse">Eclipse</option>
			<option value="horizon">Horizon</option>
			<option value="antemeridian">Meridian (Ante)</option>
			<option value="postmeridian">Meridian (Post)</option>
			<option value="nova">Nova</option>
			<option value="singularity">Singularity</option>
-->
		</select>
	</li>
	<li>
		<label>Name</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.name" required/>
		</div>
	</li>
<!--
	<li>
		<label>Alias</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.alias" required/>
		</div>
	</li>
-->
	<li>
		<label>Description</label>
		<div class="originUI-field">
			<div class="originUI-fieldBracket"></div>
			<textarea class="originUI-textarea originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.content.description" required></textarea>
		</div>
	</li>
	<li>
		<div id="adTemplate-storyboardUpload" class="originUI-upload originUI-icon originUiIcon-upload">
			<span class="originUI-uploadLabel">Upload Storyboard</span>
			<input type="file" name="files[]" id="adTemplate-upload-storyboard" class="originUI-uploadInput" ng:model="<?php echo $editor;?>.content.file_storyboard" fileupload>
		</div>
	</li>
	<li>
		<div id="adTemplate-guidelineUpload" class="originUI-upload originUI-icon originUiIcon-upload">
			<span class="originUI-uploadLabel">Upload Guidelines</span>
			<input type="file" name="files[]" id="adTemplate-upload-guideline" class="originUI-uploadInput" ng:model="<?php echo $editor;?>.content.file_guideline" fileupload>
		</div>
	</li>
</ul>

<?php } else if($view === 'right') { ?>
<accordion close-others="true" id="adTemplate-templateConfig" class="originUI-accordion originUI-superAdmin">
	<?php 
		$platforms	= array('Desktop', 'Tablet', 'Mobile');
		foreach($platforms as $key=>$platform) {
			$isOpen	= ($key === 0)? "true": "false";
	?>
	<accordion-group heading="<?php echo $platform;?> Dimensions" is-open="<?php echo $isOpen;?>" class="">
		<div class="inline adTemplate-config">					
			<label class="originUI-label inline">Initial Width</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.dimensions.Initial.<?php echo $platform;?>.width"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Initial Height</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.dimensions.Initial.<?php echo $platform;?>.height"/>
			</div>
		</div>
		<div class="inline adTemplate-config">					
			<label class="originUI-label inline">Triggered Width</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.dimensions.Triggered.<?php echo $platform;?>.width"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Triggered Height</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.dimensions.Triggered.<?php echo $platform;?>.height"/>
			</div>
		</div>
	</accordion-group>
	<?php }//End-foreach ?>
	<accordion-group heading="Animation">
		<div id="adTemplate-configSelector" class="inline adTemplate-config">
			<label class="originUI-label">Selector</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.selector"/>
			</div>
		</div>
		<div id="adTemplate-configTrigger" class="inline adTemplate-config">
<!--
			<label class="originUI-label">Trigger Effect</label>
			<select class="originUI-select originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.trigger">
				<option style="display:none" value="">Select Trigger</option>
				<option value="expand">Expand</option>
				<option value="overlay">Overlay</option>
				<option value="interstitial" data-ng-show="<?php echo $editor;?>.alias === 'antemeridian' || <?php echo $editor;?>.alias === 'postmeridian'">Interstitial</option>
			</select>
-->
			<!--
<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.selector"/>
			</div>
-->
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Selector Start</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.start"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Selector End</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.end"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Opening Duration</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.openDuration"/>
			</div>
		</div>
		<div class="inline adTemplate-config">
			<label class="originUI-label">Closing Duration</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="<?php echo $editor;?>.config.animations.closeDuration"/>
			</div>
		</div>
	</accordion-group>
</accordion>
<?php } ?>