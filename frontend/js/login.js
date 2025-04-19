const loginToggle = document.getElementById('loginToggle');
const registerToggle = document.getElementById('registerToggle');
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');

// Toggle forms
loginToggle.addEventListener('click', () => {
  loginForm.classList.remove('hidden');
  registerForm.classList.add('hidden');
  loginToggle.classList.add('active');
  registerToggle.classList.remove('active');
});

registerToggle.addEventListener('click', () => {
  loginForm.classList.add('hidden');
  registerForm.classList.remove('hidden');
  loginToggle.classList.remove('active');
  registerToggle.classList.add('active');
});

// Login Form Submit
loginForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const email = document.getElementById('loginEmail').value.trim();
  const password = document.getElementById('loginPassword').value.trim();

  if (!email || !password) {
    alert("Please enter all login fields.");
    return;
  }

  alert("Login form submitted ✅");
  loginForm.reset();
});

// Register Form Submit
registerForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const name = document.getElementById('registerName').value.trim();
  const email = document.getElementById('registerEmail').value.trim();
  const password = document.getElementById('registerPassword').value.trim();

  if (!name || !email || !password) {
    alert("Please fill in all register fields.");
    return;
  }

  alert("Registration form submitted ✅");
  registerForm.reset();
});
