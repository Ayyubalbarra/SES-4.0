<?php
session_start(); 

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SES - Smart Lighting Solutions</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes glowing {
      0% { opacity: 0.1; }
      50% { opacity: 0.3; }
      100% { opacity: 0.1; }
    }

    .fade {
      opacity: 0;
      transition: opacity 0.5s ease-out;
    }

    .fade-in {
      opacity: 1;
      transition: opacity 0.5s ease-in;
    }

    .hidden {
      display: none;
    }

    .visible {
      display: block;
    }

    .ipad-hero {
      background: black;
      position: relative;
      overflow: hidden;
    }

    .ipad-hero.white {
      background-color: #fff;
      background-image: none;
    }

    #ipadContainer {
      position: relative;
      width: 600px;
      height: 800px;
    }

    #lampImage {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 100px;
      height: 100px;
      cursor: pointer;
      transition: opacity 0.3s ease-in-out;
    }

    #lampImage:hover {
      content: url('assets/image/menyala.svg');
    }

    #lampImage.hidden {
      opacity: 0;
    }

    .text-section {
      text-align: left;
      padding: 2rem;
      margin: 0 auto;
      background-size: cover;
      background-position: center;
    }

    .text-section.white {
      background-color: #fff;
      background-image: none;
    }

    .features-section {
      background-image: url('assets/image/modern-office-interior-1.png');
      background-size: cover;
      background-position: center;
      padding: 4rem 2rem;
      text-align: center;
    }

    .feature-card {
      background: rgba(255, 255, 255, 0.8);
      border-radius: 8px;
      padding: 1.5rem;
      margin: 1rem;
      display: inline-block;
      width: 300px;
      vertical-align: top;
    }

    .feature-card h2 {
      font-size: 2rem;
      margin-bottom: 0.5rem;
    }

    .feature-card p {
      color: #555;
      font-size: 1rem;
    }

    #ipadContainer .absolute {
      animation: glowing 3s infinite;
    }

    @layer utilities {
        .backdrop-blur-md {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    }

    .bg-white-all {
        background-color: white !important;
    }
  </style>
</head>
<body class="overflow-y-auto">
<?php include('includes/navbar.php'); ?>

<!-- Hero Section with iPad and Lamp -->
<div class="relative min-h-screen bg-[#919191] flex items-center justify-center max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-24" id="heroSection">
  <!-- Center Content -->
  <div class="relative">
    <!-- Background Glow Effect -->
    <div class="absolute inset-0 bg-[#00FF00] opacity-20 blur-[100px] rounded-full"></div>
    
    <!-- iPad and Lamp Content -->
    <div class="relative z-10">
      <img 
        src="assets/image/Frame 7.png" 
        alt="iPad Off"
        id="ipadImage"
        class="w-[850px] h-auto object-contain"
      >
      <img 
        src="assets/image/Property 1 Default.svg" 
        alt="Lamp Off"
        id="lampImage"
        onclick="toggleLight()"
        class="w-[150px] h-auto absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 cursor-pointer hover:scale-110 transition-transform duration-300"
      >
    </div>
    <!-- Text Overlay -->
    <div class="absolute bottom-16 left-16 z-20">
      <h1 class="text-3xl font-bold text-white">Artistry Meets Efficiency:</h1>
      <p class="text-xl text-gray-700">Shine Smarter, Work Better.</p>
    </div>
  </div>
</div>

<!-- Text Section -->
<div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-24">
  <div class="text-section">
    <h1 class="text-8xl font-reguler mb-4 tracking-tighter">Light <img src="assets/image/Hands Cradling Glowing Sphere 1.png" alt="Light Icon" class="inline w-32 h-auto"> is essential to our lives, but it often impacts the environment.</h1>
    <p class="text-3xl text-gray-700 mt-32">That's where we step in.</p>
    <p class="text-8xl font-reguler tracking-tighter">
      delivering sustainable, smart lighting that boosts your productivity while also
      <br>
      protecting <img src="assets/image/View of Earth from Space 1.png" alt="Planet Icon" class="inline w-32 h-auto"> the planet.
    </p>
  </div>
</div>

<!-- Features Section -->
<section class="w-full min-h-screen relative overflow-hidden">
  <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-24">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img 
            src="assets/image/modern-office-interior-1.png" 
            alt="Modern Office Interior" 
            class="w-full h-full object-cover filter brightness-90"
        >
    </div>

    <!-- Content Container -->
    <div class="relative z-10 container mx-auto px-4 pt-20 mt-32">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
            <!-- 25% More Efficient Card -->
            <div class="bg-white/30 backdrop-blur-md rounded-3xl p-8 w-full md:w-[350px]">
                <div class="space-y-2">
                    <h2 class="text-6xl font-medium">25%</h2>
                    <p class="text-xl font-normal mb-6">More Efficient</p>
                    <p class="text-sm leading-relaxed text-black/80">
                        Our smart lamps consume half the energy of traditional lighting solutions, cutting costs while maximizing brightness and longevity.
                    </p>
                </div>
            </div>

            <!-- 0 Carbon Impact Card -->
            <div class="bg-white/30 backdrop-blur-md rounded-3xl p-8 w-full md:w-[350px]">
                <div class="space-y-2">
                    <h2 class="text-6xl font-medium">0</h2>
                    <p class="text-xl font-normal mb-6">Carbon Impact</p>
                    <p class="text-sm leading-relaxed text-black/80">
                        Designed with sustainability in mind, our energy-efficient technology helps you work smarter without harming the environment.
                    </p>
                </div>
            </div>

            <!-- 100% Adaptive Lighting Card -->
            <div class="bg-white/30 backdrop-blur-md rounded-3xl p-8 w-full md:w-[350px]">
                <div class="space-y-2">
                    <h2 class="text-6xl font-medium">100%</h2>
                    <p class="text-xl font-normal mb-6">Adaptive Lighting</p>
                    <p class="text-sm leading-relaxed text-black/80">
                        Automatically adjusts brightness and color to match your work mode, reducing eye strain and boosting focus throughout the day.
                    </p>
                </div>
            </div>
        </div>

        <!-- Bottom Content -->
        <div class="mt-24 max-w-3xl ml-auto mr-24 pb-20">
            <p class="text-sm text-black/80 mb-4 font-medium leading-relaxed">
                Our lighting solutions deliver more than just light. They create healthier, productive spaces while prioritizing the planet.
            </p>
            <h2 class="text-5xl font-light leading-tight">
                Smarter Light, Better<br>
                Workspaces, Greener<br>
                Future.
            </h2>
        </div>
    </div>
  </div>
</section>
<div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="flex flex-col lg:flex-row justify-start items-start lg:items-end gap-12 lg:gap-24">
            <!-- Left Section -->
            <div class="flex flex-col justify-start items-start gap-5 max-w-xs">
                <div class="flex flex-col justify-start items-start max-w-xs">
                    <h1 class="text-black text-[38px] font-light leading-normal tracking-tight">
                        Embrace Future Light To Your Workspace
                    </h1>
                    <p class="text-gray-400 text-[38px] font-light leading-normal tracking-tight">
                        With Four Simple Steps
                    </p>
                </div>
                <img 
                    src="assets/image/Hand-held Beacon of Inspiration Against Sunset 1.png"
                    alt="Hand-held light bulb against sunset" 
                    class="rounded-lg w-full max-w-xs h-auto"
                />
            </div>

            <!-- Right Section -->
            <div class="flex-1">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-full">
                    <?php
                    $steps = [
                        [
                            "title" => "Book a Consultation",
                            "description" => "Take the first step by booking a consultation with our team. This helps us schedule a convenient time to evaluate your lighting needs.",
                        ],
                        [
                            "title" => "Site Survey",
                            "description" => "Our experts will visit your location to understand your requirements, assess the space, and gather all necessary details to recommend the ideal lighting solutions.",
                        ],
                        [
                            "title" => "Sign Off",
                            "description" => "Review the proposed plan and confirm the details. Once everything is approved, we'll move forward to bring your lighting vision to life.",
                        ],
                        [
                            "title" => "Get Your Light",
                            "description" => "Enjoy a seamless experience as we deliver and install your chosen lighting solutions, transforming your space effortlessly.",
                        ]
                    ];

                    foreach ($steps as $index => $step) {
                        $stepNumber = $index + 1;
                        echo "
                        <div class='bg-white rounded-lg shadow-md p-12 flex flex-col gap-8 h-full'>
                            <div class='flex items-center gap-4'>
                                <div class='bg-black text-white text-center rounded w-12 h-12 flex items-center justify-center'>
                                    <p class='text-[32px] font-normal tracking-tight'>{$stepNumber}</p>
                                </div>
                                <h2 class='text-black text-xl font-normal'>{$step['title']}</h2>
                            </div>
                            <p class='text-black text-base font-normal leading-relaxed flex-grow'>
                                {$step['description']}
                            </p>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<!-- Smart Section Container -->
<section class="w-full py-24">
  <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row gap-12">
      <!-- Left Content -->
      <div class="lg:w-1/3 grid grid-rows-2 gap-8">
        <!-- Content remains the same -->
      </div>

      <!-- Right Content - Cards Grid -->
      <div class="lg:w-2/3 flex gap-4">
        <!-- Content remains the same -->
      </div>
    </div>
  </div>
</section>

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

<!-- Testimonial Hero Section -->
<div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-24">
  <div class="relative rounded-2xl overflow-hidden h-auto lg:h-[665px]">
    <!-- Background Image -->
    <div
      class="absolute inset-0 bg-cover bg-center bg-no-repeat rounded-3xl"
      style="background-image: url('assets/image/Futuristic Mesh-Lit Lounge 1.png');"
    >
      <div class="absolute inset-0 bg-black/20"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 flex h-full flex-col justify-between px-8 py-16">
      <!-- Hero Text -->
      <div class="max-w-xl">
        <h1 class="text-3xl font-medium tracking-tight text-white sm:text-4xl md:text-5xl lg:text-6xl">
          A better future starts
          <br />
          from your workspace
        </h1>
      </div>

      <!-- Testimonial Card -->
      <div class="flex justify-end mt-8">
        <div class="max-w-xl w-full lg:w-2/3">
          <div class="bg-white/95 backdrop-blur rounded-lg shadow-lg">
            <div class="p-6">
              <h2 class="mb-4 text-xl font-medium text-gray-900">
                Who have gotten their light with us
              </h2>
              <div id="testimonialContent">
                <p class="mb-6 text-gray-600">
                  I love how effortlessly I can control my lights from my phone. It's not just efficient but also adds a touch of modern elegance to my space.
                </p>
                <div class="flex items-center justify-between">
                  <p class="text-sm font-medium text-gray-800" id="testimonialAuthor">
                    Sarah Johnson
                  </p>
                  <div class="flex gap-2">
                    <button
                      onclick="previousTestimonial()"
                      class="h-8 w-8 inline-flex items-center justify-center rounded-md border border-gray-200 hover:bg-gray-100"
                      aria-label="Previous Testimonial"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6"/>
                      </svg>
                    </button>
                    <button
                      onclick="nextTestimonial()"
                      class="h-8 w-8 inline-flex items-center justify-center rounded-md border border-gray-200 hover:bg-gray-100"
                      aria-label="Next Testimonial"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"/>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Still Not Sure Section -->
<section class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-24">
  <table class="w-full border-collapse">
    <tr>
      <td class="text-4xl font-normal font-['Plus_Jakarta_Sans'] text-black text-right p-3 w-1/2">
        Still Not Sure?
      </td>
      <td class="text-xl font-['Plus_Jakarta_Sans'] text-gray-600 text-left p-3 w-1/2">
        Discover Tips, Trends, and Inspiration <br/>for Smarter Living.
      </td>
    </tr>
  </table>
</section>

<!-- Blog Section -->
<section class="blog-section max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-24">
  <!-- Header with Dropdowns -->
  <div class="flex justify-between items-center mb-8">
    <div class="flex gap-1">
      <select class="p-2.5 text-base border border-gray-300 rounded-lg bg-white font-['Plus_Jakarta_Sans'] cursor-pointer">
        <option value="latest">Latest</option>
        <option value="popular">Popular</option>
        <option value="recommended">Recommended</option>
      </select>
      <select class="p-2.5 text-base border border-gray-300 rounded-lg bg-white font-['Plus_Jakarta_Sans'] cursor-pointer">
        <option value="all">Category</option>
        <option value="technology">Technology</option>
        <option value="lifestyle">Lifestyle</option>
        <option value="business">Business</option>
      </select>
    </div>
  </div>

  <!-- Card Container -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Card 1 -->
    <div class="flex flex-row items-start gap-5 p-5 bg-white shadow-md rounded-lg transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
      <div class="flex-none w-[150px] h-full rounded-lg bg-gradient-to-r from-[#ff6b6b] to-[#845ec2]"></div>
      <div class="flex-1 flex flex-col justify-center">
        <h2 class="text-xl font-semibold font-['Plus_Jakarta_Sans'] text-black mb-2.5">Blog Title</h2>
        <p class="text-sm text-gray-600 mb-4 leading-relaxed font-['Plus_Jakarta_Sans']">Beautifully designed components built with Radix UI and Tailwind CSS.</p>
        <a href="#" class="text-sm text-[#845ec2] no-underline font-medium font-['Plus_Jakarta_Sans'] hover:text-[#ff6b6b] hover:underline">Styles for headings, paragraphs, lists...etc</a>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="flex flex-row items-start gap-5 p-5 bg-white shadow-md rounded-lg transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
      <div class="flex-none w-[150px] h-full rounded-lg bg-gradient-to-r from-[#ff6b6b] to-[#845ec2]"></div>
      <div class="flex-1 flex flex-col justify-center">
        <h2 class="text-xl font-semibold font-['Plus_Jakarta_Sans'] text-black mb-2.5">Another Blog Title</h2>
        <p class="text-sm text-gray-600 mb-4 leading-relaxed font-['Plus_Jakarta_Sans']">Learn how to craft better UI/UX for your projects with modern tools.</p>
        <a href="#" class="text-sm text-[#845ec2] no-underline font-medium font-['Plus_Jakarta_Sans'] hover:text-[#ff6b6b] hover:underline">Explore styles and techniques...</a>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="flex flex-row items-start gap-5 p-5 bg-white shadow-md rounded-lg transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
      <div class="flex-none w-[150px] h-full rounded-lg bg-gradient-to-r from-[#ff6b6b] to-[#845ec2]"></div>
      <div class="flex-1 flex flex-col justify-center">
        <h2 class="text-xl font-semibold font-['Plus_Jakarta_Sans'] text-black mb-2.5">Yet Another Blog</h2>
        <p class="text-sm text-gray-600 mb-4 leading-relaxed font-['Plus_Jakarta_Sans']">A quick dive into responsive web design and accessibility tips.</p>
        <a href="#" class="text-sm text-[#845ec2] no-underline font-medium font-['Plus_Jakarta_Sans'] hover:text-[#ff6b6b] hover:underline">Discover more...</a>
      </div>
    </div>
  </div>

  <!-- Footer Note -->
  <div class="text-center mt-12 font-['Plus_Jakarta_Sans'] text-sm text-gray-600">
    <a href="#" class="text-[#845ec2] no-underline font-medium hover:underline">Browse all posts</a>
  </div>

  <!-- CTA Section -->
  <div class="text-center max-w-[579px] mx-auto mt-24">
    <div class="space-y-4">
      <p class="text-[46px] font-thin font-['Plus_Jakarta_Sans'] leading-[46px] tracking-[-3px]">Be part of future hope with</p>
      <p class="text-[46px] text-black font-thin font-['Plus_Jakarta_Sans'] tracking-[-3px]">light that planet smiles to you</p>
      <p class="text-2xl text-gray-500 font-thin font-['Plus_Jakarta_Sans'] tracking-[-2px]">When artistry meets efficiency, Shine Smarter Work Better</p>
    </div>
    <button class="mt-8 bg-black text-white border-none outline-none flex justify-center items-center gap-2.5 px-8 py-3 rounded-full hover:bg-gray-800 transition-colors duration-300 mx-auto">
      Book a Consultation
    </button>
  </div>
</section>

<script>
const testimonials = [
  {
    quote: "I love how effortlessly I can control my lights from my phone. It's not just efficient but also adds a touch of modern elegance to my space.",
    author: "Sarah Johnson",
  },
  {
    quote: "The smart lighting system has transformed our office environment. The ability to adjust lighting throughout the day has improved our team's productivity.",
    author: "Michael Chen",
  },
  {
    quote: "Installation was seamless, and the results are stunning. Our workspace feels more modern and sophisticated than ever.",
    author: "Emma Williams",
  },
];

let currentTestimonial = 0;

function nextTestimonial() {
  currentTestimonial = (currentTestimonial + 1) % testimonials.length;
  updateTestimonial();
}

function previousTestimonial() {
  currentTestimonial = (currentTestimonial - 1 + testimonials.length) % testimonials.length;
  updateTestimonial();
}

function updateTestimonial() {
  const testimonialContent = document.getElementById('testimonialContent');
  const testimonialAuthor = document.getElementById('testimonialAuthor');
  
  testimonialContent.querySelector('p').textContent = testimonials[currentTestimonial].quote;
  testimonialAuthor.textContent = testimonials[currentTestimonial].author;
}

function toggleLight() {
  const heroSection = document.getElementById('heroSection');
  const lampImage = document.getElementById('lampImage');
  const ipadImage = document.getElementById('ipadImage');
  const textOverlay = heroSection.querySelector('.absolute.bottom-16');

  if (lampImage.src.includes('Default.svg')) {
    lampImage.src = 'assets/image/menyala.svg';
    ipadImage.src = 'assets/image/Frame 14.svg';
    heroSection.classList.add('bg-white-all');
    heroSection.classList.remove('bg-[#919191]');
    textOverlay.querySelector('h1').classList.remove('text-black');
    textOverlay.querySelector('h1').classList.add('text-white');
    textOverlay.querySelector('p').classList.remove('text-gray-700');
    textOverlay.querySelector('p').classList.add('text-gray-300');
  } else {
    lampImage.src = 'assets/image/Property 1 Default.svg';
    ipadImage.src = 'assets/image/Frame 7.png';
    heroSection.classList.remove('bg-white-all');
    heroSection.classList.add('bg-[#919191]');
    textOverlay.querySelector('h1').classList.remove('text-white');
    textOverlay.querySelector('h1').classList.add('text-black');
    textOverlay.querySelector('p').classList.remove('text-gray-300');
    textOverlay.querySelector('p').classList.add('text-gray-700');
  }
}
</script>

<?php include('includes/footer.php'); ?>
</body>
</html>