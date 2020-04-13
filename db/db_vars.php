<?php
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
?><?php
	// CHECK IF THE USER IS LOGGED IN
		$user_ok = false;
		$log_id = "";
		$log_username = "";
		$log_password = "";
		// check if the cookies exist and are valid.
			if(isset($_COOKIE["id"]) && isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){
				$log_id = preg_replace('#[^0-9]#', '', $_COOKIE['id']);
				$log_username = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['user']);
				$log_password = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['pass']);

				$sql = "SELECT `ip` FROM `users` WHERE `id`='$log_id' AND `username`='$log_username' AND `password`='$log_password' AND `enabled`='1' LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$numrows = mysqli_num_rows($query);
				if($numrows > 0){
					return true;
				}
			}
		// CHECK IF THERE IS A SESSION IN THE DATABASE
			$sql = "SELECT `id` FROM `user_sessions` WHERE ip='$ip' AND activated='1' LIMIT 1";
			$query = mysqli_query($db_conx, $sql);
			$numrows = mysqli_num_rows($query);
			if($numrows > 0){
				return true;
			}
		// 
		$sql = "";
		if($cookies_exist && $session_exists) {
			$user_ok = true;
		} else {
			$user_ok = false;
		}
	//
?>
<?php
	// ENCRYPTION SETTINGS
		$mg_security = array(
			"hash"	=>	"sha512",
			"salt"	=>	"hVxAuijVqBRC7HtaOq4Bb5QbF2pZ9dETjqEUIt7jzhejRRuLjQJ3w5rDsRYTEjyf4TY2S9naLea5wUCHOMqpkAP9HCq9cGt7OwD3uvAuFvndoH9QibYyZL3wbfI6kplA"
		)
?>