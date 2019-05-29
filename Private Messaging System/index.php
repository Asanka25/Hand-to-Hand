<?php
    session_start();
    if(isset($_SESSION['username'])){
        //echo $_SESSION['username'];
        
    }else{
        header ("location:login.php");
    }
    if(isset($_GET['name'])){
        $senderName = $_GET['name'];
    }
    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        <?php require_once("subfile/style.php")?>
        
    </style>
</head>
<body>
    <?php require_once('subfile/newmessage.php')?>
    <div id='container'>
        <div id='menu'>
        <img onclick='location.href = "http://localhost/Tutorial/myWeb/postfeed.php"' 
                    src="images/closeIcon.jpg" style="border-radius:100%;float:right; cursor:pointer;" 
                    width="22px" height="22px" alt="closeIcon">
            <?php 
            echo $_SESSION['username'];
            //echo '<a style="float:right; color:white; margin-right:7px;" href="logout.php">Logout</a>';
            ?> 
            
        </div>
        <div id="leftCol">
            <?php require_once("subfile/leftcol.php")?>
        </div>
        <div id="rightCol">
            <?php require_once('subfile/rightcol.php')?>
        </div>
    </div>

 
</body>

<script>
    var senderName = "<?php echo $senderName?>";
    if(senderName!=""){
        document.getElementById('username').value = senderName;
        checkInDb();
        document.getElementById('newMessage').style.display = "block";
    }
    
</script>
</html>