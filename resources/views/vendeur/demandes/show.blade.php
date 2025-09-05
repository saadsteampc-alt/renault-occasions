<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RenaultOcaz - Détails de la Demande</title>
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
        .btn-info {
            background: linear-gradient(135deg, #0ea5e9, #38bdf8);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
        }
        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
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
        .table {
            margin-bottom: 0;
        }
        .table th {
            font-weight: 600;
            color: var(--text-primary);
            width: 30%;
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
        .form-text {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }
        .img-fluid {
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }
        .border-primary {
            border: 1px solid var(--primary-color) !important;
        }
        .bg-primary {
            background-color: var(--primary-color) !important;
        }
        .border-success {
            border: 1px solid #10b981 !important;
        }
        .bg-success {
            background-color: #10b981 !important;
        }
        .border-info {
            border: 1px solid #0ea5e9 !important;
        }
        .bg-info {
            background-color: #0ea5e9 !important;
        }
        .text-white {
            color: white !important;
        }
        .text-muted {
            color: var(--text-secondary) !important;
        }
        .mt-3 {
            margin-top: 1rem !important;
        }
        .text-center {
            text-align: center;
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
                max-height: 100px !important;
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
            <h1 class="page-title">Détails de la Demande</h1>
            <div class="header-actions">
                <a href="{{ route('vendeur.demandes.index') }}" class="btn-header btn-secondary">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-person"></i> Informations Client
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <th>Nom:</th>
                                        <td>{{ $demande->client->nom }} {{ $demande->client->prenom }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $demande->client->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Téléphone:</th>
                                        <td>{{ $demande->client->telephone }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <th>Adresse:</th>
                                        <td>{{ $demande->client->adresse ?? 'Non spécifiée' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Inscrit le:</th>
                                        <td>{{ $demande->client->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-clipboard-check"></i> Statut Demande
                    </div>
                    <div class="card-body text-center">
                        <h4>
                            <span class="badge bg-{{ $demande->statut === 'en_attente' ? 'warning' : ($demande->statut === 'confirme' ? 'success' : 'danger') }}">
                                {{ ucfirst($demande->statut) }}
                            </span>
                        </h4>
                        <p class="mt-2">
                            <small class="text-muted">Demande créée le {{ $demande->created_at->format('d/m/Y H:i') }}</small>
                        </p>
                        
                        @if($demande->statut === 'confirme' && $demande->date_visite)
                            <p class="mt-2">
                                <strong>Date visite:</strong><br>
                                {{ $demande->date_visite->format('d/m/Y H:i') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-car-front"></i> Voiture Demandée
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                @if($demande->voiture->image)
                                    <img src="{{ asset('storage/' . $demande->voiture->image) }}" alt="{{ $demande->voiture->marque }}" class="img-fluid" style="max-height: 150px;">
                                @else
                                    <i class="bi bi-car-front" style="font-size: 3rem;"></i>
                                @endif
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table">
                                            <tr>
                                                <th>Marque/Modèle:</th>
                                                <td>{{ $demande->voiture->marque }} {{ $demande->voiture->modele }}</td>
                                            </tr>
                                            <tr>
                                                <th>Année:</th>
                                                <td>{{ $demande->voiture->annee }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kilométrage:</th>
                                                <td>{{ number_format($demande->voiture->kilometrage, 0, ',', ' ') }} km</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table">
                                            <tr>
                                                <th>Prix:</th>
                                                <td><strong>{{ number_format($demande->voiture->prix, 2, ',', ' ') }} €</strong></td>
                                            </tr>
                                            <tr>
                                                <th>Statut:</th>
                                                <td>
                                                    <span class="badge bg-{{ $demande->voiture->statut === 'disponible' ? 'success' : ($demande->voiture->statut === 'reserve' ? 'warning' : 'secondary') }}">
                                                        {{ ucfirst($demande->voiture->statut) }}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Entreprise:</th>
                                                <td>{{ $demande->voiture->entreprise->nom }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($demande->statut === 'en_attente')
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card border-primary">
                        <div class="card-header bg-primary text-white">
                            <i class="bi bi-check-circle"></i> Actions Disponibles
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Confirmer la demande</h5>
                                    <form action="{{ route('vendeur.demandes.confirm', $demande) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="date_visite" class="form-label">Date de visite *</label>
                                            <input type="datetime-local" class="form-control" id="date_visite" name="date_visite" required min="{{ now()->format('Y-m-d\TH:i') }}">
                                        </div>
                                        <button type="submit" class="btn btn-success">
                                            <i class="bi bi-check-circle"></i> Confirmer et programmer la visite
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <h5>Annuler la demande</h5>
                                    <form action="{{ route('vendeur.demandes.cancel', $demande) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="motif_annulation" class="form-label">Motif d'annulation (optionnel)</label>
                                            <textarea class="form-control" id="motif_annulation" name="motif_annulation" rows="2" placeholder="Pourquoi annulez-vous cette demande ?"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette demande ?')">
                                            <i class="bi bi-x-circle"></i> Annuler la demande
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($demande->statut === 'confirme' && !$demande->vente)
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card border-success">
                        <div class="card-header bg-success text-white">
                            <i class="bi bi-cash"></i> Créer une Vente
                        </div>
                        <div class="card-body text-center">
                            <p>La visite a été confirmée. Si le client souhaite acheter la voiture, vous pouvez créer une vente.</p>
                            <a href="{{ route('vendeur.ventes.create', $demande) }}" class="btn btn-success btn-lg">
                                <i class="bi bi-cash"></i> Créer la Vente
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($demande->vente)
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card border-info">
                        <div class="card-header bg-info text-white">
                            <i class="bi bi-cash-stack"></i> Vente Associée
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Montant:</strong> {{ number_format($demande->vente->montant, 2, ',', ' ') }} €</p>
                                    <p><strong>Date:</strong> {{ $demande->vente->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Statut paiement:</strong> 
                                        <span class="badge bg-{{ $demande->vente->statut_paiement === 'paye' ? 'success' : ($demande->vente->statut_paiement === 'annule' ? 'danger' : 'warning') }}">
                                            {{ ucfirst($demande->vente->statut_paiement) }}
                                        </span>
                                    </p>
                                    <a href="{{ route('vendeur.ventes.show', $demande->vente) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Voir la vente
                                    </a>
                                </div>
                            </div>
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