<?php
include('database.php');
include('session.php');

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //$stmt = mysqli_stmt_init($account);
        $picture = basename( $_FILES["fileToUpload"]["name"]);
        $image_size=$_FILES['fileToUpload']['size'];
        $image_type = $_FILES['fileToUpload']['type'];
        $user=$_SESSION['email'];
	    $insert_image_sql = "INSERT INTO image (image_type,image,image_size,image_ctgy,image_name,date_created,date_updated,user_id) 
        VALUES ('$image_type',?,'$image_size',?,'$picture',?,?,'$user')";
        mysqli_query($account,$insert_image_sql);
        /*
	    if (mysqli_stmt_prepare($stmt, $insert_image_sql))
	    {
	        mysqli_stmt_bind_param($stmt, "s", $_FILES["fileToUpload"]["name"]);
	        mysqli_execute($stmt);
	    }*/
        //header("Location:info.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>