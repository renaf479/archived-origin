<div id="ad-component" ng:controller="adComponentsController" ng:cloak>
	<h2 class="originUI-header"><a href="/administrator/settings" class="originUI-back originUI-hover">Ad Components</a></h2>
	<form id="adComponent-create" name="adComponentCreateForm" class="originUI-tileLeft originUI-bgColorSecondary originUI-shadow" novalidate>
		<input type="hidden" name="uploadDir" value="/assets/components/"/>
		<h3 id="adComponent-createHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Create</h3>
		<div class="originUI-tileContent">
			<?php echo $this->element('form_component', array('view'=>'left', 'editor' => 'editor'));?>
			<?php echo $this->element('form_component', array('view'=>'right', 'editor' => 'editor'));?>
		</div>
		<div class="originUI-tileFooter">
			<button class="originUI-tileFooterCenter originUI-hover" ng:click="componentCreate()" ng-disabled="adComponentCreateForm.$invalid">Create</button>
		</div>
	</form><!--
	--><div id="adComponent-list" class="originUI-tileRight originUI-bgColor originUI-shadow">
		<h3 id="adComponent-listHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Ad Templates</h3>
		<table id="adComponent-table" class="originUI-table" cellspacing="0" cellpadding="0" width="100%" border="0">
			<thead class="originUI-tableHead originUI-noSelect">
				<th class="originUI-tableHeadStatus">&nbsp;</th>
				<th class="originUI-tableHeadName" ng:click="componentFilter='OriginComponent.name';reverse=!reverse">Name</th>
				<th class="originUI-tableHeadDescription">Description</th>
				<th class="originUI-tableHeadGroup" ng:click="componentFilter='OriginComponent.group';reverse=!reverse">Group</th>
			</thead>
			<tbody class="originUI-tableBody">
				<tr class="originUI-tableRow originUI-hover" ng:repeat="component in components|orderBy:componentFilter:reverse|filter:searchOrigin" ng:animate="'originUI-fade'" ng:class="(component.OriginComponent.status !== '1')? 'inactive': ''">
					<td class="originUI-tableStatus originUI-tableCell" ng:show="component.OriginComponent.status == '1'" class="userList-status">
						<img src="/img/icon-check-small.png" alt="Active" ng:click="toggleStatus('OriginComponent', component.OriginComponent.id, 'disable')"/>
					</td>
					<td class="originUI-tableStatus originUI-tableCell" ng:show="component.OriginComponent.status != '1'" class="userList-status">
						<img src="/img/icon-cross-small.png" alt="Inactive" ng:click="toggleStatus('OriginComponent', component.OriginComponent.id, 'enable')"/>
					</td>
					<td class="originUI-tableName originUI-tableCell" ng:click="componentEdit(component)" back-img='{{component.OriginComponent.config.img_icon}}'>{{component.OriginComponent.name}} ({{component.OriginComponent.alias}})</td>
					<td class="originUI-tableDescription originUI-tableCell" ng:click="componentEdit(component)">{{component.OriginComponent.content.description}}</td>
					<td class="originUI-tableGroup originUI-tableCell" ng:click="componentEdit(component)">{{component.OriginComponent.group}}</td>
				</tr>
			</tbody>
		</table> 
	</div>
	
	<div modal="originModal" close="componentClose()" options="{backdropClick: false, backdropFade: true}">
		<form id="adComponent-edit" name="adComponentEdit" class="originUI-bgColorSecondary originUI-modal" novalidate>
			<input type="hidden" name="uploadDir" value="/img/components/"/>
			<input type="hidden" ng:model="editorModal.id"/>
			<h3 id="adComponent-editHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Edit Component</h3>
			
			<a href="javascript:void(0)" class="originUI-modalRemove originUI-hover originUI-iconHover" ng:click="componentRemove()">remove</a>
			
			<div class="originUI-modalContent">
				<div class="originUI-modalLeft">
					<?php echo $this->element('form_component', array('view'=>'left', 'editor' => 'editorModal'));?>
				</div><!--
				--><div class="originUI-modalRight">
				<?php echo $this->element('form_component', array('view'=>'right', 'editor' => 'editorModal'));?>
				</div>
				<div class="clear"></div>		
			</div>
			<div class="originUI-tileFooter">
				<button class="originUI-tileFooterLeft originUI-hover" ng:click="componentClose()">Cancel</button>
				<button class="originUI-tileFooterRight originUI-hover" ng:click="componentSave()" ng-disabled="adComponentEdit.$invalid">Save</button>
			</div>
		</form>
	</div>
</div>
<?php
	echo $this->Minify->css(array('platform/platformSettings'));
	echo $this->Minify->script(array('platform/adComponentsController'));