<?php
/**
 * Sana Kuna Holiday Resort - Pasikuda
 * Gallery Page
 */

$page_title = "Resort Gallery & Visual Tour";
$page_desc = "Explore our premium hotel facilities in Pasikuda through our visual gallery. Filter by rooms, dining areas, pool, gardens, event halls, spa, and nearby attractions.";

require_once 'header.php';
?>

<!-- Inner Page Banner -->
<section class="inner-page-banner" style="background-image: url('https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?auto=format&fit=crop&w=1920&q=80');">
    <div class="container">
        <h1>Photo Gallery</h1>
        <div class="breadcrumbs">
            <a href="index.php">Home</a>
            <span>/</span>
            <span>Gallery</span>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-section">
    <div class="container">
        <div class="services-intro">
            <span class="section-subtitle">Visual Experience</span>
            <h2 class="section-title">A Glimpse of Paradise</h2>
            <p>
                Browse through our interactive gallery to explore the resort's premium interiors, beautiful tropical grounds, and nearby sights. Filter by categories to view specific areas.
            </p>
            <div class="section-divider"></div>
        </div>

        <!-- Filter Navigation Tabs -->
        <div class="gallery-filter-tabs">
            <button class="gallery-filter-btn active" data-filter="all">All</button>
            <button class="gallery-filter-btn" data-filter="exterior">Exterior</button>
            <button class="gallery-filter-btn" data-filter="reception">Reception</button>
            <button class="gallery-filter-btn" data-filter="rooms">Guest Rooms</button>
            <button class="gallery-filter-btn" data-filter="suites">Luxury Suites</button>
            <button class="gallery-filter-btn" data-filter="restaurant">Restaurant</button>
            <button class="gallery-filter-btn" data-filter="pool">Swimming Pool</button>
            <button class="gallery-filter-btn" data-filter="garden">Garden</button>
            <button class="gallery-filter-btn" data-filter="conference">Conference Hall</button>
            <button class="gallery-filter-btn" data-filter="wedding">Wedding Hall</button>
            <button class="gallery-filter-btn" data-filter="rooftop">Rooftop Area</button>
            <button class="gallery-filter-btn" data-filter="gym">Gym</button>
            <button class="gallery-filter-btn" data-filter="spa">Spa</button>
            <button class="gallery-filter-btn" data-filter="food">Food & Beverages</button>
            <button class="gallery-filter-btn" data-filter="attractions">Attractions</button>
        </div>

        <!-- Gallery Grid -->
        <div class="gallery-masonry-grid" id="resort-photo-grid">
            <?php foreach ($gallery_items as $item): ?>
                <div class="gallery-item-card" data-category="<?php echo $item['category']; ?>" data-src="<?php echo $item['image']; ?>">
                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>" class="gallery-item-img">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                        <span class="gallery-item-caption"><?php echo $item['title']; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
require_once 'footer.php';
?>
