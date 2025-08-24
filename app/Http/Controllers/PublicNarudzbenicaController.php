<?php

namespace App\Http\Controllers;

use App\Models\Nabavka;
use App\Models\SirovinaAmbalaza;
use Illuminate\Http\Request;

class PublicNarudzbenicaController extends Controller
{
    /**
     * Prikazuje javnu listu narudžbenica (samo za pregled)
     */
    public function index()
    {
        $narudzbenice = Nabavka::with('sirovinaAmbalaza')
            ->orderByDesc('created_at')
            ->paginate(10);
            
        return view('public.narudzbenice.index', compact('narudzbenice'));
    }

    /**
     * Prikazuje formu za kreiranje nove javne narudžbenice
     */
    public function create()
    {
        $sirovine = SirovinaAmbalaza::where('kolicina_na_stanju', '>', 0)
            ->orderBy('naziv')
            ->get();
            
        return view('public.narudzbenice.create', compact('sirovine'));
    }

    /**
     * Čuva novu javnu narudžbenicu
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kolicina' => ['required', 'integer', 'min:1'],
            'datum_nabavke' => ['required', 'date'],
            'dobavljac' => ['required', 'string', 'max:255'],
            'sirovina_ambalaza_id' => ['required', 'exists:sirovina_ambalaza,id'],
            'napomena' => ['nullable', 'string', 'max:1000'],
        ]);

        // Dodajemo napomenu ako je uneta
        $narudzbenica = Nabavka::create($validated);

        return redirect()->route('public.narudzbenice.index')
            ->with('success', 'Vaša narudžbenica je uspešno poslata!');
    }

    /**
     * Prikazuje detalje jedne narudžbenice
     */
    public function show(Nabavka $narudzbenica)
    {
        $narudzbenica->load('sirovinaAmbalaza');
        return view('public.narudzbenice.show', compact('narudzbenica'));
    }
}
