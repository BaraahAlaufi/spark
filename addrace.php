<?php
// Include the connection file
require_once "connection.php";

// Get the round, circuit, and date values from the POST request
$round = $_POST['round'];
$circuit = $_POST['circuit'];
$date = $_POST['date'];

// Construct the SQL query to insert a new race into the database
$sql = "INSERT INTO races (round, circuit, date) VALUES ('$round', '$circuit', '$date')";

// Execute the SQL query and check if it was successful
if ($conn->query($sql) === TRUE) {
    // If successful, display a success message
    echo "Race added successfully!";
} else {
    echo  $conn->error;// If an error occurred, display the error message
}

// Close the database connection
$conn->close();
?>
