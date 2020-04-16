<form id="signupform" class="signup" onsubmit="return false;">
	<img src="<?echo$mg_branding['texticon']['value']?>">
    <h3>Sign Up Here</h3>
    <p>
        <!---->
    </p>
    <input onfocus="emptyElement('status')" onblur="checkusername()" onkeyup="restrict('username')" type="text" id="username" maxlength="16" placeholder="Username:" autocomplete="username">
    <span class="output" id="usernamestatus"></span>
    <input onfocus="emptyElement('status')" onblur="checkemail()" onkeyup="restrict('email')" type="text" id="email" maxlength="88" placeholder="Email Address:" autocomplete="email">
    <span class="output" id="emailstatus"></span>
    <input onfocus="emptyElement('status')" type="password" id="pass1" maxlength="32" placeholder="Password:" autocomplete="new-password">
    <input onfocus="emptyElement('status')" type="password" id="pass2" maxlength="32" placeholder="Confirm Password:" autocomplete="new-password">
    </br>
    </br>
	<button class="button-secondary" onclick="redirect('<?echo$mg_dir['root']?>login.php')">Go to login</button>
	<button class="button-primary" onclick="signup()">Signup</button>
    <span id="status"></span>
</form>