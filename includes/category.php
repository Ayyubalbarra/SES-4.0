<!-- Category Section -->
<section class="w-full py-24">
  <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="text-center mb-12">
      <h2 class="text-4xl md:text-5xl font-bold">
        Various Category, 
        <span class="text-gray-400 relative">
          Tons Of Possibility.
          <span class="absolute bottom-0 left-0 w-full h-0.5 bg-black"></span>
        </span>
      </h2>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6 mb-12">
      <?php
      // Database connection
      $conn = new mysqli("localhost", "root", "141414", "ses");

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Fetch products from the database (limit to 5 items)
      $sql = "SELECT name, image, price, description FROM products LIMIT 5";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $imageData = base64_encode($row['image']); // Assuming 'image' is stored as binary data
              $imageSrc = 'data:image/png;base64,' . $imageData;
      ?>
          <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
              <div class="aspect-square mb-4">
                  <img src="<?php echo $imageSrc; ?>" 
                       alt="<?php echo htmlspecialchars($row['name']); ?>" 
                       class="w-full h-full object-contain">
              </div>
              <p class="text-center font-medium"><?php echo htmlspecialchars($row['name']); ?></p>
              <p class="text-center text-gray-500">$<?php echo number_format($row['price'], 2); ?></p>
          </div>
      <?php
          }
      } else {
          echo "<p class='text-center text-gray-500'>No products available.</p>";
      }

      // Close connection
      $conn->close();
      ?>
    </div>

    <!-- Category Tags -->
    <div class="flex flex-wrap justify-center gap-3 mb-16">
      <?php
      $tags = ['Indoor Luminer', 'LED','Outdoor Luminer'];
      foreach ($tags as $index => $tag) : ?>
          <button class="px-6 py-2 rounded-full <?php echo $index === 0 ? 'bg-black text-white' : 'border border-gray-300'; ?> hover:bg-gray-100 transition-colors duration-300">
              <?php echo $tag; ?>
          </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>
