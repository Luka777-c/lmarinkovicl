@extends('layouts.app')

@section('title', 'Kontakt')

@section('content')
    <div class="d-sm-none d-flex align-items-center justify-content-between bg-white p-3 rounded-3 shadow-sm mb-3">
        <button class="btn btn-primary" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <h2 class="mb-0">Kontakt</h2>
        <div></div>
    </div>

    <div class="page-header d-flex flex-wrap align-items-center justify-content-between">
        <div class="me-3">
            <h1 class="page-title mb-1">Kontakt</h1>
            <p class="page-subtitle text-muted mb-0">Informacije o vinoteci i način komunikacije</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Kontakt informacije -->
        <div class="col-lg-6">
            <div class="quick-actions">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="h5 mb-0"><i class="fas fa-info-circle me-2"></i>Informacije o vinoteci</h3>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-map-marker-alt text-primary fs-4 me-3"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Adresa</h5>
                                        <p class="mb-0 text-muted">Vinogradska 123<br>21000 Novi Sad, Srbija</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-phone text-primary fs-4 me-3"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Telefon</h5>
                                        <p class="mb-0 text-muted">+381 21 123 4567</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-envelope text-primary fs-4 me-3"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Email</h5>
                                        <p class="mb-0 text-muted">info@vinoteka.rs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-clock text-primary fs-4 me-3"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Radno vreme</h5>
                                        <p class="mb-0 text-muted">
                                            Pon-Pet: 08:00 - 17:00<br>
                                            Subota: 08:00 - 14:00<br>
                                            Nedelja: Ne radimo
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- O nama -->
        <div class="col-lg-6">
            <div class="quick-actions">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h3 class="h5 mb-0"><i class="fas fa-wine-bottle me-2"></i>O nama</h3>
                    </div>
                    <div class="card-body">
                        <p class="mb-3">
                            Naša vinoteka je porodično preduzeće sa dugogodišnjom tradicijom u proizvodnji kvalitetnih vina. 
                            Posvećeni smo očuvanju tradicionalnih metoda uz primenu modernih tehnologija.
                        </p>
                        <p class="mb-3">
                            Specijalizovani smo za proizvodnju:
                        </p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Crvenih vina (Merlot, Cabernet Sauvignon)</li>
                            <li><i class="fas fa-check text-success me-2"></i>Belih vina (Chardonnay, Sauvignon Blanc)</li>
                            <li><i class="fas fa-check text-success me-2"></i>Roze vina</li>
                            <li><i class="fas fa-check text-success me-2"></i>Šampanjaca i penušavih vina</li>
                        </ul>
                        <p class="mb-0">
                            Naša vina se proizvode od grožđa iz sopstvenih vinograda, 
                            što nam omogućava potpunu kontrolu nad kvalitetom od berbe do flaše.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistike -->
        <div class="col-12">
            <div class="quick-actions">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h3 class="h5 mb-0"><i class="fas fa-chart-bar me-2"></i>Naša statistika</h3>
                    </div>
                    <div class="card-body">
                        <div class="row g-4 text-center">
                            <div class="col-md-3">
                                <div class="p-3">
                                    <i class="fas fa-calendar-alt text-info fs-1 mb-3"></i>
                                    <h4 class="mb-1">25+</h4>
                                    <p class="text-muted mb-0">Godina iskustva</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3">
                                    <i class="fas fa-wine-bottle text-info fs-1 mb-3"></i>
                                    <h4 class="mb-1">50,000+</h4>
                                    <p class="text-muted mb-0">Flaša godišnje</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3">
                                    <i class="fas fa-users text-info fs-1 mb-3"></i>
                                    <h4 class="mb-1">15</h4>
                                    <p class="text-muted mb-0">Zaposlenih</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3">
                                    <i class="fas fa-award text-info fs-1 mb-3"></i>
                                    <h4 class="mb-1">20+</h4>
                                    <p class="text-muted mb-0">Nagrada</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kontakt forma -->
        <div class="col-12">
            <div class="quick-actions">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h3 class="h5 mb-0"><i class="fas fa-envelope me-2"></i>Pošaljite nam poruku</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="ime" class="form-label">Ime i prezime</label>
                                    <input type="text" class="form-control" id="ime" name="ime" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email adresa</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-12">
                                    <label for="naslov" class="form-label">Naslov poruke</label>
                                    <input type="text" class="form-control" id="naslov" name="naslov" required>
                                </div>
                                <div class="col-12">
                                    <label for="poruka" class="form-label">Poruka</label>
                                    <textarea class="form-control" id="poruka" name="poruka" rows="5" placeholder="Unesite vašu poruku..." required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fas fa-paper-plane me-2"></i>Pošalji poruku
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
