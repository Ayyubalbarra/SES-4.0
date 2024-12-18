<?php 
// Sertakan koneksi database
include('includes/db.php');
session_start();

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
</head>
<body>
    <div class="container">
        <div class="header">Lighting the Space, Smart Tips & Trends</div>

        <!-- Blog Section -->
        <div class="blog-section">
            <?php if (!empty($blogs)): ?>
                <?php foreach ($blogs as $blog): ?>
                    <div class="main-post">
                        <?php 
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
    </div>

    <!-- Fitur Khusus Admin -->
    <?php if (isset($_SESSION['admin'])): ?>
        <div class="admin-section">
            <a href="create_blog.php">+ Tambah Blog Baru</a>
        </div>
    <?php endif; ?>

</body>
</html>

<?php include('includes/footer.php'); ?>
