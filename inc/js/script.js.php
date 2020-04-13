<script NAME="Preloader">
	$(document).ready(function() {
		preloaderFadeOutTime = 500;
		function hidePreloader() {
			var preloader = $('.preloader');
			preloader.fadeOut(preloaderFadeOutTime);
		}
		hidePreloader();
	});
</script>
<script NAME="burger">
	$(document).ready(function () {
		$('[data-toggle="offcanvas"]').click(function () {
			$('.fixed-nav-inner').toggleClass('open-nav')
		});
	});
</script>