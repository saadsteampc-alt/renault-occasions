<?php

namespace App\Http\Controllers\Vendeur;

use App\Http\Controllers\Controller;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoitureController extends Controller
{
    /**
     * Display a listing of the voitures for the vendeur.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the authenticated user's entreprise
        $user = Auth::user();
        $entreprise = $user->entreprise;
        
        // Get unique marques for filter
        $marques = Voiture::distinct()->pluck('marque');
        
        // Start building the query
        $query = Voiture::query();
        
        // Filter by entreprise
        if ($entreprise) {
            $query->where('entreprise_id', $entreprise->id);
        } else {
            $query->whereNull('id'); // Return empty result if no entreprise
        }
        
        // Apply filters
        if (request('search')) {
            $query->where(function($q) {
                $q->where('marque', 'like', '%' . request('search') . '%')
                  ->orWhere('modele', 'like', '%' . request('search') . '%')
                  ->orWhere('immatriculation', 'like', '%' . request('search') . '%');
            });
        }
        
        if (request('marque')) {
            $query->where('marque', request('marque'));
        }
        
        if (request('statut')) {
            $query->where('statut', request('statut'));
        }
        
        if (request('prix_min')) {
            $query->where('prix', '>=', request('prix_min'));
        }
        
        if (request('prix_max')) {
            $query->where('prix', '<=', request('prix_max'));
        }
        
        // Get paginated results with entreprise relationship
        $voitures = $query->with('entreprise')->latest()->paginate(15);
        
        return view('vendeur.voitures.index', compact('voitures', 'marques'));
    }

    /**
     * Display the specified voiture.
     *
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function show(Voiture $voiture)
    {
        // Vérifier que la voiture appartient bien à l'entreprise du vendeur
        $user = Auth::user();
        if ($user->entreprise_id !== $voiture->entreprise_id) {
            abort(403, 'Accès non autorisé à cette ressource.');
        }

        // Charger les relations nécessaires
        $voiture->load('entreprise', 'images');
        
        return view('vendeur.voitures.show', compact('voiture'));
    }
}
