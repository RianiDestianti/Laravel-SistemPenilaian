<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        Guru::create([
            'nama' => 'Budi Santoso',
            'nip' => '1980123456780001',
            'email' => 'budi@example.com',
            'no_telp' => '081234567890',
            'jenis_kelamin' => 'L',
            'tanggal_lahir' => '1980-05-12',
            'id_user' => 2,
            'mata_pelajaran' => 1,
            
        ]);
    }
}
