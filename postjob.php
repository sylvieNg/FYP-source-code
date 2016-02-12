<?php

require 'database.php';
require 'session.php';

?>
<html>
<head>
	<style>
	body,html{
	margin: 0;
	padding-right: 0;
}
*{
	font-family: "Comic Sans MS", cursive, sans-serif;
 }

nav ul ul {
	display: none;
}
nav ul li:hover > ul {
	display: block;
}
nav ul{
	background: black; 
	padding: 0 20px;
	border-radius: 10px;  
	list-style: none;
	position: relative;
}
nav ul:after {
	content: ""; 
	clear: both; 
	display: block;
}
nav ul li {
	float: left;
}
.dropdown{
	float: right;
	margin-right: 5em;
}
nav ul li:hover {
	background: grey ;
}
nav ul li:hover a {
	color: white;
}
nav ul li a {
	display: block; 
	padding: 25px 40px;
	color: white; 
	text-decoration: none;
}
nav ul ul {
	background: black; 
	border-radius: 0px; 
	padding: 0;
	position: absolute; 
	top: 100%;
}
nav ul ul li {
	float: none; 
	position: relative;
}
nav ul ul li a {
	padding: 15px 40px;
	color: white;
}	
nav ul ul li a:hover {
	background: grey ;
}
form{
	margin-left: 20em;
	width: 1200px;
	height: 600px;
	display: inline-block;
}
input, textarea, select{
	margin-top: 1em;
	display: inline-block;
	float: left;
}
p{
	display: inline-block;
    float: left;
    clear: left;
    width: 250px;
    text-align: right;
}
h1{
	color:white;
}
#specific, #more{
	margin-left: 1em;
}
#button{
	width: 100px;
	height: 100px;
	border-radius: 50px;
	position: relative;
	margin-top: 3em;
	right: 15em;
	font-size: 20;
	background-color: pink;
	text-align: center;
	border: none;
}
	</style>
</head>
<body>
	<nav class="nav_bar">
    <div class="topnav">
    	<ul class="navbar-item">
    		<center><h1>Online Part Time Job</h1></center>
    		<h3> <span id="Welcome" style="color:MintCream ">Welcome back, <i><?php echo $login_session;?></i></span></h3>
	        <li class="active"><a href="findjob.php">Job List</a></li>
	        <li class="dropdown"><a href="#">Setting</a>
	        	<ul class="dropdown-menu">
		        	<li><a href="employerinfo.php">Persona</a></li>
					<li><a href="message.php">My message</a></li>
					<li><a href="#">Deactivate</a></li>
					<li><a href="logout.php">Logout</a></li>
	        	</ul>
	        </li>
	      </ul> 
	</div>
</nav>
<div class="container">
	<div class="post">
	<center><h2>Post A Job</h2></center>
	<form method="post" action="postscript.php">
		<p>Job Title * : </p><input type="text" name="title" value="" >
		<p>Description * :</p><textarea name="comment" rows="10" cols="30"></textarea>
		<p>Job Category * :</p><select name="category">
			<option value="">Job Category</option>
			<option value="Service Crew">Service Crew</option>
			<option value="Promoter">Promoter</option>
			<option vlaue="Cleaner">Cleaner</option>
			<option value="Model">Model</option>
			<option value="Translator">Translator</option>
			<option value="Driver">Driver</option>
			<option value="Other">Other</option>
		</select>
		<p>Location * :</p><select name="state">
			<option value="">State</option>
			<option value="Perlis">Perlis</option>
			<option value="Penang">Penang</option>
			<option value="Kedah">Kedah</option>
			<option value="Pahang">Pahang</option>
			<option value="Perak">Perak</option>
			<option value="Terengganu">Terengganu</option>
			<option value="Kuantan">Kuantan</option>
			<option value="Selangor">Selangor</option>
			<option value="Melaka">Melaka</option>
			<option value="Negeri Sembilan">Negeri Sembilan</option>
			<option value="Johor">Johor</option>
			<option value="Sarawak">Sarawak</option>
			<option value="Sabah">Sabah</option>
		</select>
		<input type="text" name="specific" value="" id="specific" placeholder="Specific Location">
		<p>Salary * :</p><input type="text" name="salary" value="" placeholder="e.g:2000">
		<input type="text" name="more" value="" id="more" placeholder="e.g:per day">
		<input type="submit" id="button" name="post" value="Post Job">
	</form>
</div>
</div>
	</body>
</html>