<?php

namespace App\Http\Controllers;

use App\Models\Nabavka;
use App\Models\SirovinaAmbalaza;
use Illuminate\Http\Request;

class NarudzbenicaController extends Controller
{
    public function index()
    {
        $narudzbenice = Nabavka::with('sirovinaAmbalaza')->orderByDesc('created_at')->get();
        return view('narudzbenice', compact('narudzbenice'));
    }

    public function create()
    {
        $sirovine = SirovinaAmbalaza::orderBy('naziv')->get();
        return view('narudzbenice-create', compact('sirovine'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kolicina' => ['required', 'integer', 'min:1'],
            'datum_nabavke' => ['required', 'date'],
            'dobavljac' => ['required', 'string', 'max:255'],
            'sirovina_ambalaza_id' => ['required', 'exists:sirovina_ambalaza,id'],
        ]);

        Nabavka::create($validated);

        return redirect()->route('narudzbenice.index')->with('success', 'Narudžbenica je uspešno dodata.');
    }

    public function destroy(Nabavka $nabavka)
    {
        $nabavka->delete();
        return redirect()->route('narudzbenice.index')->with('success', 'Narudžbenica je obrisana.');
    }
}
