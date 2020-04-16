<?php
	include_once("./db/db_conx.php");
	if(!$user_ok) {
		header("location: ".$mg_dir['root']."login.php");
		exit();
	}
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Logout | <?echo$mg_branding['slogan']['value']?></title>
			<link rel="icon" href="<?echo$mg_branding['favicon']['value']?>" type="image/x-icon">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<? include_once($mg_dir['css']."css.php");	?>
		</head>
		<body OnLoad="logout()">
			<!-- JS -->
			<? include_once($mg_dir['js']."js.php"); ?>
			<!-- CONTENT -->
				<div class="content">
					<?	include_once($mg_dir['templates']."logout.php")	?>
				</div>
		</body>
	</html>