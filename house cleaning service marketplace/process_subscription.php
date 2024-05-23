<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
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
    $username = $_POST['username'];
    $service = $_POST['service'];
    $period = $_POST['period'];
    $location = $_POST['location'];

    // Insert data into the database
    $sql = "INSERT INTO custom_subscriptions (username, service, period, location) VALUES ('$username', '$service', '$period', '$location')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Thank you, $username. Your custom subscription has been received.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
