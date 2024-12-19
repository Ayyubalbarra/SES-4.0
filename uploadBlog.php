<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");
    exit;
}

// Menghubungkan ke database
include('db.php');

// Variabel untuk menampung pesan error atau sukses
$message = '';

// Proses pengunggahan blog
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $author = $_SESSION['admin'];  // Admin yang login

    // Validasi form input
    if (empty($title) || empty($content) || empty($category)) {
        $message = "Semua kolom harus diisi!";
    } else {
        // Proses upload gambar
        $image = $_FILES['image'];
        $image_name = $image['name'];
        $image_tmp_name = $image['tmp_name'];
        $image_size = $image['size'];
        $image_error = $image['error'];

        // Validasi apakah ada gambar yang diupload
        if ($image_name) {
            // Cek tipe file gambar
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

            if (!in_array($image_extension, $allowed_extensions)) {
                $message = "Format gambar tidak valid! Hanya JPG, JPEG, PNG, atau GIF yang diizinkan.";
            } elseif ($image_size > 5000000) { // Ukuran maksimal 5MB
                $message = "Ukuran gambar terlalu besar! Maksimal 5MB.";
            } else {
                // Baca gambar dan simpan sebagai BLOB
                $image_content = file_get_contents($image_tmp_name);
                $image_blob = mysqli_real_escape_string($conn, $image_content); // Escape BLOB data

                // Query untuk memasukkan data blog ke database
                $sql = "INSERT INTO blogs (title, content, category, author, created_at, image) 
                        VALUES (?, ?, ?, ?, NOW(), ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssssb', $title, $content, $category, $author, $image_blob);

                if ($stmt->execute()) {
                    $message = "Blog berhasil diupload!";
                } else {
                    $message = "Terjadi kesalahan saat mengupload blog.";
                }
            }
        } else {
            $image_blob = NULL; // Jika tidak ada gambar yang diupload
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Blog - Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/adminDashboard.css">
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
            <li><a href="uploadBlog.php">Upload Blog</a></li>
            <li><a href="#">Pengaturan</a></li>
            <li><a href="../php/logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="welcome">
            <h2>Upload Blog</h2>
            <?php if ($message) { echo "<p class='message'>$message</p>"; } ?>
        </div>

        <div class="upload-blog-form">
            <form method="POST" action="uploadBlog.php" enctype="multipart/form-data">
                <label for="title">Judul Blog:</label>
                <input type="text" name="title" id="title" required>

                <label for="content">Konten Blog:</label>
                <textarea name="content" id="content" rows="10" required></textarea>

                <label for="category">Kategori:</label>
                <select name="category" id="category" required>
                    <option value="Teknologi">Teknologi</option>
                    <option value="Bisnis">Bisnis</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Kesehatan">Kesehatan</option>
                </select>

                <label for="image">Gambar (opsional):</label>
                <input type="file" name="image" id="image" accept="image/*">

                <button type="submit">Upload Blog</button>
            </form>
        </div>
    </div>
</body>
</html>
