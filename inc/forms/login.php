<h3>Log In Here</h3>
<form id="loginform" onsubmit="return false;">
    <div>Email Address:</div>
    <input type="text" id="email" onfocus="emptyElement('status')" maxlength="88">

    <div>Password:</div>
    <input type="password" id="password" onfocus="emptyElement('status')" maxlength="100">

    <br /><br />
    <button id="loginbtn" onclick="login()">Log In</button> 
    <p id="status"></p>
    <a href="#">Forgot Your Password?</a>
</form>