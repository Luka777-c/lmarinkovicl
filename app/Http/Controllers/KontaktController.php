<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontaktController extends Controller
{
    public function index()
    {
        return view('kontakt');
    }
}
