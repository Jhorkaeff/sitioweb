<?php
$servername = "localhost";
$username = "root";
$password = "MaY123aBc9994321cBaSa9";
$db = "sire";


    $con=@mysqli_connect($servername, $username, $password, $db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      echo "Connected successfully";
 
?>