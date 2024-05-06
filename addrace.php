<?php
require_once "connection.php";

$round = $_POST['round'];
$circuit = $_POST['circuit'];
$date = $_POST['date'];

$sql = "INSERT INTO races (round, circuit, date) VALUES ('$round', '$circuit', '$date')";

if ($conn->query($sql) === TRUE) {
    echo "Race added successfully!";
} else {
    echo  $conn->error;
}


$conn->close();
?>
 
