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
			<link rel="stylesheet" type="text/css" theme-type="navbar" href="<?php print($mg_dir['themes'])?>1.theme-nav.css">
			<link rel="stylesheet" type="text/css" theme-type="main" href="<?php print_r($mg_dir['themes'])?>dark.theme-main.css">
		</head>
		<body data-nav-theme="1" data-main-theme="dark" data-uid="<?php print($userdata['uid'])?>" onLoad="checkForNewChats('initial'); checkforupdate(<?php echo "'".$app_info['Version']."', '".$app_info['Device']."', '".$app_info['Branch']."'" ?>);">
			<unsupported> Your browser is currently unsuported. Please upgrade to a newer version. </unsupported>
			<script name="PRE">
				changetheme('main', $("body").data("main-theme"));
				changetheme('nav', $("body").data("nav-theme"));
			</script>
			<div class="main-content">
				<?php include_once($mg_dir['fragments']."preloader") ?>
				<?php include_once($mg_dir['fragments']."header") ?>
				<?php include_once($mg_dir['fragments']."navbar") ?>
				<div id="parent" class="pages-content"  onclick="userPanel(null)">
					<div class="preloader">
						<div class="sk-fading-circle">
							<div class="sk-circle1 sk-circle"></div>
							<div class="sk-circle2 sk-circle"></div>
							<div class="sk-circle3 sk-circle"></div>
							<div class="sk-circle4 sk-circle"></div>
							<div class="sk-circle5 sk-circle"></div>
							<div class="sk-circle6 sk-circle"></div>
							<div class="sk-circle7 sk-circle"></div>
							<div class="sk-circle8 sk-circle"></div>
							<div class="sk-circle9 sk-circle"></div>
							<div class="sk-circle10 sk-circle"></div>
							<div class="sk-circle11 sk-circle"></div>
							<div class="sk-circle12 sk-circle"></div>
						</div>
					</div>
				</div>
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
					openpage(0)
					$(".preloader-wrapper").hide();
					date_time('header-time', false, true, true);

					setInterval(function(){
						checkForNewChats("update");
					}, 1500);
				});
			</script>
		</body>
	</html>