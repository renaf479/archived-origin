<!-- <div ng:include src="demo.template"></div> -->
<script type="text/javascript">
	var _config			= '<?php echo $demo;?>';
	var origin_embed	= '<?php echo urlencode($this->element('origin_embed'));?>';
</script>

<div ng:cloak>
	<div ng:include src="demo.template" onload="demoAdTags()"></div>
	<div id="demoQR">
		<!-- <span id="demoQR-title">Hover to Display QR</span> -->
		<div style="background-image: url(https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=<?php echo urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);?>&choe=UTF-8)"; id="demoQR-image"></div>
	</div>
</div>
