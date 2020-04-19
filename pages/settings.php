<?php
	#{
	#	"_comment": [
	#		"WARNING: DO NOT MODIFY.",
	#		"THE DETAILS ENTERED HERE WILL EFFECT IT'S DISPLAYED IN THE MENU."
	#	],
	#	"id": "999",
	#	"title": "Settings",
	#	"description": "",
	#	"uri_remote": "./pages/settings.php",
	#	"icon_category": "icons",
	#	"icon": "settings"
	#}
?>
<?php
	include_once('../db/db_conx.php');
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<?php include_once($mg_dir['css']."css.php");	?>
			<style>
				.nav-menu__sidebar {
					writing-mode: vertical-lr;
					transform: rotate(180deg);
					justify-content: center;
					text-align: center;
					position: fixed;
					display: flex;
					z-index: 98;
					padding: 0;
					bottom: 0;
					margin: 0;
					width: 0;
					right: 0;
					top: 0; }
				.nav-menu__sidebar li {
					display: inline-block; }
				.nav-menu__sidebar li a {
					transition: all 0.25s ease-in-out;
					border: 2px solid transparent;
					text-transform: uppercase;
					letter-spacing: 0.1em;
					text-decoration: none;
					position: relative;
					font-size: 0.9em;
					font-weight: 600;
					overflow: hidden;
					padding: 0.75em;
					display: block;
					margin: 0.25em;
					color: #393E54; }
				.nav-menu__sidebar li a:hover, .nav-menu__sidebar li a:active, .nav-menu__sidebar li a:focus {
					transition: all 0.25s ease-in-out;
					border-color: #393E54; }
				.settings-wrapper {
					vertical-align: middle;
					display: -webkit-box;
					display: -moz-box;
					display: -o-box;
					display: box;
					overflow: hidden;
					height: 100%;
					width: 100%;
				}
				.settings-wrapper > .settings-page {
					width: 100%;
					height: 100%;
					text-align: center; }
			</style>
		</head>
		<body>
			<!-- SIDEBAR -->
				<ul class="nav-menu__sidebar">
					<li class="menu-item">
						<a href="#security">Database & security</a>
					</li>
					<li class="menu-item ">
						<a href="#customization">Customization</a>
					</li>
					<li class="menu-item">
						<a href="#users">Users & Ranks</a>
					</li>
					<li class="menu-item">
						<a href="#pages">pages & categories</a>
					</li>
				</ul>
				<div class="settings-wrapper">
					<!-- SETTINGS PAGES -->
					<div class="settings-page" id="DEFAULT">
						DEFAULT
					</div>
					<div class="settings-page" id="security">
						security
					</div>
					<div class="settings-page" id="customization">
						customization
					</div>
					<div class="settings-page" id="users">
						users
					</div>
					<div class="settings-page" id="pages">
						pages
					</div>
				</div>
			<!-- JS -->
			<?php include_once($mg_dir['js']."js.php");	?>
			<script>

			</script>
		</body>