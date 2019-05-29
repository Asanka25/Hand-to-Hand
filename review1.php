<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myweb";

// Create connection
$to=$_GET['To'];

$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$by =  $_SESSION['username'];

//$sql2 = "select * from employeetable where name = '$name' or email = '$name' ";
//$result2 = $conn->query($sql2);
//$row2 = $result2->fetch_assoc() ;
//$profileName =  $row2["name"];
$con->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="review1CSS.css">
    <title></title>
</head>
<body>
    <div class="header">
  <div class="header-right">
    <img src="images/usernameIcon.png" width="35px" height="35px" alt="">
    <a id = "idProfileName"  href=""><?php echo $by ?></a>
    <div class="navBar">
        <a class="" href="http://localhost/Tutorial/myWeb/mysql/home.php">Home</a>
        <a class="active" href="http://localhost/Tutorial/myWeb/postfeed.php">PostFeed</a>
        <a class="#contact" href="http://localhost/myWeb/ContactFrom_v15/index.php">Contact</a>
        <a href="about.php">About</a>
        <a onclick="confirmLogout();"> <img src="logoutIcon.png" title="logout" width="30px" height="30px" alt=""></a>
    </div>
    </div>
</div>
    <div class="searchContainer">
        <form action="postSearch.php" method="POST">
            <input type="text" placeholder="Search..." name="search" required>
            <button type="submit"><img src="images/searchIcon.png" alt="" srcset=""></button>
        </form>
    </div>
    <div class="verticalMenu">
        <a href="#" class="active">PostFeed</a>
        <a href="#">My Post</a>
        <a href="#">Post a Job</a>
        <a href="#">Account Info</a>
        <a href="#">Messenger</a>
    </div>
    
    <div class="container">
        <div class='takeToDown'>
        <div id="idOnePost" class="onePost">
            <?php

            require_once('include/connection.php');




$sql = "SELECT  *FROM review ";
            $result_set = mysqli_query($con, $sql);
            //$row = mysqli_fetch_assoc($result_set);
            //echo $row2['name'];
            //echo $result["name"];
            //$a=10;
            if(true){
            // output data of each row
        
                    while($row = mysqli_fetch_assoc($result_set)) {
                        
                        
                        echo "<span class='usernameClass'>"  .'</span>'."<br> <br>"
                        . $row["review"]."<br> <br>"
                        ."By : ". $row["By"]."<br>" 
                        .$row["date"]."<br><br>"
                        . "<br> <hr>";
                
                    }
                } else {
                    echo "No Job Posts Yet!";
                }
            echo "<button onclick=\"document.getElementById('modal-wrapper').style.display='block'\" style=\"width:150px; background-color:light blue;margin-top:20px; margin-left:260px;\">
            Add Review</button>";
            ?>
        </div>
        </div>
    </div>
    

   <script >
       function func(){
            alert("Call to Phone number of the Employer");
        }

        function confirmLogout() {
            if (confirm("Do you want to  Logout!")) {
                location.replace("http://localhost/myWeb/logout.php");
            }
        }
   </script>





<?php 

$_SESSION["By"] = $by;
$_SESSION["To"] = $to;?>

<div id="modal-wrapper" class="modal">
  
  <form class="modal-content animate" action="postReview.php?a=2">
        
    
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="review.jpg" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Add review</h1>
    </div>


    <div class="container2">
      <input type="text" placeholder="Type here" name="review">
             
      
      <button onclick="window.location.href = '123.php';">Post Review</button>
      
    </div>
    
  </form>
  
</div>









<style>
*{margin:0px; padding:0px; font-family:Helvetica, Arial, sans-serif;}

/* Full-width input fields */
input[type=text] {
    width: 90%;
    height:55%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
    
}

/* Set a style for all buttons */
button {
    background-color:rgb(67, 54, 122);
    color: white;
    padding: 10px 20px;
    margin: 10px 30px 5px 180px;
    border: none;
    cursor: pointer;
    width: 40%;
	font-size:20px;
}
button:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 0 0;
    position: relative;
    height:30%;
   

}
.avatar {
    width: 100px;
	height:100px;
    border-radius: 50%;
  
}

/* The Modal (background) */
.modal {
	display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0%;
    width: 100%;
    height: 100%;
    overflow: auto;
    border:2px bold black;
    background-color: rgba(0,0,0,0.4);
    

}
.container2{
    margin:55px 0px 0px 0px;
    height:50%;


}
/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 40%;
    height:50%; 
    padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    animation: zoom 0.6s
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
</style>



<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>