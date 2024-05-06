<?php
// Include the connection file
require_once "connection.php";

// Get the round value from the POST request
$round = $_POST['round1'];

// Construct the SQL query to delete a race with the specified round
$sql = "DELETE FROM races WHERE round = '$round'";

// Execute the SQL query and check if it was successful
if ($conn->query($sql) === TRUE) {
    echo "Race deleted successfully!";  // If successful, display a success message
} else {  
    echo  $conn->error; // If an error occurred, display the error message
}

// Close the database connection
$conn->close();
?>
