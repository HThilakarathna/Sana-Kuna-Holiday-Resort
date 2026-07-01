/**
 * Sana Kuna Holiday Resort - Pasikuda
 * Core Frontend JavaScript
 */

document.addEventListener('DOMContentLoaded', () => {

    /* ==========================================================================
       1. STICKY HEADER & BACK-TO-TOP BUTTON
       ========================================================================== */
    const header = document.querySelector('.main-header');
    const backToTopBtn = document.getElementById('back-to-top-btn');
    
    const handleScroll = () => {
        const scrollPos = window.scrollY;
        
        // Sticky navigation trigger
        if (scrollPos > 50) {
            header.classList.add('stickied');
        } else {
            header.classList.remove('stickied');
        }
        
        // Back to top button trigger
        if (scrollPos > 400) {
            backToTopBtn.classList.add('active');
        } else {
            backToTopBtn.classList.remove('active');
        }
    };

    window.addEventListener('scroll', handleScroll);
    // Call once initially to handle page reloads mid-page
    handleScroll();


    /* ==========================================================================
       2. RESPONSIVE MOBILE DRAWER MENU
       ========================================================================== */
    const menuToggle = document.getElementById('mobile-menu-toggle');
    const menuClose = document.getElementById('mobile-menu-close');
    const menuOverlay = document.getElementById('mobile-menu-overlay');
    const menuDrawer = document.getElementById('mobile-menu-drawer');
    
    const toggleMobileMenu = (open) => {
        if (open) {
            menuDrawer.classList.add('active');
            menuOverlay.classList.add('active');
            menuToggle.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden'; // Stop background scrolling
        } else {
            menuDrawer.classList.remove('active');
            menuOverlay.classList.remove('active');
            menuToggle.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        }
    };

    if (menuToggle) {
        menuToggle.addEventListener('click', () => toggleMobileMenu(true));
    }
    
    if (menuClose) {
        menuClose.addEventListener('click', () => toggleMobileMenu(false));
    }
    
    if (menuOverlay) {
        menuOverlay.addEventListener('click', () => toggleMobileMenu(false));
    }


    /* ==========================================================================
       3. HERO SLIDER LOGIC — supports both hero-v2 and legacy hero-slider-section
       ========================================================================== */

    // Detect which hero variant is on this page
    const heroV2Section = document.querySelector('.hero-v2');
    const legacySection = document.querySelector('.hero-slider-section');

    // --- V2 Hero Slider ---
    if (heroV2Section) {
        const v2Slides = heroV2Section.querySelectorAll('.hero-v2-slide');
        const v2DotsContainer = document.getElementById('hero-v2-dots');
        let v2Current = 0;
        let v2Interval;
        const V2_INTERVAL = 6000;

        // Build dot indicators
        v2Slides.forEach((_, i) => {
            const dot = document.createElement('button');
            dot.classList.add('hero-v2-dot');
            if (i === 0) dot.classList.add('active');
            dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
            dot.addEventListener('click', () => { v2GoTo(i); v2Reset(); });
            if (v2DotsContainer) v2DotsContainer.appendChild(dot);
        });

        const v2Dots = () => document.querySelectorAll('.hero-v2-dot');

        const v2GoTo = (n) => {
            v2Slides[v2Current].classList.remove('active');
            v2Dots().forEach(d => d.classList.remove('active'));
            v2Current = (n + v2Slides.length) % v2Slides.length;
            v2Slides[v2Current].classList.add('active');
            v2Dots()[v2Current]?.classList.add('active');
        };

        const v2Start = () => { v2Interval = setInterval(() => v2GoTo(v2Current + 1), V2_INTERVAL); };
        const v2Reset = () => { clearInterval(v2Interval); v2Start(); };
        v2Start();
    }

    // --- Legacy Hero Slider ---
    const slides = document.querySelectorAll('.hero-slide');
    const dotsContainer = document.querySelector('.slider-dots');
    const heroSection = document.querySelector('.hero-slider-section');

    if (slides.length > 0) {
        let currentSlide = 0;
        let slideInterval;
        const intervalTime = 6000;

        window.addEventListener('load', () => {
            if (heroSection) heroSection.classList.add('loaded');
        });

        slides.forEach((_, index) => {
            const dot = document.createElement('button');
            dot.classList.add('slider-dot');
            if (index === 0) dot.classList.add('active');
            dot.setAttribute('aria-label', `Go to slide ${index + 1}`);
            dot.addEventListener('click', () => { goToSlide(index); resetInterval(); });
            if (dotsContainer) dotsContainer.appendChild(dot);
        });

        const dots = document.querySelectorAll('.slider-dot');

        const goToSlide = (n) => {
            slides[currentSlide].classList.remove('active');
            if (dots.length > 0) dots[currentSlide].classList.remove('active');
            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
            if (dots.length > 0) dots[currentSlide].classList.add('active');
        };

        const startInterval = () => { slideInterval = setInterval(() => goToSlide(currentSlide + 1), intervalTime); };
        const resetInterval = () => { clearInterval(slideInterval); startInterval(); };
        startInterval();
    }


    /* ==========================================================================
       4. GALLERY MASONRY FILTER LOGIC (Gallery Page)
       ========================================================================== */
    const filterButtons = document.querySelectorAll('.gallery-filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item-card');

    if (filterButtons.length > 0 && galleryItems.length > 0) {
        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                // Set active tab styling
                filterButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                const filterValue = btn.getAttribute('data-filter');
                
                galleryItems.forEach(item => {
                    const itemCategory = item.getAttribute('data-category');
                    
                    if (filterValue === 'all' || itemCategory === filterValue) {
                        item.classList.remove('hide');
                        // Micro delay for CSS transitions
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'scale(1)';
                        }, 50);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.8)';
                        // Wait for transition to complete before display hidden
                        setTimeout(() => {
                            item.classList.add('hide');
                        }, 400);
                    }
                });
            });
        });
    }


    /* ==========================================================================
       5. GALLERY LIGHTBOX MODAL LOGIC
       ========================================================================== */
    // Create and append the lightbox modal elements dynamically if not already in markup
    const createLightboxElements = () => {
        if (document.getElementById('lightbox-modal')) return;
        
        const modalHtml = `
            <div class="lightbox-modal" id="lightbox-modal">
                <button class="lightbox-close" id="lightbox-close-btn" aria-label="Close Lightbox">&times;</button>
                <button class="lightbox-nav-btn lightbox-prev-btn" id="lightbox-prev-btn" aria-label="Previous Image"><i class="fas fa-chevron-left"></i></button>
                <button class="lightbox-nav-btn lightbox-next-btn" id="lightbox-next-btn" aria-label="Next Image"><i class="fas fa-chevron-right"></i></button>
                <div class="lightbox-content-box">
                    <img src="" alt="" class="lightbox-img" id="lightbox-img">
                    <h3 class="lightbox-title" id="lightbox-title"></h3>
                </div>
            </div>
        `;
        document.body.insertAdjacentHTML('beforeend', modalHtml);
    };

    createLightboxElements();

    const lightboxModal = document.getElementById('lightbox-modal');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxClose = document.getElementById('lightbox-close-btn');
    const lightboxPrev = document.getElementById('lightbox-prev-btn');
    const lightboxNext = document.getElementById('lightbox-next-btn');

    let activeGalleryItemsArray = [];
    let currentImageIndex = 0;

    const updateLightboxImage = () => {
        if (activeGalleryItemsArray.length === 0) return;
        const currentItem = activeGalleryItemsArray[currentImageIndex];
        const fullImgSrc = currentItem.getAttribute('data-src');
        const captionText = currentItem.querySelector('.gallery-item-caption').textContent;
        
        lightboxImg.src = fullImgSrc;
        lightboxImg.alt = captionText;
        lightboxTitle.textContent = captionText;
    };

    const openLightbox = (index) => {
        // Collect currently visible images in the DOM (not hidden by category filter)
        activeGalleryItemsArray = Array.from(galleryItems).filter(item => !item.classList.contains('hide'));
        
        // Find index of clicked item within visible ones
        const clickedItem = galleryItems[index];
        currentImageIndex = activeGalleryItemsArray.indexOf(clickedItem);
        
        // If not found in filtered list, default to index 0
        if (currentImageIndex === -1) currentImageIndex = 0;

        updateLightboxImage();
        lightboxModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    };

    const closeLightbox = () => {
        lightboxModal.classList.remove('active');
        document.body.style.overflow = '';
    };

    const navigateLightbox = (direction) => {
        if (activeGalleryItemsArray.length === 0) return;
        currentImageIndex = (currentImageIndex + direction + activeGalleryItemsArray.length) % activeGalleryItemsArray.length;
        updateLightboxImage();
    };

    // Attach click events to gallery items
    galleryItems.forEach((item, index) => {
        item.addEventListener('click', () => openLightbox(index));
    });

    if (lightboxClose) {
        lightboxClose.addEventListener('click', closeLightbox);
    }

    if (lightboxPrev) {
        lightboxPrev.addEventListener('click', () => navigateLightbox(-1));
    }

    if (lightboxNext) {
        lightboxNext.addEventListener('click', () => navigateLightbox(1));
    }

    // Close lightbox on clicking dark background blur
    if (lightboxModal) {
        lightboxModal.addEventListener('click', (e) => {
            if (e.target === lightboxModal) closeLightbox();
        });
    }

    // Keyboard navigation hooks
    document.addEventListener('keydown', (e) => {
        if (!lightboxModal || !lightboxModal.classList.contains('active')) return;
        
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') navigateLightbox(-1);
        if (e.key === 'ArrowRight') navigateLightbox(1);
    });

});
