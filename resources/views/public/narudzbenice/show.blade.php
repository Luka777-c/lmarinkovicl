@extends('layouts.public')

@section('title', 'Detalji narudžbenice')

@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="page-title">Detalji narudžbenice</h1>
                <p class="text-muted mb-0">Pregled detalja narudžbenice #{{ $narudzbenica->id }}</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ route('public.narudzbenice.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i>Nazad na listu
                </a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informacije o narudžbenici</h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-box text-primary fs-4 me-3"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Sirovina/Ambalaza</h6>
                                    <p class="mb-0 text-muted">
                                        <strong>{{ optional($narudzbenica->sirovinaAmbalaza)->naziv ?? '—' }}</strong>
                                        @if(optional($narudzbenica->sirovinaAmbalaza)->tip)
                                            <br><small>{{ $narudzbenica->sirovinaAmbalaza->tip }}</small>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-sort-numeric-up text-primary fs-4 me-3"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Količina</h6>
                                    <p class="mb-0">
                                        <span class="badge bg-primary fs-6">
                                            {{ number_format($narudzbenica->kolicina, 0, ',', '.') }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-calendar text-primary fs-4 me-3"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Datum nabavke</h6>
                                    <p class="mb-0 text-muted">
                                        {{ optional($narudzbenica->datum_nabavke)->format('d.m.Y') ?? '—' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-building text-primary fs-4 me-3"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Dobavljač</h6>
                                    <p class="mb-0 text-muted">{{ $narudzbenica->dobavljac }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-clock text-primary fs-4 me-3"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Datum kreiranja</h6>
                                    <p class="mb-0 text-muted">
                                        {{ optional($narudzbenica->created_at)->format('d.m.Y H:i') ?? '—' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-clock text-primary fs-4 me-3"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Poslednja izmena</h6>
                                    <p class="mb-0 text-muted">
                                        {{ optional($narudzbenica->updated_at)->format('d.m.Y H:i') ?? '—' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        @if($narudzbenica->napomena)
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-sticky-note text-primary fs-4 me-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Napomena</h6>
                                        <p class="mb-0 text-muted">{{ $narudzbenica->napomena }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Dodatne informacije o sirovini -->
            @if($narudzbenica->sirovinaAmbalaza)
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informacije o sirovini</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <strong>Naziv:</strong> {{ $narudzbenica->sirovinaAmbalaza->naziv }}
                            </div>
                            <div class="col-md-6">
                                <strong>Tip:</strong> {{ $narudzbenica->sirovinaAmbalaza->tip }}
                            </div>
                            <div class="col-md-6">
                                <strong>Količina na stanju:</strong> 
                                <span class="badge bg-success">
                                    {{ number_format($narudzbenica->sirovinaAmbalaza->kolicina_na_stanju, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
