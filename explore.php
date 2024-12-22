<?php 
include('includes/navbar.php');
include('includes/db.php');

try {
    // Fetch products
    $products = [];
    $result = $conn->query("SELECT * FROM products ORDER BY created_at DESC");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    // Fetch categories
    $categories = [];
    $result = $conn->query("SELECT DISTINCT category FROM products");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row['category'];
        }
    }
} catch (Exception $e) {
    die("Database Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Lighting Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .category-filter.active {
            color: #000;
            font-weight: 600;
        }
        .tag.active {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>
<body class="bg-gray-50">
    <main class="container mx-auto px-4">
        <!-- Hero Section -->
        <section class="text-center py-16 bg-gradient-to-r from-gray-50 to-gray-100">
            <h1 class="text-2xl text-gray-700 mb-3">Discover Our Smart Lighting Solutions</h1>
            <h2 class="text-4xl font-bold text-gray-900">Transform Your Space with<br/>Intelligent Shine</h2>
        </section>

        <!-- Filter Tags -->
        <section class="max-w-6xl mx-auto mt-8">
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                <button class="tag active px-6 py-2 rounded-full border transition-all hover:bg-black hover:text-white" data-filter="best-pick">Best pick</button>
                <button class="tag px-6 py-2 rounded-full border transition-all hover:bg-black hover:text-white" data-filter="small-office">Small office kit</button>
                <button class="tag px-6 py-2 rounded-full border transition-all hover:bg-black hover:text-white" data-filter="huge-office">Huge office kit</button>
            </div>

            <!-- Featured Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <?php if (!empty($products)): ?>
                    <?php foreach($products as $product): ?>
                        <div class="product-card bg-white rounded-lg shadow-md p-4 cursor-pointer transform transition-all hover:-translate-y-1 hover:shadow-xl"
                             data-category="<?php echo htmlspecialchars($product['category']); ?>"
                             data-product-id="<?php echo $product['id']; ?>">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($product['name']); ?>"
                                 class="w-full h-48 object-cover rounded-md mb-4"
                                 onerror="this.src='assets/default-product.jpg'">
                            <h3 class="text-lg font-semibold text-gray-800"><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="text-gray-600">$<?php echo number_format($product['price'], 2); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="col-span-full text-center text-gray-500">No products found</p>
                <?php endif; ?>
            </div>
        </section>

        <!-- Categories and All Products -->
        <section class="max-w-6xl mx-auto mt-16 mb-16">
            <div class="flex flex-wrap gap-8 mb-8">
                <button class="category-filter active text-lg text-gray-700 hover:text-black transition-colors" 
                        data-category="all">All Product</button>
                <?php if (!empty($categories)): ?>
                    <?php foreach($categories as $category): ?>
                        <button class="category-filter text-lg text-gray-700 hover:text-black transition-colors"
                                data-category="<?php echo htmlspecialchars($category); ?>">
                            <?php echo ucwords(str_replace('-', ' ', $category)); ?>
                        </button>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- All Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6" id="products-grid">
                <?php if (!empty($products)): ?>
                    <?php foreach($products as $product): ?>
                        <div class="product-card bg-white rounded-lg shadow-md p-4 cursor-pointer transform transition-all hover:-translate-y-1 hover:shadow-xl"
                             data-category="<?php echo htmlspecialchars($product['category']); ?>"
                             data-product-id="<?php echo $product['id']; ?>">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($product['name']); ?>"
                                 class="w-full h-48 object-cover rounded-md mb-4"
                                 onerror="this.src='assets/default-product.jpg'">
                            <h3 class="text-lg font-semibold text-gray-800"><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="text-gray-600">$<?php echo number_format($product['price'], 2); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all product cards
        const productCards = document.querySelectorAll('.product-card');
        
        // Add click event listener to each product card
        productCards.forEach(card => {
            card.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                if (productId) {
                    // Use the correct path to product-info.php
                    window.location.href = `/SES-4.0/product-info.php?id=${productId}`;
                }
            });
        });
        
        // Handle category filters
        const categoryFilters = document.querySelectorAll('.category-filter');
        categoryFilters.forEach(filter => {
            filter.addEventListener('click', function() {
                const category = this.getAttribute('data-category');
                
                categoryFilters.forEach(f => f.classList.remove('active'));
                this.classList.add('active');
                
                productCards.forEach(card => {
                    if (category === 'all' || card.getAttribute('data-category') === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Handle tag filters
        const tagButtons = document.querySelectorAll('.tag');
        tagButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                
                tagButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                productCards.forEach(card => {
                    const category = card.getAttribute('data-category');
                    if (filter === 'best-pick' && category === 'featured' ||
                        filter === 'small-office' && category === 'small-office' ||
                        filter === 'huge-office' && category === 'huge-office') {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
    </script>

    <?php include('includes/footer.php'); ?>
</body>
</html>