@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Guru</h1>

    <div class="mb-3 text-end">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <div class="card">
        {{-- <div class="card-body">
            <h5 class="card-title">Rekap Nilai Siswa</h5>
            <p>Jumlah Siswa yang Diajarkan: {{ $totalSiswaDiajar }}</p>
            <p>Nilai Rata-rata: {{ $rataRataNilai }}</p>
        </div> --}}
    </div>

    <div class="mt-4">
        <h5>Kelola Nilai</h5>
        <ul>
            <li><a href="{{ route('nilai.index') }}">Lihat Nilai</a></li>
            <li><a href="{{ route('nilai.create') }}">Tambah Nilai</a></li>
        </ul>
    </div>
</div>
@endsection
