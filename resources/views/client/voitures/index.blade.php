<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RenaultOcaz - Nos Voitures d'Occasion</title>
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
            padding-top: 110px; /* Space for fixed navbar */
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
        /* Main Content */
        .container-main {
            padding: 2rem 0;
        }
        .card {
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-title {
            font-weight: 700;
            color: var(--text-primary);
        }
        .badge {
            font-weight: 600;
        }
        .pagination {
            --bs-pagination-color: var(--text-primary);
            --bs-pagination-bg: var(--bg-white);
            --bs-pagination-border-color: var(--border-color);
            --bs-pagination-hover-color: var(--primary-color);
            --bs-pagination-hover-bg: rgba(15, 118, 110, 0.1);
            --bs-pagination-hover-border-color: var(--primary-color);
            --bs-pagination-focus-color: var(--primary-color);
            --bs-pagination-focus-bg: rgba(15, 118, 110, 0.1);
            --bs-pagination-focus-box-shadow: 0 0 0 0.25rem rgba(15, 118, 110, 0.25);
            --bs-pagination-active-color: #fff;
            --bs-pagination-active-bg: var(--primary-color);
            --bs-pagination-active-border-color: var(--primary-color);
            --bs-pagination-disabled-color: var(--text-secondary);
            --bs-pagination-disabled-bg: var(--bg-light);
            --bs-pagination-disabled-border-color: var(--border-color);
        }
        .dropdown-menu {
            border-radius: 12px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-md);
        }
        .dropdown-item {
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .dropdown-item:hover {
            background-color: rgba(15, 118, 110, 0.1);
            color: var(--primary-color);
        }
        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding-top: 80px;
            }
            .card-img-top {
                height: 150px;
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
                        <a class="nav-link" href="{{ route('client.voitures.index') }}">Nos véhicules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item me-2">
                        <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="btn btn-primary" href="{{ route('register') }}">S'inscrire</a>
                    </li>
                    <li class="nav-item">
                       
                    </li>
                </ul>
            </div>
            <!-- Mobile Navigation Toggle -->
            <div class="d-flex align-items-center d-lg-none">
                <button id="theme-toggle-mobile" class="btn btn-link nav-link me-2" type="button" onclick="toggleTheme()" aria-label="Toggle theme">
                    <i class="bi bi-moon fs-5"></i>
                </button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>

    <div class="container container-main">
        <div class="row mb-4">
            <div class="col-md-12">
                <form method="GET" action="{{ route('client.voitures.index') }}" class="row g-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="search" placeholder="Rechercher..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="marque" class="form-select">
                            <option value="">Toutes marques</option>
                            @foreach($marques as $marque)
                                <option value="{{ $marque }}" {{ request('marque') == $marque ? 'selected' : '' }}>{{ $marque }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="annee_min" placeholder="Année min" value="{{ request('annee_min') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="prix_max" placeholder="Prix max" value="{{ request('prix_max') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="kilometrage_max" placeholder="Km max" value="{{ request('kilometrage_max') }}">
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <h4>{{ $voitures->total() }} voiture{{ $voitures->total() > 1 ? 's' : '' }} disponible{{ $voitures->total() > 1 ? 's' : '' }}</h4>
            </div>
            <div class="col-md-6 text-end">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        Trier par
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'prix_asc']) }}">Prix croissant</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'prix_desc']) }}">Prix décroissant</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'annee_desc']) }}">Plus récent</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'kilometrage_asc']) }}">Moins de km</a></li>
                    </ul>
                </div>
            </div>
        </div>

        @if($voitures->count() > 0)
            <div class="row">
                @foreach($voitures as $voiture)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            @if($voiture->image)
                                <img src="{{ asset('storage/' . $voiture->image) }}" class="card-img-top" alt="{{ $voiture->marque }}">
                            @else
                                <div class="text-center p-4 bg-light">
                                    <i class="bi bi-car-front" style="font-size: 4rem; color: #6c757d;"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $voiture->marque }} {{ $voiture->modele }}</h5>
                                <div class="mb-2">
                                    <span class="badge bg-primary">{{ $voiture->annee }}</span>
                                    <span class="badge bg-secondary">{{ number_format($voiture->kilometrage, 0, ',', ' ') }} km</span>
                                </div>
                                <p class="card-text">{{ Str::limit($voiture->description, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <strong class="text-success fs-5">{{ number_format($voiture->prix, 2, ',', ' ') }} €</strong>
                                    <small class="text-muted">TTC</small>
                                </div>
                            </div>
                            <div class="card-footer bg-white">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('client.voiture.show', $voiture) }}" class="btn btn-primary">
                                        <i class="bi bi-eye"></i> Voir détails
                                    </a>
                                    <a href="{{ route('client.demande.create', $voiture) }}" class="btn btn-outline-success">
                                        <i class="bi bi-heart"></i> Je suis intéressé(e)
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="d-flex justify-content-center">
                {{ $voitures->appends(request()->query())->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-car-front" style="font-size: 5rem; color: #6c757d;"></i>
                <h3 class="mt-3">Aucune voiture disponible</h3>
                <p class="text-muted">Nous n'avons pas trouvé de voitures correspondant à vos critères de recherche.</p>
                <a href="{{ route('client.voitures.index') }}" class="btn btn-primary">Voir toutes les voitures</a>
            </div>
        @endif
    </div>

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
            // Form submission with loading
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    showLoading();
                });
            });
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
        });
    </script>
</body>
</html>