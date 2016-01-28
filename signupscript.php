<?php
require 'database.php';

if(isset($_POST['Submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$confirm=$_POST['confirm'];
	$first=$_POST['first'];
	$last=$_POST['last'];
	$email=$_POST['email'];
	$member=$_POST['member'];
	$number=$_POST['number'];
	$encrypt_pass=md5(md5($password)."thisIsTheFuckingBestSaltEver");
	$encrypt=md5(md5($confirm)."thisIsTheFuckingBestSaltEver");
	$encryptEmail = md5(md5($email)."thisIsTheFuckingBestSaltEver");

	$result=mysqli_query($account, "select *from user where email='$_POST[email]'") or die (mysqli_connect_error());
	$row=mysqli_fetch_array($result);
		
	if($_POST['email'] == $row['email'] )
	{
		echo "<script type='text/javascript'>alert('Email already exist')
		window.location='signup.php'
		</script>";

	}else{

		if($encrypt_pass==$encrypt)
		{
			$sql="Insert into user(First,Last,Username,Password,confirm_password,member,Email,contact_num)values
			('$first','$last','$username','$encrypt_pass','$encryptEmail','$member','$email','$number')";
			$data = mysqli_query($account, $sql) or die (mysqli_connect_error());

			if($data)
			{
				echo "<script type='text/javascript'>alert('Register successfully. Please check your email to activate your account')
				window.location='home.php'</script>";

				$to=$email;
				$subject ="Account activation";
				$from ='givemejob.be';
				$body= "Hi, \n\n";
				$body .= "Please click the link below to activate your account. \n\n ";
				$body .= "http://givemejob.be/confirm.php?randcode=$encryptEmail&action=$email";
				$header="From: ".strip_tags($from);
				$header .="<br/>Reply to :" .strip_tags($from);

				mail($to, $subject, $body, $header);

			}
		}
		
			
	}	
}

?>