<div class="originUI-field">
	<div class="originUI-fieldBracket"></div>
	<textarea id="embedModal-content" class="originUI-textarea originUI-bgColorSecondary"><?php echo $this->element('origin_embed');?></textarea>
	
<!-- 	<textarea id="embedModal-content" class="originUI-textarea originUI-bgColorSecondary"><script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/min-js?f=/js/ad/origin.js" data-auto="{{embedOptions.auto}}" data-close="{{embedOptions.close}}" data-hover="{{embedOptions.hover}}" data-dcopt="true" data-id="<?php echo $this->params['originAd_id'];?>" data-type="{{workspace.ad.OriginAd.config.template}}" data-xd="local.origin_test_prod" data-init="true"></script></textarea> -->
</div>
<div id="embedModal-config">
	<ul class="originUI-list">
		<li>
			<label class="inline">Auto Open</label>
			<div id="config-auto" class="inline">
				<div class="originUI-switch">
				    <input type="checkbox" name="editorToggleAutoSwitch" class="originUI-switchInput" id="editorToggleAutoSwitch" ng:model="embedOptions.auto" ng:checked="editor.content.event">
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
<!--
			<label class="inline">Frequency Cap (per 24hrs)</label>
			<div class="originUI-field inline">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="embedOptions.auto"/>
			</div>
-->
		</li>
		<!--
<li>
			<label>Close Timer (seconds)</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="embedOptions.close"/>
			</div>
		</li>
		<li>
			<label>Hover Delay (seconds)</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="embedOptions.hover"/>
			</div>
		</li>
-->
<!--
		<li>
			<label class="inline">Background Color</label>
			<div id="config-hex" class="originUI-field inline">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="embedOptions.hex" hex/>
			</div>
		</li>
-->
	</ul>
</div>