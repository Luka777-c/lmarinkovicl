<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProizvodnaTuraController;

// Početna stranica
Route::get('/', [HomeController::class, 'index'])->name('home');

// Proizvodne ture
Route::get('/ture', [ProizvodnaTuraController::class, 'index'])->name('ture.index');
Route::get('/ture/nova', [ProizvodnaTuraController::class, 'create'])->name('ture.create');
Route::post('/ture', [ProizvodnaTuraController::class, 'store'])->name('ture.store');
Route::delete('/ture/{tura}', [ProizvodnaTuraController::class, 'destroy'])->name('ture.destroy');