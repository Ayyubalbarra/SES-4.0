<?php
session_start();
include 'includes/db.php';

// Pastikan admin telah login
if (!isset($_SESSION['admin'])) {
    die("Access denied. Please log in as admin.");
}

// Ambil nama admin yang login
$author = $_SESSION['admin'];

// Handler untuk permintaan POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        // Tambah Blog
        if ($_POST['action'] === 'add') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];
            $image = $_FILES['image']['tmp_name']; // File gambar

            // Simpan file gambar
            $imageData = file_get_contents($image);

            // Ambil nilai display_order terbesar
            $result = $conn->query("SELECT MAX(display_order) AS max_order FROM blogs");
            $row = $result->fetch_assoc();
            $newDisplayOrder = $row['max_order'] + 1;

            // Tambahkan blog baru
            $stmt = $conn->prepare("INSERT INTO blogs (title, content, category, image, visible, display_order, author) 
                                    VALUES (?, ?, ?, ?, 1, ?, ?)");
            $stmt->bind_param("ssssis", $title, $content, $category, $imageData, $newDisplayOrder, $author);
            if ($stmt->execute()) {
                echo "Blog added successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        // Hapus Blog
        if ($_POST['action'] === 'delete') {
            $deleteId = $_POST['id'];

            // Hapus blog berdasarkan ID
            if ($conn->query("DELETE FROM blogs WHERE id = $deleteId")) {
                echo "Blog deleted successfully!";

                // Atur ulang urutan tampilan
                $result = $conn->query("SELECT id FROM blogs WHERE visible = 1 ORDER BY display_order ASC");
                if ($result && $result->num_rows > 0) {
                    $blogs = [];
                    while ($row = $result->fetch_assoc()) {
                        $blogs[] = $row['id'];
                    }
                    foreach ($blogs as $index => $blogId) {
                        $newOrder = $index + 1;
                        $conn->query("UPDATE blogs SET display_order = $newOrder WHERE id = $blogId");
                    }
                }
            } else {
                echo "Error: " . $conn->error;
            }
        }

        // Update Urutan Blog
        if ($_POST['action'] === 'update_order') {
            $order = $_POST['order']; // Array ID blog dari AJAX
            foreach ($order as $index => $blogId) {
                $newOrder = $index + 1;
                $conn->query("UPDATE blogs SET display_order = $newOrder WHERE id = $blogId");
            }
            echo "Blog order updated successfully!";
        }
    }
}

// Tutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>

    <!-- Form Tambah Blog -->
    <h2>Tambah Blog Baru</h2>
    <form action="uploadblog.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add">
        <label for="title">Judul Blog:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="content">Konten Blog:</label>
        <textarea id="content" name="content" required></textarea><br><br>

        <label for="category">Kategori:</label>
        <input type="text" id="category" name="category" required><br><br>

        <label for="image">Upload Gambar:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <button type="submit">Tambah Blog</button>
    </form>

    <hr>

    <!-- Form Hapus Blog -->
    <h2>Hapus Blog</h2>
    <form action="uploadblog.php" method="POST">
        <input type="hidden" name="action" value="delete">
        <label for="id">ID Blog:</label>
        <input type="number" id="id" name="id" required><br><br>

        <button type="submit">Hapus Blog</button>
    </form>

    <hr>

    <!-- Urutan Blog -->
    <h2>Urutan Blog</h2>
    <ul id="blogList">
        <?php
        include 'includes/db.php';
        $result = $conn->query("SELECT id, title FROM blogs ORDER BY display_order ASC");
        while ($row = $result->fetch_assoc()) {
            echo '<li data-id="' . $row['id'] . '">' . htmlspecialchars($row['title']) . '</li>';
        }
        $conn->close();
        ?>
    </ul>
    <button id="updateOrder">Update Urutan</button>

    <script>
        document.getElementById("updateOrder").addEventListener("click", function () {
            const listItems = document.querySelectorAll("#blogList li");
            const order = Array.from(listItems).map(item => item.dataset.id);

            fetch("uploadblog.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ action: "update_order", order: order })
            })
            .then(response => response.text())
            .then(message => alert(message));
        });
    </script>
</body>
</html>
