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
$updateSuccess = false;
$updateMessage = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Escape user inputs for security
  $locationToUpdate = $conn->real_escape_string($_POST['locationToUpdate']);
  $newLocationName = $conn->real_escape_string($_POST['newLocationName']);
  $newLocationDescription = $conn->real_escape_string($_POST['newLocationDescription']);
  $newPackage = $conn->real_escape_string($_POST['newPackage']);

  // Initialize image variables
  $imageFileName = "";
  $paramTypes = "ssi"; // Initial types for Name, description, package_id

  // Handle image upload if necessary
  if ($_FILES['updateLocationImage']['name'] != '') {
    $target_dir = "C:/xampp/htdocs/Trek Management System/admin/uploads/";
    $target_file = $target_dir . basename($_FILES["updateLocationImage"]["name"]);

    // Check if the directory exists or create it
    if (!is_dir($target_dir)) {
      mkdir($target_dir, 0755, true); // Create directory with appropriate permissions
    }

    // Move uploaded file to target directory
    if (move_uploaded_file($_FILES["updateLocationImage"]["tmp_name"], $target_file)) {
      $imageFileName = basename($_FILES["updateLocationImage"]["name"]); // Store only the file name
      $paramTypes .= "s"; // Add 's' for image file name to parameter types
    } else {
      die("Sorry, there was an error uploading your file.");
    }
  }

  // Prepare SQL update statement using prepared statement for security
  $sql = "UPDATE Trek_Destinations SET Name=?, description=?, package_id=?";

  // Append image update if image was uploaded
  if ($imageFileName != "") {
    $sql .= ", image=?";
  }

  $sql .= " WHERE id=?";

  // Prepare and bind parameters
  $stmt = $conn->prepare($sql);

  // Check if prepare succeeded
  if ($stmt === false) {
    die('Prepare failed: ' . $conn->error);
  }

  // Bind parameters with appropriate types
  if ($imageFileName != "") {
    $stmt->bind_param($paramTypes . "i", $newLocationName, $newLocationDescription, $newPackage, $imageFileName, $locationToUpdate);
  } else {
    $stmt->bind_param($paramTypes . "i", $newLocationName, $newLocationDescription, $newPackage, $locationToUpdate);
  }

  // Execute SQL update
  if ($stmt->execute()) {
    // Set update success flag and message
    $updateSuccess = true;
    $updateMessage = "Location updated successfully. ID: $locationToUpdate, Name: $newLocationName, Description: $newLocationDescription, Image: $imageFileName";
  } else {
    $updateMessage = "Error updating location: " . $stmt->error;
  }

  // Close statement
  $stmt->close();
}

// Close connection
$conn->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add/Update Locations</title>
  <style>
    /* General styles */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html {
      overflow-y: scroll;
    }

    body {
      font-family: 'Titillium Web', sans-serif;
      background: url('https://unsplash.com/images/nature/mountain') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      width: 100%;
      max-width: 600px;
      text-align: center;
    }

    a {
      text-decoration: none;
      color: #f9004d;
      transition: .5s ease;
    }

    a:hover {
      color: #198e6d;
    }

    .tab-group {
      list-style: none;
      padding: 0;
      margin-bottom: 20px;
      display: flex;
      justify-content: center;
    }

    .tab-group li {
      margin-right: 10px;
    }

    .tab-group li a {
      display: block;
      padding: 12px 16px;
      background-color: rgba(160, 179, 176, .25);
      color: rgba(160, 179, 176, .25);
      font-size: 16px;
      text-align: center;
      cursor: pointer;
      transition: .5s ease;
      border-radius: 8px 8px 0 0;
    }

    .tab-group li a:hover {
      background-color: #198e6d;
      color: #ffffff;
    }

    .tab-group .active a {
      background-color: #f9004d;
      color: #ffffff;
    }

    .tab-content > div {
      display: none;
      padding: 20px;
      text-align: left;
    }

    .tab-content > div.active {
      display: block;
    }

    h1 {
      text-align: center;
      color: #198e6d;
      font-weight: 600;
      margin-bottom: 20px;
      font-size: 24px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      margin-top: 30px;
      color: #13232f;
      font-size: 16px;
      text-transform: uppercase;
    }

    input,
    textarea,
    select {
      width: 100%;
      padding: 10px;
      margin-top: 6px;
      background-color: rgba(160, 179, 176, .25);
      border: 1px solid #808080;
      border-radius: 8px;
      font-size: 16px;
      color: #13232f;
      transition: border-color .25s ease, box-shadow .25s ease;
    }

    input:focus,
    textarea:focus,
    select:focus {
      outline: none;
      border-color: #f9004d;
    }

    textarea {
      min-height: 80px;
      resize: vertical;
    }

    .button {
      border: 0;
      outline: none;
      border-radius: 8px;
      padding: 12px 0;
      margin-top: 20px;
      margin-left: 10em;
      font-size: 16px;
      width: 10rem;
      text-transform: uppercase;
      letter-spacing: .1em;
      background: #f9004d;
      color: #ffffff;
      cursor: pointer;
      transition: all .5s ease;
    }

    .button:hover,
    .button:focus {
      background: #ffffff;
      color: #f9004d;
    }
  </style>
</head>
<body>
  <div class="form-container">

    <ul class="tab-group">
      <li class="tab active"><a href="#add-location">Add Location</a></li>
      <li class="tab"><a href="#update-location">Update Location</a></li>
    </ul>

    <div class="tab-content">
      <div id="add-location" class="active">
        <h1>Add New Location</h1>

        <form action="add_location.php" method="post" enctype="multipart/form-data">

          <label for="locationName">Location Name<span class="req">*</span></label>
          <input type="text" id="locationName" name="locationName" required autocomplete="off">

          <label for="locationDescription">Location Description<span class="req">*</span></label>
          <textarea id="locationDescription" name="locationDescription" rows="3" required autocomplete="off"></textarea>

          <label for="package">Package<span class="req">*</span></label>
          <select id="package" name="package" required>
            <option value="1">Package 1</option>
            <option value="2">Package 2</option>
            <option value="3">Package 3</option>
          </select>

          <label for="locationImage">Location Image</label>
          <input type="file" id="locationImage" name="locationImage" accept="image/jpeg, image/png">

          <button type="submit" class="button">Add Location</button>

        </form>
      </div>

      <div id="update-location" class="tab-content">
        <h1>Update Location</h1>

        <form action="add_update.php" method="post" enctype="multipart/form-data">

        <label for="locationToUpdate">Select Location to Update<span class="req">*</span></label>
<select id="locationToUpdate" name="locationToUpdate" required>
  
  <?php
  // Modify database connection details as needed
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Trek_Management";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Query to fetch locations
  $sql = "SELECT id, Name FROM Trek_Destinations";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
      echo '<option value="' . $row["id"] . '">' . $row["Name"] . '</option>';
    }
  } else {
    echo '<option value="">No locations found</option>';
  }

  // Close connection
  $conn->close();
  ?>
</select>

          <label for="newLocationName">New Location Name<span class="req">*</span></label>
          <input type="text" id="newLocationName" name="newLocationName" required autocomplete="off">

          <label for="newLocationDescription">New Location Description<span class="req">*</span></label>
          <textarea id="newLocationDescription" name="newLocationDescription" rows="3" required autocomplete="off"></textarea>


          <label for="newPackage">New Package<span class="req">*</span></label>
          <select id="newPackage" name="newPackage" required>
            <option value="1">Package 1</option>
            <option value="2">Package 2</option>
            <option value="3">Package 3</option>
          </select>

          <label for="updateLocationImage">Update Location Image</label>
          <input type="file" id="updateLocationImage" name="updateLocationImage" accept="image/jpeg, image/png">

          <button type="submit" class="button">Update Location</button>

        </form>
      </div>
    </div><!-- tab-content -->

  </div> <!-- /form-container -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.tab-group li a').click(function(e) {
        e.preventDefault();

        var tab_id = $(this).attr('href');

        // Remove active class from all tabs and add it to the clicked tab
        $('.tab-group li').removeClass('active');
        $(this).parent().addClass('active');

        // Hide all tab content and display the one corresponding to the clicked tab
        $('.tab-content > div').removeClass('active');
        $(tab_id).addClass('active');
      });

      // Initial click to set the active tab correctly on page load
      $('.tab-group li.tab.active a').trigger('click');
    });
  </script>
</body>
</html>