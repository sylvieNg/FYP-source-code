<?php
require 'database.php';
require 'session.php';

//session_start();
/*
if(!isset($_SESSION['email']))
{
	header("Location: login.php");
	exit;
	
}else if(isset ($_SESSION['email']))
{
	echo "Welcome $_SESSION['email']";
}
*/
$user=$_SESSION['email'];


?>
<html lang="en">
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
h3{
	position: static;
	padding-left: 5em;
}
.left{
	width: 400px;
	height: 500px;
	float: left;
	padding-left: 5em;
}
.right{
	display: inline-block;
	padding-left: 100px;
	margin: 0 auto;
	width: 400px;
	height: 500px;
}
</style>
<head>
<title>Your Home Page</title>
<meta charset="utf-8">
</head>
<body>
<nav class="nav_bar">
    <div class="topnav">
    	<ul class="navbar-item">
    		<center><h1>Online Part Time Job</h1></center>
    		<h3> <span id="Welcome" style="color:MintCream ">Welcome back, <i><?php echo $login_session;?></i></span></h3>
	        <li class="active"><a href="findjob.php">Find Jobs</a></li>
	        <li class="dropdown"><a href="#">Setting</a>
	        	<ul class="dropdown-menu">
		        	<li><a href="info.php">Persona</a></li>
					<li><a href="applied.php">My applied job</a></li>
					<li><a href="deactivate.php">Deactivate</a></li>
					<li><a href="logout.php">Logout</a></li>
	        	</ul>
	        </li>
	      </ul> 
	</div>
</nav>
<div class="container">
	<h3 class="title">Profile</h3>
	<div class="left">
		<img src="uploads/<?= $user ?>"  width="300" height="300">
		<div>
		<form method ="post" action="imageupload.php" enctype="multipart/form-data">
			<h3>Image Upload</h3>
			<input type="file" name="fileToUpload" id="fileToUpload">
			<br><br>
    		<input type="submit" value="Upload Image" name="submit">
		</form>
	</div>
	</div>
	<div class="right">
		<table class="table">
			<tbody class="body">
				<tr>
					<th class="first">First Name</th>
					<td class="content">
						<?php 
						$session1=mysqli_query($account, "Select first from user where email='$user'");
						while($row1=mysqli_fetch_array($session1))
						{
							echo $row1['first'];
						}
						?>
					</td>
				</tr>
				<tr>
					<th class="last">Last Name</th>
					<td class="content">
						<?php 
						$session2=mysqli_query($account, "Select last from user where email='$user'");
						while($row2=mysqli_fetch_array($session2))
						{
							echo $row2['last'];
						}
						?>
					</td>
				</tr>
				
			</tbody>
		</table>
	</div>
</div>
</section>
</body>
</html>
