<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RenaultOcaz - Mes Ventes</title>
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
        .btn-info {
            background: linear-gradient(135deg, #0ea5e9, #38bdf8);
            border: none;
            border-radius: 12px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
            font-size: 0.875rem;
        }
        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        .btn-primary {
            background: linear-gradient(135deg, #10b981, #34d399);
            border: none;
            border-radius: 12px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
            font-size: 0.875rem;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
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
        .card-body {
            padding: 1.5rem;
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
            margin-bottom: 0.5rem;
        }
        .btn-group .btn {
            margin-right: 0.25rem;
        }
        .btn-group .btn:last-child {
            margin-right: 0;
        }
        .table {
            margin-bottom: 0;
        }
        .table th {
            font-weight: 600;
            color: var(--text-primary);
            border-top: none;
            background-color: rgba(15, 118, 110, 0.05);
        }
        .table td {
            vertical-align: middle;
        }
        .table-striped > tbody > tr:nth-of-type(odd) > * {
            --bs-table-accent-bg: rgba(15, 118, 110, 0.03);
            color: var(--bs-table-striped-color);
        }
        .badge {
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 12px;
        }
        .display-6 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 0.5rem 0;
        }
        h5 {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .text-muted {
            color: var(--text-secondary) !important;
        }
        .text-center {
            text-align: center;
        }
        .table-responsive {
            border-radius: 16px;
            overflow: hidden;
        }
        /* Pagination */
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
        .d-flex {
            display: flex;
        }
        .justify-content-center {
            justify-content: center;
        }
        .mb-3 {
            margin-bottom: 1rem !important;
        }
        .g-3 {
            --bs-gutter-x: 1rem;
        }
        .g-3 > * {
            padding-right: calc(var(--bs-gutter-x) * 0.5);
            padding-left: calc(var(--bs-gutter-x) * 0.5);
        }
        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding-top: 80px;
            }
            .page-title {
                font-size: 1.75rem;
            }
            .table-responsive {
                font-size: 0.875rem;
            }
            .display-6 {
                font-size: 1.25rem;
            }
            .g-3 {
                --bs-gutter-x: 0.5rem;
            }
            .col-md-3, .col-md-2, .col-md-1 {
                padding-bottom: 0.5rem;
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
                        <a class="nav-link" href="{{ route('vendeur.dashboard') }}">Tableau de bord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vendeur.demandes.index') }}">Demandes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vendeur.ventes.index') }}">Ventes</a>
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
                     <a href="/profile" class="nav-link"><i class="bi bi-person-circle fs-5"></i></a>
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
        <h1 class="page-title">Mes Ventes</h1>
        
        <div class="row mb-3">
            <div class="col-md-12">
                <form method="GET" action="{{ route('vendeur.ventes.index') }}" class="row g-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="search" placeholder="Rechercher client/voiture..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="statut" class="form-select">
                            <option value="">Tous statuts</option>
                            <option value="en_attente" {{ request('statut') == 'en_attente' ? 'selected' : '' }}>En attente</option>
                            <option value="paye" {{ request('statut') == 'paye' ? 'selected' : '' }}>Payé</option>
                            <option value="annule" {{ request('statut') == 'annule' ? 'selected' : '' }}>Annulé</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="date" class="form-control" name="date_debut" value="{{ request('date_debut') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="date" class="form-control" name="date_fin" value="{{ request('date_fin') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="montant_min" placeholder="Montant min" value="{{ request('montant_min') }}">
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-3">
                                <h5>Total Ventes</h5>
                                <p class="display-6">{{ $ventes->count() }}</p>
                            </div>
                            <div class="col-md-3">
                                <h5>Montant Total</h5>
                                <p class="display-6">{{ number_format($ventes->sum('montant'), 2, ',', ' ') }} €</p>
                            </div>
                            <div class="col-md-3">
                                <h5>Payé</h5>
                                <p class="display-6">{{ $ventes->where('statut_paiement', 'paye')->count() }}</p>
                            </div>
                            <div class="col-md-3">
                                <h5>En attente</h5>
                                <p class="display-6">{{ $ventes->where('statut_paiement', 'en_attente')->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Client</th>
                        <th>Voiture</th>
                        <th>Montant</th>
                        <th>Code Reçu</th>
                        <th>Statut Paiement</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ventes as $vente)
                        <tr>
                            <td>{{ $vente->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <strong>{{ $vente->demande->client->nom }} {{ $vente->demande->client->prenom }}</strong><br>
                                <small class="text-muted">{{ $vente->demande->client->email }}</small>
                            </td>
                            <td>
                                {{ $vente->voiture->marque }} {{ $vente->voiture->modele }}<br>
                                <small class="text-muted">{{ $vente->voiture->annee }}</small>
                            </td>
                            <td><strong>{{ number_format($vente->montant, 2, ',', ' ') }} €</strong></td>
                            <td><code>{{ $vente->code_recue }}</code></td>
                            <td>
                                <span class="badge bg-{{ $vente->statut_paiement === 'paye' ? 'success' : ($vente->statut_paiement === 'annule' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($vente->statut_paiement) }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('vendeur.ventes.show', $vente) }}" class="btn btn-info btn-sm" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    @if($vente->pdf_recue)
                                        <a href="{{ asset('storage/' . $vente->pdf_recue) }}" class="btn btn-primary btn-sm" title="Télécharger PDF" target="_blank">
                                            <i class="bi bi-file-pdf"></i>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Aucune vente trouvée</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $ventes->links() }}
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