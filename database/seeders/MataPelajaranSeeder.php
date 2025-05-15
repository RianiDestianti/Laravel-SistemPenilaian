<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataPelajaran;

class MataPelajaranSeeder extends Seeder
{
    public function run(): void
    {
        MataPelajaran::create([
            'kode' => 'MAT001',
            'mata_pelajaran' => 'Matematika',
        ]);

        MataPelajaran::create([
            'kode' => 'BIO001',
            'mata_pelajaran' => 'Biologi',
        ]);
        
    }
}
