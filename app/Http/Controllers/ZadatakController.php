<?php

namespace App\Http\Controllers;

use App\Models\Zadatak;
use App\Models\User;
use App\Models\ProizvodnaTura;
use Illuminate\Http\Request;

class ZadatakController extends Controller
{
    public function index()
    {
        $zadaci = Zadatak::with(['user', 'proizvodnaTura'])->orderByDesc('created_at')->get();
        return view('zadaci', compact('zadaci'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        $ture = ProizvodnaTura::orderByDesc('created_at')->get();
        return view('zadaci-create', compact('users', 'ture'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'opis' => ['required', 'string', 'max:1000'],
            'status' => ['required', 'string', 'in:Na čekanju,U toku,Završen'],
            'datum_dodele' => ['required', 'date'],
            'datum_zavrsetka' => ['nullable', 'date', 'after_or_equal:datum_dodele'],
            'user_id' => ['required', 'exists:users,id'],
            'tura_id' => ['required', 'exists:proizvodna_tura,id'],
        ]);

        Zadatak::create($validated);

        return redirect()->route('zadaci.index')->with('success', 'Zadatak je uspešno dodat.');
    }

    public function destroy(Zadatak $zadatak)
    {
        $zadatak->delete();
        return redirect()->route('zadaci.index')->with('success', 'Zadatak je obrisan.');
    }
}
