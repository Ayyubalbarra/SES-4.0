<?php
session_start(); // Memulai session

// Cek apakah pengguna sudah login
if (isset($_SESSION['user_id'])) {
    // Jika sudah login, alihkan ke halaman dashboard
    header("Location: php/dashboard.php");
    exit();
}

?>


<?php include('includes/navbar.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sustainable Lighting</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="assets/js/script.js" defer></script>


</head>

<body>
  <!-- Frame 7 - Hero Section -->

  <div class="Containerlampu">
  <!-- Pembungkus latar belakang untuk efek fade -->
  <div id="backgroundWrapper"></div>

  <!-- Overlay dengan gambar lampu dan tulisan -->
  <div class="overlay" id="overlay">
    <img src="assets/image/Property 1 Default.svg" alt="Gambar Overlay" class="lampuImage" id="lampuImage">
    
    <!-- Tambahkan tulisan di bawah gambar -->
    <p class="lampuText" id="lampuText">Turn your light up</p>
  </div>

  <!-- Gambar latar belakang yang akan diganti -->
  <img src="assets/image/Union.svg" alt="Gambar Latar" class="gambarBlank" id="gambarBlank">
</div>


  <!-- pembungkus latar belakang untuk efek fade -->






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