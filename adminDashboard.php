<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: adminDashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="assets/css/adminDashboard.css">
    <!-- Menggunakan Google Font untuk tampilan lebih menarik -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Admin Dashboard</h3>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#">Beranda</a></li>
            <li><a href="#">Pengguna</a></li>
            <li><a href="uploadBlog.php">Upload blog</a></li>
            <li><a href="#">Pengaturan</a></li>
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
                <p>1200</p>
            </div>
            <div class="stat-box">
                <h3>Total Laporan</h3>
                <p>350</p>
            </div>
            <div class="stat-box">
                <h3>Total Transaksi</h3>
                <p>500</p>
            </div>
        </div>
    </div>
</body>
</html>
