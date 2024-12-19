<?php
// Sertakan file koneksi database
include 'includes/db.php';
include('includes/navbar.php');

<<<<<<< HEAD
// Query untuk mengambil data blog dari database
$sql = "SELECT id, title, content, category, author, created_at, image, visible FROM blogs ORDER BY created_at DESC";
=======
<<<<<<< HEAD
// Query untuk mengambil data blog dari database
$sql = "SELECT id, title, content, category, author, created_at, image, visible FROM blogs ORDER BY created_at DESC";
=======
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
>>>>>>> d4cf400db0bfa3fafba2eecc38f80f5fea87859c
>>>>>>> 51de202674268be2b054d50c89cc3ec4509c9974
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 51de202674268be2b054d50c89cc3ec4509c9974
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Lighting Solutions</title>
    <link rel="stylesheet" href="assets/css/blogs.css" />
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />
    <script src="/assets/script.js" defer></script>
<<<<<<< HEAD
=======
=======
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sustainable Lighting</title>
    <link rel="stylesheet" href="../css/blogs.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <!-- Script -->
    <script src="ses.js" defer></script>
>>>>>>> d4cf400db0bfa3fafba2eecc38f80f5fea87859c
>>>>>>> 51de202674268be2b054d50c89cc3ec4509c9974
</head>
<body>

    <div class="container">
        <div class="header">Lighting the Space, Smart Tips & Trends</div>

        <div class="blog-section">
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 51de202674268be2b054d50c89cc3ec4509c9974
            <!-- Blog Posts -->
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Hanya tampilkan blog jika "visible" adalah true (1)
                    if ($row['visible']) {
                        echo '<div class="main-post">';
                        echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Blog Image">';
                        echo '<div class="content">';
                        echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
                        echo '<p>' . htmlspecialchars(substr($row['content'], 0, 150)) . '...</p>';
                        echo '<div class="categories">';
                        echo '<a href="#" class="category">' . htmlspecialchars($row['category']) . '</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            } else {
                echo '<p>No blogs available.</p>';
            }
            ?>
<<<<<<< HEAD
=======
=======
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
>>>>>>> d4cf400db0bfa3fafba2eecc38f80f5fea87859c
>>>>>>> 51de202674268be2b054d50c89cc3ec4509c9974
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

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 51de202674268be2b054d50c89cc3ec4509c9974
    <div class="container">
        <div class="title">Popular Article</div>
        <div class="subtitle">Don't miss the wave!</div>
        <div class="card-container">
            <?php
            if ($result && $result->num_rows > 0) {
                // Reset pointer ke awal
                $result->data_seek(0);

                while ($row = $result->fetch_assoc()) {
                    if ($row['visible']) {
                        echo '<div class="card">';
                        echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Blog Image">';
                        echo '<div class="card-content">';
                        echo '<div class="card-title">' . htmlspecialchars($row['title']) . '</div>';
                        echo '<div class="card-description">' . htmlspecialchars(substr($row['content'], 0, 100)) . '...</div>';
                        echo '<div class="card-category">' . htmlspecialchars($row['category']) . '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            } else {
                echo '<p>No blogs available.</p>';
            }
            ?>
        </div>
    </div>
<<<<<<< HEAD
=======
=======
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
>>>>>>> d4cf400db0bfa3fafba2eecc38f80f5fea87859c
>>>>>>> 51de202674268be2b054d50c89cc3ec4509c9974
</body>

</html>
<?php include('includes/footer.php'); ?>

<?php
// Tutup koneksi database
$conn->close();
?>