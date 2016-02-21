<?php
require 'database.php';
require 'session.php';

$user=$_SESSION['email'];
$result=mysqli_query($account, "Select *from user where email='$user'");
while($rows=mysqli_fetch_array($result))
{
	$fname=$rows['first'];
	$lname=$rows['last'];
	$username=$rows['username'];
	$email=$rows['email'];
}
?>

<html>
<head>
<title>Employer Info</title>
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
.profile_picture{
	margin: 2em;
}
.info{
	margin: 2em;
}
</style>
</head>
<body>
<nav class="nav_bar">
    <div class="topnav">
    	<ul class="navbar-item">
    		<center><h1>Online Part Time Job</h1></center>
    		<h3> <span id="Welcome" style="color:MintCream ">Welcome back, <i><?php echo $login_session;?></i></span></h3>
    		<li class="postjob"><a href="postjob.php">Post Job</a></li>
	        <li class="active"><a href="findjob.php">Find Jobs</a></li>
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
<h2>Employer's Detail</h2>
<section class="profile">
		<div class="container">
			<div class="profile_picture">
				<?php
		$picture = array();
		$user=$_SESSION['email'];
		$image_sql = "SELECT * FROM image where user_id='$user' and date_updated in (select max(date_updated)from image)";
		$Image_result = mysqli_query($account, $image_sql); 
		while ($row = mysqli_fetch_array($Image_result)){
		  array_push($picture, $row["name"]);
		  ?>
		  <img src="uploads/<?echo $row['image_name'] ?>"  width="300" height="300">
		  <?php
		}
		?>
		<div>
		<form method ="post" action="imageupload.php" enctype="multipart/form-data">
			<h3>Image Upload</h3>
			<input type="file" name="fileToUpload" id="fileToUpload">
			<br><br>
			<input type="submit" value="Upload Image" name="submit">
		</form>
	</div>
	<div class="info">
				<?php
				$session=mysqli_query($account, "select *from user where email='$_SESSION[email]'");
				while($row=mysqli_fetch_array($session))
				{
					echo "<p>First Name: {$row['first']}<br>
					Last Name: {$row['last']}<br>
					Username: {$row['username']}<br></p>";
				}
				?>
			</div>
			</div>
			<hr>
			<h2>Posted Jobs</h2>
			<div class="info">
				<?php
				$session2=mysqli_query($account, "select *from job, user where user.email='$user' and user.email=job.employer_email");
				while($row2=mysqli_fetch_array($session2))
				{?>
					<div class="edit">
					<?php echo "<a href='editscript.php? edit=$row2[job_id]'>Edit</a>";?>
					</div>
					<?php
					$str=wordwrap($row2['description'],50,"<br>\n");
					
					echo "
					<table>
					<tr>
					<th>Job Name</th>
					<td>{$row2['job_name']}</td>
					</tr>
					<tr>
					<th>Job Category</th>
					<td>{$row2['job_category']}</td>
					</tr>
					<tr>
					<th>Salary</th>
					<td>RM{$row2['salary']}-{$row2['more']}</td>
					</tr>
					<tr>
					<th>Description</th>
					<td>$str</td>
					</tr>
					<tr>
					<th>Location</th>
					<td>{$row2['location']}-{$row2['specific_area']}</td>
					</tr>
					</table>";

				}
				?>
			</div>
		</div>
	</section>
</body>
</html>