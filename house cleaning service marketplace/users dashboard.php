<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <!-- Add Font Awesome CSS link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    /* Wrapper container for background image */
    .background-container {
      background-image: url('image 1.jpg'); 
      background-size: cover;
      min-height: 100vh;
      padding-bottom: 80px; /* Height of the footer */
    }

    .navbar {
      background-color: #007bff;
      overflow: hidden;
    }
    
    .navbar a {
      float: left;
      display: block;
      color: #fff;
      text-align: center;
      padding: 14px 20px;
      text-decoration: none;
    }
    
    .navbar a:hover {
      background-color: #0056b3;
    }
    
    .container {
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8); 
      border-radius: 10px;
      margin: 20px auto;
      max-width: 800px;
    }

    .hidden {
      display: none;
    }

    /* Footer styling */
    .footer {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 20px;
      width: 100%;
      position: fixed;
      bottom: 0;
    }

    .social-icons {
      list-style-type: none;
      padding: 0;
    }

    .social-icons li {
      display: inline-block;
      margin-right: 10px;
    }

    .social-icons li:last-child {
      margin-right: 0;
    }

    .social-icons a {
      color: #fff;
      text-decoration: none;
      font-size: 20px;
    }
  </style>
</head>
<body>
  <!-- Background container -->
  <div class="background-container">
    <div class="navbar">
      <a href="services.html" onclick="showForm('services')">Services</a>
      <a href="subscription.html" onclick="showForm('subscription')">Subscription</a>
      <a href="ratings.html" onclick="showForm('rating')">Rating</a>
      <a href="payment.html" onclick="showForm('payment')">Payment</a>
      <a href="contacts.html" onclick="showForm('contacts')">Contact us</a>
      <a href="booking.html" onclick="showForm('booking')">Booking</a>
      <a href="cleaners.html" onclick="showForm('cleaners')">Cleaners</a>
      <a href="about.html" onclick="showForm('about')">about</a>
      <a href="get started.php" style="float: right;">Logout</a>
    </div>

    <div class="container" id="services" style="display: none;">
      <h2>Services Form</h2>
      <!-- Add your services form here -->
    </div>

    <div class="container" id="subscription" style="display: none;">
      <h2>Subscription Form</h2>
      <!-- Add your subscription form here -->
    </div>

    <div class="container" id="rating" style="display: none;">
      <h2>Rating Form</h2>
      <!-- Add your rating form here -->
    </div>

    <div class="container" id="payment" style="display: none;">
      <h2>Payment Form</h2>
      <!-- Add your payment form here -->
    </div>

    <div class="container" id="contacts" style="display: none;">
      <h2>Contacts Form</h2>
      <!-- Add your contacts form here -->
    </div>

    <div class="container" id="booking" style="display: none;">
      <h2>Booking Form</h2>
      <!-- Add your booking form here -->
    </div>

    <div class="container" id="cleaners" style="display: none;">
      <h2>Cleaners Form</h2>
      <!-- Add your cleaners form here -->
    </div>
  </div>

  <!-- Footer section with social media icons -->
  <div class="footer">
    <ul class="social-icons">
      <li><a href="#"><i class="fab fa-facebook"></i></a></li>
      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
      <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
    </ul>
    <p>&copy; 2024 Your Company Name. All rights reserved.</p>
  </div>

  <script>
    function showForm(formId) {
      var forms = document.querySelectorAll('.container');
      for (var i = 0; i < forms.length; i++) {
        forms[i].style.display = 'none';
      }
      document.getElementById(formId).style.display = 'block';
    }
  </script>
</body>
</html>
