<?php
session_start();
$id = $_SESSION['id'];

// Create connection
$conn = new mysqli('localhost', 'root', '', 'myweb');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$sql = "DELETE FROM post WHERE id='$id' ";

if ($conn->query($sql) === TRUE) {
    header("location:http://localhost/Tutorial/myWeb/postDeletedSuccess.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>