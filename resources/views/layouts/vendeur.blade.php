@extends('layouts.app')

@section('title', 'Vendeur - Renault Occasions')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <i class="bi bi-list"></i> Menu Vendeur
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('vendeur.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('vendeur.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i> Tableau de bord
                    </a>
                    <a href="{{ route('vendeur.demandes.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('vendeur.demandes.*') ? 'active' : '' }}">
                        <i class="bi bi-clipboard-check"></i> Demandes clients
                        @php
                            $pendingDemandes = \App\Models\Demande::where('statut', 'en_attente')->count();
                        @endphp
                        @if($pendingDemandes > 0)
                            <span class="badge bg-danger float-end">{{ $pendingDemandes }}</span>
                        @endif
                    </a>
                    <a href="{{ route('vendeur.ventes.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('vendeur.ventes.*') ? 'active' : '' }}">
                        <i class="bi bi-cash-stack"></i> Mes ventes
                    </a>
                    <a href="{{ route('vendeur.voitures.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('vendeur.voitures.*') ? 'active' : '' }}">
                        <i class="bi bi-car-front"></i> Stock voitures
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="bi bi-layout-sidebar"></i> @yield('page-title', 'Vendeur')
                        </span>
                        <div>
                            @yield('page-actions')
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @yield('vendeur-content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection