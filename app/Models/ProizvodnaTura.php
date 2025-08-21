<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProizvodnaTura extends Model
{
    protected $table = 'proizvodna_tura';

    protected $fillable = [
        'naziv_ture',
        'vrsta_grozdja',
        'kolicina',
        'datum_branja',
        'status',
        'datum_pocetka_fermentacije',
    ];

    protected $casts = [
        'datum_branja' => 'date',
        'datum_pocetka_fermentacije' => 'date',
    ];
}
