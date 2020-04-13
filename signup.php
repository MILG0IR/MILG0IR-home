<?php
	include_once("./variables.php");
	if($user_ok){
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
			<? include_once($mg_dir['js']."js.php");	?>
			<? include_once($mg_dir['css']."css.php");	?>
		</head>
		<body>
			<div class="preloader">
				<?	include_once($mg_dir['templates']."preloader.php")	?>
			</div>
			<?include_once($mg_dir['templates']."header-minimal.php")?>
			<div class="content">
				<?include_once($mg_dir['forms']."signup.php")?>
			</div>
			<?include_once($mg_dir['templates']."footer.php")?>
		</body>
	</html>