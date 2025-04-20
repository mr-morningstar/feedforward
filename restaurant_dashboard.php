<?php
// Start session
session_start();

// Check if user is logged in and is a restaurant
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'restaurant') {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Dashboard - FeedForward</title>
    <link rel="stylesheet" href="css/login.css">
    <style>
        .dashboard-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }
        
        .welcome-message {
            font-size: 1.5rem;
            color: #136415;
        }
        
        .logout-btn {
            padding: 0.5rem 1rem;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        
        .dashboard-content {
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">FeedForward</div>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="index.html#about">About</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <!-- Hamburger Icon -->
        <div class="hamburger" id="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </nav>
    
    <div class="dashboard-container">
        <div class="dashboard-header">
            <div class="welcome-message">
                Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!
            </div>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
        
        <div class="dashboard-content">
            <h2>Restaurant Dashboard</h2>
            <p>This is your restaurant dashboard. Here you can manage your food donations and track your contributions.</p>
            
            <!-- Your dashboard content goes here -->
            <div style="margin-top: 2rem;">
                <h3>Your Actions</h3>
                <ul>
                    <li>Donate excess food</li>
                    <li>Schedule pickups</li>
                    <li>View donation history</li>
                    <li>Update your profile</li>
                </ul>
            </div>
        </div>
    </div>
    
    <script>
        // Mobile navbar toggle
        document.getElementById('hamburger').addEventListener('click', () => {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        });
    </script>
</body>
</html>