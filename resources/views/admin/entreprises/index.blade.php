<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RenaultOcaz - Gestion des Entreprises</title>
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
            text-decoration: none;
            color: white;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
            text-decoration: none;
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
        .btn-action {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            color: white;
        }
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
            text-decoration: none;
        }
        .btn-action .bi {
            font-size: 1.1rem;
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
        .table-hover tbody tr:hover {
            background-color: rgba(15, 118, 110, 0.03);
        }
        .badge {
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 12px;
        }
        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--bg-white);
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .action-btn:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        /* Modal Styles */
        .action-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1050;
            justify-content: center;
            align-items: center;
        }
        .action-modal.show {
            display: flex;
        }
        .modal-content {
            background: var(--bg-white);
            border-radius: 16px;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border-color);
            padding: 1.5rem;
            min-width: 250px;
            max-width: 300px;
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--border-color);
        }
        .modal-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0;
        }
        .close-modal {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-secondary);
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s ease;
        }
        .close-modal:hover {
            background-color: rgba(15, 118, 110, 0.1);
            color: var(--primary-color);
        }
        .modal-body {
            padding: 1rem 0;
        }
        .modal-action-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            width: 100%;
            text-align: left;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
            font-weight: 500;
            text-decoration: none;
            color: var(--text-primary);
            background: transparent;
            border: none;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .modal-action-btn:last-child {
            margin-bottom: 0;
        }
        .modal-action-btn:hover {
            background-color: rgba(15, 118, 110, 0.1);
            text-decoration: none;
            color: var(--primary-color);
        }
        .btn-view {
            color: var(--primary-color);
        }
        .btn-edit {
            color: #f59e0b;
        }
        .btn-delete {
            color: #dc3545;
        }
        .btn-view:hover, .btn-edit:hover, .btn-delete:hover {
            background-color: rgba(15, 118, 110, 0.1);
        }
        .btn-view .bi, .btn-edit .bi, .btn-delete .bi {
            font-size: 1.1rem;
        }
        .alert-success {
            background-color: #d1fae5;
            border-color: #10b981;
            color: #065f46;
            border-radius: 12px;
            border-left: 4px solid #10b981;
        }
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
        .text-muted {
            color: var(--text-secondary) !important;
        }
        .text-danger {
            color: #dc2626 !important;
        }
        .fw-bold {
            font-weight: 700 !important;
        }
        .text-decoration-line-through {
            text-decoration: line-through !important;
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
            <h1 class="page-title">Gestion des Entreprises</h1>
            <a href="{{ route('admin.entreprises.create') }}" class="btn-action">
                <i class="bi bi-building-add"></i> Ajouter une entreprise
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>
                                <th>Nombre d'utilisateurs</th>
                                <th>Nombre de voitures</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($entreprises as $entreprise)
                                <tr>
                                    <td>{{ $entreprise->nom }}</td>
                                    <td>{{ $entreprise->adresse_physique ?? 'Non spécifiée' }}</td>
                                    <td>{{ $entreprise->telephone ?? 'Non spécifié' }}</td>
                                    <td>{{ $entreprise->users->count() }}</td>
                                    <td>{{ $entreprise->voitures->count() }}</td>
                                    <td>
                                        <button class="action-btn" type="button" onclick="showActionModal({{ $entreprise->id }})">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-building" style="font-size: 2rem;"></i>
                                            <p class="mt-2 mb-0">Aucune entreprise trouvée</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($entreprises->hasPages())
                    <div class="mt-3">
                        {{ $entreprises->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Action Modal -->
    <div id="actionModal" class="action-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actions</h5>
                <button type="button" class="close-modal" onclick="closeActionModal()">&times;</button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Actions will be populated by JavaScript -->
            </div>
        </div>
    </div>

    <!-- Hidden form for delete action -->
    <form id="deleteForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

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
        // Action modal functionality
        let currentEntrepriseId = null;
        
        function showActionModal(entrepriseId) {
            currentEntrepriseId = entrepriseId;
            const modal = document.getElementById('actionModal');
            const modalBody = document.getElementById('modalBody');
            
            // Clear previous content
            modalBody.innerHTML = '';
            
            // Create action buttons
            const viewBtn = document.createElement('button');
            viewBtn.className = 'modal-action-btn btn-view';
            viewBtn.innerHTML = '<i class="bi bi-eye"></i> Voir';
            viewBtn.onclick = function() {
                window.location.href = `/admin/entreprises/${entrepriseId}`;
            };   
            // Create action buttons
            const editBtn = document.createElement('button');
            editBtn.className = 'modal-action-btn btn-edit';
            editBtn.innerHTML = '<i class="bi bi-pencil"></i> Modifier';
            editBtn.onclick = function() {
                window.location.href = `/admin/entreprises/${entrepriseId}/edit`;
            };
               

            const deleteBtn = document.createElement('button');
            deleteBtn.className = 'modal-action-btn btn-delete';
            deleteBtn.innerHTML = '<i class="bi bi-trash"></i> Supprimer';
            deleteBtn.onclick = function() {
                if (confirm('Êtes-vous sûr de vouloir supprimer cette entreprise ?')) {
                    const form = document.getElementById('deleteForm');
                    form.action = `/admin/entreprises/${entrepriseId}`;
                    form.submit();
                }
            };
            
            // Append buttons to modal body
            modalBody.appendChild(viewBtn);
            modalBody.appendChild(editBtn);
            modalBody.appendChild(deleteBtn);
            
            // Show modal
            modal.classList.add('show');
        }
        
        function closeActionModal() {
            const modal = document.getElementById('actionModal');
            modal.classList.remove('show');
            currentEntrepriseId = null;
        }
        
        // Close modal when clicking outside
        document.getElementById('actionModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeActionModal();
            }
        });
        
        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeActionModal();
            }
        });
        
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