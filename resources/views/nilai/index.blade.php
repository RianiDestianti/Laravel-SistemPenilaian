@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Nilai</h1>
    <a href="{{ route('nilai.create') }}" class="btn btn-primary mb-3">Tambah Nilai</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filter & Search Form -->
    <form method="GET" class="row g-2 mb-3 align-items-center">
        <div class="col-md-3">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari guru, murid, atau mapel...">
        </div>
        <div class="col-md-2">
            <select name="semester" class="form-select">
                <option value="">-- Semua Semester --</option>
                <option value="1" {{ request('semester') == '1' ? 'selected' : '' }}>Semester 1</option>
                <option value="2" {{ request('semester') == '2' ? 'selected' : '' }}>Semester 2</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="sort_by" class="form-select">
                <option value="nilai" {{ request('sort_by') == 'nilai' ? 'selected' : '' }}>Sort by Nilai</option>
                <option value="semester" {{ request('sort_by') == 'semester' ? 'selected' : '' }}>Sort by Semester</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="sort_order" class="form-select">
                <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Naik (A-Z)</option>
                <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Turun (Z-A)</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-secondary w-100">Filter</button>
        </div>
        <div class="col-md-1">
            <a href="{{ route('nilai.index') }}" class="btn btn-outline-danger w-100">Reset</a>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Guru</th>
                <th>Nama Murid</th>
                <th>Mata Pelajaran</th>
                <th>Nilai</th>
                <th>Predikat</th>
                <th>Semester</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($nilai as $item)
                <tr>
                    <td>{{ $item->guru->nama }}</td>
                    <td>{{ $item->murid->nama }}</td>
                    <td>{{ $item->mataPelajaran->mata_pelajaran }}</td>
                    <td>{{ $item->nilai }}</td>
                    <td>{{ $item->predikat }}</td>
                    <td>{{ $item->semester }}</td>
                    <td>
                        <a href="{{ route('nilai.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('nilai.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $nilai->links() }}
</div>
@endsection
