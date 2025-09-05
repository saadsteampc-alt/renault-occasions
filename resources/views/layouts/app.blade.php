<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="Découvrez les meilleures occasions Renault avec RenaultOcaz. Des véhicules d'occasion vérifiés et garantis au meilleur prix.">

    <title>@yield('title', 'RenaultOcaz - Occasions Premium')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/css/theme.css'])
    
    <!-- Theme Color for Mobile Browsers -->
    <meta name="theme-color" content="#000000" media="(prefers-color-scheme: dark)">
    <meta name="theme-color" content="#ffffff" media="(prefers-color-scheme: light)">
</head>
<body class="bg-light">
    <!-- Loading Overlay -->
    <div id="loading-overlay" class="loading-overlay">
        <div class="loading-spinner"></div>
    </div>
    
    <div id="app" class="page">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                    <span class="text-primary">Renault</span><span class="text-dark">Ocaz</span>
                </a>
                
                <div class="d-flex align-items-center gap-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.show') }}" title="Mon profil">
                            <i class="bi bi-person-circle fs-5"></i>
                        </a>
                    </li>
                    <!-- Mobile Menu Toggle -->
                    <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                
                <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvas" aria-labelledby="navbarOffcanvasLabel">
                    <div class="offcanvas-header border-bottom">
                        <h5 class="offcanvas-title" id="navbarOffcanvasLabel">Menu</h5>
                        <div class="d-flex align-items-center gap-3">
                            <!-- Theme Toggle Button for Mobile -->
                            <a class="nav-link me-2" href="{{ route('profile.show') }}" title="Mon profil">
                            <i class="bi bi-person-circle fs-5"></i>
                        </a>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="offcanvas-body d-flex flex-column">
                        <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('client.voitures.index') }}">
                                    <i class="bi bi-car-front"></i>
                                    <span>Nos véhicules</span>
                                </a>
                            </li>
                            @auth
                                @if(Auth::user()->role === 'admin')
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
                                            <i class="bi bi-speedometer2"></i>
                                            <span>Tableau de bord</span>
                                        </a>
                                    </li>
                                @elseif(Auth::user()->role === 'vendeur')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('vendeur.dashboard') }}">Tableau de bord</a>
                                    </li>
                                @elseif(Auth::user()->role === 'financier')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('financier.dashboard') }}">Tableau de bord</a>
                                    </li>
                                @endif
                            @endauth
                        </ul>
                        
                        <hr class="d-lg-none my-3">
                        
                        <ul class="navbar-nav ms-auto align-items-lg-center">
                            @guest
                                <li class="nav-item me-2 mb-2 mb-lg-0">
                                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('login') }}">
                                        <i class="bi bi-box-arrow-in-right"></i>
                                        <span>{{ __('Connexion') }}</span>
                                    </a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('register') }}">
                                            <i class="bi bi-person-plus"></i>
                                            <span>{{ __("S'inscrire") }}</span>
                                        </a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="bi bi-person-circle"></i>
                                        <span>{{ Auth::user()->name }}</span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('profile.show') }}">
                                            <i class="bi bi-person"></i>
                                            <span>{{ __('Profile') }}</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        
                                        <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right"></i>
                                            <span>{{ __('Déconnexion') }}</span>
                                        </a>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>

        <!-- Flash Messages -->
        @if(session('success') || session('error') || $errors->any())
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                @if(session('success'))
                    <div class="toast show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-success text-white">
                            <strong class="me-auto">Succès</strong>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body bg-white">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="toast show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-danger text-white">
                            <strong class="me-auto">Erreur</strong>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body bg-white">
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-danger text-white">
                            <strong class="me-auto">Erreur de validation</strong>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body bg-white">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <!-- Footer -->
        <footer class="bg-dark text-white py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <h5 class="text-uppercase fw-bold mb-4">RenaultOcaz</h5>
                        <p class="text-muted">Votre partenaire de confiance pour l'achat de véhicules d'occasion premium.</p>
                        <div class="social-links mt-4">
                            <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <h6 class="text-uppercase fw-bold mb-4">Navigation</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Accueil</a></li>
                            <li class="mb-2"><a href="{{ route('client.voitures.index') }}" class="text-muted text-decoration-none">Nos véhicules</a></li>
                            <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Services</a></li>
                            <li><a href="#" class="text-muted text-decoration-none">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <h6 class="text-uppercase fw-bold mb-4">Aide</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-muted text-decoration-none">FAQ</a></li>
                            <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Mentions légales</a></li>
                            <li class="mb-2"><a href="#" class="text-muted text-decoration-none">CGV</a></li>
                            <li><a href="#" class="text-muted text-decoration-none">Politique de confidentialité</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <h6 class="text-uppercase fw-bold mb-4">Newsletter</h6>
                        <p class="text-muted">Abonnez-vous pour recevoir nos offres exclusives.</p>
                        <form class="mt-3">
                            <div class="input-group">
                                <input type="email" class="form-control bg-dark text-white border-secondary" placeholder="Votre email" aria-label="Votre email" aria-describedby="button-subscribe">
                                <button class="btn btn-primary" type="button" id="button-subscribe">S'inscrire</button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="my-4 border-secondary">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <p class="mb-0 text-muted small">&copy; {{ date('Y') }} RenaultOcaz. Tous droits réservés.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <img src="{{ asset('images/payment-methods.png') }}" alt="Moyens de paiement" class="img-fluid" style="max-height: 30px;">
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Back to Top Button -->
        <button id="back-to-top" class="back-to-top" aria-label="Back to top">
            <i class="bi bi-arrow-up"></i>
        </button>
    </div>
    
    <!-- Loading Script -->
    <script>
        // Show loading overlay when navigating away
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('a:not([target="_blank"]):not([href^="#"]):not([href^="javascript:"]):not([data-bs-toggle]):not([data-bs-target])');
            const forms = document.querySelectorAll('form:not([data-no-loading])');
            
            // Handle link clicks
            links.forEach(link => {
                // Skip if it's a dropdown toggle or has a specific class to ignore
                if (link.closest('.dropdown') || link.classList.contains('no-loading')) {
                    return;
                }
                
                link.addEventListener('click', function(e) {
                    // Don't prevent default if it's a form submission or has a modifier key
                    if (e.ctrlKey || e.metaKey || e.shiftKey || e.altKey) {
                        return;
                    }
                    
                    const href = this.getAttribute('href');
                    if (href && href !== '#' && !href.startsWith('tel:') && !href.startsWith('mailto:')) {
                        e.preventDefault();
                        showLoading();
                        window.location.href = href;
                    }
                });
            });
            
            // Handle form submissions
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    showLoading();
                });
            });
            
            // Hide loading when page is fully loaded
            window.addEventListener('load', hideLoading);
        });
        
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
    </script>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <script>
        // Theme initialization
        function initTheme() {
            // Check for saved theme preference or use system preference
            const savedTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
                document.documentElement.setAttribute('data-theme', 'dark');
                document.documentElement.setAttribute('data-bs-theme', 'dark');
            } else {
                document.documentElement.setAttribute('data-theme', 'light');
                document.documentElement.setAttribute('data-bs-theme', 'light');
            }
            
            // Update theme toggle button
            updateThemeToggle();
        }
        
        // Toggle theme function
        function toggleTheme() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            // Update theme attributes
            html.setAttribute('data-theme', newTheme);
            html.setAttribute('data-bs-theme', newTheme);
            
            // Save preference to localStorage
            localStorage.setItem('theme', newTheme);
            
            // Update theme toggle button
            updateThemeToggle();
        }
        
        // Update theme toggle button state
        function updateThemeToggle() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const themeToggles = [
                document.getElementById('theme-toggle'),
                document.getElementById('theme-toggle-mobile')
            ];
            
            themeToggles.forEach(themeToggle => {
                if (themeToggle) {
                    const icon = themeToggle.querySelector('i');
                    if (currentTheme === 'dark') {
                        icon.classList.remove('bi-moon');
                        icon.classList.add('bi-sun');
                        themeToggle.setAttribute('aria-label', 'Passer en mode clair');
                        themeToggle.setAttribute('title', 'Mode sombre (basculer vers clair)');
                    } else {
                        icon.classList.remove('bi-sun');
                        icon.classList.add('bi-moon');
                        themeToggle.setAttribute('aria-label', 'Passer en mode sombre');
                        themeToggle.setAttribute('title', 'Mode clair (basculer vers sombre)');
                    }
                }
            });
        }
        
        // Initialize theme when the page loads
        document.addEventListener('DOMContentLoaded', initTheme);
        
        // Add smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            // Skip if it's a dropdown toggle or has a specific class to ignore
            if (anchor.getAttribute('href') === '#' || anchor.getAttribute('data-bs-toggle') === 'dropdown') {
                return;
            }
            
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#' || !targetId) return;
                
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    
                    // Show loading overlay for a smoother transition
                    showLoading();
                    
                    // Scroll to the target
                    window.scrollTo({
                        top: target.offsetTop - 80, // Account for fixed header
                        behavior: 'smooth'
                    });
                    
                    // Update URL without page reload
                    if (history.pushState) {
                        history.pushState(null, null, targetId);
                    } else {
                        location.hash = targetId;
                    }
                    
                    // Hide loading after scroll is complete
                    setTimeout(hideLoading, 500);
                }
            });
        });
        
        // Handle browser back/forward buttons
        window.addEventListener('popstate', function() {
            const hash = window.location.hash;
            if (hash) {
                const target = document.querySelector(hash);
                if (target) {
                    showLoading();
                    target.scrollIntoView({ behavior: 'smooth' });
                    setTimeout(hideLoading, 500);
                }
            }
        });
        
        // Back to Top Button
        const backToTopButton = document.getElementById('back-to-top');
        
        if (backToTopButton) {
            // Show/hide the button based on scroll position
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) { // Show after scrolling 300px
                    backToTopButton.classList.add('visible');
                } else {
                    backToTopButton.classList.remove('visible');
                }
            });
            
            // Smooth scroll to top when clicked
            backToTopButton.addEventListener('click', function(e) {
                e.preventDefault();
                showLoading();
                
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
                
                // Hide the button after scroll starts
                setTimeout(() => {
                    backToTopButton.classList.remove('visible');
                    hideLoading();
                }, 500);
                
                // Update URL without the hash
                if (history.pushState) {
                    history.pushState(null, null, ' ');
                } else {
                    window.location.hash = '';
                }
            });
        }
    </script>
    
    @stack('scripts')
    <script>
        // Activer les tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Gestion du thème sombre/clair
        const themeToggle = document.getElementById('theme-toggle');
        const html = document.documentElement;
        
        // Vérifier la préférence système
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            html.setAttribute('data-bs-theme', 'dark');
        }
        
        // Basculer entre les thèmes
        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                if (html.getAttribute('data-bs-theme') === 'dark') {
                    html.setAttribute('data-bs-theme', 'light');
                    localStorage.setItem('theme', 'light');
                } else {
                    html.setAttribute('data-bs-theme', 'dark');
                    localStorage.setItem('theme', 'dark');
                }
            });
        }
        
        // Vérifier le thème sauvegardé
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            html.setAttribute('data-bs-theme', savedTheme);
        }
    </script>
    @stack('scripts')
</body>
</html>