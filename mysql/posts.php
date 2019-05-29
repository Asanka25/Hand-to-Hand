<?php 
	session_start();
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'myweb');
	$prifileName = $_SESSION['username'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mnum=$_POST['mnum'];
	$job=$_POST['job'];
	$pay=$_POST['pay'];
	$location=$_POST['location'];
	$details=$_POST['details'];
	$save="insert into post(name,email,mnum,job,pay,location,details) values ('$prifileName','$email','$mnum','$job','$pay','$location','$details')";
	mysqli_query($con,$save);
	header('location:postsuccess.php');
	
 ?>
