<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "Trek_Management"; // Replace with your database name

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM trek_destinations";
$result = $conn->query($sql);

// Initialize an empty array to store trek data
$trekData = array();

if ($result->num_rows > 0) {
    // Store trek data in the array
    while ($row = $result->fetch_assoc()) {
        $trekData[] = $row;
    }
}

// Close connection
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($trekData);
?>
