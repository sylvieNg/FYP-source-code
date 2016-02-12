<?php
include ('database.php');
include ('session.php');
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
                <li class="dropdown"><a href="#">Setting</a>
                <ul class="dropdown-menu">
                    <li><a href="employerinfo.php">Persona</a></li>
                    <li><a href="#">My feedback</a></li>
                    <li><a href="message.php">My message</a></li>
                    <li><a href="#">Deactivate</a></li>
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
                <li class="dropdown"><a href="#">Setting</a>
                <ul class="dropdown-menu">
                    <li><a href="info.php">Persona</a></li>
                    <li><a href="applied.php">My reputation</a></li>
                    <li><a href="#">My applied job</a></li>
                    <li><a href="#">Deactivate</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li><?php
            }
            ?>
          </ul> 
    </div>
</nav>
<div class="container">
<div class="left">
        <form method ="post" action="fileupload.php" enctype="multipart/form-data">
            <h3>Resume Upload</h3>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br><br>
            <input type="submit" value="Upload Resume" name="submit">
        </form>
    </div>
</div>
</body>
</html>