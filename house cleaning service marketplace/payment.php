<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Page</title>
  <style>
    /* CSS styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .section {
      margin-bottom: 20px;
    }

    .section h3 {
      margin-bottom: 10px;
    }

    /* Form styling */
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"], input[type="email"], input[type="date"], input[type="number"] {
      margin-bottom: 15px;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 100%;
    }

    select {
      margin-bottom: 15px;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 100%;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      color: #fff;
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }

    #response {
      margin-top: 20px;
      font-size: 16px;
      color: green;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Payment Details</h2>
    
    <div class="section">
      <h3>Terms and Conditions</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget ullamcorper eros. Sed efficitur, eros a suscipit facilisis, lorem turpis tincidunt dui, at convallis libero ante vel orci. In nec nisi non leo facilisis pharetra nec eu libero. Integer sit amet arcu sit amet velit sodales sagittis.
      </p>
    </div>
    
    <div class="section">
      <h3>Personal Details</h3>
      <form id="paymentForm" method="POST">
        <label for="payerName">Name:</label>
        <input type="text" id="payerName" name="payerName" required>

        <label for="payerEmail">Email:</label>
        <input type="email" id="payerEmail" name="payerEmail" required>
        
        <label for="payerLocation">Location:</label>
        <input type="text" id="payerLocation" name="payerLocation" required>

        <label for="paymentMethod">Payment Method:</label>
        <select id="paymentMethod" name="paymentMethod" required>
          <option value="Credit Card">Credit Card</option>
          <option value="Debit Card">Debit Card</option>
          <option value="PayPal">PayPal</option>
          <option value="Bank Transfer">Bank Transfer</option>
        </select>
        
        <label for="paymentAmount">Payment Amount:</label>
        <input type="number" id="paymentAmount" name="paymentAmount" required>
        
        <label for="paymentDate">Payment Date:</label>
        <input type="date" id="paymentDate" name="paymentDate" required>

        <button type="submit">Submit Payment</button>
      </form>
      <div id="response"></div>
    </div>
  </div>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "home_cleaning_services_marketplace";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $database);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Prepare data for insertion
      $payerName = $_POST['payerName'];
      $payerEmail = $_POST['payerEmail'];
      $payerLocation = $_POST['payerLocation'];
      $paymentMethod = $_POST['paymentMethod'];
      $paymentAmount = $_POST['paymentAmount'];
      $paymentDate = $_POST['paymentDate'];

      // Insert data into the database
      $sql = "INSERT INTO payment (payerName, payerEmail, payerLocation, paymentMethod, paymentAmount, paymentDate)
              VALUES ('$payerName', '$payerEmail', '$payerLocation', '$paymentMethod', '$paymentAmount', '$paymentDate')";

      if ($conn->query($sql) === TRUE) {
          echo "<script>document.getElementById('response').innerText = 'Thank you, $payerName. Your payment has been received.';</script>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      // Close connection
      $conn->close();
  }
  ?>
</body>
</html>
