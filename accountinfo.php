<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'myweb');

$name =  $_SESSION['loginUser'];

$sql = "SELECT name, email, phonenumber FROM usertable where name = '$name'";
$result = $conn->query($sql);


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="accountinfoCSS.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="header-right">
            <img src="images/usernameIcon.png" width="35px" height="35px" alt="">
            <a id = "idProfileName"  href=""><?php echo $name ?></a>
            <div class="navBar">
                <a class="" href="http://localhost/Tutorial/myWeb/mysql/home.php">Home</a>
                <a href="http://localhost/Tutorial/myWeb/postfeed.php">PostFeed</a>
                <a class="#contact" href="http://localhost/Tutorial/myWeb/ContactFrom_v15/index.php">Contact</a>
                <a href="about.php">About</a>
                <a onclick="confirmLogout();"> <img src="images/logoutIcon.png" title="logout" width="30px" height="30px" alt=""></a>
            </div>
        </div>
    </div>
    <div class="verticalMenu">
        <a href="http://localhost/Tutorial/myWeb/postfeed.php">PostFeed</a>
        <a href="myposts.php">My Posts</a>
        <a href="http://localhost/Tutorial/myWeb/post.php">Post a Job</a>
        <a href="#">Rating</a>
        <a href="accountinfo.php"  class="active">Account Info</a>
        <a href="http://localhost/Tutorial/myWeb/Private Messaging System/index.php">Messenger</a>
    </div>
    <div class='container'>
            <div class=leftCol>
                <div class='profileImage'>
                    <img src="images/userIconPosts.png" alt="" height="200px" width="200px"> <br>
                </div>
                <div class='username'> <?php echo $name?> </div>
                <button onclick="confirmLogout();" id='signOutBtn'>Sign Out</button>
                <div class="profileDetails">
                    <?php
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <img src="images/emailIcon.jpg" alt="" width="25px" height="25px"> &nbsp
                            <?php
                            $name = $row["name"];
                            $email = $row["email"];
                            echo  $row["email"];
                            ?>
                            <hr> 
                            <img src="images/phoneNumIcon.webp" alt="" width="25px" height="25px">&nbsp
                            <?php 
                            $phoneNumber = $row["phonenumber"];
                            echo $row["phonenumber"];
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                    <hr>
                </div> 
                <div class="changePassword"> <a href="" onclick="document.getElementById('changePasswordPrompt').style.display='block';return false;"> Change Password? </a>  </div> 
                <br>
                <div class='deleteAccount'> <a href="" onclick="document.getElementById('deleteAccountPrompt').style.display='block';return false;" > <b>Delete Account? </b> </a> </div>
            </div>
        <div class=rightCol>
            <h1>My Profile</h1> <br>
            <form action="updateprofile.php" method="POST">
                <label class='inputLabel' for="">Name :</label> <br>
                <input class='profileInput' id='name' type="text" name="name" id="name" value="<?php echo $name;?>" required > <br> <br>
                <label class='inputLabel'  for="">Email :</label> <br>
                <input class='profileInput' id='email' type="text" name = 'email' id='email' value="<?php echo $email;?>" required> <br> <br>
                <label class='inputLabel'  for="">Phone Number :</label> <br>
                <input class='profileInput' id='phoneNumber' type="text" name='phoneNumber' id='phoneNumber' value="<?php echo $phoneNumber;?>" required> <br> <br>
                <label class='inputLabel'  for="">Password :</label> <br>
                <input class='profileInput' id='phoneNumber' type="password" name='password' id='password' placeholder='Password...' required> <br> 
                <button type="submit" class="button" style="vertical-align:middle"><span>Save Profile Details &#8594;</span></button>

            </form>

        </div>
        <div id="changePasswordPrompt" class='changePasswordPrompt'>
            <h2 align="center">Change Password <img src="images/closeIcon.jpg" onclick="document.getElementById('changePasswordPrompt').style.display='none';return false;"   alt="" width="20px" height="20px"></h2> 
            <form action="changepassword.php" method="post">
                <input type="password" placeholder='Current password' name='currentPassword' required> <br>
                <input type="password" placeholder='New Password' name='newPassword' minlength="6" required> <br>
                <input type="password" placeholder='Confirm New Password' name='confirmNewPassword' required> <br> <br>
                <button class='form-submit-button' type="submit">Submit</button>
            </form>
        </div>

        <div id='deleteAccountPrompt' class='deleteAccountPrompt'>
            <h3><img src="images/warningIcon.png" alt="" width="30px" height="30px"> Are you sure you want to deactivate  <br> your Hand to Hand Account?  </h3>
            <ul>
                <li>Deactivate will be immediate</li>
                <li>You won't be able to log into Hand to Hand anymore</li>
                <li>You'll lose access to all your Hand to Hand documents and conversations</li>
                <li>Only administrator will be able to restore your access</li>
            </ul>
            <h4>To confirm, please type your password</h4>
            <form class="deleteAccountForm" action="deleteaccount.php" method="post">
                <input name='password' type="password" required>
                <hr>
                <button id='deactivateBtn' type="submit">Deactivate</button>
            </form> 
                <button id='cancelBtn' onclick="document.getElementById('deleteAccountPrompt').style.display='none';return false;">Cancel</button>
        </div>
    </div>
    
    <script>
        function confirmLogout() {
            if (confirm("Do you want to  Logout!")) {
                location.replace("http://localhost/Tutorial/myWeb/logout.php");
            }
        }
    </script>
    
</body>
</html>

