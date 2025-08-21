<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NabavkaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nabavka')->insert([
            [
                'kolicina' => 2000,
                'datum_nabavke' => '2025-08-10',
                'dobavljac' => 'Vinaropromet d.o.o.',
                'sirovina_ambalaza_id' => 1,
            ],
            [
                'kolicina' => 1000,
                'datum_nabavke' => '2025-08-12',
                'dobavljac' => 'Ambalaža Plus',
                'sirovina_ambalaza_id' => 2,
            ],
            [
                'kolicina' => 10,
                'datum_nabavke' => '2025-08-15',
                'dobavljac' => 'Ferment Lab',
                'sirovina_ambalaza_id' => 3,
            ],
        ]);
    }
}
