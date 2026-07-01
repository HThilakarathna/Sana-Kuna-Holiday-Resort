<?php
/**
 * Sana Kuna Holiday Resort - Pasikuda
 * Configuration File
 */

// Site Details
define('SITE_NAME', 'Sana Kuna Holiday Resort');
define('SITE_TAGLINE', 'Experience True Paradise at Pasikuda');
define('SITE_LOCATION', 'Pasikuda, Sri Lanka');
define('SITE_EMAIL', 'info@sanakunaholidayresort.com');
define('SITE_PHONE', '+94 65 222 3456');
define('SITE_MOBILE', '+94 77 123 4567');
define('SITE_WHATSAPP', '+94771234567'); // For direct click-to-chat link
define('SITE_ADDRESS', 'Kalkudah Road, Pasikuda, Kalkudah, Sri Lanka');
define('SITE_BUSINESS_HOURS', '24/7 / Always Open');
define('SITE_URL', 'http://localhost/SANA%20KUNA%20HOLIDAY%20RESORT%20-%20PASIKUDA/');

// Social Media Links
$social_links = [
    'facebook'  => 'https://facebook.com/sanakunapasikuda',
    'instagram' => 'https://instagram.com/sanakunapasikuda',
    'tripadvisor' => 'https://tripadvisor.com/sanakuna',
    'youtube'   => 'https://youtube.com/sanakuna'
];

// Room Categories Data Array
$rooms = [
    'standard-room' => [
        'name' => 'Standard Room',
        'price' => 75,
        'size' => '28 m²',
        'capacity' => '2 Adults',
        'bed' => '1 Double Bed',
        'view' => 'Garden View',
        'image' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=800&q=80',
        'short_desc' => 'An elegant, cozy retreat featuring modern comforts, beautiful design, and a serene garden outlook.',
        'long_desc' => 'Enjoy a quiet and comfortable stay in our Standard Room. Perfect for solo travelers or couples, it combines contemporary coastal elegance with functional design. Outfitted with premium bedding, a work desk, and comprehensive amenities, it offers a warm, peaceful space to return to after a long day at the Pasikuda beach.',
        'features' => ['Air Conditioning', 'Free High-Speed Wi-Fi', 'Flat Screen TV', 'Private Bathroom with Hot Water', 'Daily Housekeeping', 'Complimentary Toiletries', 'Tea & Coffee Maker', 'Mini Refrigerator'],
        'featured' => true
    ],
    'deluxe-room' => [
        'name' => 'Deluxe Room',
        'price' => 110,
        'size' => '36 m²',
        'capacity' => '2 Adults + 1 Child',
        'bed' => '1 King Size Bed',
        'view' => 'Garden or Pool View',
        'image' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=800&q=80',
        'short_desc' => 'Spacious and stylish, our Deluxe Room offers refined comforts, private balcony, and superior design touchpoints.',
        'long_desc' => 'Our Deluxe Room provides extra space and elevated comfort. Adorned with handcrafted local decorative touches, it features a private balcony with panoramic garden or pool views. Unwind in the plush king-sized bed, catch up with your favorite shows on the large Smart TV, and enjoy the refreshing coastal breeze.',
        'features' => ['Air Conditioning', 'Free High-Speed Wi-Fi', 'Flat Screen TV', 'Private Bathroom with Hot Water', 'Private Balcony', 'Daily Housekeeping', 'Room Service', 'Complimentary Toiletries', 'Tea & Coffee Maker', 'Mini Refrigerator'],
        'featured' => true
    ],
    'family-room' => [
        'name' => 'Family Room',
        'price' => 160,
        'size' => '52 m²',
        'capacity' => '4 Guests',
        'bed' => '2 Double Beds',
        'view' => 'Garden View',
        'image' => 'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=800&q=80',
        'short_desc' => 'The perfect family getaway layout offering two large beds, generous lounge area, and all essential modern conveniences.',
        'long_desc' => 'Create unforgettable family memories in our spacious Family Room. Designed with multiple guests in mind, this room offers two double beds, comfortable seating, and extra space for bags and play. Complete with child-friendly touches and modern amenities, it provides all the conveniences of a beachside home.',
        'features' => ['Air Conditioning', 'Free High-Speed Wi-Fi', 'Flat Screen TV', 'Private Bathroom with Hot Water', 'Daily Housekeeping', 'Room Service', 'Complimentary Toiletries', 'Tea & Coffee Maker', 'Mini Refrigerator', 'Perfect for Families'],
        'featured' => true
    ],
    'executive-suite' => [
        'name' => 'Executive Suite',
        'price' => 220,
        'size' => '65 m²',
        'capacity' => '2 Adults',
        'bed' => '1 King Size Bed',
        'view' => 'Pool & Garden View',
        'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=800&q=80',
        'short_desc' => 'A luxurious haven designed for executives and couples seeking premium spaces, a separate lounge, and ultimate privacy.',
        'long_desc' => 'Elevate your stay in our Executive Suite. Spanning across a master bedroom and a separate living lounge, this suite is decorated in rich wooden accents matching the resort\'s coastal aesthetic. Offering a deep soaking tub, customized toiletries, and private balcony seating, it represents the epitome of beachside luxury.',
        'features' => ['Air Conditioning', 'Free High-Speed Wi-Fi', 'Flat Screen TV (Living & Bedroom)', 'Luxury Bathroom with Bathtub & Hot Water', 'Private Balcony', 'Daily Housekeeping', 'Room Service', 'Complimentary Luxury Toiletries', 'Tea & Coffee Station', 'Mini Refrigerator', 'Living Room Area'],
        'featured' => false
    ],
    'luxury-suite' => [
        'name' => 'Luxury Suite',
        'price' => 310,
        'size' => '85 m²',
        'capacity' => '2 Adults',
        'bed' => '1 Super King Bed',
        'view' => 'Panoramic Pool & Gardens',
        'image' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?auto=format&fit=crop&w=800&q=80',
        'short_desc' => 'Our crown jewel. Expansive living, private outdoor deck, high-end bath settings, and top-tier personalized hospitality.',
        'long_desc' => 'The Luxury Suite represents the peak of Sana Kuna Holiday Resort hospitality. Indulge in an expansive floorplan, custom teak furnishings, and full glass slide doors opening to a premium private veranda. Guests in this suite enjoy dedicated priority room service, high-end espresso machine, premium minibar, and absolute privacy.',
        'features' => ['Air Conditioning', 'Free High-Speed Wi-Fi', 'Two 55" Smart TVs', 'Premium Bathroom with Jacuzzi Bath & Shower', 'Private Large Veranda', 'Daily Housekeeping', 'Dedicated Room Service', 'Premium Toiletries', 'Espresso Machine', 'Premium Minibar', 'Spacious Seating Area'],
        'featured' => false
    ]
];

// Resort Services & Amenities (20 items requested)
$services = [
    [
        'id' => 'reception',
        'icon' => 'fas fa-concierge-bell',
        'title' => '24/7 Reception',
        'desc' => 'Our front desk is active round-the-clock to ensure seamless check-ins, local support, and instant help.'
    ],
    [
        'id' => 'restaurant',
        'icon' => 'fas fa-utensils',
        'title' => 'Restaurant & Café',
        'desc' => 'Savor exquisite local seafood, traditional Sri Lankan curries, and modern Western dishes overlooking our gardens.'
    ],
    [
        'id' => 'room-service',
        'icon' => 'fas fa-bell',
        'title' => 'Room Service',
        'desc' => 'Dine in the complete privacy of your room or suite with our versatile, fresh room service menu.'
    ],
    [
        'id' => 'wifi',
        'icon' => 'fas fa-wifi',
        'title' => 'Free Wi-Fi',
        'desc' => 'Stay connected effortlessly with high-speed fiber internet coverage across the entire resort property.'
    ],
    [
        'id' => 'pool',
        'icon' => 'fas fa-swimmer',
        'title' => 'Swimming Pool',
        'desc' => 'Dive into our pristine, crystal-clear swimming pool, complete with comfortable sun loungers and a children\'s pool.'
    ],
    [
        'id' => 'spa',
        'icon' => 'fas fa-spa',
        'title' => 'Spa & Wellness Center',
        'desc' => 'Rejuvenate your body and soul with authentic Ayurvedic oil therapies and healing body treatments.'
    ],
    [
        'id' => 'gym',
        'icon' => 'fas fa-dumbbell',
        'title' => 'Gymnasium',
        'desc' => 'Stay active and energized in our modern fitness center equipped with cardiorespiratory and weights gear.'
    ],
    [
        'id' => 'airport-pickup',
        'icon' => 'fas fa-plane-arrival',
        'title' => 'Airport Pickup & Drop',
        'desc' => 'Enjoy hassle-free airport transfers in our air-conditioned luxury vans with professional drivers.'
    ],
    [
        'id' => 'conference-hall',
        'icon' => 'fas fa-users',
        'title' => 'Conference & Meeting Hall',
        'desc' => 'A fully equipped professional venue with projectors and sound systems, ideal for conferences or workshops.'
    ],
    [
        'id' => 'wedding-hall',
        'icon' => 'fas fa-glass-cheers',
        'title' => 'Wedding & Event Hall',
        'desc' => 'Celebrate your dream beachside wedding or special corporate events in our grand, elegant ballroom.'
    ],
    [
        'id' => 'laundry',
        'icon' => 'fas fa-tshirt',
        'title' => 'Laundry Service',
        'desc' => 'Same-day laundry and press services to keep you looking fresh throughout your tropical vacation.'
    ],
    [
        'id' => 'parking',
        'icon' => 'fas fa-parking',
        'title' => 'Free Parking',
        'desc' => 'Secure, well-monitored, and spacious parking slots within the resort gates for all guest vehicles.'
    ],
    [
        'id' => 'travel-desk',
        'icon' => 'fas fa-map-marked-alt',
        'title' => 'Travel Desk',
        'desc' => 'Plan local explorations, reserve train seats, or book special safari safaris with our experts.'
    ],
    [
        'id' => 'car-rental',
        'icon' => 'fas fa-car',
        'title' => 'Car Rental',
        'desc' => 'Rent air-conditioned luxury cars, scooters, or vans for self-driving or chauffeured tours.'
    ],
    [
        'id' => 'tour-packages',
        'icon' => 'fas fa-compass',
        'title' => 'Tour Packages',
        'desc' => 'Customized excursions to Minneriya Safari, Sigiriya Citadel, Trincomalee Harbor, and Batticaloa Lagoon.'
    ],
    [
        'id' => 'currency',
        'icon' => 'fas fa-coins',
        'title' => 'Currency Exchange',
        'desc' => 'Exchange major foreign currencies safely at competitive bank rates directly inside the hotel.'
    ],
    [
        'id' => 'doctor',
        'icon' => 'fas fa-user-md',
        'title' => 'Doctor on Call',
        'desc' => 'Rest easy knowing that prompt medical assistance and consultations are available 24/7 if needed.'
    ],
    [
        'id' => 'bbq',
        'icon' => 'fas fa-fire',
        'title' => 'BBQ Area',
        'desc' => 'Celebrate cool evenings with customized beachside BBQ set-ups featuring grilled fresh catches.'
    ],
    [
        'id' => 'playground',
        'icon' => 'fas fa-child',
        'title' => 'Children\'s Play Area',
        'desc' => 'A safe, fun, and green outdoor playground where your children can enjoy swings, slides, and games.'
    ],
    [
        'id' => 'shuttle',
        'icon' => 'fas fa-shuttle-van',
        'title' => 'Shuttle Service',
        'desc' => 'Complimentary regular golf-cart shuttle rides from the resort rooms to the warm, shallow waters of Pasikuda Beach.'
    ]
];

// Room Amenities List (for Accommodation page bullet layout)
$room_amenities = [
    ['icon' => 'fas fa-bed', 'name' => 'Comfortable Beds'],
    ['icon' => 'fas fa-wind', 'name' => 'Air Conditioning'],
    ['icon' => 'fas fa-wifi', 'name' => 'Free High-Speed Wi-Fi'],
    ['icon' => 'fas fa-tv', 'name' => 'Flat Screen TV'],
    ['icon' => 'fas fa-shower', 'name' => 'Private Bathroom with Hot Water'],
    ['icon' => 'fas fa-pump-soap', 'name' => 'Complimentary Toiletries'],
    ['icon' => 'fas fa-coffee', 'name' => 'Tea & Coffee Making Facilities'],
    ['icon' => 'fas fa-ice-cream', 'name' => 'Mini Refrigerator'],
    ['icon' => 'fas fa-broom', 'name' => 'Daily Housekeeping'],
    ['icon' => 'fas fa-bell', 'name' => 'Room Service'],
    ['icon' => 'fas fa-door-open', 'name' => 'Balcony (Selected Rooms)'],
    ['icon' => 'fas fa-tree', 'name' => 'Beautiful Garden or City View']
];

// Gallery Images Categories & Paths
$gallery_items = [
    [
        'category' => 'exterior',
        'title' => 'Resort Grand Entrance',
        'image' => 'https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'exterior',
        'title' => 'Lush Garden Pathway',
        'image' => 'https://images.unsplash.com/photo-1546548970-71785318a17b?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'reception',
        'title' => 'Elegant Reception Lobby',
        'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'rooms',
        'title' => 'Standard Double Room',
        'image' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'rooms',
        'title' => 'Deluxe Balcony Room',
        'image' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'rooms',
        'title' => 'Spacious Family Suite',
        'image' => 'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'suites',
        'title' => 'Executive Suite Lounge',
        'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'suites',
        'title' => 'Luxury Jacuzzi Suite',
        'image' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'restaurant',
        'title' => 'Beach View Restaurant',
        'image' => 'https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'restaurant',
        'title' => 'Cozy Indoor Bar',
        'image' => 'https://images.unsplash.com/photo-1514933651103-005eec06c04b?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'pool',
        'title' => 'Infinity Swimming Pool',
        'image' => 'https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'pool',
        'title' => 'Sun Loungers at Poolside',
        'image' => 'https://images.unsplash.com/photo-1560185007-c5ca9d2c014d?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'garden',
        'title' => 'Tropical Palms Lawn',
        'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'conference',
        'title' => 'Executive Meeting Setup',
        'image' => 'https://images.unsplash.com/photo-1517502884422-41eaaced0168?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'wedding',
        'title' => 'Elegant Banquet Wedding Setup',
        'image' => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'rooftop',
        'title' => 'Sunset Rooftop Terrace',
        'image' => 'https://images.unsplash.com/photo-1533105079780-92b9be482077?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'gym',
        'title' => 'Cardio Workout Section',
        'image' => 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'spa',
        'title' => 'Ayurvedic Treatment Room',
        'image' => 'https://images.unsplash.com/photo-1600334089648-b0d9d3028eb2?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'food',
        'title' => 'Fresh Seafood Platter',
        'image' => 'https://images.unsplash.com/photo-1534080564583-6be75777b70a?auto=format&fit=crop&w=1200&q=80'
    ],
    [
        'category' => 'attractions',
        'title' => 'Pasikuda Bay Calm Waters',
        'image' => 'https://images.unsplash.com/photo-1506929562872-bb421503ef21?auto=format&fit=crop&w=1200&q=80'
    ]
];
