<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call([
        UlogaSeeder::class,
        // drugi seederi...
        UsersSeeder::class,
        ProizvodnaTuraSeeder::class,
        ZadatakSeeder::class,
        SirovinaAmbalazaSeeder::class,
        OpremaSeeder::class,
        SirovinaAmbalazaSeeder::class,
    ]);
}
}
