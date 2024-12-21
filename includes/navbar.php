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
      <svg width="112" height="31" viewBox="0 0 112 31" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 20.1749V19.6292C10 11.6213 14.387 4.55289 21.0773 0.334625C27.7677 4.55289 32.1547 11.6213 32.1547 19.6292L32.1546 19.6315L32.1547 20.1156C32.1547 25.8107 27.8745 30.0276 22.3617 30.6654V30.0499C22.3617 28.7703 23.3125 27.7183 24.4498 27.1319C26.924 25.8559 28.6227 23.2198 28.6227 20.1749C28.6227 15.8809 25.2445 12.3999 21.0773 12.3999C16.9101 12.3999 13.5319 15.8809 13.5319 20.1749C13.5319 23.2198 15.2306 25.8559 17.7049 27.1319C18.8421 27.7183 19.793 28.7703 19.793 30.0499V30.6654C14.2802 30.0276 10 25.87 10 20.1749Z" fill="black"/>
<path d="M96.0102 11.133C95.939 10.35 95.6222 9.74143 95.0599 9.30723C94.5047 8.8659 93.711 8.64524 92.6789 8.64524C91.9955 8.64524 91.4261 8.73422 90.9705 8.91217C90.515 9.09012 90.1733 9.3357 89.9455 9.6489C89.7177 9.95498 89.6003 10.3073 89.5932 10.7059C89.5789 11.0334 89.643 11.3217 89.7854 11.5708C89.9348 11.8199 90.1484 12.0406 90.426 12.2328C90.7107 12.4179 91.0524 12.5816 91.451 12.7239C91.8496 12.8663 92.2981 12.9909 92.7963 13.0976L94.6755 13.5247C95.7575 13.7596 96.7113 14.0728 97.537 14.4643C98.3698 14.8558 99.0674 15.3221 99.6298 15.863C100.199 16.404 100.63 17.0269 100.922 17.7315C101.214 18.4362 101.363 19.2264 101.37 20.1019C101.363 21.4828 101.014 22.668 100.324 23.6574C99.6333 24.6468 98.6403 25.4049 97.3448 25.9316C96.0564 26.4584 94.5011 26.7218 92.6789 26.7218C90.8495 26.7218 89.2551 26.4477 87.8955 25.8996C86.5359 25.3515 85.4789 24.5187 84.7244 23.4011C83.9698 22.2836 83.5819 20.8706 83.5605 19.1623H88.6215C88.6643 19.867 88.8529 20.4542 89.1874 20.924C89.522 21.3938 89.9811 21.7497 90.5648 21.9918C91.1556 22.2338 91.8389 22.3548 92.6148 22.3548C93.3266 22.3548 93.9317 22.2587 94.4299 22.0665C94.9353 21.8743 95.3233 21.6074 95.5938 21.2657C95.8643 20.924 96.0031 20.5325 96.0102 20.0912C96.0031 19.6784 95.8749 19.326 95.6258 19.0342C95.3767 18.7352 94.9923 18.479 94.4727 18.2654C93.9602 18.0447 93.3053 17.8419 92.508 17.6568L90.2231 17.1229C88.3297 16.6887 86.8384 15.9876 85.7494 15.0195C84.6603 14.0443 84.1193 12.7275 84.1264 11.069C84.1193 9.71652 84.4823 8.53135 85.2155 7.51345C85.9487 6.49556 86.963 5.70189 88.2585 5.13244C89.554 4.56299 91.031 4.27826 92.6896 4.27826C94.3837 4.27826 95.8536 4.56654 97.0993 5.14311C98.352 5.71256 99.3237 6.51336 100.014 7.54549C100.705 8.57762 101.057 9.77346 101.071 11.133H96.0102Z" fill="black"/>
<path d="M65.6333 26.4441V4.57721H80.8804V8.86945H70.9185V13.3539H80.1009V17.6568H70.9185V22.1519H80.8804V26.4441H65.6333Z" fill="black"/>
<path d="M57.6042 11.133C57.533 10.35 57.2162 9.74143 56.6539 9.30723C56.0987 8.8659 55.305 8.64524 54.2729 8.64524C53.5895 8.64524 53.0201 8.73422 52.5645 8.91217C52.109 9.09012 51.7673 9.3357 51.5395 9.6489C51.3117 9.95498 51.1943 10.3073 51.1872 10.7059C51.1729 11.0334 51.237 11.3217 51.3794 11.5708C51.5288 11.8199 51.7424 12.0406 52.02 12.2328C52.3047 12.4179 52.6464 12.5816 53.045 12.7239C53.4436 12.8663 53.8921 12.9909 54.3903 13.0976L56.2695 13.5247C57.3515 13.7596 58.3053 14.0728 59.131 14.4643C59.9638 14.8558 60.6614 15.3221 61.2237 15.863C61.7932 16.404 62.2238 17.0269 62.5157 17.7315C62.8075 18.4362 62.957 19.2264 62.9641 20.1019C62.957 21.4828 62.6082 22.668 61.9178 23.6574C61.2273 24.6468 60.2343 25.4049 58.9388 25.9316C57.6504 26.4584 56.0951 26.7218 54.2729 26.7218C52.4435 26.7218 50.8491 26.4477 49.4895 25.8996C48.1299 25.3515 47.0729 24.5187 46.3184 23.4011C45.5638 22.2836 45.1759 20.8706 45.1545 19.1623H50.2155C50.2582 19.867 50.4469 20.4542 50.7814 20.924C51.116 21.3938 51.5751 21.7497 52.1588 21.9918C52.7496 22.2338 53.4329 22.3548 54.2088 22.3548C54.9206 22.3548 55.5257 22.2587 56.0239 22.0665C56.5293 21.8743 56.9173 21.6074 57.1878 21.2657C57.4582 20.924 57.5971 20.5325 57.6042 20.0912C57.5971 19.6784 57.4689 19.326 57.2198 19.0342C56.9707 18.7352 56.5863 18.479 56.0667 18.2654C55.5541 18.0447 54.8993 17.8419 54.102 17.6568L51.8171 17.1229C49.9237 16.6887 48.4324 15.9876 47.3434 15.0195C46.2543 14.0443 45.7133 12.7275 45.7204 11.069C45.7133 9.71652 46.0763 8.53135 46.8095 7.51345C47.5427 6.49556 48.557 5.70189 49.8525 5.13244C51.148 4.56299 52.625 4.27826 54.2836 4.27826C55.9777 4.27826 57.4476 4.56654 58.6932 5.14311C59.946 5.71256 60.9177 6.51336 61.6081 7.54549C62.2986 8.57762 62.6509 9.77346 62.6652 11.133H57.6042Z" fill="black"/>
</svg>
      </div>
      <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="explore.php">Explore</a>
        <a href="blog.php">Blog</a>
      </div>
      <button class="cta-button">Book a Consultation</button>
    </nav>
  </header>