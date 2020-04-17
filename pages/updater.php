<?php

if(isset($_GET['download'])) {
	echo "downloading";
} else {
	echo "not downloading";
}
?>
<script>
	$(document).ready(function() {
		checkforupdate(<?php echo "\"".$app_info['Version']."\", \"".$app_info['Device']."\", \"".$app_info['Branch']."\"" ?>);
	});
</script>
<div class="content nav-inset">
	<h1 id="updatestatus"></h1>
	<div id="whatsnew"></div>
</div>