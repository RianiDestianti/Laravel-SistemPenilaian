<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => '1980123456780001',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'guru_budi',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        User::create([
            'username' => 'murid_ani',
            'password' => Hash::make('password'),
            'role' => 'murid',
        ]);
    }
}
