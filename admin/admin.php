<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Replace 'your_username' with your actual MySQL username
$password = ""; // Replace 'your_password' with your actual MySQL password
$dbname = "Trek_Management"; // Replace 'your_database' with your actual MySQL database name

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sqlPackages = "SELECT COUNT(*) AS packageCount FROM Package"; // Adjust table name as per your database
$resultPackages = $conn->query($sqlPackages);
if ($resultPackages && $resultPackages->num_rows > 0) {
    $rowPackages = $resultPackages->fetch_assoc();
    $packageCount = $rowPackages['packageCount'];
} else {
    $packageCount = 0;
}

$sqlLocations = "SELECT COUNT(*) AS locationCount FROM Trek_Destinations"; // Adjust table name as per your database
$resultLocations = $conn->query($sqlLocations);
if ($resultLocations && $resultLocations->num_rows > 0) {
    $rowLocations = $resultLocations->fetch_assoc();
    $locationCount = $rowLocations['locationCount'];
} else {
    $locationCount = 0;
}

$sqlCustomers = "SELECT COUNT(*) AS customerCount FROM Record"; // Adjust table name as per your database
$resultCustomers = $conn->query($sqlCustomers);
if ($resultCustomers && $resultCustomers->num_rows > 0) {
    $rowCustomers = $resultCustomers->fetch_assoc();
    $customerCount = $rowCustomers['customerCount'];
} else {
    $customerCount = 0;
}
$sqlGuides = "SELECT COUNT(*) AS guidesCount FROM Guides"; // Adjust table name as per your database
$resultGuides = $conn->query($sqlGuides);
if ($resultGuides && $resultGuides->num_rows > 0) {
    $rowGuides = $resultGuides->fetch_assoc();
    $guidesCount = $rowGuides['guidesCount'];
}
$sqlorders = "SELECT COUNT(*) AS ordersCount FROM Record"; // Adjust table name as per your database
$resultorders = $conn->query($sqlorders);
if ($resultorders && $resultorders->num_rows > 0) {
    $roworders = $resultorders->fetch_assoc();
    $ordersCount = $roworders['ordersCount'];
}
$sqlreports = "SELECT COUNT(*) AS reportsCount FROM UserQueries"; // Adjust table name as per your database
$resultreports = $conn->query($sqlreports);
if ($resultreports && $resultreports->num_rows > 0) {
    $rowreports = $resultreports->fetch_assoc();
    $reportsCount = $rowreports['reportsCount'];
}
$sql = "SELECT * FROM Record";
$result = $conn->query($sql);

// Initialize an empty array to store user data
$userData = array();

if ($result->num_rows > 0) {
    // Store user data in the array
    while ($row = $result->fetch_assoc()) {
        $userData[] = $row;
    }
}
// Fetch trek destinations data from the database
$sql = "SELECT * FROM Trek_Destinations WHERE active=1 ";
$trekResult = $conn->query($sql);

// Initialize an empty array to store trek destinations data
$trekData = array();

if ($trekResult->num_rows > 0) {
    while ($row = $trekResult->fetch_assoc()) {
        $trekData[] = $row;
    }
} else {
    echo "No trek destinations found.";
}
// Fetch report data from the database
$sql = "SELECT Name, Email, Subject, Message FROM UserQueries";
$reportResult = $conn->query($sql);

// Initialize an empty array to store report data
$reportData = array();

if ($reportResult->num_rows > 0) {
    while ($row = $reportResult->fetch_assoc()) {
        $reportData[] = $row;
    }
} else {
    echo "No reports found.";
}

// Fetch orders data from the database
$sql = "SELECT * FROM Record";
$result = $conn->query($sql);

// Initialize an empty array to store records
$records = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
} else {
    echo "No orders found.";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['record_id'])) {
  $recordId = $_POST['record_id'];
  $status = $_POST['status'];
  
  // Initialize rejection reason
  $rejectionReason = null;
  
  // Check if rejection reason is provided for Reject status
  if ($status === "Reject" && isset($_POST['rejection_reason'])) {
      $rejectionReason = $_POST['rejection_reason'];
  }
  
  // Prepare the SQL statement based on status
  if ($status === "Reject") {
      // Update status to Reject and set rejection reason
      $sqlUpdate = "UPDATE Record SET Status = 'Reject', rejection_reason = ? WHERE id = ?";
      $stmt = $conn->prepare($sqlUpdate);
      $stmt->bind_param("si", $rejectionReason, $recordId);
  } elseif ($status === "Confirm" || $status === "Pending") {
      // For Confirm or Pending status, set rejection_reason to NULL
      $sqlUpdate = "UPDATE Record SET Status = ?, rejection_reason = NULL WHERE id = ?";
      $stmt = $conn->prepare($sqlUpdate);
      $stmt->bind_param("si", $status, $recordId);
  } else {
      // Handle other status updates (if any)
      $sqlUpdate = "UPDATE Record SET Status = ? WHERE id = ?";
      $stmt = $conn->prepare($sqlUpdate);
      $stmt->bind_param("si", $status, $recordId);
  }
  
  // Execute the statement
  if ($stmt->execute()) {
      $statusMessage = "Status updated successfully.";
  } else {
      $statusMessage = "Error updating status: " . $conn->error;
  }
  
  // Close the statement
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
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      height: 100vh;
      margin: 0;
      background: linear-gradient(135deg, #2c3e50, #3498db);
    }
/* Dashboard Panel */
#dashboardPanel {
    display: block; /* This line isn't necessary since block is the default display for a div */
}

/* Card Container */
.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

/* Individual Card Styling */
.cardod { /* Change .card to .cardod to match your HTML class */
    background-color: #f9f9f9;
    opacity: 70%;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
    transition: all 0.3s ease;
}

.cardod h2 { /* Change .card to .cardod */
    color: #f9004d;
    font-size: 1.5rem;
    margin-bottom: 10px;
}
.cardod:hover h2{
  color: white;
}
.cardod p { /* Change .card to .cardod */
    color: black;
    font-size: 1rem;
    line-height: 1.4;
}
.cardod:hover p{
  color:white;
}
.cardod:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transform: translateY(-5px);
    background-color: #f9004d;
}

/* Button Styling */
.button {
    background-color: #f9004d;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #fff;
    color: #f9004d;
}

.button.secondary {
    background-color: transparent;
    border: 1px solid #f9004d;
    color: #f9004d;
}

.button.secondary:hover {
    background-color: #f9004d;
    color: #fff;
}

    .navbar {
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
      background-color: #2D4961;
      height: 99.5%;
      padding: 2px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .navbar h1 {
      color: #fff;
      margin-bottom: 50px;
      font-size: 40px;
      right: 0px;
    }
    .navbar span {
      color: #f9004d;
    }

    .button {
      width: 200px;
      padding: 15px 30px;
      font-size: 18px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      outline: none;
      color: #fff;
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      margin-bottom: 20px;
      transition: background-color 0.3s ease, transform 0.3s ease;
      margin-top: 20px;
    }
    .grid-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
}

.card {
    border-radius: 30px;
    overflow: hidden;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
  }

  .card:hover {
    transform: translateY(-10px);
  }

  .card img {
    width: 100%; /* Ensure the image fills its container */
    height: 200px; /* Fixed height for consistency, adjust as needed */
    object-fit: cover; /* Maintain aspect ratio */
    border-radius: 10px 10px 0 0; /* Rounded corners */
  }

  .card .box {
    padding: 20px;
    background-color: transparent;
    border: 2px solid rgba(0, 0, 0, 0.1);
  }

  .card .intro {
    padding: 20px;
  }

  .card .intro h1 {
    font-size: 24px;
    margin-bottom: 10px;
  }

  .card .intro p {
    font-size: 16px;
    line-height: 1.6;
  }

    .button i {
      margin-right: 10px;
    }

    .button:hover {
      background-color: #0056b3;
      transform: translateY(-3px);
    }

    .button:active {
      background-color: #004080;
    }

    .logout-button {
      width: 125px;
      padding: 10px 20px;
      font-size: 16px;
      margin-top: auto;
      background-color: #d9534f;
    }

    .logout-button:hover {
      background-color: #c9302c;
    }

    .logout-button:active {
      background-color: #ac2925;
    }

    .main-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-left: 60px;
      height: 85%;
      width: 100%;
      overflow: auto;
      margin-top: 60px;
    }

    .panel {
      display: none;
      padding: 20px;
      background-color: #2c3e50;
      border-radius: 10px;
      margin-left: 25px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      height: 100%;
      width: 100%;
      max-height: 650px;
      max-width: 900px;
      text-align: center;
      color: #fff;
      overflow: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table, th, td {
      border: 1px solid #ddd;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }
    .add-location {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px; /* Same height as the images for consistency */
  border: 2px solid #f9004d; /* Different border style for visual distinction */
  color: #fff; /* Text color */
  background: transparent;
}

.add-location h1 {
  display: flex;
  align-items: center;
  font-size: 24px;
  margin: 0;
}

.add-location i {
  margin-right: 10px; /* Space between the icon and text */
}

.btn-5 {
  width: 130px;
  height: 40px;
  line-height: 42px;
  padding: 0;
  border: 1px solid black;
  text-decoration: none;
  background-color: #E6E6FA;;
}
.status-select {
    width: 130px; /* Adjust width as needed */
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: #fff; /* Text color */
    background-color: #007bff; /* Background color */
    border: none;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    margin-bottom: 20px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    margin-top: 20px;
  }

  .status-select option {
    background-color: #007bff; /* Match background color */
    color: #fff; /* Match text color */
  }
.btn-5:hover {
  color: white;
  background: transparent;
   box-shadow:none;
}
.btn-5:before,
.btn-5:after{
  content:'';
  position:absolute;
  top:0;
  right:0;
  height:2px;
  width:0;
  box-shadow:
   -1px -1px 5px 0px #fff,
   7px 7px 20px 0px #0003,
   4px 4px 5px 0px #0002;
  transition:400ms ease all;
}
.btn-5:after{
  right:inherit;
  top:inherit;
  left:0;
  bottom:0;
}
.btn-5:hover:before,
.btn-5:hover:after{
  width:100%;
  transition:800ms ease all;
}
    th {
      background-color: #34495e;
      color: #fff;
    }
    #addLocationPanel {
    padding: 20px;
    background-color: #2c3e50;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    color: #fff;
    display: none;
    max-width: 600px; /* Adjust max-width as needed */
    margin: 0 auto; /* Center the panel horizontally */
  }

  #addLocationPanel h2 {
    text-align: center;
    margin-bottom: 20px;
  }

  #addLocationForm {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  #addLocationForm label {
    margin-bottom: 10px;
    text-align: center; /* Center align labels */
  }

  #addLocationForm input,
  #addLocationForm textarea,
  #addLocationForm button {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: none;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
  }

  #addLocationForm textarea {
    height: 100px; /* Adjust as needed */
    resize: vertical; /* Allow vertical resizing */
  }

  #addLocationForm button {
    background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        font-size: 16px;
  }

  #addLocationForm button:hover {
    background-color: #45a049;
  }

  </style>
</head>
<body>
  <div class="navbar">
    <h1><span>Ev</span>fest.</h1>
    <button class="button" onclick="togglePanel('dashboardPanel')"><i class="fas fa-tachometer-alt"></i>Dashboard</button>
    <button class="button" onclick="togglePanel('ordersPanel')"><i class="fas fa-box"></i>Orders</button>
    <button class="button" onclick="togglePanel('customersPanel')"><i class="fas fa-users"></i>Customers</button>
    <button class="button" onclick="togglePanel('guidesPanel')"><i class="fas fa-map"></i>Guides</button>
    <button class="button" onclick="togglePanel('reportPanel')"><i class="fas fa-chart-line"></i>Report</button>
    <button class="button" onclick="togglePanel('locationPanel')"><i class="fas fa-chart-line"></i>Location</button>
    <button class="logout-button" onclick="logout()">Logout <i class="fas fa-sign-out-alt"></i></button>
  </div>
  
  <div id="dashboardPanel" class="panel" style="display: block;">
    <h2>Dashboard</h2>
    <div class="card-container">
        <div class="cardod">
            <h2>Packages</h2>
            <p>Explore our exclusive packages tailored for your adventure needs.</p>
            <p>Total: <?php echo $packageCount; ?></p>
        </div>
        <div class="cardod">
        <div class="card" onclick="togglePanel('locationPanel')">
            <h2>Locations</h2>
            <p>Discover stunning locations to make your journey unforgettable.</p>
            <p>Total: <?php echo $locationCount; ?></p>
        </div>
          </div>
        <div class="cardod">
        <div class="card" onclick="togglePanel('customersPanel')">
            <h2>Customers</h2>
            <p>Meet our happy customers who have experienced the best treks.</p>
            <p>Total: <?php echo $customerCount; ?></p>
        </div>
          </div>
          <div class="cardod">
        <div class="card" onclick="togglePanel('guidesPanel')">
            <h2>Guides</h2>
            <p>Meet our adventurers! Discover their stories from unforgettable treks that redefine exploration and joy.</p>
            <p>Total: <?php echo $guidesCount; ?></p>
        </div>
          </div>
          <div class="cardod">
        <div class="card" onclick="togglePanel('ordersPanel')">
            <h2>Orders</h2>
            <p>Embark on unforgettable treks with every order, revealing stories of exploration and joy</p>
            <p>Total: <?php echo $ordersCount; ?></p>
        </div>
          </div>
          <div class="cardod">
        <div class="card" onclick="togglePanel('reportPanel')">
            <h2>Reports</h2>
            <p>Your feedback drives our website's continuous improvement.</p>
            <p>Total: <?php echo $reportsCount; ?></p>
        </div>
          </div>
    </div>
</div>





    <div id="ordersPanel" class="panel">
  <h2>Order Details</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Country</th>
        <th>Selected Trek</th>
        <th>Selected Package</th>
        <th>Extra Facilities</th>
        <th>Action</th> <!-- New column for buttons -->
      </tr>
    </thead>
    <?php foreach ($records as $record): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($record['fullName']); ?></td>
                        <td><?php echo htmlspecialchars($record['email']); ?></td>
                        <td><?php echo htmlspecialchars($record['phoneNum']); ?></td>
                        <td><?php echo htmlspecialchars($record['country']); ?></td>
                        <td><?php echo htmlspecialchars($record['selected_trek']); ?></td>
                        <td><?php echo htmlspecialchars($record['selected_package']); ?></td>
                        <td><?php echo htmlspecialchars($record['extraFacilities']); ?></td>
                        <td>
                        <form method="POST" id="form_<?php echo $record['id']; ?>">
    <input type="hidden" name="record_id" value="<?php echo $record['id']; ?>">
    
    <!-- Status select dropdown -->
    <select name="status" class="status-select" onchange="handleStatusChange(this, <?php echo $record['id']; ?>)">
        <option value="Confirm">Confirm</option>
        <option value="Pending">Pending</option>
        <option value="Reject">Reject</option>
    </select>
    
    <!-- Hidden input for rejection reason -->
    <input type="hidden" name="rejection_reason" id="reason_<?php echo $record['id']; ?>">
    
    <!-- Submit button -->
    <button type="submit" class="btn-5 status-button">Update Status</button>
</form>

                        </td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>



    <div id="customersPanel" class="panel">
     <h2>Customer Details</h2>

      <table class="table table-bordered">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Birth Date</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Country</th>
                <th>City</th>
                <th>Region</th>
                <th>Postal Code</th>
                <th>Selected Trek</th>
                <th>Selected Package</th>
                <th>Extra Facilities</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userData as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['fullName']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo htmlspecialchars($user['phoneNum']); ?></td>
                <td><?php echo htmlspecialchars($user['birthDate']); ?></td>
                <td><?php echo htmlspecialchars($user['gender']); ?></td>
                <td><?php echo htmlspecialchars($user['address1'] . ', ' . $user['address2']); ?></td>
                <td><?php echo htmlspecialchars($user['country']); ?></td>
                <td><?php echo htmlspecialchars($user['city']); ?></td>
                <td><?php echo htmlspecialchars($user['region']); ?></td>
                <td><?php echo htmlspecialchars($user['postalCode']); ?></td>
                <td><?php echo htmlspecialchars($user['selected_trek']); ?></td>
                <td><?php echo htmlspecialchars($user['selected_package']); ?></td>
                <td><?php echo htmlspecialchars($user['extraFacilities']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div id="guidesPanel" class="panel">
      <h2>Guides</h2>
      <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo isset($guide['name']) ? htmlspecialchars($guide['name']) : 'N/A'; ?></td>
                <td><?php echo isset($guide['description']) ? htmlspecialchars($guide['description']) : 'N/A'; ?></td>
                  </tr>
        </tbody>
      </table>
    </div>

    <div id="reportPanel" class="panel">
      <h2>Report</h2>
      <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($reportData as $report): ?>
<tr>
    <td><?php echo htmlspecialchars($report['Name']); ?></td>
    <td><?php echo htmlspecialchars($report['Email']); ?></td>
    <td><?php echo htmlspecialchars($report['Subject']); ?></td>
    <td><?php echo htmlspecialchars($report['Message']); ?></td>
</tr>
<?php endforeach; ?>

        </tbody>
      </table>
    </div>

    <div id="locationPanel" class="panel">
  <h2>Trek Destinations</h2>
  <div class="max-width">
    <div class="grid-container">
      <?php foreach ($trekData as $destination): ?>
        <div class="card">
          <div class="box">
            <?php if (!empty($destination['image']) && file_exists($destination['image'])): ?>
              <img src="<?php echo $destination['image']; ?>" alt="<?php echo $destination['name']; ?>">
            <?php else: ?>
              <img src="placeholder.jpg" alt="<?php echo $destination['name']; ?>">
            <?php endif; ?>
            <div class="intro">
              <h1><?php echo $destination['name']; ?></h1>
              <p><?php echo $destination['description']; ?></p>
            </div> <!-- .intro -->
          </div> <!-- .box -->
        </div> <!-- .card -->
      <?php endforeach; ?>

      <div class="card add-location">
        <div class="box">
          <div class="intro">
            <a href="add_update.php" target="_blank" class="btn-5"><i class="fas fa-plus"></i> Add Location</a>
          </div>
        </div>
      </div>

      <div class="card add-location">
        <div class="box">
          <div class="intro">
            <a href="delete_location.php" target="_blank" class="btn-5"><i class="fas fa-edit"></i> Delete Location</a>
          </div>
        </div>
      </div>
      
    </div> <!-- .grid-container -->
  </div> <!-- .max-width -->
</div> <!-- #locationPanel -->


<script>
       function handleStatusChange(select, recordId) {
    const status = select.value;
    const reasonInput = document.querySelector(`#reason_${recordId}`);
    
    // If status is "Reject", prompt for reason
    if (status === "Reject") {
        const reason = prompt("Enter reason for rejection:");
        if (reason) {
            // Set the value of the rejection reason input
            reasonInput.value = reason;
        } else {
            // If user cancels or doesn't provide a reason, reset select to "Pending"
            select.value = "Pending";
        }
    } else {
        // Reset the rejection reason input
        reasonInput.value = "";
    }
}

  function togglePanel(panelId) {
    var panels = document.querySelectorAll('.panel');
    panels.forEach(function(panel) {
      if (panel.id === panelId) {
        panel.style.display = "block";
        // If the panel is guidesPanel, fetch and display guides data
        if (panelId === 'guidesPanel') {
          fetchGuidesData();
        }
      } else {
        panel.style.display = "none";
      }
    });
  }

  function fetchGuidesData() {
    fetch('get_guides.php')
      .then(response => response.json())
      .then(data => {
        var guidesTable = document.querySelector('#guidesPanel table tbody');
        guidesTable.innerHTML = ''; // Clear existing data
        data.forEach(guide => {
          guidesTable.innerHTML += `
            <tr>
              <td>${guide.Name}</td>
              <td>${guide.Description}</td>
            </tr>
          `;
        });
      })
      .catch(error => {
        console.error('Error fetching guides data:', error);
      });
  }
  function logout() {
            // Redirect to adminlogin.html
            window.location.href = "adminlogin.html";
        }
</script>

</body>
</html>
