<?php
session_start();

// Cek jika user sudah login
if (isset($_SESSION['admin'])) {
    header("Location: adminDashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('includes/db.php'); // Pastikan ini mengarah ke koneksi database yang benar

    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa data login
    $sql = "SELECT * FROM admin WHERE nama = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password); // Binding parameter untuk username dan password
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika username dan password ditemukan
    if ($result->num_rows > 0) {
        // Set session untuk admin
        $_SESSION['admin'] = $username;
        header("Location: adminDashboard.php");
        exit;
    } else {
        // Jika login gagal
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="assets/css/adminLogin.css">
</head>
<body>
    <div class="login-container">
        <h2>Login Admin</h2>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
