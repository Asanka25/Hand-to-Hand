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
$id=$_GET["id"];

$name =  $_SESSION['loginUser'];
$profileName=$name;
$sql2 = "select * from usertable where name = '$name' or email = '$name' ";

$result2 = $conn->query($sql2);

$row2 = $result2->fetch_assoc() ;

  $sql = "SELECT id, name, email, mnum, Job, Pay, location, details FROM post  where name  ='$name' and id='$id'";
  $result = $conn->query($sql);
  $row1 = $result->fetch_assoc() ;
  $email=$row1["email"];
  $mnum=$row1["mnum"];
  $job=$row1["Job"];
  $pay=$row1["Pay"];
  $location=$row1["location"];
  $details=$row1["details"];
  $conn->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/post.css">

    <title></title>
</head>
<body>
    
    <div class="header">
  <div class="header-right">
    <img src="images/usernameIcon.png" width="35px" height="35px" alt="">
    <a id = "idProfileName"  href=""><?php echo $profileName ?></a>
    <div class="navBar">
        <a class="" href="http://localhost/Tutorial/myWeb/mysql/home.php">Home</a>
        <a class="active" href="http://localhost/Tutorial/myWeb/postfeed.php">PostFeed</a>
        <a class="#contact" href="http://localhost/Tutorial/myWeb/ContactFrom_v15/index.php">Contact</a>
        <a href="http://localhost/Tutorial/myWeb/ContactFrom_v15/index.php">About</a>
        <a onclick="confirmLogout();"> <img src="images/logoutIcon.png" title="logout" width="30px" height="30px" alt=""></a>
    </div>
    </div>
</div>




  <div class="container"> 
  <form id="contact" action="postedited.php" method="post" >
    <h3>Edit Your Post</h3>
    <hr>
    <h4>Reference Number Of Your Post is :  <?php echo $id ?></h4>
    <fieldset>
      <input id="email" placeholder="Your Email Address" name="email" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input id="mnum" placeholder="Your Phone Number" minlength="10" name="mnum" type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input id="job" placeholder="What is the job?" name="job" type="text" tabindex="4" required>
    </fieldset>
    <fieldset>
      <input id="pay" placeholder="How much you will pay?" name="pay" type="text" tabindex="4" required>
    </fieldset>
    <fieldset>
      <input id="loc" placeholder="Your Location" type="text" name="location" tabindex="4" required>
    </fieldset>
    <fieldset>
      <textarea id="details" placeholder="Type Job Details" name="details" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <textarea style="display: none;" id="id" placeholder="id" name="id" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button  type="submit" id="contact-submit" data-submit="...Sending">Edit</button>
    </fieldset>
  </form>
</div>

<script>
   var email = " <?php echo $email ?> "; 
   document.getElementById("email").value=email;
   var mnum = " <?php echo $mnum ?> "; 
   document.getElementById("mnum").value=mnum;
   var job = " <?php echo $job ?> "; 
   document.getElementById("job").value=job;
   var pay = " <?php echo $pay ?> "; 
   document.getElementById("pay").value=pay;
   var details = " <?php echo $details ?> "; 
   document.getElementById("details").value=details;
   var loc = " <?php echo $location ?> "; 
   document.getElementById("loc").value=loc;
   var loc = " <?php echo $location ?> "; 
   document.getElementById("loc").value=loc;
   var id = " <?php echo $id ?> "; 
   document.getElementById("id").value=id;
   
</script>

</body>
</html>