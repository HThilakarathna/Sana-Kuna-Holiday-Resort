<?php
/**
 * Sana Kuna Holiday Resort - Pasikuda
 * Services & Amenities Page
 */

$page_title = "Resort Services & Amenities";
$page_desc = "Discover our wide array of premium guest services at Sana Kuna Holiday Resort. 24/7 reception, infinity pool, spa, wedding and conference halls.";

require_once 'header.php';
?>

<!-- Inner Page Banner -->
<section class="inner-page-banner" style="background-image: url('https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=1920&q=80');">
    <div class="container">
        <h1>Services & Amenities</h1>
        <div class="breadcrumbs">
            <a href="index.php">Home</a>
            <span>/</span>
            <span>Services & Amenities</span>
        </div>
    </div>
</section>

<!-- Services Grid Section -->
<section class="py-section">
    <div class="container">
        <div class="services-intro">
            <span class="section-subtitle">World Class Convenience</span>
            <h2 class="section-title">Premium Facilities & Guest Services</h2>
            <p>
                At Sana Kuna Holiday Resort, we are dedicated to making your stay as relaxing, convenient, and memorable as possible. From leisure facilities like our pool and spa to essential travel services, our resort provides a comprehensive range of amenities to serve all your needs.
            </p>
            <div class="section-divider"></div>
        </div>

        <div class="services-grid">
            <?php foreach ($services as $service): ?>
                <div class="service-card" id="service-<?php echo $service['id']; ?>">
                    <div class="service-icon-wrapper">
                        <i class="<?php echo $service['icon']; ?>"></i>
                    </div>
                    <h3 class="service-title"><?php echo $service['title']; ?></h3>
                    <p class="service-desc"><?php echo $service['desc']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
require_once 'footer.php';
?>
