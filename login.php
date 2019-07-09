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

$uname=$_POST["username"];
$pass=$_POST["password"];

$sql = "SELECT userid, name, password FROM userinfo where username = '".$uname."';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if($row["password"] == $pass) {
        $_SESSION["userid"] = $row["userid"];
        $_SESSION["name"] = $row["name"];
        header('location: note.php');
    }
    else{
    	echo "<br><p align='center'>Incorrect Password!!! :(</p><br>";
        session_unset();  
        session_destroy(); 
    }
} else {
    echo "<br><p align='center'>User Not Found :(</p><br>";
    session_unset();  
    session_destroy(); 
}
$conn->close();
?>