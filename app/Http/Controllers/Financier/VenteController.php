<?php

namespace App\Http\Controllers\Financier;

use App\Http\Controllers\Controller;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VenteController extends Controller
{
    /**
     * Afficher la liste des ventes
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupération des statistiques
        $totalVentes = Vente::count();
        $montantTotal = Vente::where('statut_paiement', 'paye')->sum('montant');
        $ventesPayees = Vente::where('statut_paiement', 'paye')->count();
        $ventesAnnulees = Vente::where('statut_paiement', 'annule')->count();
        
        // Récupération des ventes récentes
        $recentVentes = Vente::with(['demande.client', 'voiture', 'financier'])
            ->latest()
            ->paginate(15);
            
        // Récupération du résumé mensuel des ventes
        $resumeMensuel = Vente::selectRaw(
                "DATE_FORMAT(created_at, '%Y-%m') as mois,
                COUNT(*) as total,
                SUM(CASE WHEN statut_paiement = 'paye' THEN montant ELSE 0 END) as montant_total,
                SUM(CASE WHEN statut_paiement = 'paye' THEN 1 ELSE 0 END) as paye,
                SUM(CASE WHEN statut_paiement = 'en_attente' THEN 1 ELSE 0 END) as en_attente,
                SUM(CASE WHEN statut_paiement = 'annule' THEN 1 ELSE 0 END) as annule"
            )
            ->groupBy('mois')
            ->orderBy('mois', 'desc')
            ->limit(12)
            ->get()
            ->mapWithKeys(function ($item) {
                return [
                    $item->mois => [
                        'total' => $item->total,
                        'montant' => $item->montant_total,
                        'paye' => $item->paye,
                        'en_attente' => $item->en_attente,
                        'annule' => $item->annule
                    ]
                ];
            });
            
        return view('financier.ventes.index', [
            'ventes' => $recentVentes,
            'totalVentes' => $totalVentes,
            'montantTotal' => $montantTotal,
            'ventesPayees' => $ventesPayees,
            'ventesAnnulees' => $ventesAnnulees,
            'recentVentes' => $recentVentes->take(5), // Pour la section des paiements récents
            'resumeMensuel' => $resumeMensuel // Pour le tableau de résumé mensuel
        ]);
    }

    /**
     * Afficher les détails d'une vente
     *
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\View\View
     */
    public function show(Vente $vente)
    {
        $vente->load(['demande.client', 'voiture', 'financier']);
        return view('financier.ventes.show', compact('vente'));
    }

    /**
     * Mettre à jour le statut de paiement d'une vente
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function updatePaiement(Request $request, Vente $vente)
    {
        $request->validate([
            'statut_paiement' => 'required|in:en_attente,paye,annule',
        ]);

        $vente->update([
            'statut_paiement' => $request->statut_paiement,
            'financier_id' => Auth::id(),
        ]);

        // Si un fichier est téléchargé (reçu de paiement)
        if ($request->hasFile('recu_paiement')) {
            $path = $request->file('recu_paiement')->store('public/recus');
            $vente->update(['pdf_recue' => str_replace('public/', '', $path)]);
        }

        return redirect()
            ->route('financier.ventes.show', $vente)
            ->with('success', 'Le statut de paiement a été mis à jour avec succès.');
    }
}
