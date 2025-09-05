<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RenaultOcaz - Détails de la voiture</title>
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
        .btn-warning {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
        }
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
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
        .btn-danger {
            background: linear-gradient(135deg, #dc2626, #ef4444);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
        }
        .btn-danger:hover {
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
            background: var(--bg-white);
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem;
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--text-primary);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-header.bg-light {
            background-color: rgba(15, 118, 110, 0.05) !important;
        }
        .card-body {
            padding: 1.5rem;
        }
        .img-fluid {
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            width: 100%;
            height: auto;
        }
        .dl-horizontal {
            margin: 0;
        }
        .dl-horizontal dt {
            font-weight: 600;
            color: var(--text-primary);
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        .dl-horizontal dd {
            padding: 0.5rem 0;
            margin-bottom: 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        .badge {
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 12px;
        }
        .text-muted {
            color: var(--text-secondary) !important;
        }
        .text-danger {
            color: #dc2626 !important;
        }
        .text-decoration-line-through {
            text-decoration: line-through !important;
        }
        .font-weight-bold {
            font-weight: 700 !important;
        }
        .d-grid {
            display: grid;
            gap: 1rem;
        }
        .w-100 {
            width: 100%;
        }
        .btn-action {
            border-radius: 12px;
            padding: 1rem 1.5rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            text-decoration: none;
            transition: all 0.3s ease;
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
            .dl-horizontal dt, .dl-horizontal dd {
                padding: 0.375rem 0;
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
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Tableau de bord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.voitures.index') }}">Voitures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">Utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.entreprises.index') }}">Entreprises</a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item me-2">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-link nav-link" style="text-decoration: none; border: none; background: none; padding: 0; margin: 0;">
        Déconnexion
    </button>
</form>
                    </li>
                    <li class="nav-item">
                        <button id="theme-toggle" class="btn btn-link nav-link" type="button" onclick="toggleTheme()" aria-label="Toggle theme">
                            <a href="/profile" class="nav-link"><i class="bi bi-person-circle fs-5"></i></a>
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
            <h1 class="page-title">Détails de la voiture: {{ $voiture->marque }} {{ $voiture->modele }} ({{ $voiture->annee }})</h1>
            <div class="header-actions">
                <a href="{{ route('admin.voitures.edit', $voiture) }}" class="btn-header btn-warning">
                    <i class="bi bi-pencil"></i> Modifier
                </a>
                <form action="{{ route('admin.voitures.destroy', $voiture) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-header btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette voiture ? Cette action est irréversible.')">
                        <i class="bi bi-trash"></i> Supprimer
                    </button>
                </form>
                <a href="{{ route('admin.voitures.index') }}" class="btn-header btn-secondary">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @if($voiture->image)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $voiture->image) }}" alt="{{ $voiture->marque }} {{ $voiture->modele }}" class="img-fluid rounded">
                            </div>
                        @endif
                        
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Informations principales</h5>
                            </div>
                            <div class="card-body">
                                <dl class="dl-horizontal row">
                                    <dt class="col-sm-4">Marque</dt>
                                    <dd class="col-sm-8">{{ $voiture->marque }}</dd>

                                    <dt class="col-sm-4">Modèle</dt>
                                    <dd class="col-sm-8">{{ $voiture->modele }}</dd>

                                    <dt class="col-sm-4">Année</dt>
                                    <dd class="col-sm-8">{{ $voiture->annee }}</dd>

                                    <dt class="col-sm-4">Kilométrage</dt>
                                    <dd class="col-sm-8">{{ number_format($voiture->kilometrage, 0, ',', ' ') }} km</dd>

                                    <dt class="col-sm-4">Prix</dt>
                                    <dd class="col-sm-8">
                                        @if($voiture->en_promotion && $voiture->prix_promotion)
                                            <span class="text-muted text-decoration-line-through me-2">{{ number_format($voiture->prix, 2, ',', ' ') }} €</span>
                                            <span class="text-danger font-weight-bold">{{ number_format($voiture->prix_promotion, 2, ',', ' ') }} €</span>
                                            <span class="badge bg-danger ms-2">Promo !</span>
                                        @else
                                            {{ number_format($voiture->prix, 2, ',', ' ') }} €
                                        @endif
                                    </dd>

                                    @if($voiture->en_promotion && $voiture->date_fin_promotion)
                                        <dt class="col-sm-4">Fin de la promotion</dt>
                                        <dd class="col-sm-8">{{ $voiture->date_fin_promotion->format('d/m/Y') }}</dd>
                                    @endif

                                    <dt class="col-sm-4">Statut</dt>
                                    <dd class="col-sm-8">
                                        @php
                                            $status = [
                                                'disponible' => ['badge' => 'success', 'label' => 'Disponible'],
                                                'en_vente' => ['badge' => 'info', 'label' => 'En vente'],
                                                'vendu' => ['badge' => 'secondary', 'label' => 'Vendu'],
                                                'indisponible' => ['badge' => 'danger', 'label' => 'Indisponible']
                                            ][$voiture->statut];
                                        @endphp
                                        <span class="badge bg-{{ $status['badge'] }}">{{ $status['label'] }}</span>
                                    </dd>

                                    <dt class="col-sm-4">Entreprise</dt>
                                    <dd class="col-sm-8">
                                        <a href="{{ route('admin.entreprises.show', $voiture->entreprise) }}">
                                            {{ $voiture->entreprise->nom }}
                                        </a>
                                    </dd>

                                    <dt class="col-sm-4">Date d'ajout</dt>
                                    <dd class="col-sm-8">{{ $voiture->created_at->format('d/m/Y H:i') }}</dd>

                                    <dt class="col-sm-4">Dernière mise à jour</dt>
                                    <dd class="col-sm-8">{{ $voiture->updated_at->format('d/m/Y H:i') }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        @if($voiture->description)
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Description</h5>
                                </div>
                                <div class="card-body">
                                    {!! nl2br(e($voiture->description)) !!}
                                </div>
                            </div>
                        @endif

                        @if($voiture->etat_diagnostic)
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">État et diagnostic</h5>
                                </div>
                                <div class="card-body">
                                    {!! nl2br(e($voiture->etat_diagnostic)) !!}
                                </div>
                            </div>
                        @endif
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