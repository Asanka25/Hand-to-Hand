<?php 
	session_start();
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'myweb');
	$name=$_POST["username"];
	$password=sha1($_POST["password"]);
	$s="select * from employeetable where name = '$name' && password='$password'";
	$s1="select * from employeetable where email = '$name' && password='$password'";
	$result=mysqli_query($con,$s);
	$result1=mysqli_query($con,$s1);
	$num=mysqli_num_rows($result);
	$num1=mysqli_num_rows($result1);
	if($num==1){
		header('location:homee.php');
	}
	else if($num1==1){
		header('location:homee.php');
	}
	else{
		header('location:errore3.php');
		
	}
 ?>
