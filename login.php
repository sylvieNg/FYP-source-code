<html>
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
.form{
	width: 600px;
	height: 100px;
	display: inline-block;
	padding-left: 15em;
	padding-top: 5em;
	font-size: 25;
}
#button1{
	width: 100px;
	height: 100px;
	border-radius: 50px;
	position: relative;
	left: 8em;
	font-size: 20;
	background-color: pink;
	text-align: center;
	border: none;
}
#button2{
	width: 100px;
	height: 100px;
	border-radius: 50px;
	position: relative;
	left: 8em;
	font-size: 20;
	background-color: pink;
	text-align: center;
	border: none;
	margin-left: 5em;
}
label{
    display: inline-block;
    float: left;
    clear: left;
    width: 250px;
    text-align: right;
}
input {
  display: inline-block;
  float: left;
}
a{
	float: right;
	font-size: 15;
	padding-right: 5em;
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
			<div class="form">
					<form action="loginscript.php" method="post" id="form">
					<label for="email"><b>Email: </b></label><input type="text" name="email" id="e" placeholder="Email"><br><br>	
					<label for="password"><b>Password: </b></label><input type="password" name="password" id="p" placeholder="Password"><br><br>
					<a href="forget.php">Forget Password?</a><br>
					<input type="Submit" name ="login" value="Login" id="button1">
					<input type="Submit" name=="sign" value="Sign Up" id="button2">
				</form>
			</div>
			</div>

			</body>
</html>