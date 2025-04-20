<?php
// Include the connection file
require_once 'connect.php';

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | FeedForward</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-top: 40px;
        }

        .table-container {
            background-color: #fff;
            padding: 20px;
            margin: 30px auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #1e824c;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            color: #333;
        }

        .no-data {
            text-align: center;
            padding: 15px;
            font-style: italic;
            color: #888;
        }

        @media (max-width: 768px) {
            th, td {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="table-container">
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
            if (mysqli_num_rows($users_result) > 0) {
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
                echo "<tr><td colspan='5' class='no-data'>No users found</td></tr>";
            }
            mysqli_free_result($users_result);
            ?>
        </table>
    </div>

    <div class="table-container">
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
            if (mysqli_num_rows($ngo_result) > 0) {
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
                echo "<tr><td colspan='5' class='no-data'>No NGOs found</td></tr>";
            }
            mysqli_free_result($ngo_result);
            mysqli_close($conn);
            ?>
        </table>
    </div>

</body>
</html>
