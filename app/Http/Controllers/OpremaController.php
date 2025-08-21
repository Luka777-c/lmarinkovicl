<?php

namespace App\Http\Controllers;

use App\Models\Oprema;
use Illuminate\Http\Request;

class OpremaController extends Controller
{
    public function index()
    {
        $oprema = Oprema::orderByDesc('created_at')->get();
        return view('oprema', compact('oprema'));
    }

    public function create()
    {
        return view('oprema-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naziv' => ['required', 'string', 'max:255'],
            'opis' => ['nullable', 'string', 'max:5000'],
            'godina_proizvodnje' => ['required', 'integer', 'digits:4', 'min:1900', 'max:' . (int)date('Y')],
        ]);

        Oprema::create($validated);

        return redirect()->route('oprema.index')->with('success', 'Oprema je uspešno dodata.');
    }

    public function destroy(Oprema $oprema)
    {
        $oprema->delete();
        return redirect()->route('oprema.index')->with('success', 'Oprema je obrisana.');
    }
}
