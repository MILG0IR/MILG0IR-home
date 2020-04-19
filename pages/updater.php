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
		</head>
		<body onLoad='checkforupdate(<?php echo "\"".$app_info['Version']."\", \"".$app_info['Device']."\", \"".$app_info['Branch']."\"" ?>);'>
			<div class="content nav-inset">
				<h1 id="updatestatus"></h1>
				<button class="button-secondary" onclick="redirect('../update.php?download')">Force reinstall</button>
				<div class='log'>
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
				<div id="whatsnew">
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
							foreach($cl['Changelog-changed'] as $cc) {
								$Changelog_changes[$i] = $cl['Changelog-changed'];
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
							echo '	<div>';
							echo '		<h3>'.$Title[$x].'</h3>';
							echo '		<h6>'.$Version[$x].'</h6>';
							echo '		<p>'.$Type[$x].' '.$Status[$x].'</p>';
							echo '		<p> Released: '.$Date[$x].'</p>';
							echo '		<p>'.$Description[$x].'</p>';
							echo '		<div class="Changelog_notes">';
							if (isset($Changelog_notes[$x])) {
								foreach($Changelog_notes[$x] as $notes) {
									if($changes != NULL){
										echo '<p>'.$notes.'</p>';
									}
								}
							}
							echo '		</div>';
							echo '		<div class="Changelog_changes">';
							if (isset($Changelog_changes[$x])) {
								foreach($Changelog_changes[$x] as $changes) {
									if($changes != NULL){
										echo '<p>'.$changes.'</p>';
									}
								}
							}
							echo '		</div>';
							echo '		<div class="Changelog_added">';
							if (isset($Changelog_added[$x])) {
								foreach($Changelog_added[$x] as $added) {
									if($added != NULL){
										echo '<p>'.$added.'</p>';
									}
								}
							}
							echo '		</div>';
							echo '		<div class="Changelog_removed">';
							if (isset($Changelog_removed[$x])) {
								foreach($Changelog_removed[$x] as $removed) {
									if($removed != NULL){
										echo '<p>'.$removed.'</p>';
									}
								}
							}
							echo '		</div>';
							echo '	</div>';
						}
					?>
				</div>
			</div>
			<?php include_once($mg_dir['js']."js.php");	?>
		</body>