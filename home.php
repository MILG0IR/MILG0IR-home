<?php
    include_once("./db/db_conx.php");
    if(!$user_ok) {
		header("location: ".$mg_dir['root']."login.php");
		exit();
    }
?>
<?php
	$sql = "SELECT `id` FROM `var_pages` WHERE `title`='Homepage' LIMIT 1";
	$query = mysqli_query($db_conx, $sql);
	$row = mysqli_fetch_row($query);
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
		<body Onload="openpage(<?php echo $row[0]; ?>)">
			<!-- PRELOADER -->
				<div class="preloader">
					<?php include_once($mg_dir['templates']."preloader.php")		?>
				</div>
			<!-- HEADER -->
				<?php include_once($mg_dir['templates']."header.php")	?>
			<!-- CONTENT -->
				<div id="parent" class="content nav-inset"></div>
			<!-- JS -->
				<?php include_once($mg_dir['js']."js.php"); ?>
		</body>
	</html>