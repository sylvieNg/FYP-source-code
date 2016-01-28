<?php
require 'database.php';
require 'session.php';

$query=mysqli_query($account, "select *from job where job_id=$_GET[edit]");
$row=mysqli_fetch_array($query);

if(isset($_GET['edit']))
{
	  echo "<table>";
	  echo "<form action=edit.php method=post>";
	  echo "<input type=hidden name=code value=".$_GET['edit'].">";
	  echo "<tr>";
	  echo "<th>Job Title</th>";  
	  echo "<td>" . "<textarea name=jobname>" . $row['job_name'] . "</textarea></td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<th>Job Category</th>"; 
	  echo "<td>" . "<textarea name=jobcategory>" . $row['job_category'] . "</textarea></td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<th>Description</th>";
	  echo "<td>" . "<textarea cols=50 rows=5 name=description>" . $row['description'] . "</textarea></td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<th rowspan=2>Salary</th>";
	  echo "<td>" . "<input type=number step=0.01 name=salary value=" . $row['salary'] . "></td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td>" . "<textarea name=more>" . $row['more']."</textarea></td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<th rowspan=2>Location</th>";
	  echo "<td>" . "<textarea cols=10 rows=1 name=location>" . $row['location']."</textarea></td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td>" . "<textarea cols=10 rows=1 name=specific>" . $row['specific_area']."</textarea></td>";
	  echo "</tr>";
	  echo "<td>";
	  echo "<input type=submit name=update value=Save>";
	  echo "</td>";
	  echo "</form>";
	  echo "</table>";
}
?>
<html>
<head>
	<title>
	</title>
	</head>
	<body>
		
	</body>
</html>