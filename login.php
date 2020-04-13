<?php
	include_once("./variables.php");
	if($user_ok == true){
		header("location: ".$mg_dir['root']."home.php");
		exit();
	}
?><?php

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
				<h3>Log In Here</h3>
				<!-- LOGIN FORM -->
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
				<!-- LOGIN FORM -->
			</div>
		</body>
	</html>