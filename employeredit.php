<?php
require 'database.php';
require 'session.php';
?>

<html>
<head>
</head>
<body>
	<form method="post"
	action="employerscript.php">
	<p>Name of Business: <input type="text" name="company" autofocus></p>
	<p>State: <select name="state">
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
	<p>Name: <input type="text" name="name"></p>
	<p>Email: <input type="text" name="email"></p>

<input type="Submit" name ="Submit" value="Done">
</form>
	</body>
</html>