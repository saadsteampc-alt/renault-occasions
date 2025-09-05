<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Demande;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function vendeur()
    {
        $totalVoitures = Voiture::count();
        $mesDemandes = Demande::where('vendeur_id', Auth::id())->count();
        $mesVentes = Vente::whereHas('demande', function($query) {
            $query->where('vendeur_id', Auth::id());
        })->count();
        
        $recentDemandes = Demande::with(['client', 'voiture'])
            ->where('statut', 'en_attente')
            ->latest()
            ->take(5)
            ->get();

        return view('vendeur.dashboard', compact('totalVoitures', 'mesDemandes', 'mesVentes', 'recentDemandes'));
    }

    public function financier()
    {
        $ventesEnAttente = Vente::where('statut_paiement', 'en_attente')->count();
        $ventesPayees = Vente::where('statut_paiement', 'paye')->count();
        $ventesAnnulees = Vente::where('statut_paiement', 'annule')->count();
        $recentVentes = Vente::with(['demande.client', 'voiture'])
            ->where('statut_paiement', 'en_attente')
            ->latest()
            ->take(5)
            ->get();

        // For the charts
        $paye = $ventesPayees;
        $enAttente = $ventesEnAttente;
        $annulee = $ventesAnnulees;

        return view('financier.dashboard', compact(
            'ventesEnAttente', 
            'ventesPayees', 
            'recentVentes',
            'paye',
            'enAttente',
            'annulee'
        ));
    }

    public function client()
    {
        return view('client.welcome');
    }
}