<!DOCTYPE HTML>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout;?></title>
	<?php
		echo $this->Minify->css(array('ad/iframe'));
		echo $this->Minify->script(array('ad/templates/iframe'));
	?>
</head>
<body>
	<?php echo $this->fetch('content'); ?>
</body>
</html>
