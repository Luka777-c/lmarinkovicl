<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProizvodnaTuraController;
use App\Http\Controllers\ZaliheController;

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

