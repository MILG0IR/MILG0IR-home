<?
    include_once("./variables.php");
    if(!$user_ok) {
        header("location: ".$mg_dir['root']."login.php");
    }
?>
<!DOCTYPE html>
	<html>
		<head>
			<? include_once($mg_dir['js']."js.php");	?>
			<? include_once($mg_dir['css']."css.php");	?>
		</head>
		<body>
			<div class="preloader">
				<?	include_once($mg_dir['templates']."preloader.php")	?>
			</div>
			<?	include_once($mg_dir['templates']."header.php")		?>
			<?	include_once($mg_dir['templates']."sidebar.php")	?>
			<div class="content">
			</div>
		</body>
	</html>