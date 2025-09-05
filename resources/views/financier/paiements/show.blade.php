<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RenaultOcaz - Détails du Paiement</title>
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
        .btn-danger {
            background: linear-gradient(135deg, #dc3545, #e35d6a);
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
        .table {
            margin-bottom: 0;
        }
        .table th {
            font-weight: 600;
            color: var(--text-primary);
            width: 40%;
            border-top: none;
            border-bottom: 1px solid var(--border-color);
        }
        .table td {
            border-top: none;
            border-bottom: 1px solid var(--border-color);
            padding: 0.75rem 0;
        }
        .table tr:last-child th,
        .table tr:last-child td {
            border-bottom: none;
        }
        .badge {
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 12px;
        }
        .form-check {
            margin-bottom: 0.75rem;
        }
        .form-check:last-child {
            margin-bottom: 0;
        }
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .form-check-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(15, 118, 110, 0.25);
        }
        .form-label {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }
        .form-control, .form-select {
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 0.875rem 1rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.1);
        }
        .alert {
            border-radius: 12px;
            border: none;
        }
        .alert-warning {
            background-color: #fef3c7;
            color: #92400e;
            border-left: 4px solid #f59e0b;
        }
        .text-success {
            color: #10b981 !important;
        }
        .text-muted {
            color: var(--text-secondary) !important;
        }
        .text-center {
            text-align: center;
        }
        .mt-2 {
            margin-top: 0.5rem !important;
        }
        .mt-3 {
            margin-top: 1rem !important;
        }
        .mb-0 {
            margin-bottom: 0 !important;
        }
        .mb-3 {
            margin-bottom: 1rem !important;
        }
        code {
            background-color: var(--bg-light);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 0.2rem 0.4rem;
            font-size: 0.875rem;
        }
        .d-flex {
            display: flex;
        }
        .justify-content-between {
            justify-content: space-between;
        }
        .gap-3 {
            gap: 1rem;
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
            .table th {
                width: 50%;
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
                        <a class="nav-link" href="{{ route('financier.dashboard') }}">Tableau de bord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('financier.paiements.index') }}">Paiements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('financier.ventes.index') }}">Ventes</a>
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
            <h1 class="page-title">Détails du Paiement</h1>
            <div class="header-actions">
                <a href="{{ route('financier.paiements.index') }}" class="btn-header btn-secondary">
                    <i class="bi bi-arrow-left"></i> Nouvelle recherche
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-receipt"></i> Informations de la Vente
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <th>Code reçu:</th>
                                        <td><code>{{ $vente->code_recue }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Date de vente:</th>
                                        <td>{{ $vente->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Montant:</th>
                                        <td><strong class="text-success">{{ number_format($vente->montant, 2, ',', ' ') }} €</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Statut actuel:</th>
                                        <td>
                                            <span class="badge bg-{{ $vente->statut_paiement === 'paye' ? 'success' : ($vente->statut_paiement === 'annule' ? 'danger' : 'warning') }}">
                                                {{ ucfirst($vente->statut_paiement) }}
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <th>Vendeur:</th>
                                        <td>{{ $vente->demande->vendeur->name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date validation:</th>
                                        <td>{{ $vente->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mode de paiement:</th>
                                        <td>{{ ucfirst($vente->demande->mode_paiement ?? 'Non spécifié') }}</td>
                                    </tr>
                                </table>
                            </div>
                            <a class="btn btn-primary" href="{{ route('financier.ventes.show', $vente->id) }}">Détails de la Vente</a>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-file-earmark-pdf"></i> Document
                    </div>
                    <div class="card-body text-center">
                        @if($vente->pdf_recue)
                            <i class="bi bi-file-pdf" style="font-size: 3rem; color: #dc3545;"></i>
                            <p class="mt-2">Reçu PDF disponible</p>
                            <a href="{{ asset('storage/' . $vente->pdf_recue) }}" class="btn btn-danger" target="_blank">
                                <i class="bi bi-download"></i> Télécharger
                            </a>
                        @else
                            <i class="bi bi-file-earmark" style="font-size: 3rem; color: #6c757d;"></i>
                            <p class="mt-2">Aucun document PDF</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-person"></i> Informations Client
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Nom:</th>
                                <td>{{ $vente->demande->client->nom }} {{ $vente->demande->client->prenom }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $vente->demande->client->email }}</td>
                            </tr>
                            <tr>
                                <th>Téléphone:</th>
                                <td>{{ $vente->demande->client->telephone }}</td>
                            </tr>
                            <tr>
                                <th>Adresse:</th>
                                <td>{{ $vente->demande->client->adresse ?? 'Non spécifiée' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-car-front"></i> Informations Voiture
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Marque/Modèle:</th>
                                <td>{{ $vente->voiture->marque }} {{ $vente->voiture->modele }}</td>
                            </tr>
                            <tr>
                                <th>Année:</th>
                                <td>{{ $vente->voiture->annee }}</td>
                            </tr>
                            <tr>
                                <th>Kilométrage:</th>
                                <td>{{ number_format($vente->voiture->kilometrage, 0, ',', ' ') }} km</td>
                            </tr>
                            <tr>
                                <th>Statut:</th>
                                <td>
                                    <span class="badge bg-{{ $vente->voiture->statut === 'vendu' ? 'secondary' : 'success' }}">
                                        {{ ucfirst($vente->voiture->statut) }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-check-circle"></i> Validation du Paiement
                    </div>
                    <div class="card-body">
                        <form action="{{ route('financier.paiements.update', $vente) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Action à effectuer:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="statut_paiement" id="paye" value="paye" required>
                                            <label class="form-check-label" for="paye">
                                                <span class="badge bg-success">Valider le paiement</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="statut_paiement" id="annule" value="annule" required>
                                            <label class="form-check-label" for="annule">
                                                <span class="badge bg-danger">Annuler le paiement</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="notes_validation" class="form-label">Notes (optionnel)</label>
                                        <textarea class="form-control" id="notes_validation" name="notes_validation" rows="3" placeholder="Informations supplémentaires sur la validation..."></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle"></i>
                                <strong>Attention:</strong> 
                                <ul class="mb-0">
                                    <li>Valider le paiement marque la vente comme terminée</li>
                                    <li>Annuler le paiement remet la voiture en stock</li>
                                    <li>Cette action est irréversible</li>
                                </ul>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('financier.paiements.index') }}" class="btn btn-secondary">Annuler</a>
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Êtes-vous sûr de vouloir valider cette action ?')">
                                    <i class="bi bi-check-circle"></i> Valider l'action
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