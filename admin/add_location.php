<?php
// Database connection setup (replace with your actual credentials)
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your actual password
$dbname = "Trek_Management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for alert message
$addSuccess = false;
$addMessage = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Escape user inputs for security
  $locationName = $conn->real_escape_string($_POST['locationName']);
  $locationDescription = $conn->real_escape_string($_POST['locationDescription']);
  $package = $conn->real_escape_string($_POST['package']);

  // Initialize image variables
  $imageFileName = "";
  $paramTypes = "isss"; // Initial types for id, Name, description, package_id

  // Handle image upload if necessary
  if ($_FILES['locationImage']['name'] != '') {
    $target_dir = "C:/xampp/htdocs/Trek Management System/admin/uploads/";
    $target_file = $target_dir . basename($_FILES["locationImage"]["name"]);

    // Check if the directory exists or create it
    if (!is_dir($target_dir)) {
      mkdir($target_dir, 0755, true); // Create directory with appropriate permissions
    }

    // Move uploaded file to target directory
    if (move_uploaded_file($_FILES["locationImage"]["tmp_name"], $target_file)) {
      $imageFileName = basename($_FILES["locationImage"]["name"]); // Store only the file name
      $paramTypes .= "s"; // Add 's' for image file name to parameter types
    } else {
      die("Sorry, there was an error uploading your file.");
    }
  }

  // Get the current max ID from Trek_Destinations table
  $sql_max_id = "SELECT MAX(id) as max_id FROM Trek_Destinations";
  $result_max_id = $conn->query($sql_max_id);
  $row_max_id = $result_max_id->fetch_assoc();
  $next_id = $row_max_id['max_id'] + 1; // Calculate next ID starting from max + 1

  // Prepare SQL insert statement using prepared statement for security
  $sql = "INSERT INTO Trek_Destinations (id, Name, description, package_id";

  // Append image column if image was uploaded
  if ($imageFileName != "") {
    $sql .= ", image";
  }

  $sql .= ") VALUES (?, ?, ?, ?";

  // Append image placeholder if image was uploaded
  if ($imageFileName != "") {
    $sql .= ", ?";
  }

  $sql .= ")";

  // Prepare and bind parameters
  $stmt = $conn->prepare($sql);

  // Check if prepare succeeded
  if ($stmt === false) {
    die('Prepare failed: ' . $conn->error);
  }

  // Bind parameters with appropriate types
  if ($imageFileName != "") {
    $stmt->bind_param($paramTypes, $next_id, $locationName, $locationDescription, $package, $imageFileName);
  } else {
    $stmt->bind_param($paramTypes, $next_id, $locationName, $locationDescription, $package);
  }

  // Execute SQL insert
  if ($stmt->execute()) {
    // Set add success flag and message
    $addSuccess = true;
    $addMessage = "Location added successfully. ID: $next_id, Name: $locationName, Description: $locationDescription, Image: $imageFileName";
  } else {
    $addMessage = "Error adding location: " . $stmt->error;
  }

  // Close statement
  $stmt->close();
}

// Close connection
$conn->close();

?>
