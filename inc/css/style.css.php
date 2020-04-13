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
		background: #020304; }
	body > div.header > h1 {
		position: fixed;
		left: 40px;
		z-index: 6;
		font-size: 20px;
		font-weight: 900;
		font-family: sans-serif;
		text-transform: uppercase; }
	body > div.header > h1 > span {
		text-transform: none;
		opacity: .5;
		font-weight: 300;
		font-size: 12px; }
	body > div.header > input + label {
		position: fixed;
		top: 15px;
		right: 40px;
		height: 20px;
		width: 15px;
		z-index: 5; }
	body > div.header > input + label span {
		position: absolute;
		width: 100%;
		height: 2px;
		top: 50%;
		margin-top: -1px;
		left: 0;
		display: block;
		background: #020304;
		transition: .5s; }
	body > div.header > input + label span:first-child {
		top: 3px; }
	body > div.header > input + label span:last-child {
		top: 16px; }
	body > div.header > label:hover {
		cursor: pointer; }
	body > div.header > input:checked + label span {
		opacity: 0;
		top: 50%; }
	body > div.header > input:checked + label span:first-child {
		opacity: 1;
		transform: rotate(405deg); }
	body > div.header > input:checked + label span:last-child {
		opacity: 1;
		transform: rotate(-405deg); }
	body > div.header > input ~ nav {
		background: white;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 50px;
		z-index: 3;
		transition: .5s;
		transition-delay: .5s;
		overflow: hidden; }
	body > div.header > input ~ nav > ul {
		text-align: center;
		position: absolute;
		top: 35%;
		left: 20%;
		right: 20%; }
	body > div.header > input ~ nav > ul > li {
		opacity: 0;
		transition: .5s;
		transition-delay: 0s; }
	body > div.header > input ~ nav > ul > li > a {
		text-decoration: none;
		text-transform: uppercase;
		color: #020304;
		font-weight: 700;
		font-family: sans-serif;
		display: block;
		padding: 30px; }
	body > div.header > input:checked ~ nav {
		height: 100%;
		transition-delay: 0s; }
	body > div.header > input:checked ~ nav > ul > li {
		opacity: 1;
		transition-delay: .5s; }
</style>