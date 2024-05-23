<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
  <style>
    /* CSS styles */
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
      margin-bottom: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"], input[type="email"], textarea {
      margin-bottom: 15px;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
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
    <h2>Contact Us</h2>
    <form id="contactForm" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="location">Location:</label>
      <input type="text" id="location" name="location" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="comments">Comments:</label>
      <textarea id="comments" name="comments" rows="4" required></textarea>

      <label for="services">Services Requested:</label>
      <textarea id="services" name="services" rows="4" required></textarea>

      <button type="submit">Submit</button>
    </form>
    <div id="response"></div>
  </div>

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
      $location = $conn->real_escape_string($_POST['location']);
      $email = $conn->real_escape_string($_POST['email']);
      $comments = $conn->real_escape_string($_POST['comments']);
      $services = $conn->real_escape_string($_POST['services']);

      $sql = "INSERT INTO contact_us (Name, Location, Email, Comment, Service_requested)
              VALUES ('$name', '$location', '$email', '$comments', '$services')";

      if ($conn->query($sql) === TRUE) {
          echo "<script>document.getElementById('response').innerText = 'Thank you, $name. We have received your request.';</script>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
  }
  ?>
</body>
</html>
