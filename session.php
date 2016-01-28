<?php

require 'database.php';
session_start();

$user=$_SESSION['email'];
$session=mysqli_query($account, "Select username from user where email='$user'");
$row=mysqli_fetch_array($session);
$login_session=$row['username'];
if(!isset($login_session)){

	//header("Location:home.php");
	$_SESSION['email']='';
	$login_session='guest';

}
?>