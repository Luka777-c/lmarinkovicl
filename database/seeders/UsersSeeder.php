<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Petar Petrović', 'email' => 'petar@example.com', 'uloga_id' => 1],
            ['name' => 'Marko Marković', 'email' => 'marko@example.com', 'uloga_id' => 2],
            ['name' => 'Jovan Jovanović', 'email' => 'jovan@example.com', 'uloga_id' => 3],
        ];

        foreach ($users as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('123'),
                'uloga_id' => $userData['uloga_id'],
            ]);
        }
    }
}
