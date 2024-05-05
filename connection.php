<?php
$conn = new mysqli("localhost", "root", "", "mysql"); //connecting to database
if ($conn->connect_error) { //check connection
    die("connection failed: " . $conn->connect_error); //close the PHP tag
}
?>
 