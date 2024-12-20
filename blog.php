<?php
// Sertakan file koneksi database
include('includes/db.php');
include('includes/navbar.php');

// Query untuk mengambil 1 blog utama dan 3 side blogs
$sql = "SELECT id, title, content, category, image, visible, display_order 
        FROM blogs 
        WHERE visible = 1
        ORDER BY display_order ASC 
        LIMIT 4"; // Ambil 1 main blog dan 3 side blogs
$result = $conn->query($sql);

// Query untuk artikel populer
$popular_sql = "SELECT id, title, category, image, view_count FROM blogs ORDER BY view_count DESC LIMIT 4";
$popular_result = $conn->query($popular_sql);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Lighting Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;600;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="py-8 text-center">
        <h1 class="text-4xl font-bold text-gray-800">Lighting the Space, <span class="text-gray-500">Smart Tips & Trends</span></h1>
        <hr class="w-16 mx-auto mt-4 border-t-2 border-gray-300" />
    </header>

    <!-- Blog Section -->
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-6 gap-4 px-24">
            <?php
            if ($result && $result->num_rows > 0) {
                $i = 0; // Counter for determining main blog or side blogs
                while ($row = $result->fetch_assoc()) {
                    if ($i == 0) {
                        // Main Blog (3x3 area)
                        echo '<div class="col-span-6 md:col-span-3 row-span-3 bg-white rounded-lg shadow-lg overflow-hidden">';
                        echo '<a href="detail.php?id=' . $row['id'] . '">'; // Link menuju halaman detail
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '" class="w-full h-64 object-cover">';
                        echo '<div class="p-6">';
                        echo '<h2 class="text-2xl font-bold text-gray-800 mb-4">' . htmlspecialchars($row['title']) . '</h2>';
                        echo '<p class="text-gray-600 mb-4">' . htmlspecialchars(substr($row['content'], 0, 350)) . '...</p>';
                        echo '<div class="flex space-x-2">';
                        echo '<span class="px-3 py-1 bg-gray-800 text-white text-sm rounded-full">' . htmlspecialchars($row['category']) . '</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '</a>'; // Akhir dari link
                        echo '</div>';
                    } else {
                        // Side Blogs (Each spans 1x3 area)
                        echo '<div class="col-span-6 md:col-span-3 bg-white rounded-lg shadow-lg overflow-hidden">';
                        echo '<a href="detail.php?id=' . $row['id'] . '">'; // Link menuju halaman detail
                        echo '<div class="flex">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '" class="w-1/3 object-cover">';
                        echo '<div class="p-4 w-2/3">';
                        echo '<h3 class="text-lg font-bold text-gray-800 mb-2 text-xl">' . htmlspecialchars($row['title']) . '</h3>';
                        echo '<p class="text-gray-600 mb-2 text-xs">' . htmlspecialchars(substr($row['content'], 0, 100)) . '...</p>';
                        echo '<div class="flex space-x-2">';
                        echo '<span class="px-3 py-1 bg-gray-500 text-white text-xs rounded-full">' . htmlspecialchars($row['category']) . '</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</a>'; // Akhir dari link
                        echo '</div>';
                    }
                    $i++;
                }
            } else {
                echo '<p class="text-gray-600 text-center col-span-6">No blogs available.</p>';
            }
            ?>
        </div>
    </div>

    <!-- Popular Articles Section -->
    <section class="py-8 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Popular Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <?php
                if ($popular_result && $popular_result->num_rows > 0) {
                    while ($row = $popular_result->fetch_assoc()) {
                        echo '<div class="bg-white rounded-lg shadow-lg overflow-hidden">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '" class="w-full h-40 object-cover">';
                        echo '<div class="p-4">';
                        echo '<h3 class="text-lg font-bold text-gray-800 mb-2">' . htmlspecialchars($row['title']) . '</h3>';
                        echo '<p class="text-sm text-gray-600 mb-2">Kategori: ' . htmlspecialchars($row['category']) . '</p>';
                        echo '<p class="text-xs text-gray-500">Views: ' . htmlspecialchars($row['view_count']) . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-gray-600 text-center col-span-4">No popular articles available.</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <?php include('includes/footer.php'); ?>

    <?php
    // Tutup koneksi database
    $conn->close();
    ?>
</body>

</html>
