<?php include 'includes/navbar.php'; ?>
<?php include 'includes/db.php'; // File koneksi database ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore | SES Smart Lighting</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-900">

    <!-- Hero Section -->
    <section class="text-center py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-extrabold text-black mb-4">Transform Your Space with Intelligent Shine</h1>
            <p class="text-xl text-gray-600 mb-12">Discover Our Smart Lighting Solutions</p>
            
            <!-- Filters -->
            <div class="flex justify-center space-x-4 mb-10">
                <button class="px-4 py-2 bg-gray-200 text-black rounded-full">Best Pick</button>
                <button class="px-4 py-2 bg-gray-200 text-black rounded-full">Small Office Kit</button>
                <button class="px-4 py-2 bg-gray-200 text-black rounded-full">Huge Office Kit</button>
            </div>
            
            <!-- Products -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <?php
                // Query untuk mengambil produk dari database
                $query = "SELECT * FROM products";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="text-center">
                            <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="' . htmlspecialchars($row['name']) . '" class="w-full h-48 object-cover rounded-lg mb-4">
                            <p class="font-semibold">' . htmlspecialchars($row['name']) . '</p>
                            <p class="text-gray-500">$' . number_format($row['price'], 2) . '</p>
                        </div>';
                    }
                } else {
                    echo '<p class="text-center col-span-4">No products available.</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Product Categories Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 flex items-start gap-6">
            <!-- Sidebar -->
            <div class="w-1/4 p-6 bg-gray-100 rounded-lg shadow-md">
                <h2 class="font-bold text-xl text-gray-800 mb-4">All Product</h2>
                <p class="text-sm text-gray-600 mb-4">Using smart LEDs, these lights adjust brightness and color for the intent of brightening focus and comfort, ideal for workspaces and homes. They help reduce strain while saving energy.</p>
                <ul class="space-y-4 text-gray-800">
                    <li class="text-sm hover:text-black cursor-pointer">Indoor Luminer</li>
                    <li class="text-sm hover:text-black cursor-pointer">LED</li>
                    <li class="text-sm hover:text-black cursor-pointer">Smart Wiz</li>
                    <li class="text-sm hover:text-black cursor-pointer">Smart Hue</li>
                    <li class="text-sm hover:text-black cursor-pointer">Outdoor Luminer</li>
                </ul>
            </div>

            <!-- Product Grid -->
            <div class="w-3/4 grid grid-cols-2 md:grid-cols-4 gap-8">
                <?php
                // Query ulang untuk memastikan data yang sama
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="text-center">
                            <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="' . htmlspecialchars($row['name']) . '" class="w-full h-48 object-cover rounded-lg mb-4">
                            <p class="font-semibold">' . htmlspecialchars($row['name']) . '</p>
                            <p class="text-gray-500">$' . number_format($row['price'], 2) . '</p>
                        </div>';
                    }
                } else {
                    echo '<p class="text-center col-span-4">No products available.</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <?php include 'includes/footer.php'; ?>

</body>
</html>
