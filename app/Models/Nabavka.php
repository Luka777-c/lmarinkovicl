<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nabavka extends Model
{
    protected $table = 'nabavka';
    
    protected $fillable = [
        'kolicina',
        'datum_nabavke',
        'dobavljac',
        'sirovina_ambalaza_id'
    ];

    protected $casts = [
        'datum_nabavke' => 'date',
    ];

    public function sirovinaAmbalaza()
    {
        return $this->belongsTo(SirovinaAmbalaza::class, 'sirovina_ambalaza_id');
    }
}
