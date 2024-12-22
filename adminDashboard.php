<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: adminDashboard.php");
    exit;
}

include 'includes/db.php';

// Ambil total data dari database
$totalUsers = 0;
$totalReports = 0;
$totalTransactions = 0;

try {
    // Total Pengguna
    $result = $conn->query("SELECT COUNT(id_user) AS total FROM user");
    if ($result) {
        $row = $result->fetch_assoc();
        $totalUsers = $row['total'];
    }

    // Total Laporan
    $result = $conn->query("SELECT COUNT(id) AS total FROM consultation_form");
    if ($result) {
        $row = $result->fetch_assoc();
        $totalReports = $row['total'];
    }

    // Total Transaksi
    $result = $conn->query("SELECT COUNT(id) AS total FROM products");
    if ($result) {
        $row = $result->fetch_assoc();
        $totalTransactions = $row['total'];
    }
} catch (Exception $e) {
    echo "Error retrieving statistics: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="assets/css/adminDashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="sidebar">
    <div class="sidebar-header">
        <h3>Admin Dashboard</h3>
    </div>
    <ul class="sidebar-menu">
        <li><a href="#">Home</a></li>
        <li><a href="#">User consultation</a></li>
        <li><a href="uploadBlog.php">Upload blog</a></li>
        <li><a href="manageProducts.php">Manage Products</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

    <div class="main-content">
        <div class="welcome">
            <h2>Selamat datang, Admin!</h2>
            <p>Anda berhasil login ke dashboard.</p>
        </div>

        <div class="statistics">
            <div class="stat-box">
                <h3>Total Pengguna</h3>
                <p><?= $totalUsers; ?></p>
            </div>
            <div class="stat-box">
                <h3>Total Laporan</h3>
                <p><?= $totalReports; ?></p>
            </div>
            <div class="stat-box">
                <h3>Total Transaksi</h3>
                <p><?= $totalTransactions; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
