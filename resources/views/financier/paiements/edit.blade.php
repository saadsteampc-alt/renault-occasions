@extends('layouts.financier')

@section('page-title', 'Modifier le Statut du Paiement')

@section('page-actions')
    <a href="{{ route('financier.paiements.show', $vente) }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Retour
    </a>
@endsection

@section('financier-content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil"></i> Modifier le statut du paiement
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <h5>Vente #{{ $vente->code_recue }}</h5>
                    <p>
                        <strong>Client:</strong> {{ $vente->demande->client->nom }} {{ $vente->demande->client->prenom }}<br>
                        <strong>Montant:</strong> {{ number_format($vente->montant, 2, ',', ' ') }} €<br>
                        <strong>Statut actuel:</strong> 
                        <span class="badge bg-{{ $vente->statut_paiement === 'paye' ? 'success' : ($vente->statut_paiement === 'annule' ? 'danger' : 'warning') }}">
                            {{ ucfirst($vente->statut_paiement) }}
                        </span>
                    </p>
                </div>
                
                <form action="{{ route('financier.paiements.update', $vente) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Nouveau statut *</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="statut_paiement" id="paye" value="paye" 
                                       {{ old('statut_paiement', $vente->statut_paiement) == 'paye' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="paye">
                                    <span class="badge bg-success">Payé</span>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="statut_paiement" id="en_attente" value="en_attente" 
                                       {{ old('statut_paiement', $vente->statut_paiement) == 'en_attente' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="en_attente">
                                    <span class="badge bg-warning">En attente</span>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="statut_paiement" id="annule" value="annule" 
                                       {{ old('statut_paiement', $vente->statut_paiement) == 'annule' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="annule">
                                    <span class="badge bg-danger">Annulé</span>
                                </label>
                            </div>
                        </div>
                        @error('statut_paiement')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="motif_modification" class="form-label">Motif de la modification (optionnel)</label>
                        <textarea class="form-control" id="motif_modification" name="motif_modification" rows="3">{{ old('motif_modification') }}</textarea>
                    </div>
                    
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle"></i>
                        <strong>Attention:</strong> Modifier le statut peut avoir des conséquences sur le stock et les statistiques.
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('financier.paiements.show', $vente) }}" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Êtes-vous sûr de vouloir modifier le statut ?')">
                            <i class="bi bi-save"></i> Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 