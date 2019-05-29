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
$sql2 = "SELECT * from usertable where name = '$name' or email = '$name' ";

$result2 = $conn->query($sql2);

$row2 = $result2->fetch_assoc() ;
$profileName =  $row2["name"];
$_SESSION['username'] = $profileName;


$sql = "SELECT id, name, email, mnum, Job, Pay, location, details FROM post ORDER BY id DESC ";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="postfeedCSS.css">
    <title></title>
</head>
<body>
    
    <div class="header">
        <div class="header-right">
            <img src="images/usernameIcon.png" width="35px" height="35px" alt="">
            <a href="http://localhost/Tutorial/myWeb/accountinfo.php" id = "idProfileName"  href=""><?php echo $profileName ?></a>
            <div class="navBar">
                <a class="" href="http://localhost/Tutorial/myWeb/mysql/home.php">Home</a>
                <a class="active" href="http://localhost/Tutorial/myWeb/postfeed.php">PostFeed</a>
                <a class="#contact" href="http://localhost/Tutorial/myWeb/ContactFrom_v15/index.php">Contact</a>
                <a href="about.php">About</a>
                <a onclick="confirmLogout();"> <img src="images/logoutIcon.png" title="logout" width="30px" height="30px" alt=""></a>
            </div>
        </div>
    </div>
    <div class="searchContainer">
        <form action="postSearch.php" method="POST">
            <input type="text" placeholder="Search..." name="search" minlength="4" required>
            <button type="submit"><img src="images/searchIcon.png" alt="" srcset=""></button>
        </form>
    </div>
    <div class="verticalMenu">
        <a href="http://localhost/Tutorial/myWeb/postfeed.php" class="active">PostFeed</a>
        <a href="myposts.php">My Posts</a>
        <a href="http://localhost/Tutorial/myWeb/post.php">Post a Job</a>
        <a href="#">Rating</a>
        <a href="accountinfo.php">Account Info</a>
        <a href="http://localhost/Tutorial/myWeb/Private Messaging System/index.php">Messenger</a>
    </div>
    
    <!--<div class="container">
        <div id="idOnePost" class="onePost">
            <?php
            //    if ($result->num_rows > 0) {
            // output data of each row
            //        while($row = $result->fetch_assoc()) {
            //            echo "<img src='userIconPosts.png' width='30px' height='30px' alt='Ishara'>"."       "
            //            ."<span class='usernameClass'>" .$row["name"] .'</span>'."<br> <br>"
            //           ."Email : ". $row["email"]."<br>"
            //            ."Phone Number : ". $row["mnum"]."<br>" 
            //            ."Job : ".$row["Job"]."<br>"
            //            ."Payment : ".$row["Pay"]."<br>"
            //            ."Location : ".$row["location"]."<br>"
            //            ."Job Details : ".$row["details"]."<br><br>"
            //            ."<button  class='btnJobApply' onclick='func();'>Apply For The Job</button>". "<br><br> <hr>";
            //        }
            //    } else {
            //        echo "No Job Posts Yet!";
            //    }
            ?>
        </div>
    </div>-->

    <div class="container">
        <div class="takeToDown">
            <?php
                if ($result->num_rows > 0) {
            // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <?php 
                        $_SESSION['id'] = $row['id']; 
                        $_SESSION['name'] = $row['name'];
                        ?>
                        <div class="onePost">
                        <div title="Send message..." style="cursor:pointer;" onClick="getValue();"  class="postHeader">
                            <img id="userIcon" src='images/userIconPosts.png' width='30px' height='30px' alt='Ishara'>
                            <?php echo $row['name']?>
                            
                        </div> <br>
                        <div class='postContainer'>
                            <span>Looking for  &nbsp </span><b><u><?php echo $row["Job"]; ?> </u></b>  <br> <br>
                            <span>Job Details : </span><?php echo $row["details"]; ?> <br> <br>
                            <span>Payment : </span><b><u><?php echo $row["Pay"];?> </u></b><br> <br>
                            <span>Contact via : &nbsp <img src="images/phoneNumIcon.webp" width="25px" height="25px">    <?php echo $row["mnum"];?> 
                            &nbsp &nbsp &nbsp &nbsp<img src="images/emailIcon.jpg" width="25px" height="25px">&nbsp <u><?php echo  $row["email"]; ?></u></span> <br>
                            <br>
                            <img src="images/locationIcon.png" width="25px" height="25px">&nbsp<?php echo $row["location"];?> <br>
                             
                        
                        </div> <br>
                        <button title="Send Message" onclick="window.location.href='http://localhost/Tutorial/myWeb/Private Messaging System/index.php?name=<?php echo($row['name'])?>'"  class='btnJobApply' >Apply Now</button>
                        <a href="review1.php?To=<?php echo($row['name']);?>">Review</a>
                        </div>
                        <?php
                        
                    }
                } else {
                    echo "No Job Posts Yet!";
                }
            ?>
        </div>
    </div>
    Private%20Messaging%20System/index.php
    

   <script >
       
        function confirmLogout() {
            if (confirm("Do you want to  Logout!")) {
                location.replace("http://localhost/Tutorial/myWeb/logout.php");
            }
        }


   </script>
</body>
</html>