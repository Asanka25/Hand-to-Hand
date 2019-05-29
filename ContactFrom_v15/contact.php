<?php 
	session_start();
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'myweb');
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$message=$_POST['message'];
	$save="insert into contact(name,email,phone,message) values ('$name','$email','$phone','$message')";
	mysqli_query($con,$save);
	header('location:index.html');
	
 ?>
