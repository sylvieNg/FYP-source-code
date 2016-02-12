<?php
require 'database.php';
require 'session.php';

$user=$_SESSION['email'];


?>

<html>
	<head>
	<title>
	</title>
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
.notification{
	margin:2em;
}
	</style>
	</head>
	<body>
		<div class="container">
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
					<li><a href="deactivate.php">Deactivate</a></li>
					<li><a href="logout.php">Logout</a></li>
	        	</ul>
	        </li>
	      </ul> 
	</div>
</nav>
			<div class="notification">
				<?php
				$session=mysqli_query($account,"Select applied.applied_id, applied.user_id ,job.job_name ,applied.job_status, 
					applied.date_created from applied,job where applied.job_id=job.job_id and job.employer_email='$user'");
				while($row=mysqli_fetch_array($session))
				{
					echo "<p>Job Name: $row[job_name]</p>
					<p>Email: <a href='applicant.php? person=$row[user_id]'>$row[user_id]</a></p>
					<p>Status: $row[job_status]</p>
					<p>Date Applied: $row[date_created]</p>";

					echo "<form method='post' action='hire.php'>
					<input type='hidden' name='candidate' value='$row[user_id]'>
					<input type='hidden' name='job' value='$row[job_name]'>
					<input type='hidden' name='job_id' value='$row[applied_id]'>
					<input type='submit' name='hire' value='Hire'>
					</form><br><br>";
				}
				?>
			</div>
		</div>
	</body>
</html>