<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function index()
    {
        $voitures = Voiture::with('entreprise')->latest()->paginate(15);
        return view('admin.voitures.index', compact('voitures'));
    }

    public function create()
    {
        $entreprises = Entreprise::all();
        return view('admin.voitures.create', compact('entreprises'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'annee' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'kilometrage' => 'required|integer|min:0',
            'prix' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'etat_diagnostic' => 'nullable|string',
            'entreprise_id' => 'required|exists:entreprises,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'statut' => 'required|in:disponible,en_vente,vendu,indisponible',
            'prix_promotion' => 'nullable|numeric|min:0|lt:prix',
            'date_fin_promotion' => 'nullable|date|after:today',
        ]);

        $data = $request->except(['image', 'promotion', 'prix_promotion', 'date_fin_promotion']);
        
        // Gestion de la promotion
        $data['en_promotion'] = $request->has('promotion');
        if ($data['en_promotion']) {
            $data['prix_promotion'] = $request->prix_promotion;
            $data['date_fin_promotion'] = $request->date_fin_promotion;
        } else {
            $data['prix_promotion'] = null;
            $data['date_fin_promotion'] = null;
        }

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('voitures', 'public');
        }

        Voiture::create($data);

        return redirect()->route('admin.voitures.index')
            ->with('success', 'Voiture ajoutée avec succès.');
    }

    public function show(Voiture $voiture)
    {
        $voiture->load('entreprise');
        return view('admin.voitures.show', compact('voiture'));
    }

    public function edit(Voiture $voiture)
    {
        $entreprises = Entreprise::all();
        return view('admin.voitures.edit', compact('voiture', 'entreprises'));
    }

    public function update(Request $request, Voiture $voiture)
    {
        $validated = $request->validate([
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'annee' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'kilometrage' => 'required|integer|min:0',
            'prix' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'etat_diagnostic' => 'nullable|string',
            'entreprise_id' => 'required|exists:entreprises,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'statut' => 'required|in:disponible,en_vente,vendu,indisponible',
            'prix_promotion' => 'nullable|numeric|min:0|lt:prix',
            'date_fin_promotion' => 'nullable|date|after:today',
        ]);

        $data = $request->except(['image', 'remove_image', 'promotion', 'prix_promotion', 'date_fin_promotion']);
        
        // Gestion de la promotion
        $data['en_promotion'] = $request->has('promotion');
        if ($data['en_promotion']) {
            $data['prix_promotion'] = $request->prix_promotion;
            $data['date_fin_promotion'] = $request->date_fin_promotion;
        } else {
            $data['prix_promotion'] = null;
            $data['date_fin_promotion'] = null;
        }

        // Gestion de l'image
        if ($request->has('remove_image')) {
            // Supprimer l'ancienne image si elle existe
            if ($voiture->image) {
                \Storage::disk('public')->delete($voiture->image);
                $data['image'] = null;
            }
        } elseif ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($voiture->image) {
                \Storage::disk('public')->delete($voiture->image);
            }
            $data['image'] = $request->file('image')->store('voitures', 'public');
        }

        $voiture->update($data);

        return redirect()->route('admin.voitures.show', $voiture)
            ->with('success', 'Voiture mise à jour avec succès.');
    }

    public function destroy(Voiture $voiture)
    {
        // Supprimer l'image associée si elle existe
        if ($voiture->image) {
            \Storage::disk('public')->delete($voiture->image);
        }
        
        $voiture->delete();
        
        return redirect()->route('admin.voitures.index')
            ->with('success', 'Voiture supprimée avec succès.');
    }
    
    /**
     * Met à jour le statut d'une voiture
     */
    public function updateStatus(Request $request, Voiture $voiture)
    {
        $request->validate([
            'statut' => 'required|in:disponible,en_vente,vendu,indisponible',
        ]);
        
        $voiture->update(['statut' => $request->statut]);
        
        return redirect()->back()
            ->with('success', 'Statut de la voiture mis à jour avec succès.');
    }

    
}