@extends('layouts.app')

@section('title', 'Početna')

@section('content')
    <div class="d-sm-none d-flex align-items-center justify-content-between bg-white p-3 rounded-3 shadow-sm mb-3">
        <button class="btn btn-primary" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <h2 class="mb-0">VINOTEKA</h2>
        <div></div>
    </div>

    <div class="page-header">
        <h1 class="page-title mb-1">Dobrodošli u Vinoteka sistem</h1>
        <p class="page-subtitle text-muted">Pregled ključnih informacija o proizvodnji vina</p>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-12 col-md-6 col-xl-3">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="h6 mb-0">Aktivne ture</h3>
                    <div class="card-icon"><i class="fas fa-wine-bottle"></i></div>
                </div>
                <div class="card-value">{{ $aktivneTure }}</div>
                <div class="text-muted">Trenutno u proizvodnji imamo {{ $aktivneTure }} aktivnih tura vina u različitim fazama procesa</div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="h6 mb-0">Ukupne zalihe</h3>
                    <div class="card-icon"><i class="fas fa-boxes"></i></div>
                </div>
                <div class="card-value">{{ number_format($ukupnoZaliha, 0, ',', '.') }}L</div>
                <div class="text-muted">Trenutno stanje sirovina i ambalaže potrebnih za proizvodnju</div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="h6 mb-0">Aktivne narudžbine</h3>
                    <div class="card-icon"><i class="fas fa-shopping-cart"></i></div>
                </div>
                <div class="card-value">{{ $aktivneNarudzbine }}</div>
                <div class="text-muted">Narudžbine koje čekaju odobravanje ili su u procesu obrade</div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="h6 mb-0">Nezavršeni zadaci</h3>
                    <div class="card-icon"><i class="fas fa-tasks"></i></div>
                </div>
                <div class="card-value">{{ $nezavrsenihZadataka }}</div>
                <div class="text-muted">Zadaci koji su dodeljeni radnicima i trebaju biti završeni</div>
            </div>
        </div>
    </div>

    <div class="quick-actions">
        <h3 class="h5 mb-3"><i class="fas fa-bolt me-2"></i> Brze akcije</h3>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('ture.create') }}" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Nova proizvodna tura</a>
            <a href="/narudzbine/nova" class="btn btn-outline-primary"><i class="fas fa-shopping-cart me-1"></i> Nova narudžbina</a>
            <a href="/zadaci/dodeli" class="btn btn-outline-primary"><i class="fas fa-user-plus me-1"></i> Dodeli zadatak</a>
            <a href="/oprema/pregled" class="btn btn-outline-primary"><i class="fas fa-wrench me-1"></i> Pregled opreme</a>
        </div>
    </div>

    <div class="data-table">
        <div class="table-header">
            <h3 class="h6 mb-0"><i class="fas fa-history me-2"></i> Poslednje aktivnosti</h3>
        </div>
        <div class="table-content">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Vreme</th>
                            <th>Aktivnost</th>
                            <th>Korisnik</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>09:30</td>
                            <td>Kreirana nova tura - Merlot 2025</td>
                            <td>Ana Milić</td>
                            <td><span class="status-badge status-pending">Zakazano</span></td>
                        </tr>
                        <tr>
                            <td>Juče</td>
                            <td>Ažurirane zalihe - Čepovi</td>
                            <td>Stefan Ristić</td>
                            <td><span class="status-badge status-completed">Završeno</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection