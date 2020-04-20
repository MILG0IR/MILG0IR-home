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
					width: 100%; }
				.settings-wrapper > .settings-page {
					width: 100%;
					height: 100%;
					text-align: center; }
				.unfiltered {
					cursor: pointer; }
				tbody > tr > td {
					text-align: left; }
				tbody > tr > td > img {
					width: 50px; }
				tbody > tr > td > .actions {
					width: 20px;
					cursor: pointer; }
				.settings-wrapper > .settings-page#DEFAULT {}
				.settings-wrapper > .settings-page#security {}
				.settings-wrapper > .settings-page#customization {}
				.settings-wrapper > .settings-page#users > .users {}
				.settings-wrapper > .settings-page#users > .ranks {}
				.settings-wrapper > .settings-page#pages > .pages {}
				.settings-wrapper > .settings-page#pages > .categories {}
				.settings-wrapper > .settings-page > .panel {
					box-shadow: 0px 0px 20px 0px #00000080;
					-ms-overflow-style: none;
					list-style-type: none;
					display: inline-block;
					border-radius: 5px;
					background: white;
					overflow: scroll;
					padding: 1rem;
					margin: 1rem;
					width: 70%; }
				.settings-wrapper > .settings-page > .panel::-webkit-scrollbar {
					display: none; }
				.popup { }
				.popup > span.settings-popup {
					width: 100%;
					height: 100%;
					background: rgba(0, 0, 0, 0.3);
					display: block;
					position: absolute;
					top: 0px;
					left: 0px; }
				.popup > span.settings-popup > form {
					background: white;
					width: 70%;
					height: auto;
					top: 5rem;
					left: 15%;
					position: absolute; }
				@media only screen and (min-resolution: 117dpi) and (max-resolution: 119dpi), only screen and (min-resolution: 131dpi) and (max-resolution: 133dpi), only screen and (min-resolution: 145dpi) and (max-resolution: 154dpi), only screen and (min-resolution: 162dpi) and (max-resolution: 164dpi), only screen and (min-resolution: 169dpi) {
					.settings-wrapper > .settings-page > .panel {
						margin-right: 6rem;
					 }
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
			<!-- JS -->
				<?php include_once($mg_dir['js']."js.php");	?>
				<script>
					$("tbody").sortable({
						items: "> tr:not(:first)",
						appendTo: "parent",
						helper: "clone"
					}).disableSelection();
					function editPopup(type, json) {
						var json = jQuery.parseJSON(json);
						if(type == "rank") {
							if( $("#"+json.title).hasClass("filtered") ) {
								alert("Cannot change required ");
							} else {
								closePopup();
								var parent = $(".popup");
								var span = document.createElement('span');
									span.setAttribute('class', 'settings-popup');
								var form = document.createElement('form');
								var title = document.createElement('input');
									title.setAttribute('type', 'text');
									title.setAttribute('name', 'title');
									title.setAttribute('class', 'form-change-title');
									title.setAttribute('value', json.title);
								var desc = document.createElement('input');
									desc.setAttribute('type', 'text');
									desc.setAttribute('name', 'description');
									desc.setAttribute('class', 'form-change-description');
									desc.setAttribute('class', 'form-change-description');
									desc.setAttribute('value', json.description);
								var local = document.createElement('input');
									local.setAttribute('type', 'text');
									local.setAttribute('name', 'uri_local');
									local.setAttribute('class', 'form-change-uri_local');
									local.setAttribute('value', json.uri_local);
								var remote = document.createElement('input');
									remote.setAttribute('type', 'text');
									remote.setAttribute('name', 'uri_remote');
									remote.setAttribute('class', 'form-change-uri_remote');
									remote.setAttribute('value', json.uri_remote);
								var select = document.createElement('select');
								var option = document.createElement('option');
								parent.append(span);
								span.append(form);
								form.append(title);
								form.append(desc);
								form.append(local);
								form.append(remote);
								form.append(select);
								select.append(option);
							}
						} else if(type == "reference") {
							if( $("#"+json.reference_code).hasClass("filtered") ) {
								alert("Cannot change required ");
							} else {
								closePopup();
								var parent = $(".popup");
								var span = document.createElement('span');
									span.setAttribute('class', 'settings-popup');
								var form = document.createElement('form');
								var title = document.createElement('h2');
									title.setAttribute('name', 'title');
									title.setAttribute('class', 'form-removal-title');
									title.textContent = json.reference_code;
								var info = document.createElement('h6');
									info.setAttribute('name', 'info');
									info.setAttribute('class', 'form-removal-info');
									info.setAttribute('style', 'color: red;');
									info.textContent = "It is highly unreccommended to reactivate reference codes. Are you sure you would like to continue?";
								var submit = document.createElement('input');
									submit.setAttribute('type', 'button');
									submit.setAttribute('name', 'uri_local');
									submit.setAttribute('class', 'form-removal-submit');
									submit.setAttribute('onClick', 'reactivatereference("'+ json.id +'")');
									submit.setAttribute('value', "Reactivate");
								parent.append(span);
								span.append(form);
								form.append(title);
								form.append(info);
								form.append(submit);
							}
						} else if(type == "page") {
							if( $("#"+pageJSON.title).hasClass("filtered") ) {
								alert("Cannot change required ");
							} else {

							}
						}
					}
					function removalPopup(type, json) {
						var json = jQuery.parseJSON(json);
						if(type == "reference") {
							if( $("#"+json.reference_code).hasClass("filtered") ) {
								alert("Cannot change required ");
							} else {
								closePopup();
								var parent = $(".popup");
								var span = document.createElement('span');
									span.setAttribute('class', 'settings-popup');
								var form = document.createElement('form');
								var title = document.createElement('h2');
									title.setAttribute('name', 'title');
									title.setAttribute('class', 'form-removal-title');
									title.textContent = json.reference_code;
								var info = document.createElement('h6');
									info.setAttribute('name', 'info');
									info.setAttribute('class', 'form-removal-info');
									info.textContent = "Are you sure you would like to deactivate this reference code?";
								var submit = document.createElement('input');
									submit.setAttribute('type', 'button');
									submit.setAttribute('name', 'uri_local');
									submit.setAttribute('class', 'form-removal-submit');
									submit.setAttribute('onClick', 'deactivatereference("'+ json.id +'")');
									submit.setAttribute('value', "Deactivate");
								parent.append(span);
								span.append(form);
								form.append(title);
								form.append(info);
								form.append(submit);
							}
						}
					}
					function closePopup() {
						$(".settings-popup").remove();
					}
				</script>
			<!-- MAIN CONTENT -->
				<div class="settings-wrapper">
					<!-- SETTINGS PAGES -->
					<div class="settings-page" id="DEFAULT">
						<div class="panel">
							DEFAULT
						</div>
					</div>
					<div class="settings-page" id="security">
						<div class="panel">
							Update
						</div>
						<div class="panel">
							Update settings
						</div>
						<div class="panel">
							Database settings
						</div>
						<div class="panel">
							Security settings
						</div>
					</div>
					<div class="settings-page" id="customization">
						<div class="panel">
							Branding customization
						</div>
					</div>
					<div class="settings-page" id="users">
						<div class="panel">
							<h1>References</h1>
							<button onclick="createreference('<?php echo$user['username']?>')">Create reference code</button>
							<h4 id="ref"></h4>
							<p id="refstatus"></p>
							<table class="table table-striped table-hover">
								<thead class="thead-dark">
									<tr>
										<th>ID</th>
										<th>Reference code</th>
										<th>Made by</th>
										<th>Made on</th>
										<th>Active</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql = "SELECT * FROM `user_references` ORDER BY CHAR_LENGTH(`id`), `id` asc;";
										$query = mysqli_query($db_conx, $sql);
										foreach($query as $ref) {
											$disabled_refs = array("");
											if($ref['active'] == NULL) {
												$ref_image = $mg_img['multimedia']['more']['image'];
												$ref_click = "editPopup(\"reference\", \"".str_replace("\"", "\\\"", json_encode($ref))."\")";
											} else {
												$ref_image = $mg_img['multimedia']['garbage']['image'];
												$ref_click = "removalPopup(\"reference\", \"".str_replace("\"", "\\\"", json_encode($ref))."\")";
											};
											echo "<tr id=\"".$ref['reference_code']."\">";
											echo "	<td>".$ref['id']."</td>";
											echo "	<td>".$ref['reference_code']."</td>";
											echo "	<td>".$ref['made_by_user']."</td>";
											echo "	<td>".$ref['made_by_time']."</td>";
											echo "	<td>".$ref['active']."</td>";
											echo "	<td><img src=\"".$ref_image."\" onClick='".$ref_click."' class=\"actions\"></td>";
											echo "</tr>";
										}
									?>
								</tbody>
							</table>
						</div>
						<div class="panel"> Users </div>
						<div class="panel ranks">
							<h1>Ranks</h1>
							<table class="table table-striped table-hover">
								<thead class="thead-dark">
									<tr>
										<th>ID</th>
										<th>Icon</th>
										<th>Rank</th>
										<th>Description</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql = "SELECT * FROM `user_ranks` ORDER BY CHAR_LENGTH(`id`), `id` asc;";
										$query = mysqli_query($db_conx, $sql);
										foreach($query as $rank) {
											$disabled_ranks = array("ADMINISTRATOR");
											if(in_array($rank['name'],$disabled_ranks)) {
												$rank_class = "filtered";
												$rank_image = $mg_img['multimedia']['cancel']['image'];
												$rank_click = "";
											} else {
												$rank_class = "unfiltered";
												$rank_image = $mg_img['multimedia']['info']['image'];
												$rank_click = "editPopup(\"rank\", \"".str_replace("\"", "\\\"", json_encode($rank))."\")";
											};
											echo "<tr id=\"".$rank['name']."\" class=\"".$rank_class."\">";
											echo "	<td>".$rank['id']."</td>";
											echo "	<td><img src=\"".$mg_img[$rank['icon_category']][$rank['icon']]['image']."\"></td>";
											echo "	<td>".$rank['name']."</td>";
											echo "	<td>".$rank['description']."</td>";
											echo "	<td><img src=\"".$rank_image."\" onClick='".$rank_click."' class=\"actions\"></td>";
											echo "</tr>";
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="settings-page" id="pages">
						<div class="panel pages">
							<h1>Pages</h1>
							<table class="table table-striped table-hover">
								<thead class="thead-dark">
									<tr>
										<th>ID</th>
										<th>Icon</th>
										<th>Title</th>
										<th>Description</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql = "SELECT * FROM `var_pages` ORDER BY CHAR_LENGTH(`id`), `id` asc;";
										$query = mysqli_query($db_conx, $sql);
										foreach($query as $page) {
											$disabled_pages = array("Homepage", "Messages", "Profile", "Settings");
											if(in_array($page['title'],$disabled_pages)) {
												$page_class = "filtered";
												$page_image = $mg_img['multimedia']['cancel']['image'];
												$page_click = "";
											} else {
												$page_class = "unfiltered";
												$page_image = $mg_img['multimedia']['info']['image'];
												$page_click = "editPopup(\"page\", \"".str_replace("\"", "\\\"", json_encode($page))."\")";
											};
											echo "<tr id=\"".$page['title']."\" class=\"".$page_class."\">";
											echo "	<td>".$page['id']."</td>";
											echo "	<td><img src=\"".$mg_img[$page['icon_category']][$page['icon']]['image']."\"></td>";
											echo "	<td>".$page['title']."</td>";
											echo "	<td>".$page['description']."</td>";
											echo "	<td><img src=\"".$page_image."\" onClick='".$page_click."' class=\"actions\"></td>";
											echo "</tr>";
										}
									?>
								</tbody>
							</table>
						</div>
						<div class="panel categories">Categories</div>
					</div>
					<div class="popup"></div>
				</div>
		</body>