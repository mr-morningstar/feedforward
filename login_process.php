<?php
// Start the session for user authentication
session_start();

// Include the database connection
require_once 'connect.php';

// Function to display error messages
function outputError($message) {
    echo json_encode(['success' => false, 'message' => $message]);
    exit;
}

// Handle user registration
if (isset($_POST['action']) && $_POST['action'] === 'register') {
    // Get and sanitize form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = $_POST['password'];
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    
    // Validate inputs
    if (empty($name) || empty($email) || empty($address) || empty($password)) {
        outputError('All fields are required.');
    }
    
    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        outputError('Please enter a valid email address.');
    }
    
    // Password length validation
    if (strlen($password) < 6) {
        outputError('Password must be at least 6 characters long.');
    }
    
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Determine which table to use based on user role
    $table = ($role === 'restaurant') ? 'users' : 'ngo';
    
    // Check if email already exists
    $check_query = "SELECT * FROM $table WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_query);
    
    if ($check_result === false) {
        // If query failed, output the error for debugging
        outputError('Database error: ' . mysqli_error($conn));
    }
    
    if (mysqli_num_rows($check_result) > 0) {
        outputError('Email already exists. Please use a different email or login.');
    }
    
    // Insert user data into the database
    $insert_query = "INSERT INTO $table (name, email, address, password) 
                    VALUES ('$name', '$email', '$address', '$hashed_password')";
    
    if (mysqli_query($conn, $insert_query)) {
        echo json_encode(['success' => true, 'message' => 'Registration successful! You can now login.']);
    } else {
        // Output the specific SQL error for debugging
        outputError('Registration failed: ' . mysqli_error($conn));
    }
}

// Handle user login
if (isset($_POST['action']) && $_POST['action'] === 'login') {
    // Get and sanitize form data
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    
    // Validate inputs
    if (empty($email) || empty($password)) {
        outputError('Email and password are required.');
    }
    
    // Determine which table to use based on user role
    $table = ($role === 'restaurant') ? 'users' : 'ngo';
    
    // Check if user exists
    $query = "SELECT * FROM $table WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if ($result === false) {
        // If query failed, output the error for debugging
        outputError('Database error: ' . mysqli_error($conn));
    }
    
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $role;
            
            // Return success response with redirect information
            echo json_encode([
                'success' => true, 
                'message' => 'Login successful!', 
                'redirect' => ($role === 'restaurant') ? 'dashboard[R].php' : 'dashboard[N].php'
            ]);
        } else {
            outputError('Invalid email or password.');
        }
    } else {
        outputError('Invalid email or password.');
    }
}

// Close the database connection
mysqli_close($conn);
?>