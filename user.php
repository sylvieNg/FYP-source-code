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
	</style>
	</head>
	<body>
		<nav class="nav_bar">
    <div class="topnav">
    	<ul class="navbar-item">
    		<center><h1>Online Part Time Job</h1></center>
    		<h3> <span id="Welcome" style="color:MintCream ">Welcome back, <i><?php echo $login_session;?></i></span></h3>
	        <div id="searchbar">
			</div>
			<li class="active"><a href="mainpage.php">Mainpage</a></li>
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
<div class="container">
<div class="profile">
		<?php
		$session=mysqli_query("select * from user,job,feedback where email='$_GET[user]'");
		$row=mysqli_fetch_array($session);

		if($login_session=='guest')
		{
			echo "<script type='text/javascript'>alert('Please login to continue')
			window.location='login.php'
			</script>";
		}else if(isset($_GET['user']))
		{
			echo "Username: " . $row['username']. "<br>";
			echo "Email: " . $row['email']. "<br>";
			echo "Contact Number: " . $row['contact_num'];

		}
		?>
	</div>
</div>
	</body>
</html>