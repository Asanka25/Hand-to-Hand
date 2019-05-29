<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'myweb');

$user = $_SESSION['loginUser'];
$userPassword = $_SESSION['userPassword'];

$currentPassword = sha1($_POST['currentPassword']);
$newPassword = sha1($_POST['newPassword']);
$confirmNewPassword = sha1($_POST['confirmNewPassword']);

if($currentPassword == $userPassword){
    if($newPassword == $confirmNewPassword){
        $sql = "UPDATE usertable SET password='$newPassword' WHERE name = '$user'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert ('Password Changed successfully');
            window.location.href = 'accountinfo.php'</script>";
            $_SESSION['userPassword'] = $newPassword;
        } else {
            echo "Error updating record: " . $conn->error;
        }
        
    }else{
        echo "<script>alert ('Password Confirmation is Mismatch!');
        window.location.href = 'accountinfo.php'</script>";
        
    }
}else{
    echo "<script>alert ('Current Password entered is wrong!');
    window.location.href = 'accountinfo.php'</script>";

}




$conn->close();

?>