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
			<title>Homepage | <?php echo$mg_branding['slogan']['value']?></title>
			<link rel="icon" href="<?php echo$mg_branding['favicon']['value']?>" type="image/x-icon">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<?php include_once($mg_dir['css']."css.php");	?>
		</head>
		<body>
			<!-- JS -->
			<?php include_once($mg_dir['js']."js.php"); ?>
			<!-- PRELOADER -->
			<div class="preloader">
				<?php include_once($mg_dir['templates']."preloader.php")		?>
			</div>
			<!-- HEADER -->
			<?php include_once($mg_dir['templates']."header-navigation.php")	?>
			<!-- CONTENT -->
			<div class="content">
			</div>
		</body>
	</html>