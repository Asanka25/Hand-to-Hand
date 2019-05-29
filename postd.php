<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id=$_GET["id"];
$name=$_SESSION["loginUser"];
$sql = "DELETE FROM post WHERE id='$id' and name='$name'";


if ($conn->query($sql) === TRUE) {
	echo "<script>alert('Delete Successful!');
	window.location.href='myposts.php'</script>";
} else {
    echo "Error deleting record: Post Id Or Name is Incorrect" . $conn->error;
}

$conn->close();
?>