<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Login - FeedForward</title>
  <link rel="stylesheet" href="css/admin.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">FeedForward</div>
    <ul class="nav-links" id="navLinks">
      <li><a href="index.html">Home</a></li>
      <li><a href="index.html#about">About</a></li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
    <div class="hamburger" id="hamburger">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </nav>

  <!-- Admin Login Form -->
  <div class="container">
    <div class="form-wrapper">
      <form id="adminLoginForm" class="form">
        <h2>Admin Login</h2>
        <input type="email" id="adminEmail" placeholder="Admin Email" required />
        <input type="password" id="adminPassword" placeholder="Password" required />
        <button type="submit">Login</button>
      </form>
    </div>
  </div>

  <script>
    // Toggle navbar on mobile
    document.getElementById("hamburger").addEventListener("click", () => {
      document.getElementById("navLinks").classList.toggle("active");
    });

    // Admin login logic
    document.getElementById("adminLoginForm").addEventListener("submit", function (e) {
      e.preventDefault();
      const email = document.getElementById("adminEmail").value.trim();
      const password = document.getElementById("adminPassword").value.trim();

      if (!email || !password) {
        alert("❌ Please fill in all fields.");
        return;
      }

      // Simulated login logic
      alert("✅ Admin login successful!");
      this.reset();
    });
  </script>
</body>
</html>
