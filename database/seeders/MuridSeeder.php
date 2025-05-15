<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Murid;

class MuridSeeder extends Seeder
{
    public function run(): void
    {
        Murid::create([
            'nama' => 'Ani Lestari',
            'nis' => '12345678',
            'kelas' => 'XII RPL 1',
            'no_telp' => '081298765432',
            'jenis_kelamin' => 'P',
            'tanggal_lahir' => '2006-10-15',
            'id_user' => 3,
        ]);
    }
}
