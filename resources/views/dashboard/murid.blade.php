@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Murid</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Rekap Nilai Siswa</h5>
            <p>Nilai Rata-rata: {{ $rataRataNilai }}</p>
        </div>
    </div>
    <div class="mt-4">
        <h5>Detail Nilai</h5>
        <ul>
            @foreach($nilai as $n)
                <li>{{ $n->mataPelajaran->mata_pelajaran }}: {{ $n->nilai }} (Predikat: {{ $n->predikat }})</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
