<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'myweb');

$name =  $_SESSION['loginUser'];
$sql2 = "select * from usertable where name = '$name' or email = '$name' ";

$result2 = $conn->query($sql2);

$row2 = $result2->fetch_assoc() ;
$profileName =  $row2["name"];
$_SESSION['username'] = $profileName;
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="assets/css/post.css">

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

    <div class="verticalMenu">
        <a href="http://localhost/Tutorial/myWeb/postfeed.php">PostFeed</a> <br>
        <a href="myposts.php">My Posts</a> <br>
        <a class="active" href="http://localhost/Tutorial/myWeb/post.php">Post a Job</a> <br>
        <a href="#">Rating</a> <br>
        <a href="accountinfo.php">Account Info</a> <br>
        <a href="http://localhost/Tutorial/myWeb/Private Messaging System/index.php">Messenger</a>
    </div>

<div class="container"> 
  <form id="contact" action="mysql/posts.php" method="post" >
    <h3>Post A Job</h3>
    <hr>
    <h4>Filled up the form with correct details</h4>
    <fieldset>
      <input placeholder="Your name" name="name" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" name="email" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number" minlength="10" name="mnum" type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="What is the job?" name="job" type="text" tabindex="4" required>
    </fieldset>
    <fieldset>
      <input placeholder="How much you will pay?" name="pay" type="text" tabindex="4" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Location" type="text" name="location" tabindex="4" required>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type Job Details" name="details" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>

<script>
  function confirmLogout() {
      if (confirm("Do you want to  Logout!")) {
          location.replace("http://localhost/Tutorial/myWeb/logout.php");
      } else {
          location.replace("http://localhost/Tutorial/myWeb/postfeed.php");;
      }
  }
</script>

</body>
</html>
