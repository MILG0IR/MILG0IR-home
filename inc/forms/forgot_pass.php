<form id="loginform" class="login" onsubmit="return false;">
	<img src="<?php echo$mg_branding['texticon']['value']?>">
	<h3>Forgot password</h3>
	<p>
		If you have forgotten your password please enter your email address
		below and we will send you an email with a reset link if an account
		with that email address exists.
	</p>
	<input onfocus="emptyElement('status')" type="text" id="email" placeholder="Email address:" autocomplete="username">
	</br>
	</br>
	<button class="button-secondary" onclick="redirect('<?php echo$mg_dir['root']?>login.php')">Go to login</button>
	<button class="button-primary" onclick="forgotpassword()">Submit</button>
	<p id="status"></p>
</form>