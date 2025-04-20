<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Feedforward";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    error_log("Connection failed: " . mysqli_connect_error());
    die("Connection failed: " . mysqli_connect_error());
}

$create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if (!mysqli_query($conn, $create_db)) {
    error_log("Error creating database: " . mysqli_error($conn));
    die("Error creating database: " . mysqli_error($conn));
}

if (!mysqli_select_db($conn, $dbname)) {
    error_log("Error selecting database: " . mysqli_error($conn));
    die("Error selecting database: " . mysqli_error($conn));
}

$create_users_table = "
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        address VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
";
if (!mysqli_query($conn, $create_users_table)) {
    error_log("Error creating users table: " . mysqli_error($conn));
    die("Error creating users table: " . mysqli_error($conn));
}

$create_ngo_table = "
    CREATE TABLE IF NOT EXISTS ngo (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        address VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
";
if (!mysqli_query($conn, $create_ngo_table)) {
    error_log("Error creating ngo table: " . mysqli_error($conn));
    die("Error creating ngo table: " . mysqli_error($conn));
}

// Set charset to avoid encoding issues
mysqli_set_charset($conn, "utf8mb4");
?>