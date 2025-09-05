<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RenaultOcaz - Modifier la voiture</title>
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
            font-size: 1.5rem;
            color: var(--text-primary);
        }
        .card-body {
            padding: 1.5rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
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
        .form-control-file {
            padding: 0.5rem;
            border: 2px dashed var(--border-color);
            border-radius: 12px;
            background-color: var(--bg-light);
            transition: all 0.2s ease;
        }
        .form-control-file:hover {
            border-color: var(--primary-color);
            background-color: rgba(15, 118, 110, 0.03);
        }
        .form-text {
            font-size: 0.875rem;
            color: var(--text-secondary);
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
        .img-thumbnail {
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }
        .btn-action {
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-submit {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border: none;
            color: white;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        .btn-back {
            background: linear-gradient(135deg, #6b7280, #9ca3af);
            border: none;
            color: white;
        }
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
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
                        <a class="nav-link" href="{{ route('logout') }}">Déconnexion</a>
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
            <h1 class="page-title">Modifier la voiture: {{ $voiture->marque }} {{ $voiture->modele }} ({{ $voiture->annee }})</h1>
            <div class="header-actions">
                <a href="{{ route('admin.voitures.index') }}" class="btn-header btn-secondary">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.voitures.update', $voiture) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="marque" class="form-label">Marque *</label>
                                <input type="text" name="marque" id="marque" class="form-control @error('marque') is-invalid @enderror" value="{{ old('marque', $voiture->marque) }}" required>
                                @error('marque')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="modele" class="form-label">Modèle *</label>
                                <input type="text" name="modele" id="modele" class="form-control @error('modele') is-invalid @enderror" value="{{ old('modele', $voiture->modele) }}" required>
                                @error('modele')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="annee" class="form-label">Année *</label>
                                <input type="number" name="annee" id="annee" class="form-control @error('annee') is-invalid @enderror" value="{{ old('annee', $voiture->annee) }}" min="1900" max="{{ date('Y') + 1 }}" required>
                                @error('annee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kilometrage" class="form-label">Kilométrage *</label>
                                <input type="number" name="kilometrage" id="kilometrage" class="form-control @error('kilometrage') is-invalid @enderror" value="{{ old('kilometrage', $voiture->kilometrage) }}" min="0" required>
                                @error('kilometrage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prix" class="form-label">Prix (€) *</label>
                                <input type="number" step="0.01" name="prix" id="prix" class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix', $voiture->prix) }}" min="0" required>
                                @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="entreprise_id" class="form-label">Entreprise *</label>
                                <select name="entreprise_id" id="entreprise_id" class="form-select @error('entreprise_id') is-invalid @enderror" required>
                                    <option value="">Sélectionnez une entreprise</option>
                                    @foreach($entreprises as $entreprise)
                                        <option value="{{ $entreprise->id }}" {{ (old('entreprise_id', $voiture->entreprise_id) == $entreprise->id) ? 'selected' : '' }}>
                                            {{ $entreprise->nom }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('entreprise_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image" class="form-label">Photo principale</label>
                                @if($voiture->image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $voiture->image) }}" alt="{{ $voiture->marque }} {{ $voiture->modele }}" class="img-thumbnail" style="max-height: 100px;">
                                        <div class="form-check mt-2">
                                            <input type="checkbox" name="remove_image" id="remove_image" class="form-check-input">
                                            <label class="form-check-label" for="remove_image">Supprimer l'image actuelle</label>
                                        </div>
                                    </div>
                                @endif
                                <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
                                <div class="form-text">Formats acceptés: jpg, jpeg, png, gif (max: 2MB)</div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="statut" class="form-label">Statut *</label>
                                <select name="statut" id="statut" class="form-select @error('statut') is-invalid @enderror" required>
                                    <option value="disponible" {{ old('statut', $voiture->statut) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                    <option value="en_vente" {{ old('statut', $voiture->statut) == 'en_vente' ? 'selected' : '' }}>En vente</option>
                                    <option value="vendu" {{ old('statut', $voiture->statut) == 'vendu' ? 'selected' : '' }}>Vendu</option>
                                    <option value="indisponible" {{ old('statut', $voiture->statut) == 'indisponible' ? 'selected' : '' }}>Indisponible</option>
                                </select>
                                @error('statut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $voiture->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="etat_diagnostic" class="form-label">État et diagnostic</label>
                        <textarea name="etat_diagnostic" id="etat_diagnostic" class="form-control @error('etat_diagnostic') is-invalid @enderror" rows="3">{{ old('etat_diagnostic', $voiture->etat_diagnostic) }}</textarea>
                        @error('etat_diagnostic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="promotion" id="promotion" class="form-check-input" {{ old('promotion', $voiture->en_promotion) ? 'checked' : '' }}>
                            <label class="form-check-label" for="promotion">Mettre en promotion</label>
                        </div>
                    </div>

                    <div id="promotion-fields" style="display: {{ old('promotion', $voiture->en_promotion) ? 'block' : 'none' }};">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prix_promotion" class="form-label">Prix promotionnel (€)</label>
                                    <input type="number" step="0.01" name="prix_promotion" id="prix_promotion" class="form-control" value="{{ old('prix_promotion', $voiture->prix_promotion) }}" min="0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_fin_promotion" class="form-label">Date de fin de promotion</label>
                                    <input type="date" name="date_fin_promotion" id="date_fin_promotion" class="form-control" value="{{ old('date_fin_promotion', $voiture->date_fin_promotion ? $voiture->date_fin_promotion->format('Y-m-d') : '') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn-action btn-submit">
                            <i class="bi bi-save"></i> Mettre à jour
                        </button>
                        <a href="{{ route('admin.voitures.index') }}" class="btn-action btn-back">
                            <i class="bi bi-arrow-left"></i> Annuler
                        </a>
                    </div>
                </form>
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
        // Script pour gérer l'affichage conditionnel des champs de promotion
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
            
            const promotionCheckbox = document.getElementById('promotion');
            const promotionFields = document.getElementById('promotion-fields');
            
            function togglePromotionFields() {
                if (promotionCheckbox.checked) {
                    promotionFields.style.display = 'block';
                } else {
                    promotionFields.style.display = 'none';
                }
            }
            
            if (promotionCheckbox) {
                promotionCheckbox.addEventListener('change', togglePromotionFields);
            }
            
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