<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RenaultOcaz - Détails de la Vente #{{ $vente->id }}</title>
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
        .card-body {
            padding: 1.5rem;
        }
        .table-borderless th,
        .table-borderless td {
            padding: 0.5rem 0;
            border: none;
        }
        .table-borderless th {
            font-weight: 600;
            color: var(--text-primary);
            width: 40%;
        }
        .table-borderless td {
            font-weight: 500;
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
        .form-text {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }
        .badge {
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 12px;
        }
        .img-thumbnail {
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }
        .text-muted {
            color: var(--text-secondary) !important;
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
        .mb-4 {
            margin-bottom: 1.5rem !important;
        }
        .d-flex {
            display: flex;
        }
        .me-3 {
            margin-right: 1rem !important;
        }
        code {
            background-color: var(--bg-light);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 0.2rem 0.4rem;
            font-size: 0.875rem;
        }
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            border-radius: 8px;
        }
        .btn-outline-primary {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }
        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: white;
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
            .img-thumbnail {
                max-width: 100px !important;
                max-height: 75px !important;
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
            <h1 class="page-title">Détails de la Vente #{{ $vente->id }}</h1>
            <div class="header-actions">
                <a href="{{ route('financier.ventes.index') }}" class="btn-header btn-secondary">
                    <i class="bi bi-arrow-left"></i> Retour à la liste
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="bi bi-receipt"></i> Détails de la Vente
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th style="width: 40%;">Référence:</th>
                                <td>#{{ $vente->id }}</td>
                            </tr>
                            <tr>
                                <th>Code reçu:</th>
                                <td><code>{{ $vente->code_recue }}</code></td>
                            </tr>
                            <tr>
                                <th>Date de vente:</th>
                                <td>{{ $vente->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Montant total:</th>
                                <td><strong>{{ number_format($vente->montant, 2, ',', ' ') }} €</strong></td>
                            </tr>
                            <tr>
                                <th>Statut du paiement:</th>
                                <td>
                                    <span class="badge bg-{{ $vente->statut_paiement === 'paye' ? 'success' : ($vente->statut_paiement === 'annule' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($vente->statut_paiement) }}
                                    </span>
                                </td>
                            </tr>
                            @if($vente->financier)
                            <tr>
                                <th>Traité par:</th>
                                <td>{{ $vente->financier->name }}</td>
                            </tr>
                            @endif
                            @if($vente->pdf_recue)
                            <tr>
                                <th>Reçu:</th>
                                <td>
                                    <a href="{{ asset('storage/' . $vente->pdf_recue) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-download"></i> Télécharger le reçu
                                    </a>
                                </td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-credit-card"></i> Mise à jour du paiement
                    </div>
                    <div class="card-body">
                        <form action="{{ route('financier.ventes.updatePaiement', $vente) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="statut_paiement" class="form-label">Statut du paiement</label>
                                <select name="statut_paiement" id="statut_paiement" class="form-select" required>
                                    <option value="en_attente" {{ $vente->statut_paiement === 'en_attente' ? 'selected' : '' }}>En attente</option>
                                    <option value="paye" {{ $vente->statut_paiement === 'paye' ? 'selected' : '' }}>Payé</option>
                                    <option value="annule" {{ $vente->statut_paiement === 'annule' ? 'selected' : '' }}>Annulé</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="recu_paiement" class="form-label">Téléverser un reçu (PDF, JPG, PNG - max 2MB)</label>
                                <input type="file" class="form-control" id="recu_paiement" name="recu_paiement" accept=".pdf,.jpg,.jpeg,.png">
                                <div class="form-text">Uniquement nécessaire pour marquer comme payé.</div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Mettre à jour
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="bi bi-car-front"></i> Véhicule
                    </div>
                    <div class="card-body">
                        @if($vente->voiture)
                            <div class="d-flex">
                                @if($vente->voiture->image)
                                    <img src="{{ asset('storage/' . $vente->voiture->image) }}" 
                                         alt="{{ $vente->voiture->marque }} {{ $vente->voiture->modele }}" 
                                         class="img-thumbnail me-3" 
                                         style="max-width: 150px; max-height: 100px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center me-3" style="width: 150px; height: 100px; border-radius: 12px;">
                                        <i class="bi bi-car-front text-muted" style="font-size: 2rem;"></i>
                                    </div>
                                @endif
                                <div>
                                    <h5>{{ $vente->voiture->marque }} {{ $vente->voiture->modele }}</h5>
                                    <p class="mb-1">
                                        {{ $vente->voiture->annee }} - 
                                        {{ number_format($vente->voiture->kilometrage, 0, ',', ' ') }} km
                                    </p>
                                    <p class="mb-0">
                                        <strong>Prix:</strong> {{ number_format($vente->voiture->prix, 0, ',', ' ') }} €
                                    </p>
                                </div>
                            </div>
                        @else
                            <p class="text-muted">Aucun véhicule associé</p>
                        @endif
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-person"></i> Client
                    </div>
                    <div class="card-body">
                        @if($vente->demande && $vente->demande->client)
                            <h5>{{ $vente->demande->client->prenom }} {{ $vente->demande->client->nom }}</h5>
                            <p class="mb-1">
                                <i class="bi bi-envelope"></i> {{ $vente->demande->client->email }}
                            </p>
                            <p class="mb-1">
                                <i class="bi bi-telephone"></i> {{ $vente->demande->client->telephone }}
                            </p>
                            <p class="mb-0">
                                <i class="bi bi-geo-alt"></i> {{ $vente->demande->client->adresse }}
                            </p>
                        @else
                            <p class="text-muted">Aucune information client disponible</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if($vente->demande && $vente->demande->commentaire)
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-chat-dots"></i> Notes et commentaires
                    </div>
                    <div class="card-body">
                        <p>{{ $vente->demande->commentaire }}</p>
                    </div>
                </div>
            </div>
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