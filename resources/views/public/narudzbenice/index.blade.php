@extends('layouts.public')

@section('title', 'Javne narudžbenice')

@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="page-title">Javne narudžbenice</h1>
                <p class="text-muted mb-0">Pregled svih narudžbenica u sistemu</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ route('public.narudzbenice.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Nova narudžbenica
                </a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-list me-2"></i>Lista narudžbenica</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sirovina/Ambalaza</th>
                            <th>Količina</th>
                            <th>Datum nabavke</th>
                            <th>Dobavljač</th>
                            <th>Datum kreiranja</th>
                            <th>Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($narudzbenice as $index => $narudzbenica)
                            <tr>
                                <td>{{ $index + 1 + ($narudzbenice->currentPage() - 1) * $narudzbenice->perPage() }}</td>
                                <td>
                                    <strong>{{ optional($narudzbenica->sirovinaAmbalaza)->naziv ?? '—' }}</strong>
                                    @if(optional($narudzbenica->sirovinaAmbalaza)->tip)
                                        <br><small class="text-muted">{{ $narudzbenica->sirovinaAmbalaza->tip }}</small>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-primary">{{ number_format($narudzbenica->kolicina, 0, ',', '.') }}</span>
                                </td>
                                <td>{{ optional($narudzbenica->datum_nabavke)->format('d.m.Y') ?? '—' }}</td>
                                <td>{{ $narudzbenica->dobavljac }}</td>
                                <td>{{ optional($narudzbenica->created_at)->format('d.m.Y H:i') ?? '—' }}</td>
                                <td>
                                    <a href="{{ route('public.narudzbenice.show', $narudzbenica) }}" 
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye me-1"></i>Detalji
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-inbox fa-2x mb-3"></i>
                                        <p class="mb-0">Nema narudžbenica za prikaz.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($narudzbenice->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $narudzbenice->links() }}
        </div>
    @endif
@endsection
