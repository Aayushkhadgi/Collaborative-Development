<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "Trek_Management"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // If connection fails, return JSON response with error message
    $response = array("error" => "Connection failed: " . $conn->connect_error);
    echo json_encode($response);
    exit(); // Terminate script execution
}

// SQL query to select all data from the Guides table
$sql = "SELECT Name, Description, Image FROM Guides";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Initialize an empty array to store the retrieved data
    $guides = array();

    // Fetch data from each row and store it in the $guides array
    while ($row = $result->fetch_assoc()) {
        $guides[] = $row;
    }

    // Convert the $guides array to JSON format and output it
    echo json_encode($guides);
} else {
    // If no results found, return JSON response with error message
    $response = array("error" => "No results found");
    echo json_encode($response);
}

// Close connection
$conn->close();
?>
