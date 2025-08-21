@extends('layouts.app')

@section('title', 'Nova oprema')

@section('content')
    <div class="page-header d-flex flex-wrap align-items-center justify-content-between">
        <div class="me-3">
            <h1 class="page-title mb-1">Dodaj novu opremu</h1>
            <p class="page-subtitle text-muted mb-0">Unesite detalje opreme</p>
        </div>
        <div class="mt-3 mt-sm-0">
            <a href="{{ route('oprema.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i> Nazad na listu
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <div class="fw-bold mb-1">Došlo je do greške:</div>
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="quick-actions">
        <form method="POST" action="{{ route('oprema.store') }}" novalidate>
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="naziv" class="form-label">Naziv</label>
                    <input type="text" class="form-control @error('naziv') is-invalid @enderror" id="naziv" name="naziv" value="{{ old('naziv') }}" required>
                    @error('naziv')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="godina_proizvodnje" class="form-label">Godina proizvodnje</label>
                    <input type="number" min="1900" max="{{ date('Y') }}" class="form-control @error('godina_proizvodnje') is-invalid @enderror" id="godina_proizvodnje" name="godina_proizvodnje" value="{{ old('godina_proizvodnje') }}" required>
                    @error('godina_proizvodnje')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="opis" class="form-label">Opis (opciono)</label>
                    <textarea class="form-control @error('opis') is-invalid @enderror" id="opis" name="opis" rows="4" placeholder="Unesite opis opreme">{{ old('opis') }}</textarea>
                    @error('opis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Sačuvaj</button>
                <a href="{{ route('oprema.index') }}" class="btn btn-outline-primary">Otkaži</a>
            </div>
        </form>
    </div>
@endsection
