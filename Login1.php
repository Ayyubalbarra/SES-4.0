<?php
session_start();

// Enable detailed error reporting for debugging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Include the database connection
include('includes/db.php');

// Check database connection
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Standard login with email and password
$error_message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Successful login
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                header("Location: ../dashboard.php");
                exit();
            } else {
                // Password is incorrect
                $error_message = 'Password is incorrect.';
            }
        } else {
            // No user found
            $error_message = 'No user found with that email.';
        }
    } else {
        error_log("Query failed: " . $conn->error, 3, 'error.log');
        die("Query failed: " . $conn->error);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login1.css"> <!-- Link to your CSS file -->
    <script>
        <?php if ($error_message): ?>
            alert('<?php echo $error_message; ?>');
        <?php endif; ?>
    </script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="../assets/image/Frame 2.svg" alt="Logo">
        </div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Explore</a></li>
            <li><a href="#">Blog</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="left">
            <h1>Welcome back!</h1>
            <h2>Your next step is just a login away</h2>
            <p>Registering is the first step. Let’s get started!</p>
        </div>
        <div class="right">
            <!-- Standard Login Form -->
            <form method="POST" action="Login1.php">
                <input type="email" name="email" required placeholder="Email">
                <input type="password" name="password" required placeholder="Password">
                <button type="submit">Login</button>
            </form>

            <!-- Register Button -->
            <button class="register-btn" onclick="window.location.href='Register1.php'">Create Account</button>
            <div class="login">
                <p>Forgot password? <a href="register1.php">Reset here</a></p>
            </div>
        </div>
    </div>
</body>
</html>