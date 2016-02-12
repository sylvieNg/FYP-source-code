<?php
include('database.php');
include('session.php');

if(isset($_POST['deactivate']))
{
	$email=$_POST['email'];

	$sql=mysqli_query($account,"delete from user where email='$email'");
	$sql=mysqli_query($account,"delete from job where employer_email='$email'");
	$sql=mysqli_query($account,"delete from feedback where user_id='$email'");
	$sql=mysqli_query($account,"delete from applied where user_id='$email'");
	
	if($sql)
	{
		echo "<script type='text/javascript'>alert('Deactivate successfully. We hope to see you again')
				window.location='home.php'</script>";

				$to=$email;
				$subject ="Account deactivation";
				$from ='givemejob.be';
				$body= "Hi, \n\n";
				$body .= "We hope to see you again. \n\n ";
				$body .= "Thanks for using this website.\n\n";
				$header="From: ".strip_tags($from);
				$header .="<br/>Reply to :" .strip_tags($from);

				mail($to, $subject, $body, $header);
	}
}
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
.deactivate{
	margin:2em;
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
				<li class="findjob"><a href="findjob.php">Find Job</a></li>
				<li class="dropdown"><a href="#">Setting</a>
	        	<ul class="dropdown-menu">
		        	<li><a href="employerinfo.php">Persona</a></li>
					<li><a href="message.php">My message</a></li>
					<li><a href="deactivate.php">Deactivate</a></li>
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
					<li><a href="applied.php">My applied job</a></li>
					<li><a href="deactivate.php">Deactivate</a></li>
					<li><a href="logout.php">Logout</a></li>
	        	</ul>
	        </li><?php
			}
			?>
	        
	      </ul> 
	</div>
</nav>
		<div class="deactivate">
			<h3>Are you sure you want to deactivate this account?</h3>
			<p>After deactivate this account, the records will be removed</p>
		<form method="post" action="deactivate.php">
			<p>Email:<input type="text" name="email"></p>
			<input type="submit" name="deactivate" value="Confirm">
		</form>
	</div>
	</body>
</html>