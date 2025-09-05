<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456789'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Vendeur user
        User::create([
            'name' => 'Vendeur',
            'email' => 'vendeur@vendeur.com',
            'password' => Hash::make('123456789'),
            'role' => 'vendeur',
            'email_verified_at' => now(),
        ]);

        // Financier user
        User::create([
            'name' => 'Financier',
            'email' => 'financier@financier.com',
            'password' => Hash::make('123456789'),
            'role' => 'financier',
            'email_verified_at' => now(),
        ]);

        // Client user
        User::create([
            'name' => 'Client User',
            'email' => 'client@client.com',
            'password' => Hash::make('123456789'),
            'role' => 'client',
            'email_verified_at' => now(),
        ]);
    }
}
