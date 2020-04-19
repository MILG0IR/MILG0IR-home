<style name="DEFAULT">
	body {
		height: 100%;
		background-color: #EEEFFF; }
	.content.content-background {
		background: transparent; }
	.button-primary {
		background-color: #82BCE3;
		color: #333; }
	.button-primary:hover,
	.btn-primary:active {
		background-color: #2980B9;
		color: #FFF; }

	.button-secondary {
		background-color: #D9D9D9;
		color: #333; }
	.button-secondary:hover,
	.button-secondary:active {
		background-color: #A2A2A2;
		color: #FFF; }
	form {
		text-align: center; }
	button {
		text-decoration: none;
		text-align: center;
		border-radius: 3px;
		cursor: pointer;
		font-size: 16px;
		padding: 0.5rem;
		border: none; }
	.status{
		position: relative;
		display: inline-block;
		opacity: 1;
		font-size: 1rem; }
	.status.success {
		color: lime; }
	.status.info {
		color: orange; }
	.status.error {
		color: red; }
	.tooltip .tooltiptext {
		visibility: hidden;
		width: 120px;
		background-color: #555;
		color: #fff;
		text-align: center;
		padding: 5px 0;
		border-radius: 6px;
		position: absolute;
		z-index: 1;
		bottom: 125%;
		left: 50%;
		margin-left: -60px;
		opacity: 0;
		transition: opacity 0.3s; }
	.tooltip .tooltiptext::after {
		content: "";
		position: absolute;
		top: 100%;
		left: 50%;
		margin-left: -5px;
		border-width: 5px;
		border-style: solid;
		border-color: #555 transparent transparent transparent; }
	.tooltip:hover .tooltiptext {
		visibility: visible;
		font-family: ubuntu;
		font-size: 1rem;
		opacity: 1; }
</style>
<style name="PRELOADER">
	.preloader {
		position: fixed;
		width: 100%;
		height: 100%;
		background: #2980B9;
		z-index: 1000; }
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
<style name="NAVBAR & HEADER">
	.navbar {
		position: fixed;
		width: 100%;
		display: flex;
		flex-direction: row;
		align-items: center;
		padding: 0;
		border-radius: 0;
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2), 0 1px 1px rgba(0, 0, 0, 0.14), 0 2px 1px -1px rgba(0, 0, 0, 0.12);
		z-index: 999;
		max-height: 56px; }
	.navbar > a > span {
		font-weight: 800; }
	.navbar > a > img {
		width: 100%; }
	.navbar > .menu-toggle {
		line-height: 0;
		color: #0275D8; }
	.navbar > .menu-toggle > .menu-toggle-icon {
		border-right: 1px solid lightgray;
		padding: 0.5rem;
		height: 100%;
		width: 3.5rem; }
	.navbar > .navbar-brand {
		border-right: 1px solid lightgray;
		margin-right: 0.5rem;
		line-height: 1.5rem;
		text-align: center;
		font-weight: 400;
		max-width: 136px;
		max-height: 56px;
		font-size: 1rem;
		width: 8.5rem;
		padding: 1rem; }
	.navbar > .navbar-controls {
		margin: 0.5rem;
		width: 2rem; }
	.navbar > .navbar-logout {
		border-left: 1px solid lightgray;
		line-height: 1.5rem;
		font-size: 1.5rem;
		position: fixed;
		padding: 0.7rem;
		width: 3.5rem;
		right: 0px; }
	.container-fluid > .fixed-nav > .fixed-nav-inner {
		display: inline-flex;
		flex-direction: column;
		position: fixed;
		top: 0;
		left: 0;
		bottom: 0;
		background-color: #F9F9F9;
		border-right: 1px solid lightgray;
		flex: 1;
		z-index: 99;
		padding-top: 56px;
		margin-top: 0.25rem; }
	.container-fluid > .fixed-nav > .fixed-nav-inner > ul {
		-ms-overflow-style: none;
		list-style-type: none;
		overflow-y: scroll;
		height: auto;
		margin: 0px; }
	.container-fluid > .fixed-nav > .fixed-nav-inner > ul::-webkit-scrollbar {
		display: none; }
	.container-fluid > .fixed-nav > .fixed-nav-inner > ul > a::before { }
	.container-fluid > .fixed-nav > .fixed-nav-inner > ul > a {
		align-items: center;
		display: flex;}
	.container-fluid > .fixed-nav > .fixed-nav-inner > ul > a:hover { }
	.container-fluid > .fixed-nav > .fixed-nav-inner > ul > a.enabled::before {
		content: "";
		animation: breathing-enabled 2s linear infinite alternate }
	.container-fluid > .fixed-nav > .fixed-nav-inner > ul > a.enabled {
		align-items: center;
		display: flex; }
	.container-fluid > .fixed-nav > .fixed-nav-inner > ul > a.enabled:hover { }
	.container-fluid > .fixed-nav > .fixed-nav-inner > ul > a.active::before {
		content: "";
		animation: breathing-active 2s linear infinite alternate }
	.container-fluid > .fixed-nav > .fixed-nav-inner > ul > a.active {
		align-items: center;
		display: flex; }
	.container-fluid > .fixed-nav > .fixed-nav-inner > ul > a.active:hover { }
	.container-fluid > .fixed-nav > .fixed-nav-inner > ul > a > li {
		padding: 0.25rem calc(1rem - 5.5px); }
	.container-fluid > .fixed-nav > .fixed-nav-inner > ul > a > li > img {
		vertical-align: baseline;
		width: 34px; }
	.container-fluid > .fixed-nav > .fixed-nav-inner > ul > a > li:nth-child(2n) {
		font-size: 1rem;
		padding: 0;
		margin-left: 0;
		letter-spacing: 0.05rem;
		width: 0px;
		text-align: left;
		opacity: 0;
		transition: 0.25s ease-in-out width, 0.25s linear transform;
		transform: translateX(2rem); }
	.container-fluid > .fixed-nav > .fixed-nav-inner.open-nav > ul > a > li:nth-child(2n) {
		margin: 0;
		padding: 0.25rem 1rem;
		letter-spacing: 0.025rem;
		width: 8.5rem;
		opacity: 1;
		transform: translateX(0.75rem); }
	@-webkit-keyframes breathing-active {
		000% { box-shadow: -10px 0px 15px 15px #d9536ec7 }
		100% { box-shadow: -10px 0px 30px 30px #d9536ec7 } }
	@-moz-keyframes breathing-active {
		000% { box-shadow: -10px 0px 15px 15px #d9536ec7 }
		100% { box-shadow: -10px 0px 30px 30px #d9536ec7 } }
	@-o-keyframes breathing-active {
		000% { box-shadow: -10px 0px 15px 15px #d9536ec7 }
		100% { box-shadow: -10px 0px 30px 30px #d9536ec7 } }
	@keyframes breathing-active {
		000% { box-shadow: -10px 0px 15px 15px #d9536ec7 }
		100% { box-shadow: -10px 0px 30px 30px #d9536ec7 } }
	@-webkit-keyframes breathing-enabled {
		000% { box-shadow: -20px 0px 15px 15px #ffa500c7 }
		025% { box-shadow: -10px 0px 15px 15px #ffa500c7 } }
	@-moz-keyframes breathing-enabled {
		000% { box-shadow: -20px 0px 15px 15px #ffa500c7 }
		025% { box-shadow: -10px 0px 15px 15px #ffa500c7 } }
	@-o-keyframes breathing-enabled {
		000% { box-shadow: -20px 0px 15px 15px #ffa500c7 }
		025% { box-shadow: -10px 0px 15px 15px #ffa500c7 } }
	@keyframes breathing-enabled {
		000% { box-shadow: -20px 0px 15px 15px #ffa500c7 }
		025% { box-shadow: -10px 0px 15px 15px #ffa500c7 } }
</style>
<style name="CONTAINER">
	.content {
		position: absolute;
		height: calc(100% - 56px);
		width: 100%;
		top: 56px; }
	.content.nav-inset {
		width: calc(100% - 56px);
		left: 56px; }
	.content#parent {
		display: inline-flex; }
	.content#parent .child {
		width: 100%;
		height: 100%;
		border: none; }
</style>
<style name="FORMS">
	.content > form {
				transform: translate(-50%, -50%);
			 -o-transform: translate(-50%, -50%);
		   -moz-transform: translate(-50%, -50%);
		-webkit-transform: translate(-50%, -50%);
		box-shadow: black 0px 0px 15px;
		position: absolute;
		border-radius: 3px;
		background: white;
		display: table;
		margin: 0 auto;
		padding: 3rem;
		height: auto;
		width: 408px;
		left: 50%;
		top: 50%; }
	.content > form > button {
		display: inline-block;
		margin-left: 1%;
		width: 48%; }
	.content > form > img {
		margin-bottom: 1rem;
		border-radius: 3px;
		max-height: 150px; }
	.content > form > .output {
		position: fixed;
		margin-top: 0.5rem;
		transform: translate(-25px, -4px); }
</style>