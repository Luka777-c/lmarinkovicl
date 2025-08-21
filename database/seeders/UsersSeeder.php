<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'Petar Petrović','password' => '123', 'email' => 'petar@example.com', 'uloga_id' => 1],
            ['name' => 'Marko Marković','password' => '123',  'email' => 'marko@example.com', 'uloga_id' => 2],
            ['name' => 'Jovan Jovanović','password' => '123',  'email' => 'jovan@example.com', 'uloga_id' => 3],
        ]);
    }
}
