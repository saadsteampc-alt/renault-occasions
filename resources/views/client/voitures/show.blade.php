<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RenaultOcaz - {{ $voiture->marque }} {{ $voiture->modele }}</title>
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
        .btn-outline-primary {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }
        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: white;
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
            background: var(--bg-white);
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem;
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .card-header.bg-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border: none;
            color: white;
        }
        .card-body {
            padding: 1.5rem;
        }
        .img-fluid {
            border-radius: 16px;
            width: 100%;
            height: auto;
        }
        .table {
            margin-bottom: 0;
        }
        .table th {
            font-weight: 600;
            color: var(--text-primary);
            border-top: none;
        }
        .table td {
            vertical-align: middle;
        }
        .table-sm th,
        .table-sm td {
            padding: 0.5rem;
        }
        .badge {
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 12px;
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
        .d-grid {
            display: grid;
        }
        .gap-2 {
            gap: 1rem;
        }
        .text-success {
            color: #10b981 !important;
        }
        .text-muted {
            color: var(--text-secondary) !important;
        }
        .mt-4 {
            margin-top: 1.5rem !important;
        }
        .mb-0 {
            margin-bottom: 0 !important;
        }
        .mb-3 {
            margin-bottom: 1rem !important;
        }
        .p-5 {
            padding: 3rem !important;
        }
        .bg-light {
            background-color: var(--bg-light) !important;
        }
        h2 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-primary);
            margin: 0 0 0.5rem 0;
        }
        h5 {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 1.5rem 0 1rem 0;
        }
        ul {
            padding-left: 1.5rem;
        }
        li {
            margin-bottom: 0.5rem;
        }
        /* Modal */
        .modal-content {
            border-radius: 20px;
            border: 1px solid var(--border-color);
        }
        .modal-header {
            background: var(--bg-white);
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem;
            border-radius: 20px 20px 0 0;
        }
        .modal-title {
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }
        .btn-close {
            padding: 0.5rem;
            margin: -0.5rem -0.5rem -0.5rem auto;
        }
        .modal-body {
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
                border-radius: 12px;
            }
            .p-5 {
                padding: 1.5rem !important;
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
            <h1 class="page-title">{{ $voiture->marque }} {{ $voiture->modele }}</h1>
            <div class="header-actions">
                <a href="{{ route('client.voitures.index') }}" class="btn-header btn-secondary">
                    <i class="bi bi-arrow-left"></i> Retour au catalogue
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if($voiture->image)
                            <img src="{{ asset('storage/' . $voiture->image) }}" class="img-fluid rounded" alt="{{ $voiture->marque }}">
                        @else
                            <div class="text-center p-5 bg-light">
                                <i class="bi bi-car-front" style="font-size: 8rem; color: #6c757d;"></i>
                                <p class="mt-3">Image non disponible</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ $voiture->marque }} {{ $voiture->modele }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h2 class="text-success">{{ number_format($voiture->prix, 2, ',', ' ') }} €</h2>
                            <small class="text-muted">TTC</small>
                        </div>
                        
                        <table class="table table-sm">
                            <tr>
                                <td><strong>Année:</strong></td>
                                <td>{{ $voiture->annee }}</td>
                            </tr>
                            <tr>
                                <td><strong>Kilométrage:</strong></td>
                                <td>{{ number_format($voiture->kilometrage, 0, ',', ' ') }} km</td>
                            </tr>
                            <tr>
                                <td><strong>Entreprise:</strong></td>
                                <td>{{ $voiture->entreprise->nom }}</td>
                            </tr>
                        </table>
                        
                        <div class="alert alert-info">
                            <i class="bi bi-shield-check"></i>
                            <strong>Garantie:</strong> {{ $voiture->garantie ?? '12 mois' }} offerte
                        </div>
                        
                        <div class="d-grid gap-2">
                            <a href="{{ route('client.demande.create', $voiture) }}" class="btn btn-success btn-lg">
                                <i class="bi bi-calendar-check"></i> Je suis intéressé(e)
                            </a>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-info-circle"></i> Caractéristiques
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Description</h5>
                                <p>{{ $voiture->description ?? 'Aucune description disponible pour cette voiture.' }}</p>
                                
                                <h5>État Général</h5>
                                <p>{{ $voiture->etat_diagnostic ?? 'Diagnostic en cours de réalisation.' }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Équipements</h5>
                                <ul>
                                    <li>Direction assistée</li>
                                    <li>Vitres électriques</li>
                                    <li>Système de freinage ABS</li>
                                    <li>Airbags conducteur et passager</li>
                                    <li>Climatisation</li>
                                </ul>
                                
                                <div class="alert alert-warning">
                                    <i class="bi bi-exclamation-triangle"></i>
                                    <strong>Important:</strong> Cette voiture est disponible uniquement sur rendez-vous.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-card-checklist"></i> Diagnostic Complet
                    </div>
                    <div class="card-body">
                        <p>Cette voiture a passé notre diagnostic approfondi de plus de 150 points de contrôle :</p>
                        <div class="row">
                            <div class="col-md-4">
                                <h6><i class="bi bi-engine"></i> Moteur</h6>
                                <p class="text-success">✓ Contrôle effectué et validé</p>
                            </div>
                            <div class="col-md-4">
                                <h6><i class="bi bi-gear"></i> Transmission</h6>
                                <p class="text-success">✓ Boîte de vitesse en bon état</p>
                            </div>
                            <div class="col-md-4">
                                <h6><i class="bi bi-shield"></i> Sécurité</h6>
                                <p class="text-success">✓ Systèmes de sécurité fonctionnels</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Contact -->
    <div class="modal fade" id="contactModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Demande de rappel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom complet *</label>
                            <input type="text" class="form-control" id="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone *</label>
                            <input type="tel" class="form-control" id="telephone" required>
                        </div>
                        <div class="mb-3">
                            <label for="horaire" class="form-label">Préférence horaire</label>
                            <select class="form-select" id="horaire">
                                <option>Matin (9h-12h)</option>
                                <option>Après-midi (14h-18h)</option>
                                <option>Soir (18h-20h)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer la demande</button>
                    </form>
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