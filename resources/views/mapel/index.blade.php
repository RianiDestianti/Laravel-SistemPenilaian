@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Mata Pelajaran</h1>

    <form method="GET" action="{{ route('mata-pelajaran.index') }}" class="row g-3 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari kode atau mapel..."
                value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="sort" class="form-select">
                <option value="kode" {{ request('sort') == 'kode' ? 'selected' : '' }}>Urutkan Kode</option>
                <option value="mata_pelajaran" {{ request('sort') == 'mata_pelajaran' ? 'selected' : '' }}>Urutkan Nama</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="direction" class="form-select">
                <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>ASC</option>
                <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>DESC</option>
            </select>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-secondary w-100">Terapkan</button>
        </div>
    </form>

    <a href="{{ route('mata-pelajaran.create') }}" class="btn btn-primary mb-3">Tambah Mata Pelajaran</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mapel as $index => $item)
                <tr>
                    <td>{{ $mapel->firstItem() + $index }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->mata_pelajaran }}</td>
                    <td>
                        <a href="{{ route('mata-pelajaran.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('mata-pelajaran.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data mata pelajaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $mapel->appends(request()->query())->links() }}
</div>
@endsection
