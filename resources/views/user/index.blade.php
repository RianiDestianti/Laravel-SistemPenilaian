@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar User</h1>

    {{-- Form Search --}}
   <form method="GET" action="{{ route('user.index') }}" class="mb-3 row g-2 align-items-center">
    <div class="col-md-3">
        <input type="text" name="search" class="form-control" placeholder="Cari username atau role..." value="{{ request('search') }}">
    </div>

    <div class="col-md-2">
        <select name="role" class="form-select">
            <option value="">-- Semua Role --</option>
            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="guru" {{ request('role') == 'guru' ? 'selected' : '' }}>Guru</option>
            <option value="murid" {{ request('role') == 'murid' ? 'selected' : '' }}>Murid</option>
        </select>
    </div>

    <div class="col-md-2">
        <select name="sort_by" class="form-select">
            <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>Sort by ID</option>
            <option value="username" {{ request('sort_by') == 'username' ? 'selected' : '' }}>Sort by Username</option>
            <option value="role" {{ request('sort_by') == 'role' ? 'selected' : '' }}>Sort by Role</option>
        </select>
    </div>

    <div class="col-md-2">
        <select name="sort_order" class="form-select">
            <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>A-Z</option>
            <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Z-A</option>
        </select>
    </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-secondary w-100">Filter</button>
    </div>

    <div class="col-md-1">
        <a href="{{ route('user.index') }}" class="btn btn-outline-danger w-100">Reset</a>
    </div>
</form>


    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah User</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Tidak ada data ditemukan.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $users->appends(['search' => request('search')])->links() }}
</div>
@endsection
