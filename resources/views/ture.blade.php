@extends('layouts.app')

@section('title', 'Proizvodne ture')

@section('content')
    <div class="d-sm-none d-flex align-items-center justify-content-between bg-white p-3 rounded-3 shadow-sm mb-3">
        <button class="btn btn-primary" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <h2 class="mb-0">Proizvodne ture</h2>
        <div></div>
    </div>

    <div class="page-header d-flex flex-wrap align-items-center justify-content-between">
        <div class="me-3">
            <h1 class="page-title mb-1">Proizvodne ture</h1>
            <p class="page-subtitle text-muted mb-0">Pregled svih tura (ukupno: {{ $ture->count() }})</p>
        </div>
        <div class="mt-3 mt-sm-0">
            <a href="{{ route('ture.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Nova tura
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
        $statusClass = [
            'Fermentacija' => 'status-active',
            'Odležavanje' => 'status-pending',
            'Flaširano' => 'status-completed',
            'Završeno' => 'status-completed',
        ];
    @endphp

    <div class="data-table">
        <div class="table-header">
            <h3 class="h6 mb-0"><i class="fas fa-list me-2"></i> Sve proizvodne ture</h3>
        </div>
        <div class="table-content">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Naziv ture</th>
                            <th>Vrsta grožđa</th>
                            <th class="text-end">Količina</th>
                            <th>Datum branja</th>
                            <th>Status</th>
                            <th>Početak fermentacije</th>
                            <th class="text-end">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ture as $index => $tura)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $tura->naziv_ture }}</td>
                                <td>{{ $tura->vrsta_grozdja }}</td>
                                <td class="text-end">{{ number_format($tura->kolicina, 0, ',', '.') }} L</td>
                                <td>{{ optional($tura->datum_branja)->format('d.m.Y') }}</td>
                                <td>
                                    <span class="status-badge {{ $statusClass[$tura->status] ?? 'status-pending' }}">{{ $tura->status }}</span>
                                </td>
                                <td>{{ optional($tura->datum_pocetka_fermentacije)->format('d.m.Y') ?? '—' }}</td>
                                <td class="text-end">
                                    <form action="{{ route('ture.destroy', $tura) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash me-1"></i> Obriši
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-muted">Nema evidentiranih tura.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection 