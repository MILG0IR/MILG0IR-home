<?php
	// CREATE THE VARIABLES
		$version = array();
	// GET NEW VERSION
		$json = json_decode(file_get_contents('https://raw.githubusercontent.com/MILG0IR/MILG0IR-home/master/etc/info.json'), TRUE);
		$version['new'] = preg_replace('/[^0-9]/', '', $json['Version']);
	//
	print_r($version);
	if($version['new'] > $version['cur']) {
		// If there is a new update available
	} else {
		// If the user is running the latest version
		echo "You are running the latest version already" . $version['cur']
	}
?>