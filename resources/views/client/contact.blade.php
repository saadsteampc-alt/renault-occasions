
<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contact - RenaultOcaz</title>
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
            color: white;
            transform: translateY(-2px);
        }
        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(135deg, #f0fdfa 0%, #e6fffa 50%, #ccfbf1 100%);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding-top: 110px;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="%23cbd5e1" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>') repeat;
            opacity: 0.3;
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, var(--text-primary), var(--primary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hero-subtitle {
            font-size: 1.5rem;
            color: var(--text-secondary);
            margin-bottom: 3rem;
            font-weight: 400;
        }
        .search-card {
            background: var(--bg-white);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border-color);
            margin-bottom: 3rem;
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
        .search-btn {
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
        .search-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
        }
        .feature-badge {
            display: inline-flex;
            align-items: center;
            background: var(--bg-white);
            border: 2px solid var(--border-color);
            border-radius: 50px;
            padding: 0.75rem 1.25rem;
            margin: 0.5rem;
            font-weight: 600;
            color: var(--text-primary);
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }
        .feature-badge:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        .feature-icon {
            width: 24px;
            height: 24px;
            margin-right: 0.75rem;
            color: var(--primary-color);
        }
        /* Contact Section */
        .contact-section {
            padding: 6rem 0;
        }
        .card {
            border: 1px solid var(--border-color);
            border-radius: 24px;
            box-shadow: var(--shadow-xl);
        }
        .accordion-item {
            border: 1px solid var(--border-color);
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 1rem;
        }
        .accordion-button {
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .accordion-button:not(.collapsed) {
            background: rgba(15, 118, 110, 0.05);
            color: var(--primary-color);
        }
        .ratio {
            border-radius: 24px;
            overflow: hidden;
        }
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .hero-subtitle {
                font-size: 1.125rem;
            }
            .contact-section {
                padding: 4rem 0;
            }
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('welcome') }}">
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
                    <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                </li>
                <li class="nav-item me-3">
                    <a class="btn btn-primary" href="{{ route('register') }}">S'inscrire</a>
                </li>
         
            </ul>
        </div>
        <!-- Mobile Toggle -->
        <div class="d-flex align-items-center d-lg-none">
        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</nav>

<!-- Page Header -->
<section class="hero-section bg-transparent">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center hero-content">
                <h1 class="hero-title">Contactez-nous</h1>
                <p class="hero-subtitle">Une question ? Notre équipe est là pour vous répondre dans les plus brefs délais.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="pe-lg-4">
                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3">Besoin d'aide ?</span>
                    <h2 class="display-5 fw-bold mb-4">Nous sommes là pour vous aider</h2>
                    <p class="lead text-muted mb-5">Notre équipe est disponible du lundi au samedi pour répondre à toutes vos questions sur nos véhicules et services.</p>
                    
                    <div class="d-flex mb-4">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-4">
                            <i class="bi bi-geo-alt text-primary fs-4"></i>
                        </div>
                        <div>
                            <h5 class="h5 fw-bold mb-2">Notre concession</h5>
                            <p class="mb-0 text-muted">123 Avenue de la République<br>75011 Paris, France</p>
                            <a href="#" class="text-primary text-decoration-none small mt-2 d-inline-block">
                                <i class="bi bi-arrow-right me-1"></i> Voir sur la carte
                            </a>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-4">
                            <i class="bi bi-telephone text-primary fs-4"></i>
                        </div>
                        <div>
                            <h5 class="h5 fw-bold mb-2">Téléphone</h5>
                            <p class="mb-0 text-muted">+33 1 23 45 67 89</p>
                            <p class="small text-muted mb-0">Lun-Sam: 9h-19h</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-4">
                            <i class="bi bi-envelope text-primary fs-4"></i>
                        </div>
                        <div>
                            <h5 class="h5 fw-bold mb-2">Email</h5>
                            <p class="mb-0 text-muted">contact@renault-ocaz.fr</p>
                            <p class="small text-muted mb-0">Réponse sous 24h</p>
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-4 border-top">
                        <h5 class="h5 fw-bold mb-3">Suivez-nous</h5>
                        <div class="d-flex gap-3">
                            <a href="#" class="text-primary text-decoration-none" data-bs-toggle="tooltip" title="Facebook">
                                <i class="bi bi-facebook fs-4"></i>
                            </a>
                            <a href="#" class="text-primary text-decoration-none" data-bs-toggle="tooltip" title="Twitter">
                                <i class="bi bi-twitter-x fs-4"></i>
                            </a>
                            <a href="#" class="text-primary text-decoration-none" data-bs-toggle="tooltip" title="Instagram">
                                <i class="bi bi-instagram fs-4"></i>
                            </a>
                            <a href="#" class="text-primary text-decoration-none" data-bs-toggle="tooltip" title="LinkedIn">
                                <i class="bi bi-linkedin fs-4"></i>
                            </a>
                            <a href="#" class="text-primary text-decoration-none" data-bs-toggle="tooltip" title="YouTube">
                                <i class="bi bi-youtube fs-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm p-4 p-lg-5">
                    <div class="card-body p-0">
                        <h3 class="h3 fw-bold mb-4">Envoyez-nous un message</h3>
                        <p class="text-muted mb-5">Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.</p>
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        <form action="{{ route('contact.store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label fw-medium">Votre nom complet <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Votre nom" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label fw-medium">Votre email <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="votre@email.com" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="subject" class="form-label fw-medium">Sujet <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-chat-square-text text-muted"></i></span>
                                            <select class="form-select form-select-lg @error('subject') is-invalid @enderror" id="subject" name="subject" required>
                                                <option value="" disabled selected>Sélectionnez un sujet</option>
                                                <option value="Demande d'information" {{ old('subject') == "Demande d'information" ? 'selected' : '' }}>Demande d'information</option>
                                                <option value="Prise de rendez-vous" {{ old('subject') == 'Prise de rendez-vous' ? 'selected' : '' }}>Prise de rendez-vous</option>
                                                <option value="Support technique" {{ old('subject') == 'Support technique' ? 'selected' : '' }}>Support technique</option>
                                                <option value="Service après-vente" {{ old('subject') == 'Service après-vente' ? 'selected' : '' }}>Service après-vente</option>
                                                <option value="Autre" {{ old('subject') == 'Autre' ? 'selected' : '' }}>Autre</option>
                                            </select>
                                            @error('subject')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message" class="form-label fw-medium">Votre message <span class="text-danger">*</span></label>
                                        <textarea class="form-control form-control-lg @error('message') is-invalid @enderror" id="message" name="message" rows="6" placeholder="Décrivez-nous votre demande en détail..." required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="privacy" name="privacy" required>
                                        <label class="form-check-label small text-muted" for="privacy">
                                            En soumettant ce formulaire, j'accepte que les informations saisies soient utilisées pour me recontacter dans le cadre de ma demande. <a href="#" class="text-primary text-decoration-underline">Politique de confidentialité</a>.
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg px-5 py-3 fw-bold w-100">
                                        <i class="bi bi-send me-2"></i>Envoyer le message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="bg-light py-6 py-lg-8">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Retrouvez-nous facilement</h2>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">Notre concession est située en plein cœur de Paris, facilement accessible en transports en commun.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-8 mx-auto">
                <div class="ratio ratio-21x9 rounded-4 overflow-hidden shadow">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9916256937595!2d2.292292615807266!3d48.85837007928747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1620000000000!5m2!1sfr!2sfr" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                
                <div class="row g-4 mt-4">
                    <div class="col-md-4">
                        <div class="d-flex">
                            <div class="me-3 text-primary">
                                <i class="bi bi-geo-alt fs-4"></i>
                            </div>
                            <div>
                                <h5 class="h6 fw-bold mb-1">Adresse</h5>
                                <p class="mb-0 small text-muted">123 Avenue de la République<br>75011 Paris, France</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex">
                            <div class="me-3 text-primary">
                                <i class="bi bi-clock fs-4"></i>
                            </div>
                            <div>
                                <h5 class="h6 fw-bold mb-1">Horaires</h5>
                                <p class="mb-0 small text-muted">Lun-Sam: 9h-19h<br>Dimanche: Fermé</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex">
                            <div class="me-3 text-primary">
                                <i class="bi bi-telephone fs-4"></i>
                            </div>
                            <div>
                                <h5 class="h6 fw-bold mb-1">Téléphone</h5>
                                <p class="mb-0 small text-muted">+33 1 23 45 67 89<br>contact@renault-ocaz.fr</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<!-- FAQ Section -->
<section class="py-6 py-lg-8 bg-white">
    <div class="container">
        <div class="text-center mb-6">
            <br>
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3">Questions fréquentes</span>
            <h2 class="display-5 fw-bold mb-4">Vous avez des questions ?</h2>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">Consultez notre FAQ pour trouver des réponses aux questions les plus courantes.</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-bold p-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Quels sont les horaires d'ouverture de la concession ?
                            </button>
                        </h3>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body p-4 pt-0">
                                Notre concession est ouverte du lundi au samedi de 9h à 19h sans interruption. Nous sommes fermés les dimanches et jours fériés.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fw-bold p-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Proposez-vous des services après-vente ?
                            </button>
                        </h3>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body p-4 pt-0">
                                Oui, notre atelier est équipé pour effectuer tous types de réparations et d'entretiens sur les véhicules Renault. Nos mécaniciens certifiés utilisent des pièces d'origine pour garantir la qualité de nos interventions.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-bold p-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Puis-je essayer un véhicule avant d'acheter ?
                            </button>
                        </h3>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body p-4 pt-0">
                                Bien sûr ! Nous vous encourageons même à essayer le véhicule qui vous intéresse. Vous pouvez prendre rendez-vous pour un essai en appelant notre service commercial ou en remplissant le formulaire de contact.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed fw-bold p-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Quelles sont les options de financement disponibles ?
                            </button>
                        </h3>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body p-4 pt-0">
                                Nous proposons plusieurs solutions de financement : crédit classique, location avec option d'achat (LOA), location longue durée (LLD) et reprise de votre véhicule actuel. Nos conseillers se feront un plaisir d'étudier avec vous la solution la plus adaptée à votre budget.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed fw-bold p-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Proposez-vous la livraison à domicile ?
                            </button>
                        </h3>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body p-4 pt-0">
                                Oui, nous proposons un service de livraison à domicile dans toute la France métropolitaine. Les conditions et frais de livraison dépendent de votre localisation. N'hésitez pas à nous contacter pour plus d'informations.
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-6">
                    <p class="mb-4">Vous ne trouvez pas de réponse à votre question ?</p>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg px-5">
                        <i class="bi bi-envelope me-2"></i>Contactez-nous
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section>
    <div class="container">
        <br>
    </div>
</section>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Theme toggle
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
        const icon = document.getElementById('theme-toggle').querySelector('i');
        if (currentTheme === 'dark') {
            icon.classList.remove('bi-moon');
            icon.classList.add('bi-sun');
        } else {
            icon.classList.remove('bi-sun');
            icon.classList.add('bi-moon');
        }
    }
    // Initialize theme
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        document.documentElement.setAttribute('data-bs-theme', savedTheme);
        updateThemeToggle();

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Form validation
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    });
</script>

</body>
</html>
    