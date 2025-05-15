<h1>Selamat datang Admin</h1>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Statistik Umum</h5>
            <p>Total Siswa: {{ $totalSiswa }}</p>
            <p>Total Guru: {{ $totalGuru }}</p>
            <p>Nilai Rata-rata: {{ $rataRataNilai }}</p>
        </div>
    </div>
    <div class="mt-4">
        <h5>Rekap Aktivitas</h5>
        <ul>
            <li><a href="{{ route('user.index') }}">Manajemen User</a></li>
            <li><a href="{{ route('mata-pelajaran.index') }}">Manajemen Mata Pelajaran</a></li>
            <li><a href="{{ route('nilai.index') }}">Manajemen Nilai</a></li>
        </ul>
    </div>
</div>
@endsection
