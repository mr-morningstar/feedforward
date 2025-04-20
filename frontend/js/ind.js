// JavaScript for the Donate Food Form Validation
document.addEventListener('DOMContentLoaded', function () {
    const donateForm = document.getElementById('donateForm');
  
    donateForm.addEventListener('submit', function (event) {
      // Prevent form submission if validation fails
      event.preventDefault();
  
      const foodType = document.getElementById('foodType').value.trim();
      const quantity = document.getElementById('quantity').value.trim();
      const contact = document.getElementById('contact').value.trim();
  
      // Basic validation to check if all fields are filled
      if (!foodType || !quantity || !contact) {
        alert("Please fill out all fields.");
        return;
      }
  
      // If validation passes, submit the form (you can replace this with an API call later)
      alert("Food Donation Submitted Successfully!");
      
      // Reset form fields
      donateForm.reset();
    });
  });
  