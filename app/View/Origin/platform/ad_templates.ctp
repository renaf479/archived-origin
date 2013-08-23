<div id="ad-template" data-ng-controller="platformController" data-ng-cloak data-ng-init="init('templates')">
	<h2 class="originUI-header"><a href="/administrator/settings" class="originUI-back originUI-hover">Ad Templates</a></h2>
	<div id="platform-list" class="originUI-tileLeft originUI-bgColorSecondary originUI-shadow">
		<div id="platformList-header" class="originUI-bgTexture originUI-borderColor originUI-hover" data-ng-click="add()">
			<div id="platformList-headerImage"></div>
			<div id="platformList-headerTitle">Add Ad Template</div>
		</div>
		<ul class="originUI-list">
			<li class="originUI-listItem" data-ng-repeat="item in list|filter:searchOrigin" data-ng-class="(item[model.name].status !== '1')? 'inactive': ''">
				<a href="javascript:void(0)" class="originUI-hover originUI-listItemLink" data-ng-click="edit(item[model.name])">{{item[model.name].name}}</a>
			</li>
		</ul>
	</div><!--
	--><div id="platform-form" class="originUI-tileRight originUI-bgColor originUI-shadow">
		<h3 id="platformForm-header" class="originUI-tileHeader originUI-borderColor originUI-textColor">{{editor.header}}&nbsp;</h3>
		<form id="platformForm-content" name="platformForm" class="" novalidate>
			<?php echo $this->element('platform/templates');?>
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


/*
<div id="ad-template" ng:controller="adTemplatesController" ng:cloak>
	<h2 class="originUI-header"><a href="/administrator/settings" class="originUI-back originUI-hover">Ad Templates</a></h2>
	<form id="adTemplate-create" name="adTemplateCreateForm" class="originUI-tileLeft originUI-bgColorSecondary originUI-shadow" novalidate>
		<input type="hidden" name="uploadDir" value="/assets/templates/"/>
		<h3 id="adTemplate-createHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Create</h3>
		<div class="originUI-tileContent">
			<?php echo $this->element('platform/form_template', array('view'=>'left', 'editor' => 'editor'));?>
			<?php echo $this->element('platform/form_template', array('view'=>'right', 'editor' => 'editor'));?>
		</div>
		<div class="originUI-tileFooter">
			<button class="originUI-tileFooterCenter originUI-hover" ng:click="templateCreate()" ng-disabled="adTemplateCreateForm.$invalid">Create</button>
		</div>
	</form>
	<div id="adTemplate-list" class="originUI-tileRight originUI-bgColor originUI-shadow">
		<h3 id="adTemplate-listHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Ad Templates</h3>
		<table id="adTemplate-table" class="originUI-table" cellspacing="0" cellpadding="0" width="100%" border="0">
			<thead class="originUI-tableHead originUI-noSelect">
				<th class="originUI-tableHeadStatus">&nbsp;</th>
				<th class="originUI-tableHeadName" ng:click="templateFilter='OriginTemplate.name';reverse=!reverse">Name</th>
				<th class="originUI-tableHeadDescription">Description</th>
				<th class="originUI-tableHeadGroup" ng:click="templateFilter='OriginTemplate.config.type';reverse=!reverse">Type</th>
				<th class="originUI-tableHeadGroup" ng:click="templateFilter='OriginTemplate.config.placement';reverse=!reverse">Placement</th>
			</thead>
			<tbody class="originUI-tableBody">
				<tr class="originUI-tableRow originUI-hover" ng:repeat="template in templates|orderBy:templateFilter:reverse|filter:searchOrigin" ng:class="(template.OriginTemplate.status !== '1')? 'inactive': ''">
					<td class="originUI-tableStatus originUI-tableCell" ng:show="template.OriginTemplate.status == '1'" class="userList-status">
						<img src="/img/icon-check-small.png" alt="Active" ng:click="toggleStatus('OriginTemplate', template.OriginTemplate.id, 'disable')"/>
					</td>
					<td class="originUI-tableStatus originUI-tableCell" ng:show="template.OriginTemplate.status != '1'" class="userList-status">
						<img src="/img/icon-cross-small.png" alt="Inactive" ng:click="toggleStatus('OriginTemplate', template.OriginTemplate.id, 'enable')"/>
					</td>
					<td class="originUI-tableName originUI-tableCell" ng:click="templateEdit(template)">{{template.OriginTemplate.name}}</td>
					<td class="originUI-tableDescription originUI-tableCell" ng:click="templateEdit(template)">{{template.OriginTemplate.content.description}}</td>
					<td class="originUI-tableGroup originUI-tableCell" ng:click="templateEdit(template)">{{template.OriginTemplate.config.type}}</td>
					<td class="originUI-tableGroup originUI-tableCell" ng:click="templateEdit(template)">{{template.OriginTemplate.config.placement}}</td>
				</tr>
			</tbody>
		</table> 
	</div>
	
	<div modal="originModal" close="templateClose()" options="{backdropClick: false, backdropFade: true}">
		<form id="adTemplate-edit" name="adTemplateEdit" class="originUI-bgColorSecondary originUI-modal">
			<input type="hidden" name="uploadDir" value="/img/templates/"/>
			<input type="hidden" ng:model="editorModal.id"/>
			<h3 id="adTemplate-editHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Edit Template</h3>
			
			<a href="javascript:void(0)" class="originUI-modalRemove originUI-hover originUI-iconHover" ng:click="templateRemove()">remove</a>
			
			<div class="originUI-modalContent">
				<div class="originUI-modalLeft">
					<?php echo $this->element('platform/form_template', array('view'=>'left', 'editor' => 'editorModal'));?>
				</div><!--
				--><div class="originUI-modalRight">
				<?php echo $this->element('platform/form_template', array('view'=>'right', 'editor' => 'editorModal'));?>
				</div>
				<div class="clear"></div>		
			</div>
			<div class="originUI-tileFooter">
				<button class="originUI-tileFooterLeft originUI-hover" ng:click="templateClose()">Cancel</button>
				<button class="originUI-tileFooterRight originUI-hover" ng:click="templateSave()" ng-disabled="adTemplateEdit.$invalid">Save</button>
			</div>
		</form>
	</div>
</div>
<?php
	echo $this->Minify->css(array('platform/platformSettings'));
	echo $this->Minify->script(array('platform/adTemplatesController'));

*/
?>