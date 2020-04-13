<style>
	body {
		padding: 0px;
		margin: 0px;
	}
	.preloader {
		position: fixed;
		width: 100%;
		height: 100%;
		background: #2980b9; }
	.preloader > .spinner {
		position: absolute;
		top: calc(50% - 20px);
		left: calc(50% - 25px);
		width: 50px;
		height: 40px;
		text-align: center;
		font-size: 10px; }
	.preloader > .spinner > div {
		background-color: #333;
		height: 100%;
		width: 6px;
		display: inline-block;
		-webkit-animation: sk-stretchdelay 1.2s infinite ease-in-out;
				animation: sk-stretchdelay 1.2s infinite ease-in-out; }
	.preloader > .spinner > .rect2 {
		-webkit-animation-delay: -1.1s;
				animation-delay: -1.1s; }
	.preloader > .spinner > .rect3 {
		-webkit-animation-delay: -1.0s;
				animation-delay: -1.0s; }
	.preloader > .spinner > .rect4 {
		-webkit-animation-delay: -0.9s;
				animation-delay: -0.9s; }
	.preloader > .spinner > .rect5 {
		-webkit-animation-delay: -0.8s;
				animation-delay: -0.8s; }
	@-webkit-keyframes sk-stretchdelay {
		000%,
		040%,
		100% { -webkit-transform: scaleY(0.4) }
		020% { -webkit-transform: scaleY(1.0) } }
	@keyframes sk-stretchdelay {
		000%,
		040%,
		100% { transform: scaleY(0.4); }
		020% { transform: scaleY(1.0); } }
</style>