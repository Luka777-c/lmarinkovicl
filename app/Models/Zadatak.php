<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zadatak extends Model
{
    protected $table = 'zadatak';
    
    protected $fillable = [
        'opis',
        'status',
        'datum_dodele',
        'datum_zavrsetka',
        'user_id',
        'tura_id'
    ];

    protected $casts = [
        'datum_dodele' => 'date',
        'datum_zavrsetka' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proizvodnaTura()
    {
        return $this->belongsTo(ProizvodnaTura::class, 'tura_id');
    }
}
