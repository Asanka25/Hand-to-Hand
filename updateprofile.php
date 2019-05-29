<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'myweb');
$name = $_SESSION['loginUser'];
$sql = "SELECT id, password FROM usertable where name='$name' ";
$result = $conn->query($sql);
$userPassword = $_SESSION['userPassword'];
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $userId = $row["id"];
    }
} else {
    echo "0 results";
}

///////////////////////////////////////////////////////////////////



$name2=$_POST['name'];
$password=sha1($_POST['password']);
$email=$_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$correct=1;


$s="select * from usertable where name = '$name2' and id!= '$userId' ";
$s1="select * from usertable where email = '$email' and id!= '$userId'  ";
$result=mysqli_query($conn,$s);
$result1=mysqli_query($conn,$s1);
$num=mysqli_num_rows($result);
$num1=mysqli_num_rows($result1);
if($num==1){
    echo "<script type='text/javascript'>alert('Username Already Taken!');
    window.location.href = 'accountinfo.php'</script>";
}
else if ($num1==1){
    echo "<script type='text/javascript'>alert('Email Already Taken!');
    window.location.href = 'accountinfo.php';</script>";
}

else if($password == $userPassword){
    $reg = "UPDATE usertable SET name='$name2', email = '$email', phonenumber='$phoneNumber' WHERE id='$userId'";
    $_SESSION['loginUser'] = $name2;
    mysqli_query($conn,$reg);
    echo "<script type='text/javascript'>alert('Details Updated!');
    window.location.href = 'accountinfo.php'</script>";
}
else{
    echo "<script type='text/javascript'>alert('Wrong Password!');
    window.location.href = 'accountinfo.php'</script>";
}




?>