<html lang="en">
<head>
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
	background: grey;
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
.description{
	font-size: 20;
	font-family: "Comic Sans MS", cursive, sans-serif;S
}
.first{
	float: left;
	width: 200px;
	height: 200px;
	padding-left: 5em;
}
.second{
	display: inline-block;
	padding-left: 300px;
	margin: 0 auto;
	width: 200px;
	height: 200px;
}
.third{
	float: right;
	width: 200px;
	height: 200px;
	padding-right: 5em;
}
</style>
<head>
<title>Your Home Page</title>
<meta charset="utf-8">
</head>
<body>
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
			<li><a href="login.php">Login</a></li>
			<li><a href="signup.php">Sign Up</a></li>
		</ul>
	</nav>
<section class="description">
	<center><p class="head">Objective</p></center>
	<div class="container">
		<div class="first">
			<p>Help the newbie into the blue collar field.</p>
		</div>
		<div class="second">
			<p>Help the senior blue collar to upgrade themselve by improving some skill.</p>
		</div>
		<div class="third">
			<p>Help them to find their own potential.</p>
		</div>
	</div>
</section>
<section class="howitworks">
	<div class="middle">
		<h2>How it works</h2>
	</div>
	</section>
</body>
</html>
