@extends('layouts.vendeur')

@section('page-title', 'Détails de la Voiture')

@section('page-actions')
    <a href="{{ route('vendeur.voitures.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Retour
    </a>
@endsection

@section('vendeur-content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-car-front"></i> Images de la Voiture
            </div>
            <div class="card-body text-center">
                @if($voiture->image)
                    <img src="{{ asset('storage/' . $voiture->image) }}" alt="{{ $voiture->marque }}" class="img-fluid" style="max-height: 300px;">
                @else
                    <i class="bi bi-car-front" style="font-size: 5rem;"></i>
                    <p class="mt-2">Aucune image disponible</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-info-circle"></i> Informations Principales
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Marque:</th>
                        <td>{{ $voiture->marque }}</td>
                    </tr>
                    <tr>
                        <th>Modèle:</th>
                        <td>{{ $voiture->modele }}</td>
                    </tr>
                    <tr>
                        <th>Année:</th>
                        <td>{{ $voiture->annee }}</td>
                    </tr>
                    <tr>
                        <th>Kilométrage:</th>
                        <td>{{ number_format($voiture->kilometrage, 0, ',', ' ') }} km</td>
                    </tr>
                    <tr>
                        <th>Prix:</th>
                        <td><strong>{{ number_format($voiture->prix, 2, ',', ' ') }} €</strong></td>
                    </tr>
                    <tr>
                        <th>Statut:</th>
                        <td>
                            <span class="badge bg-{{ $voiture->statut === 'disponible' ? 'success' : ($voiture->statut === 'reserve' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($voiture->statut) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Entreprise:</th>
                        <td>{{ $voiture->entreprise->nom }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-card-list"></i> Détails Techniques
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h6>Description:</h6>
                            <p>{{ $voiture->description ?? 'Aucune description disponible' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h6>État Diagnostic:</h6>
                            <p>{{ $voiture->etat_diagnostic ?? 'Aucun diagnostic disponible' }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h6>Historique:</h6>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Ajoutée le:</strong> {{ $voiture->created_at->format('d/m/Y H:i') }}
                            </li>
                            <li class="list-group-item">
                                <strong>Dernière modification:</strong> {{ $voiture->updated_at->format('d/m/Y H:i') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($voiture->statut === 'reserve')
    @php
        $demande = $voiture->demandes->where('statut', 'reserve')->first();
    @endphp
    @if($demande)
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card border-warning">
                    <div class="card-header bg-warning text-white">
                        <i class="bi bi-clipboard-check"></i> Demande Associée
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Client:</strong> {{ $demande->client->nom }} {{ $demande->client->prenom }}</p>
                                <p><strong>Date de demande:</strong> {{ $demande->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Statut:</strong> 
                                    <span class="badge bg-warning">{{ ucfirst($demande->statut) }}</span>
                                </p>
                                <a href="{{ route('vendeur.demandes.show', $demande) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Voir la demande
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
@endsection