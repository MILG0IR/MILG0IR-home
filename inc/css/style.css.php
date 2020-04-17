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
	body > .navbar {
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
	body > .navbar > .menu-toggle {
		line-height: 0;
		color: #0275D8; }
	body > .navbar > .menu-toggle > .menu-toggle-icon {
		font-size: 1.5rem;
		line-height: 1.5rem;
		padding: 1rem;
		border-right: 1px solid lightgray; }
	body > .navbar > .navbar-brand {
		text-align: center;
		width: 8.5rem;
		font-size: 1rem;
		line-height: 1.5rem;
		padding: 1rem;
		border-right: 1px solid lightgray;
		font-weight: 400;
		max-width: 136px;
		max-height: 56px; }
	body > .navbar > .navbar-brand > span {
		font-weight: 800; }
	body > .navbar > .navbar-logout {
		position: fixed;
		right: 0px;
		font-size: 1.5rem;
		line-height: 1.5rem;
		padding: 1rem;
		border-left: 1px solid lightgray; }
	body > .container-fluid > .fixed-nav > .fixed-nav-inner {
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
		padding-top: 56px; }
	body > .container-fluid > .fixed-nav > .fixed-nav-inner > ul {
		-ms-overflow-style: none;
		list-style-type: none;
		overflow-y: scroll;
		height: 100%;
		padding: 0;
		margin: 0px; }
	body > .container-fluid > .fixed-nav > .fixed-nav-inner > ul::-webkit-scrollbar {
		display: none; }
	body > .container-fluid > .fixed-nav > .fixed-nav-inner > ul > a {
		display: flex;
		align-items: center; }
	body > .container-fluid > .fixed-nav > .fixed-nav-inner > ul > a:before {
		content: "";
		opacity: 0;
		width: 0.175rem;
		visibility: hidden;
		position: absolute;
		background: #0275D8;
		top: 0;
		left: 0;
		bottom: 0;
		right: auto; }
	body > .container-fluid > .fixed-nav > .fixed-nav-inner > ul > a:hover {
		background-color: #F3F3F3;
		box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), inset 0 1px 1px rgba(0, 0, 0, 0.04), inset 0 2px 1px -1px rgba(0, 0, 0, 0.02);
		text-decoration: none; }
	body > .container-fluid > .fixed-nav > .fixed-nav-inner > ul > a:hover:before {
		opacity: 1;
		visibility: visible; }
	body > .container-fluid > .fixed-nav > .fixed-nav-inner > ul > a > li {
		padding: 0.25rem 0.7rem; }
	body > .container-fluid > .fixed-nav > .fixed-nav-inner > ul > a > li > img {
		vertical-align: baseline;
		width: 34px;
		font-size: 1.5rem;
		line-height: 3rem; }
	body > .container-fluid > .fixed-nav > .fixed-nav-inner > ul > a > li:nth-child(2n) {
		font-size: 1rem;
		padding: 0;
		margin-left: 0;
		letter-spacing: 0.05rem;
		width: 0px;
		text-align: left;
		opacity: 0;
		transition: 0.25s ease-in-out width, 0.25s linear transform;
		transform: translateX(2rem); }
	body > .container-fluid > .fixed-nav > .fixed-nav-inner.open-nav > ul > a > li:nth-child(2n) {
		margin: 0;
		padding: 0.25rem 1rem;
		letter-spacing: 0.025rem;
		width: 8.5rem;
		opacity: 1;
		transform: translateX(0.75rem); }
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