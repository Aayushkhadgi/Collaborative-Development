<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Trek_Management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete location if 'id' parameter is provided
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare SQL statement to update the active status instead of deleting
    $sql_update = "UPDATE Trek_Destinations SET active = 0 WHERE id = $id";

    if ($conn->query($sql_update) === TRUE) {
        // Redirect back to the page after deletion
        header("Location: delete_location.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Fetch data from Trek_Destinations where active is 1 (active locations)
$sql = "SELECT * FROM Trek_Destinations WHERE active = 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Locations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #d9d9d9;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f9004d;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .btn {
            padding: 8px 16px;
            margin: 4px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Locations</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Package ID</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['package_id']; ?></td>
                        <td>
                            <?php if (!empty($row['image']) && file_exists($row['image'])): ?>
                                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" width="50">
                            <?php else: ?>
                                <img src="placeholder.jpg" alt="<?php echo $row['name']; ?>" width="50">
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="delete_location.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this location?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No locations found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
