<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voiture;
use App\Models\Entreprise;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalVoitures = Voiture::count();
        $totalUsers = User::count();
        $totalVentes = Vente::count();
        $totalEntreprises = Entreprise::count();
        
        $recentVentes = Vente::with(['voiture', 'demande.client'])->latest()->take(5)->get();
        
        return view('admin.dashboard', compact('totalVoitures', 'totalUsers', 'totalVentes', 'totalEntreprises', 'recentVentes'));
    }

    // User Management
    public function users()
    {
        $users = User::with('entreprise')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        $entreprises = Entreprise::all();
        return view('admin.users.create', compact('entreprises'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,vendeur,financier,client',
            'entreprise_id' => 'nullable|exists:entreprises,id'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'entreprise_id' => $request->entreprise_id,
            'email_verified_at' => now(),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function editUser(User $user)
    {
        $entreprises = Entreprise::all();
        return view('admin.users.edit', compact('user', 'entreprises'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,vendeur,financier,client',
            'entreprise_id' => 'nullable|exists:entreprises,id'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'entreprise_id' => $request->entreprise_id
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function showUser(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // Entreprise Management
    public function entreprises()
    {
        $entreprises = Entreprise::latest()->paginate(10);
        return view('admin.entreprises.index', compact('entreprises'));
    }

    public function createEntreprise()
    {
        return view('admin.entreprises.create');
    }

    public function storeEntreprise(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'siret' => 'nullable|string|max:14|unique:entreprises,siret',
            'adresse_physique' => 'required|string',
            'adresse_email' => 'required|email|unique:entreprises,adresse_email',
            'telephone' => 'nullable|string|max:20',
            'ville' => 'nullable|string|max:100',
            'pays' => 'nullable|string|max:100',
            'code_postal' => 'nullable|string|max:10',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_web' => 'nullable|url|max:255',
        ]);

        $data = $request->except('logo');
        
        // Gestion du téléchargement du logo
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('public/logos');
            $data['logo'] = str_replace('public/', '', $path);
        }

        Entreprise::create($data);

        return redirect()->route('admin.entreprises.index')
            ->with('success', 'Entreprise créée avec succès.');
    }

    public function editEntreprise(Entreprise $entreprise)
    {
        return view('admin.entreprises.edit', compact('entreprise'));
    }

    public function updateEntreprise(Request $request, Entreprise $entreprise)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'siret' => 'nullable|string|max:14|unique:entreprises,siret,' . $entreprise->id,
            'adresse_physique' => 'required|string',
            'adresse_email' => 'required|email|unique:entreprises,adresse_email,' . $entreprise->id,
            'telephone' => 'nullable|string|max:20',
            'ville' => 'nullable|string|max:100',
            'pays' => 'nullable|string|max:100',
            'code_postal' => 'nullable|string|max:10',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_web' => 'nullable|url|max:255',
            'supprimer_logo' => 'nullable|boolean',
        ]);

        $data = $request->except(['logo', 'supprimer_logo']);
        
        // Gestion de la suppression du logo
        if ($request->has('supprimer_logo') && $request->supprimer_logo) {
            // Supprimer l'ancien logo s'il existe
            if ($entreprise->logo && \Storage::exists('public/' . $entreprise->logo)) {
                \Storage::delete('public/' . $entreprise->logo);
            }
            $data['logo'] = null;
        }
        
        // Gestion du téléchargement du nouveau logo
        if ($request->hasFile('logo')) {
            // Supprimer l'ancien logo s'il existe
            if ($entreprise->logo && \Storage::exists('public/' . $entreprise->logo)) {
                \Storage::delete('public/' . $entreprise->logo);
            }
            
            $path = $request->file('logo')->store('public/logos');
            $data['logo'] = str_replace('public/', '', $path);
        }

        $entreprise->update($data);

        return redirect()->route('admin.entreprises.index')
            ->with('success', 'Entreprise mise à jour avec succès.');
    }

    public function destroyEntreprise(Entreprise $entreprise)
    {
        $entreprise->delete();
        return redirect()->route('admin.entreprises.index')->with('success', 'Entreprise supprimée avec succès.');
    }

    public function showEntreprise(Entreprise $entreprise)
    {
        return view('admin.entreprises.show', compact('entreprise'));
    }
}