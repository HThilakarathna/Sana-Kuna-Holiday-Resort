<?php
/**
 * Sana Kuna Holiday Resort - Pasikuda
 * Footer Template
 */
?>
    <!-- Footer Section -->
    <footer class="site-footer">
        <div class="container footer-grid">
            <!-- Col 1: Brand Info -->
            <div class="footer-col brand-col">
                <div class="footer-logo">
                    <span class="footer-logo-title">SANA KUNA</span>
                    <span class="footer-logo-subtitle">HOLIDAY RESORT</span>
                </div>
                <p class="brand-desc">
                    Nestled along the calm, pristine shores of Pasikuda Beach, Sana Kuna Holiday Resort merges modern luxury with warm tropical hospitality to create an unforgettable sanctuary.
                </p>
                <div class="footer-social-links">
                    <a href="<?php echo $social_links['facebook']; ?>" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo $social_links['instagram']; ?>" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="<?php echo $social_links['tripadvisor']; ?>" target="_blank" aria-label="TripAdvisor"><i class="fab fa-tripadvisor"></i></a>
                    <a href="https://wa.me/<?php echo SITE_WHATSAPP; ?>" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div class="footer-col links-col">
                <h3 class="footer-heading">Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="index.php"><i class="fas fa-chevron-right"></i> Home</a></li>
                    <li><a href="rooms.php"><i class="fas fa-chevron-right"></i> Accommodation</a></li>
                    <li><a href="services.php"><i class="fas fa-chevron-right"></i> Services & Amenities</a></li>
                    <li><a href="gallery.php"><i class="fas fa-chevron-right"></i> Photo Gallery</a></li>
                    <li><a href="contact.php"><i class="fas fa-chevron-right"></i> Contact Us</a></li>
                </ul>
            </div>

            <!-- Col 3: Contact Info -->
            <div class="footer-col contact-col">
                <h3 class="footer-heading">Contact Info</h3>
                <ul class="footer-contact-list">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?php echo SITE_ADDRESS; ?></span>
                    </li>
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <span>
                            <a href="tel:<?php echo str_replace(' ', '', SITE_PHONE); ?>"><?php echo SITE_PHONE; ?></a><br>
                            <a href="tel:<?php echo str_replace(' ', '', SITE_MOBILE); ?>"><?php echo SITE_MOBILE; ?></a>
                        </span>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <span><a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a></span>
                    </li>
                    <li>
                        <i class="fas fa-clock"></i>
                        <span>Front Desk: <?php echo SITE_BUSINESS_HOURS; ?></span>
                    </li>
                </ul>
            </div>

            <!-- Col 4: Newsletter -->
            <div class="footer-col newsletter-col">
                <h3 class="footer-heading">Newsletter</h3>
                <p>Subscribe to receive news, exclusive packages, and updates from Pasikuda.</p>
                <form id="newsletter-form" class="newsletter-form" onsubmit="event.preventDefault(); handleNewsletterSubmit();">
                    <div class="input-group">
                        <input type="email" id="newsletter-email" placeholder="Your Email Address" required class="form-input">
                        <button type="submit" class="btn btn-gold" aria-label="Subscribe"><i class="fas fa-paper-plane"></i></button>
                    </div>
                    <div id="newsletter-message" class="newsletter-status-msg"></div>
                </form>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container footer-bottom-flex">
                <p class="copyright">&copy; <?php echo date('Y'); ?> <strong><?php echo SITE_NAME; ?></strong>. All Rights Reserved. Designed with Excellence.</p>
                <div class="footer-legal">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms & Conditions</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top" id="back-to-top-btn" aria-label="Back to Top"><i class="fas fa-chevron-up"></i></a>

    <!-- Core Main JavaScript -->
    <script src="js/main.js"></script>
    <script>
        // Simple client-side simulation for newsletter signup
        function handleNewsletterSubmit() {
            const emailInput = document.getElementById('newsletter-email');
            const messageDiv = document.getElementById('newsletter-message');
            
            if (emailInput.value) {
                messageDiv.textContent = "Thank you for subscribing! Check your inbox soon.";
                messageDiv.className = "newsletter-status-msg success";
                emailInput.value = "";
                setTimeout(() => {
                    messageDiv.textContent = "";
                    messageDiv.className = "newsletter-status-msg";
                }, 5000);
            }
        }
    </script>
</body>
</html>
