<?php

/*session_start();
session_destroy();
$_SESSION = array();
header("Location: login.php");
exit;*/

session_start();
if(isset($_SESSION['username'])){
    unset($_SESSION['username']);
    header("location:http://localhost/Tutorial/myWeb/firstpage.php");
}else{
    header("location:http://localhost/Tutorial/myWeb/firstpage.php");
}

?>