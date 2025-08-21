<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpremaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('oprema')->insert([
            ['naziv' => 'Fermentor 1', 'opis' => 'Veliki inox fermentor', 'godina_proizvodnje' => 2018],
            ['naziv' => 'Pumpa za pretakanje', 'opis' => 'Pumpa za vino', 'godina_proizvodnje' => 2020],
            ['naziv' => 'Hidraulična presa', 'opis' => 'Presa za ceđenje grožđa', 'godina_proizvodnje' => 2015],
        ]);
    }
}
