<?php
	$url		= $_SERVER['REQUEST_URI'];
	$path		= parse_url($url);
	$path		= explode('/', $path['path']);
	$path		= $path[1];
	$linkLogo	= ($path === 'administrator')? '/administrator': '/';
	
	$userId		= $this->UserAuth->getUserId();
	//$linkLogo	= ($userId)? '/administrator/': '/';
	$class 		= ($userId)? 'originBar-user': 'originBar-guest';
?>
<div id="origin-bar" class="originUI-borderColor <?php echo $class;?>">
	<div class="wrapper">
		<?php if($userId) {?>
			<div id="originBar-logo">
				<div id="originBar-logoIcon" class="originUI-borderColor dropdown-toggle">Origin</div>
				<ul id="originBar-logoMenu" class="dropdown-menu originUI-bgColorSecondary originUI-borderColor">
					<li>
						<a href="/" id="originBar-home" class="originBar-settings originUI-hover">Homepage</a>
					</li>
					<li>
						<a href="/administrator/" id="originBar-dashboard" class="originBar-settings originUI-hover">Dashboard</a>
					</li>
				</ul>
			</div>
		<?php } else { ?>
			<div id="originBar-logo">
				<a href="<?php echo $linkLogo;?>" id="originBar-logoIcon" class="originUI-borderColor">Origin</a>
			</div>
		<?php } ?>
		
		
		<div id="originBar-search" class="originUI-field" data-intro="Page search" data-position="left">
			<div class="originUI-fieldBracket"></div>
			<input type="text" class="originUI-input originUI-bgColor" ng:model="searchOrigin"/>
		</div>
		
		<?php if($userId) {?>
		<div id="originBar-settings" class="">
			<div id="originBar-settingsIcon" class="originUI-borderColor dropdown-toggle">Settings</div>
			<ul class="dropdown-menu originUI-bgColorSecondary originUI-borderColor">
				
				<?php if($this->UserAuth->isAdmin()) { ?>
				<li>
					<a href="/administrator/settings/profile/<?php echo $userId;?>" id="originBar-account" class="originBar-settings originUI-hover">My Account</a>
				</li>
				<li>
					<a href="/administrator/settings" id="originBar-config" class="originBar-settings originUI-hover">Settings</a>
				</li>
				<?php } else { ?>
				<li>
					<a href="/administrator/settings/password" id="originBar-account" class="originBar-settings originUI-hover">Update Password</a>
				</li>
				<?php } ?>
				<li>
					<a href="/administrator/logout" id="originBar-logout" class="originBar-settings originUI-hover">Logout</a>
				</li>		
			</ul>
		</div>
		<?php } else { ?>
			<form id="originBar-login" name="UserLoginForm" class="originBar-login" method="post" action="/administrator/login" data-intro="Login for  access to Origin Ad Creator" data-position="right" novalidate>
				<div id="login-email" class="inline">
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" class="originUI-input originUI-bgColorSecondary" name="data[User][email]" id="UserEmail" placeholder="Username or Email" required/>
					</div>
				</div>
				<div id="login-password" class="inline">
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="password" class="originUI-input originUI-bgColorSecondary" name="data[User][password]" id="UserPassword" placeholder="Password" required/>
					</div>
				</div>
				<button id="originBar-loginSubmit" class="originUI-bgColorSecondary" ng:click="formSubmit('UserLoginForm')" ng-disabled="UserLoginForm.$invalid">Login</button>
				<div id="login-settings" class="">
				<?php 
					if(!isset($this->request->data['User']['remember'])) {
						$this->request->data['User']['remember']=true;
						$checked	= "checked='checked'";
					} else {
						$checked	= "";
					}
				?>
					<div class="inline login-remember-input">
						<input type="hidden" value="0" id="remember_" name="data[User][remember]">
						<input type="checkbox" id="remember" value="1" name="data[User][remember]"<?php echo $checked;?>>
						<label for="remember">Remember me</label>
					</div> |
					<a class="inline login-forgot" href="/administrator/forgotPassword">Forgot Password?</a>
				</div>
			</form>
		<?php } ?>
		<div id="originBar-help" class="originUI-hover originUI-borderColor" help>Help</div>
	</div>
</div>