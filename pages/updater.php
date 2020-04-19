<?php
	#{
	#	"_comment": [
	#		"WARNING: DO NOT MODIFY.",
	#		"THE DETAILS ENTERED HERE WILL EFFECT IT'S DISPLAYED IN THE MENU."
	#	],
	#	"id": "100",
	#	"title": "Updater",
	#	"description": "",
	#	"uri_remote": "./pages/updater.php",
	#	"icon_category": "clouds",
	#	"icon": "upload"
	#}
?>
<?php
	include_once('../db/db_conx.php');
	$log = array();
	$errors = NULL;
	if(isset($_GET['log']) && isset($_GET['errors'])) {
		$log = json_decode($_GET['log'], true);
		$errors = $_GET['errors'];
	}
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<?php include_once($mg_dir['css']."css.php");	?>
			<style>
				.log {
					 }
				.log > .info {
					 }
				.log > .error {
					 }
				.log > .warn {
					 }
				.log > .success {
					 }
				.whatsnew {
					position: absolute;
					border-radius: 5px;
					background: white;
					padding: 1rem;
					width: 70%;
					left: 15%; }
				.whatsnew > .update > {
					 }
				.whatsnew > .update > .version {
					 }
				.whatsnew > .update > .title {
					 }
				.whatsnew > .update > .type {
					 }
				.whatsnew > .update > .date {
					 }
				.whatsnew > .update > .description {
					 }
				.whatsnew > .update > .changelog_notes {
					 }
				.whatsnew > .update > .changelog_notes > .note {
					text-indent: 50px; }
				.whatsnew > .update > .changelog_notes > .note::before {
					content: "# "; }
				.whatsnew > .update > .changelog_changes {
					 }
				.whatsnew > .update > .changelog_changes > .change {
					text-indent: 50px; }
				.whatsnew > .update > .changelog_changes > .change::before {
					content: "* "; }
				.whatsnew > .update > .changelog_added {
					 }
				.whatsnew > .update > .changelog_added > .addition {
					text-indent: 50px; }
				.whatsnew > .update > .changelog_added > .addition::before {
					content: "+ "; }
				.whatsnew > .update > .changelog_removed {
					 }
				.whatsnew > .update > .changelog_removed > .removal {
					text-indent: 50px; }
				.whatsnew > .update > .changelog_removed > .removal::before {
					content: "- "; }
			</style>
		</head>
		<body onLoad='checkforupdate(<?php echo "\"".$app_info['Version']."\", \"".$app_info['Device']."\", \"".$app_info['Branch']."\"" ?>);'>
			<h1 id="updatestatus"></h1>
			<button class="update-button button-secondary" onclick="redirect('../update.php?download')"></button>
			<div class="log">
				<?php
					if($errors != NULL){
						$log[] .= "";
						$log[] .= "<span class='error'>This installation has been complete with " . $errors . " errors.</span>";
					}
					$arrlength = count($log)-1;
					if($arrlength > 0) {
						echo "";
							echo "<pre>";
							echo "<h4 class='title'>LOG:</h4>";
							echo "</br>";
							for($x = 0; $x < $arrlength; $x++) {
								if($x < 10) {
									echo "0" . $x . " - " . $log[$x];
									echo "<br>";
								} else {
									echo $x . " - " . $log[$x];
									echo "<br>";
								}
							}
							echo "</pre>";
					}
				?>
			</div>
			<div class="whatsnew">
				<?php
					$json = file_get_contents("https://raw.githubusercontent.com/MILG0IR/MILG0IR-home-".$app_info['Device']."/".$app_info['Branch']."/etc/whatsnew.json");
					$data = json_decode($json, true);
					$i = 0;
					$x = 0;
					$Status = array();
					$Type = array();
					$Version = array();
					$Date = array();
					$Title = array();
					$Description = array();
					$Changelog_notes = array();
					$Changelog_changes = array();
					$Changelog_added = array();
					$Changelog_removed = array();
					foreach($data["Changelog"] as $cl) {
						$i++;
						$Status[$i] = $cl['Status'];
						$Type[$i] = $cl['Type'];
						$Version[$i] = $cl['Version'];
						$Date[$i] = $cl['Date'];
						$Title[$i] = $cl['Title'];
						$Description[$i] = $cl['Description'];
						foreach($cl['Changelog-notes'] as $cn) {
							$Changelog_notes[$i] = $cl['Changelog-notes'];
						}
						foreach($cl['Changelog-changes'] as $cc) {
							$Changelog_changes[$i] = $cl['Changelog-changes'];
						}
						foreach($cl['Changelog-added'] as $ca) {
							$Changelog_added[$i] = $cl['Changelog-added'];
						}
						foreach($cl['Changelog-removed'] as $cr) {
							$Changelog_removed[$i] = $cl['Changelog-removed'];
						}
					}
					while($x < $i) {
						$x++;
						echo '	<div class="update">';
						echo '		<h3 class="version">'.$Version[$x].'</h3>';
						echo '		<h6 class="">'.$Title[$x].'</h6>';
						echo '		<p class="type">'.$Type[$x].' '.$Status[$x].'</p>';
						echo '		<p class="date"> Released: '.$Date[$x].'</p>';
						echo '		<p class="description">'.$Description[$x].'</p>';
						echo '		<div class="changelog_notes">';
							if (isset($Changelog_notes[$x])) {
								foreach($Changelog_notes[$x] as $notes) {
									if($changes != NULL){
										echo '<p class="note">'.$notes.'</p>';
									}
								}
							}
						echo '		</div>';
						echo '		<div class="changelog_changes">';
							if (isset($Changelog_changes[$x])) {
								foreach($Changelog_changes[$x] as $changes) {
									if($changes != NULL){
										echo '<p class="change">'.$changes.'</p>';
									}
								}
							}
						echo '		</div>';
						echo '		<div class="changelog_added">';
							if (isset($Changelog_added[$x])) {
								foreach($Changelog_added[$x] as $added) {
									if($added != NULL){
										echo '<p class="addition">'.$added.'</p>';
									}
								}
							}
						echo '		</div>';
						echo '		<div class="changelog_removed">';
							if (isset($Changelog_removed[$x])) {
								foreach($Changelog_removed[$x] as $removed) {
									if($removed != NULL){
										echo '<p class="removal">'.$removed.'</p>';
									}
								}
							}
						echo '		</div>';
						echo '	</div>';
					}
				?>
			</div>
			<?php include_once($mg_dir['js']."js.php");	?>
		</body>