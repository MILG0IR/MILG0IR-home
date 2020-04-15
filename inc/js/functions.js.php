<script name="FUNCTIONS">
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
	function checkusername() {
		var u		= _("username").value;
		var status	= _("usernamestatus");
		$.ajax({
			url: 'api/index.php',
			data: '#=check_username&u='+u,
			contentType: 'application/x-www-form-urlencoded',
			type: 'POST',
		}).done(function(data) {
			checkresponse(data).done(function(codeARRAY) {
				var codeJSON = jQuery.parseJSON(codeARRAY);
				if(data == "INF-UNC-1") {
					status.innerHTML = '<span class="bubble success">' + codeJSON[2] + '</span>';
				} else if(data == "INF-UNC-2") {
					status.innerHTML = '<span class="bubble info">' + codeJSON[2] + '</span>';
				} else {
					status.innerHTML = '<span class="bubble error">' + codeJSON[2] + '</span>';
				}
			});
		});
	}
	function checkemail() {
		var e		= _("email").value;
		var status	= _("emailstatus");
		$.ajax({
			url: 'api/index.php',
			data: '#=check_email&e='+e,
			contentType: 'application/x-www-form-urlencoded',
			type: 'POST',
		}).done(function(data) {
			checkresponse(data).done(function(codeARRAY) {
				var codeJSON = jQuery.parseJSON(codeARRAY);
				if(data == "INF-EMC-1") {
					status.innerHTML = '<span class="bubble success">' + codeJSON[2] + '</span>';
				} else if(data == "INF-EMC-2") {
					status.innerHTML = '<span class="bubble info">' + codeJSON[2] + '</span>';
				} else {
					status.innerHTML = '<span class="bubble error">' + codeJSON[2] + '</span>';
				}
			});
		});
	}
	function checkresponse(code) {
		var output = $.ajax({
			url: 'api/index.php',
			data: '#=search_code&code='+code,
			contentType: 'application/x-www-form-urlencoded',
			type: 'POST',
		}).done(function(data) {
			return jQuery.parseJSON(data);
		});
		return output;
	}
	function signup() {
		var u = _("username").value;
		var e = _("email").value;
		var p1 = _("pass1").value;
		var p2 = _("pass2").value;
		var status = _("status").value;
		if(p1 == p2) {
			$.ajax({
				url: 'api/index.php',
				data: '#=signup&u='+u+'&e='+e+'&p='+p1,
				contentType: 'application/x-www-form-urlencoded',
				type: 'POST',
			}).done(function(data) {
				if(data.includes("success")){
					window.location = "<?echo$mg_dir['root']?>login.php";
				} else {
					checkresponse(data).done(function(codeARRAY) {
						var codeJSON = jQuery.parseJSON(codeARRAY);
						status.innerHTML = '<span class="bubble error">' + codeJSON[2] + '</span>';
					});
				}
			});
		}
	}
	function login() {		// T.B.D - Display the error code ~ if any
		var e = _("email").value;
		var p = _("password").value;
		var status = _("status").value;
		$.ajax({
			url: 'api/index.php',
			data: '#=login&e='+e+'&p='+p,
			contentType: 'application/x-www-form-urlencoded',
			type: 'POST',
		}).done(function(data) {
			if(data.includes("success")){
				window.location = "<?echo$mg_dir['root']?>home.php";
			} else {
				checkresponse(data).done(function(codeARRAY) {
					var codeJSON = jQuery.parseJSON(codeARRAY);
					status.innerHTML = '<span class="bubble error">' + codeJSON[2] + '</span>';
				});
			}
		});
	}
	function forgotpassword() {	// T.B.D
		var e = _("email").value;
		var status = _("status").value;
		$.ajax({
			url: 'api/index.php',
			data: '#=forgot_password&e='+e,
			contentType: 'application/x-www-form-urlencoded',
			type: 'POST',
		}).done(function(data) {
			if(data.includes("success")){
				status.innerHTML = "An email has been sent! Dont forget to check your junk."
			} else {
				checkresponse(data).done(function(codeARRAY) {
					var codeJSON = jQuery.parseJSON(codeARRAY);
					status.innerHTML = '<span class="bubble error">' + codeJSON[2] + '</span>';
				});
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