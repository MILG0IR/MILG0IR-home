<form name="signupform" id="signupform" onsubmit="return false;">
    <h3>Sign Up Here</h3>

    <div>Username: </div>
        <input id="username" type="text" onblur="checkusername()" onkeyup="restrict('username')" maxlength="16">
        <span id="unamestatus"></span>

    <div>Email Address:</div>
        <input id="email" type="text" onfocus="emptyElement('status')" onkeyup="restrict('email')" maxlength="88">

    <div>Create Password:</div>
        <input id="pass1" type="password" onfocus="emptyElement('status')" maxlength="16">

    <div>Confirm Password:</div>
        <input id="pass2" type="password" onfocus="emptyElement('status')" maxlength="16">

    <br /><br />
	<button class="btn-primary" id="loginbtn" onclick="login()">Signup</button>
	<button class="btn-secondary" id="" onclick="redirect('<?echo$mg_dir['root']?>login.php')">Go to login</button>
    <span id="status"></span>
</form>