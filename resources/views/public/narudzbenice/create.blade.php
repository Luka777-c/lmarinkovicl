@extends('layouts.public')

@section('title', 'Nova narudžbenica')

@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="page-title">Nova narudžbenica</h1>
                <p class="text-muted mb-0">Kreirajte novu narudžbenicu za sirovine ili ambalazu</p>
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
                    <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Detalji narudžbenice</h5>
                </div>
                <div class="card-body">
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

                    <form method="POST" action="{{ route('public.narudzbenice.store') }}" novalidate>
                        @csrf
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="sirovina_ambalaza_id" class="form-label">
                                    Sirovina/Ambalaza <span class="text-danger">*</span>
                                </label>
                                <select class="form-select @error('sirovina_ambalaza_id') is-invalid @enderror" 
                                        id="sirovina_ambalaza_id" 
                                        name="sirovina_ambalaza_id" 
                                        required>
                                    <option value="">Izaberite sirovinu/ambalazu</option>
                                    @foreach($sirovine as $sirovina)
                                        <option value="{{ $sirovina->id }}" 
                                                {{ old('sirovina_ambalaza_id') == $sirovina->id ? 'selected' : '' }}>
                                            {{ $sirovina->naziv }} 
                                            ({{ $sirovina->tip }} - {{ number_format($sirovina->kolicina_na_stanju, 0, ',', '.') }} na stanju)
                                        </option>
                                    @endforeach
                                </select>
                                @error('sirovina_ambalaza_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="kolicina" class="form-label">
                                    Količina <span class="text-danger">*</span>
                                </label>
                                <input type="number" 
                                       class="form-control @error('kolicina') is-invalid @enderror" 
                                       id="kolicina" 
                                       name="kolicina" 
                                       value="{{ old('kolicina') }}" 
                                       min="1"
                                       placeholder="Unesite količinu"
                                       required>
                                @error('kolicina')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="datum_nabavke" class="form-label">
                                    Datum nabavke <span class="text-danger">*</span>
                                </label>
                                <input type="date" 
                                       class="form-control @error('datum_nabavke') is-invalid @enderror" 
                                       id="datum_nabavke" 
                                       name="datum_nabavke" 
                                       value="{{ old('datum_nabavke') }}" 
                                       required>
                                @error('datum_nabavke')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="dobavljac" class="form-label">
                                    Dobavljač <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('dobavljac') is-invalid @enderror" 
                                       id="dobavljac" 
                                       name="dobavljac" 
                                       value="{{ old('dobavljac') }}" 
                                       placeholder="Unesite naziv dobavljača"
                                       required>
                                @error('dobavljac')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="napomena" class="form-label">Napomena (opciono)</label>
                                <textarea class="form-control @error('napomena') is-invalid @enderror" 
                                          id="napomena" 
                                          name="napomena" 
                                          rows="4" 
                                          placeholder="Dodajte napomenu ili dodatne informacije...">{{ old('napomena') }}</textarea>
                                @error('napomena')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Pošalji narudžbenicu
                            </button>
                            <a href="{{ route('public.narudzbenice.index') }}" class="btn btn-outline-secondary">
                                Otkaži
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
