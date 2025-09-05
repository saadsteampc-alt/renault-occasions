@extends('layouts.app')

@section('title', 'Administration - Renault Occasions')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="bi bi-list"></i> Menu Administration
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i> Tableau de bord
                    </a>
                    <a href="{{ route('admin.voitures.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.voitures.*') ? 'active' : '' }}">
                        <i class="bi bi-car-front"></i> Gestion des voitures
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i> Gestion des utilisateurs
                    </a>
                    <a href="{{ route('admin.entreprises.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.entreprises.*') ? 'active' : '' }}">
                        <i class="bi bi-building"></i> Gestion des entreprises
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="bi bi-layout-sidebar"></i> @yield('page-title', 'Administration')
                        </span>
                        <div>
                            @yield('page-actions')
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @yield('admin-content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection