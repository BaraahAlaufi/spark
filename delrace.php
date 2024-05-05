<?php
require_once "dbcon.php";

$round = $_POST['round1'];
$sql = "DELETE FROM races WHERE round = '$round'";

if ($conn->query($sql) === TRUE) {
    echo "Race deleted successfully!";
} else {
    echo  $conn->error;
}


$conn->close();
?>
 