<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SirovinaAmbalaza extends Model
{
    //
    protected $table = 'sirovina_ambalaza';

    protected $fillable = [
        'naziv',
        'tip',
        'kolicina_na_stanju',
    ];
}
