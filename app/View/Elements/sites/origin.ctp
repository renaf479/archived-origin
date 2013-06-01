<div id="demo-reskin" back-img='{{demo.reskin_img}}' ng:style="reskin">
	<?php echo $this->element('bar');?>
	<div id="originDemo-wrapper">
		<div class="embedLeaderboard">
			<adTag data-name="Leaderboard" id="embedLeaderboard" class="embedAd" ng:bind-html-unsafe="embedLeaderboard"></adTag>
			<img src="http://placehold.it/970x66" ng:show="!embedLeaderboard"/>
		</div>
	
		<div id="originDemoContent-wrapper" class="originUI-bgColor">		
			<div id="originDemoContent-left" class="inline">
			</div><!--
			--><div id="originDemoContent-right" class="inline">
					<div class="embedSidebar">
						<adTag data-name="Sidebar" id="embedSidebar" class="embedAd" ng:bind-html-unsafe="embedSidebar"></adTag>
						<img src="http://placehold.it/300x250" ng:show="!embedSidebar"/>
					</div>
			</div>
		</div>
	</div>
	<adTag data-name="Out of Page" id="embedOutOfPage" ng:bind-html-unsafe="embedOutOfPage"></adTag>
	<?php echo $this->element('footer');?>
</div>
<?
	echo $this->Minify->css(array('origin', 'demo/originDemo'));