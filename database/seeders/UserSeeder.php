<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //user make
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'phone_number' => '081234567890',
            'address' => 'Jl. Admin No.1',
            'date_of_birth' => '1990-01-01',
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Pelanggan User',
            'email' => 'pelanggan@example.com',
            'password' => Hash::make('password'),
            'phone_number' => '081234567891',
            'address' => 'Jl. Pelanggan No.2',
            'date_of_birth' => '1992-02-02',
            'role' => 'pelanggan',
            'remember_token' => Str::random(10),
        ]);
    }
}
