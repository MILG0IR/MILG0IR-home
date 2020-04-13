<?php
	// DEFAULT INCLUDES
		include_once('./db/db_conx.php');
	// DIRECTORIES
		# find root
			$toroot = "";
			$i = count(explode('/',$_SERVER['DOCUMENT_URI'])) -2;
			while($i >= 1) {
				$toroot .= "../";
				$i--;
			}
		$mg_dir = array(
			"root"			=>	$toroot,						// Relative path to `root` dir
			"api"			=>	$toroot."api/",					// Relative path to `API` dir
			"assets"		=>	$toroot."assets/",				// Relative path to `assets` dir
			"etc"			=>	$toroot."etc/",					// Relative path to `etc` dir
			"inc"			=>	$toroot."inc/",					// Relative path to `inc` dir
			"media"			=>	$toroot."media/",				// Relative path to `media` dir
			"pages"			=>	$toroot."pages/",				// Relative path to `pages` dir
			"userdata"		=>	$toroot."userdata/",			// Relative path to `userdata` dir

			"forms"			=>	$toroot."inc/forms/",			// Relative path to `forms` dir
			"templates"		=>	$toroot."inc/templates/",		// Relative path to `templates` dir
			"fonts"			=>	$toroot."inc/fonts/",			// Relative path to `fonts` dir
			"js"			=>	$toroot."inc/js/",				// Relative path to `forms` dir
			"css"			=>	$toroot."inc/css/",				// Relative path to `forms` dir
			
			"error"			=>	$toroot."error/",				// Relative path to `error` file
		);
	// FILES
		$mg_file = array(
			"name"		=> $_SERVER['DOCUMENT_URI'],
			"location"	=> $_SERVER['SCRIPT_FILENAME']
		);
	// LOCAL USERDATA
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
?>