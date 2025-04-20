<?php
session_start();
if (!isset($_SESSION['user_id'])) {
   // header("Location: login.php");
   // exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - FeedForward</title>
  <link rel="stylesheet" href="css/dashboard.css" />
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">FeedForward</div>
    <ul class="nav-links">
      <li><a href="#">Home</a></li>
      <li><a href="login.html">Logout</a></li>
    </ul>
  </nav>

  <!-- Welcome Message -->
  <section class="welcome">
  <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! 👋</h1>
    <p>Let’s make a difference by reducing food waste.</p>
  </section>

  <!-- Action Cards -->
  <section class="cards">
    <div class="card">
      <h3>🍲 Donate Food</h3>
      <p>Share excess food with those who need it.</p>
      <button onclick="alert('Coming soon: Donate Food form')">Donate</button>
    </div>
    <div class="card">
      <h3>📄 Donation History</h3>
      <p>Track your past donations (Coming soon).</p>
      <button onclick="alert('Coming soon: Donation History')">History</button>
    </div>
  </section>

  <script src="js/dashboard.js"></script>
</body> 
</html>
