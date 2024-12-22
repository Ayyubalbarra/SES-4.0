<?php
session_start();
include 'includes/db.php';

// Cek apakah user adalah admin
if (!isset($_SESSION['admin'])) {
    header("Location: adminLogin.php");
    exit;
}

try {
    // Fetch existing products
    $products = [];
    $result = $conn->query("SELECT * FROM products ORDER BY created_at DESC");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
} catch (Exception $e) {
    die("Database Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Manage Products</h1>

        <!-- Form Tambah/Edit Produk -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-6">Add New Product</h2>
            <form action="processProduct.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="name" required 
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category" required 
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md">
                        <option value="best-pick">Best Pick</option>
                        <option value="small-office">Small Office Kit</option>
                        <option value="huge-office">Huge Office Kit</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" required step="0.01"
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Product Image</label>
                    <input type="file" name="image" accept="image/*" required
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md">
                </div>

                <button type="submit" class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-800">
                    Add Product
                </button>
            </form>
        </div>

        <!-- Tabel Produk -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td class="px-6 py-4"><?= htmlspecialchars($product['name']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($product['category']) ?></td>
                        <td class="px-6 py-4">$<?= number_format($product['price'], 2) ?></td>
                        <td class="px-6 py-4">
                            <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" 
                                 alt="<?= htmlspecialchars($product['name']) ?>"
                                 class="h-16 w-16 object-cover rounded">
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="deleteProduct(<?= $product['id'] ?>)" 
                                    class="text-red-600 hover:text-red-900">Delete</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    function deleteProduct(id) {
        if (confirm('Are you sure you want to delete this product?')) {
            fetch('processProduct.php?id=' + id, { 
                method: 'DELETE'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error deleting product');
                }
            });
        }
    }
    </script>
</body>
</html>