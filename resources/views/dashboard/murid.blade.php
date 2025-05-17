@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Dashboard Murid</h1>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    {{-- <div class="card">
        <div class="card-body">
            <h5 class="card-title">Rekap Nilai Siswa</h5>
            <p>Nilai Rata-rata: {{ $rataRataNilai }}</p>
        </div>
    </div> --}}

    {{-- <div class="mt-4">
        <h5>Detail Nilai</h5>
        <ul>
            @foreach($nilai as $n)
                <li>{{ $n->mataPelajaran->mata_pelajaran }}: {{ $n->nilai }} (Predikat: {{ $n->predikat }})</li>
            @endforeach
        </ul>
    </div>
</div> --}}
@endsection
