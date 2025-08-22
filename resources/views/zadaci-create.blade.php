@extends('layouts.app')

@section('title', 'Novi zadatak')

@section('content')
    <div class="page-header d-flex flex-wrap align-items-center justify-content-between">
        <div class="me-3">
            <h1 class="page-title mb-1">Dodaj novi zadatak</h1>
            <p class="page-subtitle text-muted mb-0">Unesite detalje zadatka</p>
        </div>
        <div class="mt-3 mt-sm-0">
            <a href="{{ route('zadaci.index') }}" class="btn btn-outline-primary">
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
        <form method="POST" action="{{ route('zadaci.store') }}" novalidate>
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="opis" class="form-label">Opis zadatka</label>
                    <textarea class="form-control @error('opis') is-invalid @enderror" id="opis" name="opis" rows="4" placeholder="Unesite opis zadatka" required>{{ old('opis') }}</textarea>
                    @error('opis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="">Izaberite status</option>
                        <option value="Na čekanju" {{ old('status') == 'Na čekanju' ? 'selected' : '' }}>Na čekanju</option>
                        <option value="U toku" {{ old('status') == 'U toku' ? 'selected' : '' }}>U toku</option>
                        <option value="Završen" {{ old('status') == 'Završen' ? 'selected' : '' }}>Završen</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="user_id" class="form-label">Dodeljen korisniku</label>
                    <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                        <option value="">Izaberite korisnika</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="tura_id" class="form-label">Proizvodna tura</label>
                    <select class="form-select @error('tura_id') is-invalid @enderror" id="tura_id" name="tura_id" required>
                        <option value="">Izaberite proizvodnu turu</option>
                        @foreach($ture as $tura)
                            <option value="{{ $tura->id }}" {{ old('tura_id') == $tura->id ? 'selected' : '' }}>
                                {{ $tura->naziv_ture }}
                            </option>
                        @endforeach
                    </select>
                    @error('tura_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="datum_dodele" class="form-label">Datum dodele</label>
                    <input type="date" class="form-control @error('datum_dodele') is-invalid @enderror" id="datum_dodele" name="datum_dodele" value="{{ old('datum_dodele') }}" required>
                    @error('datum_dodele')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="datum_zavrsetka" class="form-label">Datum završetka (opciono)</label>
                    <input type="date" class="form-control @error('datum_zavrsetka') is-invalid @enderror" id="datum_zavrsetka" name="datum_zavrsetka" value="{{ old('datum_zavrsetka') }}">
                    @error('datum_zavrsetka')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Sačuvaj</button>
                <a href="{{ route('zadaci.index') }}" class="btn btn-outline-primary">Otkaži</a>
            </div>
        </form>
    </div>
@endsection
