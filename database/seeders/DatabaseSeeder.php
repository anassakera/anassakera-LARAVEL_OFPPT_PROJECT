<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Prof. chakloul anass',
            'email' => 'anassakera@gmail.com',
            'email_verified_at' => '2024-04-23 09:27:33',
            'password' => Hash::make('password'), // Utilisez Hash::make pour hasher le mot de passe
            'remember_token' => 'TXoLy1Fayi',
            'phone' => '0648446216',
            'pin' => '123456',
            'account_type' => 'Super_Admin',
            'updated_at' => '2024-04-23 09:27:35',
            'created_at' => '2024-04-23 09:27:35',
        ]);
    }
}
