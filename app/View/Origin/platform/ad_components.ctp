<div id="ad-component" data-ng-controller="platformController" data-ng-cloak data-ng-init="init('components')">
	<h2 class="originUI-header"><a href="/administrator/settings" class="originUI-back originUI-hover">Ad Components</a></h2>
	<div id="platform-list" class="originUI-tileLeft originUI-bgColorSecondary originUI-shadow">
		<div id="platformList-header" class="originUI-bgTexture originUI-borderColor originUI-hover" data-ng-click="add()">
			<div id="platformList-headerImage"></div>
			<div id="platformList-headerTitle">Add Ad Component</div>
		</div>
		<ul class="originUI-list">
			<li class="originUI-listItem" data-ng-repeat="item in list|filter:searchOrigin" data-ng-class="(item[model.name].status !== '1')? 'inactive': ''">
				<a href="javascript:void(0)" class="originUI-hover originUI-listItemLink" data-ng-click="edit(item[model.name])" back-img="{{item[model.name].config.img_icon}}">{{item[model.name].name}}</a>
			</li>
		</ul>
	</div><!--
	--><div id="platform-form" class="originUI-tileRight originUI-bgColor originUI-shadow">
		<h3 id="platformForm-header" class="originUI-tileHeader originUI-borderColor originUI-textColor">{{editor.header}}&nbsp;</h3>
		<form id="platformForm-content" name="platformForm" class="" novalidate>
			<?php echo $this->element('platform/components');?>
			<div id="platformForm-buttons">
				<button id="platformForm-remove" class="originUI-hover originUI-button originUI-bgColorSecondary" data-ng-click="remove()" data-ng-show="editor.id">Remove</button>
				<button id="platformForm-submit" class="originUI-hover originUI-button originUI-bgColorSecondary" data-ng-click="save()" data-ng-disabled="platformForm.$invalid">Save</button>
				<div class="clear"></div>
			</div>
		</form>
	</div>
</div>
<?php
	echo $this->Minify->css(array('platform/platformSettings'));
	echo $this->Minify->script(array('platform/platformController'));
