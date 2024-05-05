<?php
require_once "dbcon.php";

$word = ""; //for the search input

if (isset($_POST['search'])) { //when the form is submitted
    $word = $_POST['input'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST['input'];
    $sql = "SELECT * FROM races WHERE round LIKE '%$input%' OR circuit LIKE '%$input%' OR date LIKE '%$input%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p>Round: " . $row["round"]. " - Circuit: " . $row["circuit"]. " - Date: " . $row["date"]. "</p>";
        }
    } else {
        echo "0 results";
    }
}

$conn->close();
?>
 