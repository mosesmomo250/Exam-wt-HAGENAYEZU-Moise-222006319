<?php
// config.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "home_cleaning_services_marketplace";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total number of bookings from the database
$sql_bookings = "SELECT COUNT(*) AS total_bookings FROM booking";
$result_bookings = $conn->query($sql_bookings);
$total_bookings = $result_bookings->fetch_assoc()['total_bookings'];

// Fetch total number of cleaners from the database
$sql_cleaners = "SELECT COUNT(*) AS total_cleaners FROM cleaners";
$result_cleaners = $conn->query($sql_cleaners);
$total_cleaners = $result_cleaners->fetch_assoc()['total_cleaners'];

// Fetch total number of messages from the database
$sql_messages = "SELECT COUNT(*) AS total_messages FROM message";
$result_messages = $conn->query($sql_messages);
$total_messages = $result_messages->fetch_assoc()['total_messages'];

// Fetch total number of custom subscriptions from the database
$sql_subscriptions = "SELECT COUNT(*) AS total_subscriptions FROM custom_subscriptions";
$result_subscriptions = $conn->query($sql_subscriptions);
$total_subscriptions = $result_subscriptions->fetch_assoc()['total_subscriptions'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home Cleaning Services Marketplace</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container1 {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container1 h1 {
            font-size: 45px;
            color: #333;
            margin-bottom: 30px;
        }

        .container1 label {
            display: block;
            font-size: 18px;
            color: #333;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        .container1 input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
            margin-top: 20px;
        }

        .container1 input[type="submit"]:hover {
            background-color: #218838;
        }

        .container1 p {
            text-align: center;
            margin-top: 20px;
        }

        .container1 p a {
            color: #007bff;
            text-decoration: none;
        }

        .container1 p a:hover {
            text-decoration: underline;
        }

        .sidebar {
            width: 250px;
            float: left;
            background-color: #333;
            padding: 20px;
            box-sizing: border-box;
        }

        .sidebar h2 {
            font-size: 24px;
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            background-color: #444;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            text-align: center;
        }

        .sidebar a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            transition: all 0.3s ease;
            display: block;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
        }

        .content h2 {
            color: #333;
            margin-bottom: 20px;
        }

        section {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        section:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        h2 {
           text-align: center;
           font-size: 24px;
           color: #333;
        }

        #overview h2 {
            font-size: 24px;
            color: #333;
        }

        #overview {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #overview p {
            text-align: center;
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        #overview ul {
            list-style-type: none;
            padding: 0;
        }

        #overview li {
            font-size: 18px;
            color: #333;
            margin-bottom: 5px;
        }

        .navbar {
            background-color: #4CAF50 !important;
            border-bottom: 2px solid #009688 !important;
        }

        .navbar .container-fluid {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .navbar-brand h1 {
            color: #fff !important;
            font-size: 24px !important;
            margin: 0 !important;
        }

        .navbar .navbar-nav {
            display: flex;
            flex-direction: row;
        }

        .navbar .navbar-nav .nav-item {
            margin-left: 15px;
        }

        .navbar .navbar-nav .nav-link {
            color: #fff !important;
            font-size: 18px !important;
            padding: 10px 15px !important;
            transition: background-color 0.3s ease;
        }

        .navbar .navbar-nav .nav-link:hover {
            background-color: #009688 !important;
            color: #fff !important;
            border-radius: 5px !important;
        }

        .dropdown-menu {
            background-color: #4CAF50;
            border: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
        }

        .dropdown-menu .dropdown-item {
            color: #fff !important;
            transition: background-color 0.3s ease;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #009688 !important;
        }

        .footer {
            background-color: #333 !important;
            color: #fff !important;
            padding: 40px 0 !important;
        }

        .footer a {
            color: #fff !important;
            transition: color 0.3s ease !important;
        }

        .footer a:hover {
            color: #ccc !important;
        }

        .footer .col-md-6 {
            margin-bottom: 20px !important;
        }

        .footer h1 {
            font-size: 28px !important;
            font-weight: bold !important;
        }

        .footer p {
            font-size: 16px !important;
            margin-bottom: 10px !important;
        }

        .footer .social-links a {
            display: inline-block !important;
            color: #fff !important;
            font-size: 18px !important;
            width: 40px !important;
            height: 40px !important;
            line-height: 40px !important;
            text-align: center !important;
            margin: 0 10px !important;
            border-radius: 50% !important;
            background-color: #009688 !important;
            transition: background-color 0.3s ease !important;
        }

        .footer .social-links a:hover {
            background-color: #00796B !important;
        }

        .social-links {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <h1 class="fw-bold text-white m-0">Home<span class="text-primary">Cleaning</span></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="service.php">Services</a></li>
                            <li><a class="dropdown-item" href="quote.php">Get A Quote</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="container1">
        <div class="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="booking.php">Bookings</a></li>
                <li><a href="cleaners.php">Cleaners</a></li>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="subscriptions.php">Subscriptions</a></li>
            </ul>
        </div>

        <div class="content">
            <section id="overview">
                <h2>Overview</h2>
                <p>Total Bookings: <?php echo $total_bookings; ?></p>
                <p>Total Cleaners: <?php echo $total_cleaners; ?></p>
                <p>Total Messages: <?php echo $total_messages; ?></p>
                <p>Total Subscriptions: <?php echo $total_subscriptions; ?></p>
            </section>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="footer">
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                    <h1 class="fw-bold text-white m-0">Home<span class="text-primary">Cleaning</span></h1>
                    <p>Providing the best home cleaning services at affordable prices. Your satisfaction is our priority.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <h1 class="fw-bold text-white m-0">Get A Quote</h1>
                    <p>Call us now at +250 780 000 000 to get a free quote for your home cleaning needs.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-4 mt-md-0">
                    <h1 class="fw-bold text-white m-0">Contact Us</h1>
                    <p>info@hcsm.com</p>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center border-top pt-4">
            <p>&copy; <a href="#">Home Cleaning Services Marketplace</a>. All Rights Reserved.</p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
