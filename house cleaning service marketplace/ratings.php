<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rating Form</title>
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

    .rating {
      display: flex;
      justify-content: space-around;
      margin-bottom: 15px;
    }

    .rating input {
      display: none;
    }

    .rating label {
      font-size: 30px;
      color: #ccc;
      cursor: pointer;
    }

    .rating input:checked ~ label {
      color: #f39c12;
    }

    .rating input:hover ~ label,
    .rating label:hover,
    .rating label:hover ~ label {
      color: #f39c12;
    }

    .rating input:not(:checked) + label:hover,
    .rating input:not(:checked) + label:hover ~ label {
      color: #f39c12;
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
    <h2>Rate Our Service</h2>
    <form id="ratingForm" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="rating">Rating:</label>
      <div class="rating">
        <input type="radio" id="star5" name="rating" value="5" required>
        <label for="star5">&#9733;</label>
        <input type="radio" id="star4" name="rating" value="4">
        <label for="star4">&#9733;</label>
        <input type="radio" id="star3" name="rating" value="3">
        <label for="star3">&#9733;</label>
        <input type="radio" id="star2" name="rating" value="2">
        <label for="star2">&#9733;</label>
        <input type="radio" id="star1" name="rating" value="1">
        <label for="star1">&#9733;</label>
      </div>

      <label for="comments">Comments:</label>
      <textarea id="comments" name="comments" rows="4" required></textarea>

      <button type="submit">Submit Rating</button>
    </form>
    <div id="response"></div>
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
      $name = $_POST['name'];
      $email = $_POST['email'];
      $rating = $_POST['rating'];
      $comments = $_POST['comments'];

      // Insert data into the database
      $sql = "INSERT INTO rating (name, email, rating, comments)
              VALUES ('$name', '$email', '$rating', '$comments')";

      if ($conn->query($sql) === TRUE) {
          echo "<script>document.getElementById('response').innerText = 'Thank you, $name. Your rating of $rating stars has been received.';</script>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      // Close connection
      $conn->close();
  }
  ?>
</body>
</html>
