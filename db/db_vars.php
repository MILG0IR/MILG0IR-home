<?php
	// find root
		$toroot = "";
		$i = count(explode('/',$_SERVER['DOCUMENT_URI'])) -2;
		while($i >= 1) {
			$toroot .= "../";
			$i--;
		}
	// SET USERS IP
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
	// APPLICATION INFORMATION
		$app_info = json_decode(file_get_contents($toroot.'etc/info.json'), true);
	// CHECK IF THE USER IS LOGGED IN
		// SET THE VARIABLES
			$user_ok = false;
			$log_id = "";
			$log_username = "";
			$log_password = "";
			$cookies_exist = false;
			$session_exists = false;
		// CHECK IF THE COOKIES EXIST AND ARE VALID.
			if(isset($_COOKIE["user_id"]) && isset($_COOKIE["session_id"]) && isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
				$log_id			= preg_replace('#[^0-9]#', '', $_COOKIE['user_id']);
				$log_session	= preg_replace('#[^0-9]#', '', $_COOKIE['session_id']);
				$log_username	= preg_replace('#[^a-z0-9]#i', '', $_COOKIE['username']);
				$log_password	= preg_replace('#[^a-z0-9]#i', '', $_COOKIE['password']);

				$sql = "SELECT `uid` FROM `users` WHERE `uid`='$log_id' AND `username`='$log_username' AND `password`='$log_password' AND `enabled`='1' LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$numrows = mysqli_num_rows($query);
				if($numrows > 0){
					$cookies_exist = true;
				}
			}
		// CHECK IF THERE IS A SESSION IN THE DATABASE
			$sql = "SELECT `session_id` FROM `user_sessions` WHERE `ip_address`='$ip' AND `active`='1' LIMIT 1";
			$query = mysqli_query($db_conx, $sql);
			$numrows = mysqli_num_rows($query);
			if($numrows > 0){
				$session_exists = true;
			}
		// EVALUATE WHETHER THE USER IS LOGGED IN
			if($cookies_exist && $session_exists) {
				$user_ok = true;
			} elseif(isset($_COOKIE["user_id"]) && isset($_COOKIE["session_id"]) && isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
				setcookie("user_id",	'',	strtotime('-5 days'),	'/');
				setcookie("session_id",	'',	strtotime('-5 days'),	'/');
				setcookie("username",	'',	strtotime('-5 days'),	'/');
				setcookie("password",	'',	strtotime('-5 days'),	'/');
			} else {
				$user_ok = false;
			}
	// SET USERDATA
		if($user_ok) {
			$sql = "SELECT * FROM `users` WHERE `username`='$log_username' AND `password`='$log_password' LIMIT 1";
			$query = mysqli_query($db_conx, $sql);
			$row = mysqli_fetch_row($query);
			$user['uid'] = $row[0];
			$user['username'] = $row[1];
			$user['email'] = $row[2];
			$user['password'] = $row[3];
			$user['change_passkey'] = $row[4];
			$user['enabled'] = $row[5];

			$sql = "SELECT * FROM `user_data` WHERE `uid`='$row[0]' LIMIT 1";
			$query = mysqli_query($db_conx, $sql);
			$row = mysqli_fetch_row($query);
			$user['rank'] = $row[0];
			$user['firstname'] = $row[1];
			$user['surname'] = $row[2];
			$user['avatar'] = $row[3];
			$user['banner'] = $row[4];
			$user['registered'] = $row[5];

			$sql = "SELECT * FROM `user_preferences` WHERE `uid`='$row[0]' LIMIT 1";
			$query = mysqli_query($db_conx, $sql);
			$row = mysqli_fetch_row($query);
			$user['lang'] = $row[0];
		}
	// ENCRYPTION SETTINGS
		$mg_security = array(
			"hash"	=>	"sha512",
			"salt"	=>	"hVxAuijVqBRC7HtaOq4Bb5QbF2pZ9dETjqEUIt7jzhejRRuLjQJ3w5rDsRYTEjyf4TY2S9naLea5wUCHOMqpkAP9HCq9cGt7OwD3uvAuFvndoH9QibYyZL3wbfI6kplA"
		);
	// SET THE IMAGE VARIABLES FROM THE DB
		$sql="SELECT * FROM `var_images`";
		$query = mysqli_query($db_conx, $sql);
		$mg_img = array();
		while ($row = mysqli_fetch_array($query)) {
			$mg_img[$row['id']] = array( 
				'image'			=> $row['image_base64'],
				'description'	=> $row['image_description']
			);
			$mg_img[$row['image_category']][$row['image_name']] = array( 
				'image'			=> $row['image_base64'],
				'description'	=> $row['image_description']
			);
		};
	// SET THE BRANDING VARIABLES FROM THE DB
		$sql="SELECT * FROM `var_branding`";
		$query = mysqli_query($db_conx, $sql);
		$mg_branding = array();
		while ($row = mysqli_fetch_array($query)) {
			$mg_branding[$row['name']] = array( 
				'id'			=> $row['id'],
				'value'			=> $row['value'],
				'description'	=> $row['description'],
				'updated'		=> $row['updated']
			);
		};
	// DIRECTORIES QUICK ACCESS
		$mg_dir = array(
			"root"			=>	$toroot,						// Relative path to `root` dir
			"api"			=>	$toroot."api/",					// Relative path to `API` dir
			"assets"		=>	$toroot."assets/",				// Relative path to `assets` dir
			"etc"			=>	$toroot."etc/",					// Relative path to `etc` dir
			"inc"			=>	$toroot."inc/",					// Relative path to `inc` dir
			"media"			=>	$toroot."media/",				// Relative path to `media` dir
			"pages"			=>	$toroot."pages/",				// Relative path to `pages` dir
			"userdata"		=>	$toroot."userdata/",			// Relative path to `userdata` dir

			"js"			=>	$toroot."inc/js/",				// Relative path to `js` dir
			"css"			=>	$toroot."inc/css/",				// Relative path to `css` dir
			"forms"			=>	$toroot."inc/forms/",			// Relative path to `forms` dir
			"fonts"			=>	$toroot."inc/fonts/",			// Relative path to `fonts` dir
			"templates"		=>	$toroot."inc/page_templates/",		// Relative path to `templates` dir
			
			"error"			=>	$toroot."error/",				// Relative path to `error` file
		); 
	// FILE INFO
		$mg_file = array(
			"name"		=> $_SERVER['DOCUMENT_URI'],
			"location"	=> $_SERVER['SCRIPT_FILENAME']
		);
	//
?>