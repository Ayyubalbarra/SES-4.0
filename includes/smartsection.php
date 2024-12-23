<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Custom Grid Layout</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<section class="smart-section py-12">
    <div class="max-w-[1440px] mx-auto px-6 md:px-8 grid grid-cols-12 gap-8">
        <!-- Left side - Header and Text -->
        <div class="col-span-4 flex flex-col justify-center space-y-6">
            <!-- Header -->
            <h2 class="text-4xl font-bold text-gray-800 leading-tight md:text-5xl">
                Smarter Light, Better<br>
                Workspaces, Greener<br>
                Future.
            </h2>
            <!-- Text Content -->
            <p class="text-lg text-gray-600 max-w-full">
                Take control of your lighting with smart technology that lets you adjust brightness, color, and ambiance
                with simple voice or app commands. Enjoy energy-efficient solutions that blend functionality with stunning
                design to elevate any space. Your perfect setup, tailored to your lifestyle.
            </p>
        </div>

        <!-- Right side - Cards -->
        <div class="col-span-8 grid grid-cols-2 gap-6">
            <!-- Card 1 -->
            <div class="relative overflow-hidden rounded-2xl shadow-md">
                <img 
                    src="assets/image/Professional Exchange at Construction Site 1.png" 
                    alt="Free Site Survey" 
                    class="w-full h-64 object-cover"
                >
                <div class="absolute bottom-4 left-4 bg-white/90 text-gray-800 text-sm font-medium px-4 py-2 rounded-md shadow">
                    Free Site Survey
                </div>
            </div>

            <!-- Card 2 -->
            <div class="relative overflow-hidden rounded-2xl shadow-md">
                <img 
                    src="assets/image/Casual Tech-Engaged Man with Textured Hair 1.png" 
                    alt="Control Your Light" 
                    class="w-full h-64 object-cover"
                >
                <div class="absolute bottom-4 left-4 bg-white/90 text-gray-800 text-sm font-medium px-4 py-2 rounded-md shadow">
                    Control Your Light
                </div>
            </div>

            <!-- Card 3 (Large Image) -->
            <div class="relative overflow-hidden rounded-2xl shadow-md col-span-2">
                <img 
                    src="assets/image/Contemporary Elegance_ The Dance of Light and Shadow 1.png" 
                    alt="Energy Efficiency Meets Artistry" 
                    class="w-full h-80 object-cover"
                >
                <div class="absolute bottom-4 left-4 bg-white/90 text-gray-800 text-sm font-medium px-4 py-2 rounded-md shadow">
                    Energy Efficiency Meets Artistry
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
