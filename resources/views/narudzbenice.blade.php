@extends('layouts.app')

@section('title', 'Narudžbenice')

@section('content')
    <div class="d-sm-none d-flex align-items-center justify-content-between bg-white p-3 rounded-3 shadow-sm mb-3">
        <button class="btn btn-primary" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <h2 class="mb-0">Narudžbenice</h2>
        <div></div>
    </div>

    <div class="page-header d-flex flex-wrap align-items-center justify-content-between">
        <div class="me-3">
            <h1 class="page-title mb-1">Narudžbenice</h1>
            <p class="page-subtitle text-muted mb-0">Pregled narudžbenica (ukupno: {{ $narudzbenice->count() }})</p>
        </div>
        <div class="mt-3 mt-sm-0">
            <a href="{{ route('narudzbenice.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Dodaj narudžbenicu
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="data-table">
        <div class="table-header">
            <h3 class="h6 mb-0"><i class="fas fa-list me-2"></i> Narudžbenice</h3>
        </div>
        <div class="table-content">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sirovina/Ambalaza</th>
                            <th>Količina</th>
                            <th>Datum nabavke</th>
                            <th>Dobavljač</th>
                            <th class="text-end">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($narudzbenice as $index => $narudzbenica)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $narudzbenica->sirovinaAmbalaza->naziv }}</td>
                                <td>{{ $narudzbenica->kolicina }}</td>
                                <td>{{ $narudzbenica->datum_nabavke->format('d.m.Y') }}</td>
                                <td>{{ $narudzbenica->dobavljac }}</td>
                                <td class="text-end">
                                    <form action="{{ route('narudzbenica.destroy', $narudzbenica) }}" method="POST" class="d-inline">
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
                                <td colspan="6" class="text-muted">Nema evidentiranih narudžbenica.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
