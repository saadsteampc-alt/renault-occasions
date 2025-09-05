@extends('layouts.app')

@section('title', 'Financier - Renault Occasions')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <i class="bi bi-list"></i> Menu Financier
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('financier.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('financier.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i> Tableau de bord
                    </a>
                    <a href="{{ route('financier.paiements.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('financier.paiements.*') ? 'active' : '' }}">
                        <i class="bi bi-credit-card"></i> Validation paiements
                    </a>
                    <a href="{{ route('financier.ventes.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('financier.ventes.*') ? 'active' : '' }}">
                        <i class="bi bi-cash-stack"></i> Historique ventes
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="bi bi-layout-sidebar"></i> @yield('page-title', 'Financier')
                        </span>
                        <div>
                            @yield('page-actions')
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @yield('financier-content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection