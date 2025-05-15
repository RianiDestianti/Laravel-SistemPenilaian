@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Murid</h1>

    {{-- Search & Filter Form --}}
    <form method="GET" action="{{ route('murid.index') }}" class="row g-3 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari nama, NIS, atau kelas..."
                value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <select name="jenis_kelamin" class="form-select">
                <option value="">Semua Gender</option>
                <option value="L" {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="sort" class="form-select">
                <option value="">Urutkan</option>
                <option value="nama" {{ request('sort') == 'nama' ? 'selected' : '' }}>Nama</option>
                <option value="nis" {{ request('sort') == 'nis' ? 'selected' : '' }}>NIS</option>
                <option value="kelas" {{ request('sort') == 'kelas' ? 'selected' : '' }}>Kelas</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="direction" class="form-select">
                <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>ASC</option>
                <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>DESC</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-secondary w-100">Filter</button>
        </div>
    </form>

    <a href="{{ route('murid.create') }}" class="btn btn-primary mb-3">Tambah Murid</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>No. Telp</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($murid as $m)
            <tr>
                <td>{{ $m->nama }}</td>
                <td>{{ $m->nis }}</td>
                <td>{{ $m->kelas }}</td>
                <td>{{ $m->no_telp }}</td>
                <td>{{ $m->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ $m->tanggal_lahir }}</td>
                <td>
                    <a href="{{ route('murid.edit', $m->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('murid.destroy', $m->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data murid.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $murid->appends(request()->query())->links() }}
</div>
@endsection
