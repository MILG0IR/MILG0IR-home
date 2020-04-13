<style>
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
<style>
	body {
		height: 100%;
		background-color: #f3f3f3; }
	body .navbar {
		position: fixed;
		width: 100%;
		display: flex;
		flex-direction: row;
		align-items: center;
		padding: 0;
		border-radius: 0;
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2), 0 1px 1px rgba(0, 0, 0, 0.14), 0 2px 1px -1px rgba(0, 0, 0, 0.12);
		z-index: 999; }
	body .navbar .menu-toggle {
		line-height: 0; }
	body .navbar .menu-toggle .menu-toggle-icon {
		font-size: 1.5rem;
		line-height: 1.5rem;
		padding: 1rem;
		border-right: 1px solid lightgray; }
	body .navbar .navbar-brand {
		text-align: center;
		width: 8.5rem;
		font-size: 1rem;
		line-height: 1.5rem;
		padding: 1rem;
		border-right: 1px solid lightgray;
		font-weight: 400; }
	body .navbar .navbar-brand span {
		font-weight: 800; }
	body .container-fluid {
		height: 100vh; }
	body .container-fluid .fixed-nav {
		height: 100vh; }
	body .container-fluid .fixed-nav .fixed-nav-inner {
		display: inline-flex;
		flex-direction: column;
		position: fixed;
		top: 0;
		left: 0;
		bottom: 0;
		background-color: #f9f9f9;
		border-right: 1px solid lightgray;
		flex: 1;
		z-index: 99; }
	body .container-fluid .fixed-nav .fixed-nav-inner ul {
		list-style-type: none;
		padding: 0; }
	body .container-fluid .fixed-nav .fixed-nav-inner ul a {
		display: flex;
		align-items: center; }
	body .container-fluid .fixed-nav .fixed-nav-inner ul a:before {
		content: "";
		opacity: 0;
		width: 0.175rem;
		visibility: hidden;
		position: absolute;
		background: #0275d8;
		top: 0;
		left: 0;
		bottom: 0;
		right: auto; }
	body .container-fluid .fixed-nav .fixed-nav-inner ul a:hover {
		background-color: #f3f3f3;
		box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), inset 0 1px 1px rgba(0, 0, 0, 0.04), inset 0 2px 1px -1px rgba(0, 0, 0, 0.02); }
	body .container-fluid .fixed-nav .fixed-nav-inner ul a:hover:before {
		opacity: 1;
		visibility: visible; }
	body .container-fluid .fixed-nav .fixed-nav-inner ul a li {
		padding: 0.25rem 1rem; }
	body .container-fluid .fixed-nav .fixed-nav-inner ul a li i {
		font-size: 1.5rem;
		line-height: 3rem; }
	body .container-fluid .fixed-nav .fixed-nav-inner ul a li:nth-child(2n) {
		font-size: 1rem;
		padding: 0;
		margin-left: 0;
		letter-spacing: 0.05rem;
		width: 0px;
		text-align: left;
		opacity: 0;
		transition: 0.25s ease-in-out width, 0.25s linear transform;
		transform: translateX(2rem); }
	body .container-fluid .fixed-nav .fixed-nav-inner.open-nav li:nth-child(2n) {
		margin: 0;
		padding: 0.25rem 1rem;
		letter-spacing: 0.025rem;
		width: 8.5rem;
		opacity: 1;
		transform: translateX(0.75rem); }
</style>