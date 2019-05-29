<?php 
	session_start();
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'myweb');
	$name=$_POST['username'];
	$password=sha1($_POST['password']);
	$correct=1;
	if($_POST['cpassword']!=$_POST['password']){
		$correct=0;
	}
	$email=$_POST['email'];
	$mnum=$_POST['mnum'];
	$location=$_POST['location'];
	$s="select * from employeetable where name = '$name'";
	$s1="select * from employeetable where email = '$email'";
	$result=mysqli_query($con,$s);
	$result1=mysqli_query($con,$s1);
	$num=mysqli_num_rows($result);
	$num1=mysqli_num_rows($result1);
	if($num==1){
		header('location:error2.php');
	}
	else if ($num1==1){
		header('location:errore.php');
	}
	else if($correct==0){
		header('location:punmatch.php');
	}
	else{
		$reg="insert into employeetable(name , password , email , location, mnum) values ('$name' , '$password' ,  '$email','$location','$mnum')";
		mysqli_query($con,$reg);
		header('location:regsuccesse.php');
	}
 ?>
