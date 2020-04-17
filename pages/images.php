<?php
	#{
	#	"_comment": [
	#		"WARNING: DO NOT MODIFY.",
	#		"THE DETAILS ENTERED HERE WILL EFFECT IT'S DISPLAYED IN THE MENU."
	#	],
	#	"id": "0",
	#	"title": "Images",
	#	"description": "",
	#	"uri_remote": "./pages/images.php",
	#	"icon": "14"
	#}
?>
<?
	include_once("../db/db_conx.php");
	$sql="SELECT * FROM `var_images`";
	$query = mysqli_query($db_conx, $sql);
	$mg_img = array();
	while ($row = mysqli_fetch_array($query)) {
		echo '<img style="width: 50px;" src="'.$row['image_base64'].'" title="ID: '.$row['id'].' ~cat: '.$row['image_category'].' ~image: '.$row['image_name'].'">';
	};
?>