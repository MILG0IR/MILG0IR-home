<?php
	include_once("../db/db_conx.php");
	// SET THE VARIABLES IF AVAILABLE
		#																	# Variable			|	Description
		#------------------------------------------------------------------------------------------------------------------------------------------------------------------
			if(isset($_GET['#']) || isset($_POST['#'])) {					# $api_type			|	API type
				if(isset($_GET['#'])) {
					$api_type = $_GET['#'];
				} else {
					$api_type = $_POST['#'];
				}
			} else {$api_type = NULL;}										#					|
			if(isset($_GET['e']) || isset($_POST['e'])) {					# $email			|	E-Mail address
				if(isset($_GET['e'])) {
					$email = $_GET['e'];
				} else {
					$email = $_POST['e'];
				}
			} else {$email = NULL;}											#					|
			if(isset($_GET['u']) || isset($_POST['u'])) {					# $username			|	username
				if(isset($_GET['u'])) {
					$username = $_GET['u'];
				} else {
					$username = $_POST['u'];
				}
			} else {$username = NULL;}										#					|
			if(isset($_GET['p']) || isset($_POST['p'])) {					# $password			|	Password
				if(isset($_GET['p'])) {
					$password = $_GET['p'];
				} else {
					$password = $_POST['p'];
				}
			} else {$password = NULL;}										#					|
			if(isset($_GET['fn']) || isset($_POST['fn'])) {					# $firstname		|	Firstname
				if(isset($_GET['fn'])) {
					$firstname = $_GET['fn'];
				} else {
					$firstname = $_POST['fn'];
				}
			} else {$firstname = NULL;}										#					|
			if(isset($_GET['sn']) || isset($_POST['sn'])) {					# $surname			|	Surname
				if(isset($_GET['sn'])) {
					$surname = $_GET['sn'];
				} else {
					$surname = $_POST['sn'];
				}
			} else {$surname = NULL;}										#					|
			if(isset($_GET['mob']) || isset($_POST['mob'])) {				# $mobile			|	Mobile #
				if(isset($_GET['mob'])) {
					$mobile = $_GET['mob'];
				} else {
					$mobile = $_POST['mob'];
				}
			} else {$mobile = NULL;}										#					|
			if(isset($_GET['img_avatar']) || isset($_POST['img_avatar'])) {	# $avatar			|	Avatar Base64
				if(isset($_GET['img_avatar'])) {
					$avatar = $_GET['img_avatar'];
				} else {
					$avatar = $_POST['img_avatar'];
				}
			} else {$avatar = NULL;}										#					|
			if(isset($_GET['img_banner']) || isset($_POST['img_banner'])) {	# $banner			|	Banner Base64
				if(isset($_GET['img_banner'])) {
					$banner = $_GET['img_banner'];
				} else {
					$banner = $_POST['img_banner'];
				}
			} else {$banner = NULL;}										#					|
			if(isset($_GET['uid']) || isset($_POST['uid'])) {				# $uid				|	User ID
				if(isset($_GET['uid'])) {
					$uid = $_GET['uid'];
				} else {
					$uid = $_POST['uid'];
				}
			} else {$uid = NULL;}											#					|
			if(isset($_GET['msg']) || isset($_POST['msg'])) {				# $msg				|	Message
				if(isset($_GET['msg'])) {
					$message = $_GET['msg'];
				} else {
					$message = $_POST['msg'];
				}
			} else {$message = NULL;}										#					|
			if(isset($_GET['uri']) || isset($_POST['uri'])) {				# $uri				|	Web URI
				if(isset($_GET['uri'])) {
					$uri = $_GET['uri'];
				} else {
					$uri = $_POST['uri'];
				}
			} else {$uri = NULL;}											#					|
			if(isset($_GET['device']) || isset($_POST['device'])) {			# $device			|	Device
				if(isset($_GET['device'])) {
					$device = $_GET['device'];
				} else {
					$device = $_POST['device'];
				}
			} else {$device = NULL;}										#					|
			if(isset($_GET['branch']) || isset($_POST['branch'])) {			# $branch			|	Branch
				if(isset($_GET['branch'])) {
					$branch = $_GET['branch'];
				} else {
					$branch = $_POST['branch'];
				}
			} else {$branch = NULL;}										#					|
			if(isset($_GET['code']) || isset($_POST['code'])) {				# $code				|	Response code
				if(isset($_GET['code'])) {
					$code = $_GET['code'];
				} else {
					$code = $_POST['code'];
				}
			} else {$code = NULL;}
		#------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//
	// GET ERROR CODE INFO
		if($api_type == "search_code") {
			if(isset($code)) {
				$sql = "SELECT `code`, `reason`, `user_error` FROM `var_response_codes` WHERE `code`='$code' LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$row = mysqli_fetch_row($query);
				exit(json_encode($row));
			}
		}
    // CHECK USERNAME AVAILABILITY
		elseif($api_type == "check_username"){
			if(isset($username)){
				$sql = "SELECT `uid` FROM `users` WHERE `username`='$username' LIMIT 1";
				$query = mysqli_query($db_conx, $sql); 
				$uname_check = mysqli_num_rows($query);
				if (strlen($username) < 3 || strlen($username) > 16) {
					exit('ERR-UNC-1');
				}
				if (is_numeric($username[0])) {
					exit('ERR-UNC-2');
				}
				if ($uname_check < 1) {
					exit('INF-UNC-1');
				} else {
					exit('INF-UNC-2');
				}
			}
		}
    // CHECK EMAIL AVAILABILITY
		elseif($api_type == "check_email"){
			if(isset($email)){
				$sql = "SELECT `uid` FROM `users` WHERE `email`='$email' LIMIT 1";
				$query = mysqli_query($db_conx, $sql); 
				$email_check = mysqli_num_rows($query);
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					exit('ERR-EMC-1');
				}
				if($email_check < 1) {
					exit('INF-EMC-1');
				} else {
					exit('INF-EMC-2');
				}
			}
		}
	// CREATE ACCOUNT
		elseif($api_type == "signup") {
			if(!isset($username) || !isset($email) || !isset($password)) {
				exit("ERR-SUP-1");
			} else {
				// SET THE VARIABLES
					$e = $email;
					$u = $username;
					$p = $password;
					$p_hash = hash($mg_security['hash'], $mg_security['salt'].$password.$mg_security['salt']);
				// CHECK FOR EXISTING USERNAME
					$sql = "SELECT `uid` FROM `users` WHERE `username`='$u' LIMIT 1";
					$query = mysqli_query($db_conx, $sql); 
					$u_check = mysqli_num_rows($query);
				// CHECK FOR EXISTING EMAIL ADDRESS
					$sql = "SELECT `uid` FROM `users` WHERE `email`='$e' LIMIT 1";
					$query = mysqli_query($db_conx, $sql); 
					$e_check = mysqli_num_rows($query);
				// DO BASIC CHECKS
					if($u_check > 0){ 
						exit("ERR-SUP-2");
					} elseif($e_check > 0){ 
						exit("ERR-SUP-3");
					} elseif(strlen($u) < 3 || strlen($u) > 16) {
						exit("ERR-SUP-4"); 
					} elseif(is_numeric($u[0])) {
						exit("ERR-SUP-5");
					}
				// CRATE ROW IN `users` TABLE
					$sql = "INSERT INTO `users` (`username`, `email`, `password`)       
							VALUES('$u', '$e', '$p_hash')";
					$query = mysqli_query($db_conx, $sql); 
					$uid = mysqli_insert_id($db_conx);
				// GET THE USER'S UID
					$sql = "SELECT `uid` FROM `users` WHERE `username`='$u' AND `email`='$e' AND `password`='$p_hash' LIMIT 1";
					$query = mysqli_query($db_conx, $sql); 
					$row = mysqli_fetch_row($query);
					$uid = $row[0];
				// CRATE ROW IN `user_data` TABLE
					$sql = "INSERT INTO `user_data` (`uid`, `registered`)       
							VALUES('$uid', now())";
					$query = mysqli_query($db_conx, $sql); 
					$uid = mysqli_insert_id($db_conx);
				// CRATE ROW IN `user_prefs` TABLE
					$sql = "INSERT INTO `user_preferences` (`uid`)       
							VALUES('$uid')";
					$query = mysqli_query($db_conx, $sql); 
					$uid = mysqli_insert_id($db_conx);
				// CREATE USER FOLDER
					if (!file_exists("user/$u")) {
						mkdir("user/$u", 0755);
					}
				// RESPOND
					exit("success");
				//
			}
			exit("ERR-SUP-OTHER");
		}
	// LOGIN
		elseif($api_type == "login") {
			$success = NULL;
			if($email == "") {
				exit("ERR-LIN-2");
			} else {
				$e = mysqli_real_escape_string($db_conx, $email);;
				$p = hash($mg_security['hash'], $mg_security['salt'].$password.$mg_security['salt']);
				// CHECK IF USER ENTERED USERNAME OR EMAIL ADDRESS
					$sql = "SELECT count(*) FROM `users` WHERE `email`='$e' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
					$row = mysqli_fetch_array($query);
					$total = $row[0];
					if($total > 0) {
						// USER ENTERED THEIR EMAIL
						$success = "email";
					} else {
						// NO ACCOUNT EXISTS WITH THAT EMAIL ADDRESS. TRYING USERNAME
						$sql = "SELECT count(*) FROM `users` WHERE `username`='$e' LIMIT 1";
						$query = mysqli_query($db_conx, $sql);
						$row = mysqli_fetch_array($query);
						$total = $row[0];
						if($total > 0) {
							// USER ENTERED THEIR USERNAME
							$success = "username";
						} else {
							// NO ACCOUNT EXISTS WITH THAT EMAIL OR USERNAME
							exit("ERR-LIN-4");
						}
					}
				// CHECK IF USER ACCOUNT IS ENABLED
					$sql = "SELECT count(*) FROM `users` WHERE `username`='$e' AND `enabled`='1' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
					$row = mysqli_fetch_array($query);
					$total = $row[0];
					if(!$total > 0) {
						// USER IS NOT ENABLED
						exit("ERR-LIN-5");
					}
				// LOG THE USER INTO THEIR ACCOUNT
				if(isset($success)) {
					$sql = "SELECT `uid`, `username`, `password` FROM `users` WHERE `$success`='$e' AND `enabled`='1' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
					$row = mysqli_fetch_row($query);
					$user_id = $row[0];
					$db_username = $row[1];
					$db_pass_str = $row[2];
					#--------------------------------#
					if($p != $db_pass_str){
						exit("ERR-LIN-6");
					} else {
						// create the session in the database
						$sql = "INSERT INTO `user_sessions` (`uid`, `ip_address`, `start_time`, `active`) VALUES ('$user_id', '$ip', now(), '1')";
						$query = mysqli_query($db_conx, $sql);
						// get the sessionm ID
						$sql = "SELECT `session_id` FROM `user_sessions` WHERE `uid`='$user_id' AND `ip_address`='$ip' AND `active`='1' LIMIT 1";
						$query = mysqli_query($db_conx, $sql);
						$row = mysqli_fetch_row($query);
						$session_id = $row[0];
						setcookie("user_id",	$user_id,		strtotime('+30 days'),	"/",	"",	"",	TRUE);
						setcookie("session_id",	$user_id,		strtotime('+30 days'),	"/",	"",	"",	TRUE);
						setcookie("username",	$db_username,	strtotime('+30 days'),	"/",	"",	"",	TRUE);
						setcookie("password",	$db_pass_str,	strtotime('+30 days'),	"/",	"",	"",	TRUE);
						exit("success");
					}
				}
			}
			exit("ERR-LIN-OTHER");
		}
	// LOGOUT
		elseif($api_type == "logout") {
			// SEARCH FOR AND REMOVE THE COOKIES
				if(isset($_COOKIE["user_id"]) && isset($_COOKIE["session_id"]) && isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
					unset($_COOKIE['user_id']);
					unset($_COOKIE['session_id']);
					unset($_COOKIE['username']);
					unset($_COOKIE['password']);
					setcookie("user_id",	'',	strtotime('-5 days'),	'/');
					setcookie("session_id",	'',	strtotime('-5 days'),	'/');
					setcookie("username",	'',	strtotime('-5 days'),	'/');
					setcookie("password",	'',	strtotime('-5 days'),	'/');
					// confirm the cookies have been deleted
					if(isset($_COOKIE["user_id"]) && isset($_COOKIE["session_id"]) && isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
						exit('ERR-LOU-1');
					}
				}
			// SEARCH FOR AND END THE SESSION
				$sql = "SELECT `session_id` FROM `user_sessions` WHERE `ip_address`='$ip' AND `active`='1' LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$numrows = mysqli_num_rows($query);
				if($numrows > 0){
					$row = mysqli_fetch_row($query);
					$sql = "UPDATE `user_sessions` SET `end_time`=now(), `active`='0' WHERE `session_id`='$row[0]'";
					$query = mysqli_query($db_conx, $sql);
					// confirm the session has been deleted
					$sql = "SELECT `session_id` FROM `user_sessions` WHERE `ip_address`='$ip' AND `active`='1' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
					$numrows = mysqli_num_rows($query);
					if($numrows > 0){
						exit('ERR-LOU-2');
					}
				}
			exit('success');
		}
	// RESET PASSWORD
		elseif($api_type == "forgot_password") {
			if(isset($email)) {
				// SEARCH FOR the user - if user exists send the email.
					$sql = "SELECT `uid` FROM `users` WHERE `email`='$email' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
					$numrows = mysqli_num_rows($query);
					if($numrows > 0){
						// User exists and the email will be sent
						exit('success');
					} else {
						// User does not exist and the email will not be sent
						exit('ERR-PWR-1');
					}
			}
		}
	// UPDATE AVATAR						T.B.D
		#
	// UPDATE BANNER						T.B.D
		#
	// GET USERDATA							T.B.D
		#
	// UPDATE USERDATA						T.B.D
		#
	// CHECK FOR MESSAGES					T.B.D
		#
	// SEND MESSAGE							T.B.D
		#
	// GET LATEST VERSION					T.B.D
		#
	// UPDATE								T.B.D
		#
	//
?>