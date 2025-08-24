<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZadatakSeeder extends Seeder
{
    public function run(): void
    {
        // Prvo proverimo koji korisnici postoje
        $users = \App\Models\User::all();
        $ture = \App\Models\ProizvodnaTura::all();
        
        if ($users->count() > 0 && $ture->count() > 0) {
            DB::table('zadatak')->insert([
                [
                    'opis' => 'Pretakanje vina iz buradi',
                    'status' => 'Na čekanju',
                    'datum_dodele' => '2025-09-15',
                    'datum_zavrsetka' => null,
                    'user_id' => $users->first()->id,
                    'tura_id' => $ture->first()->id,
                ],
                [
                    'opis' => 'Kontrola temperature fermentacije',
                    'status' => 'U toku',
                    'datum_dodele' => '2025-09-12',
                    'datum_zavrsetka' => null,
                    'user_id' => $users->skip(1)->first()->id,
                    'tura_id' => $ture->first()->id,
                ],
                [
                    'opis' => 'Etiketiranje flaša',
                    'status' => 'Završen',
                    'datum_dodele' => '2025-09-18',
                    'datum_zavrsetka' => '2025-09-20',
                    'user_id' => $users->skip(2)->first()->id,
                    'tura_id' => $ture->skip(2)->first()->id,
                ],
            ]);
        }
    }
}
