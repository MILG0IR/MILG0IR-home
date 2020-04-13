<script>
	$(document).ready(function() {
		preloaderFadeOutTime = 500;
		function hidePreloader() {
			var preloader = $('.preloader');
			preloader.fadeOut(preloaderFadeOutTime);
		}
		hidePreloader();
	});
</script>