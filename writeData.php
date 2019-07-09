<?php 
session_start();
$servername="localhost";
$username="root";
$password="mysql";
$db="db";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$text = $_POST["text"];

$sql = "INSERT INTO notes VALUES ('".$text."', sysdate(), '".$_SESSION["userid"]."');";
if ($conn->query($sql) === TRUE) {
    echo "<br><p align='center'>Note Added Succesfully!!! <a href='note.php'>Click here</a> to take a note again</p><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
