@extends('layouts.app')

@section('title', 'Nova tura')

@section('content')
    <div class="page-header d-flex flex-wrap align-items-center justify-content-between">
        <div class="me-3">
            <h1 class="page-title mb-1">Kreiraj novu proizvodnu turu</h1>
            <p class="page-subtitle text-muted mb-0">Unesite detalje nove ture</p>
        </div>
        <div class="mt-3 mt-sm-0">
            <a href="{{ route('ture.index') }}" class="btn btn-outline-primary">
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
        <form method="POST" action="{{ route('ture.store') }}" novalidate>
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="naziv_ture" class="form-label">Naziv ture</label>
                    <input type="text" class="form-control @error('naziv_ture') is-invalid @enderror" id="naziv_ture" name="naziv_ture" value="{{ old('naziv_ture') }}" required>
                    @error('naziv_ture')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="vrsta_grozdja" class="form-label">Vrsta grožđa</label>
                    <input type="text" class="form-control @error('vrsta_grozdja') is-invalid @enderror" id="vrsta_grozdja" name="vrsta_grozdja" value="{{ old('vrsta_grozdja') }}" required>
                    @error('vrsta_grozdja')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="kolicina" class="form-label">Količina (L)</label>
                    <input type="number" min="1" class="form-control @error('kolicina') is-invalid @enderror" id="kolicina" name="kolicina" value="{{ old('kolicina') }}" required>
                    @error('kolicina')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="datum_branja" class="form-label">Datum branja</label>
                    <input type="date" class="form-control @error('datum_branja') is-invalid @enderror" id="datum_branja" name="datum_branja" value="{{ old('datum_branja') }}" required>
                    @error('datum_branja')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        @php $statuses = ['Planirano','Fermentacija','Odležavanje','Flaširano','Završeno']; @endphp
                        <option value="" disabled {{ old('status') ? '' : 'selected' }}>Izaberite status</option>
                        @foreach ($statuses as $st)
                            <option value="{{ $st }}" {{ old('status') === $st ? 'selected' : '' }}>{{ $st }}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="datum_pocetka_fermentacije" class="form-label">Datum početka fermentacije (opciono)</label>
                    <input type="date" class="form-control @error('datum_pocetka_fermentacije') is-invalid @enderror" id="datum_pocetka_fermentacije" name="datum_pocetka_fermentacije" value="{{ old('datum_pocetka_fermentacije') }}">
                    @error('datum_pocetka_fermentacije')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Sačuvaj</button>
                <a href="{{ route('ture.index') }}" class="btn btn-outline-primary">Otkaži</a>
            </div>
        </form>
    </div>
@endsection 
@extends('layouts.app')

@section('title', 'Nova tura')

@section('content')
    <div class="page-header d-flex flex-wrap align-items-center justify-content-between">
        <div class="me-3">
            <h1 class="page-title mb-1">Kreiraj novu proizvodnu turu</h1>
            <p class="page-subtitle text-muted mb-0">Unesite detalje nove ture</p>
        </div>
        <div class="mt-3 mt-sm-0">
            <a href="{{ route('ture.index') }}" class="btn btn-outline-primary">
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
        <form method="POST" action="{{ route('ture.store') }}" novalidate>
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="naziv_ture" class="form-label">Naziv ture</label>
                    <input type="text" class="form-control @error('naziv_ture') is-invalid @enderror" id="naziv_ture" name="naziv_ture" value="{{ old('naziv_ture') }}" required>
                    @error('naziv_ture')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="vrsta_grozdja" class="form-label">Vrsta grožđa</label>
                    <input type="text" class="form-control @error('vrsta_grozdja') is-invalid @enderror" id="vrsta_grozdja" name="vrsta_grozdja" value="{{ old('vrsta_grozdja') }}" required>
                    @error('vrsta_grozdja')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="kolicina" class="form-label">Količina (L)</label>
                    <input type="number" min="1" class="form-control @error('kolicina') is-invalid @enderror" id="kolicina" name="kolicina" value="{{ old('kolicina') }}" required>
                    @error('kolicina')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="datum_branja" class="form-label">Datum branja</label>
                    <input type="date" class="form-control @error('datum_branja') is-invalid @enderror" id="datum_branja" name="datum_branja" value="{{ old('datum_branja') }}" required>
                    @error('datum_branja')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        @php $statuses = ['Planirano','Fermentacija','Odležavanje','Flaširano','Završeno']; @endphp
                        <option value="" disabled {{ old('status') ? '' : 'selected' }}>Izaberite status</option>
                        @foreach ($statuses as $st)
                            <option value="{{ $st }}" {{ old('status') === $st ? 'selected' : '' }}>{{ $st }}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="datum_pocetka_fermentacije" class="form-label">Datum početka fermentacije (opciono)</label>
                    <input type="date" class="form-control @error('datum_pocetka_fermentacije') is-invalid @enderror" id="datum_pocetka_fermentacije" name="datum_pocetka_fermentacije" value="{{ old('datum_pocetka_fermentacije') }}">
                    @error('datum_pocetka_fermentacije')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Sačuvaj</button>
                <a href="{{ route('ture.index') }}" class="btn btn-outline-primary">Otkaži</a>
            </div>
        </form>
    </div>
@endsection 