<?php
// Include the connection file
require_once '../connect.php';

// Query to select all data from users table
$users_query = "SELECT * FROM users";
$users_result = mysqli_query($conn, $users_query);

if (!$users_result) {
    die("Users query failed: " . mysqli_error($conn));
}

// Query to select all data from ngo table
$ngo_query = "SELECT * FROM ngo";
$ngo_result = mysqli_query($conn, $ngo_query);

if (!$ngo_result) {
    die("NGO query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users and NGO Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            margin-bottom: 40px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <h2>Users List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Created At</th>
        </tr>
        <?php
        // Check if there are any users
        if (mysqli_num_rows($users_result) > 0) {
            // Loop through each user
            while ($row = mysqli_fetch_assoc($users_result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No users found</td></tr>";
        }
        // Free users result set
        mysqli_free_result($users_result);
        ?>
    </table>

    <h2>NGO List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Contact</th>
            <th>Created At</th>
        </tr>
        <?php
        // Check if there are any NGOs
        if (mysqli_num_rows($ngo_result) > 0) {
            // Loop through each NGO
            while ($row = mysqli_fetch_assoc($ngo_result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                echo "<td>" . htmlspecialchars($row['contact']) . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No NGOs found</td></tr>";
        }
        // Free NGO result set
        mysqli_free_result($ngo_result);
        
        // Close connection
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>