<?php session_start(); 
        if(isset($_POST["logout"])){
            session_unset();  
            session_destroy();
             header('location: index.html');
        }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>
            
        </title>
    </head>
    <body>
    	<div class="form">
            <br><label>Hello, <?php echo $_SESSION["name"]; ?>.</label><br>
            <br><label style="font-size: 25px">Here are your notes!</label><br>
            <table border="1" align="center" width="1000" >
                <tr>
                <th>Date</th>
                <th>Note</th>
                </tr>
            <?php
                include "des.php";
                $key = bin2hex("ABCDEFGH");

                $conn = new mysqli("localhost", "root", "", "mydb");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                $sql = "SELECT date, note FROM notes where userid= ".$_SESSION["userid"].";";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".trim(hex2bin(decryptText($row['note'], $key)))."</td>";
                        echo "</tr>";
                    }
                }
                $conn->close();
            ?>
            </table>
             <br><label style="font-size: 25px">Click <a href="note.php">here</a> to go back</label><br >
    </body>
</html>
