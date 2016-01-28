<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Part Time Job Online</title>
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
h1{
	color:white;
}
.searchbar{
	float: right;
	margin-right: 2em;
	margin-top: 1.5em;
}
.cleaner{
	float: left;
	width: 400px;
	height: 400px;
}
.plumber{
	display: inline-block;
	padding-left: 80px;
	margin: 0 auto;
	width: 400px;
	height: 400px;
}
.promoter{
	float: right;
	width: 400px;
	height: 400px;
}
.model{
	float: left;
	width: 400px;
	height: 400px;
}
.technician{
	display: inline-block;
	padding-left: 80px;
	margin: 0 auto;
	width: 400px;
	height: 400px;
}
.driver{
	float: right;
	width: 400px;
	height: 400px;
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
			<li><a href="login.php">Login</a></li>
			<li><a href="signup.php">Sign Up</a></li>
			<li><a href="aboutus.php">About Us</a></li>
		</ul>
	</nav>
	<section class="middle">
					<div class="cleaner">
						<?php
							$search_term='cleaner';
							echo "<a href='findjob.php? ref=$search_term'>";

						?>
						<figure>
							<img src="cleaner.jpg" alt="Cleaner" width="300px" height="300px">Cleaner</a>
						</figure>
					</div>
					<div class="plumber">
						<?php
							$search_term='plumber';
							echo "<a href='findjob.php? ref=$search_term'>";

						?>
						<figure>
							<img src="plumber.jpg" alt="Plumber" width="300px" height="300px">Plumber</a>
						</figure>
					</div>
					<div class="promoter">
						<?php
							$search_term='promoter';
							echo "<a href='findjob.php? ref=$search_term'>";

						?>
						<figure>
							<img src="promoter.jpg" alt="Promoter" width="300px" height="300px">Promoter</a>
						</figure>
					</div>
					<div class="model">
						<?php
							$search_term='model';
							echo "<a href='findjob.php? ref=$search_term'>";

						?>
						<figure>
							<img src="model.jpg" alt="Modelling" width="300px" height="300px">Model</a>
						</figure>
					</div>
					<div class="technician">
						<?php
							$search_term='technician';
							echo "<a href='findjob.php? ref=$search_term'>";

						?>
						<figure>
							<img src="technician.jpg" alt="Technician" width="300px" height="300px">Technician</a>
						</figure>
					</div>
					<div class="driver">
						<?php
							$search_term='driver';
							echo "<a href='findjob.php? ref=$search_term'>";

						?>
						<figure>
							<img src="driver.jpg" alt="Driver" width="300px" height="300px">Driver</a>
						</figure>
					</div>
				</section>
</div>
</body>
</html>