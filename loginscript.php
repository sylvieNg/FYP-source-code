<?php
require 'database.php';
require 'session.php';

if(isset ($_POST['login']))
{
	if(empty($_POST['email'])&&empty($_POST['password']))
	{
		echo "<script type='text/javascript'>alert('Email and password are empty')
					window.location='login.php'
					</script>";

	}else if(empty($_POST['password'])){

		echo "<script type='text/javascript'>alert('Password is empty')
					window.location='login.php'
					</script>";
	}else if(empty($_POST['email'])){
		echo "<script type='text/javascript'>alert('Email is empty')
					window.location='login.php'
					</script>";
	}else
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$encrypt_pass=md5(md5($password)."thisIsTheFuckingBestSaltEver");

		$query="SELECT *from user WHERE email='$email' AND 
				password='$encrypt_pass' AND confirm_password is NULL";
		$result=mysqli_query($account, $query);
		$row=mysqli_fetch_array($result);

		if($row['email'] == $email &&$row['password']==$encrypt_pass)
		{
				$query=mysqli_query($account,"update user set last_login=now() where email='$email'");
				if($row['member']=="worker")
				{
					$_SESSION['email']=$email;
					header("Location:mainpage.php");

				}else if($row['member']=="employer"){
					
					$_SESSION['email']=$email;
					header("Location:postjob.php");
				}

		}else{
			echo "<script type='text/javascript'>alert('Email and password invalid')
					window.location='login.php'
					</script>";
		}
	
	}
}else
{
	header("Location: signup.php");
}

?>