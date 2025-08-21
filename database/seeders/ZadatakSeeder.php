<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZadatakSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('zadatak')->insert([
            [
                'opis' => 'Pretakanje vina iz buradi',
                'status' => 'Na čekanju',
                'datum_dodele' => '2025-09-15',
                'datum_zavrsetka' => null,
                'user_id' => 3,
                'tura_id' => 1,
            ],
            [
                'opis' => 'Kontrola temperature fermentacije',
                'status' => 'U toku',
                'datum_dodele' => '2025-09-12',
                'datum_zavrsetka' => null,
                'user_id' => 1,
                'tura_id' => 1,
            ],
            [
                'opis' => 'Etiketiranje flaša',
                'status' => 'Završen',
                'datum_dodele' => '2025-09-18',
                'datum_zavrsetka' => '2025-09-20',
                'user_id' => 2,
                'tura_id' => 3,
            ],
        ]);
    }
}
