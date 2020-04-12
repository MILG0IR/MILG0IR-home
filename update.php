<?php
	// CREATE THE VARIABLES
		$version = array();
	// GET CURRENT VERSION
		$json = json_decode(file_get_contents('./etc/info.json'), TRUE);
		$version['cur'] = preg_replace('/[^0-9]/', '', $json['Version']);
	// RUN THE API TO CHECK FOR NEW VERSION
		
	//
	print_r($version);
	if($version['new'] > $version['cur']) {
		// If there is a new update available
	} else {
		// If the user is running the latest version
		echo "You are running the latest version already" . $version['cur']
	}
?>