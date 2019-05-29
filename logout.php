<?php
/*session_start();
session_destroy();
$_SESSION = array();
header("Location: http://localhost/Tutorial/myWeb/firstpage.php");
exit;*/


session_start();
if(isset($_SESSION['loginUser'])){
    unset($_SESSION['loginUser']);
    header("location:http://localhost/Tutorial/myWeb/firstpage.php");
}else{
    header("location:http://localhost/Tutorial/myWeb/firstpage.php");
}
?>

