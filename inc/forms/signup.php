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
    <input onfocus="emptyElement('status')" onblur="checkpassword()" type="password" id="pass1" maxlength="32" placeholder="Password:" autocomplete="new-password">
    <span class="output" id="pass1status"></span>
    <input onfocus="emptyElement('status')" onblur="checkpassword()" type="password" id="pass2" maxlength="32" placeholder="Confirm Password:" autocomplete="new-password">
    <span class="output" id="pass2status"></span>
    <input onfocus="emptyElement('status')" onblur="checkreference()" onkeyup="restrict('username')" type="text" id="reference" maxlength="15" placeholder="reference code:" autocomplete="">
    <span class="output" id="referencestatus"></span>
    </br>
    </br>
	<button class="button-primary" onclick="signup()">Signup</button>
	<button class="button-secondary" onclick="redirect('<?echo$mg_dir['root']?>login.php')">Go to login</button>
    <span id="status"></span>
</form>