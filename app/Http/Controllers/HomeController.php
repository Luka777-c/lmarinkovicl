<?php

namespace App\Http\Controllers;

use App\Models\Nabavka;
use App\Models\ProizvodnaTura;
use App\Models\SirovinaAmbalaza;
use App\Models\Zadatak;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // Aktivne proizvodne ture (sve osim završenih)
            $aktivneTure = ProizvodnaTura::where('status', '!=', 'Završeno')->count();
            
            // Ukupne zalihe (suma količina na stanju)
            $ukupnoZaliha = SirovinaAmbalaza::sum('kolicina_na_stanju') ?? 0;
            
            // Ukupan broj narudžbenica (nabavki)
            $aktivneNarudzbine = Nabavka::count();
            
            // Nezavršeni zadaci (sve osim završenih)
            $nezavrsenihZadataka = Zadatak::where('status', '!=', 'Završen')->count();
            
            // Poslednje proizvodne ture
            $ture = ProizvodnaTura::orderByDesc('created_at')->limit(5)->get();
            
            // Poslednje zadatke
            $zadaci = Zadatak::with(['user', 'proizvodnaTura'])->orderByDesc('created_at')->limit(5)->get();
            
            // Poslednje nabavke
            $nabavke = Nabavka::with('sirovinaAmbalaza')->orderByDesc('created_at')->limit(5)->get();
            
        } catch (\Exception $e) {
            \Log::error('HomeController error: ' . $e->getMessage());
            $aktivneTure = 0;
            $ukupnoZaliha = 0;
            $aktivneNarudzbine = 0;
            $nezavrsenihZadataka = 0;
            $ture = collect();
            $zadaci = collect();
            $nabavke = collect();
        }

        return view('home', compact(
            'aktivneTure', 
            'ukupnoZaliha', 
            'aktivneNarudzbine', 
            'nezavrsenihZadataka', 
            'ture',
            'zadaci',
            'nabavke'
        ));
    }
}