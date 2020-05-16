<?php
	include_once("./db/db_conx.php");
	if($user_ok) {
		header("location: ".$mg_dir['root']."home.php");
		exit();
	}
	$data = json_decode(file_get_contents("https://raw.githubusercontent.com/MILG0IR/MILG0IR-home-broadcasts/master/broadcast.json?".mt_rand()), true);
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
			<style>
				.header-title {
					border: none; }
				div[data-local-page="Login"] .panel {
					position: absolute;
					display: block;
					height: 100%;
					width: 100%; }
				div[data-local-page="Login"] .panel section.login {
					background: var(--main-panel-background);
					height: calc(70% - 0.5px);
					width: 100%; }
				div[data-local-page="Login"] .panel section.login .tabs {
					background: var(--main-panel-accent);
					text-align: center;
					display: flex;
					height: 10%;
					width: 100%; }
				div[data-local-page="Login"] .panel section.login .tabs .tab {
					color: var(--main-text);
					position: relative;
					cursor: pointer;
					height: 100%;
					width: 50%; }
				div[data-local-page="Login"] .panel section.login .tabs .tab h4 {
					transform: translate(-50%, -50%);
					position: absolute;
					top: 50%;
					left: 50%; }
				div[data-local-page="Login"] .panel section.login .tabs .tab.active {
					background: var(--main-accent); }
				div[data-local-page="Login"] .panel section.login .tabs .tab.active h4 {
					filter: invert(var(--invert-icons)); }
				div[data-local-page="Login"] .panel section.login .forms {
					height: 90%;
					width: 100%; }
				div[data-local-page="Login"] .panel section.login .forms .formScroller {
					margin: 0px 0px 0rem calc(100% - (2rem + 4rem));
					box-shadow: 0 0 8px 1px var(--login-accent);
					border-radius: 3px;
					background: var(--login-accent);
					position: sticky;
					cursor: pointer;
					bottom: 2rem;
					right: 2rem;
					height: 4rem;
					width: 4rem; }
				div[data-local-page="Login"] .panel section.login .forms .formScroller i{
					color: var(--main-panel-background);
				    padding: 2px 0px 0px 5px;
					font-size: 3rem; }
				div[data-local-page="Login"] .panel section.login .forms .form {
					scrollbar-width: none;
					padding-top: 2rem;
					display: none;
					height: 10%;
					width: 100%; }
				div[data-local-page="Login"] .panel section.login .forms .form::-webkit-scrollbar {
					display: none; }
				div[data-local-page="Login"] .panel section.login .forms .form.active {
					overflow: hidden scroll;
					position: relative;
					display: block;
					height: 100%;
					width: 100%; }
				div[data-local-page="Login"] .panel section.login .forms .form .welcome {
					text-align: center; }
				div[data-local-page="Login"] .panel section.login .forms .form input {
					display: block;
					margin: 4rem auto 0 auto;
					height: 3rem;
					width: 80%; }
				div[data-local-page="Login"] .panel section.login .forms .form input[type="text"],
				div[data-local-page="Login"] .panel section.login .forms .form input[type="password"] {
					background: transparent;
					border: none;
					border-bottom: 1px solid var(--login-accent) }
				div[data-local-page="Login"] .panel section.login .forms .form input[type="button"] {
					height:5rem; }
				div[data-local-page="Login"] .panel section.login .forms .form > .status {
					margin: 3rem 0 0 10%;
					text-align: center;
					display: block;
					width: 80%; }
				div[data-local-page="Login"] .panel section.login {
					width: calc(100% - 0.5px);
					height: 100%; }
				div[data-local-page="Login"] .panel .login .tabs {
					height: 5%; }
				div[data-local-page="Login"] .panel section .forms {
					height: 90%; }
				@media(min-width: 740px) {
					div[data-local-page="Login"] .panel {
						display: flex; }
					div[data-local-page="Login"] .panel section.login .forms .form input {
						width: 70% }
					div[data-local-page="Login"] .panel section.login .forms .form > .status {
						margin: 3rem 0 0 15%;
						width: 70%; }
				}
				@media(min-width: 1200px) {
					div[data-local-page="Login"] .panel {
						box-shadow: 0px 0px 15px 10px var(--main-shadow);
						display: flex;
						height: 75%;
						width: 60%;
						top: 12.5%;
						left: 20%; }
					div[data-local-page="Login"] .panel section.login .forms .form input {
						width: 60%; }
					div[data-local-page="Login"] .panel section.login .forms .form > .status {
						margin: 3rem 0 0 20%;
						width: 60%; }
				}
				<?php
					if($data['enabled']) {
						if($data['background_image_name'] != "") {
							$background = "background-image: url('https://raw.githubusercontent.com/MILG0IR/MILG0IR-home-broadcasts/master/images/" .$data['background_image_name']. "');";
						} else {
							$background = 'background-color: ' .$data['background_image_colour']. ';';
						}
				?>
					div[data-local-page="Login"] .panel section.seperator {
						background: var(--main-accent);
						height: 1px;
						width: calc(100% - 1px); }
					div[data-local-page="Login"] .panel section.broadcast {
						text-shadow: <?php print($data['text_shadow'])?>;
						<?php print($background)?>
						padding: <?php print($data['web-mobile']['padding'])?>;
						background-repeat: no-repeat;
						background-size: cover;
						background-position: bottom;
						position: relative;
						height: calc(30% - 0.5px);
						width: 100%; }
					div[data-local-page="Login"] .panel section.broadcast h1.title {
						font-size: <?php print($data['web-mobile']['title_font_size'])?>;
						background: <?php print($data['title_background'])?>;
						text-align: <?php print($data['title_h_align'])?>;
						color: <?php print($data['title_colour'])?>; }
					div[data-local-page="Login"] .panel section.broadcast h1.title {
						font-size: <?php print($data['web-mobile']['title_font_size'])?>;
						background: <?php print($data['title_background'])?>;
						text-align: <?php print($data['title_h_align'])?>;
						color: <?php print($data['title_colour'])?>; }
					div[data-local-page="Login"] .panel section.broadcast h4.subtitle {
						font-size: <?php print($data['web-mobile']['subtitle_font_size'])?>;
						background: <?php print($data['subtitle_background'])?>;
						text-align: <?php print($data['subtitle_h_align'])?>;
						color: <?php print($data['subtitle_colour'])?>; }
					div[data-local-page="Login"] .panel section.broadcast p.paragraph {
						font-size: <?php print($data['web-mobile']['paragraph_font_size'])?>;
						background: <?php print($data['paragraph_background'])?>;
						text-align: <?php print($data['paragraph_h_align'])?>;
						color: <?php print($data['paragraph_colour'])?>; }
					div[data-local-page="Login"] .panel section.broadcast a {
						padding: 1rem;
						text-decoration: none }
					div[data-local-page="Login"] .panel section.broadcast a.primary,
					div[data-local-page="Login"] .panel section.broadcast a.primary:visited {
						position: absolute;
						border-radius: <?php print($data['button_primary_border_radius'])?>;
						border: <?php print($data['button_primary_border'])?>;
						background: <?php print($data['button_primary_background'])?>;
						color: <?php print($data['button_primary_text_colour'])?>;
						font-size: <?php print($data['web-mobile']['button_primary_font_size'])?>;
						top: <?php print($data['web-mobile']['button_primary_top'])?>;
						right: <?php print($data['web-mobile']['button_primary_right'])?>;
						bottom: <?php print($data['web-mobile']['button_primary_bottom'])?>;
						left: <?php print($data['web-mobile']['button_primary_left'])?>; }
					div[data-local-page="Login"] .panel section.broadcast a.secondary,
					div[data-local-page="Login"] .panel section.broadcast a.secondary:visited {
						position: absolute;
						border-radius: <?php print($data['button_secondary_border_radius'])?>;
						border: <?php print($data['button_secondary_border'])?>;
						background: <?php print($data['button_secondary_background'])?>;
						color: <?php print($data['button_secondary_text_colour'])?>;
						font-size: <?php print($data['web-mobile']['button_secondary_font_size'])?>;
						top: <?php print($data['web-mobile']['button_secondary_top'])?>;
						right: <?php print($data['web-mobile']['button_secondary_right'])?>;
						bottom: <?php print($data['web-mobile']['button_secondary_bottom'])?>;
						left: <?php print($data['web-mobile']['button_secondary_left'])?>; }
					@media(min-width: 512px) {
						div[data-local-page="Login"] .panel section.seperator {
							height: 100%;
							width: 1px; }
						div[data-local-page="Login"] .panel section.broadcast {
							padding: <?php print($data['web-desktop']['padding'])?>;
							width: calc(50% - 0.5px);
							height: 100%; }
						div[data-local-page="Login"] .panel section.broadcast h1.title {
							font-size: <?php print($data['web-desktop']['title_font_size'])?>; }
						div[data-local-page="Login"] .panel section.broadcast h4.subtitle {
							font-size: <?php print($data['web-desktop']['subtitle_font_size'])?>; }
						div[data-local-page="Login"] .panel section.broadcast p.paragraph {
							font-size: <?php print($data['web-desktop']['paragraph_font_size'])?>; }
						div[data-local-page="Login"] .panel section.broadcast a.primary {
							font-size: <?php print($data['web-desktop']['button_primary_font_size'])?>;
							top: <?php print($data['web-desktop']['button_primary_top'])?>;
							right: <?php print($data['web-desktop']['button_primary_right'])?>;
							bottom: <?php print($data['web-desktop']['button_primary_bottom'])?>;
							left: <?php print($data['web-desktop']['button_primary_left'])?>; }
						div[data-local-page="Login"] .panel section.broadcast a.secondary {
							font-size: <?php print($data['web-desktop']['button_secondary_font_size'])?>;
							top: <?php print($data['web-desktop']['button_secondary_top'])?>;
							right: <?php print($data['web-desktop']['button_secondary_right'])?>;
							bottom: <?php print($data['web-desktop']['button_secondary_bottom'])?>;
							left: <?php print($data['web-desktop']['button_secondary_left'])?>; }

					}
					@media(min-width: 740px) {
						div[data-local-page="Login"] .panel section.broadcast a.primary,
						div[data-local-page="Login"] .panel section.broadcast a.primary:visited {
							top: calc(<?php print($data['web-mobile']['button_primary_top'])?> / 2);
							right: calc(<?php print($data['web-mobile']['button_primary_right'])?> / 2);
							bottom: calc(<?php print($data['web-mobile']['button_primary_bottom'])?> / 2);
							left: calc(<?php print($data['web-mobile']['button_primary_left'])?> / 2); }
						div[data-local-page="Login"] .panel section.broadcast a.secondary,
						div[data-local-page="Login"] .panel section.broadcast a.secondary:visited {
							top: calc(<?php print($data['web-mobile']['button_secondary_top'])?> / 2);
							right: calc(<?php print($data['web-mobile']['button_secondary_right'])?> / 2);
							bottom: calc(<?php print($data['web-mobile']['button_secondary_bottom'])?> / 2);
							left: calc(<?php print($data['web-mobile']['button_secondary_left'])?> / 2); }
					}
				<?php
					}
				?>
			</style>
		 </head>
		<body data-nav-theme="1" data-main-theme="dark" onresize="formScroller()">
			<unsupported> Your browser is currently unsuported. Please upgrade to a newer version. </unsupported>
			<script name="PRE">
				changetheme('main', $("body").data("main-theme"));
				changetheme('nav', $("body").data("nav-theme"));
			 </script>
			<div class="main-content">
				<?php include_once($mg_dir['fragments']."preloader") ?>
				<?php include_once($mg_dir['fragments']."header") ?>
				<div class="pages-content-full" data-local-page="Login">
					<div class="panel">
						<section class="login">
							<div class="tabs">
								<div class="tab tab-login" onClick="changeForm('login', '<?php print($lang['LOGIN']['login'])?>')"><h4><translate data-trans-login>Login</translate></h4></div>
								<div class="tab tab-signup" onClick="changeForm('signup','<?php print($lang['LOGIN']['signup'])?>')"><h4><translate data-trans-signup>Signup</translate></h4></div>
							</div>
							<div class="forms">
								<div class="form form-login">
									<?php include_once($mg_dir['forms']."login") ?>
									<select id="langs">
										<option value="en_GB">English</option>
									</select>
								</div>
								<div class="form form-signup">
									<?php include_once($mg_dir['forms']."signup") ?>
								</div>
							</div>
						</section>
						<?php
							if($data['enabled']) {
						 ?>
							<section class="seperator"></section>
							<section class="broadcast">
								<h1 class="title"><?php print($data['title_text'])?></h1>
								<h4 class="subtitle"><?php print($data['subtitle_text'])?></h4>
								<p class="paragraph"><?php print($data['paragraph_text'])?></p>
								<?php
									if($data['button_primary_enabled']) {
								?>
									<a class="primary" target="_blank" href="<?php print($data['button_primary_url'])?>"><?php print($data['button_primary_text'])?></a>
								<?php
									} if($data['button_secondary_enabled']) {
								?>
									<a class="secondary" target="_blank" href="<?php print($data['button_secondary_url'])?>"><?php print($data['button_secondary_text'])?></a>
								<?php
									}
								?>
							</section>
						 <?php
							}
						?>
					</div>
				</div>
			 </div>
			<script name="POST">
				$(document).ready(function() {
					changeForm('login','<?php print($lang['LOGIN']['login'])?>')
					date_time('header-time', false, true, true);

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
				});
				function formScroll(form) {
					$('.form.active').animate({
						scrollTop: $('.form.active').scrollTop() + 200
					});
				}
				function formScroller() {
					var sHeight = $('.form.active').prop("scrollHeight") - 25;
					var iHeight = $('.form.active').height();
					if(sHeight > iHeight) {
						$('.formScroller').show()
					} else {
						$('.formScroller').hide()
					}
				}
				function changeForm(form, title) {
					setTitle(title);
					$('.tabs').children().removeClass('active')
					$('.tabs').children('.tab-'+form).addClass('active')
					$('.forms').children().removeClass('active')
					$('.forms').children('.form-'+form).addClass('active')
					formScroller();
				}
				function toggleBroadcast(x) {
					if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
						if(x == 'hide') {
							$('section.broadcast').hide()
							$('section.login').css('height', '100%');
						} else if(x == 'show') {
							$('section.broadcast').show()
							$('section.login').css('height', 'calc(70% - 0.5px)');
						}
					}
				}
				$(".preloader-wrapper").hide();
			 </script>
		 </body>
	 </html>