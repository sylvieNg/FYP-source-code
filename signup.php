<html>
<head>
<title>Sign Up</title>
</head>
<style>
body,html{
	margin: 0;
	padding: 0;
}
*{
	font-family: "Comic Sans MS", cursive, sans-serif;
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
#button{
	width: 100px;
	height: 100px;
	border-radius: 50px;
	font-size: 20;
	background-color: pink;
	text-align: center;
	border: none;
	position: relative;
	margin-right: 5em;
}
.container{
	padding-left: 30em;
}
h2{
	padding-left: 5em;
}
.form{
	width: 400px;
	height: 600px;
	display: inline-block;
	font-size: 20;
}
.form{
    float: left;
    clear: left;
    text-align: right;
}
</style>
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
			<li><a href="login.php">Login</a></li>
			<li><a href="aboutus.php">About Us</a></li>
		</ul>
	</nav>
	<div class="container">
	<div class="head">
<h2>Free Sign Up</h2>
<h3>Please fill in the blanks below to register yourself</h3>
</div>
<div class="form">
<form method="post"
	action="signupscript.php">
	<div id="form">
	<p>First Name: <input type="text" name="first" id="firstname" autofocus></p>
	<p>Last Name: <input type="text" name="last" id="lastname"></p>
	<p>Username: <input type="text" name="username" id="username"></p>
	<p>Password: <input type="password" name="password" id="password"></p>
	<p>Confirm Password: <input type="password" name="confirm" ></p>
	<p>Email: <input type="text" name="email" id="email"></p>
	<p>Contact Number: <input type="text" name="number" id="number"></p>
	</div>
	<p>You are a: 
		<input type="radio" name="member" value="employer" checked>Employer
		<input type="radio" name="member" value="worker">Worker<br><br></p>
		<input type="Submit" name ="Submit" id="button" value="Register">

</form>
</div>
</div>
</body>
</html>