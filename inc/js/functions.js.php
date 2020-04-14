<script name="FUNCTIONS">
	function ajaxObj( meth, url, async = true) {
		var x = new XMLHttpRequest();
		x.open( meth, url, async );
		x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		return x;
	}
	function ajaxReturn(x) {
		if(x.readyState == 4 && x.status == 200){
			return true;	
		}
	}
	function _(x) {
		return document.getElementById(x);
	}
	function redirect(uri) {
		window.location = uri;
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
	function checkusername(x) {
		var u		= _("username").value;
		var status	= _("unamestatus");
		$.ajax({
			url: 'api/index.php',
			data: '#=check_username&u='+u,
			contentType: 'application/x-www-form-urlencoded',
			type: 'POST',
		}).done(function(data) {
			checkresponse().done(function(codeARRAY) {
				var codeJSON = jQuery.parseJSON(codeARRAY);
				status.innerHTML = '<span class="bubble success">' + codeJSON[2] + '</span>'
			});
		});
	}
	function checkresponse(code) {
		var output = $.ajax({
			url: 'api/index.php',
			data: '#=search_code&code='+code,
			contentType: 'application/x-www-form-urlencoded',
			type: 'POST',
		})
		return output;
	}
	function signup() {			//T.B.D - change to updated AJAX
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
		$.ajax({
			url: 'api/index.php',
			data: '#=login&e='+e+'&p='+p,
			contentType: 'application/x-www-form-urlencoded',
			type: 'POST',
		}).done(function(data) {
			if(data.includes("success")){
				window.location = "<?echo$mg_dir['root']?>home.php";
			} else {
				checkresponse(data);
			}
		});
	}
	function logout() {
		$.ajax({
			url: 'api/index.php',
			data: '#=logout',
			contentType: 'application/x-www-form-urlencoded',
			type: 'POST',
		}).done(function(data) {
			if(data.includes("success")){
				window.location = "<?echo$mg_dir['root']?>login.php";
			} else {
				checkresponse(data);
			}
		});
	}
</script>