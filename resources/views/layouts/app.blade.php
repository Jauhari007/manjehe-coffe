{{-- File: resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Coffee Manjehe - Premium Coffee Experience')</title>
    <meta name="description" content="@yield('meta_description', 'Coffee Manjehe - Premium coffee experience crafted with passion and dedication.')">
    <link rel="icon" type="image/png" href="{{ asset('assets/manjehe_logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/manjehe_logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/manjehe_logo.png') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('assets/manjehe_logo.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/manjehe_logo.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/manjehe_logo.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('assets/manjehe_logo.png') }}">


    <!-- External CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-images.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-detail-modal.css') }}">
    <style>
        /* ===== RESET & BASE STYLES ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    /* Color Palette */
    --primary-color: #D4A574;
    --secondary-color: #8B4513;
    --dark-primary: #2A1810;
    --dark-secondary: #1A1A1A;
    --background-dark: #0A0A0A;
    --text-light: #FFFFFF;
    --text-muted: #B8B8B8;
    --accent-gold: #F4E4BC;
    --whatsapp-green: #25D366;
    --success-green: #4CAF50;
    
    /* Typography */
    --font-primary: 'Playfair Display', serif;
    --font-secondary: 'Inter', sans-serif;
    
    /* Spacing */
    --section-padding: 100px 5%;
    --container-width: 1200px;
    
    /* Animations */
    --transition-smooth: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    --transition-bounce: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

html {
    scroll-behavior: smooth;
}

body {
    font-family: var(--font-secondary);
    background-color: var(--background-dark);
    color: var(--text-light);
    overflow-x: hidden;
    line-height: 1.6;
}

/* Prevent accidental horizontal scroll (e.g., from transforms / animations) */
html, body { max-width: 100%; }
body * { box-sizing: border-box; }
/* Guard: any element wider than viewport will be constrained */
body > * { max-width: 100vw; overflow-x: clip; }
/* Specific wrappers that may flex beyond width */
.detail-wrapper, .products-grid, .related, .video-wrapper, .contact-content, .footer-content { overflow-x: hidden; }

.container {
    max-width: var(--container-width);
    margin: 0 auto;
    padding: 0 2rem;
}

/* ===== PRELOADER ===== */
#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--background-dark), var(--dark-primary));
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    transition: var(--transition-smooth);
}

#preloader.hidden {
    opacity: 0;
    visibility: hidden;
}

.coffee-loader {
    text-align: center;
}

.coffee-cup {
    font-size: 4rem;
    color: var(--primary-color);
    margin-bottom: 2rem;
    animation: coffeeLoading 2s ease-in-out infinite;
}

.loading-text {
    font-size: 1.2rem;
    color: var(--text-muted);
    font-weight: 300;
    letter-spacing: 2px;
}

@keyframes coffeeLoading {
    0%, 100% { transform: scale(1) rotate(0deg); }
    25% { transform: scale(1.1) rotate(-5deg); }
    50% { transform: scale(1.2) rotate(0deg); }
    75% { transform: scale(1.1) rotate(5deg); }
}

/* ===== CURSOR EFFECTS ===== */
.cursor {
    position: fixed;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: var(--primary-color);
    pointer-events: none;
    z-index: 9999;
    transition: transform 0.1s;
    mix-blend-mode: difference;
}

/* ===== NAVIGATION ===== */
nav {
    position: fixed;
    top: 0;
    width: 100%;
    padding: 1.5rem 0;
    background: rgba(10, 10, 10, 0.95);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    z-index: 1000;
    transition: var(--transition-smooth);
}

nav.scrolled {
        background: rgba(42, 24, 16, 0.95);
        backdrop-filter: blur(20px);
        box-shadow: 0 4px 30px rgba(212, 165, 116, 0.1);
        border-bottom: 1px solid rgba(212, 165, 116, 0.1);
}

.nav-container {
    max-width: var(--container-width);
    margin: 0 auto;
    padding: 0 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-family: var(--font-primary);
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-color);
    text-shadow: 2px 2px 4px rgba(212, 165, 116, 0.3);
}

.logo i {
    font-size: 1.8rem;
    animation: logoGlow 3s ease-in-out infinite;
}

@keyframes logoGlow {
    0%, 100% { transform: scale(1); filter: drop-shadow(0 0 10px rgba(212, 165, 116, 0.3)); }
    50% { transform: scale(1.05); filter: drop-shadow(0 0 20px rgba(212, 165, 116, 0.5)); }
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 3rem;
    align-items: center;
}

.nav-links a {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-light);
    text-decoration: none;
    font-weight: 500;
    font-size: 1rem;
    position: relative;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    transition: var(--transition-smooth);
    overflow: hidden;
}

.nav-links a::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(212, 165, 116, 0.2), transparent);
    transition: left 0.5s ease;
}

.nav-links a:hover::before {
    left: 100%;
}

.nav-links a::after {
    content: attr(data-text);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--primary-color), var(--accent-gold));
    color: var(--background-dark);
    font-weight: 600;
    border-radius: 25px;
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.nav-links a:hover::after {
    transform: translateY(0);
}

.nav-links a:hover {
    color: transparent;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(212, 165, 116, 0.3);
}

.nav-links a i {
    transition: var(--transition-smooth);
}

.nav-links a:hover i {
    transform: scale(1.2);
}

.mobile-menu-btn {
    display: none;
    flex-direction: column;
    gap: 4px;
    cursor: pointer;
    padding: 0.5rem;
}

.mobile-menu-btn span {
    width: 25px;
    height: 3px;
    background: var(--primary-color);
    border-radius: 2px;
    transition: var(--transition-smooth);
}

.mobile-menu-btn.active span:nth-child(1) {
    transform: rotate(45deg) translate(6px, 6px);
}

.mobile-menu-btn.active span:nth-child(2) {
    opacity: 0;
}

.mobile-menu-btn.active span:nth-child(3) {
    transform: rotate(-45deg) translate(6px, -6px);
}

/* ===== HERO SECTION ===== */
.hero {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    background: linear-gradient(135deg, 
        rgba(10, 10, 10, 0.8), 
        rgba(42, 24, 16, 0.9),
        rgba(139, 69, 19, 0.7),
        rgba(10, 10, 10, 0.9)
    );
    overflow: hidden;
}

.hero-bg-animation {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.coffee-particle {
    position: absolute;
    width: 6px;
    height: 6px;
    background: var(--primary-color);
    border-radius: 50%;
    animation: floatParticles 8s linear infinite;
    opacity: 0.6;
}

.coffee-particle:nth-child(1) {
    left: 10%;
    animation-delay: 0s;
    animation-duration: 8s;
}

.coffee-particle:nth-child(2) {
    left: 30%;
    animation-delay: 2s;
    animation-duration: 10s;
}

.coffee-particle:nth-child(3) {
    left: 50%;
    animation-delay: 4s;
    animation-duration: 12s;
}

.coffee-particle:nth-child(4) {
    left: 70%;
    animation-delay: 6s;
    animation-duration: 9s;
}

.coffee-particle:nth-child(5) {
    left: 90%;
    animation-delay: 1s;
    animation-duration: 11s;
}

@keyframes floatParticles {
    0% {
        transform: translateY(100vh) rotate(0deg);
        opacity: 0;
    }
    10% {
        opacity: 0.6;
    }
    90% {
        opacity: 0.6;
    }
    100% {
        transform: translateY(-100px) rotate(360deg);
        opacity: 0;
    }
}

.hero-content {
    text-align: center;
    max-width: 800px;
    padding: 0 2rem;
    position: relative;
    z-index: 2;
}

.hero-badge {
    display: inline-block;
    padding: 0.5rem 1.5rem;
    background: rgba(212, 165, 116, 0.1);
    border: 1px solid rgba(212, 165, 116, 0.3);
    border-radius: 50px;
    margin-bottom: 2rem;
    backdrop-filter: blur(10px);
    animation: badgeFloat 3s ease-in-out infinite;
}

.hero-badge span {
    color: var(--primary-color);
    font-weight: 500;
    font-size: 0.9rem;
    letter-spacing: 1px;
}

@keyframes badgeFloat {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
}

.hero h1 {
    font-family: var(--font-primary);
    font-size: clamp(3rem, 8vw, 6rem);
    font-weight: 900;
    margin-bottom: 1.5rem;
    line-height: 1.1;
}

.hero .highlight {
    background: linear-gradient(135deg, var(--primary-color), var(--accent-gold));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    display: block;
    animation: textShine 3s ease-in-out infinite;
}

.hero .main-text {
    color: var(--text-light);
    display: block;
    text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.5);
}

@keyframes textShine {
    0%, 100% { filter: brightness(1); }
    50% { filter: brightness(1.2); }
}

.hero-subtitle {
    font-size: clamp(1.2rem, 3vw, 1.8rem);
    margin-bottom: 3rem;
    opacity: 0.9;
    font-weight: 300;
    line-height: 1.4;
}

.typing-text {
    color: var(--primary-color);
    font-weight: 500;
    border-right: 2px solid var(--primary-color);
    animation: blink 1s infinite;
}

@keyframes blink {
    0%, 50% { border-color: var(--primary-color); }
    51%, 100% { border-color: transparent; }
}

.hero-buttons {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    flex-wrap: wrap;
}

.cta-primary, .cta-secondary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.1rem;
    transition: var(--transition-bounce);
    position: relative;
    overflow: hidden;
}

.cta-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: var(--text-light);
    box-shadow: 0 8px 30px rgba(212, 165, 116, 0.3);
}

.cta-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--accent-gold), var(--primary-color));
    transition: left 0.3s ease;
    z-index: -1;
}

.cta-primary:hover::before {
    left: 0;
}

.cta-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 40px rgba(212, 165, 116, 0.4);
    color: var(--background-dark);
}

.cta-secondary {
    background: transparent;
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
}

.cta-secondary:hover {
    background: var(--primary-color);
    color: var(--background-dark);
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(212, 165, 116, 0.3);
}

.hero-scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
    color: var(--text-muted);
    font-size: 0.9rem;
    letter-spacing: 2px;
    animation: scrollIndicator 2s ease-in-out infinite;
}

.scroll-line {
    width: 2px;
    height: 30px;
    background: linear-gradient(to bottom, transparent, var(--primary-color));
    animation: scrollLine 2s ease-in-out infinite;
}

@keyframes scrollIndicator {
    0%, 100% { transform: translateX(-50%) translateY(0); }
    50% { transform: translateX(-50%) translateY(10px); }
}

@keyframes scrollLine {
    0% { height: 30px; }
    50% { height: 15px; }
    100% { height: 30px; }
}

/* ===== SECTION HEADERS ===== */
.section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.section-badge {
    display: inline-block;
    padding: 0.5rem 1.5rem;
    background: rgba(212, 165, 116, 0.1);
    border: 1px solid rgba(212, 165, 116, 0.3);
    border-radius: 50px;
    color: var(--primary-color);
    font-size: 0.9rem;
    font-weight: 500;
    letter-spacing: 1px;
    margin-bottom: 1rem;
}

.section-header h2 {
    font-family: var(--font-primary);
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 1rem;
}

.section-header .highlight {
    background: linear-gradient(135deg, var(--primary-color), var(--accent-gold));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.section-header p {
    font-size: 1.2rem;
    opacity: 0.8;
    max-width: 600px;
    margin: 0 auto;
}

/* ===== ABOUT SECTION ===== */
.about {
    padding: var(--section-padding);
    background: linear-gradient(135deg, var(--dark-secondary), var(--dark-primary));
    position: relative;
}

.section-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0.1;
}

.bg-pattern {
    width: 100%;
    height: 100%;
    background-image: radial-gradient(circle at 25% 25%, var(--primary-color) 2px, transparent 2px),
                      radial-gradient(circle at 75% 75%, var(--primary-color) 1px, transparent 1px);
    background-size: 100px 100px;
    animation: patternMove 20s linear infinite;
}

@keyframes patternMove {
    0% { transform: translate(0, 0); }
    100% { transform: translate(100px, 100px); }
}

.about-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
    position: relative;
    z-index: 2;
}

.text-block {
    margin-bottom: 2.5rem;
}

.text-block h3 {
    font-family: var(--font-primary);
    font-size: 1.8rem;
    color: var(--primary-color);
    margin-bottom: 1rem;
    position: relative;
}

.text-block h3::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 50px;
    height: 2px;
    background: linear-gradient(90deg, var(--primary-color), transparent);
}

.text-block p {
    font-size: 1.1rem;
    line-height: 1.8;
    opacity: 0.9;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
    margin-top: 3rem;
}

.stat-item {
    text-align: center;
    padding: 1.5rem;
    background: rgba(212, 165, 116, 0.05);
    border-radius: 15px;
    border: 1px solid rgba(212, 165, 116, 0.1);
    transition: var(--transition-smooth);
}

.stat-item:hover {
    transform: translateY(-5px);
    background: rgba(212, 165, 116, 0.1);
    border-color: rgba(212, 165, 116, 0.3);
}

.stat-number {
    font-family: var(--font-primary);
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.8;
    font-weight: 500;
}

.about-visual {
    display: flex;
    justify-content: center;
    align-items: center;
}

.visual-card {
    position: relative;
    width: 300px;
    height: 300px;
    background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(139, 69, 19, 0.1));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid rgba(212, 165, 116, 0.3);
    animation: visualRotate 10s linear infinite;
}

.coffee-illustration {
    font-size: 8rem;
    color: var(--primary-color);
    animation: coffeePulse 3s ease-in-out infinite;
}

@keyframes visualRotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes coffeePulse {
    0%, 100% { transform: scale(1); filter: drop-shadow(0 0 20px rgba(212, 165, 116, 0.3)); }
    50% { transform: scale(1.1); filter: drop-shadow(0 0 30px rgba(212, 165, 116, 0.5)); }
}

.floating-elements {
    position: absolute;
    width: 100%;
    height: 100%;
}

.float-item {
    position: absolute;
    color: var(--primary-color);
    font-size: 1.5rem;
    opacity: 0.6;
    animation: floatAround 8s ease-in-out infinite;
}

.float-item:nth-child(1) {
    top: 10%;
    left: 80%;
    animation-delay: 0s;
}

.float-item:nth-child(2) {
    bottom: 20%;
    left: 10%;
    animation-delay: 2s;
}

.float-item:nth-child(3) {
    top: 70%;
    right: 85%;
    animation-delay: 4s;
}

@keyframes floatAround {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    25% { transform: translate(10px, -10px) rotate(90deg); }
    50% { transform: translate(0, -20px) rotate(180deg); }
    75% { transform: translate(-10px, -10px) rotate(270deg); }
}

/* ===== PRODUCTS SECTION ===== */
.products {
    padding: var(--section-padding);
    background: linear-gradient(135deg, var(--background-dark), var(--dark-secondary));
}

.products-filter {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 0.8rem 2rem;
    background: transparent;
    border: 2px solid rgba(212, 165, 116, 0.3);
    border-radius: 50px;
    color: var(--text-muted);
    font-weight: 500;
    cursor: pointer;
    transition: var(--transition-smooth);
}

.filter-btn.active,
.filter-btn:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: var(--background-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(212, 165, 116, 0.3);
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    max-width: var(--container-width);
    margin: 0 auto;
}

.product-card {
    background: linear-gradient(135deg, var(--dark-primary), var(--dark-secondary));
    border-radius: 25px;
    padding: 2rem;
    border: 2px solid rgba(212, 165, 116, 0.1);
    transition: var(--transition-smooth);
    position: relative;
    overflow: hidden;
}

.product-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(212, 165, 116, 0.05), rgba(139, 69, 19, 0.05));
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
}

.product-card:hover::before {
    opacity: 1;
}

.product-card:hover {
    transform: translateY(-10px);
    border-color: var(--primary-color);
    box-shadow: 0 20px 50px rgba(212, 165, 116, 0.2);
}

.product-card.featured {
    border-color: var(--primary-color);
    background: linear-gradient(135deg, var(--dark-primary), rgba(212, 165, 116, 0.1));
}
.featured-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: linear-gradient(135deg, var(--primary-color), var(--accent-gold));
    color: var(--background-dark);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    z-index: 2;
    animation: badgePulse 2s ease-in-out infinite;
}

@keyframes badgePulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.product-image {
    position: relative;
    text-align: center;
    margin-bottom: 1.5rem;
}

.product-icon {
    font-size: 4rem;
    color: var(--primary-color);
    margin-bottom: 1rem;
    transition: var(--transition-smooth);
}

.product-card:hover .product-icon {
    transform: scale(1.1) rotate(5deg);
    filter: drop-shadow(0 0 20px rgba(212, 165, 116, 0.5));
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(212, 165, 116, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition-smooth);
    border-radius: 15px;
}

.product-card:hover .product-overlay {
    opacity: 1;
}

.quick-view {
    color: var(--background-dark);
    font-weight: 600;
    font-size: 1.1rem;
    text-decoration: underline;
    cursor: pointer;
    display: inline-block;
}

.product-info {
    position: relative;
    z-index: 2;
}

.product-category {
    color: var(--primary-color);
    font-size: 0.9rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.product-card h3 {
    font-family: var(--font-primary);
    font-size: 1.8rem;
    font-weight: 600;
    color: var(--text-light);
    margin-bottom: 1rem;
}

.product-card p {
    line-height: 1.6;
    opacity: 0.9;
    margin-bottom: 1.5rem;
    font-size: 1rem;
}

.product-features {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
}

.product-features span {
    display: flex;
    align-items: center;
    gap: 0.3rem;
    font-size: 0.8rem;
    color: var(--primary-color);
    background: rgba(212, 165, 116, 0.1);
    padding: 0.3rem 0.8rem;
    border-radius: 15px;
    border: 1px solid rgba(212, 165, 116, 0.2);
}

.product-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
}

.price {
    display: flex;
    align-items: baseline;
    gap: 0.5rem;
}

.current-price {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    font-family: var(--font-primary);
}

.price-unit {
    font-size: 0.9rem;
    opacity: 0.7;
}

.whatsapp-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--whatsapp-green);
    color: white;
    padding: 0.8rem 1.5rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: var(--transition-bounce);
    position: relative;
    overflow: hidden;
}

/* Stack actions (Detail + WhatsApp) */
.product-actions-stack {
    display: flex;
    flex-direction: column;
    gap: 0.6rem;
    align-items: flex-end;
}

.detail-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(212,165,116,0.12);
    color: var(--primary-color);
    padding: 0.6rem 1rem;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.85rem;
    text-decoration: none;
    border: 1px solid rgba(212,165,116,0.3);
    backdrop-filter: blur(6px);
    transition: var(--transition-smooth);
}
.detail-btn:hover {
    background: var(--primary-color);
    color: var(--background-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(212,165,116,0.3);
}
@media (max-width: 640px){
    .product-bottom {flex-direction: column; align-items: flex-start;}
    .product-actions-stack {width: 100%; align-items: stretch;}
    .detail-btn, .whatsapp-btn {justify-content: center; width: 100%;}
}

.whatsapp-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
}

.whatsapp-btn:hover::before {
    left: 100%;
}

.whatsapp-btn:hover {
    background: #128C7E;
    transform: scale(1.05);
    box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
}

/* ===== VIDEO REVIEW SECTION ===== */
        .video-review {
            padding: var(--section-padding);
            background: linear-gradient(135deg, var(--dark-secondary), var(--background-dark));
            position: relative;
            text-align: center;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-badge {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background: rgba(212, 165, 116, 0.1);
            border: 1px solid var(--primary-color);
            border-radius: 25px;
            color: var(--primary-color);
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .section-header h2 {
            font-family: var(--font-primary);
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--text-light);
        }

        .highlight {
            color: var(--primary-color);
        }

        .section-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .video-container {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            align-items: center;
            text-align: center;
        }

        .video-wrapper {
            position: relative;
            width: 100%;
            max-width: 800px;
            aspect-ratio: 16/9;
            background: linear-gradient(135deg, var(--dark-primary), var(--dark-secondary));
            border-radius: 20px;
            overflow: hidden;
            border: 2px solid rgba(212, 165, 116, 0.2);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            transition: var(--transition-smooth);
            margin: 0 auto;
        }

        .video-wrapper:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(212, 165, 116, 0.2);
            border-color: var(--primary-color);
        }

        .video-thumbnail {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, 
                rgba(212, 165, 116, 0.8), 
                rgba(139, 69, 19, 0.8),
                rgba(42, 24, 16, 0.9)
            );
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            cursor: pointer;
            transition: var(--transition-smooth);
            z-index: 2;
            text-align: center;
        }

        .video-thumbnail i {
            font-size: 5rem;
            color: white;
            margin-bottom: 1rem;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
            transition: var(--transition-smooth);
        }

        .video-thumbnail:hover i {
            transform: scale(1.1);
            filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.5));
        }

        .video-overlay {
            text-align: center;
            color: white;
            width: 100%;
        }

        .video-overlay h3 {
            font-family: var(--font-primary);
            font-size: 2rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .video-overlay p {
            font-size: 1.1rem;
            opacity: 0.9;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            text-align: center;
            margin: 0 auto;
        }

        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .video-wrapper.playing iframe {
            opacity: 1;
            z-index: 3;
        }

        .video-wrapper.playing .video-thumbnail {
            opacity: 0;
            pointer-events: none;
        }

        .video-info {
            width: 100%;
            max-width: 600px;
            text-align: center;
            margin: 0 auto;
        }

        .video-stats {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            text-align: center;
        }

        .video-stats .stat-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.8rem 1.5rem;
            background: rgba(212, 165, 116, 0.1);
            border: 1px solid rgba(212, 165, 116, 0.2);
            border-radius: 25px;
            color: var(--primary-color);
            font-weight: 500;
            transition: var(--transition-smooth);
            text-align: center;
        }

        .video-stats .stat-item:hover {
            background: rgba(212, 165, 116, 0.2);
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .video-stats .stat-item i {
            font-size: 1.1rem;
        }

        .video-description {
            margin-bottom: 2rem;
            text-align: center;
        }

        .video-description p {
            font-size: 1.1rem;
            line-height: 1.6;
            opacity: 0.9;
            color: var(--text-light);
            text-align: center;
            margin: 0 auto;
            max-width: 100%;
        }

        .video-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            text-align: center;
        }

        .subscribe-btn,
        .share-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: var(--transition-bounce);
            font-size: 1rem;
            text-align: center;
        }

        .subscribe-btn {
            background: linear-gradient(135deg, #ff0000, #cc0000);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.3);
        }

        .subscribe-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 0, 0, 0.4);
            background: linear-gradient(135deg, #ff3333, #ff0000);
        }

        .share-btn {
            background: rgba(212, 165, 116, 0.1);
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .share-btn:hover {
            background: var(--primary-color);
            color: var(--background-dark);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(212, 165, 116, 0.3);
        }

        /* ===== SHARE MODAL STYLES ===== */
        .share-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99999;
            opacity: 0;
            transition: opacity 0.3s ease;
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
            background: var(--background-dark);
            border-radius: 20px;
            padding: 2rem;
            max-width: 500px;
            width: 90%;
            border: 2px solid var(--primary-color);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }
        
        .share-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            color: var(--text-light);
        }
        
        .share-header h3 {
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .close-share-modal {
            background: none;
            border: none;
            color: var(--text-light);
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .close-share-modal:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--primary-color);
        }
        
        .share-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
        
        .share-option {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 1rem;
            border-radius: 12px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .share-option.facebook { 
            background: #1877F2; 
            color: white; 
        }
        
        .share-option.twitter { 
            background: #1DA1F2; 
            color: white; 
        }
        
        .share-option.whatsapp { 
            background: #25D366; 
            color: white; 
        }
        
        .share-option.copy { 
            background: var(--primary-color); 
            color: var(--background-dark); 
        }
        
        .share-option:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* ===== NOTIFICATION STYLES ===== */
        .video-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            color: white;
            font-weight: 500;
            z-index: 99999;
            opacity: 0;
            transform: translateX(100px);
            transition: all 0.3s ease;
            max-width: 300px;
            word-wrap: break-word;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        
        .notification-content {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .notification-success { background: #10B981; }
        .notification-error { background: #EF4444; }
        .notification-info { background: #3B82F6; }
        .notification-warning { background: #F59E0B; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .video-container {
                gap: 1.5rem;
            }
            
            .video-wrapper {
                max-width: 100%;
                border-radius: 15px;
            }
            
            .video-thumbnail i {
                font-size: 3.5rem;
            }
            
            .video-overlay h3 {
                font-size: 1.5rem;
            }
            
            .video-overlay p {
                font-size: 1rem;
            }
            
            .video-stats {
                gap: 1rem;
                justify-content: center;
            }
            
            .video-stats .stat-item {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }
            
            .video-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .subscribe-btn,
            .share-btn {
                width: 100%;
                max-width: 250px;
            }

            .share-options {
                grid-template-columns: 1fr;
            }
            
            .video-notification {
                right: 10px;
                left: 10px;
                max-width: none;
            }
        }

        @media (max-width: 480px) {
            .video-wrapper {
                border-radius: 10px;
            }
            
            .video-thumbnail i {
                font-size: 2.5rem;
            }
            
            .video-overlay h3 {
                font-size: 1.2rem;
            }
            
            .video-stats {
                flex-direction: column;
                gap: 0.5rem;
                align-items: center;
            }
            
            .video-stats .stat-item {
                justify-content: center;
                width: 100%;
            }
        }

/* ===== CONTACT SECTION ===== */
.contact {
    padding: var(--section-padding);
    background: linear-gradient(135deg, var(--dark-primary), var(--background-dark));
}

.contact-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: start;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    padding: 2rem;
    background: rgba(212, 165, 116, 0.05);
    border-radius: 20px;
    border: 1px solid rgba(212, 165, 116, 0.1);
    transition: var(--transition-smooth);
}

.contact-item:hover {
    transform: translateX(10px);
    background: rgba(212, 165, 116, 0.1);
    border-color: rgba(212, 165, 116, 0.3);
}

.contact-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-color), var(--accent-gold));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.contact-icon i {
    font-size: 1.2rem;
    color: var(--background-dark);
}

.contact-details h3 {
    font-family: var(--font-primary);
    font-size: 1.3rem;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.contact-details p {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0.3rem;
}

.contact-details span {
    font-size: 0.9rem;
    opacity: 0.7;
}

.social-links {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid rgba(212, 165, 116, 0.1);
}

.social-links h3 {
    font-family: var(--font-primary);
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.social-icons {
    display: flex;
    gap: 1rem;
}

.social-icon {
    width: 45px;
    height: 45px;
    background: rgba(212, 165, 116, 0.1);
    border: 1px solid rgba(212, 165, 116, 0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-color);
    text-decoration: none;
    transition: var(--transition-bounce);
}

.social-icon:hover {
    background: var(--primary-color);
    color: var(--background-dark);
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(212, 165, 116, 0.3);
}

.contact-form {
    background: linear-gradient(135deg, rgba(212, 165, 116, 0.05), rgba(139, 69, 19, 0.05));
    border-radius: 25px;
    padding: 3rem;
    border: 1px solid rgba(212, 165, 116, 0.1);
}

.form-header {
    text-align: center;
    margin-bottom: 2rem;
}

.form-header h3 {
    font-family: var(--font-primary);
    font-size: 2rem;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.form-header p {
    opacity: 0.8;
}

.message-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.form-group {
    position: relative;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 1rem;
    background: rgba(212, 165, 116, 0.05);
    border: 2px solid rgba(212, 165, 116, 0.1);
    border-radius: 15px;
    color: var(--text-light);
    font-size: 1rem;
    transition: var(--transition-smooth);
    outline: none;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: var(--primary-color);
    background: rgba(212, 165, 116, 0.1);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(212, 165, 116, 0.2);
}

.form-group label {
    position: absolute;
    top: 1rem;
    left: 1rem;
    color: var(--text-muted);
    font-size: 1rem;
    pointer-events: none;
    transition: var(--transition-smooth);
    background: var(--background-dark);
    padding: 0 0.5rem;
}

.form-group input:focus + label,
.form-group input:valid + label,
.form-group textarea:focus + label,
.form-group textarea:valid + label {
    top: -0.5rem;
    left: 1rem;
    color: var(--primary-color);
    font-size: 0.8rem;
    font-weight: 600;
}

.form-group textarea {
    resize: vertical;
    min-height: 120px;
}

.form-submit {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: var(--text-light);
    border: none;
    padding: 1.2rem 2rem;
    border-radius: 25px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition-bounce);
    position: relative;
    overflow: hidden;
}

.form-submit::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--accent-gold), var(--primary-color));
    transition: left 0.3s ease;
    z-index: -1;
}

.form-submit:hover::before {
    left: 0;
}

.form-submit:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(212, 165, 116, 0.4);
    color: var(--background-dark);
}

/* ===== FOOTER ===== */
.footer {
    background: var(--background-dark);
    border-top: 2px solid rgba(212, 165, 116, 0.1);
    padding: 4rem 0 2rem;
}

.footer-content {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 4rem;
    margin-bottom: 3rem;
}

.footer-brand {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.footer-logo {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-family: var(--font-primary);
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-color);
}

.footer-logo i {
    font-size: 1.8rem;
}

.footer-brand p {
    line-height: 1.6;
    opacity: 0.8;
    max-width: 300px;
}

.footer-social {
    display: flex;
    gap: 1rem;
}

.social-link {
    width: 45px;
    height: 45px;
    background: rgba(212, 165, 116, 0.1);
    border: 1px solid rgba(212, 165, 116, 0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-color);
    text-decoration: none;
    transition: var(--transition-smooth);
}

.social-link:hover {
    background: var(--primary-color);
    color: var(--background-dark);
    transform: translateY(-3px) scale(1.1);
    box-shadow: 0 8px 20px rgba(212, 165, 116, 0.3);
}

.footer-links {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
}

.link-group h4 {
    font-family: var(--font-primary);
    color: var(--primary-color);
    font-size: 1.3rem;
    margin-bottom: 1rem;
}

.link-group ul {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.link-group a {
    color: var(--text-muted);
    text-decoration: none;
    transition: var(--transition-smooth);
    position: relative;
    padding: 0.3rem 0;
}

.link-group a::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 1px;
    background: var(--primary-color);
    transition: width 0.3s ease;
}

.link-group a:hover::before {
    width: 100%;
}

.link-group a:hover {
    color: var(--primary-color);
    transform: translateX(5px);
}

.footer-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(212, 165, 116, 0.3), transparent);
    margin-bottom: 2rem;
}

.footer-bottom {
    text-align: center;
}

.footer-copyright {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    opacity: 0.7;
    font-size: 0.9rem;
}

/* ===== BACK TO TOP ===== */
.back-to-top {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border: none;
    border-radius: 50%;
    color: var(--text-light);
    font-size: 1.2rem;
    cursor: pointer;
    transition: var(--transition-bounce);
    opacity: 0;
    visibility: hidden;
    z-index: 1000;
    box-shadow: 0 4px 15px rgba(212, 165, 116, 0.3);
}

.back-to-top.visible {
    opacity: 1;
    visibility: visible;
}

.back-to-top:hover {
    transform: translateY(-5px) scale(1.1);
    box-shadow: 0 8px 25px rgba(212, 165, 116, 0.4);
    background: linear-gradient(135deg, var(--accent-gold), var(--primary-color));
}

/* ===== AOS ANIMATIONS ===== */
[data-aos] {
    pointer-events: none;
}

[data-aos].aos-animate {
    pointer-events: auto;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 1024px) {
    :root {
        --section-padding: 80px 5%;
    }
    
    .nav-links {
        gap: 2rem;
    }
    
    .hero h1 {
        font-size: clamp(2.5rem, 7vw, 5rem);
    }
    
    .about-content,
    .contact-content {
        grid-template-columns: 1fr;
        gap: 3rem;
    }
    
    .products-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }
    
    .stats-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }
}

@media (max-width: 768px) {
    :root {
        --section-padding: 60px 5%;
    }
    
    .nav-links {
        position: fixed;
        top: 80px;
        right: -100%;
        width: 300px;
        height: calc(100vh - 80px);
        background: rgba(42, 24, 16, 0.95);
        backdrop-filter: blur(20px);
        flex-direction: column;
        justify-content: flex-start;
        padding: 2rem;
        gap: 1.5rem;
        transition: right 0.3s ease;
        border-left: 1px solid rgba(212, 165, 116, 0.2);
    }
    
    .nav-links.active {
        right: 0;
    }
    
    .nav-links a {
        width: 100%;
        padding: 1rem;
        border-radius: 15px;
        justify-content: flex-start;
    }
    
    .mobile-menu-btn {
        display: flex;
    }
    
    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .cta-primary,
    .cta-secondary {
        width: 100%;
        max-width: 250px;
        justify-content: center;
    }
    
    .visual-card {
        width: 250px;
        height: 250px;
    }
    
    .coffee-illustration {
        font-size: 6rem;
    }
    
    .products-grid {
        grid-template-columns: 1fr;
    }
    
    .product-bottom {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .whatsapp-btn {
        width: 100%;
        justify-content: center;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .footer-content {
        grid-template-columns: 1fr;
        gap: 2rem;
        text-align: center;
    }
    
    .footer-links {
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }
    
    .footer-copyright {
        font-size: 0.8rem;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 1rem;
    }
    
    .nav-container {
        padding: 0 1rem;
    }
    
    .logo {
        font-size: 1.5rem;
    }
    
    .hero h1 {
        font-size: clamp(2rem, 6vw, 3.5rem);
    }
    
    .section-header h2 {
        font-size: clamp(2rem, 5vw, 3rem);
    }
    
    .product-card {
        padding: 1.5rem;
    }
    
    .contact-form {
        padding: 2rem;
    }
    
    .footer-links {
        grid-template-columns: 1fr;
        text-align: left;
    }
    
    .back-to-top {
        width: 45px;
        height: 45px;
        bottom: 1rem;
        right: 1rem;
    }
}

/* ===== UTILITIES ===== */
.hidden {
    display: none !important;
}

.visible {
    display: block !important;
}

.fade-in {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease;
}

.fade-in.visible {
    opacity: 1;
    transform: translateY(0);
}

/* ===== SCROLLBAR STYLING ===== */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: var(--background-dark);
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, var(--accent-gold), var(--primary-color));
}

/* ===== SELECTION STYLING ===== */
::selection {
    background: var(--primary-color);
    color: var(--background-dark);
}

::-moz-selection {
    background: var(--primary-color);
    color: var(--background-dark);
}
/* === Enhanced Responsive Refinements (Added) === */
/* Focus: product detail layout, related products grid, spacing & button sizing */
@media (max-width: 1200px) {
    .detail-wrapper {gap: 40px;}
}

@media (max-width: 992px) {
    .detail-wrapper {gap: 35px;}
    .detail-info h1 {font-size: 2.1rem !important;}
}

@media (max-width: 860px) {
    .detail-wrapper {flex-direction: column; align-items: center;}
    .detail-gallery, .detail-info {max-width: 760px; width: 100%;}
    .detail-info {text-align: left;}
    .detail-info .actions {justify-content: flex-start;}
}

@media (max-width: 720px) {
    .detail-info h1 {font-size: 1.9rem !important;}
    .detail-info .price {font-size: 1.8rem !important;}
    .detail-info p {font-size: 0.95rem !important;}
    .detail-wrapper {gap: 30px;}
    .related {grid-template-columns: repeat(auto-fill,minmax(180px,1fr)) !important; gap: 18px !important;}
}

@media (max-width: 600px) {
    .product-detail-page {padding-top: 110px;}
    .detail-wrapper {gap: 28px;}
    .detail-info h1 {font-size: 1.75rem !important;}
    .detail-info .price {font-size: 1.6rem !important;}
    .detail-info .features h3 {font-size: 1rem !important;}
    .detail-info .actions {flex-direction: column; align-items: stretch; width: 100%;}
    .detail-info .actions a, .detail-info .actions button {width: 100%; justify-content: center; font-size: 0.95rem;}
    .thumbs {justify-content: flex-start;}
    .thumb-btn {flex: 0 0 72px !important;}
    .thumb-btn img {height: 56px !important;}
    .related {grid-template-columns: repeat(auto-fill,minmax(160px,1fr)) !important;}
}

@media (max-width: 500px) {
    .detail-info h1 {font-size: 1.55rem !important;}
    .detail-info .price {font-size: 1.45rem !important;}
    .detail-info p {font-size: 0.9rem !important;}
    .detail-info .actions a, .detail-info .actions button {padding: 12px 22px !important;}
    .related {gap: 16px !important;}
}

@media (max-width: 420px) {
    .detail-wrapper {gap: 24px;}
    .detail-info h1 {font-size: 1.4rem !important;}
    .detail-info .price {font-size: 1.3rem !important;}
    .detail-info p {font-size: 0.85rem !important;}
    .detail-info .actions a, .detail-info .actions button {font-size: 0.85rem !important; padding: 11px 18px !important;}
    .related {grid-template-columns: repeat(auto-fill,minmax(140px,1fr)) !important;}
}

@media (max-width: 360px) {
    .detail-info h1 {font-size: 1.28rem !important;}
    .detail-info .price {font-size: 1.2rem !important;}
    .detail-info p {font-size: 0.8rem !important;}
    .product-name-nav {font-size: 0.85rem !important;}
}

/* High density / large screens */
@media (min-width: 2000px) {
    .detail-wrapper {max-width: 1600px; margin-inline: auto;}
    .detail-info h1 {font-size: 3rem;}
    .detail-info .price {font-size: 2.4rem;}
}
    </style>    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @stack('styles')
</head>
<body>


    <!-- Navigation -->
    @include('components.navbar')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Back to Top -->
    <button class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/product-detail-modal.js') }}"></script>
    @stack('scripts')
</body>
</html>