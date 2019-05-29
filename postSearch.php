<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myweb";

$searchData = $_POST["search"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name =  $_SESSION['loginUser'];
$sql2 = "select * from usertable where name = '$name' or email = '$name' ";

$result2 = $conn->query($sql2);

$row2 = $result2->fetch_assoc() ;
$profileName =  $row2["name"];


$sql = "SELECT id, name, email, mnum, Job, Pay, location, details FROM post 
        where name like '%$searchData%' or 
        email like '%$searchData%' or
        mnum like '%$searchData%' or
        Job like '%$searchData%' or
        pay like '%$searchData%' or
        location like '%$searchData%' " ;
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
            <input type="text" placeholder="Search..." name="search">
            <button type="submit"><img src="images/searchIcon.png" alt="" srcset=""></button>
        </form>
    </div>
    <div class="verticalMenu">
        <a href="http://localhost/Tutorial/myWeb/postfeed.php" class="active">PostFeed</a>
        <a href="myposts.php">My Posts</a>
        <a href="http://localhost/Tutorial/myWeb/post.php">Post a Job</a>
        <a href="#">Rating</a>
        <a href="#">Account Info</a>
        <a href="http://localhost/Tutorial/myWeb/Private Messaging System/index.php">Messenger</a>
    </div>
    
    
    <div class="container">
        <div class="takeToDown">
            <?php
                if ($result->num_rows > 0) {
            // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="onePost">
                        <div class="postHeader">
                            <img id="userIcon" src='images/userIconPosts.png' width='30px' height='30px' alt='Ishara'>
                            <?php echo $row['name']?>
                        </div> <br>
                        <div class='postContainer'>
                            <span>Looking for  &nbsp </span><b><u><?php echo $row["Job"]; ?> </u></b>  <br> <br>
                            <span>Job Details : </span><?php echo $row["details"]; ?> <br> <br>
                            <span>Payment : </span><b><u><?php echo $row["Pay"];?> </u></b><br> <br>
                            <span>Contact via : &nbsp <img src="images/phoneNumIcon.webp" width="25px" height="25px">    <?php echo $row["mnum"];?> 
                            &nbsp &nbsp &nbsp &nbsp<img src="images/emailIcon.jpg" width="25px" height="25px">&nbsp<?php echo  $row["email"]; ?></span> <br>
                            <br>
                            <img src="images/locationIcon.png" width="25px" height="25px"> <?php echo $row["location"];?> <br>
                             
                        
                        </div> <br>
                        <button title="Send Message" onclick="window.location.href='http://localhost/Tutorial/myWeb/Private Messaging System/index.php?name=<?php echo($row['name'])?>'"  class='btnJobApply' >Apply Now</button>
                        </div>
                        <?php
                        
                    }
                } else {
                    echo "No Job Posts Yet!";
                }
            ?>
        </div>
    </div>

   <script >
       function func(){
            alert("Call to Phone number of the Employer");
        }

        
   </script>
</body>
</html>