<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RenaultOcaz - Achetez votre voiture d'occasion en toute confiance</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #0f766e;
            --primary-light: #14b8a6;
            --primary-dark: #134e4a;
            --accent-color: #f59e0b;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --bg-light: #f8fafc;
            --bg-white: #ffffff;
            --border-color: #e5e7eb;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-primary);
            line-height: 1.6;
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-size: 1.75rem;
            font-weight: 800;
            text-decoration: none;
            color: var(--text-primary);
        }

        .navbar-brand .text-primary {
            color: var(--primary-color) !important;
        }

        .navbar-brand .text-dark {
            color: var(--text-primary) !important;
        }

        .navbar-collapse {
            flex-grow: 0;
        }

        .navbar-nav {
            align-items: center;
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-primary) !important;
            padding: 0.75rem 1rem !important;
            border-radius: 8px;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            background-color: rgba(15, 118, 110, 0.1);
        }

        .navbar-toggler {
            border: none;
            padding: 0.25rem 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        #theme-toggle {
            color: var(--text-primary) !important;
            border: none;
            background: transparent;
            padding: 0.5rem;
            border-radius: 50%;
            transition: all 0.2s ease;
        }

        #theme-toggle:hover {
            background-color: rgba(15, 118, 110, 0.1);
            color: var(--primary-color) !important;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-outline-primary {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(135deg, #f0fdfa 0%, #e6fffa 50%, #ccfbf1 100%);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding-top: 110px;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="%23cbd5e1" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>') repeat;
            opacity: 0.3;
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, var(--text-primary), var(--primary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: var(--text-secondary);
            margin-bottom: 3rem;
            font-weight: 400;
        }

        .search-card {
            background: var(--bg-white);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border-color);
            margin-bottom: 3rem;
        }

        .form-select, .form-control {
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 0.875rem 1rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .form-select:focus, .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.1);
        }

        .form-label {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.75rem;
        }

        .search-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border: none;
            border-radius: 16px;
            padding: 1rem 2rem;
            font-size: 1.125rem;
            font-weight: 700;
            color: white;
            transition: all 0.3s ease;
            width: 100%;
        }

        .search-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
        }

        .feature-badge {
            display: inline-flex;
            align-items: center;
            background: var(--bg-white);
            border: 2px solid var(--border-color);
            border-radius: 50px;
            padding: 0.75rem 1.25rem;
            margin: 0.5rem;
            font-weight: 600;
            color: var(--text-primary);
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .feature-badge:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .feature-icon {
            width: 24px;
            height: 24px;
            margin-right: 0.75rem;
            color: var(--primary-color);
        }

        /* Car Image Section */
        .hero-car {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .car-image {
            max-width: 100%;
            height: auto;
            filter: drop-shadow(0 25px 50px rgba(0, 0, 0, 0.15));
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .stats-card {
            background: var(--bg-white);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            position: absolute;
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .stats-card-1 {
            top: 20%;
            right: -10%;
            z-index: 3;
        }

        .stats-card-2 {
            bottom: 20%;
            left: -10%;
            z-index: 3;
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-color);
            display: block;
        }

        .stats-label {
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 0.875rem;
        }

        /* Features Section */
        .features-section {
            padding: 8rem 0;
            background: var(--bg-white);
        }

        .section-badge {
            display: inline-block;
            background: rgba(15, 118, 110, 0.1);
            color: var(--primary-color);
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
        }

        .section-subtitle {
            font-size: 1.25rem;
            color: var(--text-secondary);
            margin-bottom: 4rem;
        }

        .feature-card {
            background: var(--bg-white);
            border: 2px solid var(--border-color);
            border-radius: 24px;
            padding: 3rem 2rem;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: var(--primary-color);
            box-shadow: var(--shadow-xl);
        }

        .feature-card-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            color: white;
            font-size: 2rem;
        }

        .feature-card-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-primary);
        }

        .feature-card-text {
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.125rem;
            }
            
            .search-card {
                padding: 1.5rem;
            }
            
            .stats-card-1, .stats-card-2 {
                position: relative;
                top: auto;
                bottom: auto;
                left: auto;
                right: auto;
                margin: 1rem auto;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .feature-card {
                padding: 2rem 1.5rem;
            }
        }

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--bg-white);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.5s ease;
        }

        .loading-overlay.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 4px solid var(--border-color);
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div id="loading-overlay" class="loading-overlay">
        <div class="loading-spinner"></div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <span class="text-primary">Renault</span><span class="text-dark">Ocaz</span>
            </a>
            
            <!-- Desktop Navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="voitures">Nos véhicules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">Contact</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item me-2">
                        <a class="nav-link" href="login">Connexion</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="btn btn-primary" href="register">S'inscrire</a>
                    </li>
                  <!--   <li class="nav-item">
                        <button id="theme-toggle" class="btn btn-link nav-link" type="button" onclick="toggleTheme()" aria-label="Toggle theme">
                            <i class="bi bi-moon fs-5"></i>
                        </button>
                    </li>-->
                </ul>
            </div>

            <!-- Mobile Navigation Toggle -->
            <div class="d-flex align-items-center d-lg-none">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">
                        Vente Équitable<br>
                        Achat Équitable
                    </h1>
                    <p class="hero-subtitle">
                        Sans tracas. C'est rapide, simple et totalement transparent.<br>
                        Choisissez parmi plus de 500 voitures soigneusement inspectées en stock.
                    </p>
                    
                    <!-- Search Form -->
                    <div class="search-card">
                        <form class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Marque</label>
                                <select class="form-select">
                                    <option value="" selected>Toutes les marques</option>
                                    <option value="Renault">Renault</option>
                                    <option value="Dacia">Dacia</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Modèle</label>
                                <select class="form-select">
                                    <option value="" selected>Tous les modèles</option>
                                    <option value="Clio">Clio</option>
                                    <option value="Captur">Captur</option>
                                    <option value="Megane">Mégane</option>
                                    <option value="Kadjar">Kadjar</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Budget maximum</label>
                                <select class="form-select">
                                    <option value="">Illimité</option>
                                    <option value="10000">10 000 €</option>
                                    <option value="15000">15 000 €</option>
                                    <option value="20000">20 000 €</option>
                                    <option value="25000">25 000 €</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Année minimum</label>
                                <select class="form-select">
                                    <option value="">Toutes</option>
                                    <option value="2020">2020+</option>
                                    <option value="2019">2019+</option>
                                    <option value="2018">2018+</option>
                                </select>
                            </div>
                            <div class="col-12 pt-3">
                                <button type="submit" class="search-btn" href="{{ route('client.voitures.index') }}"> 
                                    <i class="bi bi-search me-2"></i>Rechercher des voitures
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Feature Badges -->
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                        <a href="#" class="feature-badge">
                            <i class="bi bi-shield-check feature-icon"></i>
                            Garantie 12 mois
                        </a>
                        <a href="#" class="feature-badge">
                            <i class="bi bi-arrow-repeat feature-icon"></i>
                            Essai 14 jours
                        </a>
                        <a href="#" class="feature-badge">
                            <i class="bi bi-truck feature-icon"></i>
                            Livraison France
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-6 hero-car">
                    <div class="position-relative">
                        <!-- Car Image -->
                        <img src="https://images.caradisiac.com/images/1/0/2/1/111021/S8-concept-cars-analyse-et-perspective-390777.jpg" 
                             alt="Renault d'occasion" 
                             class="car-image">
                        
                        <!-- Stats Cards -->
                        <div class="stats-card stats-card-1 d-none d-xl-block">
                            <span class="stats-number">+500</span>
                            <span class="stats-label">Véhicules<br>en stock</span>
                        </div>
                        
                        <div class="stats-card stats-card-2 d-none d-xl-block">
                            <span class="stats-number">4.9/5</span>
                            <span class="stats-label">Satisfaction<br>clients</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge">Nos garanties</span>
                <h2 class="section-title">Pourquoi choisir RenaultOcaz ?</h2>
                <p class="section-subtitle">Une expérience d'achat transparente et sécurisée</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3 class="feature-card-title">Garantie 12 mois</h3>
                        <p class="feature-card-text">Tous nos véhicules bénéficient d'une garantie minimale de 12 mois pour votre tranquillité d'esprit absolue.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <h3 class="feature-card-title">Essai de 14 jours</h3>
                        <p class="feature-card-text">Testez votre véhicule pendant 14 jours. Pas satisfait ? Nous le reprenons sans condition.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h3 class="feature-card-title">Livraison gratuite</h3>
                        <p class="feature-card-text">Livraison à domicile partout en France métropolitaine, sans frais supplémentaires.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <h3 class="feature-card-title">Inspection complète</h3>
                        <p class="feature-card-text">Chaque véhicule passe par une inspection rigoureuse de 200 points de contrôle.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h3 class="feature-card-title">Support expert</h3>
                        <p class="feature-card-text">Notre équipe d'experts vous accompagne à chaque étape de votre achat.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="bi bi-credit-card"></i>
                        </div>
                        <h3 class="feature-card-title">Financement facile</h3>
                        <p class="feature-card-text">Solutions de financement adaptées avec des taux avantageux et une réponse rapide.</p>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <a href="voitures" class="btn btn-primary btn-lg px-5">
                    Parcourir tous les véhicules <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Loading functionality
        function showLoading() {
            const overlay = document.getElementById('loading-overlay');
            if (overlay) {
                overlay.classList.remove('hidden');
            }
        }
        
        function hideLoading() {
            const overlay = document.getElementById('loading-overlay');
            if (overlay) {
                overlay.classList.add('hidden');
            }
        }

        // Theme functionality
        function initTheme() {
            const savedTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
                document.documentElement.setAttribute('data-bs-theme', 'dark');
            } else {
                document.documentElement.setAttribute('data-bs-theme', 'light');
            }
            
            updateThemeToggle();
        }
        
        function toggleTheme() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            html.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeToggle();
        }
        
        function updateThemeToggle() {
            const currentTheme = document.documentElement.getAttribute('data-bs-theme');
            const themeToggle = document.getElementById('theme-toggle');
            
            if (themeToggle) {
                const icon = themeToggle.querySelector('i');
                if (currentTheme === 'dark') {
                    icon.classList.remove('bi-moon');
                    icon.classList.add('bi-sun');
                } else {
                    icon.classList.remove('bi-sun');
                    icon.classList.add('bi-moon');
                }
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            initTheme();
            
            // Hide loading after page loads
            window.addEventListener('load', hideLoading);
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                if (anchor.getAttribute('href') === '#' || anchor.getAttribute('data-bs-toggle')) {
                    return;
                }
                
                anchor.addEventListener('click', function (e) {
                    const targetId = this.getAttribute('href');
                    if (targetId === '#' || !targetId) return;
                    
                    const target = document.querySelector(targetId);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Form submission with loading
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    showLoading();
                    
                    // Simulate form processing
                    setTimeout(() => {
                        hideLoading();
                        window.location.href = '/voitures';
                    }, 1000);
                });
}

            // Navbar scroll effect
            let lastScrollTop = 0;
            const navbar = document.querySelector('.navbar');
            
            window.addEventListener('scroll', function() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > lastScrollTop && scrollTop > 100) {
                    // Scrolling down
                    navbar.style.transform = 'translateY(-100%)';
                } else {
                    // Scrolling up
                    navbar.style.transform = 'translateY(0)';
                }
                
                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
                
                // Add background blur when scrolled
                if (scrollTop > 50) {
                    navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                    navbar.style.backdropFilter = 'blur(20px)';
                } else {
                    navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                    navbar.style.backdropFilter = 'blur(20px)';
                }
            });

            // Animation on scroll for feature cards
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all feature cards
            document.querySelectorAll('.feature-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(50px)';
                card.style.transition = 'all 0.6s ease';
                observer.observe(card);
            });

            // Parallax effect for hero section
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const heroSection = document.querySelector('.hero-section');
                const heroContent = document.querySelector('.hero-content');
                const heroCarImage = document.querySelector('.car-image');
                
                if (heroSection && scrolled < window.innerHeight) {
                    const rate = scrolled * -0.5;
                    const rateContent = scrolled * -0.3;
                    const rateCar = scrolled * -0.2;
                    
                    if (heroContent) {
                        heroContent.style.transform = `translateY(${rateContent}px)`;
                    }
                    if (heroCarImage) {
                        heroCarImage.style.transform = `translateY(${rateCar}px)`;
                    }
                }
            });

            // Counter animation for stats
            function animateCounter(element, target) {
                let count = 0;
                const increment = target / 100;
                const timer = setInterval(() => {
                    count += increment;
                    if (count >= target) {
                        element.textContent = target + (element.textContent.includes('+') ? '+' : '');
                        clearInterval(timer);
                    } else {
                        element.textContent = Math.floor(count) + (element.textContent.includes('+') ? '+' : '');
                    }
                }, 20);
            }

            // Animate stats when visible
            const statsObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const statsNumber = entry.target.querySelector('.stats-number');
                        if (statsNumber && !statsNumber.classList.contains('animated')) {
                            statsNumber.classList.add('animated');
                            const text = statsNumber.textContent;
                            if (text.includes('500')) {
                                animateCounter(statsNumber, 500);
                            } else if (text.includes('4.9')) {
                                let count = 0;
                                const timer = setInterval(() => {
                                    count += 0.1;
                                    if (count >= 4.9) {
                                        statsNumber.textContent = '4.9/5';
                                        clearInterval(timer);
                                    } else {
                                        statsNumber.textContent = count.toFixed(1) + '/5';
                                    }
                                }, 50);
                            }
                        }
                    }
                });
            });

            document.querySelectorAll('.stats-card').forEach(card => {
                statsObserver.observe(card);
            });

            // Hover effects for feature badges
            document.querySelectorAll('.feature-badge').forEach(badge => {
                badge.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px) scale(1.05)';
                });
                
                badge.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Add ripple effect to buttons
            function createRipple(event) {
                const button = event.currentTarget;
                const circle = document.createElement('span');
                const diameter = Math.max(button.clientWidth, button.clientHeight);
                const radius = diameter / 2;

                circle.style.width = circle.style.height = `${diameter}px`;
                circle.style.left = `${event.clientX - button.offsetLeft - radius}px`;
                circle.style.top = `${event.clientY - button.offsetTop - radius}px`;
                circle.classList.add('ripple');

                const ripple = button.getElementsByClassName('ripple')[0];
                if (ripple) {
                    ripple.remove();
                }

                button.appendChild(circle);
            }

            // Add ripple styles
            const rippleStyle = document.createElement('style');
            rippleStyle.textContent = `
                .btn {
                    position: relative;
                    overflow: hidden;
                }
                .ripple {
                    position: absolute;
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 600ms linear;
                    background-color: rgba(255, 255, 255, 0.3);
                    pointer-events: none;
                }
                @keyframes ripple {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(rippleStyle);

            // Add ripple to buttons
            document.querySelectorAll('.btn').forEach(button => {
                button.addEventListener('click', createRipple);
            });

            // Form validation and enhancement
            const formSelects = document.querySelectorAll('.form-select');
            formSelects.forEach(select => {
                select.addEventListener('change', function() {
                    this.classList.add('has-value');
                    updateSearchButton();
                });
            });

            function updateSearchButton() {
                const formData = new FormData(form);
                const hasValues = Array.from(formData.values()).some(value => value !== '');
                const searchBtn = document.querySelector('.search-btn');
                
                if (hasValues) {
                    searchBtn.classList.add('active');
                } else {
                    searchBtn.classList.remove('active');
                }
            }

            // Enhanced search button styles
            const searchButtonStyle = document.createElement('style');
            searchButtonStyle.textContent = `
                .search-btn.active {
                    animation: pulse 2s infinite;
                }
                @keyframes pulse {
                    0% { transform: scale(1); }
                    50% { transform: scale(1.02); }
                    100% { transform: scale(1); }
                }
            `;
            document.head.appendChild(searchButtonStyle);

            // Add loading states for form elements
            const formElements = document.querySelectorAll('.form-select');
            formElements.forEach(element => {
                element.addEventListener('focus', function() {
                    this.style.borderColor = 'var(--primary-color)';
                    this.style.boxShadow = '0 0 0 3px rgba(15, 118, 110, 0.1)';
                });
                
                element.addEventListener('blur', function() {
                    this.style.borderColor = 'var(--border-color)';
                    this.style.boxShadow = 'none';
                });
            });

            // Dark mode enhancements
            function updateDarkModeStyles() {
                const isDark = document.documentElement.getAttribute('data-bs-theme') === 'dark';
                const root = document.documentElement;
                
                if (isDark) {
                    root.style.setProperty('--primary-color', '#14b8a6');
                    root.style.setProperty('--primary-light', '#5eead4');
                    root.style.setProperty('--text-primary', '#f9fafb');
                    root.style.setProperty('--text-secondary', '#d1d5db');
                    root.style.setProperty('--bg-light', '#111827');
                    root.style.setProperty('--bg-white', '#1f2937');
                    root.style.setProperty('--border-color', '#374151');
                    
                    // Update navbar background for dark mode
                    const navbar = document.querySelector('.navbar');
                    if (navbar) {
                        navbar.style.background = 'rgba(31, 41, 55, 0.95)';
                    }
                } else {
                    root.style.setProperty('--primary-color', '#0f766e');
                    root.style.setProperty('--primary-light', '#14b8a6');
                    root.style.setProperty('--text-primary', '#1f2937');
                    root.style.setProperty('--text-secondary', '#6b7280');
                    root.style.setProperty('--bg-light', '#f8fafc');
                    root.style.setProperty('--bg-white', '#ffffff');
                    root.style.setProperty('--border-color', '#e5e7eb');
                    
                    // Update navbar background for light mode
                    const navbar = document.querySelector('.navbar');
                    if (navbar) {
                        navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                    }
                }
            }

            // Update dark mode styles initially and on theme change
            updateDarkModeStyles();
            
            const originalToggleTheme = window.toggleTheme;
            window.toggleTheme = function() {
                originalToggleTheme();
                updateDarkModeStyles();
            };

            // Keyboard navigation enhancements
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Tab') {
                    document.body.classList.add('keyboard-navigation');
                }
            });

            document.addEventListener('mousedown', function() {
                document.body.classList.remove('keyboard-navigation');
            });

            // Add focus styles for keyboard navigation
            const keyboardStyle = document.createElement('style');
            keyboardStyle.textContent = `
                .keyboard-navigation .btn:focus,
                .keyboard-navigation .form-select:focus,
                .keyboard-navigation .nav-link:focus {
                    outline: 2px solid var(--primary-color);
                    outline-offset: 2px;
                }
            `;
            document.head.appendChild(keyboardStyle);

            // Performance optimization: Lazy load images
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src || img.src;
                            img.classList.remove('lazy');
                            imageObserver.unobserve(img);
                        }
                    });
                });

                document.querySelectorAll('img[data-src]').forEach(img => {
                    imageObserver.observe(img);
                });
            }

            // Add service worker registration for PWA capabilities
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', () => {
                    navigator.serviceWorker.register('/sw.js')
                        .then((registration) => {
                            console.log('SW registered: ', registration);
                        })
                        .catch((registrationError) => {
                            console.log('SW registration failed: ', registrationError);
                        });
                });
            }
        });

        // Error handling for failed image loads
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('img').forEach(img => {
                img.addEventListener('error', function() {
                    this.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZGRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNHB4IiBmaWxsPSIjOTk5IiBkb21pbmFudC1iYXNlbGluZT0iY2VudHJhbCIgdGV4dC1hbmNob3I9Im1pZGRsZSI+SW1hZ2UgaW5kaXNwb25pYmxlPC90ZXh0Pjwvc3ZnPg==';
                    this.alt = 'Image indisponible';
                });
            });
        });
    </script>
</body>
</html>