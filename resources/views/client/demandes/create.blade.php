<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RenaultOcaz - Intérêt pour {{ $voiture->marque }} {{ $voiture->modele }}</title>
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
        .btn-secondary {
            background: linear-gradient(135deg, #6b7280, #9ca3af);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
        }
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        .btn-success {
            background: linear-gradient(135deg, #10b981, #34d399);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
        }
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        /* Main Content */
        .container-main {
            padding: 2rem 0;
        }
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .page-title {
            font-size: 2rem;
            font-weight: 800;
            margin: 0;
            color: var(--text-primary);
        }
        .header-actions {
            display: flex;
            gap: 0.75rem;
        }
        .btn-header {
            border-radius: 12px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-header .bi {
            font-size: 1rem;
        }
        .card {
            background: var(--bg-white);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-md);
            margin-bottom: 2rem;
        }
        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem;
            font-weight: 700;
            font-size: 1.5rem;
            color: white;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .card-header.bg-success {
            background: linear-gradient(135deg, #10b981, #34d399);
        }
        .card-body {
            padding: 1.5rem;
        }
        .form-label {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
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
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .form-check-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(15, 118, 110, 0.25);
        }
        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875em;
            color: #dc3545;
        }
        .is-invalid {
            border-color: #dc3545 !important;
        }
        .is-invalid:focus {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25) !important;
        }
        .alert {
            border-radius: 12px;
            border: none;
        }
        .alert-info {
            background-color: #dbeafe;
            color: #1e40af;
            border-left: 4px solid #3b82f6;
        }
        .alert-warning {
            background-color: #fef3c7;
            color: #92400e;
            border-left: 4px solid #f59e0b;
        }
        .img-fluid {
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }
        .img-thumbnail {
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }
        .text-muted {
            color: var(--text-secondary) !important;
        }
        .fw-bold {
            font-weight: 700 !important;
        }
        .d-flex {
            display: flex;
        }
        .justify-content-between {
            justify-content: space-between;
        }
        .gap-2 {
            gap: 1rem;
        }
        .mb-0 {
            margin-bottom: 0 !important;
        }
        .mb-1 {
            margin-bottom: 0.25rem !important;
        }
        .mb-3 {
            margin-bottom: 1rem !important;
        }
        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding-top: 80px;
            }
            .page-title {
                font-size: 1.75rem;
            }
            .header-actions {
                width: 100%;
                justify-content: center;
            }
            .img-fluid {
                max-height: 80px !important;
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
                        <a class="nav-link" href="{{ route('profile.show') }}">Mon profil</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="btn btn-primary" href="{{ route('logout') }}">Déconnexion</a>
                    </li>
                    <li class="nav-item">
                        <button id="theme-toggle" class="btn btn-link nav-link" type="button" onclick="toggleTheme()" aria-label="Toggle theme">
                            <i class="bi bi-moon fs-5"></i>
                        </button>
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
        <div class="page-header">
            <h1 class="page-title">Intérêt pour {{ $voiture->marque }} {{ $voiture->modele }}</h1>
            <div class="header-actions">
                <a href="{{ route('client.voiture.show', $voiture) }}" class="btn-header btn-secondary">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0"><i class="bi bi-heart"></i> Je suis intéressé(e) par cette voiture</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    @if($voiture->image)
                                        <img src="{{ asset('storage/' . $voiture->image) }}" class="img-fluid rounded" alt="{{ $voiture->marque }}" style="max-height: 100px;">
                                    @else
                                        <i class="bi bi-car-front" style="font-size: 3rem;"></i>
                                    @endif
                                </div>
                                <div class="col-md-9">
                                    <h5>{{ $voiture->marque }} {{ $voiture->modele }}</h5>
                                    <p class="mb-1">{{ $voiture->annee }} • {{ number_format($voiture->kilometrage, 0, ',', ' ') }} km</p>
                                    <p class="mb-0"><strong>{{ number_format($voiture->prix, 2, ',', ' ') }} €</strong></p>
                                </div>
                            </div>
                        </div>
                        
                        <form action="{{ route('client.demande.store', $voiture) }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom *</label>
                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                               id="nom" name="nom" value="{{ old('nom') }}" required>
                                        @error('nom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="prenom" class="form-label">Prénom *</label>
                                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" 
                                               id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                                        @error('prenom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                               id="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="telephone" class="form-label">Téléphone *</label>
                                        <input type="tel" class="form-control @error('telephone') is-invalid @enderror" 
                                               id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                                        @error('telephone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse</label>
                                <textarea class="form-control @error('adresse') is-invalid @enderror" 
                                          id="adresse" name="adresse" rows="2">{{ old('adresse') }}</textarea>
                                @error('adresse')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Préférences de contact</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="contact_telephone" name="contact_telephone" value="1" checked>
                                        <label class="form-check-label" for="contact_telephone">Téléphone</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="contact_email" name="contact_email" value="1" checked>
                                        <label class="form-check-label" for="contact_email">Email</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="contact_sms" name="contact_sms" value="1">
                                        <label class="form-check-label" for="contact_sms">SMS</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Message (optionnel)</label>
                                <textarea class="form-control" id="message" name="message" rows="3" 
                                          placeholder="Avez-vous des questions spécifiques sur cette voiture ?">{{ old('message') }}</textarea>
                            </div>
                            
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle"></i>
                                <strong>Important:</strong>
                                <ul class="mb-0">
                                    <li>En soumettant cette demande, vous acceptez d'être contacté(e) par notre équipe commerciale</li>
                                    <li>Cette voiture sera réservée pendant 48h pour votre visite</li>
                                    <li>Vos informations seront utilisées uniquement dans le cadre de cette demande</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('client.voiture.show', $voiture) }}" class="btn btn-secondary">Annuler</a>
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-send"></i> Envoyer ma demande
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
            
            // Form submission with loading
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    showLoading();
                });
            });
        });
    </script>
</body>
</html>