<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RenaultOcaz - Connexion</title>
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
        .btn-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .btn-link:hover {
            color: var(--primary-dark);
            background-color: rgba(15, 118, 110, 0.1);
            text-decoration: none;
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
        /* Login Section */
        .login-section {
            min-height: calc(100vh - 110px);
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }
        .login-card {
            background: var(--bg-white);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border-color);
            max-width: 500px;
            margin: 0 auto;
        }
        .login-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 2rem;
            text-align: center;
            color: var(--text-primary);
        }
        .login-btn {
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
        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
        }
        .forgot-password {
            text-align: center;
            margin-top: 1rem;
        }
        .register-link {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
        }
        .register-link a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding-top: 80px;
            }
            .login-card {
                padding: 2rem;
                margin: 0 1rem;
            }
            .login-title {
                font-size: 1.75rem;
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
                        <a class="nav-link" href="/contact">Contact</a>
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

    <!-- Login Section -->
    <section class="login-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="login-card">
                        <h2 class="login-title">{{ __('Connexion') }}</h2>
                        
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="form-label">{{ __('Adresse Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>

                            <div class="mb-0">
                                <button type="submit" class="login-btn">
                                    {{ __('Se connecter') }}
                                </button>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="forgot-password">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                </div>
                            @endif

                            <div class="register-link">
                                <p>{{ __('Vous n\'avez pas de compte ?') }} <a href="{{ route('register') }}">{{ __('S\'inscrire') }}</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

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