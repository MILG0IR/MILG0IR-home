<form id="loginform" class="login" onsubmit="return false;">
	<img src="<?echo$mg_branding['texticon']['value']?>">
	<h3>Log In</h3>
	<p>
		<!---->
	</p>
	<input onfocus="emptyElement('status')" type="text" id="email" placeholder="Email Address:" autocomplete="username">
	<input onfocus="emptyElement('status')" type="password" id="password" placeholder="Password:" autocomplete="current-password">
	</br>
	</br>
	<button class="button-primary" onclick="login()">Log In</button>
	<button class="button-secondary" onclick="redirect('<?echo$mg_dir['root']?>signup.php')">Go to signup</button>
	<p id="status"></p>
	<a href="<?echo$mg_dir['root']?>forgot_password.php">Forgot Your Password?</a>
</form>