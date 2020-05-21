<?php
	include_once("../db/db_conx.php");
	// SET THE VARIABLES IF AVAILABLE
		#																	# Variable			|	Description
		#------------------------------------------------------------------------------------------------------------------------------------------------------------------
			if(isset($_GET['$']) || isset($_POST['$'])) {					# $api_type			|	API type
				if(isset($_GET['$'])) {
					$api_type = $_GET['$'];
				} else {
					$api_type = $_POST['$'];
				}
			} else {$api_type = NULL;}										#					|
			if(isset($_GET['_']) || isset($_POST['_'])) {					# $api_key			|	API key
				if(isset($_GET['_'])) {
					$api_key = $_GET['_'];
				} else {
					$api_key = $_POST['_'];
				}
			} else {$api_key = NULL;}										#					|
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
			if(isset($_GET['ref']) || isset($_POST['ref'])) {				# $reference		|	Reference code for the user
				if(isset($_GET['ref'])) {
					$reference = $_GET['ref'];
				} else {
					$reference = $_POST['ref'];
				}
			} else {$reference = NULL;}										#					|
			if(isset($_GET['uid']) || isset($_POST['uid'])) {				# $uid				|	User ID
				if(isset($_GET['uid'])) {
					$uid = $_GET['uid'];
				} else {
					$uid = $_POST['uid'];
				}
			} else {$uid = NULL;}											#					|
			if(isset($_GET['id']) || isset($_POST['id'])) {					# $id				|	ID
				if(isset($_GET['id'])) {
					$id = $_GET['id'];
				} else {
					$id = $_POST['id'];
				}
			} else {$id = NULL;}											#					|
			if(isset($_GET['nid']) || isset($_POST['nid'])) {				# $nid				|	New ID
				if(isset($_GET['nid'])) {
					$nid = $_GET['nid'];
				} else {
					$nid = $_POST['nid'];
				}
			} else {$nid = NULL;}											#					|
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
			if(isset($_GET['version']) || isset($_POST['version'])) {		# $ver				|	version
				if(isset($_GET['version'])) {
					$ver = $_GET['version'];
				} else {
					$ver = $_POST['version'];
				}
			} else {$ver = NULL;}											#					|
			if(isset($_GET['code']) || isset($_POST['code'])) {				# $code				|	Response code
				if(isset($_GET['code'])) {
					$code = $_GET['code'];
				} else {
					$code = $_POST['code'];
				}
			} else {$code = NULL;}											#					|
			if(isset($_GET['table']) || isset($_POST['table'])) {			# $table			|	Database table
				if(isset($_GET['table'])) {
					$table = $_GET['table'];
				} else {
					$table = $_POST['table'];
				}
			} else {$table = NULL;}											#					|
			if(isset($_GET['data']) || isset($_POST['data'])) {				# $data				|	data
				if(isset($_GET['data'])) {
					$data = $_GET['data'];
				} else {
					$data = $_POST['data'];
				}
			} else {$data = NULL;}											#					|
			if(isset($_GET['name']) || isset($_POST['name'])) {				# $name				|	name
				if(isset($_GET['name'])) {
					$name = $_GET['name'];
				} else {
					$name = $_POST['name'];
				}
			} else {$name = NULL;}											#					|
			if(isset($_GET['desc']) || isset($_POST['desc'])) {				# $desc				|	Description
				if(isset($_GET['desc'])) {
					$desc = $_GET['desc'];
				} else {
					$desc = $_POST['desc'];
				}
			} else {$desc = NULL;}											#					|
			if(isset($_GET['icon']) || isset($_POST['icon'])) {				# $icon				|	Icon in Base64 format
				if(isset($_GET['icon'])) {
					$icon = $_GET['icon'];
				} else {
					$icon = $_POST['icon'];
				}
			} else {$icon = NULL;}											#					|
			if(isset($_GET['title']) || isset($_POST['title'])) {			# $title			|	title
				if(isset($_GET['title'])) {
					$title = $_GET['title'];
				} else {
					$title = $_POST['title'];
				}
			} else {$title = NULL;}											#					|
			if(isset($_GET['uri_local']) || isset($_POST['uri_local'])) {	# $uri_local		|	Page local URI
				if(isset($_GET['uri_local'])) {
					$uri_local = $_GET['uri_local'];
				} else {
					$uri_local = $_POST['uri_local'];
				}
			} else {$uri_local = NULL;}										#					|
			if(isset($_GET['uri_remote']) || isset($_POST['uri_remote'])) {	# $uri_remote		|	Page remote URI
				if(isset($_GET['uri_remote'])) {
					$uri_remote = $_GET['uri_remote'];
				} else {
					$uri_remote = $_POST['uri_remote'];
				}
			} else {$uri_remote = NULL;}									#					|
			if(isset($_GET['u1']) || isset($_POST['u1'])) {					# $u1				|	Page local URI
				if(isset($_GET['u1'])) {
					$u1 = $_GET['u1'];
				} else {
					$u1 = $_POST['u1'];
				}
			} else {$u1 = NULL;}											#					|
			if(isset($_GET['u2']) || isset($_POST['u2'])) {					# $u2				|	Page remote URI
				if(isset($_GET['u2'])) {
					$u2 = $_GET['u2'];
				} else {
					$u2 = $_POST['u2'];
				}
			} else {$u2 = NULL;}
		#------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// CHECK API KEY
		if($api_type == "confirm_api_key") {
			if(isset($api_key)){
				exit("success");
			}
		}
	// GET ERROR CODE INFO
		else if($api_type == "search_code") {
			if(isset($code)) {
				$sql = "SELECT `code`, `reason`, `user_error` FROM `var_response_codes` WHERE `code`='$code' LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$row = mysqli_fetch_row($query);
				exit(json_encode($row));
			}
		}
    // CHECK USERNAME AVAILABILITY
		else if($api_type == "check_username"){
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
		else if($api_type == "check_email"){
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
		else if($api_type == "signup") {
			if(isset($username) && isset($email) && isset($password) && isset($firstname) && isset($surname) && isset($reference)
			&& strlen($username) > 0 && strlen($email) > 0 && strlen($password) > 0 && strlen($firstname) > 0 && strlen($reference) > 0 && strlen() > 0) {
				// SET THE VARIABLES
					$p_hash = hash($mg_security['hash'], $mg_security['salt'].$password.$mg_security['salt']);
				// CHECK USERNAME USERNAME
					// CHECK USERNAME VALID
						if(is_numeric($username[0])) {
							exit("ERR-SUP-6");
						} else if(strlen($username) < 3) {
							exit("ERR-SUP-5");
						}
					// CHCEK USERNAME IS AVAIALBLE
						$sql = "SELECT `uid` FROM `users` WHERE `username`='$username' LIMIT 1";
						$query = mysqli_query($db_conx, $sql); 
						$u_check = mysqli_num_rows($query);
						if($u_check > 0) { 
							exit("ERR-SUP-3");
						}
				// CHECK FOR EXISTING EMAIL ADDRESS
					if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$sql = "SELECT `uid` FROM `users` WHERE `email`='$email' LIMIT 1";
						$query = mysqli_query($db_conx, $sql);
						$e_check = mysqli_num_rows($query);
						if($e_check > 0) { 
							exit("ERR-SUP-4");
						}
					} else {
						exit('ERR-SUP-7');
					}
				// CHECK IF NAME IS VALID (Not empty)
					if($firstname == '' && $surname == ''){
						// name is invalid
						exit('ERR-SUP-9');
					}
					if($firstname == ''){
						// firstname is invalid
						exit('ERR-SUP-10');
					}
					if($surname == ''){
						// surname is invalid
						exit('ERR-SUP-11');
					}
				// CHECK IF THE REFERENCE CODE IS VALID
					if(preg_match("/[a-zA-Z]{2}[0-9]{1}-[0-9]{2}[a-zA-Z]{1}-[a-zA-Z]{3}-[0-9]{3}/",$reference)) {
						$sql = "SELECT `id` FROM `user_references` WHERE `reference_code`='$reference' AND `active`='1' LIMIT 1";
						$query = mysqli_query($db_conx, $sql);
						$ref_check = mysqli_num_rows($query);
						if($ref_check == 0) { 
							exit("ERR-SUP-2");
						}
					} else {
						exit('ERR-SUP-8');
					}
				// CRATE ROW IN `users` TABLE
					$sql = "INSERT INTO `users` (`username`, `email`, `password`, `firstname`, `surname`, `reference`, `change_passkey`, `enabled`)
								VALUES('$username', '$email', '$p_hash', '$firstname', '$surname', '$reference', 0, 1)";
					$query = mysqli_query($db_conx, $sql); 
					$uid = mysqli_insert_id($db_conx);
				// GET THE USER'S UID
					$sql = "SELECT `uid` FROM `users` WHERE `username`='$username' AND `email`='$email' AND `password`='$p_hash' LIMIT 1";
					$query = mysqli_query($db_conx, $sql); 
					$row = mysqli_fetch_row($query);
					$uid = $row[0];
				// CRATE ROW IN `user_data` TABLE
					$sql = "INSERT INTO `user_data` (`uid`, `registered`)       
								VALUES('$uid', now())";
					$query = mysqli_query($db_conx, $sql); 
					$uid = mysqli_insert_id($db_conx);
				// CRATE ROW IN `user_preferences` TABLE
					$sql = "INSERT INTO `user_preferences` (`uid`)
								VALUES('$uid')";
					$query = mysqli_query($db_conx, $sql); 
					$uid = mysqli_insert_id($db_conx);
				// CLOSE THE REFERENCE
					$sql = "UPDATE `user_references` SET `active`=0 WHERE `reference_code`='$reference' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
				// RESPOND
					exit("success");
				//
			} else {
				exit("ERR-SUP-1");
			}
			exit("ERR-SUP-OTHER");
		}
	// LOGIN
		else if($api_type == "login") {
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
				//
			}
			exit("ERR-LIN-OTHER");
		}
	// LOGOUT
		else if($api_type == "logout") {
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
				$sql = "SELECT `session_id` FROM `user_sessions` WHERE `ip_address`='$ip' AND `active`=1 LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$numrows = mysqli_num_rows($query);
				if($numrows > 0){
					$row = mysqli_fetch_row($query);
					$sql = "UPDATE `user_sessions` SET `end_time`=now(), `active`=0 WHERE `session_id`='$row[0]'";
					$query = mysqli_query($db_conx, $sql);
					// confirm the session has been deleted
					$sql = "SELECT `session_id` FROM `user_sessions` WHERE `ip_address`='$ip' AND `active`=1 LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
					$numrows = mysqli_num_rows($query);
					if($numrows > 0){
						exit('ERR-LOU-2');
					}
				}
			exit('success');
		}
	// RESET PASSWORD ~ FORGOT PASSWORD
		else if($api_type == "forgot_password") {
			if(isset($email) && isset($password) && isset($reference)) {
				// SEARCH FOR the user
					$sql = "SELECT `uid` FROM `users` WHERE `email`='$email' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
					$numrows = mysqli_num_rows($query);
					if($numrows > 0){
						$row = mysqli_fetch_row($query);
						$useruid = $row[0];
						$userstatus = true;
					} else {
						exit('ERR-PWR-1');
					}
				// Validate the Reference code
					if(preg_match("/[a-zA-Z]{2}[0-9]{1}-[0-9]{2}[a-zA-Z]{1}-[a-zA-Z]{3}-[0-9]{3}/",$reference)) {
						$sql = "SELECT `id` FROM `user_references` WHERE `reference_code`='$reference' AND `active`='1' LIMIT 1";
						$query = mysqli_query($db_conx, $sql);
						$numrows = mysqli_num_rows($query);
						if($numrows > 0){
							$refstatus = true;
						} else {
							exit('ERR-PWR-2');
						}
					} else {
						exit('ERR-PWR-3');
					}
				// Reset password
					if($userstatus && $refstatus) {
						$p_hash = hash($mg_security['hash'], $mg_security['salt'].$password.$mg_security['salt']);
						$sql = "UPDATE `users` SET `password`='$p_hash' WHERE `uid`='$useruid' LIMIT 1";
						$query = mysqli_query($db_conx, $sql);
						$id = $nid;
					}
				//
			}
		}
	// RESET PASSWORD ~ PASSWORD RESET WITHIN PROFILE
		else if($api_type == "reset_password") {
			if(isset($email) && isset($password)) {
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
				//
			}
		}
	// CHECK REFERENCE
		else if($api_type == "check_reference") {
			if(!isset($reference)) {
				exit('ERR-REF-1');
			} else {
				if(preg_match("/[a-zA-Z]{2}[0-9]{1}-[0-9]{2}[a-zA-Z]{1}-[a-zA-Z]{3}-[0-9]{3}/",$reference)) {
					$sql = "SELECT `id` FROM `user_references` WHERE `reference_code`='$reference' AND `active`='1' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
					$numrows = mysqli_num_rows($query);
					if($numrows > 0){
						exit('INF-REF-1');
					} else {
						exit('ERR-REF-2');
					}
				} else {
					exit('ERR-REF-3');
				}
			}
		}
	// GET PAGE INFO
		else if($api_type == "get_page_data") {
			if(isset($id)) {
				$sql = "SELECT * FROM `var_pages` WHERE `id`='$id' LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$row = mysqli_fetch_row($query);
				exit(json_encode($row));
			}
		}
	// CHECK FOR AN UPDATE
		else if($api_type == "check_for_update") {
			if(isset($branch)) {
				if(isset($ver)) {
					if(isset($device)) {
						$update_uri = "https://raw.githubusercontent.com/MILG0IR/MILG0IR-home-".$device."/".$branch."/etc/info.json";
						$update_info = json_decode(file_get_contents($update_uri), true);
					
						if($app_info['Version'] == $update_info['Version']) {
							exit("INF-UPD-1");
							// Latest version is currently installed
						} else if($app_info['Version'] > $update_info['Version']) {
							exit("INF-UPD-2");
							// Update is available
						} else if($app_info['Version'] < $update_info['Version']) {
							exit("INF-UPD-3");
							// Current version is larger than the latest
						} else {
							exit("ERR-UPD-OTHER");
						}
					} else {
						exit("ERR-UPD-1");
						// DEVICE IS NOT SET
					}
				} else {
					exit("ERR-UPD-2");
					// VERSION IS NOT SET
				}
			} else {
				exit("ERR-UPD-3");
				// BRANCH IS NOT SET
			}
		}
	// GET TABLE DATA
		else if($api_type == "get_sql_data") {
			if(isset($table)) {
				$sql = "SELECT * FROM `".$table."`";
				$query = mysqli_query($db_conx, $sql);
				$result = "";
				while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					$result .= json_encode($row);
				}
				$JSONarray = "[".str_replace("}{", "},{", $result)."]";
				exit($JSONarray);
			}
		}
	// CREATE USER REFERENCE CODE
		else if($api_type == "create_user_reference") {
			if(isset($username)) {
				$letters = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'); shuffle($letters);
				$numbers = str_split('0123456789'); shuffle($numbers);
				$code = $randLetters = $randNumbers = "";
				foreach(array_rand($letters, 6) as $k) $randLetters .= $letters[$k];
				foreach(array_rand($numbers, 6) as $k) $randNumbers .= $numbers[$k];
				$l = str_split($randLetters);
				$n = str_split($randNumbers);
				$code = $l[0].$l[1].$n[0]."-".$n[1].$n[2].$l[2]."-".$l[3].$l[4].$l[5]."-".$n[3].$n[4].$n[4];
				if(preg_match("/[a-zA-Z]{2}[0-9]{1}-[0-9]{2}[a-zA-Z]{1}-[a-zA-Z]{3}-[0-9]{3}/", $code)) {
					$sql = "INSERT INTO `user_references` (`reference_code`, `made_by_user`, `made_by_time`, `active`)
								VALUES(	'$code', '$username', now(), '1')";
					$query = mysqli_query($db_conx, $sql); 
					$uid = mysqli_insert_id($db_conx);
					// Check to see if reference has been 
					$sql = "SELECT `id` FROM `user_references` WHERE `reference_code`='$code' AND `active`='1' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
					$numrows = mysqli_num_rows($query);
					if($numrows > 0){
						exit($code);
					} else {
						exit('ERR-REF-6');
					}
				} else {
					exit("ERR-REF-OTHER");
				}
			}
		}
	// DEACTIVATE USER REFERENCE
		else if($api_type == "deactivate_user_reference") {
			if(isset($id)){
				$sql = "UPDATE `user_references` SET `active`=0 WHERE `id`='$id' LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				// Check to see if reference has been 
				$sql = "SELECT `id` FROM `user_references` WHERE `id`='$id' AND `active`=0 LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$numrows = mysqli_num_rows($query);
				if($numrows > 0){
					exit("success");
				} else {
					exit('ERR-REF-4');
				}
			} else {
				exit("ERR-REF-OTHER");
			}
		}
	// REACTIVATE USER REFERENCE
		else if($api_type == "reactivate_user_reference") {
			if(isset($id)){
				$sql = "UPDATE `user_references` SET `active`='1' WHERE `id`='$id'";
				$query = mysqli_query($db_conx, $sql);
				// Check to see if reference has been 
				$sql = "SELECT `id` FROM `user_references` WHERE `id`='$id' AND `active`=0 LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$numrows = mysqli_num_rows($query);
				if($numrows > 0){
					exit('ERR-REF-5');
				} else {
					exit("success");
				}
			} else {
				exit("ERR-REF-OTHER");
			}
		}
	// UPDATE RANK INFO
		else if($api_type == "update_rank_info") {
			if(isset($id) && isset($name)) {
				// Check for new ID if moved in ranks
					if(isset($nid)) {
						$sql = "UPDATE `user_ranks` SET `id`='$nid' WHERE `id`='$id' LIMIT 1";
						$query = mysqli_query($db_conx, $sql);
						$id = $nid;
					}
				// Update the information in the table
					if(isset($icon)) {
						$icon = str_replace(" ", "+", $icon);
					}
					$sql = "UPDATE `user_ranks` SET `name`='$name', `description`='$desc', `icon`='$icon' WHERE `id`='$id' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
				// Test and check that the information has been updated successfully
					$sql = "SELECT * FROM `user_ranks` WHERE `id`='$id' AND `icon`='$icon' AND `name`='$name' AND `description`='$desc' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
					$confirm = mysqli_num_rows($query);
						if($confirm > 0) {
							exit("success");
						} else {
							exit("ERR-RNK-1");
						}
				//
			exit("ERR-RNK-OTHER");
			}
		}
	// UPDATE PAGE INFO	
		else if($api_type == "update_page_info") {
			if(isset($id) && isset($title)) {
				// Check for new ID if moved in ranks
					if(isset($nid)) {
						$sql = "UPDATE `var_pages` SET `id`='$nid' WHERE `id`='$id' LIMIT 1";
						$query = mysqli_query($db_conx, $sql);
						$id = $nid;
					}
				// Update the information in the table
					if(isset($icon)) {
						$icon = str_replace(" ", "+", $icon);
					}
					$sql = "UPDATE `var_pages` SET `title`='$title', `description`='$desc', `icon`='$icon', `uri_local`='$uri_local', `uri_remote`='$uri_remote' WHERE `id`='$id' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
				// Test and check that the information has been updated successfully
					$sql = "SELECT * FROM `var_pages` WHERE `id`='$id' AND `icon`='$icon' AND `title`='$title' AND `description`='$desc' AND `uri_local`='$uri_local' AND `uri_remote`='$uri_remote' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
					$confirm = mysqli_num_rows($query);
						if($confirm > 0) {
							exit("success");
						} else {
							exit("ERR-PAG-1");
						}
				//
			exit("ERR-PAG-OTHER");
			}
		}
	// UPDATE USER SETTINGS
	// CONFIRM PASSWORD
		else if($api_type == "confirm_password") {
			if(isset($username) && isset($password)) {
				$p = hash($mg_security['hash'], $mg_security['salt'].$password.$mg_security['salt']);
				$sql = "SELECT `uid`, `username`, `password` FROM `users` WHERE `username`='$username' AND `enabled`='1' LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$row = mysqli_fetch_row($query);
				$db_pass_str = $row[2];
				if($p == $db_pass_str){
					exit('success');
				} else {
					exit('ERR-PCF-1');
				}
			} else {
				exit('ERR-PCF-2');
			}
			exit('ERR-PCF-OTHER');
		}
	// SEARCH REFERENCE DATA
		if($api_type == "get_reference_data") {
			$sql = "SELECT * FROM `user_references` WHERE `reference_code`='$reference' LIMIT 1";
			$query = mysqli_query($db_conx, $sql);
			$row = mysqli_fetch_row($query);
			exit(json_encode($row));
		}
	// SEARCH USERNAME
		else if($api_type == "search_username") {
			if(isset($uid)) {
				$sql = "SELECT `firstname`, `surname` FROM `users` WHERE `uid`=$uid LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$row = mysqli_fetch_row($query);
				exit($row[0].' '.$row[1]);
			}
		}
	// CHECK FOR MESSAGES
		else if($api_type == "get_messages") {
			if(isset($u1) && isset($u2)) {
				$sql = "SELECT * FROM `var_messages` WHERE `user1`='$u1' AND `user2`='$u2' OR `user1`='$u2' AND `user2`='$u1' ORDER BY `timestamp` ASC";
				$query = mysqli_query($db_conx, $sql);
				$result = "";
				while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					$result .= json_encode($row);
				}
				$JSONarray = "[".str_replace("}{", "},{", $result)."]";
				exit($JSONarray);
			} else {
				exit();
			}
		}
	// CHECK FOR UNREAD MESSAGES
		else if($api_type == "get_messages_unread") {
			if(isset($u1)) {
				$sql = "SELECT * FROM `var_messages`
							WHERE `user2`='$u1'
								AND `status`=0
							ORDER BY `timestamp` ASC";
				$query = mysqli_query($db_conx, $sql);
				$result = "";
				while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					$result .= json_encode($row);
				}
				$JSONarray = "[".str_replace("}{", "},{", $result)."]";
				$sql = "UPDATE `var_messages`
							SET `status`=1
							WHERE `user2`='$u1'
								AND `status`=0;";
				$query = mysqli_query($db_conx, $sql);
				exit($JSONarray);
			} else {
				exit();
			}
		}
	// SEND MESSAGE	
		else if($api_type == "send_message") {
			if(isset($u1) && isset($u2) && isset($message)) {
				$sql = "INSERT INTO `var_messages`(`user1`,`user2`,`message`,`timestamp`,`status`) VALUES('$u1', '$u2', '$message', now(), 0)";
				$query = mysqli_query($db_conx, $sql);
				exit("success");
			} else {
				exit("ERR-MSG-1");
			}
			exit("ERR-MSG-OTHER");
		}
	// MARK CHATS AS READ
		else if($api_type == "mark_chat_as_read") {
			if(isset($u1) && isset($u2)) {
				$sql = "UPDATE `var_messages`
							SET `status`=2
							WHERE `user1`='$u2'
								AND `user2`='$u1'
								AND `status`=0;";
				$query = mysqli_query($db_conx, $sql);

				$sql = "SELECT *
							FROM `var_messages`
							WHERE `user1`='$u2'
								AND `user2`='$u1'
								AND `status`=0";
				$query = mysqli_query($db_conx, $sql);
				$numrows = mysqli_num_rows($query);
				if($numrows > 0){
					exit("error");
				} else {
					exit("success");
				}
			}
		}
	//
?>