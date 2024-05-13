<?php

// Database connection
$conn = new mysqli("localhost", "root", "", "contact");

// Check database connection
if ($conn->connect_error) die("Database connection failed: " . $conn->connect_error);
else echo "Database connected successfully.<br>";

// Check if form data has been submitted and is not empty
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert data into database
    $sql = "INSERT INTO `message` (`Name`, `Email`, `Subject`, `Message`) VALUES ('$name', '$email', '$subject', '$message')";
    if ($conn->query($sql)) echo "Message sent successfully";
    else echo "Error: " . $conn->error;
} else {
    // If form data is not submitted or incomplete
    echo "Error: Form data is not submitted or incomplete.";
}

// Close connection
$conn->close();

?>
