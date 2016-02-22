<?php

include('database.php');
include('session.php');

$target_dir = "resume/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["resume"])) {
    echo "Uploading....";
}
// Check if file already exists
if (file_exists($target_file)) {

    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 100000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "txt" && $imageFileType != "docx") {
    echo "Sorry, only PDF, txt & DOCX files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        $resume = basename( $_FILES["fileToUpload"]["name"]);
        //echo $picture;
        $file_size=$_FILES['fileToUpload']['size'];
        //echo $image_size;
        $file_type = $_FILES['fileToUpload']['type'];
        //echo $image_type;
        $user=$_SESSION['email'];
        //echo $user;

        $insert_image_sql = "INSERT INTO resume 
        (file_type,file_size,file_name,user_id) 
        VALUES (?,?,?,?)";

        $stmt = mysqli_prepare($account, $insert_image_sql);

        if ($stmt)
        {
            mysqli_stmt_bind_param($stmt,"ssss",$file_type,$file_size,$resume,$user);
            mysqli_stmt_execute($stmt);
            if (mysqli_affected_rows($account))    
            {
                mysqli_stmt_close($stmt);  
                //update was successful
                $id = mysqli_insert_id($account);
            }
        }
        //header("Location:info.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
<html lang="en">
<head>
    <style>
    body,html{
    margin: 0;
    padding-right: 0;
}
*{
    font-family: "Comic Sans MS", cursive, sans-serif;
 }

nav ul ul {
    display: none;
}
nav ul li:hover > ul {
    display: block;
}
nav ul{
    background: black; 
    padding: 0 20px;
    border-radius: 10px;  
    list-style: none;
    position: relative;
}
nav ul:after {
    content: ""; 
    clear: both; 
    display: block;
}
nav ul li {
    float: left;
}
.dropdown{
    float: right;
    margin-right: 5em;
}
nav ul li:hover {
    background: grey ;
}
nav ul li:hover a {
    color: white;
}
nav ul li a {
    display: block; 
    padding: 25px 40px;
    color: white; 
    text-decoration: none;
}
nav ul ul {
    background: black; 
    border-radius: 0px; 
    padding: 0;
    position: absolute; 
    top: 100%;
}
nav ul ul li {
    float: none; 
    position: relative;
}
nav ul ul li a {
    padding: 15px 40px;
    color: white;
}   
nav ul ul li a:hover {
    background: grey ;
}
h1{
    color:white;
}
    </style>
    </head>
    <body>
                <nav class="nav_bar">
    <div class="topnav">
        <ul class="navbar-item">
            <center><h1>Online Part Time Job</h1></center>
            <h3> <span id="Welcome" style="color:MintCream ">Welcome back<i><?php 
            if($login_session=='guest')
            {
                echo "";
            }else{
            echo ", " . $login_session;}
            ?>
        </i></span></h3>
<?php
            $session =mysqli_query($account, "select *from user where email='$user'");
            $row=mysqli_fetch_array($session);

            $member=$row['member'];
            if($member=='employer')
            {
                ?>
                <li class="active"><a href="postjob.php">Post Job</a></li>
                <li class="findjob"><a href="findjob.php">Find Job</a></li>
                <li class="dropdown"><a href="#">Setting</a>
                <ul class="dropdown-menu">
                    <li><a href="employerinfo.php">Persona</a></li>
                    <li><a href="message.php">My message</a></li>
                    <li><a href="deactivate.php">Deactivate</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
                <?php
            }else if($login_session=='guest')
            {?>
                <li class="active"><a href="home.php">Home</a><li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>

                <?php
            }else{
                ?>
                <li class="active"><a href="mainpage.php">Main Page</a></li>
                <li class="findjob"><a href="findjob.php">Find Job</a></li>
                <li class="dropdown"><a href="#">Setting</a>
                <ul class="dropdown-menu">
                    <li><a href="info.php">Persona</a></li>
                    <li><a href="applied.php">My applied job</a></li>
                    <li><a href="deactivate.php">Deactivate</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li><?php
            }
            ?>
          </ul> 
    </div>
</nav>
    </body>
    </html>
