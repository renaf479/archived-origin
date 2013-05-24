<!DOCTYPE HTML>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout;?></title>
	<style>
		body {
			margin: 0;
		}
	</style>
</head>
<body>
	<?php echo $this->fetch('content'); ?>
</body>
</html>
