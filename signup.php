<?php

include "des.php";
$key = bin2hex("ABCDEFGH");

$servername="localhost";
$username="root";
$password="";
$db="mydb";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name = encryptText(bin2hex($_POST["name"]), $key);
$uname = encryptText(bin2hex($_POST["username"]), $key);
$pass = encryptText(bin2hex($_POST["password"]), $key);
$contact = encryptText(bin2hex($_POST["contact"]), $key);


$sql = "INSERT INTO userinfo(NAME, USERNAME, PASSWORD, CONTACT) VALUES ('".$name."', '".$uname."', '".$pass."', '".$contact."');";

if ($conn->query($sql) === TRUE) {
    echo "<br><p align='center'>Sign Up Successfull!!! <a href='index.html'>Click here</a> to login</p><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
