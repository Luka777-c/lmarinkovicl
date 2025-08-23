@extends('layouts.app')

@section('title', 'Zadaci')

@section('content')
    <div class="d-sm-none d-flex align-items-center justify-content-between bg-white p-3 rounded-3 shadow-sm mb-3">
        <button class="btn btn-primary" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <h2 class="mb-0">Zadaci</h2>
        <div></div>
    </div>

    <div class="page-header d-flex flex-wrap align-items-center justify-content-between">
        <div class="me-3">
            <h1 class="page-title mb-1">Zadaci</h1>
            <p class="page-subtitle text-muted mb-0">Pregled zadataka (ukupno: {{ $zadaci->count() }})</p>
        </div>
        <div class="mt-3 mt-sm-0">
            <a href="{{ route('zadaci.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Dodaj zadatak
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="data-table">
        <div class="table-header">
            <h3 class="h6 mb-0"><i class="fas fa-list me-2"></i> Zadaci</h3>
        </div>
        <div class="table-content">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Opis</th>
                            <th>Status</th>
                            <th>Dodeljen</th>
                            <th>Proizvodna tura</th>
                            <th>Datum dodele</th>
                            <th>Datum završetka</th>
                            <th class="text-end">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($zadaci as $index => $zadatak)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $zadatak->opis }}</td>
                                <td>
                                    @if($zadatak->status === 'Na čekanju')
                                        <span class="badge bg-warning">Na čekanju</span>
                                    @elseif($zadatak->status === 'U toku')
                                        <span class="badge bg-primary">U toku</span>
                                    @else
                                        <span class="badge bg-success">Završen</span>
                                    @endif
                                </td>
                                <td>{{ optional($zadatak->user)->name ?? '—' }}</td>
                                <td>{{ optional($zadatak->proizvodnaTura)->naziv_ture ?? '—' }}</td>
                                <td>{{ optional($zadatak->datum_dodele)->format('d.m.Y') ?? '—' }}</td>
                                <td>{{ optional($zadatak->datum_zavrsetka)->format('d.m.Y') ?? '—' }}</td>
                                <td class="text-end">
                                    <form action="{{ route('zadatak.destroy', $zadatak) }}" method="POST" class="d-inline">
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
                                <td colspan="8" class="text-muted">Nema evidentiranih zadataka.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
