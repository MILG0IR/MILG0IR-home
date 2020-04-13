<?
	// CHECK IF USER IS LOGGED IN AND HAS A HIGH ENOUGH RANK
?><?php
	// CREATE THE VARIABLES
		$version = array();
		$device = string;
	// GET CURRENT VERSION
		$json = json_decode(file_get_contents('./etc/info.json'), TRUE);
		$version['cur'] = preg_replace('/[^0-9]/', '', $json['Version']);
		$version['cur'] = $json['Device'];
	//
?>