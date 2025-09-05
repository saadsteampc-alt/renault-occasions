@extends('layouts.vendeur')

@section('page-title', 'Stock Voitures')

@section('page-actions')
    <a href="{{ route('admin.voitures.create') }}" class="btn btn-sm btn-primary">
        <i class="bi bi-plus-circle"></i> Ajouter une voiture
    </a>
@endsection

@section('vendeur-content')
<div class="row mb-3">
    <div class="col-md-12">
        <form method="GET" action="{{ route('vendeur.voitures.index') }}" class="row g-3">
            <div class="col-md-3">
                <input type="text" class="form-control" name="search" placeholder="Rechercher..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <select name="marque" class="form-select">
                    <option value="">Toutes marques</option>
                    @foreach($marques as $marque)
                        <option value="{{ $marque }}" {{ request('marque') == $marque ? 'selected' : '' }}>{{ $marque }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="statut" class="form-select">
                    <option value="">Tous statuts</option>
                    <option value="disponible" {{ request('statut') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="reserve" {{ request('statut') == 'reserve' ? 'selected' : '' }}>Réservé</option>
                    <option value="vendu" {{ request('statut') == 'vendu' ? 'selected' : '' }}>Vendu</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control" name="prix_min" placeholder="Prix min" value="{{ request('prix_min') }}">
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control" name="prix_max" placeholder="Prix max" value="{{ request('prix_max') }}">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
            </div>
        </form>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($voitures->isEmpty())
    <div class="alert alert-info">
        Aucune voiture trouvée dans votre entreprise.
    </div>
@else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Marque/Modèle</th>
                    <th>Année</th>
                    <th>Kilométrage</th>
                    <th>Prix</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($voitures as $voiture)
                    <tr>
                        <td>
                            @if($voiture->image)
                                <img src="{{ asset('storage/' . $voiture->image) }}" alt="{{ $voiture->marque }}" width="50">
                            @else
                                <i class="bi bi-car-front" style="font-size: 2rem;"></i>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $voiture->marque }}</strong><br>
                            {{ $voiture->modele }}
                        </td>
                        <td>{{ $voiture->annee }}</td>
                        <td>{{ number_format($voiture->kilometrage, 0, ',', ' ') }} km</td>
                        <td>{{ number_format($voiture->prix, 2, ',', ' ') }} €</td>
                        <td>
                            <span class="badge bg-{{ $voiture->statut === 'disponible' ? 'success' : ($voiture->statut === 'reserve' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($voiture->statut) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.voitures.show', $voiture) }}" class="btn btn-info btn-sm" title="Voir">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $voitures->links() }}
    </div>
@endif

@endsection