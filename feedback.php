<?php

include('database.php');
include('session.php');

if(isset($_POST['feedback']))
{
	if(empty($_POST['comment']))
	{
		header("Location:appliedscript.php? appliedJob=$applied");
	}else
	{
		$user=$_SESSION['email'];
		$applied=$_POST['applied'];
		$comment=$_POST['comment'];

		$sql="insert into feedback (applied_id,user_id,comment)values ($applied,
		'$user','$comment')";
		$data = mysqli_query($account, $sql) or die (mysqli_connect_error());
		if($data)
		{
			header ("Location:appliedscript.php? feedback=$applied");
			//echo "appliedscript.php? appliedJob=$applied";
			//echo "<a href='appliedscript.php? appliedJob=$applied'>Applied Job</a>";
		}
	}

}