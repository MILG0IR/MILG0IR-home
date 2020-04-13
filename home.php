<?
    include_once("./variables.php");
    if(!$user_ok) {
        header("location: ".$mg_dir['root']."login.php");
    }
?>
<!DOCTYPE html>
	<html>
		<head>
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
			</div>
		</body>
	</html>