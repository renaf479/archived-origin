
<form id="" name="adListModal" class="originUI-bgColorSecondary" novalidate>
	<h3 id="" class="originUI-tileHeader originUI-borderColor originUI-textColor"><?php echo $template;?></h3>
	<div id="" class="originUI-modalContent">
		<?php echo $this->element('modals/'.$template);?>
	</div>
	<div class="originUI-tileFooter">
		<div class="originUI-tileFooterLeft originUI-hover" ng:click="$parent.originModalClose()">Cancel</div>
		<button class="originUI-tileFooterRight originUI-hover" ng:click="adCreateSave()" ng:show="editor.type=='create'" ng-disabled="adListModal.$invalid">Save</button>
	</div>
</form>
