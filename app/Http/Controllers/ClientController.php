<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Voiture;
use App\Models\Demande;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $voitures = Voiture::where('statut', 'disponible')->latest()->paginate(9);
        $marques = Voiture::where('statut', 'disponible')->distinct()->pluck('marque');
        
        return view('client.voitures.index', compact('voitures', 'marques'));
    }

public function voitures()
{
    $voitures = Voiture::where('statut', 'disponible')->latest()->paginate(9);
    
    $marques = Voiture::where('statut', 'disponible')->distinct()->pluck('marque');
    
    return view('client.voitures.index', compact('voitures', 'marques'));
}

    public function showVoiture(Voiture $voiture)
    {
        if ($voiture->statut !== 'disponible') {
            return redirect()->route('client.index')->with('error', 'Cette voiture n\'est plus disponible.');
        }
        
        return view('client.voitures.show', compact('voiture'));
    }

    public function createDemande(Voiture $voiture)
    {
        if ($voiture->statut !== 'disponible') {
            return redirect()->route('client.index')->with('error', 'Cette voiture n\'est plus disponible.');
        }
        
        return view('client.demandes.create', compact('voiture'));
    }

    public function storeDemande(Request $request, Voiture $voiture)
    {
        if ($voiture->statut !== 'disponible') {
            return redirect()->route('client.index')->with('error', 'Cette voiture n\'est plus disponible.');
        }

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'adresse' => 'nullable|string',
        ]);

        // Créer ou trouver le client
        $client = Client::firstOrCreate(
            ['email' => $request->email],
            [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'telephone' => $request->telephone,
                'adresse' => $request->adresse,
            ]
        );

        // Créer la demande
        $demande = Demande::create([
            'client_id' => $client->id,
            'voiture_id' => $voiture->id,
            'statut' => 'en_attente',
        ]);

        // Mettre à jour le statut de la voiture
        $voiture->update(['statut' => 'reserve']);

        return redirect()->route('client.demande.confirmation', $demande)->with('success', 'Votre demande a été soumise avec succès.');
    }

    public function confirmationDemande(Demande $demande)
    {
        return view('client.demandes.confirmation', compact('demande'));
    }
}