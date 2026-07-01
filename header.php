<?php
require_once 'config.php';
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . " | " . SITE_NAME : SITE_NAME . " - " . SITE_TAGLINE; ?></title>
    
    <!-- Meta Descriptions for SEO -->
    <meta name="description" content="<?php echo isset($page_desc) ? $page_desc : "Experience the ultimate beachside luxury at Sana Kuna Holiday Resort in Pasikuda. Beautiful rooms, local dining, swimming pool, and premium services near the calmest bay in Sri Lanka."; ?>">
    <meta name="keywords" content="Sana Kuna Holiday Resort, Pasikuda Hotels, Pasikuda Beach Resort, Sri Lanka Luxury Hotels, Accommodation Pasikuda, Sri Lanka Travel">
    <meta name="author" content="Sana Kuna Resort">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title . " | " . SITE_NAME : SITE_NAME . " - " . SITE_TAGLINE; ?>">
    <meta property="og:description" content="Immerse yourself in coastal paradise. Beautiful rooms, premium services, and true hospitality in Pasikuda.">
    <meta property="og:image" content="img/logo.jpeg">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Main Stylesheet with cache busting -->
    <link rel="stylesheet" href="css/style.css?v=1.0.6">
    <!-- Hero V2 & Booking Bar Styles with cache busting -->
    <link rel="stylesheet" href="css/hero-v2.css?v=1.0.6">
</head>
<body>

    <!-- Top Info Bar -->
    <div class="top-bar">
        <div class="container top-bar-flex">
            <div class="top-info">
                <a href="tel:<?php echo str_replace(' ', '', SITE_PHONE); ?>"><i class="fas fa-phone-alt"></i> <?php echo SITE_PHONE; ?></a>
                <a href="mailto:<?php echo SITE_EMAIL; ?>"><i class="fas fa-envelope"></i> <?php echo SITE_EMAIL; ?></a>
                <span><i class="fas fa-map-marker-alt"></i> <?php echo SITE_LOCATION; ?></span>
            </div>
            <div class="top-social">
                <a href="<?php echo $social_links['facebook']; ?>" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="<?php echo $social_links['instagram']; ?>" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="<?php echo $social_links['tripadvisor']; ?>" target="_blank" aria-label="TripAdvisor"><i class="fab fa-tripadvisor"></i></a>
                <a href="https://wa.me/<?php echo SITE_WHATSAPP; ?>" target="_blank" aria-label="WhatsApp" class="whatsapp-accent"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <!-- Navigation Header -->
    <header class="main-header">
        <div class="container header-container">

            <!-- Brand Logo — uses real img/logo.jpeg with explicit width/height constraints -->
            <a href="index.php" class="brand-logo" id="header-logo-link">
                <div class="logo-wrapper">
                    <img src="img/logo.jpeg"
                         alt="Sana Kuna Holiday Resort — Pasikuda"
                         class="resort-logo-img"
                         width="58"
                         height="58">
                    <div class="logo-text">
                        <span class="logo-title">SANA KUNA</span>
                        <span class="logo-subtitle">HOLIDAY RESORT · PASIKUDA</span>
                    </div>
                </div>
            </a>

            <!-- Desktop Nav Menu -->
            <nav class="desktop-nav" aria-label="Main Navigation">
                <ul class="nav-menu">
                    <li><a href="index.php" class="nav-link <?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : ''; ?>">Home</a></li>
                    <li><a href="rooms.php" class="nav-link <?php echo ($current_page == 'rooms.php') ? 'active' : ''; ?>">Accommodation</a></li>
                    <li><a href="services.php" class="nav-link <?php echo ($current_page == 'services.php') ? 'active' : ''; ?>">Services</a></li>
                    <li><a href="gallery.php" class="nav-link <?php echo ($current_page == 'gallery.php') ? 'active' : ''; ?>">Gallery</a></li>
                    <li><a href="contact.php" class="nav-link <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact Us</a></li>
                </ul>
            </nav>

            <!-- Book Now Action Button (Header) -->
            <div class="header-action">
                <a href="book.php" class="btn btn-gold header-book-btn">Book Your Stay</a>
            </div>

            <!-- Hamburger Button (Mobile) -->
            <button class="hamburger-btn" id="mobile-menu-toggle" aria-label="Toggle Navigation Menu" aria-expanded="false">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </header>

    <!-- Mobile Navigation Drawer Overlay -->
    <div class="mobile-nav-overlay" id="mobile-menu-overlay"></div>
    <div class="mobile-nav-drawer" id="mobile-menu-drawer">
        <div class="mobile-drawer-header">
            <!-- Logo in mobile drawer too -->
            <div style="display:flex; align-items:center; gap:10px;">
                <img src="img/logo.jpeg" alt="Sana Kuna Logo" class="resort-logo-img" style="width:40px;height:40px;">
                <span class="drawer-title">Sana Kuna Resort</span>
            </div>
            <button class="drawer-close" id="mobile-menu-close" aria-label="Close Navigation Menu"><i class="fas fa-times"></i></button>
        </div>
        <nav class="mobile-nav" aria-label="Mobile Navigation">
            <ul class="mobile-menu-list">
                <li><a href="index.php" class="mobile-link <?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : ''; ?>">Home</a></li>
                <li><a href="rooms.php" class="mobile-link <?php echo ($current_page == 'rooms.php') ? 'active' : ''; ?>">Accommodation</a></li>
                <li><a href="services.php" class="mobile-link <?php echo ($current_page == 'services.php') ? 'active' : ''; ?>">Services</a></li>
                <li><a href="gallery.php" class="mobile-link <?php echo ($current_page == 'gallery.php') ? 'active' : ''; ?>">Gallery</a></li>
                <li><a href="contact.php" class="mobile-link <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact Us</a></li>
            </ul>
        </nav>
        <div class="mobile-drawer-footer">
            <a href="book.php" class="btn btn-gold btn-block">Book Your Stay</a>
            <div class="drawer-contact-info">
                <p><i class="fas fa-phone-alt"></i> <?php echo SITE_PHONE; ?></p>
                <p><i class="fas fa-envelope"></i> <?php echo SITE_EMAIL; ?></p>
            </div>
        </div>
    </div>
