<?php 

include "des.php";
$key = bin2hex("ABCDEFGH");

session_start();
$servername="localhost";
$username="root";
$password="";
$db="mydb";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$text = encryptText(bin2hex($_POST["text"]), $key);
$id = $_SESSION["userid"];

$sql = "INSERT INTO notes VALUES ('".$text."', sysdate(), '".$id."');";
if ($conn->query($sql) === TRUE) {
    echo "<br><p align='center'>Note Added Succesfully!!! <a href='note.php'>Click here</a> to take a note again</p><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
