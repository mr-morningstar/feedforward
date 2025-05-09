<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login/Register - FeedForward</title>
  <link rel="stylesheet" href="css/login.css" />
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

  <!-- Form Container -->
  <div class="container">
    <div class="form-wrapper">
      <!-- Toggle Buttons -->
      <div class="form-toggle">
        <button id="loginToggle" class="active">Login</button>
        <button id="registerToggle">Register</button>
      </div>

      <!-- Role Selection -->
      <div class="role-select">
        <label for="userRole">Login/Register as:</label>
        <select id="userRole">
          <option value="restaurant">Restaurant</option>
          <option value="ngo">NGO</option>
        </select>
      </div>

      <!-- Login Form -->
      <form id="loginForm" class="form">
        <h2>Login</h2>
        <input type="email" id="loginEmail" placeholder="Email" required />
        <input type="password" id="loginPassword" placeholder="Password" required />
        <button type="submit">Login</button>
      </form>

      <!-- Register Form -->
      <form id="registerForm" class="form hidden">
        <h2>Register</h2>
        <input type="text" id="registerName" placeholder="Name" required />
        <input type="email" id="registerEmail" placeholder="Email" required />
        <input type="text" id="registerAddress" placeholder="Address" required />
        <input type="password" id="registerPassword" placeholder="Password" required />
        <button type="submit">Register</button>
      </form>
    </div>

    <!-- Optional: Add image or branding here -->
    <div class="image-wrapper"></div>
  </div>

  <script src="js/login.js"></script>
</body>
</html>