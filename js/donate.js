document.getElementById('donateForm').addEventListener('submit', async (e) => {
    e.preventDefault();
  
    const foodType = document.getElementById('foodType').value;
    const quantity = document.getElementById('quantity').value;
    const contactDetails = document.getElementById('contactDetails').value;
  
    try {
      const response = await fetch('http://localhost:5000/donate', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ foodType, quantity, contactDetails }),
      });
  
      const data = await response.json();
      alert(data.message); // Show the response message
    } catch (error) {
      console.log(error);
      alert('Error donating food');
    }
  });
  