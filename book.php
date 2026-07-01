<?php
/**
 * Sana Kuna Holiday Resort - Pasikuda
 * Booking Inquiry Processing Page
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config.php';

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Get initial values from GET request (booking bar redirects here)
$checkin_val = isset($_GET['checkin']) ? htmlspecialchars($_GET['checkin']) : '';
$checkout_val = isset($_GET['checkout']) ? htmlspecialchars($_GET['checkout']) : '';
$guests_val = isset($_GET['guests']) ? htmlspecialchars($_GET['guests']) : '2';
$room_type_val = isset($_GET['room_type']) ? htmlspecialchars($_GET['room_type']) : 'any';

$page_title = "Book Your Stay";
$page_desc = "Complete your booking inquiry for Sana Kuna Holiday Resort, Pasikuda. Select dates, choose rooms, and submit details for confirmation.";

$booking_success = false;
$booking_errors = [];
$booking_details = [];

// Handle reservation request submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. CSRF Verification
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $booking_errors[] = "Security check failed. Please refresh the page and try again.";
    } else {
        // 2. Extract inputs
        $name = isset($_POST['name']) ? trim(htmlspecialchars($_POST['name'])) : '';
        $email = isset($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) : '';
        $phone = isset($_POST['phone']) ? trim(htmlspecialchars($_POST['phone'])) : '';
        
        $checkin = isset($_POST['checkin']) ? $_POST['checkin'] : '';
        $checkout = isset($_POST['checkout']) ? $_POST['checkout'] : '';
        $guests = isset($_POST['guests']) ? $_POST['guests'] : '';
        $room_type = isset($_POST['room_type']) ? $_POST['room_type'] : '';
        $special_requests = isset($_POST['special_requests']) ? trim(htmlspecialchars($_POST['special_requests'])) : '';

        // Preserve form state in case of errors
        $checkin_val = $checkin;
        $checkout_val = $checkout;
        $guests_val = $guests;
        $room_type_val = $room_type;

        // 3. Validations
        if (empty($name)) {
            $booking_errors[] = "Please enter your name.";
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $booking_errors[] = "Please enter a valid email address.";
        }
        if (empty($phone)) {
            $booking_errors[] = "Please enter your contact phone number.";
        }
        if (empty($checkin)) {
            $booking_errors[] = "Please select a check-in date.";
        }
        if (empty($checkout)) {
            $booking_errors[] = "Please select a check-out date.";
        }

        if (!empty($checkin) && !empty($checkout)) {
            $date_checkin = new DateTime($checkin);
            $date_checkout = new DateTime($checkout);
            $today = new DateTime(date('Y-m-d'));

            if ($date_checkin < $today) {
                $booking_errors[] = "Check-in date cannot be in the past.";
            }
            if ($date_checkout <= $date_checkin) {
                $booking_errors[] = "Check-out date must be at least one day after the check-in date.";
            }
        }

        // 4. Proceed if no errors
        if (empty($booking_errors)) {
            // Find room details
            $room_name = "Any Available Room";
            $price_per_night = 0;
            if ($room_type !== 'any' && isset($rooms[$room_type])) {
                $room_name = $rooms[$room_type]['name'];
                $price_per_night = $rooms[$room_type]['price'];
            }

            // Calculations
            $date_checkin = new DateTime($checkin);
            $date_checkout = new DateTime($checkout);
            $nights = $date_checkout->diff($date_checkin)->days;
            $estimated_total = $price_per_night * $nights;
            $reservation_id = "SKH-" . strtoupper(bin2hex(random_bytes(3)));

            // Log booking inquiry locally
            $log_dir = __DIR__ . '/logs';
            if (!is_dir($log_dir)) {
                mkdir($log_dir, 0755, true);
            }

            $log_entry = "[" . date('Y-m-d H:i:s') . "] RES_ID: $reservation_id | Name: $name | Email: $email | Phone: $phone | Room: $room_name | Check-in: $checkin | Check-out: $checkout | Nights: $nights | Estimated Total: $" . $estimated_total . "\n";
            file_put_contents($log_dir . '/booking_inquiries.log', $log_entry, FILE_APPEND);

            $booking_success = true;
            $booking_details = [
                'res_id' => $reservation_id,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'room' => $room_name,
                'checkin' => $checkin,
                'checkout' => $checkout,
                'nights' => $nights,
                'guests' => $guests,
                'price_per_night' => $price_per_night,
                'total' => $estimated_total
            ];
        }
    }
}

require_once 'header.php';
?>

<!-- Inner Page Banner -->
<section class="inner-page-banner" style="background-image: url('https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=1920&q=80');">
    <div class="container">
        <h1>Booking Inquiry</h1>
        <div class="breadcrumbs">
            <a href="index.php">Home</a>
            <span>/</span>
            <span>Book Now</span>
        </div>
    </div>
</section>

<!-- Content Area -->
<section class="py-section">
    <div class="container">
        
        <?php if ($booking_success): ?>
            <!-- Success / Reservation Receipt UI -->
            <div class="booking-page-box">
                <div class="booking-success-icon">
                    <i class="fas fa-check"></i>
                </div>
                <h2 style="margin-bottom: 12px; font-weight: 600;">Inquiry Received!</h2>
                <p style="color: var(--color-charcoal); font-size: 0.95rem; margin-bottom: 30px;">
                    Thank you, <strong><?php echo htmlspecialchars($booking_details['name']); ?></strong>. Your booking request has been submitted. Our team will verify room availability and contact you shortly to complete the reservation.
                </p>

                <h3 style="font-size: 1.15rem; font-weight: 700; text-transform: uppercase; color: var(--color-gold); text-align: left; border-bottom: 2px solid var(--color-border); padding-bottom: 8px; margin-bottom: 20px;">Inquiry Invoice Summary</h3>
                
                <table class="booking-summary-table">
                    <tr>
                        <th>Inquiry Reference</th>
                        <td style="font-weight: 700; color: var(--color-primary);"><?php echo $booking_details['res_id']; ?></td>
                    </tr>
                    <tr>
                        <th>Room Category</th>
                        <td><?php echo $booking_details['room']; ?></td>
                    </tr>
                    <tr>
                        <th>Check-in Date</th>
                        <td><?php echo date('F d, Y', strtotime($booking_details['checkin'])); ?></td>
                    </tr>
                    <tr>
                        <th>Check-out Date</th>
                        <td><?php echo date('F d, Y', strtotime($booking_details['checkout'])); ?></td>
                    </tr>
                    <tr>
                        <th>Number of Guests</th>
                        <td><?php echo $booking_details['guests']; ?> Guest(s)</td>
                    </tr>
                    <tr>
                        <th>Total Stay Duration</th>
                        <td><?php echo $booking_details['nights']; ?> Night(s)</td>
                    </tr>
                    <?php if ($booking_details['price_per_night'] > 0): ?>
                        <tr>
                            <th>Price Per Night</th>
                            <td>$<?php echo $booking_details['price_per_night']; ?> USD</td>
                        </tr>
                        <tr style="background-color: var(--color-gold-light); font-weight: 700;">
                            <th>Estimated Total</th>
                            <td style="font-size: 1.2rem; color: var(--color-primary);">$<?php echo $booking_details['total']; ?> USD</td>
                        </tr>
                    <?php else: ?>
                        <tr style="background-color: var(--color-gold-light); font-weight: 700;">
                            <th>Estimated Pricing</th>
                            <td style="color: var(--color-primary);">Quote provided upon confirmation</td>
                        </tr>
                    <?php endif; ?>
                </table>

                <div style="margin-top: 40px; display: flex; gap: 15px; justify-content: center;">
                    <a href="index.php" class="btn btn-primary">Return to Home</a>
                    <a href="https://wa.me/<?php echo SITE_WHATSAPP; ?>?text=Hello%20Sana%20Kuna%20Resort,%20I%20have%20submitted%20a%20booking%20inquiry%20with%20reference%20<?php echo $booking_details['res_id']; ?>" target="_blank" class="btn btn-gold" style="background-color: #25D366; border-color: #25D366;"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</a>
                </div>
            </div>
        <?php else: ?>
            <!-- Booking Form UI -->
            <div style="max-width: 800px; margin: 0 auto; background-color: var(--color-white); border-radius: var(--border-radius-md); box-shadow: var(--box-shadow); border: 1px solid var(--color-border); padding: 50px;">
                <div style="text-align: center; margin-bottom: 40px;">
                    <h2 style="font-weight: 600; margin-bottom: 12px;">Reserve Your Stay</h2>
                    <p style="color: var(--color-charcoal); font-size: 0.95rem;">Please review your check-in dates and provide contact details below to finalize your booking inquiry.</p>
                    <div class="section-divider"></div>
                </div>

                <?php if (!empty($booking_errors)): ?>
                    <div class="form-alert danger">
                        <div style="display: flex; flex-direction: column; gap: 4px;">
                            <span style="font-weight: 700;"><i class="fas fa-exclamation-triangle"></i> Form verification errors:</span>
                            <ul style="list-style: disc; margin-left: 20px; font-size: 0.85rem;">
                                <?php foreach ($booking_errors as $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="book.php" method="POST" id="booking-request-form">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                    <!-- Part 1: Date & Room details -->
                    <div style="background-color: var(--color-gray-light); padding: 25px; border-radius: var(--border-radius-sm); margin-bottom: 35px;">
                        <h4 style="font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-primary); margin-bottom: 20px; border-bottom: 1px solid var(--color-border); padding-bottom: 8px;"><i class="fas fa-suitcase"></i> Stay Information</h4>
                        
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                            <div class="form-group" style="margin-bottom: 0;">
                                <label for="book-checkin" class="form-label">Check-In Date *</label>
                                <input type="date" id="book-checkin" name="checkin" class="form-input" value="<?php echo $checkin_val; ?>" required min="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="form-group" style="margin-bottom: 0;">
                                <label for="book-checkout" class="form-label">Check-Out Date *</label>
                                <input type="date" id="book-checkout" name="checkout" class="form-input" value="<?php echo $checkout_val; ?>" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <div class="form-group" style="margin-bottom: 0;">
                                <label for="book-guests" class="form-label">Number of Guests *</label>
                                <select id="book-guests" name="guests" class="form-input" required>
                                    <option value="1" <?php echo ($guests_val == '1') ? 'selected' : ''; ?>>1 Guest</option>
                                    <option value="2" <?php echo ($guests_val == '2') ? 'selected' : ''; ?>>2 Guests</option>
                                    <option value="3" <?php echo ($guests_val == '3') ? 'selected' : ''; ?>>3 Guests</option>
                                    <option value="4" <?php echo ($guests_val == '4') ? 'selected' : ''; ?>>4 Guests</option>
                                    <option value="5+" <?php echo ($guests_val == '5+') ? 'selected' : ''; ?>>5+ Guests</option>
                                </select>
                            </div>
                            <div class="form-group" style="margin-bottom: 0;">
                                <label for="book-room-type" class="form-label">Room Category *</label>
                                <select id="book-room-type" name="room_type" class="form-input" required>
                                    <option value="any" <?php echo ($room_type_val == 'any') ? 'selected' : ''; ?>>Any Available Category</option>
                                    <?php foreach ($rooms as $key => $room_details): ?>
                                        <option value="<?php echo $key; ?>" <?php echo ($room_type_val == $key) ? 'selected' : ''; ?>><?php echo $room_details['name']; ?> - ($<?php echo $room_details['price']; ?>/night)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Part 2: Contact Details -->
                    <div>
                        <h4 style="font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-primary); margin-bottom: 20px; border-bottom: 1px solid var(--color-border); padding-bottom: 8px;"><i class="fas fa-user"></i> Contact Information</h4>
                        
                        <div class="form-group">
                            <label for="book-name" class="form-label">Full Name *</label>
                            <input type="text" id="book-name" name="name" class="form-input" placeholder="e.g. John Smith" required>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <div class="form-group">
                                <label for="book-email" class="form-label">Email Address *</label>
                                <input type="email" id="book-email" name="email" class="form-input" placeholder="e.g. john.smith@example.com" required>
                            </div>
                            <div class="form-group">
                                <label for="book-phone" class="form-label">Phone Number *</label>
                                <input type="tel" id="book-phone" name="phone" class="form-input" placeholder="e.g. +94 77 123 4567" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="book-requests" class="form-label">Special Requests (Optional)</label>
                            <textarea id="book-requests" name="special_requests" class="form-input" placeholder="Let us know if you need airport pickup, dietary preferences, or specific room configurations..."></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-gold btn-block" style="margin-top: 20px;">Submit Booking Request</button>
                </form>
            </div>
        <?php endif; ?>

    </div>
</section>

<!-- Include dates constraint script identical to home page for seamless user experience -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const checkin = document.getElementById('book-checkin');
        const checkout = document.getElementById('book-checkout');
        
        if (checkin && checkout) {
            checkin.addEventListener('change', () => {
                const checkinDate = new Date(checkin.value);
                const nextDay = new Date(checkinDate);
                nextDay.setDate(nextDay.getDate() + 1);
                
                const yyyy = nextDay.getFullYear();
                let mm = nextDay.getMonth() + 1;
                let dd = nextDay.getDate();
                
                if (mm < 10) mm = '0' + mm;
                if (dd < 10) dd = '0' + dd;
                
                checkout.min = `${yyyy}-${mm}-${dd}`;
                
                if (new Date(checkout.value) <= checkinDate) {
                    checkout.value = `${yyyy}-${mm}-${dd}`;
                }
            });
        }
    });
</script>

<?php
require_once 'footer.php';
?>
