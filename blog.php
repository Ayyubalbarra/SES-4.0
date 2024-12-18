<?php 
// Sertakan koneksi database
include('includes/db.php');
session_start();

// Periksa koneksi database
if (!$conn) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Periksa apakah sesi admin aktif
if (!isset($_SESSION['admin'])) {
    header("Location: Login1.php"); // Redirect ke halaman login
    exit;
}

// Ambil data blog dari database
$sql = "SELECT * FROM blogs ORDER BY created_at DESC LIMIT 5"; 
$result = $conn->query($sql);

$blogs = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $blogs[] = $row;
    }
} else {
    $message = "Tidak ada blog yang ditemukan.";
}
?>

<?php include('includes/navbar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sustainable Lighting</title>
    <link rel="stylesheet" href="../css/blogs.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <!-- Script -->
    <script src="ses.js" defer></script>
</head>
<body>
    <div class="container">
        <div class="header">Lighting the Space, Smart Tips & Trends</div>

        <!-- Blog Section -->
        <div class="blog-section">
            <?php if (!empty($blogs)): ?>
                <!-- Loop untuk blog utama -->
                <?php foreach ($blogs as $blog): ?>
                    <div class="main-post">
                        <?php 
                            // Jika gambar ada, tampilkan gambar; jika tidak, tampilkan placeholder
                            $image = $blog['image'] 
                                ? 'data:image/jpeg;base64,' . base64_encode($blog['image']) 
                                : 'images/placeholder.jpg';
                        ?>
                        <img src="<?= $image ?>" alt="Blog Image" onerror="this.src='images/placeholder.jpg';">
                        <div class="content">
                            <h3><?= htmlspecialchars($blog['title']) ?></h3>
                            <p><?= substr(htmlspecialchars($blog['content']), 0, 200) . '...' ?></p>
                            <div class="categories">
                                <a href="#" class="category"><?= htmlspecialchars($blog['category']) ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No blogs found.</p>
            <?php endif; ?>
        </div>

        <!-- Side Posts -->
        <div class="side-posts">
            <?php foreach ($blogs as $blog): ?>
                <?php 
                    $image = $blog['image'] 
                        ? 'data:image/jpeg;base64,' . base64_encode($blog['image']) 
                        : 'images/placeholder.jpg';
                ?>
                <div class="side-post">
                    <img src="<?= $image ?>" alt="Blog Image" onerror="this.src='images/placeholder.jpg';">
                    <div class="content">
                        <h4><?= htmlspecialchars($blog['title']) ?></h4>
                        <p><?= substr(htmlspecialchars($blog['content']), 0, 100) . '...' ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Popular Articles -->
    <div class="container">
        <div class="title">Popular Articles</div>
        <div class="subtitle">Don't miss the wave!</div>
        <div class="card-container">
            <?php foreach ($blogs as $blog): ?>
                <?php 
                    $image = $blog['image'] 
                        ? 'data:image/jpeg;base64,' . base64_encode($blog['image']) 
                        : 'images/placeholder.jpg';
                ?>
                <div class="card">
                    <img src="<?= $image ?>" alt="Blog Image" onerror="this.src='images/placeholder.jpg';">
                    <div class="card-content">
                        <h5 class="card-title"><?= htmlspecialchars($blog['title']) ?></h5>
                        <p class="card-description"><?= substr(htmlspecialchars($blog['content']), 0, 120) . '...' ?></p>
                        <div class="card-category"><?= htmlspecialchars($blog['category']) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Script untuk Redirect CTA -->
    <script>
    const ctaButtons = document.querySelectorAll('.cta-button');
    ctaButtons.forEach(button => {
        button.addEventListener('click', () => {
            const isLoggedIn = false; // Ganti dengan logika yang benar
            if (!isLoggedIn) {
                window.location.href = '../php/Login1.php';
            } else {
                alert('Proceeding to book a consultation...');
            }
        });
    });
    </script>
</body>
</html>

<?php include('includes/footer.php'); ?>
