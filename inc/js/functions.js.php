<script>
	function _(x){
		return document.getElementById(x);
	}
	function restrict(elem) {
		var tf = _(elem);
		var rx = new RegExp;
		if(elem == "email"){
			rx = /[' "]/gi;
		} else if(elem == "username"){
			rx = /[^a-z0-9]/gi;
		}
		tf.value = tf.value.replace(rx, "");
	}
	function emptyElement(x) {
		_(x).innerHTML = "";
	}
	function checkusername() {
		var u = _("username").value;
		var ajax = ajaxObj("POST", "api/index.php");
		ajax.onreadystatechange = function() {
			if(ajaxReturn(ajax) == true) {
				_("unamestatus").innerHTML = ajax.responseText;
			}
		}
		ajax.send("#=check_username&u="+u);
	}
	function checkresponse() {
		var u = _("username").value;
		var ajax = ajaxObj("POST", "api/index.php");
		ajax.onreadystatechange = function() {
			if(ajaxReturn(ajax) == true) {
				_("unamestatus").innerHTML = ajax.responseText;
			}
		}
		ajax.send("#=search_code&u="+u);
	}
	function signup() {
		var u = _("username").value;
		var e = _("email").value;
		var p1 = _("pass1").value;
		var p2 = _("pass2").value;
		var c = _("country").value;
		var g = _("gender").value;
		var status = _("status");
		var ajax = ajaxObj("POST", "api/index.php");
		ajax.onreadystatechange = function() {
			if(ajaxReturn(ajax) == true) {
				if(ajax.responseText != "signup_success"){
					status.innerHTML = ajax.responseText;
					_("signupbtn").style.display = "block";
				} else {
					window.scrollTo(0,0);
					_("signupform").innerHTML = "OK "+u+", check your email inbox and junk mail box at <u>"+e+"</u> in a moment to complete the sign up process by activating your account. You will not be able to do anything on the site until you successfully activate your account.";
				}
			}
		}
		ajax.send("#=signup&u="+u+"&e="+e+"&p="+p1+"&c="+c+"&g="+g);
	}
	function login() {
		var e = _("email").value;
		var p = _("password").value;
		var ajax = ajaxObj("POST", "api/index.php");
		ajax.onreadystatechange = function() {
			if(ajaxReturn(ajax) == true) {
				var response = ajax.responseText;
				if(response.includes("success")){
					window.location = "<?echo$mg_dir['root']?>home.php";
				} else {
					checkresponse(response);
				}
			}
		}
		ajax.send("#=login&e="+e+"&p="+p);
	}
	function logout() {
		var ajax = ajaxObj("POST", "api/index.php");
		ajax.onreadystatechange = function() {
			if(ajaxReturn(ajax) == true) {
				var response = ajax.responseText;
				if(response.includes("success")){
					window.location = "<?echo$mg_dir['root']?>login.php";
				} else {
					checkresponse(response);
				}
			}
		}
		ajax.send("#=logout");
	}
</script>