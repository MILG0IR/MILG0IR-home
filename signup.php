<?php
	include_once("./variables.php");
	if($user_ok == true){
		header("location: ".$mg_dir['root']."home.php");
		exit();
	}
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Sign Up</title>
            <link rel="icon" href="favicon.ico" type="image/x-icon">
			<? include_once($mg_dir['js']."ajax.js.php");		?>
			<? include_once($mg_dir['js']."autoscroll.js.php");	?>
			<? include_once($mg_dir['js']."fade-slide.js.php");	?>
			<? include_once($mg_dir['js']."functions.js.php");	?>
			<? include_once($mg_dir['css']."style.css.php");	?>
        </head>
        <body>
            <div id="pageMiddle">
                <h3>Sign Up Here</h3>
                <form name="signupform" id="signupform" onsubmit="return false;">
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
                    <button id="signupbtn" onclick="signup()">Create Account</button>
                    <span id="status"></span>
                </form>
            </div>
        </body>
    </html>