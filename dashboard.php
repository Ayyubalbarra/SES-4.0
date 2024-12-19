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

// Mengambil data form konsultasi dari database
$sql = "SELECT * FROM consultation_form ORDER BY created_at DESC";
$result = $conn->query($sql);

// Menarik data konsultasi yang sedang berjalan (status 'running')
$sql_running = "SELECT * FROM consultation_form WHERE status = 'running'";
$result_running = $conn->query($sql_running);

// Menarik data konsultasi yang sudah selesai (status 'finished')
$sql_finished = "SELECT * FROM consultation_form WHERE status = 'finished'";
$result_finished = $conn->query($sql_finished);
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

<a href="form.php" class="button">+ Book a Consultation</a>

<div class="container">
    <div class="card">
        <h2>Running Consultation</h2>
        <?php if ($result_running->num_rows > 0): ?>
            <ul>
                <?php while($row = $result_running->fetch_assoc()): ?>
                    <li><a href="details.php?id=<?php echo $row['id']; ?>"><?php echo $row['company_name']; ?> - <?php echo $row['company_field']; ?> </a></li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>You don't have any running consultation yet.</p>
        <?php endif; ?>
    </div>

    <div class="card">
        <h2>Finished Consultation</h2>
        <?php if ($result_finished->num_rows > 0): ?>
            <ul>
                <?php while($row = $result_finished->fetch_assoc()): ?>
                    <li><?php echo $row['company_name']; ?> - <?php echo $row['company_field']; ?> (Status: <?php echo $row['status']; ?>)</li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>You don't have any finished consultation yet.</p>
        <?php endif; ?>
    </div>
</div>



<p><a href="logout.php">Logout</a></p>

</body>
</html>
<?php include('includes/tab.php'); ?>

<?php
$conn->close();
?>


<p><a href="logout.php">logout</a></p>