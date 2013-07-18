<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout;?> | Origin</title>
	<link rel="shortcut icon" href="/favicon.ico"/>
	<?php
		echo $this->Minify->css(array('plugins/normalize', 'plugins/bootstrap', 'plugins/chardinjs', 'platform/originUI', 'platform/platformSettings', 'demo/public'));
		echo $this->Minify->script(array('plugins/jquery', 'plugins/jquery-ui.min', 'plugins/jquery-touch', 'plugins/jquery.fileupload', 'plugins/chardinjs.min', 'plugins/meny.min', 'plugins/angular/angularjs', 'platform/notificationServices', 'platform/restServices', 'platform/platformDirectives', 'demo/creator/demoCreatorController', 'demo/shared/demoServices', 'demo/shared/demoDirectives'));
	?>
</head>
<body ng:app="demoCreatorApp">
	<?php echo $this->fetch('content'); ?>
</body>
</html>
