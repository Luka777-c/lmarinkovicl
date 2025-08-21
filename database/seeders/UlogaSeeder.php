<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UlogaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('uloga')->insert([
            ['naziv' => 'Tehnolog'],
            ['naziv' => 'Menadžer vinarije'],
            ['naziv' => 'Radnik u proizvodnji'],
        ]);
    }
}
