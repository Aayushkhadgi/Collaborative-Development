<?php
// Establish a connection to the database
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "Trek_Management"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// Query to check if the username and password match the admin credentials in the database
$sql = "SELECT * FROM admin WHERE Username='$username' AND Password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // If the query returns one row, it means the login credentials are correct
    // Redirect the user to the admin panel
    header("Location: adminpanel.html");
} else {
    // If the query returns no rows, it means the login credentials are incorrect
    // Trigger an alert message
    echo '<script>alert("Invalid username or password.");</script>';
}

$conn->close();
?>
