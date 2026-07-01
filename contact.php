<?php
/**
 * Sana Kuna Holiday Resort - Pasikuda
 * Contact Us Page
 */

// Start session for CSRF protection and form persistent states
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config.php';

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$page_title = "Contact Us";
$page_desc = "Get in touch with Sana Kuna Holiday Resort, Pasikuda. Submit an inquiry or contact us via phone, WhatsApp, email, or find us on the map.";

$form_success = false;
$form_errors = [];

// Handle post submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Verify CSRF Token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $form_errors[] = "Security check failed. Please refresh the page and try again.";
    } else {
        // 2. Extract and Sanitize Inputs
        $name = isset($_POST['name']) ? trim(htmlspecialchars($_POST['name'])) : '';
        $email = isset($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) : '';
        $phone = isset($_POST['phone']) ? trim(htmlspecialchars($_POST['phone'])) : '';
        $subject = isset($_POST['subject']) ? trim(htmlspecialchars($_POST['subject'])) : '';
        $message = isset($_POST['message']) ? trim(htmlspecialchars($_POST['message'])) : '';
        
        // 3. Validation Checks
        if (empty($name)) {
            $form_errors[] = "Please enter your name.";
        } elseif (strlen($name) < 2) {
            $form_errors[] = "Your name must be at least 2 characters long.";
        }
        
        if (empty($email)) {
            $form_errors[] = "Please enter your email address.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $form_errors[] = "Please enter a valid email address.";
        }
        
        if (empty($phone)) {
            $form_errors[] = "Please enter your contact phone number.";
        }
        
        if (empty($subject)) {
            $form_errors[] = "Please specify a subject for your message.";
        }
        
        if (empty($message)) {
            $form_errors[] = "Please write your message.";
        } elseif (strlen($message) < 10) {
            $form_errors[] = "Your message must be at least 10 characters long.";
        }
        
        // 4. Action if no errors
        if (empty($form_errors)) {
            // Log submission locally in a file to verify functional execution
            $log_dir = __DIR__ . '/logs';
            if (!is_dir($log_dir)) {
                mkdir($log_dir, 0755, true);
            }
            
            $log_entry = "[" . date('Y-m-d H:i:s') . "] Name: $name | Email: $email | Phone: $phone | Subject: $subject | Message: $message\n";
            file_put_contents($log_dir . '/contact_submissions.log', $log_entry, FILE_APPEND);
            
            $form_success = true;
            
            // Clear inputs for next form rendering
            $name = $email = $phone = $subject = $message = '';
        }
    }
}

require_once 'header.php';
?>

<!-- Inner Page Banner -->
<section class="inner-page-banner" style="background-image: url('https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=1920&q=80');">
    <div class="container">
        <h1>Contact Us</h1>
        <div class="breadcrumbs">
            <a href="index.php">Home</a>
            <span>/</span>
            <span>Contact Us</span>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-section">
    <div class="container contact-grid">
        
        <!-- Left Column: Contact info & Maps -->
        <div class="contact-info-panel">
            <span class="section-subtitle">Get in Touch</span>
            <h2 style="font-weight: 600; margin-bottom: 15px;">We'd Love to Hear From You</h2>
            <p style="margin-bottom: 40px; font-size: 0.95rem;">Have questions about our rooms, bookings, event hosting, or local tours? Reach out to us through any of the channels below, or submit the contact form, and our front office will reply promptly.</p>
            
            <!-- Address Card -->
            <div class="contact-info-card">
                <div class="contact-info-icon-box">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <div>
                    <h4>Resort Address</h4>
                    <p><strong><?php echo SITE_NAME; ?></strong></p>
                    <p><?php echo SITE_ADDRESS; ?></p>
                </div>
            </div>
            
            <!-- Phone & WhatsApp Card -->
            <div class="contact-info-card">
                <div class="contact-info-icon-box">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div>
                    <h4>Phone & WhatsApp</h4>
                    <p>Reception: <a href="tel:<?php echo str_replace(' ', '', SITE_PHONE); ?>"><?php echo SITE_PHONE; ?></a></p>
                    <p>Mobile: <a href="tel:<?php echo str_replace(' ', '', SITE_MOBILE); ?>"><?php echo SITE_MOBILE; ?></a></p>
                    <p>WhatsApp: <a href="https://wa.me/<?php echo SITE_WHATSAPP; ?>" target="_blank" style="color: #25D366; font-weight: 600;"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</a></p>
                </div>
            </div>
            
            <!-- Email & Website Card -->
            <div class="contact-info-card">
                <div class="contact-info-icon-box">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <div>
                    <h4>Email & Web</h4>
                    <p>General inquiries: <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a></p>

                </div>
            </div>

            <!-- Business Hours Card -->
            <div class="contact-info-card">
                <div class="contact-info-icon-box">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <h4>Operating Hours</h4>
                    <p>Front desk is open <?php echo SITE_BUSINESS_HOURS; ?></p>
                    <p>Check-in: 2:00 PM | Check-out: 11:00 AM</p>
                </div>
            </div>

            <!-- Embedded Google Map -->
            <div class="contact-map-wrapper">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15797.398606822857!2d81.55836916892557!3d7.986616010729731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afb17cc399088ff%3A0xe54e60155b41bdbe!2sPasikuda%20Beach!5e0!3m2!1sen!2slk!4v1700000000000!5m2!1sen!2slk" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" aria-label="Google Map showing Pasikuda Beach location"></iframe>
            </div>
        </div>

        <!-- Right Column: Contact Form -->
        <div class="contact-form-panel">
            <h3>Send Us a Message</h3>
            
            <!-- Success / Error Status Alerts -->
            <?php if ($form_success): ?>
                <div class="form-alert success">
                    <i class="fas fa-check-circle" style="font-size: 1.3rem;"></i>
                    <span>Your message has been sent successfully! Our reservation desk will get back to you shortly.</span>
                </div>
            <?php endif; ?>

            <?php if (!empty($form_errors)): ?>
                <div class="form-alert danger">
                    <div style="display: flex; flex-direction: column; gap: 4px;">
                        <span style="font-weight: 700;"><i class="fas fa-exclamation-triangle"></i> Form verification errors:</span>
                        <ul style="list-style: disc; margin-left: 20px; font-size: 0.85rem;">
                            <?php foreach ($form_errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <form action="contact.php" method="POST" id="contact-us-form">
                <!-- CSRF Token Hidden input -->
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                <div class="form-group">
                    <label for="contact-name" class="form-label">Full Name *</label>
                    <input type="text" id="contact-name" name="name" class="form-input" placeholder="e.g. John Doe" value="<?php echo isset($name) ? $name : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="contact-email" class="form-label">Email Address *</label>
                    <input type="email" id="contact-email" name="email" class="form-input" placeholder="e.g. john@example.com" value="<?php echo isset($email) ? $email : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="contact-phone" class="form-label">Phone Number *</label>
                    <input type="tel" id="contact-phone" name="phone" class="form-input" placeholder="e.g. +94 77 123 4567" value="<?php echo isset($phone) ? $phone : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="contact-subject" class="form-label">Subject *</label>
                    <input type="text" id="contact-subject" name="subject" class="form-input" placeholder="e.g. Room Reservation Inquiry" value="<?php echo isset($subject) ? $subject : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="contact-message" class="form-label">Your Message *</label>
                    <textarea id="contact-message" name="message" class="form-input" placeholder="Write your comments or questions in detail here..." required><?php echo isset($message) ? $message : ''; ?></textarea>
                </div>

                <button type="submit" class="btn btn-gold btn-block" style="margin-top: 15px;">Send Message</button>
            </form>
        </div>
    </div>
</section>

<?php
require_once 'footer.php';
?>
