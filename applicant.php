<?php

require 'database.php';
require 'session.php';

$user=$_SESSION['email'];
?>
<html>
<head>
	</head>
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
h1{
	color:white;
}
.view{
	margin:2em;
}
	</style>
	<body>
		<nav class="nav_bar">
    <div class="topnav">
    	<ul class="navbar-item">
    		<center><h1>Online Part Time Job</h1></center>
    		<h3> <span id="Welcome" style="color:MintCream ">Welcome back, <i><?php echo $login_session;?></i></span></h3>
	        <div id="searchbar">
				<form action="search.php" method="get">
					<div class="mainsearch">
					</div>
				</form>
			</div>
	        <li class="active"><a href="postjob.php">Post a Jobs</a></li>
	        <li class="active"><a href="findjob.php">Find Jobs</a></li>
	        <li class="dropdown"><a href="#">Setting</a>
	        	<ul class="dropdown-menu">
		        	<li><a href="employerinfo.php">Persona</a></li>
					<li><a href="#">My feedback</a></li>
					<li><a href="message.php">My message</a></li>
					<li><a href="#">Deactivate</a></li>
					<li><a href="logout.php">Logout</a></li>
	        	</ul>
	        </li>
	      </ul> 
	</div>
</nav>
<div class="view">
	<?php
	if(isset($_GET['person']))
	{
		$result=mysqli_query($account, "select *from user where user.email='$_GET[person]'");
		$row=mysqli_fetch_array($result);

		echo "<p>
		Fisrt Name: {$row['first']}<br>
		Last Name: {$row['last']}<br>
		Username: {$row['username']}<br>
		Email: {$row['email']}<br>
		Contact Number: {$row['contact_num']}</p>";
	}
	?>
	</div>
	</body>
</html>