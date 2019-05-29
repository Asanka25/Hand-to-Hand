<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$name =  $_SESSION['loginUser'];
$sql = "select * from usertable where name = '$name' or email = '$name' ";

$result = $conn->query($sql);

$row = $result->fetch_assoc() ;
$profileName =  $row["name"];

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="homee.css">
  <title>Home</title>
</head>
<body>

<div class="header">
  <div class="header-right">
    <img src="usernameIcon.png" width="35px" height="35px" alt="">
    <a id = "idProfileName"  href=""><?php echo $profileName ?></a>
    <div class="navBar">
        <a class="active" href="home.php">Home</a>
        <a class="#contact" href="http://localhost/Tutorial/myWeb/ContactFrom_v15/index.html">Contact</a>
        <a href="about.php">About</a>
        <a href=""> <img src="logoutIcon.png"  width="30px" height="30px" alt=""></a>
    </div>
    </div>
</div>
<div class="box">
  <span></span>
    <span></span>
    <span></span>
    <span></span>
  <div class="btn1">
<button type="button" onclick="window.location.href=''">Search for a Job</button>
</div>
<div class="btn2">
<button type="button" onclick="window.location.href='myprogess.php'">My Progress</button>
  </div>
</div>

    
</div>



</body>
</html>
</html>