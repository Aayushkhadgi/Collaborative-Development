<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Record"; // Replace 'Record' with the actual name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data has been submitted and is not empty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check for required fields
    if(isset($_POST['fullName'], $_POST['email'], $_POST['phoneNum'], $_POST['birthDate'], $_POST['address1'], $_POST['country'], $_POST['city'], $_POST['region'], $_POST['Trek'], $_POST['package'], $_POST['postalCode'], $_POST['extraFacilities'])) {
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $phoneNum = intval($_POST['phoneNum']); // Convert to integer
        $birthDate = $_POST['birthDate'];
        $gender = isset($_POST['gender']) ? $_POST['gender'] : ''; // Handle gender radio button
        $address1 = $_POST['address1'];
        $address2 = isset($_POST['address2']) ? $_POST['address2'] : ''; // Optional field
        $country = isset($_POST['country']) ? $_POST['country'] : ''; // Corrected syntax
        $city = $_POST['city'];
        $region = $_POST['region'];
        $Trek = $_POST['Trek'];
        $package = $_POST['package'];
        $postalCode = intval($_POST['postalCode']); // Convert to integer
        $extraFacilities = $_POST['extraFacilities']; // Corrected syntax

        // Prepare and bind SQL statement
        $sql = "INSERT INTO Registration (fullName, email, phoneNum, birthDate, gender, address1, address2, country, city, region, Trek, package, postalCode, extraFacilities) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisssssssssis", $fullName, $email, $phoneNum, $birthDate, $gender, $address1, $address2, $country, $city, $region, $Trek, $package, $postalCode, $extraFacilities);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        // If required form data is incomplete
        echo "Error: Required form data is incomplete.";
    }
} else {
    // If form data is not submitted
    echo "Error: Form data is not submitted.";
}

// Close connection
$conn->close();
?>
