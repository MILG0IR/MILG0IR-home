<?php
	#{
	#	"_comment": [
	#		"WARNING: DO NOT MODIFY.",
	#		"THE DETAILS ENTERED HERE WILL EFFECT IT'S DISPLAYED IN THE MENU."
	#	],
	#	"id": "999",
	#	"title": "Settings",
	#	"description": "",
	#	"uri_remote": "./pages/settings.php",
	#	"icon": ""
	#}
?>
<style>
	body{
		margin: 0; }
	.topnav {
		overflow: hidden;
		background-color: #333; }
	.topnav a{
		float: left;
		display: block;
		color: #f2f2f2;
		text-align: center;
		padding: 14px 16px; /* top&bottom, right&left */
		text-decoration: none;
		font-size: 17px; }
	.topnav a:hover {
		background-color: #ddd;
		color: black; }
	.topnav .icon {
		display: none; }
	@media only screen and (max-width: 600px) {
		.topnav a:not(:first-child) {
			display: none; }
		.topnav a.icon {
			float: right;
			display: block; }
		.topnav.responsive {
			position: relative; }
		.topnav.responsive .icon {
			position: absolute;
			right: 0;
			top: 0; }
		.topnav.responsive a {
			float: none;
			display: block;
			text-align: left; }
	}
</style>
<div class="topnav" id="myTopnav">
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="about">About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction();">&#9776;</a>
</div>

<script>
	function myFunction(){
		var topnav = document.getElementById("myTopnav");
		if (topnav.className === "topnav"){
			topnav.className += " responsive";
		}else{
			topnav.className = "topnav";
		}
	}
</script>