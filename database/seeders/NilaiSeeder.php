<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nilai;

class NilaiSeeder extends Seeder
{
    public function run(): void
    
    {
        Nilai::create([
            'id_guru' => 1,
            'id_murid' => 1,
            'id_mata_pelajaran' => 1,
            'nilai' => 88.5,
            'predikat' => 'A',
            'semester' => 'Ganjil',
        ]);
    }
}
