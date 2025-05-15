<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Murid;
use App\Models\Nilai;
use App\Models\User;

class DashboardController extends Controller
{
    public function admin()
    {
        $totalSiswa = Murid::count();
        $totalGuru = Guru::count();
        $rataRataNilai = Nilai::avg('nilai');

        return view('dashboard.admin', compact('totalSiswa', 'totalGuru', 'rataRataNilai'));
    }

    public function guru()
    {
        $user = auth()->user();
        $totalSiswaDiajar = Murid::where('id_guru', $user->guru->id)->count();
        $rataRataNilai = Nilai::where('id_guru', $user->guru->id)->avg('nilai');

        return view('dashboard.guru', compact('totalSiswaDiajar', 'rataRataNilai'));
    }

    public function siswa()
    {
        $user = auth()->user();
        $nilai = Nilai::where('id_murid', $user->murid->id)->get();
        $rataRataNilai = $nilai->avg('nilai');

        return view('dashboard.siswa', compact('nilai', 'rataRataNilai'));
    }
}
