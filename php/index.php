<?php
session_start(); // Memulai session

// Cek apakah pengguna sudah login
if (isset($_SESSION['user_id'])) {
    // Jika sudah login, alihkan ke halaman dashboard
    header("Location: php/dashboard.php");
    exit();
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sustainable Lighting</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="js/lampu.js" defer></script>


</head>

<body>
  <header>
    <nav class="navbar">
        <div class="logo">
            <img src="Image/logo hitam.svg" alt="Smart Lighting Solutions Logo">
        </div>
        <div class="nav-links">
            <a href="#">Home</a> <!-- akan tetap disini -->
            <a href="php/explore.php">Explore</a> <!-- menuju explore.php -->
            <a href="php/blog.php">Blog</a> <!-- menuju blog.php -->
        </div>
        <button class="cta-button">Book a Consultation</button>
    </nav>
    
</header>

  <!-- Frame 7 - Hero Section -->

  <div class="Containerlampu">
  <!-- Pembungkus latar belakang untuk efek fade -->
  <div id="backgroundWrapper"></div>

  <!-- Overlay dengan gambar lampu dan tulisan -->
  <div class="overlay" id="overlay">
    <img src="Image/Property 1=Default.svg" alt="Gambar Overlay" class="lampuImage" id="lampuImage">
    
    <!-- Tambahkan tulisan di bawah gambar -->
    <p class="lampuText" id="lampuText">Turn your light up</p>
  </div>

  <!-- Gambar latar belakang yang akan diganti -->
  <img src="Image/Union.svg" alt="Gambar Latar" class="gambarBlank" id="gambarBlank">
</div>


  <!-- pembungkus latar belakang untuk efek fade -->






  <!-- Frame 9 - Light Statement -->
  <div class="statement-section">
    <div class="statement-header">
      <p class="statement-text">Light</p>
      <img src="Image/Hands Cradling Glowing Sphere 1.png" alt="Glowing Sphere" class="statement-image" />
      <p class="statement-text">is essential to </p>
    </div>
    <div class="statement-body">
      <p class="statement-text">our lives. but it often impacts</p>
    </div>
    <div class="statement-footer">
      <p class="statement-text">the environment.</p>
    </div>
  </div>

  <!-- Frame 12 - Mission Statement -->
  <div class="mission-section">
    <div class="mission-intro">
      <p class="mission-title">That's where we step in.</p>
    </div>
    <div class="mission-content">
      <div class="mission-text">
        <p >
          delivering sustainable, smart 
        </p>
      </div>
      <div class="mission-text"> 
        lighting that boosts your 
      </div>
      <div class="mission-text">
        productivity while also
      </div>
      <div class="mission-highlight">
        <p class="mission-text">protecting</p>
        <img src="Image/View of Earth from Space 1.png" alt="Earth from Space" class="mission-image" />
        <p class="mission-text">the planet.</p>
      </div>
    </div>
  </div>
  <pre>




    
  </pre>

  <!-- Frame 21 - Stats & Tagline -->
  <section class="stats-section">
    <div class="stats-container">
      <!-- Efficiency Stats -->
      <div class="stat-card">
        <h2 class="stat-number">25%</h2>
        <p class="stat-title">More Efficient</p>
        <p class="stat-description">
          Our smart lamps consume half <br>the energy of traditional lighting solutions, cutting costs while maximizing
          brightness and longevity.
        </p>
      </div>

      <!-- Carbon Impact Stats -->
      <div class="stat-card">
        <h2 class="stat-number">0</h2>
        <p class="stat-title">Carbon Impact</p>
        <p class="stat-description">
          Designed with sustainability in mind, our energy-efficient technology helps you work <br>smarter without harming
          the environment.
        </p>
      </div>

      <!-- Adaptive Lighting Stats -->
      <div class="stat-card">
        <h2 class="stat-number">100%</h2>
        <p class="stat-title">Adaptive Lighting</p>
        <p class="stat-description">
          Automatically adjusts <br>brightness and color to match <br>your work mode, reducing eye <br>strain and
          boosting focus throughout the day.
        </p>
      </div>
    </div>

    <div class="tagline-wrapper">
      <p class="tagline-description">
        Our lighting solutions deliver more than just light. They create healthier, productive spaces while prioritizing
        the planet.
      </p>
      <h2 class="tagline">
        Smarter Light, Better Workspaces, Greener Future.
      </h2>
    </div>
  </section>

  <!-- Frame 42 - Various Category -->
  <section class="category-section">
    <div class="category-header">
      <h2 class="category-title">
        <span>Various Category,</span>
        <span class="underline">Tons Of Possibility.</span>
      </h2>
    </div>

    <div class="category-grid">
      <!-- Downlight -->
      <div class="category-card">
        <img src="Image/image 3.png" alt="Downlight" class="category-image">
        <p class="category-name">Downlight</p>
      </div>

      <!-- Downlight Accent -->
      <div class="category-card">
        <img src="Image/image 4.png" alt="Downlight Accent" class="category-image">
        <p class="category-name">Downlight Accent</p>
      </div>

      <!-- Downlight -->
      <div class="category-card">
        <img src="Image/image 5.png" alt="Downlight" class="category-image">
        <p class="category-name">Downlight</p>
      </div>

      <!-- Batten -->
      <div class="category-card">
        <img src="Image/image 6.png" alt="Batten" class="category-image">
        <p class="category-name">Batten</p>
      </div>

      <!-- Gridlight -->
      <div class="category-card">
        <img src="Image/image 7.png" alt="Gridlight" class="category-image">
        <p class="category-name">Gridlight</p>
      </div>
    </div>

    <div class="category-tags">
      <button class="category-tag">Indoor Luminer</span>
      <button class="category-tag">LED</span>
      <button class="category-tag">Smart Wiz</span>
      <button class="category-tag">Smart Hue</span>
      <button class="category-tag">Luminer Outdoor</span>
    </div>


   


    <div class="luminer-section">
      <h3 class="luminer-title">Indoor Luminer</h3>
      <p class="luminer-description">
        Using smart LEDs, these lights adapt brightness and <br>color to the time of day, enhancing focus and comfort.<br>
        Ideal for workspaces and homes, they reduce eye strain<br> while saving energy.
      </p>
      <div class="browse">
        <p>
          didn’t found what you need? <a href="#">Browse all product <img href="#" src="Image/blackarrow.svg" alt="" /></a>
        </p>
      </div>
      
    </div>

   <pre>










   </pre>

  </section>

  <!-- Frame 54 - Steps Section -->
  <div class="steps-container">
    <div class="steps-left">
      <div class="steps-header">
        <div class="header-title">
          <p>Embrace Future Light To Your Workspace</p>
        </div>
        <div class="header-subtitle">
          <p>With Four Simple Step</p>
        </div>
      </div>
      <img src="Image/Hand-held Beacon of Inspiration Against Sunset 1.png" alt="rectangle" width="367" height="390"
        class="steps-image" />
    </div>
    <div class="steps-right">
      <div class="steps-row">
        <div class="step-card">
          <div class="step-header">
            <div class="step-number">
              <div class="number">
                <p>1</p>
              </div>
            </div>
            <div class="step-title">
              <p>Book a Consultation</p>
            </div>
          </div>
          <div class="step-description">
            <p>Take the first step by booking a consultation with our team. This helps us schedule a convenient time to
              evaluate your lighting needs.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-header">
            <div class="step-number">
              <div class="number">
                <p>2</p>
              </div>
            </div>
            <div class="step-title">
              <p>Site Survey</p>
            </div>
          </div>
          <div class="step-description">
            <p>Our experts will visit your location to understand your requirements, assess the space, and gather all
              necessary details to recommend the ideal lighting solutions.</p>
          </div>
        </div>
      </div>
      <div class="steps-row">
        <div class="step-card">
          <div class="step-header">
            <div class="step-number">
              <div class="number">
                <p>3</p>
              </div>
            </div>
            <div class="step-title">
              <p>Sign Off</p>
            </div>
          </div>
          <div class="step-description">
            <p>Review the proposed plan and confirm the details. Once everything is approved, we'll move forward to
              bring your lighting vision to life.</p>
          </div>
        </div>
        <div class="step-card">
          <div class="step-header">
            <div class="step-number">
              <div class="number">
                <p>4</p>
              </div>
            </div>
            <div class="step-title">
              <p>Get Your Light</p>
            </div>
          </div>
          <div class="step-description">
            <p>Enjoy a seamless experience as we deliver and install your chosen lighting solutions, transforming your
              space effortlessly.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<pre>








  
</pre>

  <section class="smart-section">
    <div class="smart-container">
        <!-- Left side - Text content -->
        <div class="smart-content">
            <div class="smart-header">
                <h2>Smarter Light, Better<br>Workspaces, Greener<br>Future.</h2>
            </div>
        
          
            <div class="smart-text">
                <p>Take control of your lighting with smart technology that lets you adjust brightness, color, and ambiance with simple voice or app commands. Enjoy energy-efficient solutions that blend functionality with stunning design to elevate any space. Your perfect setup, tailored to your lifestyle.</p>
            </div>
        </div>

        <!-- Right side - Cards -->
        <div class="smart-cards">
            <div class="cards-left">
                <div class="smart-card horizontal">
                    <img src="Image/Professional Exchange at Construction Site 1.png" alt="Free Site Survey">
                    <div class="card-label">Free Site Survey</div>
                </div>
            
                <div class="smart-card horizontal">
                    <img src="Image/Casual Tech-Engaged Man with Textured Hair 1.png" alt="Control Your Light">
                    <div class="card-label">Control Your Light</div>
                </div>
            </div>
            
            <div class="smart-card vertical">
                <img src="Image/Contemporary Elegance_ The Dance of Light and Shadow 1.png" alt="Energy Efficiency">
                <div class="card-label">Energy Efficiency Meets Artistry</div>
            </div>
        </div>
    </div>
</section>
  

  <pre>
















  </pre>







  <!-- Frame 57 - Testimonial -->
  <section class="testimonial">
    <div class="testimonial-container">
      <img src="Image/Futuristic Mesh-Lit Lounge 1.png" alt="Modern Workspace" class="testimonial-image">

      <div class="testimonial-content">
        <h2 class="testimonial-title">A better future starts from your workspace</h2>

        <div class="testimonial-box">
          <h3 class="testimonial-subtitle">Who have get their light with us</h3>
          <div class="testimonial-quote">
            <img src="Image/left quote.svg" alt="Quote" class="quote-icon">
            <p>"I love how effortlessly I can control my lights from my phone. It's not just efficient but also adds a
              touch of modern elegance to my space."</p>
            <img src="Image/right quote.svg" alt="Quote" class="quote-icon">
          </div>
        </div>
      </div>
    </div>
  </section>

  <pre>











  </pre>

  <!-- Frame 75 - Blog Section -->
  <section class="blog-section">

  <div class="blog-header">
      <div class="dropdown-container">
        <select class="dropdown" id="latest-dropdown">
          <option value="latest">Latest</option>
          <option value="popular">Popular</option>
          <option value="recommended">Recommended</option>
        </select>
        <select class="dropdown" id="category-dropdown">
          <option value="all">Category</option>
          <option value="technology">Technology</option>
          <option value="lifestyle">Lifestyle</option>
          <option value="business">Business</option>
        </select>
      </div>
    </div>

  
  <div class="card-container">



  <div class="card">
    <div class="card-image"></div>
    <div class="card-content">
      <h2 class="card-title">Blog Title</h2>
      <p class="card-description">Beautifully designed components built with Radix UI and custom CSS.</p>
      <a href="#" class="card-link">Styles for headings, paragraphs, lists...etc</a>
    </div>
  </div>

  <div class="card">
    <div class="card-image"></div>
    <div class="card-content">
      <h2 class="card-title">Blog Title</h2>
      <p class="card-description">Beautifully designed components built with Radix UI and custom CSS.</p>
      <a href="#" class="card-link">Styles for headings, paragraphs, lists...etc</a>
    </div>
  </div>

  <div class="card">
    <div class="card-image"></div>
    <div class="card-content">
      <h2 class="card-title">Blog Title</h2>
      <p class="card-description">Beautifully designed components built with Radix UI and custom CS=S.</p>
      <a href="#" class="card-link">Styles for headings, paragraphs, lists...etc</a>
    </div>
  </div>
</div>
</section>
<pre>










</pre>

  <!-- Frame 77 - CTA Section -->
  <div class="cta-container">
    <div class="cta-content">
      <div class="cta-title">
        <p>Be part of future hope with light that planet smiles to you</p>
      </div>
      <div class="cta-subtitle">
        <p>When artistry meets efficiency, Shine Smarter Work Better</p>
      </div>
    </div>

    <div class="cta-button-r">
      <p>Book a Consultation</p>
    </div>
  </div>



  <pre>










</pre>


  <!-- Frame 78 - Footer -->
  <footer>
    <div class="footer-content">
        <div class="footer-left">
            <pre>



            </pre>
            <p class="footer-text">
                At SES, we bring artistry and innovation together to illuminate your spaces. With<br> smart lighting solutions tailored to your needs, we make your life brighter, smarter,<br> and more efficient.
            </p>
        </div>
        <div class="footer-right">
            <div class="newsletter">
                <pre>


                </pre>
                <h3>Get Notified Our Newsletter</h3>
                <p>Email</p>
                <div class="newsletter-form">
                    <input type="email" placeholder="Email">
                    <button class="subscribe-btn">Subscribe</button>
                   
              
                </div>
                <p>Enter your email address</p>
            </div>
        </div>
    </div>
    <p class="footer-ses">Sustain Energy Solution</p>
</footer>



<script>// Pilih semua elemen dengan kelas .cta-button dan .cta-button-r
const ctaButtons = document.querySelectorAll('.cta-button, .cta-button-r');

// Loop melalui semua tombol dan tambahkan event listener
ctaButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Ganti nilai isLoggedIn dengan status login yang sesuai
        const isLoggedIn = false; // Contoh: ganti dengan logika status login yang sebenarnya

        if (!isLoggedIn) {
            window.location.href = 'php/Login1.php'; // Redirect ke halaman login jika belum login
        } else {
            // Tindakan yang akan dilakukan jika sudah login
            alert('Proceeding to book a consultation...');
        }
    });
});




  document.addEventListener("DOMContentLoaded", function() {
    const categoryTags = document.querySelectorAll('.category-tag');

    categoryTags.forEach(tag => {
      tag.addEventListener('click', function() {
        // Remove the active class from all category tags
        categoryTags.forEach(t => t.classList.remove('active'));
        
        // Add the active class to the clicked category tag
        this.classList.add('active');
      });
    });
  });




</script>

</body>

</html>