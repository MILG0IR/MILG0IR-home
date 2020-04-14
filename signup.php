<?php
	include_once("./variables.php");
	if($user_ok) {
		header("location: ".$mg_dir['root']."home.php");
		exit();
	}
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Homepage | <?echo$mg_img['name']?></title>
			<link rel="icon" href="<?echo$mg_img['favicon']?>" type="image/x-icon">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<? include_once($mg_dir['css']."css.php");	?>
		</head>
		<body>
			<!-- PRELOADER -->
				<div class="preloader">
					<? include_once($mg_dir['templates']."preloader.php") ?>
				</div>
			<!-- HEADER -->
				<? include_once($mg_dir['templates']."header-minimal.php") ?>
			<!-- CONTENT -->
				<div class="content">
					<?include_once($mg_dir['forms']."signup.php")?>
				</div>
			<!-- JS -->
			<? include_once($mg_dir['js']."js.php"); ?>
		</body>
	</html>