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
      $products = [
          ['name' => 'Downlight', 'image' => 'assets/image/image 3.png'],
          ['name' => 'Downlight Accent', 'image' => 'assets/image/image 4.png'],
          ['name' => 'Downlight', 'image' => 'assets/image/image 5.png'],
          ['name' => 'Batten', 'image' => 'assets/image/image 6.png'],
          ['name' => 'Gridlight', 'image' => 'assets/image/image 7.png'],
      ];

      foreach ($products as $product) : ?>
          <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
              <div class="aspect-square mb-4">
                  <img src="<?php echo $product['image']; ?>" 
                       alt="<?php echo $product['name']; ?>" 
                       class="w-full h-full object-contain">
              </div>
              <p class="text-center font-medium"><?php echo $product['name']; ?></p>
          </div>
      <?php endforeach; ?>
    </div>

    <!-- Category Tags -->
    <div class="flex flex-wrap justify-center gap-3 mb-16">
      <?php
      $tags = ['Indoor Luminer', 'LED', 'Smart Wiz', 'Smart Hue', 'Outdoor Luminer'];
      foreach ($tags as $index => $tag) : ?>
          <button class="px-6 py-2 rounded-full <?php echo $index === 0 ? 'bg-black text-white' : 'border border-gray-300'; ?> hover:bg-gray-100 transition-colors duration-300">
              <?php echo $tag; ?>
          </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>