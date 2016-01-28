<?php
$target_dir = "resume/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    // Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "docx" && $imageFileType != "txt" && $imageFileType != "pdf" ) {
    echo "Sorry, only DOCX, PDF, PNG & TXT files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $stmt = mysqli_stmt_init($account);
	    $insert_resume_sql = "INSERT INTO resume (resume_name) VALUES (?)";
	    header("Location:info.php");
	    if (mysqli_stmt_prepare($stmt, $insert_resume_sql))
	    {
	        mysqli_stmt_bind_param($stmt, "s", $_FILES["fileToUpload"]["name"]);
	        mysqli_execute($stmt);
	    }

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

?>