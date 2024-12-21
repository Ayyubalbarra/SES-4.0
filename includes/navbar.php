<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');
    </style>
<style>
    header {
  width: 100%;

  padding: 20px;
}
/* Base navbar styles */

/* Base navbar styles */
.navbar {
  position: fixed;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 100%;
  max-width: 1300px;
  z-index: 1000;

  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
}

.logo img {
  margin-right: 20px;
  height: 35px; /* Adjust the size as needed */
}

.nav-links {
  display: flex;
  gap: 50px; /* Space between the links */
  justify-content: center;
  align-items: center;
  padding: 5px 20px; /* Adjust padding to control background size */
  border-radius: 10px;
  backdrop-filter: blur(5px);
  width: auto; /* Adjust width as needed */
  max-width: 600px; /* Optional: Set a max-width */
}

.nav-links a {
  text-decoration: none;
  color: #000000; /* Customize color */
  font-size: 16px; /* Fixed font size */
}

/* CTA Button */
.cta-button {
  margin-left: 20px;
  background-color: #000000; /* Customize button color */
  color: white;
  border: none;

  font-size: 15px; /* Fixed font size */
  cursor: pointer;
  border-radius: 50px; /* Rounded corners */
  display: flex; /* Use flexbox to center content */
  align-items: center; /* Vertically center the text */
  justify-content: center; /* Horizontally center the text */
  width: 160px; /* Auto width based on content */
  height: 30px; /* Fixed height (optional) */
  text-align: center; /* Ensures the text is centered if flex doesn't work */
}

.cta-button:hover {
  background-color: #0056b3; /* Button hover effect */
}

/* Media Query for Smaller Screens (Mobile devices) */
@media (max-width: 768px) {
  .navbar {
    flex-direction: column; /* Stack navbar items vertically */
    align-items: flex-start; /* Align navbar items to the left */
    padding: 10px 20px;
  }

  .logo img {
    margin-right: 0;
    height: 30px; /* Smaller logo size */
  }

  .nav-links {
    flex-direction: column; /* Stack nav links vertically */
    gap: 20px; /* Space between links */
    padding: 10px 0;
    border-radius: 0;
    backdrop-filter: none; /* Remove background blur for smaller screens */
    width: 100%;
    max-width: none; /* No max-width on smaller screens */
    align-items: flex-start; /* Align items to the left */
  }

  .cta-button {
    width: 160px; /* Maintain original button width */
    height: 30px; /* Maintain button height */
    font-size: 15px; /* Keep the original font size */
    margin-top: 15px; /* Add space above the button */
  }
}

/* ... existing code ... */
@media (max-width: 768px) {
  .navbar {
    flex-direction: column; /* Stack navbar items vertically */
    align-items: flex-start; /* Align navbar items to the left */
    padding: 10px 20px;
  }

  .logo img {
    margin-right: 0;
    height: 30px; /* Smaller logo size */
  }

  .nav-links {
    flex-direction: column; /* Stack nav links vertically */
    gap: 20px; /* Space between links */
    padding: 10px 0;
    border-radius: 0;
    backdrop-filter: none; /* Remove background blur for smaller screens */
    width: 100%;
    max-width: none; /* No max-width on smaller screens */
    align-items: flex-start; /* Align items to the left */
  }

  .nav-links a {
    font-size: 16px; /* Keep font size consistent */
  }

  .cta-button {
    width: 160px; /* Maintain original button width */
    height: 30px; /* Maintain button height */
    font-size: 15px; /* Keep the original font size */
    margin-top: 15px; /* Add space above the button */
  }

</style>
<body>
  <header>
    <nav class="navbar">
      <div class="logo">
        <img src="assets/image/logo hitam.svg" alt="Smart Lighting Solutions Logo">
      </div>
      <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="explore.php">Explore</a>
        <a href="blog.php">Blog</a>
      </div>
      <button class="cta-button">Book a Consultation</button>
    </nav>
  </header>