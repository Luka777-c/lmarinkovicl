@extends('layouts.auth')

@section('title', 'Registracija - Vinoteka')

@section('content')
    <h2 class="text-center mb-4">Registrujte se</h2>
    
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

    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Ime i prezime</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" 
                       class="form-control @error('name') is-invalid @enderror" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}" 
                       placeholder="Unesite vaše ime i prezime"
                       required 
                       autofocus>
            </div>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email adresa</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       placeholder="Unesite vašu email adresu"
                       required>
            </div>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Lozinka</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       id="password" 
                       name="password" 
                       placeholder="Unesite vašu lozinku (min. 3 karaktera)"
                       required>
            </div>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Potvrdite lozinku</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" 
                       class="form-control" 
                       id="password_confirmation" 
                       name="password_confirmation" 
                       placeholder="Ponovite vašu lozinku"
                       required>
            </div>
        </div>

        <div class="d-grid mb-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-user-plus me-2"></i>Registrujte se
            </button>
        </div>
    </form>

    <div class="auth-footer">
        <p class="mb-0">Već imate nalog? 
            <a href="{{ route('login') }}">Prijavite se ovde</a>
        </p>
    </div>
@endsection
