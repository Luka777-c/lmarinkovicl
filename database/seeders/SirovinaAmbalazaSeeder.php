<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SirovinaAmbalazaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sirovina_ambalaza')->insert([
            ['naziv' => 'Boca 0.75l', 'tip' => 'Ambalaža', 'kolicina_na_stanju' => 5000],
            ['naziv' => 'Čep pluta', 'tip' => 'Ambalaža', 'kolicina_na_stanju' => 3000],
            ['naziv' => 'Kvasac XY', 'tip' => 'Sirovina', 'kolicina_na_stanju' => 50],
        ]);
    }
}
