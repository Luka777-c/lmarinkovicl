<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontaktController;
use App\Http\Controllers\NarudzbenicaController;
use App\Http\Controllers\OpremaController;
use App\Http\Controllers\ProizvodnaTuraController;
use App\Http\Controllers\PublicNarudzbenicaController;
use App\Http\Controllers\ZadatakController;
use App\Http\Controllers\ZaliheController;
use App\Models\Oprema;

// Autentifikacija
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Javna početna stranica
Route::get('/', function () {
    return redirect()->route('public.narudzbenice.index');
})->name('public.home');

// Javne narudžbenice (use case za obične korisnike)
Route::get('/public/narudzbenice', [PublicNarudzbenicaController::class, 'index'])->name('public.narudzbenice.index');
Route::get('/public/narudzbenice/nova', [PublicNarudzbenicaController::class, 'create'])->name('public.narudzbenice.create');
Route::post('/public/narudzbenice', [PublicNarudzbenicaController::class, 'store'])->name('public.narudzbenice.store');
Route::get('/public/narudzbenice/{narudzbenica}', [PublicNarudzbenicaController::class, 'show'])->name('public.narudzbenice.show');

// Zaštićene rute (zahtevaju autentifikaciju)
Route::middleware(['auth'])->group(function () {
    // Admin početna stranica
    Route::get('/admin', [HomeController::class, 'index'])->name('home');

    // Proizvodne ture
    Route::get('/ture', [ProizvodnaTuraController::class, 'index'])->name('ture.index');
    Route::get('/ture/nova', [ProizvodnaTuraController::class, 'create'])->name('ture.create');
    Route::post('/ture', [ProizvodnaTuraController::class, 'store'])->name('ture.store');
    Route::delete('/ture/{tura}', [ProizvodnaTuraController::class, 'destroy'])->name('ture.destroy');

    // Zalihe
    Route::get('/zalihe', [ZaliheController::class, 'index'])->name('zalihe.index');
    Route::get('/zalihe/nova', [ZaliheController::class, 'create'])->name('zalihe.create');
    Route::post('/zalihe', [ZaliheController::class, 'store'])->name('zalihe.store');
    Route::delete('/zaliha/{zaliha}', [ZaliheController::class, 'destroy'])->name('zaliha.destroy');

    // Oprema
    Route::get('/oprema', [OpremaController::class, 'index'])->name('oprema.index');
    Route::get('/oprema/nova', [OpremaController::class, 'create'])->name('oprema.create');
    Route::post('/oprema', [OpremaController::class, 'store'])->name('oprema.store');
    Route::delete('/oprema/{oprema}', [OpremaController::class, 'destroy'])->name('oprema.destroy');

    // Narudžbenice
    Route::get('/narudzbenice', [NarudzbenicaController::class, 'index'])->name('narudzbenice.index');
    Route::get('/narudzbenice/nova', [NarudzbenicaController::class, 'create'])->name('narudzbenice.create');
    Route::post('/narudzbenice', [NarudzbenicaController::class, 'store'])->name('narudzbenice.store');
    Route::delete('/narudzbenica/{nabavka}', [NarudzbenicaController::class, 'destroy'])->name('narudzbenica.destroy');

    // Zadatci
    Route::get('/zadaci', [ZadatakController::class, 'index'])->name('zadaci.index');
    Route::get('/zadaci/novi', [ZadatakController::class, 'create'])->name('zadaci.create');
    Route::post('/zadaci', [ZadatakController::class, 'store'])->name('zadaci.store');
    Route::delete('/zadatak/{zadatak}', [ZadatakController::class, 'destroy'])->name('zadatak.destroy');

    // Kontakt
    Route::get('/kontakt', [KontaktController::class, 'index'])->name('kontakt.index');
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
