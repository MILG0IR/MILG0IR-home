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
			} else {$uri_remote = NULL;}
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
			if(!isset($username) || !isset($email) || !isset($password) || !isset($reference)) {
				exit("ERR-SUP-1");
			} else {
				// SET THE VARIABLES
					$e = $email;
					$u = $username;
					$p = $password;
					$r = $reference;
					$p_hash = hash($mg_security['hash'], $mg_security['salt'].$password.$mg_security['salt']);
				// CHECK IF THE REFERENCE CODE IS VALID
					if(preg_match("/[a-zA-Z]{2}[0-9]{1}-[0-9]{2}[a-zA-Z]{1}-[a-zA-Z]{3}-[0-9]{3}/",$reference)) {
						$sql = "SELECT `id` FROM `user_references` WHERE `reference_code`='$reference' AND `active`='1' LIMIT 1";
						$query = mysqli_query($db_conx, $sql);
						$ref_check = mysqli_num_rows($query);
					} else {
						exit('ERR-SUP-8');
					}
				// CHECK FOR EXISTING USERNAME
					if(strlen($u) < 3 || strlen($u) > 16) {
						exit("ERR-SUP-5"); 
					} else {
						$sql = "SELECT `uid` FROM `users` WHERE `username`='$u' LIMIT 1";
						$query = mysqli_query($db_conx, $sql); 
						$u_check = mysqli_num_rows($query);
					}
				// CHECK FOR EXISTING EMAIL ADDRESS
					if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$sql = "SELECT `uid` FROM `users` WHERE `email`='$e' LIMIT 1";
						$query = mysqli_query($db_conx, $sql);
						$e_check = mysqli_num_rows($query);
					} else {
						exit('ERR-SUP-7');
					}
				// DO BASIC CHECKS
					if($ref_check == 0) { 
						exit("ERR-SUP-2");
					} elseif($u_check > 0) { 
						exit("ERR-SUP-3");
					} elseif($e_check > 0) { 
						exit("ERR-SUP-4");
					} elseif(is_numeric($u[0])) {
						exit("ERR-SUP-6");
					}
				// CRATE ROW IN `users` TABLE
					$sql = "INSERT INTO `users` (`username`, `email`, `password`, `change_passkey`, `enabled`)
								VALUES('$u', '$e', '$p_hash', '0', '1')";
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
				// CRATE ROW IN `user_preferences` TABLE
					$sql = "INSERT INTO `user_preferences` (`uid`)
								VALUES('$uid')";
					$query = mysqli_query($db_conx, $sql); 
					$uid = mysqli_insert_id($db_conx);
				// CLOSE THE REFERENCE
					$sql = "UPDATE `user_references` SET `active`=0 WHERE `reference_code`='$reference' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
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
				//
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
	// CHECK REFERENCE
		elseif($api_type == "check_reference") {
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
		elseif($api_type == "get_page_data") {
			if(isset($id)) {
				$sql = "SELECT * FROM `var_pages` WHERE `id`='$id' LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$row = mysqli_fetch_row($query);
				exit(json_encode($row));
			}
		}
	// CHECK FOR AN UPDATE
		elseif($api_type == "check_for_update") {
			if(isset($branch)) {
				if(isset($ver)) {
					if(isset($device)) {
						$update_uri = "https://raw.githubusercontent.com/MILG0IR/MILG0IR-home-".$device."/".$branch."/etc/info.json";
						$update_info = json_decode(file_get_contents($update_uri), true);
					
						if($app_info['Version'] == $update_info['Version']) {
							exit("INF-UPD-1");
							// Latest version is currently installed
						} elseif($app_info['Version'] > $update_info['Version']) {
							exit("INF-UPD-2");
							// Update is available
						} elseif($app_info['Version'] < $update_info['Version']) {
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
		elseif($api_type == "get_sql_data") {
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
		elseif($api_type == "create_user_reference") {
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
					exit($code);
				} else {
					exit("ERR-REF-OTHER");
				}
			}
		}
	// DEACTIVATE USER REFERENCE
		elseif($api_type == "deactivate_user_reference") {
			if(isset($id)){
				$sql = "UPDATE `user_references` SET `active`=NULL WHERE `id`='$id'";
				$query = mysqli_query($db_conx, $sql);
				// Check to see if reference has been 
				$sql = "SELECT `id` FROM `user_references` WHERE `id`='$id' AND `active`='1' LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$numrows = mysqli_num_rows($query);
				if($numrows > 0){
					exit('ERR-LOU-2');
				} else {
					exit("success");
				}
			} else {
				exit("ERR-REF-OTHER");
			}
		}
	// REACTIVATE USER REFERENCE
		elseif($api_type == "reactivate_user_reference") {
			if(isset($id)){
				$sql = "UPDATE `user_references` SET `active`='1' WHERE `id`='$id'";
				$query = mysqli_query($db_conx, $sql);
				// Check to see if reference has been 
				$sql = "SELECT `id` FROM `user_references` WHERE `id`='$id' AND `active`=NULL LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$numrows = mysqli_num_rows($query);
				if($numrows > 0){
					exit('ERR-LOU-2');
				} else {
					exit("success");
				}
			} else {
				exit("ERR-REF-OTHER");
			}
		}
	// UPDATE RANK INFO						T.B.D - Error codes
		elseif($api_type == "update_rank_info") {
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
							exit("ID: ".$id."<br> name: ".$name."<br> desc: ".$desc."<br> icon: ".$icon);
						}
				//
			exit("-OTHER");
			}
		}
	// UPDATE PAGE INFO						T.B.D - Error codes
		elseif($api_type == "update_page_info") {
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
							exit("ID: ".$id."<br> title: ".$title."<br> desc: ".$desc."<br> icon: ".$icon);
						}
				//
			exit("-OTHER");
			}
		}
	// CHECK FOR MESSAGES					T.B.D
		#
	// SEND MESSAGE							T.B.D
		#
	//
?>