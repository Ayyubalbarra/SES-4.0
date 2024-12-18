<?php
session_start(); // Start session

// Session check
if (!isset($_SESSION['user_id'])) {
    header("Location: login1.php");
    exit();
}

// Fetch user data from session
$userName = $_SESSION['user_name'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
   
<nav class="navbar">
        <div class="logo">
            <img src="assets/image/logo hitam.svg" alt="Logo"> <!-- Change path/logo as needed -->
        </div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Explore</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="logout.php">Logout</a></li> <!-- Tambahkan link logout -->
        </ul>
    </nav>

    <div class="container">
    <h1 class="a">Tell us your story,</h1>
    <h1 class="b">and get your advice soon</p>
    </div>
</body>
</html>


<?php include('includes/footer.php'); ?>
