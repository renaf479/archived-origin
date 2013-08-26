<?php
$cakeDescription 	= __d('cake_dev', 'Origin');
$userAdmin			= ($this->UserAuth->isAdmin())? 'originUI-superAdmin': '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout;?> | Origin</title>
	<link rel="shortcut icon" href="/favicon.ico"/>
	<?php
		echo $this->Minify->css(array('plugins/normalize', 'plugins/bootstrap', 'plugins/codemirror', 'plugins/chardinjs', 'plugins/antiscroll', 'platform/originUI'));
		echo $this->Minify->script(array('plugins/jquery', 'plugins/jquery.ui.widget', 'plugins/jquery.fileupload', 'plugins/chardinjs.min', 'plugins/jquery.mousewheel', 'plugins/nanoscroller', 'plugins/meny.min', 'plugins/angular/angularjs', 'plugins/angular/angular-ui', 'plugins/angular/angularui-bootstrap', 'platform/platformApp', 'platform/modalServices', 'platform/notificationServices', 'platform/restServices', 'controller', 'platform/platformDirectives', 'platform/filters'));
	?>
</head>
<body class="originUI-bgTexture <?php echo $userAdmin;?> <?php echo 'originClass-'.$this->params['action'];?>" ng:app="platformApp" ng:controller="originGeneral">
	<?php echo $this->element('platform/notification');?>
	<?php echo $this->element('platform/bar');?>
	<div id="container" class="wrapper">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
	<?php echo $this->element('platform/footer');?>
</body>
</html>
