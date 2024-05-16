<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Replace 'your_username' with your actual MySQL username
$password = ""; // Replace 'your_password' with your actual MySQL password
$dbname = "Trek_Management"; // Replace 'your_database' with your actual MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from the database
$sql = "SELECT * FROM Record";
$result = $conn->query($sql);

// Initialize an empty array to store user data
$userData = array();

if ($result->num_rows > 0) {
    // Store user data in the array
    while($row = $result->fetch_assoc()) {
        $userData[] = $row;
    }
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Evfest</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

body{
    background-color:  ;
    --bk: #181826;
    --border: 2px solid var(--bd);
    --col2: #212134;
    --bd: #474766;
    --cp: #acacca;
    --cp2: white;
    --button: #4945FF;
}
.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
.menu {
    position: fixed;
    top: 0;
    left: 0;
    padding: 1rem;
    width: 200px;
    height: 100%;
    background-color: #474766;
    overflow-y: auto;
}


        .content {
            margin-left: 200px; /* Width of the menu */
            padding: 2rem;
        }
        @media (max-width: 768px) {
            .menu {
                width: 100%;
                position: relative;
                border-right: none;
            }
            .content {
                margin-left: 0;
            }
        }
        .notification-card {
            position: absolute;
            top: 70px;
            right: 20px;
            z-index: 1000;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: none;
        }
        .notification-bell {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1001;
        }
.card-body {
    background-color: #474766;
    color: white;
}
    </style>
</head>
<body>

    <!-- Notification bell -->
    <div class="notification-bell">
        <a href="#" id="notificationBell" class="btn btn-link text-dark">
            <i class="fa fa-bell fa-lg"></i>
        </a>
        <!-- Notification card -->
        <div id="notificationCard" class="notification-card">
            <h5>Notifications</h5>
            <p>No new notifications.</p>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Left side card container -->
            <div class="col-md-3 menu">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Data</h5>
                        <p class="card-text">View user data here.</p>
                        <button id="viewButton" class="btn btn-primary">View</button>
                    </div>
                </div>
            </div>
            <div class="col-md-9 content">
                <!-- Main content area -->
                <h2>Welcome to Evfest Admin Panel</h2>
                <!-- User data table (initially hidden) -->
                <div id="userData" style="display: none;">
                    <h3>User Data</h3>
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
                                    <td><?php echo $user['fullName']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['phoneNum']; ?></td>
                                    <td><?php echo $user['birthDate']; ?></td>
                                    <td><?php echo $user['gender']; ?></td>
                                    <td><?php echo $user['address1'] . ', ' . $user['address2']; ?></td>
                                    <td><?php echo $user['country']; ?></td>
                                    <td><?php echo $user['city']; ?></td>
                                    <td><?php echo $user['region']; ?></td>
                                    <td><?php echo $user['postalCode']; ?></td>
                                    <td><?php echo $user['selected_trek']; ?></td>
                                    <td><?php echo $user['selected_package']; ?></td>
                                    <td><?php echo $user['extraFacilities']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script>
        document.getElementById("notificationBell").addEventListener("click", function() {
            var notificationCard = document.getElementById("notificationCard");
            if (notificationCard.style.display === "none") {
                notificationCard.style.display = "block";
            } else {
                notificationCard.style.display = "none";
            }
        });

        // JavaScript to toggle the visibility of user data table
        document.getElementById("viewButton").addEventListener("click", function() {
            var userData = document.getElementById("userData");
            if (userData.style.display === "none") {
                userData.style.display = "block";
            } else {
                userData.style.display = "none";
            }
        });
    </script>

</body>
</html>