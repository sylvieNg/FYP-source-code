<?php
include ('database.php');
include ('session.php');


if(isset($_POST['hire']))
{
	$candidate=$_POST['candidate'];
	$job=$_POST['job'];
	$job_id=$_POST['job_id'];
	$user=$_SESSION['email'];

	$query2=mysqli_query($account, "select username from user where user_id=$user");
	$row=mysqli_fetch_array($query2);

	$query=mysqli_query($account,"update applied set job_status='Hire',
		date_updated=now() where applied_id=$job_id");

	if($query)
	{
		echo "<script type='text/javascript'>alert('HIRED')
		window.location='employerinfo.php'</script>";

				$to=$candidate;
				$subject ="Successfully hired";
				$from ='givemejob.be';
				$body= "Hi, \n\n";
				$body .= "You have successfully hire by  \n\n ";
				$body .= $row['username'] . "(". $user. ")";
				$body .= "as a";
				$body .= $job;
				$header="From: ".strip_tags($from);
				$header .="<br/>Reply to :" .strip_tags($from);

				mail($to, $subject, $body, $header);
	}

}
?>