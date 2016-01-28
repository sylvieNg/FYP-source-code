<?php

require 'database.php';
require 'session.php';

if($_POST['forgot'])
{
	$email=mysqli_real_escape_string($account, $_POST['email']);

	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		echo "<script type='text/javascript'>alert('Invalid email')
				window.location='forget.php'
				</script>";

	}else
	{
		$sql=mysqli_query($account, "Select password from user where email ='$email'");
		$result=mysqli_fetch_array($sql);

		if(count($result)>=1)
		{
			//$encrypt=md5($result['password']);
			//$message="Your password reset link send to your email address.";
			$to=$email;
			$PostEmail = $_POST['email'];
			$encryptEmail = md5(md5($PostEmail)."thisIsTheFuckingBestSaltEver");
			$subject ="Forget Password";
			$from ='givemejob.be';
			$body= "Hi, \n\nSomebody requested to reset your password. \n\n";
			$body .= "Please click the link below to reset your password. \n\n ";
			$body .= "http://givemejob.be/reset.php?randcode=$encryptEmail&action=$PostEmail";

			/*'Hi, <br/> <br/>Your Membership ID is '.$Results['id'].' <br><br>Click here to reset your password 
			http://demo.phpgang.com/login-signup-in-php/reset.php?encrypt='.$encrypt.'&action=reset   <br/> <br/>--<br>PHPGang.com<br>Solve your problems.'*/
			$header="From: ".strip_tags($from);
			$header .="<br/>Reply to :" .strip_tags($from);

			mail($to, $subject, $body, $header);

			echo "<script type='text/javascript'>alert('View your email to reset the password')
				window.location='forget.php'
				</script>";
		}else
		{
			echo "<script type='text/javascript'>alert('Account not found. Please Register')
				window.location='forget.php'
				</script>";
		}
	}
}
?>

<html>
<head>
	<title>
		Forget Password
	</title>
	<style>
	body,html{
	margin: 0;
	padding: 0;
}
nav{
	background: black; 
	padding: 0 20px; 
	position: relative;
	border-radius: 10px;
}
nav ul li:hover > ul {
	display: block;
}
nav ul:after {
	content: ""; 
	clear: both; 
	display: block;
}
nav ul li {
	float: left;
	list-style: none;
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
.searchbar{
	float: right;
	margin-right: 2em;
	margin-top: 1.5em;
}
.forget{
	padding-left: 350px;
	padding-top: 100px;
}
.form{
	width: 600px;
	height: 100px;
	display: inline-block;
	border-style: groove;
	padding-left: 3em;
	font-size: 25;
}
header{
	padding-left: 5em;
}
h1{
	color: white;
}
	</style>
	</head>
	<body>
		<div class="container">
			<nav class="topping">
		<center><h1>Online Part Time Job</h1></center>
		<div class="searchbar">
		<form action="findjob.php" method="post">
			<div class="mainsearch">
					<input type="text" name="jobname" value="" placeholder="Search for Job...">
					<input type="submit" name="search" value="Search">
			</div>
		</form>
	</div>
		<ul class="right_head">
			<li><a href="home.php">Home</a></li>
			<li><a href="aboutus.php">About Us</a></li>
		</ul>
	</nav>
		<div class="forget">
			<div class="form">
		<header>Find Your Account</header>
		<form action="forget.php" method="post">
			Enter your Email: <input type="text" name ="email">
			<input type="submit" name="forgot" value="Send">
		</form>
	</div>
</div>
</div>

		</body>
</html>