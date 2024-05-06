<?php
// Include the connection file
require_once "connection.php";

// Initialize the search input variable
$word = ""; 

if (isset($_POST['search'])) {// Check if the form is submitted
    // Assign the input value to the $word variable
    $word = $_POST['input'];
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $input = $_POST['input']; // Get the input value from the form
    
    // Construct the SQL query to search for races
    $sql = "SELECT * FROM races WHERE round LIKE '%$input%' OR circuit LIKE '%$input%' OR date LIKE '%$input%'";
   
    $result = $conn->query($sql); // Execute the query
    
    if ($result->num_rows > 0) { // Check if there are any results
        while($row = $result->fetch_assoc()) {// Loop through the results and display them
            echo "<p>Round: " . $row["round"]. " - Circuit: " . $row["circuit"]. " - Date: " . $row["date"]. "</p>";
        }
    } else {
        echo "0 results";  // If no results found, display a message
    }
}

// Close the database connection
$conn->close();
?>
