<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'myweb');
$name = $_SESSION['loginUser'];
$password = sha1($_POST['password']);

$sql = "SELECT id,password  FROM usertable where name='$name' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id =  $row["id"];
        $userPassword =  $row["password"];
    }
} else {
    echo "0 results";
}


if($password == $userPassword){
    $sql2 = "DELETE FROM usertable WHERE ID='$id'"; 
    
    if(mysqli_query($conn, $sql2)){ 
        unset($_SESSION['loginUser']);
        header("location:http://localhost/Tutorial/myWeb/firstpage.php");
    }  
    else{ 
        echo "ERROR: Could not able to execute $sql2. "  
                                       . mysqli_error($conn); 
    } 
}else{
    echo "<script>alert('Incorrect Password!!!');
            window.location.href = 'accountinfo.php';</script>";
}

//////////////////////////////////////////////////////
$sql2 = "SELECT id,password  FROM usertable where name='$name' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id =  $row["id"];
        $userPassword =  $row["password"];
    }
} else {
    echo "0 results";
}


if($password == $userPassword){
    $sql2 = "DELETE FROM usertable WHERE ID='$id'"; 
    
    if(mysqli_query($conn, $sql2)){ 
        unset($_SESSION['loginUser']);
        header("location:http://localhost/Tutorial/myWeb/firstpage.php");
    }  
    else{ 
        echo "ERROR: Could not able to execute $sql2. "  
                                       . mysqli_error($conn); 
    } 
}else{
    echo "<script>alert('Incorrect Password!!!');
            window.location.href = 'accountinfo.php';</script>";
}




$conn->close();

?>