@extends('layouts.app')

@section('title', 'Nova narudžbenica')

@section('content')
    <div class="page-header d-flex flex-wrap align-items-center justify-content-between">
        <div class="me-3">
            <h1 class="page-title mb-1">Dodaj novu narudžbenicu</h1>
            <p class="page-subtitle text-muted mb-0">Unesite detalje narudžbenice</p>
        </div>
        <div class="mt-3 mt-sm-0">
            <a href="{{ route('narudzbenice.index') }}" class="btn btn-outline-primary">
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
        <form method="POST" action="{{ route('narudzbenice.store') }}" novalidate>
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="sirovina_ambalaza_id" class="form-label">Sirovina/Ambalaza</label>
                    <select class="form-select @error('sirovina_ambalaza_id') is-invalid @enderror" id="sirovina_ambalaza_id" name="sirovina_ambalaza_id" required>
                        <option value="">Izaberite sirovinu/ambalazu</option>
                        @foreach($sirovine as $sirovina)
                            <option value="{{ $sirovina->id }}" {{ old('sirovina_ambalaza_id') == $sirovina->id ? 'selected' : '' }}>
                                {{ $sirovina->naziv }}
                            </option>
                        @endforeach
                    </select>
                    @error('sirovina_ambalaza_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="kolicina" class="form-label">Količina</label>
                    <input type="number" min="1" class="form-control @error('kolicina') is-invalid @enderror" id="kolicina" name="kolicina" value="{{ old('kolicina') }}" required>
                    @error('kolicina')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="datum_nabavke" class="form-label">Datum nabavke</label>
                    <input type="date" class="form-control @error('datum_nabavke') is-invalid @enderror" id="datum_nabavke" name="datum_nabavke" value="{{ old('datum_nabavke') }}" required>
                    @error('datum_nabavke')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="dobavljac" class="form-label">Dobavljač</label>
                    <input type="text" class="form-control @error('dobavljac') is-invalid @enderror" id="dobavljac" name="dobavljac" value="{{ old('dobavljac') }}" required>
                    @error('dobavljac')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Sačuvaj</button>
                <a href="{{ route('narudzbenice.index') }}" class="btn btn-outline-primary">Otkaži</a>
            </div>
        </form>
    </div>
@endsection
