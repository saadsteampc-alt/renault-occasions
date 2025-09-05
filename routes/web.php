<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Vendeur\VoitureController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

use App\Models\Voiture;

// Routes publiques (clients sans compte)
Route::get('/', function () {
    $voitures = Voiture::where('statut', 'disponible')
        ->latest()
        ->take(8)
        ->get();
        
    return view('client.welcome', compact('voitures'));
})->name('welcome');

// Contact routes
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

Route::get('/voitures', [App\Http\Controllers\ClientController::class, 'index'])->name('client.voitures.index');
Route::get('/voitures/{voiture}', [App\Http\Controllers\ClientController::class, 'showVoiture'])->name('client.voiture.show');
Route::get('/demandes/create/{voiture}', [App\Http\Controllers\ClientController::class, 'createDemande'])->name('client.demande.create');
Route::post('/demandes/store/{voiture}', [App\Http\Controllers\ClientController::class, 'storeDemande'])->name('client.demande.store');
Route::get('/demandes/confirmation/{demande}', [App\Http\Controllers\ClientController::class, 'confirmationDemande'])->name('client.demande.confirmation');

// Routes d'authentification (générées par Laravel UI)
Auth::routes();

// Route pour le dashboard après login (redirection selon le rôle)
Route::get('/home', function () {
    $user = Auth::user();
    
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'vendeur') {
        return redirect()->route('vendeur.dashboard');
    } elseif ($user->role === 'financier') {
        return redirect()->route('financier.dashboard');
    }
    
    return redirect()->route('client.voitures.index');
})->name('home')->middleware('auth');

// Routes Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // Dashboard Admin
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Gestion des voitures
    Route::resource('voitures', App\Http\Controllers\VoitureController::class, [
        'names' => [
            'index' => 'admin.voitures.index',
            'create' => 'admin.voitures.create',
            'store' => 'admin.voitures.store',
            'show' => 'admin.voitures.show',
            'edit' => 'admin.voitures.edit',
            'update' => 'admin.voitures.update',
            'destroy' => 'admin.voitures.destroy'
        ]
    ]);
    
    // Mise à jour du statut d'une voiture
    Route::patch('/voitures/{voiture}/status', [App\Http\Controllers\VoitureController::class, 'updateStatus'])
        ->name('admin.voitures.update-status');
    
    // Gestion des utilisateurs
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users.index');
    Route::get('/users/create', [App\Http\Controllers\AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/users', [App\Http\Controllers\AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [App\Http\Controllers\AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::get('/users/{user}', [App\Http\Controllers\AdminController::class, 'showUser'])->name('admin.users.show');
   
// Gestion des entreprises
    Route::get('/entreprises', [App\Http\Controllers\AdminController::class, 'entreprises'])->name('admin.entreprises.index');
    Route::get('/entreprises/create', [App\Http\Controllers\AdminController::class, 'createEntreprise'])->name('admin.entreprises.create');
    Route::post('/entreprises', [App\Http\Controllers\AdminController::class, 'storeEntreprise'])->name('admin.entreprises.store');
    Route::get('/entreprises/{entreprise}/edit', [App\Http\Controllers\AdminController::class, 'editEntreprise'])->name('admin.entreprises.edit');
    Route::put('/entreprises/{entreprise}', [App\Http\Controllers\AdminController::class, 'updateEntreprise'])->name('admin.entreprises.update');
    Route::delete('/entreprises/{entreprise}', [App\Http\Controllers\AdminController::class, 'destroyEntreprise'])->name('admin.entreprises.destroy');
    Route::get('/entreprises/{entreprise}', [App\Http\Controllers\AdminController::class, 'showEntreprise'])->name('admin.entreprises.show');

});

// Routes Vendeur
Route::group(['prefix' => 'vendeur', 'middleware' => 'auth'], function () {
    // Dashboard Vendeur
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'vendeur'])->name('vendeur.dashboard');
    
    // Gestion des voitures
    Route::get('/voitures', [App\Http\Controllers\Vendeur\VoitureController::class, 'index'])->name('vendeur.voitures.index');
    Route::get('/voitures/{voiture}', [App\Http\Controllers\Vendeur\VoitureController::class, 'show'])->name('vendeur.voitures.show');
    
    // Gestion des demandes
    Route::get('/demandes', [App\Http\Controllers\DemandeController::class, 'index'])->name('vendeur.demandes.index');
    Route::get('/demandes/{demande}', [App\Http\Controllers\DemandeController::class, 'show'])->name('vendeur.demandes.show');
    Route::post('/demandes/{demande}/confirm', [App\Http\Controllers\DemandeController::class, 'confirm'])->name('vendeur.demandes.confirm');
    Route::post('/demandes/{demande}/cancel', [App\Http\Controllers\DemandeController::class, 'cancel'])->name('vendeur.demandes.cancel');
    
    // Gestion des ventes
    Route::get('/ventes', [App\Http\Controllers\VenteController::class, 'index'])->name('vendeur.ventes.index');
    Route::get('/ventes/create/{demande}', [App\Http\Controllers\VenteController::class, 'create'])->name('vendeur.ventes.create');
    Route::post('/ventes/store/{demande}', [App\Http\Controllers\VenteController::class, 'store'])->name('vendeur.ventes.store');
    Route::get('/ventes/{vente}', [App\Http\Controllers\VenteController::class, 'show'])->name('vendeur.ventes.show');
    Route::get('/ventes/{vente}/pdf', [App\Http\Controllers\VenteController::class, 'generatePdf'])->name('vendeur.ventes.pdf');
});

// Routes Financier
Route::group(['prefix' => 'financier', 'middleware' => 'auth'], function () {
    // Dashboard Financier
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'financier'])->name('financier.dashboard');
    
    // Gestion des ventes
    Route::get('/ventes', [App\Http\Controllers\Financier\VenteController::class, 'index'])->name('financier.ventes.index');
    Route::get('/ventes/{vente}', [App\Http\Controllers\Financier\VenteController::class, 'show'])->name('financier.ventes.show');
    Route::put('/ventes/{vente}/paiement', [App\Http\Controllers\Financier\VenteController::class, 'updatePaiement'])->name('financier.ventes.updatePaiement');
    
    // Gestion des paiements
    Route::get('/paiements', [App\Http\Controllers\PaiementController::class, 'index'])->name('financier.paiements.index');
    Route::match(['get', 'post'], '/paiements/search', [App\Http\Controllers\PaiementController::class, 'search'])->name('financier.paiements.search');
    Route::put('/paiements/{vente}', [App\Http\Controllers\PaiementController::class, 'update'])->name('financier.paiements.update');
});

// Redirections par défaut selon le rôle (si quelqu'un accède à une route sans permission)
Route::get('/redirect', function () {
    if (Auth::check()) {
        $user = Auth::user();
        
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'vendeur') {
            return redirect()->route('vendeur.dashboard');
        } elseif ($user->role === 'financier') {
            return redirect()->route('financier.dashboard');
        }
    }
    
    return redirect()->route('client.voitures.index');
})->name('redirect');

// Profile routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');