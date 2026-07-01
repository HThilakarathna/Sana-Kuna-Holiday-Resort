<?php
/**
 * Sana Kuna Holiday Resort - Pasikuda
 * Home Page
 */

// Set page title and SEO description
$page_title = "Welcome to Paradise in Pasikuda";
$page_desc = "Experience luxury coastal hospitality at Sana Kuna Holiday Resort, Pasikuda. Premium rooms, swimming pool, exquisite dining, and beautiful tropical gardens.";

require_once 'header.php';
?>

<!-- ======================================================
     HERO SECTION — Creative Sunset Araliya–Inspired Layout
     ====================================================== -->
<section class="hero-v2" id="hero-slider-home">

    <!-- Background Slides -->
    <div class="hero-v2-slides">
        <div class="hero-v2-slide active" style="background-image:url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1920&q=80');"></div>
        <div class="hero-v2-slide" style="background-image:url('https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?auto=format&fit=crop&w=1920&q=80');"></div>
        <div class="hero-v2-slide" style="background-image:url('https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=1920&q=80');"></div>
        <div class="hero-v2-slide" style="background-image:url('https://images.unsplash.com/photo-1506929562872-bb421503ef21?auto=format&fit=crop&w=1920&q=80');"></div>
    </div>

    <!-- Dark gradient overlay -->
    <div class="hero-v2-overlay"></div>

    <!-- Content Layer -->
    <div class="hero-v2-content">
        <div class="container hero-v2-container">

            <!-- LEFT: Main copy -->
            <div class="hero-v2-left">
                <!-- Floating pill badges -->
                <div class="hero-v2-badges">
                    <span class="hero-badge hero-badge--outline">
                        <i class="fas fa-umbrella-beach"></i> Premium Beachside Stay
                    </span>
                    <span class="hero-badge hero-badge--pill">
                        <i class="fas fa-circle" style="font-size:.5rem;"></i>
                        Rooms &bull; Dining &bull; Pool &bull; Events
                    </span>
                </div>

                <!-- Mega Headline -->
                <h1 class="hero-v2-title">
                    Experience<br>
                    <em>True Paradise</em><br>
                    at Pasikuda
                </h1>

                <!-- Short tagline -->
                <p class="hero-v2-sub">
                    Sri Lanka's most tranquil beach resort — where the warm turquoise shallows meet world-class tropical hospitality.
                </p>

                <!-- Dual CTA Row -->
                <div class="hero-v2-cta-row">
                    <a href="book.php" class="btn hero-cta-primary" id="hero-book-btn">
                        Book Your Stay <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="gallery.php" class="btn hero-cta-ghost" id="hero-gallery-btn">
                        <span class="play-icon"><i class="fas fa-images"></i></span>
                        Explore Gallery
                    </a>
                </div>

                <!-- Partner / Featured-on strip -->
                <div class="hero-partner-strip">
                    <span class="partner-label">Featured On</span>
                    <div class="partner-logos">
                        <span class="partner-logo-item"><i class="fab fa-tripadvisor"></i> TripAdvisor</span>
                        <span class="partner-divider">|</span>
                        <span class="partner-logo-item"><i class="fas fa-globe"></i> Booking.com</span>
                        <span class="partner-divider">|</span>
                        <span class="partner-logo-item" style="color:#FF5A5F;"><i class="fab fa-airbnb"></i> Airbnb</span>
                    </div>
                </div>
            </div>

            <!-- RIGHT: "Why Guests Choose Us" floating panel -->
            <div class="hero-v2-right">
                <div class="hero-why-panel">
                    <div class="hero-why-header">
                        <span class="why-label">Why Guests Choose Us</span>
                        <i class="fas fa-star" style="color:var(--color-gold);font-size:1rem;"></i>
                    </div>
                    <h3 class="why-title">Luxury Coastal Experience</h3>
                    <ul class="why-list">
                        <li class="why-item">
                            <span class="why-dot"></span>
                            Calm, shallow Pasikuda Bay — safest beach in Sri Lanka
                        </li>
                        <li class="why-item">
                            <span class="why-dot"></span>
                            Crystal infinity pool &amp; tropical gardens
                        </li>
                        <li class="why-item">
                            <span class="why-dot"></span>
                            Authentic seafood &amp; Sri Lankan cuisine
                        </li>
                        <li class="why-item">
                            <span class="why-dot"></span>
                            Spa, gym, events &amp; wedding venues
                        </li>
                        <li class="why-item">
                            <span class="why-dot"></span>
                            24/7 personalized butler &amp; concierge service
                        </li>
                    </ul>
                    <a href="services.php" class="why-cta-link">
                        View All Amenities <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Slide Dots -->
    <div class="hero-v2-dots" id="hero-v2-dots"></div>

    <!-- Scroll-down indicator -->
    <a href="#about-resort" class="hero-scroll-indicator" aria-label="Scroll down">
        <span class="scroll-mouse"><span class="scroll-wheel"></span></span>
        <span class="scroll-label">Scroll</span>
    </a>
</section>

<!-- Quick Booking Bar (below hero, not overlapping) -->
<div class="booking-bar-standalone" id="quick-booking-bar">
    <div class="container">
        <form action="book.php" method="GET" class="booking-form-v2">
            <div class="bfv2-group">
                <label for="check-in-date"><i class="fas fa-calendar-check"></i> Check-In</label>
                <input type="date" id="check-in-date" name="checkin" required min="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="bfv2-sep"></div>
            <div class="bfv2-group">
                <label for="check-out-date"><i class="fas fa-calendar-times"></i> Check-Out</label>
                <input type="date" id="check-out-date" name="checkout" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
            </div>
            <div class="bfv2-sep"></div>
            <div class="bfv2-group">
                <label for="guest-count"><i class="fas fa-users"></i> Guests</label>
                <select id="guest-count" name="guests" required>
                    <option value="1">1 Guest</option>
                    <option value="2" selected>2 Guests</option>
                    <option value="3">3 Guests</option>
                    <option value="4">4 Guests</option>
                    <option value="5+">5+ Guests</option>
                </select>
            </div>
            <div class="bfv2-sep"></div>
            <div class="bfv2-group">
                <label for="room-select"><i class="fas fa-bed"></i> Room Type</label>
                <select id="room-select" name="room_type">
                    <option value="any">Any Category</option>
                    <?php foreach($rooms as $key => $r): ?>
                        <option value="<?php echo $key; ?>"><?php echo $r['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="bfv2-submit">
                <i class="fas fa-search"></i> Check Availability
            </button>
        </form>
    </div>
</div>

<!-- About Us Section -->
<section class="py-section" id="about-resort">
    <div class="container about-grid">
        <div class="about-content">
            <span class="section-subtitle">Discover Sana Kuna</span>
            <h2 class="section-title">Welcome to True Hospitality</h2>
            <p class="about-text">
                Welcome to Sana Kuna Holiday Resort, where comfort, luxury, and exceptional hospitality come together to create unforgettable experiences. Located in a peaceful and convenient location in Pasikuda, our hotel offers beautifully designed rooms, modern facilities, and personalized service for business travelers, families, couples, and tourists. 
            </p>
            <p class="about-text">
                Our dedicated team is committed to making every guest feel at home from the moment they arrive. Whether you are visiting for business, leisure, or a special occasion, we provide a relaxing atmosphere with high-quality accommodation, delicious dining options, and excellent customer service. Our mission is to exceed guest expectations by delivering outstanding hospitality, comfort, and memorable experiences. We look forward to welcoming you and making your stay truly enjoyable.
            </p>
            <a href="contact.php" class="btn btn-outline-gold">Get In Touch</a>
        </div>
        <div class="about-images-wrapper">
            <img src="img/about.jpg" alt="Aerial Pasikuda Bay View" class="about-img about-img-main">
            <img src="img/about-sub.jpg" alt="Balcony Ocean View" class="about-img about-img-sub">
        </div>
    </div>
</section>

<!-- Quick Room Showcase -->
<section class="rooms-showcase py-section bg-light" id="featured-accommodation">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Luxury Living</span>
            <h2 class="section-title">Our Featured Sanctuary Rooms</h2>
            <p>Each space is carefully composed, merging fine teak wood carvings and soft ocean-inspired hues to create a relaxing haven.</p>
            <div class="section-divider"></div>
        </div>
        
        <div class="rooms-grid">
            <?php 
            $count = 0;
            foreach ($rooms as $key => $room_details): 
                if ($room_details['featured'] && $count < 3):
                    $count++;
            ?>
                <div class="room-card">
                    <div class="room-card-img-wrapper">
                        <img src="<?php echo $room_details['image']; ?>" alt="<?php echo $room_details['name']; ?>" class="room-card-img">
                        <div class="room-card-price">
                            $<?php echo $room_details['price']; ?><span> / Night</span>
                        </div>
                    </div>
                    <div class="room-card-content">
                        <h3 class="room-card-title"><?php echo $room_details['name']; ?></h3>
                        <p class="room-card-desc"><?php echo $room_details['short_desc']; ?></p>
                        
                        <div class="room-card-specs">
                            <div class="room-spec-item">
                                <i class="fas fa-arrows-alt"></i>
                                <span><?php echo $room_details['size']; ?></span>
                            </div>
                            <div class="room-spec-item">
                                <i class="fas fa-users"></i>
                                <span><?php echo $room_details['capacity']; ?></span>
                            </div>
                            <div class="room-spec-item">
                                <i class="fas fa-eye"></i>
                                <span><?php echo $room_details['view']; ?></span>
                            </div>
                        </div>
                        
                        <div class="room-card-actions">
                            <a href="rooms.php#<?php echo $key; ?>" class="btn btn-outline-gold">View Details</a>
                            <a href="book.php?room_type=<?php echo $key; ?>" class="btn btn-gold">Book Now</a>
                        </div>
                    </div>
                </div>
            <?php 
                endif;
            endforeach; 
            ?>
        </div>
        
        <div style="text-align: center; margin-top: 50px;">
            <a href="rooms.php" class="btn btn-primary">View All Rooms & Suites</a>
        </div>
    </div>
</section>

<!-- Featured Highlights -->
<section class="highlights-section py-section" id="featured-highlights">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Resort Signature Experiences</span>
            <h2 class="section-title">Indulgence, Flavors & Serenity</h2>
            <p>Sana Kuna Holiday Resort features exquisite local dining options, crystal pool lines, and beautiful gardens for a truly premium vacation.</p>
            <div class="section-divider"></div>
        </div>
        
        <div class="highlights-grid">
            <!-- Highlight 1: Swimming Pool -->
            <div class="highlight-card">
                <img src="https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?auto=format&fit=crop&w=800&q=80" alt="Resort Infinity Swimming Pool" class="highlight-card-img">
                <div class="highlight-card-overlay">
                    <h3 class="highlight-card-title">Crystal Pool</h3>
                    <p class="highlight-card-desc">Take a refreshing dip in our clear infinity-edge pool or lounge under shade trees with a cool tropical drink.</p>
                </div>
            </div>
            
            <!-- Highlight 2: Restaurant -->
            <div class="highlight-card">
                <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&w=800&q=80" alt="Resort Beach View Restaurant" class="highlight-card-img">
                <div class="highlight-card-overlay">
                    <h3 class="highlight-card-title">Signature Restaurant</h3>
                    <p class="highlight-card-desc">Indulge in fresh seafood delicacies, clay-pot curries, and select international cuisines crafted by expert chefs.</p>
                </div>
            </div>
            
            <!-- Highlight 3: Garden -->
            <div class="highlight-card">
                <img src="https://images.unsplash.com/photo-1546548970-71785318a17b?auto=format&fit=crop&w=800&q=80" alt="Tropical Lush Gardens" class="highlight-card-img">
                <div class="highlight-card-overlay">
                    <h3 class="highlight-card-title">Tropical Gardens</h3>
                    <p class="highlight-card-desc">Stroll along our lush manicured lawns lined with towering coconut palms, offering a peaceful atmosphere.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script to automatically enforce check-in check-out logical limits -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const checkin = document.getElementById('check-in-date');
        const checkout = document.getElementById('check-out-date');
        
        if (checkin && checkout) {
            checkin.addEventListener('change', () => {
                const checkinDate = new Date(checkin.value);
                const nextDay = new Date(checkinDate);
                nextDay.setDate(nextDay.getDate() + 1);
                
                // Format date as YYYY-MM-DD
                const yyyy = nextDay.getFullYear();
                let mm = nextDay.getMonth() + 1;
                let dd = nextDay.getDate();
                
                if (mm < 10) mm = '0' + mm;
                if (dd < 10) dd = '0' + dd;
                
                checkout.min = `${yyyy}-${mm}-${dd}`;
                
                // If current checkout is less than min, override it
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
