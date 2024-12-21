<?php
// Footer
?>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');
    </style>
<style>
    /* Footer */
footer {
  margin-top: 200px;

  background: url("../SES-4.0/assets/image/FooterBackground.svg");
  background-size: cover;
  color: white;
  padding: 7px 0;
  position: relative; /* Ensures text is layered above the background */
}

.footer-content {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 40px;
}

.footer-left {
  flex: 1;
  max-width: 500px;
}

.footer-text {
  font-size: 14px;
  line-height: 1.6;
  color: #ffffff;
  opacity: 0.8;
}

.footer-right {
  flex: 1;
  max-width: 400px;
}

.newsletter h3 {
  font-size: 16px;
  margin-bottom: 15px;
  color: #ffffff;
}

.newsletter-form {
  display: flex;
  gap: 10px;
}

.newsletter-form input {
  flex: 1;
  padding: 8px 15px;
  border: none;
  border-radius: 4px;
  background: #ffffff;
  font-size: 14px;
}

.subscribe-btn {
  padding: 8px 20px;
  background: #ffffff;
  color: #000000;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 14px;
  white-space: nowrap;
}

.subscribe-btn:hover {
  background: #f0f0f0;
}

.footer-ses {
  font-size: 105px;
  font-family: "Plus Jakarta Sans", sans-serif;
  font-weight: 1000;
  text-align: center;
  position: relative; /* Ensure this text stays above the background */
}

/* Add responsive styles */
@media (max-width: 768px) {
  .footer-content {
    flex-direction: column;
  }

  .footer-left,
  .footer-right {
    max-width: 100%;
  }

  .newsletter-form {
    flex-direction: column;
  }

  .subscribe-btn {
    width: 100%;
  }
}
</style>
  <footer>
    <div class="footer-content">
      <div class="footer-left">
        <pre>



            </pre>
        <p class="footer-text">
          At SES, we bring artistry and innovation together to illuminate your spaces. With<br> smart lighting solutions
          tailored to your needs, we make your life brighter, smarter,<br> and more efficient.
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
