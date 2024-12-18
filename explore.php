<?php include('includes/navbar.php'); ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Lighting Solutions</title>
    <link rel="stylesheet" href="assets/css/explore.css" />
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />
    <script src="ses.js" defer></script>
  </head>
  <body>



    <main>
      <section class="hero">
        <h1>Discover Our Smart Lighting Solutions</h1>
        <h2>Transform Your Space with <br />Intelligent Shine</h2>
      </section>

      <section class="product-grid">
        <div class="filter-tags">
          <button class="tag active">Best pick</button>
          <button class="tag">Small office kit</button>
          <button class="tag">Huge office kit</button>
        </div>
        <div class="product-row">
          <div class="product-card">
            <img src="Image/image 3.png" alt="Downlight" />
            <p>Downlight</p>
          </div>
          <div class="product-card">
            <img src="Image/image 4.png" alt="Downlight Accent" />
            <p>Downlight Accent</p>
          </div>
          <div class="product-card">
            <img src="Image/image 5.png" alt="Spotlight" />
            <p>Spotlight</p>
          </div>
          <div class="product-card">
            <img src="Image/image 6.png" alt="Batten" />
            <p>Batten</p>
          </div>
          <div class="product-card">
            <img src="Image/image 7.png" alt="Gridlight" />
            <p>Gridlight</p>
          </div>
        </div>
      </section>
      <pre></pre>
      <section class="product-container">
        <div class="categories">
          <div class="category">
            <h3>All Product</h3>
            <h3>LED</h3>
            <h3>Smart Wiz</h3>
            <h3>Smart Hue</h3>
            <h3>Outdoor Luminer</h3>
          </div>
        </div>

        <!-- New Product Row Section -->
        <div class="product-row2">
          <div class="product-card2">
            <img src="Image/image 3.png" alt="Downlight" />
            <p>Downlight</p>
          </div>
          <div class="product-card2">
            <img src="Image/image 4.png" alt="Downlight Accent" />
            <p>Downlight Accent</p>
          </div>
          <div class="product-card2">
            <img src="Image/image 5.png" alt="Spotlight" />
            <p>Spotlight</p>
          </div>
          <div class="product-card2">
            <img src="Image/image 6.png" alt="Batten" />
            <p>Batten</p>
          </div>
          <div class="product-card2">
            <img src="Image/image 3.png" alt="Downlight" />
            <p>Downlight</p>
          </div>
          <div class="product-card2">
            <img src="Image/image 4.png" alt="Downlight Accent" />
            <p>Downlight Accent</p>
          </div>
          <div class="product-card2">
            <img src="Image/image 5.png" alt="Spotlight" />
            <p>Spotlight</p>
          </div>
          <div class="product-card2">
            <img src="Image/image 6.png" alt="Batten" />
            <p>Batten</p>
          </div>
          <div class="product-card2">
            <img src="Image/image 3.png" alt="Downlight" />
            <p>Downlight</p>
          </div>
          <div class="product-card2">
            <img src="Image/image 4.png" alt="Downlight Accent" />
            <p>Downlight Accent</p>
          </div>
          <div class="product-card2">
            <img src="Image/image 5.png" alt="Spotlight" />
            <p>Spotlight</p>
          </div>
          <div class="product-card2">
            <img src="Image/image 6.png" alt="Batten" />
            <p>Batten</p>
          </div>
        </div>
      </section>
    </main>



    
<script>
// Pilih semua elemen dengan kelas .cta-button
const ctaButtons = document.querySelectorAll('.cta-button');

// Loop melalui semua tombol dan tambahkan event listener
ctaButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Ganti nilai isLoggedIn dengan status login yang sesuai
        const isLoggedIn = false; // Contoh: ganti dengan logika status login yang sebenarnya

        if (!isLoggedIn) {
            window.location.href = 'Login1.php'; // Redirect ke halaman login jika belum login
        } else {
            // Tindakan yang akan dilakukan jika sudah login
            alert('Proceeding to book a consultation...');
        }
    });
});

</script>

</body>



</html>


<?php include('includes/footer.php') ?>
