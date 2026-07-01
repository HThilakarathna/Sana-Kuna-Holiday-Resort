<?php
/**
 * Sana Kuna Holiday Resort - Pasikuda
 * Accommodation / Rooms Page
 */

$page_title = "Luxury Rooms & Suites";
$page_desc = "Browse through our collection of premium rooms and suites in Pasikuda. Standard rooms, Deluxe balconies, Family suites, and Luxury Jacuzzi rooms.";

require_once 'header.php';
?>

<!-- Inner Page Banner -->
<section class="inner-page-banner" style="background-image: url('https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=1920&q=80');">
    <div class="container">
        <h1>Our Accommodation</h1>
        <div class="breadcrumbs">
            <a href="index.php">Home</a>
            <span>/</span>
            <span>Accommodation</span>
        </div>
    </div>
</section>

<!-- Accommodation Intro -->
<section class="py-section">
    <div class="container">
        <div class="services-intro">
            <span class="section-subtitle" style="color: var(--color-gold);">Sanctuary Spaces</span>
            <h2 class="section-title">Designed for Your Comfort</h2>
            <p>
                Experience comfort and relaxation in our well-appointed rooms designed to meet every traveler's needs. Book your stay today and enjoy a relaxing experience with modern comforts and exceptional service.
            </p>
            <div class="section-divider"></div>
        </div>

        <!-- Room Listing Grid -->
        <div class="rooms-grid" style="grid-template-columns: repeat(auto-fill, minmax(360px, 1fr)); gap: 40px; margin-bottom: 80px;">
            <?php foreach ($rooms as $key => $room_details): ?>
                <div class="room-card" id="<?php echo $key; ?>">
                    <div class="room-card-img-wrapper" style="height: 280px;">
                        <img src="<?php echo $room_details['image']; ?>" alt="<?php echo $room_details['name']; ?>" class="room-card-img">
                        <div class="room-card-price">
                            $<?php echo $room_details['price']; ?><span> / Night</span>
                        </div>
                    </div>
                    <div class="room-card-content">
                        <h3 class="room-card-title"><?php echo $room_details['name']; ?></h3>
                        <p class="room-card-desc" style="font-size: 0.92rem; line-height: 1.6; margin-bottom: 20px;"><?php echo $room_details['long_desc']; ?></p>
                        
                        <h4 style="font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--color-gold); margin-bottom: 12px;">Room Inclusions:</h4>
                        <ul style="list-style: none; display: grid; grid-template-columns: 1fr 1fr; gap: 8px 15px; margin-bottom: 30px; font-size: 0.82rem; color: var(--color-charcoal);">
                            <?php foreach ($room_details['features'] as $feature): ?>
                                <li style="display: flex; align-items: center; gap: 6px;">
                                    <i class="fas fa-check" style="color: var(--color-gold); font-size: 0.75rem;"></i>
                                    <span><?php echo $feature; ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="room-card-specs" style="margin-top: auto; padding-top: 15px;">
                            <div class="room-spec-item">
                                <i class="fas fa-arrows-alt"></i>
                                <span><?php echo $room_details['size']; ?></span>
                            </div>
                            <div class="room-spec-item">
                                <i class="fas fa-users"></i>
                                <span><?php echo $room_details['capacity']; ?></span>
                            </div>
                            <div class="room-spec-item">
                                <i class="fas fa-bed"></i>
                                <span><?php echo $room_details['bed']; ?></span>
                            </div>
                        </div>
                        
                        <div class="room-card-actions" style="grid-template-columns: 1fr;">
                            <a href="book.php?room_type=<?php echo $key; ?>" class="btn btn-gold btn-block">Book This Room</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Room Amenities Section -->
<section class="py-section amenities-section-bg">
    <div class="container">
        <div class="section-header" style="margin-bottom: 50px;">
            <span class="section-subtitle">Resort Wide Comfort</span>
            <h2 class="section-title">Standard Room Amenities</h2>
            <p>Every room category is designed to deliver a premier experience. Enjoy these standard provisions when staying with us at Sana Kuna.</p>
            <div class="section-divider"></div>
        </div>

        <div class="amenities-grid">
            <?php foreach ($room_amenities as $amenity): ?>
                <div class="amenity-item">
                    <i class="<?php echo $amenity['icon']; ?>"></i>
                    <span class="amenity-name"><?php echo $amenity['name']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
require_once 'footer.php';
?>
