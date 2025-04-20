<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Feedforward";


$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if (!mysqli_query($conn, $create_db)) {
    die("Error creating database: " . mysqli_error($conn));
}

mysqli_select_db($conn, $dbname);

$create_table = "
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
";
if (!mysqli_query($conn, $create_table)) {
    die("Error creating table: " . mysqli_error($conn));
}

$create_ngo_table = "
    CREATE TABLE IF NOT EXISTS ngo (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        contact VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
";
if (!mysqli_query($conn, $create_ngo_table)) {
    die("Error creating ngo table: " . mysqli_error($conn));
}
?>