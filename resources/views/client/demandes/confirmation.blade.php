<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RenaultOcaz - Demande envoyée</title>
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
        .btn-outline-success {
            border: 2px solid #10b981;
            color: #10b981;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-outline-success:hover {
            background: #10b981;
            transform: translateY(-2px);
        }
        /* Main Content */
        .container-main {
            padding: 2rem 0;
        }
        .page-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 2rem;
            color: var(--text-primary);
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
            text-align: center;
        }
        .card-header.bg-success {
            background: linear-gradient(135deg, #10b981, #34d399);
            border: none;
        }
        .card-body {
            padding: 1.5rem;
        }
        .card-footer {
            background: var(--bg-white);
            border-top: 1px solid var(--border-color);
            padding: 1rem 1.5rem;
            text-align: center;
        }
        .alert {
            border-radius: 12px;
            border: none;
        }
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border-left: 4px solid #10b981;
        }
        .alert-info {
            background-color: #dbeafe;
            color: #1e40af;
            border-left: 4px solid #3b82f6;
        }
        .alert-heading {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .border-primary {
            border: 1px solid var(--primary-color) !important;
        }
        .border-info {
            border: 1px solid #3b82f6 !important;
        }
        .badge {
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 12px;
        }
        .badge.bg-warning {
            color: #92400e;
        }
        .accordion-button {
            font-weight: 600;
            color: var(--text-primary);
        }
        .accordion-button:not(.collapsed) {
            color: var(--primary-color);
            background-color: rgba(15, 118, 110, 0.03);
        }
        .accordion-body {
            color: var(--text-secondary);
        }
        .d-grid {
            display: grid;
        }
        .gap-2 {
            gap: 1rem;
        }
        .text-center {
            text-align: center;
        }
        .text-start {
            text-align: start;
        }
        .text-muted {
            color: var(--text-secondary) !important;
        }
        .fw-bold {
            font-weight: 700 !important;
        }
        .mt-3 {
            margin-top: 1rem !important;
        }
        .mb-0 {
            margin-bottom: 0 !important;
        }
        .mb-4 {
            margin-bottom: 1.5rem !important;
        }
        .mb-5 {
            margin-bottom: 3rem !important;
        }
        .pt-3 {
            padding-top: 1rem !important;
        }
        .pb-3 {
            padding-bottom: 1rem !important;
        }
        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding-top: 80px;
            }
            .page-title {
                font-size: 1.75rem;
            }
            .card-header {
                font-size: 1.25rem;
            }
            .d-grid .btn {
                margin-bottom: 0.75rem;
            }
            .d-grid .btn:last-child {
                margin-bottom: 0;
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white text-center">
                        <i class="bi bi-check-circle" style="font-size: 3rem;"></i>
                        <h3 class="mt-3 mb-0">Demande envoyée avec succès !</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="alert alert-success">
                            <h4 class="alert-heading">Merci {{ $demande->client->prenom }} !</h4>
                            <p>Votre demande d'intérêt pour la {{ $demande->voiture->marque }} {{ $demande->voiture->modele }} a été enregistrée.</p>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <div class="card border-primary h-100">
                                    <div class="card-body">
                                        <h5><i class="bi bi-calendar-check"></i> Prochaines étapes</h5>
                                        <ol class="text-start">
                                            <li>Un conseiller vous contactera sous 24h</li>
                                            <li>Programmation d'un rendez-vous d'essai</li>
                                            <li>Visite personnalisée de la voiture</li>
                                            <li>Finalisation de l'achat si vous le souhaitez</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card border-info h-100">
                                    <div class="card-body">
                                        <h5><i class="bi bi-info-circle"></i> Informations</h5>
                                        <ul class="text-start">
                                            <li><strong>Demande n°:</strong> #{{ $demande->id }}</li>
                                            <li><strong>Date:</strong> {{ $demande->created_at->format('d/m/Y H:i') }}</li>
                                            <li><strong>Statut:</strong> 
                                                <span class="badge bg-warning">En attente de confirmation</span>
                                            </li>
                                            <li><strong>Voiture réservée:</strong> Oui (48h)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="alert alert-info mb-4">
                            <i class="bi bi-clock"></i>
                            <strong>Temps de réponse:</strong> Notre équipe commerciale vous contactera dans les plus brefs délais (maximum 24h ouvrées).
                        </div>
                        
                        <div class="d-grid gap-2">
                            <a href="{{ route('client.voitures.index') }}" class="btn btn-primary btn-lg">
                                <i class="bi bi-search"></i> Continuer ma recherche
                            </a>
                            <a href="tel:+33123456789" class="btn btn-outline-success">
                                <i class="bi bi-telephone"></i> Nous appeler maintenant
                            </a>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <small class="text-muted">
                            Besoin d'aide ? Contactez-nous au <strong>01 23 45 67 89</strong>
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-question-circle"></i> Questions fréquentes
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                        Combien de temps la voiture est-elle réservée ?
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        La voiture est réservée pendant 48 heures. Si vous ne confirmez pas la visite dans ce délai, elle redevient disponible pour les autres clients.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                        Puis-je annuler ma demande ?
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Oui, vous pouvez annuler votre demande à tout moment en contactant notre service client. La voiture redeviendra alors disponible.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                        Quels documents dois-je apporter pour l'essai ?
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Pour l'essai, veuillez apporter votre permis de conduire et un justificatif de domicile de moins de 3 mois.
                                    </div>
                                </div>
                            </div>
                        </div>
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
        });
    </script>
</body>
</html>