@extends('layouts.app')

@section('title', 'Zalihe')

@section('content')
    <div class="d-sm-none d-flex align-items-center justify-content-between bg-white p-3 rounded-3 shadow-sm mb-3">
        <button class="btn btn-primary" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <h2 class="mb-0">Zalihe</h2>
        <div></div>
    </div>

    <div class="page-header d-flex flex-wrap align-items-center justify-content-between">
        <div class="me-3">
            <h1 class="page-title mb-1">Zalihe</h1>
            <p class="page-subtitle text-muted mb-0">Pregled svih zaliha (ukupno: {{ $zalihe->count() }})</p>
        </div>
        <div class="mt-3 mt-sm-0">
            <a href="{{ route('zalihe.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Nova zaliha
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="data-table">
        <div class="table-header">
            <h3 class="h6 mb-0"><i class="fas fa-list me-2"></i> Sve zalihe</h3>
        </div>
        <div class="table-content">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Naziv</th>
                            <th>Tip</th>
                            <th class="text-end">Količina na stanju</th>
                            <th class="text-end">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($zalihe as $index => $stavka)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $stavka->naziv }}</td>
                                <td>{{ $stavka->tip }}</td>
                                <td class="text-end">{{ number_format($stavka->kolicina_na_stanju, 0, ',', '.') }}</td>
                                <td class="text-end">
                                    <form action="{{ route('zaliha.destroy', $stavka) }}" method="POST">
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
                                <td colspan="4" class="text-muted">Nema evidentiranih zaliha.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection 