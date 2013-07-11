<div id="settings" class="">
	<h2 class="originUI-header"><a href="/administrator" class="originUI-back originUI-hover">Settings</a></h2>
	
	<a href="/administrator/settings/templates" id="settings-templates" class="settings-item originUI-bgColor originUI-shadow originUI-borderColor inline">
		<div class="settings-itemMeta">
			<div class="settings-itemTitle originUI-borderColor">Ad Templates</div>
			<div class="settings-itemDescription">Ad unit template settings - Dimensions, animation, triggers, etc</div>
		</div>		
	</a><!--
	--><a href="/administrator/settings/components" id="settings-components" class="settings-item originUI-bgColor originUI-shadow originUI-borderColor inline">
		<div class="settings-itemMeta">
			<div class="settings-itemTitle originUI-borderColor">Ad Components</div>
			<div class="settings-itemDescription">Components and widgets used in the ad creator</div>
		</div>	
	</a><!--
	--><a href="/administrator/settings/sites" id="settings-demo" class="settings-item originUI-bgColor originUI-shadow originUI-borderColor inline">
		<div class="settings-itemMeta">
			<div class="settings-itemTitle originUI-borderColor">Ad Demo Templates</div>
			<div class="settings-itemDescription">Demo page site templates</div>
		</div>
	</a><!--
	--><a href="/administrator/settings/users" id="settings-users" class="settings-item originUI-bgColor originUI-shadow originUI-borderColor inline">
		<div class="settings-itemMeta">
			<div class="settings-itemTitle originUI-borderColor">User Manager</div>
			<div class="settings-itemDescription">Add/edit/manage users</div>
		</div>
	</a><!--
	--><a href="/administrator/settings/access/?c=-1" id="settings-config" class="settings-item originUI-bgColor originUI-shadow originUI-borderColor inline">
		<div class="settings-itemMeta">
			<div class="settings-itemTitle originUI-borderColor">System Configuration</div>
			<div class="settings-itemDescription">Manage systems access</div>
		</div>
	</a>
</div>
<?php 
	echo $this->Minify->css(array('platform/platformSettings'));