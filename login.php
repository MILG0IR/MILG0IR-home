<?php
	include_once("./variables.php");
#	if($user_ok == true){
#		header("location: ".$mg_dir['root']."home.php");
#		exit();
#	}
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
			<div class="preloader">
			</div>
			<div class="content">
				<?include_once($mg_dir['forms']."login.php")?>
			</div>
		</body>
	</html>