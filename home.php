<?
    include_once("./variables.php");
    if(!$user_ok) {
        header("location: ".$mg_dir['root']."login.php");
    }
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Homepage</title>
			<link rel="icon" href="<?echo$mg_img['favicon']?>" type="image/x-icon">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<? include_once($mg_dir['css']."css.php");	?>
		</head>
		<body>
			<!-- PRELOADER -->
			<div class="preloader">
				<?	include_once($mg_dir['templates']."preloader.php")		?>
			</div>
			<!-- HEADER -->
			<?	include_once($mg_dir['templates']."header-navigation.php")	?>
			<!-- CONTENT -->
			<div class="content">
			</div>
			<!-- JS -->
			<? include_once($mg_dir['js']."js.php"); ?>
		</body>
	</html>