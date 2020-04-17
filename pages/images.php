<?
	include_once("../db/db_conx.php");
	$sql="SELECT * FROM `var_images`";
	$query = mysqli_query($db_conx, $sql);
	$mg_img = array();
	while ($row = mysqli_fetch_array($query)) {
		echo '<img style="width: 50px;" src="'.$row['image_base64'].'" title="cat: '.$row['image_category'].' - image: '.$row['image_name'].'">';
	};
?>