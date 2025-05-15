@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Guru</h1>

    <form method="GET" action="{{ route('guru.index') }}" class="row g-3 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari nama, NIP, atau mapel..."
                value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="sort" class="form-select">
                <option value="nama" {{ request('sort') == 'nama' ? 'selected' : '' }}>Urutkan Nama</option>
                <option value="nip" {{ request('sort') == 'nip' ? 'selected' : '' }}>Urutkan NIP</option>
                <option value="mata_pelajaran" {{ request('sort') == 'mata_pelajaran' ? 'selected' : '' }}>Urutkan Mapel</option>
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

    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Email</th>
                <th>No. Telp</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($guru as $item)
                <tr>
                    <td>{{ $guru->firstItem() + $loop->index }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->mapel->mata_pelajaran ?? 'Tidak Ada Mata Pelajaran' }}</td>
                    <td>
                        <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('guru.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="9" class="text-center">Data tidak ditemukan.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $guru->appends(request()->query())->links() }}
</div>
@endsection
