<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oprema extends Model
{
    //
    protected $table = 'oprema';

    protected $fillable = [
        'naziv',
        'opis',
        'godina_proizvodnje',
    ];
}
