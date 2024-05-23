<?php
session_start();

// Database configuration
$servername = "localhost";
$db_username = "root"; // replace with your database username
$db_password = ""; // replace with your database password
$dbname = "home_cleaning_services_marketplace"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $input_username);

    // Execute the statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($username, $hashed_password);

    // Fetch the result
    if ($stmt->fetch()) {
        // Verify password
        if (password_verify($input_password, $hashed_password)) {
            // Password is correct, start a new session
            $_SESSION['username'] = $input_username;
            $_SESSION['password'] = $input_password;

            // Redirect to a new page or perform further actions
            header("Location: dashboard.php");
            exit();
        } else {
            // Password is incorrect
            $message = "Invalid username or password. Please try again.";
        }
    } else {
        // Username not found
        $message = "Invalid username or password. Please try again.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <style>
    .container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }

    #message {
      margin-top: 20px;
      font-weight: bold;
    }

    .success {
      color: green;
    }

    .error {
      color: red;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login Form</h2>
    <form id="loginForm" action="" method="POST">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Login</button>
    </form>
    <div id="message" class="<?= $message ? 'error' : ''; ?>"><?= $message; ?></div>
    <p>Don't have an account? <a href="registration.php">Register here</a>.</p>
  </div>
  <script>
    document.getElementById("loginForm").addEventListener("submit", function(event) {
      var messageElement = document.getElementById("message");
      <?php if (!empty($message)) { ?>
      messageElement.textContent = "<?= $message ?>";
      messageElement.className = "error";
      <?php } ?>
    });
  </script>
</body>
</html>
