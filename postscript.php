<?php
require 'database.php';
require 'session.php';

session_start();

if(isset ($_POST['post']))
{
	if(empty($_POST['title']) || empty($_POST['category']) || empty($_POST['state']) || empty($_POST['salary']) ||empty($_POST['comment']))
	{
		echo 'Fill in the information that required (*)';
	}else{
		$title=$_POST['title'];
		$category=$_POST['category'];
		$description=$_POST['comment'];
		$state=$_POST['state'];
		$specific=$_POST['specific'];
		$salary=$_POST['salary'];
		$more=$_POST['more'];

		$user=$_SESSION['email'];
		//$result2=mysql_query("Select email from user where email='$user'");
		//$row2=mysql_fetch_row($result2);

		$query="select *from job";
		$result=mysqli_query($account, $query) or die (mysqli_connect_error());
		$row=mysqli_fetch_row($result);

		
			$sql="Insert into job (job_name, job_category, description, salary, more, location,specific_area,employer_email)
			values ('$title','$category','$description','$salary','$more','$state','$specific','$user')";
			$data=mysqli_query($account, $sql) or die (mysqli_connect_error());
			if($data)
			{
				header ("Location:findjob.php");
			}
		

		
	}
}

?>