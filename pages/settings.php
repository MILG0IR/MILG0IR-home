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
					position: fixed;
					z-index: 98;
					top: 0;
					right: 0;
					bottom: 0;
					transform: rotate(180deg);
					display: flex;
					justify-content: center;
					margin: 0;
					padding: 0;
					text-align: center;
					writing-mode: vertical-lr;
					width: 0;
				}
				.nav-menu__sidebar li {
					display: inline-block;
				}
				.nav-menu__sidebar li a {
					position: relative;
					display: block;
					padding: 0.75em;
					margin: 0.25em;
					color: #393E54;
					font-size: 0.9em;
					font-weight: 600;
					letter-spacing: 0.1em;
					text-transform: uppercase;
					overflow: hidden;
					transition: all 0.25s ease-in-out;
					border: 2px solid transparent;
					text-decoration: none;
				}
				.nav-menu__sidebar li a:hover, .nav-menu__sidebar li a:active, .nav-menu__sidebar li a:focus {
					border-color: #393E54;
					transition: all 0.25s ease-in-out;
				}
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
			<!-- SETTINGS PAGES -->
				<div class="" id="security">
					<!---->
				</div>
				<div class="" id="customization">
					<!---->
				</div>
				<div class="" id="users">
					<!---->
				</div>
				<div class="" id="pages">
					<!---->
				</div>
			<!-- JS -->
			<?php include_once($mg_dir['js']."js.php");	?>
			<script>

			</script>
		</body>