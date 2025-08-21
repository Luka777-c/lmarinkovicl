<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProizvodnaTuraSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('proizvodna_tura')->insert([
            [
                'naziv_ture' => 'Merlot 2025',
                'vrsta_grozdja' => 'Merlot',
                'kolicina' => 1200,
                'datum_branja' => '2025-09-10',
                'status' => 'Fermentacija',
                'datum_pocetka_fermentacije' => '2025-09-12',
            ],
            [
                'naziv_ture' => 'Cabernet 2025',
                'vrsta_grozdja' => 'Cabernet Sauvignon',
                'kolicina' => 1500,
                'datum_branja' => '2025-09-08',
                'status' => 'Odležavanje',
                'datum_pocetka_fermentacije' => '2025-09-11',
            ],
            [
                'naziv_ture' => 'Chardonnay 2025',
                'vrsta_grozdja' => 'Chardonnay',
                'kolicina' => 1000,
                'datum_branja' => '2025-09-05',
                'status' => 'Flaširano',
                'datum_pocetka_fermentacije' => '2025-09-07',
            ],
        ]);
    }
}
