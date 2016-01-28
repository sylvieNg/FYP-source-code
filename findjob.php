<?php
require 'database.php';
require 'session.php';

$sql ="select *from job order by date_updated DESC";

if(isset($_POST['search']))
{
	
	if(empty($_POST['jobname']))
	{
		$sql ="select *from job order by date_updated DESC";
	}
	else{
		$search_term=mysqli_real_escape_string($account, $_POST['jobname']);

		if(preg_match("/[A-Z  | a-z]+/", $search_term) )
		{
			$sql ="select *from job  where job_name like '%$search_term%' order by date_updated DESC";
		}else{
			//echo "Please enter alphabets";
			echo "<script type='text/javascript'>alert('Please enter alphabets')
			window.location='findjob.php'
			</script>";
		}
	}
	

}else if(isset($_POST['ok']))
{
	if (empty($_POST['state']) && empty($_POST['category']))
	{
		$sql ="select *from job order by date_updated DESC";
	}else{
		$state=mysqli_real_escape_string($_POST['state']);
		$category=mysqli_real_escape_string($_POST['category']);
		if(preg_match("/[A-Z  | a-z]+/", $state) && preg_match("/[A-Z  | a-z]+/", $category))
		{
			$sql ="select *from job  where location='$state' and job_category='$category' order by date_updated DESC";
		}else{
			//echo "Please enter alphabets";
			echo "<script type='text/javascript'>alert('Please enter alphabets')
			window.location='findjob.php'
			</script>";
		}
	}
}else if(isset($_GET['ref']))
{
	$sql .="where job_name='$_GET[ref]'";
}

$query=mysqli_query($account, $sql) or die (mysqli_connect_error());

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
h1{
	color:white;
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
					<li><a href="#">My reputation</a></li>
					<li><a href="applied.php">My applied job</a></li>
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
	
					$found=0;
					$number=1;
					while($row=mysqli_fetch_array($query))
					{
						$found=1;
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
					}
					if($found=0)
					{
						echo "<script type='text/javascript'>window.comfirm('No result found')
						window.location='findjob.php'
						</script>";
					}?>
			</div>
		</div>
	</body>
</html>