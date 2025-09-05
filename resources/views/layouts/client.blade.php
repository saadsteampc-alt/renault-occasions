@extends('layouts.app')

@section('title', 'Client - Renault Occasions')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="bi bi-car-front"></i> @yield('page-title', 'Catalogue Voitures')
                        </span>
                        <div>
                            @yield('page-actions')
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @yield('client-content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection