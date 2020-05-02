<?php
	include_once("./db/db_conx.php");
	if(!$user_ok) {
		header("location: ".$mg_dir['root']."login.php");
		exit();
	}
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Homepage | <?php echo$mg_branding['slogan']['value']?></title>
			<link type="image/x-icon" rel="icon" href="<?php echo$mg_branding['favicon']['value']?>">
			<?php include_once($mg_dir['assets']."header") ?>
			<?php include_once($mg_dir['js']."functions") ?>
			<?php include_once($mg_dir['css']."css.php");	?>
			<link rel="stylesheet" type="text/css" theme-type="navbar" href="<?php print($mg_dir['themes'])?>1.theme-nav.css">
			<link rel="stylesheet" type="text/css" theme-type="main" href="<?php print_r($mg_dir['themes'])?>dark.theme-main.css">
		</head>
		<body data-nav-theme="1" data-main-theme="dark" onLoad="openpage('0', '0'); checkforupdate(<?php echo "'".$app_info['Version']."', '".$app_info['Device']."', '".$app_info['Branch']."'" ?>);">
			<script name="PRE">
				changetheme('main', $("body").data("main-theme"));
				changetheme('nav', $("body").data("nav-theme"));
			</script>
			<div class="main-content">
				<?php include_once($mg_dir['fragments']."preloader") ?>
				<?php include_once($mg_dir['fragments']."header") ?>
				<?php include_once($mg_dir['fragments']."navbar") ?>
				<div id="parent" class="pages-content"  onclick="userPanel(null)"></div>
			</div>
			<div class="popup"></div>
			<div class="notify"></div>
			<script name="POST">
				PullToRefresh.init({
					mainElement: '.main-content',
					triggerElement: '.header',
					onRefresh: function (done) {
						setTimeout(function () {
							window.location.reload(false);
							done();
						}, 0);
					}
				});
				$(document).ready(function() {
					$(".preloader-wrapper").hide();
					date_time('header-time', false, true, true);
				});
			</script>
		</body>
	</html>