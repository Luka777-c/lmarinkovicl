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
            <a href="{{ route('narudzbenice.create') }}" class="btn btn-outline-primary"><i class="fas fa-shopping-cart me-1"></i> Nova narudžbina</a>
            <a href="{{ route('zadaci.create') }}" class="btn btn-outline-primary"><i class="fas fa-user-plus me-1"></i> Dodeli zadatak</a>
            <a href="{{ route('oprema.create') }}" class="btn btn-outline-primary"><i class="fas fa-wrench me-1"></i> Dodaj opremu</a>
        </div>
    </div>

    <!-- Poslednje proizvodne ture -->
    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="data-table">
                <div class="table-header">
                    <h3 class="h6 mb-0"><i class="fas fa-wine-bottle me-2"></i> Poslednje proizvodne ture</h3>
                </div>
                <div class="table-content">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Naziv</th>
                                    <th>Status</th>
                                    <th>Datum</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ture as $tura)
                                    <tr>
                                        <td>{{ $tura->naziv_ture }}</td>
                                        <td>
                                            @if($tura->status === 'U toku')
                                                <span class="badge bg-primary">{{ $tura->status }}</span>
                                            @elseif($tura->status === 'Završeno')
                                                <span class="badge bg-success">{{ $tura->status }}</span>
                                            @else
                                                <span class="badge bg-warning">{{ $tura->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ optional($tura->created_at)->format('d.m.Y') ?? '—' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-muted">Nema proizvodnih tura.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Poslednji zadaci -->
        <div class="col-lg-6">
            <div class="data-table">
                <div class="table-header">
                    <h3 class="h6 mb-0"><i class="fas fa-tasks me-2"></i> Poslednji zadaci</h3>
                </div>
                <div class="table-content">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Opis</th>
                                    <th>Status</th>
                                    <th>Dodeljen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($zadaci as $zadatak)
                                    <tr>
                                        <td>{{ Str::limit($zadatak->opis, 30) }}</td>
                                        <td>
                                            @if($zadatak->status === 'Na čekanju')
                                                <span class="badge bg-warning">{{ $zadatak->status }}</span>
                                            @elseif($zadatak->status === 'U toku')
                                                <span class="badge bg-primary">{{ $zadatak->status }}</span>
                                            @else
                                                <span class="badge bg-success">{{ $zadatak->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ optional($zadatak->user)->name ?? '—' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-muted">Nema zadataka.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection