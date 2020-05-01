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
			<div class="notify">
				<div class="toast success" onclick="toast('warn', 'heading', 'subheading')">
					<div class="toast-icon">
						<img src="<?php print($mg_img['multimedia']['exclamation']['image']) ?>"></img>
					</div>
					<div class="toast-content">
						<p class="toast-type">Success</p>
						<p class="toast-message">Anyone with access can view your invited visitors.</p>
					</div>
					<div class="toast-close">
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 15.642 15.642" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 15.642 15.642">
							<path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>
						</svg>
					</div>
				</div>
			</div>
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

					jQuery('.toast-close').click(function(e){
						e.preventDefault();
						var parent = $(this).parent('.toast');
						parent.fadeOut("slow", function() { $(this).remove(); } );
					});
				});
			</script>
		</body>
	</html>