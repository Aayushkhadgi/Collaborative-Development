<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Replace with your actual MySQL username
$password = ""; // Replace with your actual MySQL password
$dbname = "Trek_Management"; // Replace with your actual MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select data from the Guides table
$sql = "SELECT Name, Description FROM Guides";
$result = $conn->query($sql);

// Initialize an empty array to store guides data
$guidesData = array();

if ($result->num_rows > 0) {
    // Store guides data in the array
    while ($row = $result->fetch_assoc()) {
        $guidesData[] = $row;
    }
    // Output guides data as JSON
    echo json_encode($guidesData);
} else {
    // If no results found, return JSON response with error message
    $response = array("error" => "No results found");
    echo json_encode($response);
}

// Close connection
$conn->close();
?>
