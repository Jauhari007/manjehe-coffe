{{-- File: resources/views/home/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Coffee Manjehe - Premium Coffee Experience')

@section('content')
    <div id="preloader">
        <div class="coffee-loader">
            <div class="coffee-cup">
                <i class="fas fa-coffee"></i>
            </div>
            <div class="loading-text">Loading Coffee Manjehe...</div>
        </div>
    </div>

    <!-- Navigation -->
    <nav id="navbar">
        <div class="nav-container">
            <div class="logo">
                <i class="fas fa-coffee"></i>
                <span>Coffee Manjehe</span>
            </div>
            <ul class="nav-links">
                <li><a href="#home" data-text="Home"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="#about" data-text="About"><i class="fas fa-info-circle"></i>About</a></li>
                <li><a href="#products" data-text="Products"><i class="fas fa-shopping-bag"></i>Products</a></li>
                <li><a href="#contact" data-text="Contact"><i class="fas fa-envelope"></i>Contact</a></li>
            </ul>
            <div class="mobile-menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Cursor Effect -->
    <div class="cursor"></div>
    <div class="cursor-follower"></div>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-bg-animation">
            <div class="coffee-particle"></div>
            <div class="coffee-particle"></div>
            <div class="coffee-particle"></div>
            <div class="coffee-particle"></div>
            <div class="coffee-particle"></div>
        </div>
        
        <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
            <div class="hero-badge">
                <span><i class="fas fa-star"></i> Premium Quality Since 2016</span>
            </div>
            <h1>
                <span class="highlight">Coffee</span>
                <span class="main-text">Manjehe</span>
            </h1>
            <p class="hero-subtitle">
                Discover the Art of Perfect Coffee<br>
                <span class="typing-text"></span>
            </p>
            <div class="hero-buttons">
                <a href="#products" class="cta-primary">
                    <span>Explore Coffee</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
                <a href="#about" class="cta-secondary">
                    <span>Our Story</span>
                    <i class="fas fa-play"></i>
                </a>
            </div>
        </div>
        
        <div class="hero-scroll-indicator">
            <div class="scroll-line"></div>
            <span>Scroll</span>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="section-bg">
            <div class="bg-pattern"></div>
        </div>
        
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-badge">About Us</span>
                <h2>The Story Behind<br><span class="highlight">Coffee Manjehe</span></h2>
            </div>
            
            <div class="about-content">
                <div class="about-text" data-aos="fade-right">
                    <div class="text-block">
                        <h3>Our Philosophy</h3>
                        <p>Kopi Manjehe bukan sekadar minuman, ia adalah warisan rasa yang lahir dari kesederhanaan. Biji-biji pilihan disangrai dengan wajan besi dan kayu bakar, sebuah metode tradisional yang diwariskan turun-temurun. Api yang membara dari kayu bukan hanya memberikan panas, tapi juga menghadirkan aroma otentik yang tak bisa ditiru oleh mesin modern.</p>
                    </div>
                    
                    <div class="text-block">
                        <h3>Premium Quality</h3>
                        <p>Kami memilih biji kopi terbaik langsung dari perkebunan rakyat Kampunganyar-Banyuwangi, Setiap biji Kopi Manjehe diperlakukan dengan ketelitian dan kesabaran, menghadirkan kualitas premium yang tak hanya memanjakan lidah, tapi juga menghidupkan jiwa</p>
                    </div>
                    
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-number" data-count="1000">0</div>
                            <div class="stat-label">Happy Customers</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-count="50">0</div>
                            <div class="stat-label">Coffee Varieties</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-count="5">0</div>
                            <div class="stat-label">Years Experience</div>
                        </div>
                    </div>
                </div>
                
                <div class="about-visual" data-aos="fade-left">
                    <div class="visual-card">
                        <div class="coffee-illustration">
                            <i class="fas fa-coffee"></i>
                        </div>
                        <div class="floating-elements">
                            <div class="float-item"><i class="fas fa-seedling"></i></div>
                            <div class="float-item"><i class="fas fa-leaf"></i></div>
                            <div class="float-item"><i class="fas fa-fire"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-badge">Our Products</span>
                <h2>Premium Coffee<br><span class="highlight">Collection</span></h2>
                <p>Handcrafted perfection in every cup</p>
            </div>
            
            <div class="products-filter" data-aos="fade-up" data-aos-delay="200">
                <button class="filter-btn active" data-filter="all">All Coffee</button>
                <button class="filter-btn" data-filter="hot">Hot Coffee</button>
                <button class="filter-btn" data-filter="cold">Cold Coffee</button>
                <button class="filter-btn" data-filter="beans">Coffee Beans</button>
            </div>
            
            <div class="products-grid">
                <div class="product-card" data-category="hot" data-aos="fade-up" data-aos-delay="100">
                    <div class="product-image">
                        <div class="product-icon">
                            <i class="fas fa-mug-hot"></i>
                        </div>
                        <div class="product-overlay">
                            <div class="quick-view">Quick View</div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Hot Coffee</div>
                        <h3>Exselsa</h3>
                        <p>Bold dan aromatic exselsa dengan rasa yang intense. Perfect untuk memulai hari dengan energi maksimal.</p>
                        <div class="product-features">
                            <span><i class="fas fa-star"></i> Premium Quality</span>
                            <span><i class="fas fa-fire"></i> Strong Taste</span>
                        </div>
                        <div class="product-bottom">
                            <div class="price">
                                <span class="current-price">Rp 60.000</span>
                            </div>
                            <a href="https://wa.me/6285923253597?text=Halo%20Coffee%20Manjehe,%20saya%20ingin%20memesan%20Exselsa%20" class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                                <span>Order Now</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="product-card" data-category="hot" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-image">
                        <div class="product-icon">
                            <i class="fas fa-coffee"></i>
                        </div>
                        <div class="product-overlay">
                            <div class="quick-view">Quick View</div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Hot Coffee</div>
                        <h3>Luwak Arabica</h3>
                        <p>Rasa istimewa Kopi Luwak Arabica, perpaduan sempurna antara biji Arabica dan sentuhan alam.</p>
                        <div class="product-features">
                            <span><i class="fas fa-leaf"></i> Pure & Clean</span>
                            <span><i class="fas fa-heart"></i> Balanced</span>
                        </div>
                        <div class="product-bottom">
                            <div class="price">
                                <span class="current-price">Rp 250.000</span>
                            </div>
                            <a href="https://wa.me/6285923253597?text=Halo%20Coffee%20Manjehe,%20saya%20ingin%20memesan%20Luwak%20Arabica%20" class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                                <span>Order Now</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="product-card" data-category="cold" data-aos="fade-up" data-aos-delay="300">
                    <div class="product-image">
                        <div class="product-icon">
                            <i class="fas fa-glass-whiskey"></i>
                        </div>
                        <div class="product-overlay">
                            <div class="quick-view">Quick View</div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Hot Coffee</div>
                        <h3>Arabica</h3>
                        <p>Nikmati aroma dan rasa kopi Arabika yang khas, sebuah perjalanan rasa yang tak terlupakan.</p>
                        <div class="product-features">
                            <span><i class="fas fa-snowflake"></i> Cold Brew</span>
                            <span><i class="fas fa-sun"></i> Refreshing</span>
                        </div>
                        <div class="product-bottom">
                            <div class="price">
                                <span class="current-price">Rp 70.000</span>
                            </div>
                            <a href="https://wa.me/6285923253597?text=Halo%20Coffee%20Manjehe,%20saya%20ingin%20memesan%20Arabica%20" class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                                <span>Order Now</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="product-card" data-category="hot" data-aos="fade-up" data-aos-delay="400">
                    <div class="product-image">
                        <div class="product-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="product-overlay">
                            <div class="quick-view">Quick View</div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Hot Coffee</div>
                        <h3>Arabica Lanang</h3>
                        <p>Seduhan kopi Arabica Lanang memberikan sensasi yang berbeda, dengan rasa yang kuat dan mantap.</p>
                        <div class="product-features">
                            <span><i class="fas fa-palette"></i> Latte Art</span>
                            <span><i class="fas fa-cloud"></i> Creamy</span>
                        </div>
                        <div class="product-bottom">
                            <div class="price">
                                <span class="current-price">Rp 80.000</span>
                            </div>
                            <a href="https://wa.me/6285923253597?text=Halo%20Coffee%20Manjehe,%20saya%20ingin%20memesan%20Kopi%20Arabica%20Lanang%20" class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                                <span>Order Now</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="product-card" data-category="hot" data-aos="fade-up" data-aos-delay="500">
                    <div class="product-image">
                        <div class="product-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <div class="product-overlay">
                            <div class="quick-view">Quick View</div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Hot Coffee</div>
                        <h3>Robusta</h3>
                        <p>Kopi Robusta, teman setia di saat butuh kekuatan dan kualitas kopi yang tak tergantikan.</p>
                        <div class="product-features">
                            <span><i class="fas fa-signature"></i> Signature</span>
                            <span><i class="fas fa-camera"></i> Instagrammable</span>
                        </div>
                        <div class="product-bottom">
                            <div class="price">
                                <span class="current-price">Rp 50.000</span>
                            </div>
                            <a href="https://wa.me/6285923253597?text=Halo%20Coffee%20Manjehe,%20saya%20ingin%20memesan%20Kopi%20Robusta%20" class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                                <span>Order Now</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- NEW PRODUCTS START -->
                <div class="product-card" data-category="hot" data-aos="fade-up" data-aos-delay="600">
                    <div class="product-image">
                        <div class="product-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="product-overlay">
                            <div class="quick-view">Quick View</div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Hot Coffee</div>
                        <h3>House Blend</h3>
                        <p>Campuran istimewa racikan khusus Coffee Manjehe, perpaduan harmonis yang menciptakan rasa unik dan berkarakter.</p>
                        <div class="product-features">
                            <span><i class="fas fa-star"></i> House Special</span>
                            <span><i class="fas fa-magic"></i> Unique Blend</span>
                        </div>
                        <div class="product-bottom">
                            <div class="price">
                                <span class="current-price">Rp 60.000</span>
                            </div>
                            <a href="https://wa.me/6285923253597?text=Halo%20Coffee%20Manjehe,%20saya%20ingin%20memesan%20House%20Blend%20" class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                                <span>Order Now</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="product-card" data-category="hot" data-aos="fade-up" data-aos-delay="700">
                    <div class="product-image">
                        <div class="product-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <div class="product-overlay">
                            <div class="quick-view">Quick View</div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Hot Coffee</div>
                        <h3>Robusta Lanang</h3>
                        <p>Kopi Robusta Lanang premium dengan karakter kuat dan body yang penuh. Sensasi rasa yang tak terlupakan untuk pecinta kopi sejati.</p>
                        <div class="product-features">
                            <span><i class="fas fa-fire"></i> Strong Body</span>
                            <span><i class="fas fa-award"></i> Premium</span>
                        </div>
                        <div class="product-bottom">
                            <div class="price">
                                <span class="current-price">Rp 60.000</span>
                            </div>
                            <a href="https://wa.me/6285923253597?text=Halo%20Coffee%20Manjehe,%20saya%20ingin%20memesan%20Robusta%20Lanang%20" class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                                <span>Order Now</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="product-card featured" data-category="beans" data-aos="fade-up" data-aos-delay="800">
                    <div class="featured-badge">
                        <i class="fas fa-crown"></i> Best Seller
                    </div>
                    <div class="product-image">
                        <div class="product-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <div class="product-overlay">
                            <div class="quick-view">Quick View</div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Coffee Beans</div>
                        <h3>Biji Robusta Lanang</h3>
                        <p>Biji kopi Robusta Lanang premium untuk home brewing. Freshly roasted dengan berbagai pilihan grind size. Perfect untuk espresso dan manual brew.</p>
                        <div class="product-features">
                            <span><i class="fas fa-home"></i> Home Brewing</span>
                            <span><i class="fas fa-fire"></i> Fresh Roasted</span>
                        </div>
                        <div class="product-bottom">
                            <div class="price">
                                <span class="current-price">Rp 95.000</span>
                                <span class="price-unit">/250g</span>
                            </div>
                            <a href="https://wa.me/6285923253597?text=Halo%20Coffee%20Manjehe,%20saya%20ingin%20memesan%20Biji%20Robusta%20Lanang%20" class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                                <span>Order Now</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- NEW PRODUCTS END -->

                <div class="product-card featured" data-category="beans" data-aos="fade-up" data-aos-delay="900">
                    <div class="featured-badge">
                        <i class="fas fa-crown"></i> Best Seller
                    </div>
                    <div class="product-image">
                        <div class="product-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <div class="product-overlay">
                            <div class="quick-view">Quick View</div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Coffee Beans</div>
                        <h3>Biji Kopi Premium</h3>
                        <p>Biji kopi premium Coffee Manjehe untuk home brewing. Freshly roasted dengan berbagai pilihan grind size.</p>
                        <div class="product-features">
                            <span><i class="fas fa-home"></i> Home Brewing</span>
                            <span><i class="fas fa-fire"></i> Fresh Roasted</span>
                        </div>
                        <div class="product-bottom">
                            <div class="price">
                                <span class="current-price">Rp 85.000</span>
                                <span class="price-unit">/250g</span>
                            </div>
                            <a href="https://wa.me/6285923253597?text=Halo%20Coffee%20Manjehe,%20saya%20ingin%20memesan%20Biji%20Kopi%20Premium%20" class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                                <span>Order Now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- Video Review Section -->
<section id="video-review" class="video-review">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Our Coffee Journey</span>
            <h2>Di Balik<br><span class="highlight">Setiap Cangkir</span></h2>
            <p>Saksikan perjalanan kopi Manjehe dari biji hingga tersaji, dan rasakan ceritanya di setiap cangkir</p>
        </div> 
        
        <div class="video-container">
            <div class="video-wrapper">
                <div class="video-player" data-video-id="3Ah5Jon9MiQ">
                    <picture>
                        <img class="video-thumb" src="https://i.ytimg.com/vi/3Ah5Jon9MiQ/hqdefault.jpg" alt="Coffee Manjehe Review" loading="lazy">
                    </picture>
                    <button class="video-play-btn" aria-label="Play video">
                        <span class="play-icon">▶</span>
                    </button>
                    <noscript>
                        <a href="https://www.youtube.com/watch?v=3Ah5Jon9MiQ" target="_blank" rel="noopener" style="color:#fff;">Watch on YouTube</a>
                    </noscript>
                </div>
            </div>
            
            <div class="video-info">
                <div class="video-stats">
                    <div class="stat-item">
                        <i class="fas fa-eye"></i>
                        <span>10.5K Views</span>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-thumbs-up"></i>
                        <span>98% Positive</span>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-share"></i>
                        <span>500+ Shares</span>
                    </div>
                </div>
                
                <div class="video-description">
                    <p>Saksikan review mendalam tentang Coffee Manjehe dari para pelanggan setia kami. Dari proses roasting hingga penyajian yang sempurna.</p>
                </div>
                
                <div class="video-actions">
                    <a href="https://youtube.com/@manjehecoffee3842?si=Utp91JsENS2d3aJ7" target="_blank" class="subscribe-btn">
                        <i class="fab fa-youtube"></i>
                        <span>Subscribe Channel</span>
                    </a>
                    <button class="share-btn" onclick="shareVideo()">
                        <i class="fas fa-share-alt"></i>
                        <span>Share Video</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-badge">Contact Us</span>
                <h2>Let's Connect &<br><span class="highlight">Make Great Coffee</span></h2>
            </div>
            
            <div class="contact-content">
                <div class="contact-info" data-aos="fade-right">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Phone</h3>
                            <p>+62 8233 4334 737</p>
                            <span>Available 24/7</span>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Email</h3>
                            <p>info@coffeemanjehe.com</p>
                            <span>Quick response guaranteed</span>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Location</h3>
                            <p>Kampunganyar-Banyuwangi, Indonesia</p>
                            <span>Traditional place</span>
                        </div>
                    </div>
                    
                    <div class="social-links">
                        <h3>Follow Us</h3>
                        <div class="social-icons">
                            <a href="https://www.instagram.com/manjehe.coffee?utm_source=ig_web_button_share_sheet&igsh=MW11dDUybjJtYndwZQ==" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.tiktok.com/@manjehecoffee?is_from_webapp=1&sender_device=pc" class="social-icon"><i class="fab fa-tiktok"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form" data-aos="fade-left">
                    <div class="form-header">
                        <h3>Send us a message</h3>
                        <p>We'd love to hear from you</p>
                    </div>
                    
                    <form class="message-form">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" id="name" required>
                                <label for="name">Your Name</label>
                            </div>
                            <div class="form-group">
                                <input type="email" id="email" required>
                                <label for="email">Email Address</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <input type="tel" id="phone" required>
                            <label for="phone">Phone Number</label>
                        </div>
                        
                        <div class="form-group">
                            <textarea id="message" rows="5" required></textarea>
                            <label for="message">Your Message</label>
                        </div>
                        
                        <button type="submit" class="form-submit">
                            <span>Send Message</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Back to Top -->
    <button class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </button>
@endsection

@push('scripts')
<script>
    // ===== GLOBAL VARIABLES =====
let isLoading = true;
let currentFilter = 'all';
const typingTexts = [
    'Where Every Sip Tells a Story',
    'Crafted with Passion & Love',
    'Premium Quality in Every Cup',
    'Your Perfect Coffee Moment'
];
let typingIndex = 0;
let charIndex = 0;
let isDeleting = false;

// ===== DOM CONTENT LOADED =====
document.addEventListener('DOMContentLoaded', function() {
    initializeWebsite();
});

// ===== WEBSITE INITIALIZATION =====
function initializeWebsite() {
    // Initialize AOS (Animate On Scroll)
    AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
        once: true,
        mirror: false,
        anchorPlacement: 'top-bottom'
    });

    // Initialize all components
    initPreloader();
    initNavigation();
    initCursor();
    initTypingEffect();
    initScrollEffects();
    initProductFilter();
    initContactForm();
    initCounters();
    initBackToTop();
    initSmoothScroll();
    initMobileMenu();
    initVideoPlayer();
    
    // Add loading complete listener
    window.addEventListener('load', handlePageLoad);
}

// ===== PRELOADER =====
function initPreloader() {
    const preloader = document.getElementById('preloader');
    
    setTimeout(() => {
        preloader.classList.add('hidden');
        isLoading = false;
        document.body.style.overflow = 'auto';
    }, 2000);
}

function handlePageLoad() {
    // Additional load handling if needed
    console.log('Coffee Manjehe website fully loaded! ☕');
}

// ===== NAVIGATION =====
function initNavigation() {
    const navbar = document.getElementById('navbar');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Active navigation link
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-links a[href^="#"]');
    
    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.getBoundingClientRect().top;
            const sectionHeight = section.offsetHeight;
            if (sectionTop <= 100 && sectionTop + sectionHeight > 100) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').substring(1) === current) {
                link.classList.add('active');
            }
        });
    });
}

// ===== MOBILE MENU =====
function initMobileMenu() {
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');
    
    if (mobileMenuBtn && navLinks) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenuBtn.classList.toggle('active');
            navLinks.classList.toggle('active');
        });
        
        // Close mobile menu when clicking on a link
        navLinks.addEventListener('click', (e) => {
            if (e.target.tagName === 'A') {
                mobileMenuBtn.classList.remove('active');
                navLinks.classList.remove('active');
            }
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenuBtn.contains(e.target) && !navLinks.contains(e.target)) {
                mobileMenuBtn.classList.remove('active');
                navLinks.classList.remove('active');
            }
        });
    }
}

// ===== CUSTOM CURSOR =====
function initCursor() {
    const cursor = document.querySelector('.cursor');
    const cursorFollower = document.querySelector('.cursor-follower');
    
    if (!cursor || !cursorFollower) return;
    
    let mouseX = 0;
    let mouseY = 0;
    let followerX = 0;
    let followerY = 0;
    
    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        
        cursor.style.left = mouseX + 'px';
        cursor.style.top = mouseY + 'px';
    });
    
    // Smooth follower animation
    function updateFollower() {
        followerX += (mouseX - followerX) * 0.1;
        followerY += (mouseY - followerY) * 0.1;
        
        cursorFollower.style.left = followerX + 'px';
        cursorFollower.style.top = followerY + 'px';
        
        requestAnimationFrame(updateFollower);
    }
    updateFollower();
    
    // Cursor effects on interactive elements
    const interactiveElements = document.querySelectorAll('a, button, .product-card, .contact-item');
    
    interactiveElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            cursor.style.transform = 'scale(1.5)';
            cursorFollower.style.transform = 'scale(1.2)';
        });
        
        el.addEventListener('mouseleave', () => {
            cursor.style.transform = 'scale(1)';
            cursorFollower.style.transform = 'scale(1)';
        });
    });
}

// ===== TYPING EFFECT =====
function initTypingEffect() {
    const typingElement = document.querySelector('.typing-text');
    if (!typingElement) return;
    
    function typeText() {
        const currentText = typingTexts[typingIndex];
        
        if (!isDeleting) {
            typingElement.textContent = currentText.substring(0, charIndex + 1);
            charIndex++;
            
            if (charIndex === currentText.length) {
                setTimeout(() => {
                    isDeleting = true;
                }, 2000);
            }
        } else {
            typingElement.textContent = currentText.substring(0, charIndex - 1);
            charIndex--;
            
            if (charIndex === 0) {
                isDeleting = false;
                typingIndex = (typingIndex + 1) % typingTexts.length;
            }
        }
        
        const typeSpeed = isDeleting ? 50 : 100;
        setTimeout(typeText, typeSpeed);
    }
    
    typeText();
}

// ===== SCROLL EFFECTS =====
function initScrollEffects() {
    // Parallax effect for hero section
    const hero = document.querySelector('.hero');
    const heroContent = document.querySelector('.hero-content');
    
    if (hero && heroContent) {
        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY;
            const rate = scrollY * -0.5;
            heroContent.style.transform = `translateY(${rate}px)`;
        });
    }
    
    // Fade in animation observer
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                
                // Special animation for stats
                if (entry.target.classList.contains('stats-grid')) {
                    animateCounters();
                }
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.fade-in, [data-aos]').forEach(el => {
        observer.observe(el);
    });
}

// ===== COUNTER ANIMATION =====
function initCounters() {
    // Counter animation will be triggered by scroll observer
}

function animateCounters() {
    const counters = document.querySelectorAll('.stat-number[data-count]');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current < target) {
                counter.textContent = Math.floor(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target;
            }
        };
        
        updateCounter();
    });
}

// ===== PRODUCT FILTER =====
function initProductFilter() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');
    
    if (!filterBtns.length || !productCards.length) return;
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.getAttribute('data-filter');
            
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            // Filter products
            filterProducts(filter);
        });
    });
}

function filterProducts(filter) {
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        const category = card.getAttribute('data-category');
        
        if (filter === 'all' || category === filter) {
            card.style.display = 'block';
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
        } else {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.display = 'none';
            }, 300);
        }
    });
}

// ===== CONTACT FORM =====
function initContactForm() {
    const form = document.querySelector('.message-form');
    const inputs = form?.querySelectorAll('input, textarea');
    
    if (!form || !inputs.length) return;
    
    // Form validation and animation
    inputs.forEach(input => {
        // Input focus effects
        input.addEventListener('focus', () => {
            input.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', () => {
            if (!input.value.trim()) {
                input.parentElement.classList.remove('focused');
            }
        });
        
        // Real-time validation
        input.addEventListener('input', validateInput);
    });
    
    // Form submission
    form.addEventListener('submit', handleFormSubmit);
}

function validateInput(e) {
    const input = e.target;
    const value = input.value.trim();
    let isValid = true;
    
    // Remove existing error classes
    input.classList.remove('error', 'success');
    
    // Validation rules
    switch (input.type) {
        case 'email':
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            isValid = emailRegex.test(value);
            break;
        case 'tel':
            const phoneRegex = /^[\+]?[0-9]{10,15}$/;
            isValid = phoneRegex.test(value.replace(/\s+/g, ''));
            break;
        default:
            isValid = value.length >= 2;
    }
    
    // Apply validation classes
    if (value && isValid) {
        input.classList.add('success');
    } else if (value && !isValid) {
        input.classList.add('error');
    }
    
    return isValid;
}

function handleFormSubmit(e) {
    e.preventDefault();
    
    const form = e.target;
    const formData = new FormData(form);
    const inputs = form.querySelectorAll('input, textarea');
    let isFormValid = true;
    
    // Validate all inputs
    inputs.forEach(input => {
        if (!validateInput({ target: input })) {
            isFormValid = false;
        }
    });
    
    if (!isFormValid) {
        showNotification('Please fill in all fields correctly.', 'error');
        return;
    }
    
    // Simulate form submission
    const submitBtn = form.querySelector('.form-submit');
    const originalText = submitBtn.innerHTML;
    
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
    submitBtn.disabled = true;
    
    setTimeout(() => {
        showNotification('Message sent successfully! We\'ll get back to you soon.', 'success');
        form.reset();
        inputs.forEach(input => {
            input.classList.remove('success', 'error');
            input.parentElement.classList.remove('focused');
        });
        
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }, 2000);
}

// ===== NOTIFICATION SYSTEM =====
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
        <span>${message}</span>
        <button class="notification-close"><i class="fas fa-times"></i></button>
    `;
    
    // Add notification styles
    Object.assign(notification.style, {
        position: 'fixed',
        top: '20px',
        right: '20px',
        background: type === 'success' ? 'var(--success-green)' : type === 'error' ? '#ff4757' : 'var(--primary-color)',
        color: 'white',
        padding: '1rem 1.5rem',
        borderRadius: '10px',
        display: 'flex',
        alignItems: 'center',
        gap: '0.5rem',
        boxShadow: '0 4px 20px rgba(0, 0, 0, 0.3)',
        zIndex: '10000',
        transform: 'translateX(400px)',
        transition: 'transform 0.3s ease'
    });
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Auto remove
    setTimeout(() => {
        removeNotification(notification);
    }, 5000);
    
    // Manual close
    notification.querySelector('.notification-close').addEventListener('click', () => {
        removeNotification(notification);
    });
}

function removeNotification(notification) {
    notification.style.transform = 'translateX(400px)';
    setTimeout(() => {
        if (notification.parentNode) {
            notification.parentNode.removeChild(notification);
        }
    }, 300);
}

// ===== BACK TO TOP =====
function initBackToTop() {
    const backToTopBtn = document.getElementById('backToTop');
    
    if (!backToTopBtn) return;
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTopBtn.classList.add('visible');
        } else {
            backToTopBtn.classList.remove('visible');
        }
    });
    
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// ===== SMOOTH SCROLL =====
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            
            if (target) {
                const navHeight = document.getElementById('navbar').offsetHeight;
                const targetPosition = target.getBoundingClientRect().top + window.scrollY - navHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// ===== PRODUCT INTERACTIONS =====
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced product card interactions
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        // Mouse enter effect
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
            
            // Add glow effect
            this.style.boxShadow = '0 20px 50px rgba(212, 165, 116, 0.3)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '';
        });
        
        // Click ripple effect
        card.addEventListener('click', function(e) {
            if (e.target.closest('.whatsapp-btn')) return;
            
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            ripple.style.position = 'absolute';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.style.width = '0';
            ripple.style.height = '0';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(212, 165, 116, 0.3)';
            ripple.style.transform = 'translate(-50%, -50%)';
            ripple.style.animation = 'ripple 0.6s linear';
            ripple.style.pointerEvents = 'none';
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Add ripple keyframes dynamically
    if (!document.querySelector('#ripple-styles')) {
        const style = document.createElement('style');
        style.id = 'ripple-styles';
        style.textContent = `
            @keyframes ripple {
                0% {
                    width: 0;
                    height: 0;
                    opacity: 1;
                }
                100% {
                    width: 400px;
                    height: 400px;
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }
});

// ===== WHATSAPP INTEGRATION =====
function initWhatsAppTracking() {
    const whatsappBtns = document.querySelectorAll('.whatsapp-btn');
    
    whatsappBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Add click animation
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
            
            // Track click (you can add analytics here)
            const productName = this.closest('.product-card')?.querySelector('h3')?.textContent || 'Unknown Product';
            console.log(`WhatsApp order initiated for: ${productName}`);
            
            // Optional: Show confirmation
            showNotification(`Redirecting to WhatsApp for ${productName}...`, 'info');
        });
    });
}

// Initialize WhatsApp tracking when DOM is ready
document.addEventListener('DOMContentLoaded', initWhatsAppTracking);

// ===== LAZY LOADING IMAGES =====
function initLazyLoading() {
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}

// ===== THEME SWITCHING (Optional) =====
function initThemeSwitch() {
    // This can be extended for light/dark mode toggle
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)');
    
    function handleThemeChange(e) {
        if (e.matches) {
            document.body.classList.add('dark-theme');
        } else {
            document.body.classList.remove('dark-theme');
        }
    }
    
    prefersDark.addEventListener('change', handleThemeChange);
    handleThemeChange(prefersDark);
}

// ===== PERFORMANCE OPTIMIZATIONS =====
function initPerformanceOptimizations() {
    // Throttle scroll events
    let scrollTimeout;
    const originalScrollHandlers = [];
    
    function throttledScroll() {
        if (scrollTimeout) return;
        
        scrollTimeout = setTimeout(() => {
            // Execute scroll handlers
            originalScrollHandlers.forEach(handler => handler());
            scrollTimeout = null;
        }, 16); // ~60fps
    }
    
    // Replace scroll event listeners with throttled version
    window.addEventListener('scroll', throttledScroll, { passive: true });
}

// ===== ACCESSIBILITY ENHANCEMENTS =====
function initAccessibility() {
    // Keyboard navigation for interactive elements
    const interactiveElements = document.querySelectorAll('button, a, input, textarea');
    
    interactiveElements.forEach(element => {
        element.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                if (this.tagName === 'BUTTON' || this.getAttribute('role') === 'button') {
                    e.preventDefault();
                    this.click();
                }
            }
        });
    });
    
    // Focus management
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            document.body.classList.add('using-keyboard');
        }
    });
    
    document.addEventListener('mousedown', function() {
        document.body.classList.remove('using-keyboard');
    });
    
    // Add ARIA labels where missing
    const buttons = document.querySelectorAll('button:not([aria-label])');
    buttons.forEach(button => {
        const text = button.textContent.trim();
        if (text) {
            button.setAttribute('aria-label', text);
        }
    });
}

// ===== SOCIAL MEDIA SHARING =====
function initSocialSharing() {
    const socialLinks = document.querySelectorAll('.social-icon, .social-link');
    
    socialLinks.forEach(link => {
        const platform = link.querySelector('i').className.split('fa-')[1];
        
        if (platform && !link.href) {
            let url = '';
            const currentURL = encodeURIComponent(window.location.href);
            const title = encodeURIComponent('Coffee Manjehe - Premium Coffee Experience');
            
            switch (platform) {
                case 'facebook':
                    url = `https://www.facebook.com/sharer/sharer.php?u=${currentURL}`;
                    break;
                case 'twitter':
                    url = `https://twitter.com/intent/tweet?url=${currentURL}&text=${title}`;
                    break;
                case 'instagram':
                    url = 'https://www.instagram.com/coffeemanjehe';
                    break;
                case 'whatsapp':
                    url = `https://wa.me/?text=${title}%20${currentURL}`;
                    break;
                case 'tiktok':
                    url = 'https://www.tiktok.com/@coffeemanjehe';
                    break;
            }
            
            if (url) {
                link.href = url;
                link.target = '_blank';
                link.rel = 'noopener noreferrer';
            }
        }
    });
}

// ===== COFFEE BREWING TIMER (Easter Egg) =====
function initBrewingTimer() {
    let clickCount = 0;
    const logo = document.querySelector('.logo');
    
    logo?.addEventListener('click', function() {
        clickCount++;
        
        if (clickCount === 5) {
            showBrewingTimer();
            clickCount = 0;
        }
        
        setTimeout(() => {
            if (clickCount > 0) clickCount--;
        }, 2000);
    });
}

function showBrewingTimer() {
    const timerModal = document.createElement('div');
    timerModal.className = 'brewing-timer-modal';
    timerModal.innerHTML = `
        <div class="timer-content">
            <h3><i class="fas fa-coffee"></i> Coffee Brewing Timer</h3>
            <div class="timer-display">
                <span id="timer-minutes">04</span>:<span id="timer-seconds">00</span>
            </div>
            <div class="timer-controls">
                <button id="start-timer" class="timer-btn">
                    <i class="fas fa-play"></i> Start
                </button>
                <button id="pause-timer" class="timer-btn">
                    <i class="fas fa-pause"></i> Pause
                </button>
                <button id="reset-timer" class="timer-btn">
                    <i class="fas fa-redo"></i> Reset
                </button>
            </div>
            <p>Perfect brewing time for premium coffee!</p>
            <button class="close-timer"><i class="fas fa-times"></i></button>
        </div>
    `;
    
    // Add modal styles
    Object.assign(timerModal.style, {
        position: 'fixed',
        top: '0',
        left: '0',
        width: '100%',
        height: '100%',
        background: 'rgba(0, 0, 0, 0.8)',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center',
        zIndex: '10000',
        backdropFilter: 'blur(10px)'
    });
    
    document.body.appendChild(timerModal);
    
    // Timer functionality
    let timeLeft = 240; // 4 minutes
    let timerInterval;
    let isRunning = false;
    
    const minutesEl = document.getElementById('timer-minutes');
    const secondsEl = document.getElementById('timer-seconds');
    const startBtn = document.getElementById('start-timer');
    const pauseBtn = document.getElementById('pause-timer');
    const resetBtn = document.getElementById('reset-timer');
    
    function updateDisplay() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        minutesEl.textContent = minutes.toString().padStart(2, '0');
        secondsEl.textContent = seconds.toString().padStart(2, '0');
    }
    
    function startTimer() {
        if (isRunning) return;
        isRunning = true;
        
        timerInterval = setInterval(() => {
            if (timeLeft > 0) {
                timeLeft--;
                updateDisplay();
            } else {
                clearInterval(timerInterval);
                isRunning = false;
                showNotification('☕ Your coffee is ready!', 'success');
                playBrewingSound();
            }
        }, 1000);
    }
    
    function pauseTimer() {
        clearInterval(timerInterval);
        isRunning = false;
    }
    
    function resetTimer() {
        clearInterval(timerInterval);
        isRunning = false;
        timeLeft = 240;
        updateDisplay();
    }
    
    function playBrewingSound() {
        // Create a simple beep sound using Web Audio API
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const oscillator = audioContext.createOscillator();
        const gainNode = audioContext.createGain();
        
        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);
        
        oscillator.frequency.value = 800;
        gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
        gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.5);
        
        oscillator.start();
        oscillator.stop(audioContext.currentTime + 0.5);
    }
    
    // Event listeners
    startBtn.addEventListener('click', startTimer);
    pauseBtn.addEventListener('click', pauseTimer);
    resetBtn.addEventListener('click', resetTimer);
    
    // Close modal
    function closeModal() {
        clearInterval(timerInterval);
        timerModal.remove();
    }
    
    document.querySelector('.close-timer').addEventListener('click', closeModal);
    timerModal.addEventListener('click', (e) => {
        if (e.target === timerModal) closeModal();
    });
    
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeModal();
    });
}

// ===== LOCAL STORAGE UTILITIES =====
function initLocalStorage() {
    // Save user preferences (note: not using localStorage as per restrictions)
    const preferences = {
        visitCount: 1,
        lastVisit: new Date().toISOString(),
        favoriteProducts: []
    };
    
    // Welcome message for new visitors
    if (preferences.visitCount === 1) {
        setTimeout(() => {
            showNotification('Welcome to Coffee Manjehe! ☕', 'info');
        }, 3000);
    }
}

// ===== ERROR HANDLING =====
function initErrorHandling() {
    window.addEventListener('error', function(e) {
        console.error('Coffee Manjehe Error:', e.error);
        
        // Show user-friendly error message
        showNotification('Something went wrong. Please refresh the page.', 'error');
    });
    
    // Handle unhandled promise rejections
    window.addEventListener('unhandledrejection', function(e) {
        console.error('Unhandled Promise Rejection:', e.reason);
        e.preventDefault();
    });
}

// ===== INITIALIZATION COMPLETE =====
document.addEventListener('DOMContentLoaded', function() {
    // Initialize additional features
    initLazyLoading();
    initThemeSwitch();
    initPerformanceOptimizations();
    initAccessibility();
    initSocialSharing();
    initBrewingTimer();
    initLocalStorage();
    initErrorHandling();
    
    // Show success message when everything is loaded
    window.addEventListener('load', function() {
        setTimeout(() => {
            console.log('🎉 Coffee Manjehe website is fully loaded and ready!');
        }, 100);
    });
});

// ===== EXPORT FUNCTIONS FOR TESTING =====
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        initializeWebsite,
        filterProducts,
        showNotification,
        validateInput,
        animateCounters
    };
    // ===== VIDEO REVIEW FUNCTIONALITY =====
function initVideoReview() {
    const videoWrapper = document.querySelector('.video-wrapper');
    const videoThumbnail = document.querySelector('.video-thumbnail');
    const iframe = document.querySelector('.video-wrapper iframe');
    
    if (!videoWrapper || !videoThumbnail || !iframe) {
        console.warn('Video elements not found');
        return;
    }
    
    console.log('Video review initialized');
    
    // Video play functionality
    videoThumbnail.addEventListener('click', function() {
        playVideo();
    });
    
    function playVideo() {
        videoWrapper.classList.add('playing');
        
        // Get video ID from data attribute
        const videoId = videoThumbnail.getAttribute('data-video-id') || '3Ah5Jon9MiQ';
        
        // Create new iframe src with autoplay
        const newSrc = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1&mute=0`;
        
        iframe.src = newSrc;
        
        // Track video play event
        trackVideoEvent('video_played', 'Coffee Manjehe Review');
        
        // Show loading notification
        showNotification('Video sedang dimuat...', 'info');
        
        // Hide notification after video loads
        setTimeout(() => {
            hideNotification();
        }, 3000);
    }
    
    // Video share functionality
    window.shareVideo = function() {
        const videoUrl = 'https://youtu.be/3Ah5Jon9MiQ'; // Direct YouTube URL
        const shareText = 'Lihat review Coffee Manjehe yang luar biasa ini! ☕';
        
        if (navigator.share) {
            // Use native share API if available (mobile browsers)
            navigator.share({
                title: 'Coffee Manjehe Review',
                text: shareText,
                url: videoUrl
            }).then(() => {
                showNotification('Video berhasil dibagikan!', 'success');
                trackVideoEvent('video_shared', 'native_share');
            }).catch((error) => {
                console.log('Native share cancelled or failed:', error);
                fallbackShare(videoUrl, shareText);
            });
        } else {
            fallbackShare(videoUrl, shareText);
        }
    };
    
    // Fallback share modal for desktop browsers
    function fallbackShare(url, text) {
        const shareModal = createShareModal(url, text);
        document.body.appendChild(shareModal);
        trackVideoEvent('share_modal_opened');
        
        // Show modal with animation
        setTimeout(() => {
            shareModal.style.opacity = '1';
        }, 10);
    }
    
    // Create share modal
    function createShareModal(url, text) {
        // Remove existing modal if any
        const existingModal = document.querySelector('.share-modal');
        if (existingModal) existingModal.remove();
        
        const modal = document.createElement('div');
        modal.className = 'share-modal';
        modal.innerHTML = `
            <div class="share-modal-overlay"></div>
            <div class="share-modal-content">
                <div class="share-header">
                    <h3><i class="fas fa-share-alt"></i> Bagikan Video</h3>
                    <button class="close-share-modal" aria-label="Tutup">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="share-options">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="share-option facebook"
                       onclick="trackVideoEvent('video_shared', 'facebook')">
                        <i class="fab fa-facebook"></i>
                        <span>Facebook</span>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="share-option twitter"
                       onclick="trackVideoEvent('video_shared', 'twitter')">
                        <i class="fab fa-twitter"></i>
                        <span>Twitter</span>
                    </a>
                    <a href="https://wa.me/?text=${encodeURIComponent(text + ' ' + url)}" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="share-option whatsapp"
                       onclick="trackVideoEvent('video_shared', 'whatsapp')">
                        <i class="fab fa-whatsapp"></i>
                        <span>WhatsApp</span>
                    </a>
                    <a href="https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="share-option telegram"
                       onclick="trackVideoEvent('video_shared', 'telegram')">
                        <i class="fab fa-telegram"></i>
                        <span>Telegram</span>
                    </a>
                    <button onclick="copyToClipboard('${url}')" class="share-option copy">
                        <i class="fas fa-copy"></i>
                        <span>Copy Link</span>
                    </button>
                </div>
            </div>
        `;
        
        // Add modal styles
        Object.assign(modal.style, {
            position: 'fixed',
            top: '0',
            left: '0',
            width: '100%',
            height: '100%',
            zIndex: '99999',
            opacity: '0',
            transition: 'opacity 0.3s ease'
        });
        
        // Close modal functionality
        const closeBtn = modal.querySelector('.close-share-modal');
        const overlay = modal.querySelector('.share-modal-overlay');
        
        function closeModal() {
            modal.style.opacity = '0';
            setTimeout(() => modal.remove(), 300);
        }
        
        closeBtn.addEventListener('click', closeModal);
        overlay.addEventListener('click', closeModal);
        
        // Escape key to close
        const handleEscape = (e) => {
            if (e.key === 'Escape') {
                closeModal();
                document.removeEventListener('keydown', handleEscape);
            }
        };
        document.addEventListener('keydown', handleEscape);
        
        return modal;
    }
    
    // Copy to clipboard functionality
    window.copyToClipboard = function(text) {
        if (navigator.clipboard && window.isSecureContext) {
            // Modern clipboard API
            navigator.clipboard.writeText(text).then(() => {
                showNotification('Link berhasil disalin!', 'success');
                document.querySelector('.share-modal')?.remove();
                trackVideoEvent('video_shared', 'copy_link');
            }).catch(() => {
                fallbackCopy(text);
            });
        } else {
            fallbackCopy(text);
        }
        
        function fallbackCopy(text) {
            // Fallback for older browsers or non-HTTPS
            const textArea = document.createElement('textarea');
            textArea.value = text;
            textArea.style.position = 'fixed';
            textArea.style.left = '-999999px';
            textArea.style.top = '-999999px';
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            
            try {
                const success = document.execCommand('copy');
                if (success) {
                    showNotification('Link berhasil disalin!', 'success');
                    trackVideoEvent('video_shared', 'copy_link');
                } else {
                    showNotification('Gagal menyalin link', 'error');
                }
            } catch (err) {
                showNotification('Browser tidak mendukung copy otomatis', 'error');
            }
            
            document.body.removeChild(textArea);
            document.querySelector('.share-modal')?.remove();
        }
    };
    
    // Video intersection observer for analytics
    const videoObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                trackVideoEvent('video_section_viewed');
            }
        });
    }, { 
        threshold: 0.5,
        rootMargin: '0px 0px -50px 0px'
    });
    
    videoObserver.observe(videoWrapper);
}

// ===== GLOBAL PLAY VIDEO FUNCTION =====
// Make playVideo function accessible from HTML onclick
window.playVideo = function(element) {
    const videoWrapper = element.closest('.video-wrapper');
    const iframe = videoWrapper.querySelector('iframe');
    const videoId = element.getAttribute('data-video-id') || '3Ah5Jon9MiQ';
    
    // Add playing class
    videoWrapper.classList.add('playing');
    
    // Update iframe src with autoplay
    const newSrc = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1&mute=0`;
    iframe.src = newSrc;
    
    // Track video play event
    trackVideoEvent('video_played', 'Coffee Manjehe Review');
    
    // Show loading notification
    showNotification('Video sedang dimuat...', 'info');
    
    // Hide notification after video loads
    setTimeout(() => {
        hideNotification();
    }, 3000);
};

// ===== VIDEO ANALYTICS =====
function trackVideoEvent(action, label = '') {
    console.log(`Video Event: ${action}`, label);
    
    // Google Analytics 4 (gtag) integration
    if (typeof gtag !== 'undefined') {
        gtag('event', action, {
            event_category: 'Video',
            event_label: label,
            value: 1
        });
    }
    
    // Google Analytics Universal (ga) integration
    if (typeof ga !== 'undefined') {
        ga('send', 'event', 'Video', action, label);
    }
    
    // Facebook Pixel integration
    if (typeof fbq !== 'undefined') {
        fbq('track', 'ViewContent', {
            content_type: 'video',
            content_name: label || 'Coffee Manjehe Review'
        });
    }
}

// ===== NOTIFICATION SYSTEM =====
function showNotification(message, type = 'info') {
    // Remove existing notification
    const existing = document.querySelector('.video-notification');
    if (existing) existing.remove();
    
    const notification = document.createElement('div');
    notification.className = `video-notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas ${getNotificationIcon(type)}"></i>
            <span>${message}</span>
        </div>
    `;
    
    // Style notification
    Object.assign(notification.style, {
        position: 'fixed',
        top: '20px',
        right: '20px',
        padding: '1rem 1.5rem',
        borderRadius: '10px',
        color: 'white',
        fontWeight: '500',
        zIndex: '99999',
        opacity: '0',
        transform: 'translateX(100px)',
        transition: 'all 0.3s ease',
        maxWidth: '300px',
        wordWrap: 'break-word',
        boxShadow: '0 4px 12px rgba(0, 0, 0, 0.3)'
    });
    
    // Set background color based on type
    const colors = {
        success: '#10B981',
        error: '#EF4444',
        info: '#3B82F6',
        warning: '#F59E0B'
    };
    notification.style.background = colors[type] || colors.info;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.opacity = '1';
        notification.style.transform = 'translateX(0)';
    }, 10);
    
    // Auto remove after 4 seconds
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateX(100px)';
        setTimeout(() => notification.remove(), 300);
    }, 4000);
}

function hideNotification() {
    const notification = document.querySelector('.video-notification');
    if (notification) {
        notification.style.opacity = '0';
        notification.style.transform = 'translateX(100px)';
        setTimeout(() => notification.remove(), 300);
    }
}

function getNotificationIcon(type) {
    const icons = {
        success: 'fa-check-circle',
        error: 'fa-exclamation-circle',
        info: 'fa-info-circle',
        warning: 'fa-exclamation-triangle'
    };
    return icons[type] || icons.info;
}

// ===== INITIALIZATION =====
document.addEventListener('DOMContentLoaded', function() {
    console.log('Initializing video functionality...');
    initVideoReview();
    
    // Add CSS animations if not already present
    addVideoAnimations();
});

// Add necessary CSS animations
function addVideoAnimations() {
    if (document.querySelector('#video-animations')) return;
    
    const style = document.createElement('style');
    style.id = 'video-animations';
    style.textContent = `
        .share-modal {
            background: rgba(0, 0, 0, 0.8) !important;
            backdrop-filter: blur(10px) !important;
        }
        
        .share-modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
        }
        
        .share-modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: var(--background-dark, #1a1a1a);
            border-radius: 20px;
            padding: 2rem;
            max-width: 500px;
            width: 90%;
            border: 2px solid var(--primary-color, #d4a574);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }
        
        .share-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .share-option {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 1rem;
            border-radius: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .share-option.facebook { background: #1877F2; color: white; }
        .share-option.twitter { background: #1DA1F2; color: white; }
        .share-option.whatsapp { background: #25D366; color: white; }
        .share-option.telegram { background: #0088CC; color: white; }
        .share-option.copy { 
            background: var(--primary-color, #d4a574); 
            color: var(--background-dark, #1a1a1a); 
        }
        
        .share-option:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .close-share-modal {
            background: none;
            border: none;
            color: var(--text-light, #ccc);
            font-size: 1.5rem;
            cursor: pointer;
            transition: color 0.3s ease;
            padding: 0.5rem;
            border-radius: 50%;
        }
        
        .close-share-modal:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--primary-color, #d4a574);
        }
        
        .share-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            color: var(--text-light, #ccc);
        }
        
        .share-header h3 {
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        @media (max-width: 480px) {
            .share-options {
                grid-template-columns: 1fr;
            }
            
            .video-notification {
                right: 10px !important;
                left: 10px !important;
                max-width: none !important;
            }
        }
    `;
    
    document.head.appendChild(style);
}

// ===== ENHANCED PRODUCT INTERACTIONS FOR NEW PRODUCTS =====
function initNewProductInteractions() {
    // Add special effects for new products
    const newProducts = ['House Blend', 'Robusta Lanang', 'Biji Robusta Lanang'];
    
    newProducts.forEach(productName => {
        const productCard = Array.from(document.querySelectorAll('.product-card h3'))
            .find(el => el.textContent === productName)?.closest('.product-card');
        
        if (productCard) {
            // Add new product badge
            if (!productCard.querySelector('.new-product-badge')) {
                const newBadge = document.createElement('div');
                newBadge.className = 'new-product-badge';
                newBadge.innerHTML = '<i class="fas fa-sparkles"></i> NEW';
                productCard.style.position = 'relative';
                productCard.appendChild(newBadge);
                
                // Style the new badge
                Object.assign(newBadge.style, {
                    position: 'absolute',
                    top: '1rem',
                    left: '1rem',
                    background: 'linear-gradient(135deg, #ff6b6b, #ffd93d)',
                    color: 'var(--background-dark)',
                    padding: '0.3rem 0.8rem',
                    borderRadius: '15px',
                    fontSize: '0.7rem',
                    fontWeight: '700',
                    zIndex: '2',
                    animation: 'newBadgePulse 2s ease-in-out infinite',
                    textTransform: 'uppercase',
                    letterSpacing: '1px'
                });
            }
            
            // Add special hover effect for new products
            productCard.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 25px 60px rgba(255, 107, 107, 0.3), 0 0 0 1px rgba(255, 107, 107, 0.1)';
            });
            
            productCard.addEventListener('mouseleave', function() {
                this.style.boxShadow = '';
            });
        }
    });
    
    // Add new badge animation keyframes
    if (!document.querySelector('#new-badge-styles')) {
        const style = document.createElement('style');
        style.id = 'new-badge-styles';
        style.textContent = `
            @keyframes newBadgePulse {
                0%, 100% { 
                    transform: scale(1); 
                    filter: brightness(1);
                }
                50% { 
                    transform: scale(1.05); 
                    filter: brightness(1.2);
                }
            }
            
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
            .share-modal-content {
                background: linear-gradient(135deg, var(--dark-primary), var(--dark-secondary));
                padding: 2rem;
                border-radius: 20px;
                border: 2px solid rgba(212, 165, 116, 0.2);
                max-width: 400px;
                width: 90%;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            }
            
            .share-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 1.5rem;
                padding-bottom: 1rem;
                border-bottom: 1px solid rgba(212, 165, 116, 0.2);
            }
            
            .share-header h3 {
                color: var(--primary-color);
                font-family: var(--font-primary);
                margin: 0;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }
            
            .close-share-modal {
                background: none;
                border: none;
                color: var(--text-muted);
                font-size: 1.2rem;
                cursor: pointer;
                padding: 0.5rem;
                border-radius: 50%;
                transition: var(--transition-smooth);
            }
            
            .close-share-modal:hover {
                background: rgba(212, 165, 116, 0.1);
                color: var(--primary-color);
            }
            
            .share-options {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
            
            .share-option {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 0.5rem;
                padding: 1rem;
                background: rgba(212, 165, 116, 0.1);
                border: 1px solid rgba(212, 165, 116, 0.2);
                border-radius: 15px;
                color: var(--text-light);
                text-decoration: none;
                transition: var(--transition-smooth);
                cursor: pointer;
            }
            
            .share-option:hover {
                background: rgba(212, 165, 116, 0.2);
                transform: translateY(-2px);
                color: var(--primary-color);
            }
            
            .share-option i {
                font-size: 1.5rem;
            }
            
            .share-option span {
                font-size: 0.9rem;
                font-weight: 500;
            }
            
            .share-option.facebook:hover { border-color: #1877f2; }
            .share-option.twitter:hover { border-color: #1da1f2; }
            .share-option.whatsapp:hover { border-color: #25d366; }
            .share-option.copy:hover { border-color: var(--primary-color); }
        `;
        document.head.appendChild(style);
    }
}

// ===== INITIALIZE ALL VIDEO AND NEW PRODUCT FEATURES =====
document.addEventListener('DOMContentLoaded', function() {
    initVideoReview();
    initVideoAnalytics();
    initNewProductInteractions();
});

// ===== EXPORT FUNCTIONS =====
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        initVideoReview,
        initVideoAnalytics,
        initNewProductInteractions,
        shareVideo: window.shareVideo,
        copyToClipboard: window.copyToClipboard
    };
}
}

// ===== VIDEO PLAYER (Lazy YouTube) =====
function initVideoPlayer(){
    const wrapper = document.querySelector('.video-player');
    if(!wrapper) return;
    const btn = wrapper.querySelector('.video-play-btn');
    btn.addEventListener('click', () => {
        const id = wrapper.getAttribute('data-video-id');
        const iframe = document.createElement('iframe');
        iframe.setAttribute('allowfullscreen','');
        iframe.setAttribute('title','Coffee Manjehe Review');
        iframe.setAttribute('allow','accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
        iframe.setAttribute('frameborder', '0');
        iframe.src = `https://www.youtube.com/embed/${id}?autoplay=1&rel=0&modestbranding=1`; 
        iframe.style.cssText = 'position:absolute;top:0;left:0;width:100%;height:100%;border:0;z-index:3;background:#000;';
        
        wrapper.classList.add('playing');
        // hide controls instead of clearing to preserve aspect ratio
        const thumb = wrapper.querySelector('.video-thumb');
        if(thumb) thumb.style.display='none';
        btn.style.display='none';
        wrapper.appendChild(iframe);
        
        // Ensure iframe is loaded and visible
        iframe.onload = function() {
            console.log('Video iframe loaded successfully');
            iframe.style.opacity = '1';
        };
        iframe.style.opacity = '0';
        setTimeout(() => {
            iframe.style.opacity = '1';
            iframe.style.transition = 'opacity 0.3s';
        }, 100);
    });
}
</script>
@endpush

@push('styles')
<style>
.video-wrapper{position:relative;}
.video-player{position:relative;padding-bottom:56.25%;height:0;overflow:hidden;border-radius:20px;box-shadow:0 0 40px #000a;background:#111;cursor:pointer;}
.video-player .video-thumb{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;filter:brightness(.7);transition:.4s;z-index:1;}
.video-player:hover .video-thumb{filter:brightness(.5);} 
.video-play-btn{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);background:rgba(0,0,0,.55);border:2px solid #d4af7a;color:#d4af7a;font-size:3rem;line-height:1;border-radius:50%;width:90px;height:90px;display:flex;align-items:center;justify-content:center;backdrop-filter:blur(4px);transition:.3s;z-index:2;}
.video-play-btn:hover{background:#d4af7a;color:#111;}
.video-player.playing{padding-bottom:56.25%;height:0;cursor:default;background:#000;}
.video-player.playing iframe{position:absolute;top:0;left:0;width:100%;height:100%;border:0;z-index:3;}
@media (max-width:768px){.video-play-btn{width:70px;height:70px;font-size:2.2rem}}
</style>
@endpush