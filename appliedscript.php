<?php

include ('database.php');
include ('session.php');
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
.apply{
	margin-left: 3em;
}
	</style>
	</head>
	<body>
		<nav class="nav_bar">
    <div class="topnav">
    	<ul class="navbar-item">
    		<center><h1>Online Part Time Job</h1></center>
    		<h3> <span id="Welcome" style="color:MintCream ">Welcome back<i><?php 
    		if($login_session=='guest')
    		{
    			echo "";
    		}else{
    		echo ", " . $login_session;}
    		?>
    	</i></span></h3>
<?php
			$session =mysqli_query($account, "select *from user where email='$user'");
			$row=mysqli_fetch_array($session);

			$member=$row['member'];
			if($member=='employer')
			{
				?>
				<li class="active"><a href="postjob.php">Post Job</a></li>
				<li class="dropdown"><a href="#">Setting</a>
	        	<ul class="dropdown-menu">
		        	<li><a href="employerinfo.php">Persona</a></li>
		        	<li><a href="posted.php">My posted job</a></li>
					<li><a href="#">My feedback</a></li>
					<li><a href="message.php">My message</a></li>
					<li><a href="#">Deactivate</a></li>
					<li><a href="logout.php">Logout</a></li>
	        	</ul>
	        </li>
				<?php
			}else if($login_session=='guest')
			{?>
				<li class="active"><a href="home.php">Home</a><li>
				<li><a href="login.php">Login</a></li>
				<li><a href="signup.php">Sign Up</a></li>

	        	<?php
			}else{
				?>
				<li class="active"><a href="mainpage.php">Main Page</a></li>
	        	<li class="dropdown"><a href="#">Setting</a>
	        	<ul class="dropdown-menu">
		        	<li><a href="info.php">Persona</a></li>
					<li><a href="applied.php">My reputation</a></li>
					<li><a href="#">My applied job</a></li>
					<li><a href="#">Deactivate</a></li>
					<li><a href="logout.php">Logout</a></li>
	        	</ul>
	        </li><?php
			}
			?>
	      </ul> 
	</div>
</nav>
<div class="container">
<div class="apply">
<?php


if(isset($_GET['detail']))
{
	$session =mysqli_query($account, "select *from job, user where job_id='$_GET[detail]' and job.employer_email=user.email");
	$row=mysqli_fetch_array($session);

	echo "<p>Job title: {$row['job_name']}<br>
	Job category: {$row['job_category']}<br>
	Description: {$row['description']}<br>
	Salary: RM{$row['salary']} / {$row['more']}<br>
	Location : {$row['location']} - {$row['specific_area']}<br></p>";

	echo "<a href='appliedscript.php? appliedJob=$_GET[detail]'>Applied Job</a>";
	?>
	<h2>More Information?</h2>
	<?php 
		echo "Email address: ". "<a href='user.php? user=$row[email]'>$row[email]</a>". "<br>";
		echo "Contact Number: " . $row['contact_num'];
	
}else if(isset($_GET['appliedJob']))
	{
		$session2 =mysqli_query($account, "select *from user where email='$user'");
		$row2=mysqli_fetch_array($session2);

		$user=$_SESSION['email'];
		$id= $_GET['appliedJob'];
		$member=$row2['member'];

		if($login_session=='guest')
		{
			echo "<script type='text/javascript'>alert('Please login to continue')
			window.location='login.php'
			</script>";
			//header("Location: home.php");
		}else if($member=='employer')
		{
			echo "<script type='text/javascript'>alert('Please sign up as worker to apply job')
			window.location='postjob.php'
			</script>";
		}else{
			
			/*$sql="insert into applied(job_id, job_status,user_id)
			values ('$id', 'waiting for reply', '$user')";
			$data=mysqli_query($sql) or die (mysqli_connect_error());
			if($data)
			{
				//header ("Location:findjob.php");
				echo "<script type='text/javascript'>alert('Successfully apply the job.')
				window.location='findjob.php'
				</script>";
			}*/
			?>
			<div class="application">
				<form action="#" method="post">
					<p>Email: <?php echo $user; ?></p>
					<p>Contact Number: <?php echo $row2['contact_num']; ?></p>
					<a href="#">Attach Your Resume</a>
					<p>Word to Say: </p><textarea cols=100 rows=5 name="word"></textarea>
					<input type="submit" name="send" value="Apply">
				</form>

			<?php
		}

		//echo $id;
	}
?>
</div>
</div>
</body>
</html>