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
            $image = $_FILES['image']['tmp_name'];

            $imageData = file_get_contents($image);

            $result = $conn->query("SELECT MAX(display_order) AS max_order FROM blogs");
            $row = $result->fetch_assoc();
            $newDisplayOrder = ($row['max_order'] ?? 0) + 1;

            $stmt = $conn->prepare("INSERT INTO blogs (title, content, category, image, visible, display_order, author) 
                                  VALUES (?, ?, ?, ?, 1, ?, ?)");
            $stmt->bind_param("ssssis", $title, $content, $category, $imageData, $newDisplayOrder, $author);
            
            if ($stmt->execute()) {
                $message = "Blog added successfully!";
                $messageType = "success";
            } else {
                $message = "Error: " . $stmt->error;
                $messageType = "error";
            }
        }

        // Hapus Blog
        if ($_POST['action'] === 'delete') {
            $deleteId = (int)$_POST['id'];
            
            if ($conn->query("DELETE FROM blogs WHERE id = $deleteId")) {
                // Reorder remaining blogs
                $result = $conn->query("SELECT id FROM blogs WHERE visible = 1 ORDER BY display_order ASC");
                $order = 1;
                while ($row = $result->fetch_assoc()) {
                    $conn->query("UPDATE blogs SET display_order = {$order} WHERE id = {$row['id']}");
                    $order++;
                }
                $message = "Blog deleted successfully!";
                $messageType = "success";
            } else {
                $message = "Error: " . $conn->error;
                $messageType = "error";
            }
        }

        // Update Urutan Blog
        if ($_POST['action'] === 'update_order') {
            try {
                // Ambil data urutan dari POST, yang dikirim menggunakan FormData
                $order = json_decode($_POST['order'], true); // Menggunakan $_POST['order'] yang dikirim menggunakan FormData
                
                if (!is_array($order)) {
                    throw new Exception('Invalid order data format');
                }

                // Memperbarui urutan display_order di database
                foreach ($order as $index => $blogId) {
                    $newOrder = $index + 1; // Urutan baru berdasarkan indeks
                    $blogId = (int)$blogId; // Mengkonversi ID menjadi integer
                    $stmt = $conn->prepare("UPDATE blogs SET display_order = ? WHERE id = ?");
                    $stmt->bind_param("ii", $newOrder, $blogId);

                    if (!$stmt->execute()) {
                        throw new Exception('Failed to update order for blog ID: ' . $blogId);
                    }
                }

                echo "Urutan blog berhasil diperbarui!";
                exit;
            } catch (Exception $e) {
                http_response_code(500);
                echo "Error: " . $e->getMessage();
                exit;
            }
        }
    }        
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-8 text-gray-800">Admin Dashboard</h1>
        
        <!-- Back Button -->
        <div class="max-w-4xl mt-8">
            <a href="adminDashboard.php" class="text-gray-600 hover:text-gray-800">
                ← Back to Articles
            </a>
        </div>
        <?php if (isset($message)): ?>
            <div class="mb-4 p-4 rounded <?= $messageType === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <!-- Form Tambah Blog -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-6">Tambah Blog Baru</h2>
            <form action="uploadblog.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                <input type="hidden" name="action" value="add">
                
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Blog</label>
                    <input type="text" id="title" name="title" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Konten Blog</label>
                    <textarea id="content" name="content" required rows="6"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <input type="text" id="category" name="category" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Upload Gambar</label>
                    <input type="file" id="image" name="image" accept="image/*" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                </div>

                <button type="submit" 
                        class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Tambah Blog
                </button>
            </form>
        </div>

        <!-- Form Hapus Blog -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-6">Hapus Blog</h2>
            <form action="uploadblog.php" method="POST" class="space-y-4">
                <input type="hidden" name="action" value="delete">
                
                <div>
                    <label for="id" class="block text-sm font-medium text-gray-700 mb-1">ID Blog</label>
                    <input type="number" id="id" name="id" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                </div>

                <button type="submit" 
                        class="bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    Hapus Blog
                </button>
            </form>
        </div>

        <!-- Urutan Blog -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-6">Urutan Blog</h2>
            <ul id="blogList" class="space-y-2">
                <?php
                $result = $conn->query("SELECT id, title FROM blogs WHERE visible = 1 ORDER BY display_order ASC");
                while ($row = $result->fetch_assoc()) {
                    echo '<li data-id="' . $row['id'] . '" class="p-4 bg-gray-50 rounded-md cursor-move hover:bg-gray-100">' . 
                         htmlspecialchars($row['title']) . 
                         '</li>';
                }
                ?>
            </ul>
            <button id="updateOrder" 
                    class="mt-4 bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Update Urutan
            </button>
        </div>

        <!-- Daftar Blog -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $result = $conn->query("SELECT id, title, content, view_count FROM blogs WHERE visible = 1 ORDER BY display_order ASC");
            while ($row = $result->fetch_assoc()): ?>
                <a href="detail.php?id=<?= $row['id'] ?>" 
                   class="block bg-white rounded-lg shadow hover:shadow-lg transition p-4">
                    <h2 class="text-xl font-semibold"><?= htmlspecialchars($row['title']) ?></h2>
                    <p class="text-gray-600 text-sm mt-2">
                        <?= substr(htmlspecialchars($row['content']), 0, 100) ?>...
                    </p>
                    <div class="text-gray-500 text-xs mt-2">Views: <?= $row['view_count'] ?></div>
                </a>
            <?php endwhile; ?>
        </div>
    </div>

    <script>
    // Initialize Sortable
    new Sortable(document.getElementById('blogList'), {
        animation: 150,
        ghostClass: 'bg-blue-100'
    });

    // Update order handler
    document.getElementById("updateOrder").addEventListener("click", function() {
        const listItems = document.querySelectorAll("#blogList li");
        const order = Array.from(listItems).map(item => parseInt(item.dataset.id));

        // Menambahkan indikator loading
        this.innerHTML = 'Updating...';
        this.disabled = true;

        // Kirim data urutan dalam format FormData
        const formData = new FormData();
        formData.append('action', 'update_order');
        formData.append('order', JSON.stringify(order)); // Mengirimkan urutan dalam format JSON

        fetch("uploadblog.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(message => {
            alert(message); // Menampilkan pesan keberhasilan
            window.location.reload(); // Memuat ulang halaman untuk menampilkan urutan terbaru
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat memperbarui urutan: ' + error.message);
        })
        .finally(() => {
            // Kembalikan tombol ke keadaan semula
            const button = document.getElementById("updateOrder");
            button.innerHTML = 'Update Urutan';
            button.disabled = false;
        });
    });
    </script>
</body>
</html>
