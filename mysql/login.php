<?php 
	session_start();
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'myweb');
	$name=$_POST["username"];
	$_SESSION["loginUser"] = $name;
	$password=sha1($_POST["password"]);
	$_SESSION['userPassword'] = $password;
	$s="select * from usertable where name = '$name' && password='$password'";
	$s1="select * from usertable where email = '$name' && password='$password'";
	$result=mysqli_query($con,$s);
	$result1=mysqli_query($con,$s1);
	$num=mysqli_num_rows($result);
	$num1=mysqli_num_rows($result1);
	if($num==1){
		header('location:home.php');
	}
	else if($num1==1){
		header('location:home.php');
	}
	else{
		header('location:errorlogin.php');
		
	}
 ?>
