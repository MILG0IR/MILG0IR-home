<form id="signupform" class="signup" onsubmit="return false;">
	<img src="<?echo$mg_branding['texticon']['value']?>">
    <h3>Sign Up Here</h3>

    <div>Username: </div>
        <input id="username" type="text" onblur="checkusername()" onkeyup="restrict('username')" maxlength="16" autocomplete="username">
        <span id="usernamestatus"></span>

    <div>Email Address:</div>
        <input id="email" type="text" onblur="checkemail()" onfocus="emptyElement('status')" onkeyup="restrict('email')" maxlength="88" autocomplete="email">
        <span id="emailstatus"></span>

    <div>Create Password:</div>
        <input id="pass1" type="password" onfocus="emptyElement('status')" maxlength="32" autocomplete="new-password">

    <div>Confirm Password:</div>
        <input id="pass2" type="password" onfocus="emptyElement('status')" maxlength="32" autocomplete="new-password">

    <br /><br />
	<button class="button-primary" id="loginbtn" onclick="signup()">Signup</button>
	<button class="button-secondary" id="" onclick="redirect('<?echo$mg_dir['root']?>login.php')">Go to login</button>
    <span id="status"></span>
</form>