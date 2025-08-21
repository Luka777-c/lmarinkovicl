<?php

namespace App\Http\Controllers;

use App\Models\Narudzbenica;
use App\Models\ProizvodnaTura;
use App\Models\SirovinaAmbalaza;
use App\Models\Zadatak;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    try {
        $aktivneTure = ProizvodnaTura::where('status', '!=', 'Završeno')->count();
        $ukupnoZaliha = SirovinaAmbalaza::sum('kolicina_na_stanju');
        $aktivneNarudzbine = Narudzbenica::where('status', 'Na čekanju')->count();
        $nezavrsenihZadataka = Zadatak::where('status', '!=', 'Završen')->count();
        $ture = ProizvodnaTura::orderByDesc('created_at')->get();
    } catch (\Exception $e) {
        $aktivneTure = 0;
        $ukupnoZaliha = 0;
        $aktivneNarudzbine = 0;
        $nezavrsenihZadataka = 0;
        $ture = collect();
    }

    return view('home', compact('aktivneTure', 'ukupnoZaliha', 'aktivneNarudzbine', 'nezavrsenihZadataka', 'ture'));
}
}