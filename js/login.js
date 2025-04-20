// Mobile navbar toggle
document.getElementById('hamburger').addEventListener('click', () => {
  const navLinks = document.querySelector('.nav-links');
  navLinks.classList.toggle('active');
});

// Get all elements
const loginToggle = document.getElementById("loginToggle");
const registerToggle = document.getElementById("registerToggle");
const loginForm = document.getElementById("loginForm");
const registerForm = document.getElementById("registerForm");
const userRole = document.getElementById("userRole");

// Toggle between Login and Register forms
loginToggle.addEventListener("click", () => {
  loginForm.classList.remove("hidden");
  registerForm.classList.add("hidden");
  loginToggle.classList.add("active");
  registerToggle.classList.remove("active");
});

registerToggle.addEventListener("click", () => {
  loginForm.classList.add("hidden");
  registerForm.classList.remove("hidden");
  registerToggle.classList.add("active");
  loginToggle.classList.remove("active");
});

// Function to display messages
function showMessage(message, isSuccess) {
  console.log(`Message: ${message}, Success: ${isSuccess}`); // Debug log
  
  // Create message element if it doesn't exist
  let messageBox = document.querySelector('.message-box');
  if (!messageBox) {
    messageBox = document.createElement('div');
    messageBox.className = 'message-box';
    document.querySelector('.form-wrapper').insertBefore(messageBox, document.querySelector('.form-toggle'));
  }
  
  // Set message content and style
  messageBox.textContent = message;
  messageBox.className = `message-box ${isSuccess ? 'success' : 'error'}`;
  
  // Automatically remove message after 5 seconds
  setTimeout(() => {
    messageBox.classList.add('fade-out');
    setTimeout(() => {
      if (messageBox.parentNode) { // Check if element still exists
        messageBox.remove();
      }
    }, 500);
  }, 5000);
}

// Login form submission
loginForm.addEventListener("submit", (e) => {
  e.preventDefault();
  
  const email = document.getElementById("loginEmail")?.value.trim();
  const password = document.getElementById("loginPassword")?.value.trim();
  const role = userRole.value;

  if (!email || !password) {
    showMessage("Please enter all login fields.", false);
    return;
  }

  // Create form data for AJAX request
  const formData = new FormData();
  formData.append('action', 'login');
  formData.append('email', email);
  formData.append('password', password);
  formData.append('role', role);
  
  console.log(`Attempting login with email: ${email}, role: ${role}`); // Debug log
  
  // Send AJAX request
  fetch('login_process.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return response.json();
  })
  .then(data => {
    console.log('Login response:', data); // Debug log
    if (data.success) {
      showMessage(data.message, true);
      loginForm.reset();
      
      // Redirect to appropriate dashboard
      setTimeout(() => {
        window.location.href = data.redirect;
      }, 1500);
    } else {
      showMessage(data.message, false);
    }
  })
  .catch(error => {
    console.error("Login Error:", error);
    showMessage("An error occurred. Please try again later.", false);
  });
});

// Register form submission
registerForm.addEventListener("submit", (e) => {
  e.preventDefault();
  
  const name = document.getElementById("registerName")?.value.trim();
  const email = document.getElementById("registerEmail")?.value.trim();
  const address = document.getElementById("registerAddress")?.value.trim();
  const password = document.getElementById("registerPassword")?.value.trim();
  const role = userRole.value;

  if (!name || !email || !password || !address) {
    showMessage("Please fill in all register fields.", false);
    return;
  }
  
  // Basic email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    showMessage("Please enter a valid email address.", false);
    return;
  }
  
  // Password validation
  if (password.length < 6) {
    showMessage("Password must be at least 6 characters long.", false);
    return;
  }

  // Create form data for AJAX request
  const formData = new FormData();
  formData.append('action', 'register');
  formData.append('name', name);
  formData.append('email', email);
  formData.append('address', address);
  formData.append('password', password);
  formData.append('role', role);
  
  console.log(`Attempting registration with email: ${email}, role: ${role}`); // Debug log
  
  // Send AJAX request
  fetch('login_process.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return response.json();
  })
  .then(data => {
    console.log('Registration response:', data); // Debug log
    if (data.success) {
      showMessage(data.message, true);
      registerForm.reset();
      
      // Switch to login form after successful registration
      setTimeout(() => {
        loginToggle.click();
      }, 1500);
    } else {
      showMessage(data.message, false);
    }
  })
  .catch(error => {
    console.error("Registration Error:", error);
    showMessage("An error occurred. Please try again later.", false);
  });
});