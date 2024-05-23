<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    
    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    h2 {
      text-align: center;
    }
    
    form {
      display: grid;
      grid-gap: 10px;
    }
    
    label {
      font-weight: bold;
    }
    
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    textarea,
    select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
    }
    
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Book Home Cleaning Service</h2>
    <form id="bookingForm" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" required>

      <label for="address">Address:</label>
      <textarea id="address" name="address" rows="4" required></textarea>

      <label for="cleaningType">Cleaning Type:</label>
      <select id="cleaningType" name="cleaningType" required>
        <option value="">Select Cleaning Type</option>
        <option value="Regular">Regular Cleaning</option>
        <option value="Deep">Deep Cleaning</option>
        <option value="MoveInMoveOut">Move-in/Move-out Cleaning</option>
      </select>

      <label for="date">Preferred Date:</label>
      <input type="date" id="date" name="date" required>

      <label for="time">Preferred Time:</label>
      <input type="time" id="time" name="time" required>

      <label for="comments">Comments:</label>
      <textarea id="comments" name="comments" rows="4"></textarea>

      <input type="submit" value="Submit">
    </form>
  </div>

  <script>
    // JavaScript code (if needed)
  </script>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $servername = "localhost";
      $db_username = "root";
      $db_password = "";
      $database = "home_cleaning_services_marketplace";

      // Create connection
      $conn = new mysqli($servername, $db_username, $db_password, $database);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $name = $conn->real_escape_string($_POST['name']);
      $email = $conn->real_escape_string($_POST['email']);
      $phone = $conn->real_escape_string($_POST['phone']);
      $address = $conn->real_escape_string($_POST['address']);
      $cleaningType = $conn->real_escape_string($_POST['cleaningType']);
      $date = $conn->real_escape_string($_POST['date']);
      $time = $conn->real_escape_string($_POST['time']);
      $comments = $conn->real_escape_string($_POST['comments']);

      $sql = "INSERT INTO booking (name, email, phone, address, cleaning_type, date, time, comments)
              VALUES ('$name', '$email', '$phone', '$address', '$cleaningType', '$date', '$time', '$comments')";

      if ($conn->query($sql) === TRUE) {
          echo "<script>alert('Booking Successful!');</script>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
  }
  ?>
</body>
</html>
