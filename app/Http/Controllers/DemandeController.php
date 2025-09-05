<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    public function index()
    {
        $demandesEnAttente = Demande::with(['client', 'voiture', 'vendeur'])
            ->where('statut', 'en_attente')
            ->latest()
            ->get();
            
        $demandesConfirmees = Demande::with(['client', 'voiture', 'vendeur'])
            ->where('statut', 'confirme')
            ->latest()
            ->get();
            
        $demandesAnnulees = Demande::with(['client', 'voiture', 'vendeur'])
            ->where('statut', 'annule')
            ->latest()
            ->get();
            
        return view('vendeur.demandes.index', compact('demandesEnAttente', 'demandesConfirmees', 'demandesAnnulees'));
    }

    public function show(Demande $demande)
    {
        $demande->load(['client', 'voiture', 'vendeur']);
        return view('vendeur.demandes.show', compact('demande'));
    }

    public function confirm(Request $request, Demande $demande)
    {
        $request->validate([
            'date_visite' => 'required|date|after:today',
        ]);

        $demande->update([
            'statut' => 'confirme',
            'date_visite' => $request->date_visite,
            'vendeur_id' => Auth::id(),
        ]);

        return redirect()->route('vendeur.demandes.index')->with('success', 'Demande confirmée avec succès.');
    }

    public function cancel(Demande $demande)
    {
        $demande->update([
            'statut' => 'annule',
            'vendeur_id' => Auth::id(),
        ]);

        // Remettre la voiture disponible
        $demande->voiture->update(['statut' => 'disponible']);

        return redirect()->route('vendeur.demandes.index')->with('success', 'Demande annulée et voiture remise en stock.');
    }
}