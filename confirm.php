<?php
 include('database.php');

 $passkey = $_GET['randcode'];

 $sql = "UPDATE user SET confirm_password=NULL WHERE confirm_password='$passkey'";
 $result = mysqli_query($account,$sql) or die(mysqli_error());
 if($result)
 {
  echo '<div>Your account is now active. You may now <a href="login.php">Log in</a></div>';
}
 else
 {
  echo "Some error occur.";
 }
?>