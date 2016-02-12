<?php
require 'database.php';
require 'session.php';

$user=$_SESSION['email'];

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
.info{
	margin: 2em;
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
<div class="info">
	<?php
		$result=mysqli_query($account, "Select distinct job.job_name, job.job_category, job.description, job.salary, job.more, job.employer_email , job.location, job.specific_area, applied.job_status 
			from applied, user,job where user.email='$user' and user.email=applied.user_id and applied.job_id=job.job_id
			order by applied.date_updated DESC");
		while($rows=mysqli_fetch_assoc($result))
		{
			echo "<p>Job Name: {$rows['job_name']}<br>
					Job category: {$rows['job_category']}<br>
					Salary: RM{$rows['salary']} {$rows['more']}<br>
					Description: {$rows['description']}<br>
					Location: {$rows['location']} - {$rows['specific_area']}<br>
					Employer: {$rows['employer_email']}<br>
					Status: {$rows['job_status']}</p><br><br>";
		}
		?>
			</div>
		</div>
	</body>
</html>