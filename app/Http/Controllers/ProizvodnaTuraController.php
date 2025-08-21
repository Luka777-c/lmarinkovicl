<?php

namespace App\Http\Controllers;

use App\Models\ProizvodnaTura;
use Illuminate\Http\Request;

class ProizvodnaTuraController extends Controller
{
    public function index()
    {
        $ture = ProizvodnaTura::orderByDesc('created_at')->get();

        return view('ture', compact('ture'));
    }

    public function create()
    {
        return view('ture-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naziv_ture' => ['required', 'string', 'max:255'],
            'vrsta_grozdja' => ['required', 'string', 'max:255'],
            'kolicina' => ['required', 'integer', 'min:1'],
            'datum_branja' => ['required', 'date'],
            'status' => ['required', 'string', 'in:Planirano,Fermentacija,Odležavanje,Flaširano,Završeno'],
            'datum_pocetka_fermentacije' => ['nullable', 'date'],
        ]);

        ProizvodnaTura::create($validated);

        return redirect()->route('ture.index')->with('success', 'Proizvodna tura je uspešno kreirana.');
    }
} 