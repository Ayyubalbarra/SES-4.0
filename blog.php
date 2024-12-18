<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: blog.php");
    exit;
}

// Menghubungkan ke database
include('assets/includes/db.php');

// Ambil data blog dari database
$sql = "SELECT * FROM blogs ORDER BY created_at DESC LIMIT 5"; // Mengambil 5 blog terbaru
$result = $conn->query($sql);

$blogs = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $blogs[] = $row;
    }
} else {
    $message = "Tidak ada blog yang ditemukan.";
}
?>
<?php include('includes/navbar.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sustainable Lighting</title>
    <link rel="stylesheet" href="../css/blogs.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script src="ses.js" defer></script>
</head>
<body>
    <div class="container">
        <div class="header">Lighting the Space, Smart Tips & Trends</div>

        <div class="blog-section">
            <!-- Main Post -->
            <?php if (!empty($blogs)): ?>
                <?php foreach ($blogs as $index => $blog): ?>
                    <div class="main-post">
                        <?php 
                            // Jika gambar ada, tampilkan gambar; jika tidak, tampilkan placeholder
                            $image = $blog['image'] ? 'data:image/jpeg;base64,'.base64_encode($blog['image']) : 'your-image.jpg';
                        ?>
                        <img src="<?= $image ?>" alt="Smart Lighting">
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

            <!-- Side Posts -->
            <div class="side-posts">
                <?php if (!empty($blogs)): ?>
                    <?php foreach ($blogs as $blog): ?>
                        <div class="side-post">
                            <img src="<?= $image ?>" alt="Smart Lighting">
                            <div class="content">
                                <h3><?= htmlspecialchars($blog['title']) ?></h3>
                                <p><?= substr(htmlspecialchars($blog['content']), 0, 100) . '...' ?></p>
                                <div class="categories">
                                    <a href="#" class="category"><?= htmlspecialchars($blog['category']) ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="title">Popular Article</div>
        <div class="subtitle">Don't miss the wave!</div>
        <div class="card-container">
            <?php foreach ($blogs as $blog): ?>
                <div class="card">
                    <img src="<?= $image ?>" alt="Smart Lighting">
                    <div class="card-content">
                        <div class="card-title"><?= htmlspecialchars($blog['title']) ?></div>
                        <div class="card-description"><?= substr(htmlspecialchars($blog['content']), 0, 120) . '...' ?></div>
                        <div class="card-category"><?= htmlspecialchars($blog['category']) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<script>
// Pilih semua elemen dengan kelas .cta-button
const ctaButtons = document.querySelectorAll('.cta-button');

// Loop melalui semua tombol dan tambahkan event listener
ctaButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Ganti nilai isLoggedIn dengan status login yang sesuai
        const isLoggedIn = false; // Contoh: ganti dengan logika status login yang sebenarnya

        if (!isLoggedIn) {
            window.location.href = '../php/Login1.php'; // Redirect ke halaman login jika belum login
        } else {
            // Tindakan yang akan dilakukan jika sudah login
            alert('Proceeding to book a consultation...');
        }
    });
});

</script>

</body>
</html> 
<?php include('includes/footer.php') ?>