<h3>Log In Here</h3>
<form id="loginform" onsubmit="return false;">
    <div>Email Address:</div>
    <input onfocus="emptyElement('status')" type="text" id="email" autocomplete="username">

    <div>Password:</div>
    <input onfocus="emptyElement('status')" type="password" id="password" autocomplete="current-password">

    <br /><br />
    <button id="loginbtn" onclick="login()">Log In</button> 
    <p id="status"></p>
    <a href="#">Forgot Your Password?</a>
</form>