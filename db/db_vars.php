<?php		# VARIABLES
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
			$user['rank'] = $row[2];
			$user['email'] = $row[3];
			$user['password'] = $row[4];
			$user['firstname'] = $row[5];
			$user['surname'] = $row[6];
			$user['avatar'] = $row[7];
			$user['banner'] = $row[8];
			$user['last_online'] = $row[9];
			$user['registered'] = $row[10];
			$user['lang'] = $row[11];
			$user['change_passkey'] = $row[12];
			$user['enabled'] = $row[13];
		}
	// ENCRYPTION SETTINGS
		$sql="SELECT * FROM `var_security`";
		$query = mysqli_query($db_conx, $sql);
		while($row = mysqli_fetch_array($query)) {
			$mg_security[$row['title']] = $row['value'];
		}
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

			"js"			=>	$toroot."assets/js/",			// Relative path to `js` dir
			"css"			=>	$toroot."assets/css/",			// Relative path to `css` dir
			"forms"			=>	$toroot."inc/forms/",			// Relative path to `forms` dir
			"fragments"		=>	$toroot."inc/fragments/",	// Relative path to `fragments` dir
			"main_themes"	=>	$toroot."themes/",				// Relative path to `themes` dir
			
			"error"			=>	$toroot."error/",				// Relative path to `error` file
		); 
	// REDIRECTION LOCATIONS
		$mg_rdir = array(
			"login" => $toroot."login.php",
			"forgot_pass" => $toroot."forgot_password.php",
			"home" => $toroot."home.php"
		);
	// FILE INFO
		$mg_file = array(
			"name"		=> $_SERVER['DOCUMENT_URI'],
			"location"	=> $_SERVER['SCRIPT_FILENAME']
		);
	// GET FULL URL
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
			$mg['complete_uri'] = "https://";   
		else  
			$mg['complete_uri'] = "http://";   
		$mg['complete_uri'].= $_SERVER['HTTP_HOST'];    
		$mg['complete_uri'].= $_SERVER['REQUEST_URI'];    
	//
?>
<?php		# FUNCTIONS
	function getTitle($url) {
		$data = file_get_contents($url);
		$title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $data, $matches) ? $matches[1] : null;
		return $title;
	}
?>