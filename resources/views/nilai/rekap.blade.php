@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rekap Nilai Siswa</h1>
    <a href="{{ route('nilai.index') }}" class="btn btn-secondary mb-3">← Kembali ke Data Nilai</a>

    
    <div class="mb-3">
    <a href="{{ route('nilai.rekap.pdf') }}" class="btn btn-danger">Download PDF</a>
    <a href="{{ route('nilai.rekap.excel') }}" class="btn btn-success">Download Excel</a>
    <a href="{{ route('nilai.rekap.word') }}" class="btn btn-primary">Download Word</a>
</div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama Siswa</th>
                    <th>Rekap Nilai</th>
                    <th>Rata-rata</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rekap as $item)
                    <tr>
                        <td>{{ $item['murid']->nama }}</td>
                        <td>
                            <ul class="mb-0">
                                @foreach($item['nilai'] as $mapel => $nilai)
                                    <li>
                                        {{ $mapel }}: 
                                        <strong>{{ round($nilai['total'] / $nilai['count'], 2) }}</strong>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td><strong>{{ $item['rata_rata'] }}</strong></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Data tidak tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
