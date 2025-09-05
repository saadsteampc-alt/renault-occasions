<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use App\Models\Demande;
use App\Models\Voiture;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VenteController extends Controller
{
    public function index()
    {
        $ventes = Vente::with(['demande.client', 'voiture', 'financier'])
            ->whereHas('demande', function($query) {
                $query->where('vendeur_id', Auth::id());
            })
            ->latest()
            ->paginate(15);
            
        return view('vendeur.ventes.index', compact('ventes'));
    }

    public function create(Demande $demande)
    {
        if ($demande->statut !== 'confirme' || $demande->vente) {
            return redirect()->route('vendeur.demandes.index')->with('error', 'Cette demande ne peut pas être convertie en vente.');
        }
        
        return view('vendeur.ventes.create', compact('demande'));
    }

    public function store(Request $request, Demande $demande)
    {
        $request->validate([
            'montant' => 'required|numeric|min:0',
        ]);

        // Générer un code reçu unique
        $codeRecue = strtoupper(Str::random(8));

        // Créer la vente
        $vente = Vente::create([
            'demande_id' => $demande->id,
            'voiture_id' => $demande->voiture_id,
            'montant' => $request->montant,
            'statut_paiement' => 'en_attente',
            'code_recue' => $codeRecue,
            'date_vente' => now(),
        ]);

        // Mettre à jour le statut de la demande
        $demande->update(['statut' => 'vendu']);

        // Mettre à jour le statut de la voiture
        $demande->voiture->update(['statut' => 'vendu']);

        // Générer le PDF (à implémenter)
        // $pdf = $this->generateRecuePDF($vente);

        return redirect()->route('vendeur.ventes.index')->with('success', 'Vente créée avec succès. Code reçu: ' . $codeRecue);
    }

    public function show(Vente $vente)
    {
        $vente->load(['demande.client', 'voiture', 'financier']);
        return view('vendeur.ventes.show', compact('vente'));
    }

    /**
     * Generate a PDF receipt for the sale
     *
     * @param Vente $vente
     * @return \Illuminate\Http\Response
     */
    public function generatePdf(Vente $vente)
    {
        $vente->load(['demande.client', 'voiture', 'financier']);
        
        $pdf = Pdf::loadView('vendeur.ventes.pdf.receipt', compact('vente'));
        
        return $pdf->download('recu-vente-' . $vente->code_recue . '.pdf');
    }
}