<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection details
    $servername = "localhost";
    $username = "root"; // Replace with your actual MySQL username
    $password = ""; // Replace with your actual MySQL password
    $database = "Trek_Management"; // Replace with your actual MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    if (isset($_POST['fullName']) && isset($_POST['email'])) {
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];

        // Prepare and execute SQL query
        $sql = $conn->prepare("SELECT * FROM Record WHERE fullName = ? AND email = ?");
        $sql->bind_param("ss", $fullName, $email);
        $sql->execute();
        $result = $sql->get_result();

        // Check if login is successful
        if ($result->num_rows > 0) {
            // Fetch record details
            $record = $result->fetch_assoc();
            $status = $record['status'];
            $rejection_reason = $record['rejection_reason']; // Fetch the rejection reason

            // Determine message based on status
            switch ($status) {
                case 'Confirm':
                    $loginMessage = "Login successful! Your trek request has been confirmed.";
                    break;
                case 'Pending':
                    $loginMessage = "Login successful! Your trek request is pending. Waiting for approval.";
                    break;
                case 'Reject':
                    $loginMessage = "Login successful! Your trek request has been rejected. Reason: $rejection_reason";
                    break;
                default:
                    $loginMessage = "Login successful! Your trek request status: $status";
                    break;
            }
        } else {
            $loginMessage = "Login failed! Invalid full name or email.";
        }
    } else {
        $loginMessage = "Form data is not set properly.";
    }

    // Close connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(130, 106, 251);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            box-sizing: border-box;
        }
        header {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .input-box {
            margin-bottom: 15px;
        }
        .input-box label {
            font-size: 14px;
            color: #555;
        }
        .input-box input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: rgb(88, 56, 250);
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            color: white;
            background-color: rgb(130, 106, 251);
        }
        .register-link-container {
            margin-top: 10px;
            text-align: center;
        }
        .register-link {
            color: #333;
            font-size: 16px;
            text-decoration: underline;
        }
        .register-link:hover {
            color: #f9004d;
            text-decoration: underline;
        }
        .message {
            text-align: center;
            margin-bottom: 15px;
            font-size: 14px;
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
        <header>Login</header>
        <form action="loginnow.php" method="post" class="form">
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" placeholder="Enter full name" required id="fullName" name="fullName"/>
            </div>
            <div class="input-box">
                <label>Email</label>
                <input type="email" placeholder="Enter email" required id="email" name="email"/>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="register-link-container">
            <p>Don't have an account? <a href="booknow.php" class="register-link">Register</a></p>
        </div>
        <?php if (isset($loginMessage)): ?>
            <div class="message"><?php echo $loginMessage; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
