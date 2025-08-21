@extends('layouts.app')

@section('title', 'Oprema')

@section('content')
    <div class="d-sm-none d-flex align-items-center justify-content-between bg-white p-3 rounded-3 shadow-sm mb-3">
        <button class="btn btn-primary" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <h2 class="mb-0">Oprema</h2>
        <div></div>
    </div>

    <div class="page-header d-flex flex-wrap align-items-center justify-content-between">
        <div class="me-3">
            <h1 class="page-title mb-1">Oprema</h1>
            <p class="page-subtitle text-muted mb-0">Pregled opreme (ukupno: {{ $oprema->count() }})</p>
        </div>
        <div class="mt-3 mt-sm-0">
            <a href="{{ route('oprema.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Dodaj opremu
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="data-table">
        <div class="table-header">
            <h3 class="h6 mb-0"><i class="fas fa-list me-2"></i> Oprema</h3>
        </div>
        <div class="table-content">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Naziv</th>
                            <th>Opis</th>
                            <th class="text-end">Godina proizvodnje</th>
                            <th class="text-end">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($oprema as $index => $stavka)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $stavka->naziv }}</td>
                                <td>{{ $stavka->opis }}</td>
                                <td class="text-end">{{ $stavka->godina_proizvodnje }}</td>
                                <td class="text-end">
                                    <form action="{{ route('oprema.destroy', $stavka) }}" method="POST" class="d-inline">
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
                                <td colspan="5" class="text-muted">Nema evidentirane opreme.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection 