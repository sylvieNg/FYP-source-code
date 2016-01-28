<?php

require 'database.php';

if(isset($_POST['reset']))
{
	$new_password=$_POST['password'];
	$con_pass=$_POST['retype'];
	$encrypt_pass=md5(md5($new_password)."thisIsTheFuckingBestSaltEver");
	$encrypt=md5(md5($con_pass)."thisIsTheFuckingBestSaltEver");
	$code=$_POST['randcode'];
	$GetAction = $_POST['action'];
	$encryptEmail=md5(md5($GetAction)."thisIsTheFuckingBestSaltEver");

	if($code==$encryptEmail && $encrypt_pass==$encrypt)
	{
		$sql="update user set password='$encrypt_pass' where email='$GetAction'";
		$data = mysqli_query($account, $sql) or die (mysqli_connect_error());
			if($data)
			{
				echo "<script type='text/javascript'>alert('Password changed successfully')
				window.location='login.php'
				</script>";

			}
	}else
	{
		echo "Error occur. Please check your email to reset password";
	}
}

?>

<html>
<head>
	<title>
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
.reset{
	padding-left: 350px;
	padding-top: 100px;
}
.form{
	width: 600px;
	height: 150px;
	display: inline-block;
	border-style: groove;
	padding-left: 3em;
	font-size: 25;
}
header{
	padding-left: 5em;
	padding-bottom: 1em;
}
p{
	font-size: 15;
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
		<ul class="right_head">
			<li><a href="home.php">Home</a></li>
			<li><a href="aboutus.php">About Us</a></li>
		</ul>
	</nav>
		<div class="reset">
			<div class="form">
		<header>Reset Your Password</header>
		<form action="reset.php" method="post">
			<input type="hidden" name="randcode" value=<?php echo $_GET['randcode']; ?>>
			<input type="hidden" name="action" value=<?php echo $_GET['action']; ?>>
			New password: <input type="password" name ="password"><br>
			Confirm password: <input type="password" name ="retype"><br>
			<input type="submit" name="reset" value="Send" id="reset">
		</form>
	</div>
</div>
</div>

	</body>
</html>