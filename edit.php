<?php
include ('database.php');
include ('session.php');

if (isset($_POST['update']))
{
	$jobname=$_POST['jobname'];
	$jobcategory=$_POST['jobcategory'];
	$description=$_POST['description'];
	$salary=$_POST['salary'];
	$more=$_POST['more'];
	$location=$_POST['location'];
	$specific=$_POST['specific'];
	$id=$_POST['code'];

	$query=mysqli_query($account,"update job set job_name='$jobname', job_category='$jobcategory',
		description='$description', salary='$salary',
		more='$more', location='$location',
		specific_area='$specific',date_updated=now() where job_id=$id");

	if($query)
	{
		echo "<script type='text/javascript'>alert('Update Successfully')
		window.location='employerinfo.php'</script>";
	}
}

?>