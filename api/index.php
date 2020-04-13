<?php
	// SET THE VARIABLES IF AVAILABLE
		include_once("../db/db_conx.php");
		if(isset($GET['#']) || isset($_POST['#'])) {							# API type
			if(isset($_GET['#'])) {
				$api_type = $_GET['#'];
			} else {
				$api_type = $_POST['#'];
			}
		} else {$api_type = NULL;}
		if(isset($GET['e']) || isset($_POST['e'])) {						# E-Mail address
			if(isset($_GET['e'])) {
				$email = $_GET['e'];
			} else {
				$email = $_POST['e'];
			}
		} else {$email = NULL;}
		if(isset($GET['u']) || isset($_POST['u'])) {						# username
			if(isset($_GET['u'])) {
				preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
			} else {
				preg_replace('#[^a-z0-9]#i', '', $_POST['u']);
			}
		} else {$username = NULL;}
		if(isset($GET['p']) || isset($_POST['p'])) {						# Password
			if(isset($_GET['p'])) {
				$password = $_GET['p'];
			} else {
				$password = $_POST['p'];
			}
		} else {$password = NULL;}
		if(isset($GET['fn']) || isset($_POST['fn'])) {					# Firstname
			if(isset($_GET['fn'])) {
				$firstname = $_GET['fn'];
			} else {
				$firstname = $_POST['fn'];
			}
		} else {$firstname = NULL;}
		if(isset($GET['sn']) || isset($_POST['sn'])) {					# Surname
			if(isset($_GET['sn'])) {
				$surname = $_GET['sn'];
			} else {
				$surname = $_POST['sn'];
			}
		} else {$surname = NULL;}
		if(isset($GET['mob']) || isset($_POST['mob'])) {					# Mobile #
			if(isset($_GET['mob'])) {
				$mobile = $_GET['mob'];
			} else {
				$mobile = $_POST['mob'];
			}
		} else {$mobile = NULL;}
		if(isset($GET['img_avatar']) || isset($_POST['img_avatar'])) {	# Avatar Base64
			if(isset($_GET['img_avatar'])) {
				$avatar = $_GET['img_avatar'];
			} else {
				$avatar = $_POST['img_avatar'];
			}
		} else {$avatar = NULL;}
		if(isset($GET['img_banner']) || isset($_POST['img_banner'])) {	# Banner Base64
			if(isset($_GET['img_banner'])) {
				$banner = $_GET['img_banner'];
			} else {
				$banner = $_POST['img_banner'];
			}
		} else {$banner = NULL;}
		if(isset($GET['uid']) || isset($_POST['uid'])) {					# User ID
			if(isset($_GET['uid'])) {
				$uid = $_GET['uid'];
			} else {
				$uid = $_POST['uid'];
			}
		} else {$uid = NULL;}
		if(isset($GET['msg']) || isset($_POST['msg'])) {					# message
			if(isset($_GET['msg'])) {
				$message = $_GET['msg'];
			} else {
				$message = $_POST['msg'];
			}
		} else {$message = NULL;}
		if(isset($GET['uri']) || isset($_POST['uri'])) {					# Web URI
			if(isset($_GET['uri'])) {
				$uri = $_GET['uri'];
			} else {
				$uri = $_POST['uri'];
			}
		} else {$uri = NULL;}
		if(isset($GET['device']) || isset($_POST['device'])) {			# device
			if(isset($_GET['device'])) {
				$device = $_GET['device'];
			} else {
				$device = $_POST['device'];
			}
		} else {$device = NULL;}
		if(isset($GET['branch']) || isset($_POST['branch'])) {			# branch
			if(isset($_GET['branch'])) {
				$branch = $_GET['branch'];
			} else {
				$branch = $_POST['branch'];
			}
		} else {$branch = NULL;}
	//
	// GET ERROR CODE INFO
		if($api_type == "search_code") {

		}
    // CHECK USERNAME AVAILABILITY
		elseif($api_type == "check_username"){
			if(isset($username)){
				$sql = "SELECT `id` FROM `users` WHERE `username`='$username' LIMIT 1";
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
					exit('INF-UNC-0');
				}
			}
		}
    // CHECK EMAIL AVAILABILITY
		elseif($api_type == "check_email"){
			if(isset($email)){
				$sql = "SELECT `id` FROM `users` WHERE `email`='$email' LIMIT 1";
				$query = mysqli_query($db_conx, $sql); 
				$uname_check = mysqli_num_rows($query);
				if (is_numeric($username[0])) {
					exit('ERR-EMC-2');
				}
				if ($uname_check < 1) {
					exit('INF-EMC-1');
				} else {
					exit('INF-EMC-0');
				}
			}
		}
	// CREATE ACCOUNT
		elseif($api_type == "signup") {
				$e = $email;
				$u = $username;
				$p = $password;
				$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));

				$sql = "SELECT id FROM users WHERE username='$u' LIMIT 1";
				$query = mysqli_query($db_conx, $sql); 
				$u_check = mysqli_num_rows($query);

				$sql = "SELECT id FROM users WHERE email='$e' LIMIT 1";
				$query = mysqli_query($db_conx, $sql); 
				$e_check = mysqli_num_rows($query);

				if($u == "" || $e == "" || $p == ""){
					echo "The form submission is missing values.";
					exit();
				} elseif($u_check > 0){ 
					echo "The username you entered is alreay taken";
					exit();
				} elseif($e_check > 0){ 
					echo "That email address is already in use in the system";
					exit();
				} elseif(strlen($u) < 3 || strlen($u) > 16) {
					echo "Username must be between 3 and 16 characters";
					exit(); 
				} elseif(is_numeric($u[0])) {
					echo 'Username cannot begin with a number';
					exit();
				} else {
					$p_hash = hash($mg_security['hash'], $mg_security['salt'].$password.$mg_security['salt']);

					$sql = "INSERT INTO `users` (username, email, password, gender, country, ip, signup, lastlogin, notescheck)       
							VALUES('$u','$e','$p_hash','$g','$c','$ip',now(),now(),now())";
					$query = mysqli_query($db_conx, $sql); 
					$uid = mysqli_insert_id($db_conx);

					$sql = "INSERT INTO `user_data` (username, email, password, gender, country, ip, signup, lastlogin, notescheck)       
							VALUES('$u','$e','$p_hash','$g','$c','$ip',now(),now(),now())";
					$query = mysqli_query($db_conx, $sql); 
					$uid = mysqli_insert_id($db_conx);

					$sql = "INSERT INTO `user_prefs` (username, email, password, gender, country, ip, signup, lastlogin, notescheck)       
							VALUES('$u','$e','$p_hash','$g','$c','$ip',now(),now(),now())";
					$query = mysqli_query($db_conx, $sql); 
					$uid = mysqli_insert_id($db_conx);

					if (!file_exists("user/$u")) {
						mkdir("user/$u", 0755);
					}
					echo "success";
					exit();
				}
				exit();
			}
	// LOGIN
		elseif($api_type == "login") {
			$success = NULL;
			if($email == "") {
				exit("ERR-LIN-2");
			} else{
				$e = mysqli_real_escape_string($db_conx, $email);;
				$p = hash($mg_security['hash'], $mg_security['salt'].$password.$mg_security['salt']);
				$sql = "SELECT count(*) FROM `users` WHERE `email`='$e' AND `enabled`='1' LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
				$row = mysqli_fetch_array($query);
				$total = $row[0];
				if($total > 0) {
					// USER ENTERED THEIR EMAIL
					$success = "email";
				} else {
					// NO ACCOUNT EXISTS WITH THAT EMAIL ADDRESS. TRYING USERNAME
					$sql = "SELECT count(*) FROM `users` WHERE `username`='$e' AND `enabled`='1' LIMIT 1";
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
				#--------------------------------#
				if(isset($success)) { // LOG THE USER INTO THEIR ACCOUNT
					$sql = "SELECT `uid`, `username`, `password` FROM `users` WHERE `$success`='$e' AND `enabled`='1' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
					$row = mysqli_fetch_row($query);
					$user_id = $row[0];
					$db_username = $row[1];
					$db_pass_str = $row[2];
					#--------------------------------#
					if($p != $db_pass_str){
						exit("ERR-LIN-5");
					} else {
						// create the session in the database
						$sql = "INSERT INTO `user_sessions` (`uid`, `ip_address`, `start_time`, `active`) VALUES ('$user_id', '$ip', now(), '1')";
						$query = mysqli_query($db_conx, $sql);
						// get the sessionm ID
						$sql = "SELECT `session_id` FROM `user_sessions` WHERE `uid`='$user_id' AND `ip_address`='$ip' AND `active`='1' LIMIT 1";
						$query = mysqli_query($db_conx, $sql);
						$row = mysqli_fetch_row($query);
						$session_id = $row[0];

						$_SESSION['userid'] = $user_id;
						$_SESSION['sessionid'] = $session_id;
						$_SESSION['username'] = $db_username;
						$_SESSION['password'] = $db_pass_str;
						#setcookie("user_id", $user_id, strtotime( '+30 days' ), "/", "", "", TRUE);
						#setcookie("session_id", $user_id, strtotime( '+30 days' ), "/", "", "", TRUE);
						#setcookie("username", $db_username, strtotime( '+30 days' ), "/", "", "", TRUE);
						#setcookie("password", $db_pass_str, strtotime( '+30 days' ), "/", "", "", TRUE);
						exit("success");
					}
				}
			}
			exit("ERR-LIN-OTHER");
		}
	// LOGOUT
		elseif($api_type == "logout") {
			session_start();
			$_SESSION = array();
			if(isset($_COOKIE["id"]) && isset($_COOKIE["user"]) && isset($_COOKIE["pass"])) {
				setcookie("id", '', strtotime( '-5 days' ), '/');
				setcookie("user", '', strtotime( '-5 days' ), '/');
				setcookie("pass", '', strtotime( '-5 days' ), '/');
			}
			session_destroy();
			if(isset($_SESSION['username'])){
				header("location: message.php?msg=Error:_Logout_Failed");
			} else {
				header("location: http://www.yoursite.com");
				exit();
			}
		}
	// RESET PASSWORD
		# T.B.D
	// UPDATE AVATAR
		# T.B.D
	// UPDATE BANNER
		# T.B.D
	// GET USERDATA
		# T.B.D
	// UPDATE USERDATA
		# T.B.D
	// CHECK FOR MESSAGES
		# T.B.D
	// SEND MESSAGE
		# T.B.D
	// GET LATEST VERSION
		# T.B.D
	// UPDATE
		# T.B.D
	//
?>