<?php
	// SET THE VARIABLES IF AVAILABLE
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
				$username = $_GET['u'];
			} else {
				$username = $_POST['u'];
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
		}
    //
    // CHECK USERNAME AVAILABILITY
		# T.B.D
    // CHECK EMAIL AVAILABILITY
		# T.B.D
	// CREATE ACCOUNT
		# T.B.D
	// LOGIN
		# T.B.D
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