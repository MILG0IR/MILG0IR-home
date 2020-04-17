<script name="FUNCTIONS">
	//--------------------------- univaersal functions ---------------------------//
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
			} else if(elem == "reference"){
				rx = /[^a-z]{2}[1-9]{1}-[1-9]{2}[^a-z]{1}-[^a-z]{3}-[1-9]{3}/gi;
			}
			tf.value = tf.value.replace(rx, "");
		}
		function emptyElement(x) {
			_(x).innerHTML = "";
		}
	//--------------------------- reference functions ---------------------------//
		function validatepassword(pass) {
			if (pass.length < 8) {
				// return "Password too short!";
				return "ERR-PAS-1";
			} else if (pass.match("#[0-9]+#")) {
				// return "Password must include at least one number!";
				return "ERR-PAS-2";
			} else if (pass.match("#[a-zA-Z]+#")) {
				// return "Password must include at least one letter!";
				return "ERR-PAS-3";
			} else {
				return "INF-PAS-1";
			}
		}
		function checkstring(str1, str2) {
			if(str1 == str2) {
				return "INF-STR-1";
			} else {
				return "ERR-STR-1";
			}
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
						status.innerHTML = '<span class="tooltip status success"><svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 2.5A5.5 5.5 0 1013.5 8a.5.5 0 011 0 6.5 6.5 0 11-3.25-5.63.5.5 0 11-.5.865A5.472 5.472 0 008 2.5z" clip-rule="evenodd"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					} else if(data == "INF-UNC-2") {
						status.innerHTML = '<span class="tooltip status info"><svg class="bi bi-x-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					} else {
						status.innerHTML = '<span class="tooltip status error"><svg class="bi bi-exclamation-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/><path d="M7.002 11a1 1 0 112 0 1 1 0 01-2 0zM7.1 4.995a.905.905 0 111.8 0l-.35 3.507a.552.552 0 01-1.1 0L7.1 4.995z"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
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
						status.innerHTML = '<span class="tooltip status success"><svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 2.5A5.5 5.5 0 1013.5 8a.5.5 0 011 0 6.5 6.5 0 11-3.25-5.63.5.5 0 11-.5.865A5.472 5.472 0 008 2.5z" clip-rule="evenodd"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					} else if(data == "INF-EMC-2") {
						status.innerHTML = '<span class="tooltip status info"><svg class="bi bi-x-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					} else {
						status.innerHTML = '<span class="tooltip status error"><svg class="bi bi-exclamation-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/><path d="M7.002 11a1 1 0 112 0 1 1 0 01-2 0zM7.1 4.995a.905.905 0 111.8 0l-.35 3.507a.552.552 0 01-1.1 0L7.1 4.995z"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
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
						status.innerHTML = '<span class="tooltip status success"><svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 2.5A5.5 5.5 0 1013.5 8a.5.5 0 011 0 6.5 6.5 0 11-3.25-5.63.5.5 0 11-.5.865A5.472 5.472 0 008 2.5z" clip-rule="evenodd"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					} else if(data == "INF-EMC-2") {
						status.innerHTML = '<span class="tooltip status info"><svg class="bi bi-x-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					} else {
						status.innerHTML = '<span class="tooltip status error"><svg class="bi bi-exclamation-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/><path d="M7.002 11a1 1 0 112 0 1 1 0 01-2 0zM7.1 4.995a.905.905 0 111.8 0l-.35 3.507a.552.552 0 01-1.1 0L7.1 4.995z"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					}
				});
			});
		}
		function checkpassword() {
			var p1		= _("pass1").value;
			var p2		= _("pass2").value;
			var pass1	= _("pass1status");
			var pass2	= _("pass2status");
			if(p1 != "" && p2 == "") {			// PASSWORD 1 IS SET // PASSWORD 2 IS NOT
				// PASSWORD 1
				var p1_status = validatepassword(p1);
				checkresponse(p1_status).done(function(codeARRAY) {
					var codeJSON = jQuery.parseJSON(codeARRAY);
					if(p1_status == "INF-PAS-1") {
						pass1.innerHTML = '<span class="tooltip status success"><svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 2.5A5.5 5.5 0 1013.5 8a.5.5 0 011 0 6.5 6.5 0 11-3.25-5.63.5.5 0 11-.5.865A5.472 5.472 0 008 2.5z" clip-rule="evenodd"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					} else {
						pass1.innerHTML = '<span class="tooltip status error"><svg class="bi bi-exclamation-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/><path d="M7.002 11a1 1 0 112 0 1 1 0 01-2 0zM7.1 4.995a.905.905 0 111.8 0l-.35 3.507a.552.552 0 01-1.1 0L7.1 4.995z"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					}
				});
			} else if(p1 == "" && p2 != "") {	// PASSWORD 1 IS NOT // PASSWORD 2 IS SET
				// PASSWORD 2
				var p2_status = checkstring(p1, p2);
				checkresponse(p2_status).done(function(codeARRAY) {
					var codeJSON = jQuery.parseJSON(codeARRAY);
					if(p2_status == "INF-STR-1") {
						pass2.innerHTML = '<span class="tooltip status success"><svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 2.5A5.5 5.5 0 1013.5 8a.5.5 0 011 0 6.5 6.5 0 11-3.25-5.63.5.5 0 11-.5.865A5.472 5.472 0 008 2.5z" clip-rule="evenodd"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					} else {
						pass2.innerHTML = '<span class="tooltip status error"><svg class="bi bi-exclamation-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/><path d="M7.002 11a1 1 0 112 0 1 1 0 01-2 0zM7.1 4.995a.905.905 0 111.8 0l-.35 3.507a.552.552 0 01-1.1 0L7.1 4.995z"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					}
				});
			} else if(p1 != "" && p2 != "") {	// PASSWORD 1 IS SET // PASSWORD 2 IS SET
				// PASSWORD 1
				var p1_status = validatepassword(p1);
				checkresponse(p1_status).done(function(codeARRAY) {
					var codeJSON = jQuery.parseJSON(codeARRAY);
					if(p1_status == "INF-PAS-1") {
						pass1.innerHTML = '<span class="tooltip status success"><svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 2.5A5.5 5.5 0 1013.5 8a.5.5 0 011 0 6.5 6.5 0 11-3.25-5.63.5.5 0 11-.5.865A5.472 5.472 0 008 2.5z" clip-rule="evenodd"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					} else {
						pass1.innerHTML = '<span class="tooltip status error"><svg class="bi bi-exclamation-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/><path d="M7.002 11a1 1 0 112 0 1 1 0 01-2 0zM7.1 4.995a.905.905 0 111.8 0l-.35 3.507a.552.552 0 01-1.1 0L7.1 4.995z"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					}
				});
				// PASSWORD 2
				var p2_status = checkstring(p1, p2);
				checkresponse(p2_status).done(function(codeARRAY) {
					var codeJSON = jQuery.parseJSON(codeARRAY);
					if(p2_status == "INF-STR-1") {
						pass2.innerHTML = '<span class="tooltip status success"><svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 2.5A5.5 5.5 0 1013.5 8a.5.5 0 011 0 6.5 6.5 0 11-3.25-5.63.5.5 0 11-.5.865A5.472 5.472 0 008 2.5z" clip-rule="evenodd"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					} else {
						pass2.innerHTML = '<span class="tooltip status error"><svg class="bi bi-exclamation-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/><path d="M7.002 11a1 1 0 112 0 1 1 0 01-2 0zM7.1 4.995a.905.905 0 111.8 0l-.35 3.507a.552.552 0 01-1.1 0L7.1 4.995z"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					}
				});
			}
		}
		function checkreference() {
			var reference = _("reference").value;
			var status = _("referencestatus");
			$.ajax({
				url: 'api/index.php',
				data: '#=check_reference&ref='+reference,
				contentType: 'application/x-www-form-urlencoded',
				type: 'POST',
			}).done(function(data) {
				checkresponse(data).done(function(codeARRAY) {
					var codeJSON = jQuery.parseJSON(codeARRAY);
					if(data == "INF-REF-1") {
						status.innerHTML = '<span class="tooltip status success"><svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 2.5A5.5 5.5 0 1013.5 8a.5.5 0 011 0 6.5 6.5 0 11-3.25-5.63.5.5 0 11-.5.865A5.472 5.472 0 008 2.5z" clip-rule="evenodd"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					} else {
						status.innerHTML = '<span class="tooltip status error"><svg class="bi bi-exclamation-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/><path d="M7.002 11a1 1 0 112 0 1 1 0 01-2 0zM7.1 4.995a.905.905 0 111.8 0l-.35 3.507a.552.552 0 01-1.1 0L7.1 4.995z"/></svg><span class="tooltiptext">' + codeJSON[2] + '</span></span>';
					}
				});
			});
		}
		function checkforupdate(version, device, branch) {
			var status = _("updatestatus");
			$.ajax({
				url: 'api/index.php',
				data: '#=check_for_update&version='+version+'&device='+device+'&branch='+branch,
				contentType: 'application/x-www-form-urlencoded',
				type: 'POST',
			}).done(function(data) {
				checkresponse(data).done(function(codeARRAY) {
					var codeJSON = jQuery.parseJSON(codeARRAY);
					status.innerHTML = codeJSON[2];
				});
			});
		}
	//--------------------------- * ---------------------------//
		function signup() {
			var u = _("username").value;
			var e = _("email").value;
			var p1 = _("pass1").value;
			var p2 = _("pass2").value;
			var ref = _("reference").value;
			var status = _("status");
			if(p1 == p2) {
				$.ajax({
					url: 'api/index.php',
					data: '#=signup&u='+u+'&e='+e+'&p='+p1+'&ref='+ref,
					contentType: 'application/x-www-form-urlencoded',
					type: 'POST',
				}).done(function(data) {
					if(data.includes("success")){
						window.location = "<?php echo$mg_dir['root']?>login.php";
					} else {
						checkresponse(data).done(function(codeARRAY) {
							var codeJSON = jQuery.parseJSON(codeARRAY);
							status.innerHTML = '<span class="error">' + codeJSON[2] + '</span>';
						});
					}
				});
			}
		}
		function login() {
			var e = _("email").value;
			var p = _("password").value;
			var status = _("status");
			$.ajax({
				url: 'api/index.php',
				data: '#=login&e='+e+'&p='+p,
				contentType: 'application/x-www-form-urlencoded',
				type: 'POST',
			}).done(function(data) {
				if(data.includes("success")){
					window.location = "<?php echo$mg_dir['root']?>home.php";
				} else {
					checkresponse(data).done(function(codeARRAY) {
						var codeJSON = jQuery.parseJSON(codeARRAY);
						status.innerHTML = '<span class="status error">' + codeJSON[2] + '</span>';
					});
				}
			});
		}
		function forgotpassword() {
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
					window.location = "<?php echo$mg_dir['root']?>login.php";
				} else {
					checkresponse(data);
				}
			});
		}
</script>