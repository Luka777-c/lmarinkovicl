@extends('layouts.app')

@section('title', 'Nova zaliha')

@section('content')
    <div class="page-header d-flex flex-wrap align-items-center justify-content-between">
        <div class="me-3">
            <h1 class="page-title mb-1">Kreiraj novu zalihu</h1>
            <p class="page-subtitle text-muted mb-0">Unesite detalje nove zalihe</p>
        </div>
        <div class="mt-3 mt-sm-0">
            <a href="{{ route('zalihe.index') }}" class="btn btn-outline-primary">
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
        <form method="POST" action="{{ route('zalihe.store') }}" novalidate>
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
                    <label for="tip" class="form-label">Tip</label>
                    <select class="form-select @error('tip') is-invalid @enderror" id="tip" name="tip" required>
                        @php $tipovi = ['Ambalaža', 'Sirovina']; @endphp
                        <option value="" disabled {{ old('tip') ? '' : 'selected' }}>Izaberite tip</option>
                        @foreach ($tipovi as $t)
                            <option value="{{ $t }}" {{ old('tip') === $t ? 'selected' : '' }}>{{ $t }}</option>
                        @endforeach
                    </select>
                    @error('tip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="kolicina_na_stanju" class="form-label">Količina na stanju</label>
                    <input type="number" min="1" class="form-control @error('kolicina_na_stanju') is-invalid @enderror" id="kolicina_na_stanju" name="kolicina_na_stanju" value="{{ old('kolicina_na_stanju') }}" required>
                    @error('kolicina_na_stanju')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Sačuvaj</button>
                <a href="{{ route('zalihe.index') }}" class="btn btn-outline-primary">Otkaži</a>
            </div>
        </form>
    </div>
@endsection 