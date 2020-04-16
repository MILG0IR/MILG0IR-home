<?
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
			<title>Homepage | <?echo$mg_branding['slogan']['value']?></title>
			<link rel="icon" href="<?echo$mg_branding['favicon']['value']?>" type="image/x-icon">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<? include_once($mg_dir['css']."css.php");	?>
		</head>
		<body>
			<!-- JS -->
			<? include_once($mg_dir['js']."js.php"); ?>
			<!-- PRELOADER -->
			<div class="preloader">
				<? include_once($mg_dir['templates']."preloader.php") ?>
			</div>
			<!-- HEADER -->
			<? include_once($mg_dir['templates']."header-navigation.php") ?>
			<!-- CONTENT -->
			<? include_once($mg_dir['pages']."updater.php") ?>
		</body>
	</html>