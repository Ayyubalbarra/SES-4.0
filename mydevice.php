<?php
// Memulai sesi
session_start();

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: login.php");
    exit();
}

// Mengambil data pengguna yang sedang login
$user_name = $_SESSION['user_name'];  // Nama pengguna yang disimpan dalam sesi

// Menghubungkan file db.php
include('includes/db.php');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>

<?php include('includes/navbarDashboard.php'); ?>

<h1>Welcome, <?php echo htmlspecialchars($user_name); ?></h1>

<a href="form.php" class="button">+ Connect a device</a>

<!-- Tab Section -->
<div class="tab">
    <button class="<?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>" onclick="setActiveTab(event, 'consultationHistory')">Consultation History</button>
    <button class="<?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>" onclick="setActiveTab(event, 'myDevice')">My Device</button>
    <button onclick="setActiveTab(event, 'profile')">Profile</button>
</div>



<p><a href="logout.php">Logout</a></p>

</body>
</html>

<?php include('includes/tab.php'); ?>
<?php
$conn->close();
?>

<p><a href="logout.php">logout</a></p>