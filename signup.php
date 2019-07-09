<?php

$servername="localhost";
$username="root";
$password="mysql";
$db="db";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name=$_POST["name"];
$uname=$_POST["username"];
$pass=$_POST["password"];
$contact=$_POST["contact"];

$sql = "INSERT INTO userinfo(NAME, USERNAME, PASSWORD, CONTACT) VALUES ('".$name."', '".$uname."', '".$pass."', '".$contact."');";

if ($conn->query($sql) === TRUE) {
    echo "<br><p align='center'>Sign Up Successfull!!! <a href='index.html'>Click here</a> to login</p><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>