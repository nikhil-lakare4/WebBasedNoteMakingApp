<?php session_start(); ?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>
            
        </title>
    </head>
    <body>
    	<div class="form">
        <form method="post" action="writeData.php">
            <label>Hello, <?php echo $_SESSION["name"]; ?>.</label><br><br>
            <textarea name="text" cols="50" rows="5" placeholder="Type your note here....." required></textarea><br>
            <br><input type="submit" name="add" value="Add A Note" class="formbutton"><br>
        </form>
        <form method="post" action="loadNotes.php">
             <br><input type="submit" name="view" value="View Your Notes" class="formbutton"><br>
             <br><input type="submit" name="logout" value="Logout" class="formbutton"><br>
        </form>
    </body>
</html>
