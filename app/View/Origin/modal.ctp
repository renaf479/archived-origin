<form id="" name="adListModal" class="originUI-bgColorSecondary" ng:app ng:controller="modalCtrl" novalidate>
	<h3 id="modalHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor"><?php echo $template;?></h3>
	<div id="" class="originUI-modalContent">
		<?php echo $this->element('modals/'.$template);?>
	</div>
	<div class="originUI-tileFooter">
		<div class="originUI-tileFooterCenter originUI-hover" ng:click="originModalClose()">Close</div>
	</div>
</form>
<script type="text/javascript">
	var modalCtrl = function($scope) {
		$scope.originModalClose = function() {
			close();
		}
	}
</script>