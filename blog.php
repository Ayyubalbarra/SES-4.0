<?php
// Sertakan file koneksi database
include 'includes/db.php';
include('includes/navbar.php');

// Query untuk mengambil data blog dari database
$sql = "SELECT id, title, content, category, author, created_at, image, visible FROM blogs ORDER BY created_at DESC"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
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
</head>
<body>

    <div class="container">
        <div class="header">Lighting the Space, Smart Tips & Trends</div>

        <div class="blog-section">
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
        </div>
    </div>

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
</body>

</html>
<?php include('includes/footer.php'); ?>

<?php
// Tutup koneksi database
$conn->close();
?>