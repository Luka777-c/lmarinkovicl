<?php

namespace App\Http\Controllers;

use App\Models\SirovinaAmbalaza;
use Illuminate\Http\Request;

class ZaliheController extends Controller
{
    //
    public function index() {
        $zalihe = SirovinaAmbalaza::orderByDesc('created_at')->get();

        return view('zalihe', compact('zalihe'));
    }

    public function create()
    {
        return view('zalihe-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naziv' => ['required', 'string', 'max:255'],
            'tip' => ['required', 'string', 'max:255'],
            'kolicina_na_stanju' => ['required', 'integer', 'min:1'],
        ]);

        SirovinaAmbalaza::create($validated);

        return redirect()->route('zalihe.index')->with('success', 'Zaliha je uspešno kreirana.');
    }

    public function destroy(SirovinaAmbalaza $zaliha)
    {
        $zaliha->delete();
        return redirect()->route('zalihe.index')->with('success', 'Proizvodna tura je obrisana.');
    }
}
