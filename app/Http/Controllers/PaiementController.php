<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    public function index()
    {
        // Récupération des ventes récentes en attente de paiement
        $recentVentes = Vente::with(['demande.client', 'voiture'])
            ->where('statut_paiement', 'en_attente')
            ->latest()
            ->take(5)
            ->get();
            
        // Récupération des statistiques
        $totalVentes = Vente::count();
        $montantTotal = Vente::where('statut_paiement', 'paye')->sum('montant');
        $ventesPayees = Vente::where('statut_paiement', 'paye')->count();
        $ventesEnAttente = Vente::where('statut_paiement', 'en_attente')->count();
        
        return view('financier.paiements.search', [
            'recentVentes' => $recentVentes,
            'totalVentes' => $totalVentes,
            'montantTotal' => $montantTotal,
            'ventesPayees' => $ventesPayees,
            'ventesEnAttente' => $ventesEnAttente
        ]);
    }

    public function search(Request $request)
    {
        $code = $request->query('code') ?? $request->input('code_recue');
        
        if (!$code) {
            return redirect()->route('financier.paiements.index')
                ->with('info', 'Veuillez entrer un code de reçu pour effectuer une recherche.');
        }

        $vente = Vente::with(['demande.client', 'voiture', 'financier'])
            ->where('code_recue', $code)
            ->first();

        if (!$vente) {
            return redirect()->route('financier.paiements.index')
                ->with('error', 'Aucune vente trouvée avec le code reçu: ' . $code);
        }

        // Récupérer les ventes récentes pour le panneau latéral
        $recentVentes = Vente::with(['demande.client', 'voiture'])
            ->where('statut_paiement', 'en_attente')
            ->latest()
            ->take(5)
            ->get();

        return view('financier.paiements.show', [
            'vente' => $vente,
            'recentVentes' => $recentVentes
        ]);
    }

    public function update(Request $request, Vente $vente)
    {
        $request->validate([
            'statut_paiement' => 'required|in:paye,annule',
        ]);

        $vente->update([
            'statut_paiement' => $request->statut_paiement,
            'financier_id' => Auth::id(),
        ]);

        // Si le paiement est annulé, remettre la voiture disponible
        if ($request->statut_paiement === 'annule') {
            $vente->voiture->update(['statut' => 'disponible']);
        }

        return redirect()->route('financier.paiements.index')->with('success', 'Statut de paiement mis à jour avec succès.');
    }
}