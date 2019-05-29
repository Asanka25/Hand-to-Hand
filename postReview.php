<?php 
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'myweb');


//$customer_name=$_GET['customer_name'];



$review=$_GET['review'];
$date=date("Y-m-d");
$to=$_SESSION["To"];
$by=$_SESSION["By"];
$review=$_GET["review"];
$save="INSERT INTO `review`(`To`, `By`, `review`, `date`) VALUES ('$to','$by','$review','$date')";
mysqli_query($con,$save);
header("location:review1.php?To=$to");
 


?>
