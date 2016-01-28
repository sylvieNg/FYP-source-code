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
?>
<html lang="en">
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
.filter{
	float: left;
	margin-left: 3em;
	width: 150px;
	height: 250px;
}
.info{
	float: left;
	margin-left: 6em;
	width: 800px;
}
#title{
	margin: 0;
	width: 400px;
	float: left;
}
#salary{
	float: right;
	width: 400px;
}
</style>
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
					<li><a href="#">My reputation</a></li>
					<li><a href="applied.php">My applied job</a></li>
					<li><a href="deactivate.php">Deactivate</a></li>
					<li><a href="logout.php">Logout</a></li>
	        	</ul>
	        </li>
	      </ul> 
	</div>
</nav>
<div class="filter">
	<p>Search Filter</p>
	<form action="findjob.php" method="post">
					<div class="mainsearch">
						<div class="subsearch">
							<input type="text" name="jobname" value="" placeholder="Search for Job...">
							<input type="submit" name="search" value="Search">
						</div>
					</div>
				</form>
	<form action="findjob.php" method="post">
		<label for="category"><p>Job Category: </p></label><select name="category">
			<option value="">Job Category</option>
			<option value="Service Crew">Service Crew</option>
			<option value="Promoter">Promoter</option>
			<option vlaue="Cleaner">Cleaner</option>
			<option value="Model">Model</option>
			<option value="Translator">Translator</option>
			<option value="Driver">Driver</option>
			<option value="Other">Other</option>
		</select>
		<label for="state"><p>State: </p></label><select name="state">
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
		<input type="submit" name="ok" value="Search Keyword">
	</form>
	</div>
<div class="info">
	<div id="title"><h2>Title</h2></div>
	<div id="salary"><h2>Salary</h2></div>
		<?php
	
			$session=mysqli_query($account, "select *from job order by date_updated DESC");	
			$number=1;
			while($row=mysqli_fetch_array($session))
			{
				echo "<a href='appliedscript.php? detail=$row[job_id]'>";
				?>
					<h3>
						<?php 
												
						echo $number. " ". $row['job_name'];?></a>
					</h3> 
					<div id="salary"><?php 
				echo "RM" . $row['salary'] . " - " . $row['more'];?></div>
				<?php
				echo $row['location'] ."  -  ". $row['specific_area'];
				$number++;
				}?>
				
</div>
</body>
</html>