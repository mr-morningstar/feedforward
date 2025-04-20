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

// Login form submission
loginForm.addEventListener("submit", (e) => {
  e.preventDefault();
  
  const email = document.getElementById("loginEmail")?.value.trim();
  const password = document.getElementById("loginPassword")?.value.trim();
  const role = userRole.value;

  if (!email || !password) {
    alert("❌ Please enter all login fields.");
    return;
  }

  alert(`✅ Login successful as ${role.toUpperCase()}!`);
  loginForm.reset();
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
    alert("❌ Please fill in all register fields.");
    return;
  }

  alert(`✅ Registered successfully as ${role.toUpperCase()}!`);
  registerForm.reset();
});
