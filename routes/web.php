<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NarudzbenicaController;
use App\Http\Controllers\OpremaController;
use App\Http\Controllers\ProizvodnaTuraController;
use App\Http\Controllers\ZaliheController;
use App\Models\Oprema;

// Početna stranica
Route::get('/', [HomeController::class, 'index'])->name('home');

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

//Oprema
Route::get('/oprema', [OpremaController::class, 'index'])->name('oprema.index');

Route::get('/oprema/nova', [OpremaController::class, 'create'])->name('oprema.create');
Route::post('/oprema', [OpremaController::class, 'store'])->name('oprema.store');
Route::delete('/oprema/{oprema}', [OpremaController::class, 'destroy'])->name('oprema.destroy');

// Narudžbenice
Route::get('/narudzbenice', [NarudzbenicaController::class, 'index'])->name('narudzbenice.index');

Route::get('/narudzbenice/nova', [NarudzbenicaController::class, 'create'])->name('narudzbenice.create');
Route::post('/narudzbenice', [NarudzbenicaController::class, 'store'])->name('narudzbenice.store');

Route::delete('/narudzbenica/{nabavka}', [NarudzbenicaController::class, 'destroy'])->name('narudzbenica.destroy');
