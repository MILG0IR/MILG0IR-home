<?php
	// SET USERS IP
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
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
	// ENCRYPTION SETTINGS
		$mg_security = array(
			"hash"	=>	"sha512",
			"salt"	=>	"hVxAuijVqBRC7HtaOq4Bb5QbF2pZ9dETjqEUIt7jzhejRRuLjQJ3w5rDsRYTEjyf4TY2S9naLea5wUCHOMqpkAP9HCq9cGt7OwD3uvAuFvndoH9QibYyZL3wbfI6kplA"
		)
?>