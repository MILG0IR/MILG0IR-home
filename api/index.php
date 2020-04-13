<?php
	// SET THE VARIABLES IF AVAILABLE
		include_once("../db/db_conx.php");
		if(isset($GET['']) || isset($_POST[''])) {								# API type
			if(isset($_GET[''])) {
				$api_type = $_GET[''];
			} else {
				$api_type = $_POST[''];
			}
		} elseif(isset($GET['e']) || isset($_POST['e'])) {						# E-Mail address
			if(isset($_GET['e'])) {
				$email = $_GET['e'];
			} else {
				$email = $_POST['e'];
			}
		} elseif(isset($GET['u']) || isset($_POST['u'])) {						# username
			if(isset($_GET['u'])) {
				preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
			} else {
				preg_replace('#[^a-z0-9]#i', '', $_POST['u']);
			}
		} elseif(isset($GET['p']) || isset($_POST['p'])) {						# Password
			if(isset($_GET['p'])) {
				$password = $_GET['p'];
			} else {
				$password = $_POST['p'];
			}
		} elseif(isset($GET['fn']) || isset($_POST['fn'])) {					# Firstname
			if(isset($_GET['fn'])) {
				$firstname = $_GET['fn'];
			} else {
				$firstname = $_POST['fn'];
			}
		} elseif(isset($GET['sn']) || isset($_POST['sn'])) {					# Surname
			if(isset($_GET['sn'])) {
				$surname = $_GET['sn'];
			} else {
				$surname = $_POST['sn'];
			}
		} elseif(isset($GET['mob']) || isset($_POST['mob'])) {					# Mobile #
			if(isset($_GET['mob'])) {
				$mobile = $_GET['mob'];
			} else {
				$mobile = $_POST['mob'];
			}
		} elseif(isset($GET['img_avatar']) || isset($_POST['img_avatar'])) {	# Avatar Base64
			if(isset($_GET['img_avatar'])) {
				$avatar = $_GET['img_avatar'];
			} else {
				$avatar = $_POST['img_avatar'];
			}
		} elseif(isset($GET['img_banner']) || isset($_POST['img_banner'])) {	# Banner Base64
			if(isset($_GET['img_banner'])) {
				$banner = $_GET['img_banner'];
			} else {
				$banner = $_POST['img_banner'];
			}
		} elseif(isset($GET['uid']) || isset($_POST['uid'])) {					# User ID
			if(isset($_GET['uid'])) {
				$uid = $_GET['uid'];
			} else {
				$uid = $_POST['uid'];
			}
		} elseif(isset($GET['msg']) || isset($_POST['msg'])) {					# message
			if(isset($_GET['msg'])) {
				$message = $_GET['msg'];
			} else {
				$message = $_POST['msg'];
			}
		} elseif(isset($GET['uri']) || isset($_POST['uri'])) {					# Web URI
			if(isset($_GET['uri'])) {
				$uri = $_GET['uri'];
			} else {
				$uri = $_POST['uri'];
			}
		} elseif(isset($GET['device']) || isset($_POST['device'])) {			# device
			if(isset($_GET['device'])) {
				$device = $_GET['device'];
			} else {
				$device = $_POST['device'];
			}
		} elseif(isset($GET['branch']) || isset($_POST['branch'])) {			# branch
			if(isset($_GET['branch'])) {
				$branch = $_GET['branch'];
			} else {
				$branch = $_POST['branch'];
			}
		}
	//
	// GET ERROR CODE INFO
		# T.B.D
    // CHECK USERNAME AVAILABILITY
		if($api_type == "check_username"){
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
		# T.B.D
	// CREATE ACCOUNT
		if($api_type == "signup") {
			if(isset($_POST["u"])){
				// CONNECT TO THE DATABASE
				include_once("php_includes/db_conx.php");
				// GATHER THE POSTED DATA INTO LOCAL VARIABLES
				$u = preg_replace('#[^a-z0-9]#i', '', $_POST['u']);
				$e = mysqli_real_escape_string($db_conx, $_POST['e']);
				$p = $_POST['p'];
				$g = preg_replace('#[^a-z]#', '', $_POST['g']);
				$c = preg_replace('#[^a-z ]#i', '', $_POST['c']);
				// GET USER IP ADDRESS
				$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
				// DUPLICATE DATA CHECKS FOR USERNAME AND EMAIL
				$sql = "SELECT id FROM users WHERE username='$u' LIMIT 1";
				$query = mysqli_query($db_conx, $sql); 
				$u_check = mysqli_num_rows($query);
				// -------------------------------------------
				$sql = "SELECT id FROM users WHERE email='$e' LIMIT 1";
				$query = mysqli_query($db_conx, $sql); 
				$e_check = mysqli_num_rows($query);
				// FORM DATA ERROR HANDLING
				if($u == "" || $e == "" || $p == "" || $g == "" || $c == ""){
					echo "The form submission is missing values.";
					exit();
				} else if ($u_check > 0){ 
					echo "The username you entered is alreay taken";
					exit();
				} else if ($e_check > 0){ 
					echo "That email address is already in use in the system";
					exit();
				} else if (strlen($u) < 3 || strlen($u) > 16) {
					echo "Username must be between 3 and 16 characters";
					exit(); 
				} else if (is_numeric($u[0])) {
					echo 'Username cannot begin with a number';
					exit();
				} else {
				// END FORM DATA ERROR HANDLING
					// Begin Insertion of data into the database
					// Hash the password and apply your own mysterious unique salt
					$cryptpass = crypt($p);
					include_once ("php_includes/randStrGen.php");
					$p_hash = randStrGen(20)."$cryptpass".randStrGen(20);
					// Add user info into the database table for the main site table
					$sql = "INSERT INTO users (username, email, password, gender, country, ip, signup, lastlogin, notescheck)       
							VALUES('$u','$e','$p_hash','$g','$c','$ip',now(),now(),now())";
					$query = mysqli_query($db_conx, $sql); 
					$uid = mysqli_insert_id($db_conx);
					// Establish their row in the useroptions table
					$sql = "INSERT INTO useroptions (id, username, background) VALUES ('$uid','$u','original')";
					$query = mysqli_query($db_conx, $sql);
					// Create directory(folder) to hold each user's files(pics, MP3s, etc.)
					if (!file_exists("user/$u")) {
						mkdir("user/$u", 0755);
					}
					// Email the user their activation link
					$to = "$e";							 
					$from = "auto_responder@yoursitename.com";
					$subject = 'yoursitename Account Activation';
					$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>yoursitename Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://www.yoursitename.com"><img src="http://www.yoursitename.com/images/logo.png" width="36" height="30" alt="yoursitename" style="border:none; float:left;"></a>yoursitename Account Activation</div><div style="padding:24px; font-size:17px;">Hello '.$u.',<br /><br />Click the link below to activate your account when ready:<br /><br /><a href="http://www.yoursitename.com/activation.php?id='.$uid.'&u='.$u.'&e='.$e.'&p='.$p_hash.'">Click here to activate your account now</a><br /><br />Login after successful activation using your:<br />* E-mail Address: <b>'.$e.'</b></div></body></html>';
					$headers = "From: $from\n";
					$headers .= "MIME-Version: 1.0\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\n";
					mail($to, $subject, $message, $headers);
					echo "signup_success";
					exit();
				}
				exit();
			}
		}
	// LOGIN
		if($api_type == "login") {
			if(isset($username) && isset($password)){
				$e = mysqli_real_escape_string($db_conx, $_POST['e']);
				$p = md5($_POST['p']);
				$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
				if($e == "" || $p == ""){
					echo "login_failed";
					exit();
				} else {
					$sql = "SELECT id, username, password FROM users WHERE email='$e' AND activated='1' LIMIT 1";
					$query = mysqli_query($db_conx, $sql);
					$row = mysqli_fetch_row($query);
					$db_id = $row[0];
					$db_username = $row[1];
					$db_pass_str = $row[2];
					if($p != $db_pass_str){
						echo "login_failed";
						exit();
					} else {
						$_SESSION['userid'] = $db_id;
						$_SESSION['username'] = $db_username;
						$_SESSION['password'] = $db_pass_str;
						setcookie("id", $db_id, strtotime( '+30 days' ), "/", "", "", TRUE);
						setcookie("user", $db_username, strtotime( '+30 days' ), "/", "", "", TRUE);
						setcookie("pass", $db_pass_str, strtotime( '+30 days' ), "/", "", "", TRUE); 
						$sql = "UPDATE users SET ip='$ip', lastlogin=now() WHERE username='$db_username' LIMIT 1";
						$query = mysqli_query($db_conx, $sql);
						echo $db_username;
						exit();
					}
				}
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