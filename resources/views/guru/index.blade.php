@extends('layouts.app')

@section('styles')
    <style>
        .page-header {
            background: linear-gradient(135deg, #3498db, #6574cd);
            color: white;
            padding: 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.2);
            position: relative;
            overflow: hidden;
        }

        .page-header::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.3;
            z-index: 0;
        }

        .page-header h1 {
            font-weight: 700;
            margin: 0;
            font-size: 2.2rem;
            z-index: 1;
            position: relative;
        }

        .filter-panel {
            background-color: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .form-select,
        .form-control {
            border-radius: 8px;
            padding: 0.6rem 1rem;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: none;
            transition: all 0.3s ease;
        }

        .form-select:focus,
        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }

        .btn {
            border-radius: 8px;
            padding: 0.6rem 1.2rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.2);
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(52, 152, 219, 0.3);
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
            transform: translateY(-2px);
        }

        .btn-danger,
        .btn-sm.btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-danger:hover,
        .btn-sm.btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }

        .btn-warning,
        .btn-sm.btn-warning {
            background-color: #f39c12;
            border-color: #f39c12;
            color: white;
        }

        .btn-warning:hover,
        .btn-sm.btn-warning:hover {
            background-color: #d35400;
            border-color: #d35400;
            color: white;
        }

        .btn-outline-danger {
            color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-outline-danger:hover {
            background-color: #e74c3c;
            color: white;
        }

        .btn-action {
            margin-right: 5px;
            padding: 0.4rem 0.75rem;
            font-size: 0.85rem;
        }

        .table-container {
            background-color: white;
            border-radius: 12px;
            padding: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1rem;
            color: #495057;
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .table tr:hover {
            background-color: rgba(52, 152, 219, 0.05);
        }

        .badge {
            padding: 0.5rem 0.8rem;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.75rem;
            display: inline-block;
        }

        .badge-admin {
            background-color: rgba(155, 89, 182, 0.1);
            color: #8e44ad;
            border: 1px solid rgba(155, 89, 182, 0.2);
        }

        .badge-guru {
            background-color: rgba(52, 152, 219, 0.1);
            color: #2980b9;
            border: 1px solid rgba(52, 152, 219, 0.2);
        }

        .badge-murid {
            background-color: rgba(46, 204, 113, 0.1);
            color: #27ae60;
            border: 1px solid rgba(46, 204, 113, 0.2);
        }

        .pagination {
            margin-top: 1.5rem;
            justify-content: center;
        }

        .page-item:first-child .page-link {
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        .page-item:last-child .page-link {
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .page-item.active .page-link {
            background-color: #3498db;
            border-color: #3498db;
        }

        .page-link {
            padding: 0.5rem 0.85rem;
            color: #3498db;
        }

        .page-link:hover {
            color: #2980b9;
            background-color: rgba(52, 152, 219, 0.1);
        }

        .alert-success {
            background-color: rgba(46, 204, 113, 0.1);
            border-color: rgba(46, 204, 113, 0.2);
            color: #27ae60;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .btn-add-user {
            position: relative;
            padding-left: 2.5rem;
            font-weight: 600;
        }

        .btn-add-user i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
        }

        .text-empty {
            text-align: center;
            padding: 2rem;
            font-style: italic;
            color: #6c757d;
        }

        .btn-action-container {
            display: flex;
            gap: 0.5rem;
        }

        @media (max-width: 768px) {
            .table-responsive {
                border-radius: 12px;
            }

            .btn-action {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="page-header">
        <h1><i class="fas fa-book-open me-2"></i> Daftar Guru</h1>
    </div>

    <div class="filter-panel">
        <form method="GET" action="{{ route('guru.index') }}" class="row g-3">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                    <input type="text" name="search" class="form-control" placeholder="Cari nama, NIP, atau mapel..."
                        value="{{ request('search') }}">
                </div>
            </div>

            <div class="col-md-3">
                <select name="sort" class="form-select">
                    <option value="nama" {{ request('sort') == 'nama' ? 'selected' : '' }}>Urutkan Nama</option>
                    <option value="nip" {{ request('sort') == 'nip' ? 'selected' : '' }}>Urutkan NIP</option>
                    <option value="mata_pelajaran" {{ request('sort') == 'mata_pelajaran' ? 'selected' : '' }}>Urutkan Mapel
                    </option>
                </select>
            </div>

            <div class="col-md-2">
                <select name="direction" class="form-select">
                    <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>A-Z</option>
                    <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Z-A</option>
                </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-secondary w-100">
                    <i class="fas fa-filter me-1"></i> Filter
                </button>
            </div>

            <div class="col-md-1">
                <a href="{{ route('guru.index') }}" class="btn btn-outline-danger w-100">
                    <i class="fas fa-undo"></i>
                </a>
            </div>
        </form>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('guru.create') }}" class="btn btn-primary btn-add-user">
            <i class="fas fa-plus-circle"></i> Tambah Guru
        </a>

        <div class="d-inline-block">
            <span class="badge bg-secondary px-3 py-2">Total: {{ $guru->total() }} Guru</span>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">Nama</th>
                        <th width="10%">NIP</th>
                        <th width="15%">Email</th>
                        <th width="10%">No. Telp</th>
                        <th width="10%">Jenis Kelamin</th>
                        <th width="10%">Tanggal Lahir</th>
                        <th width="10%">Mata Pelajaran</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($guru as $item)
                        <tr>
                            <td>{{ $guru->firstItem() + $loop->index }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-initial rounded-circle bg-light text-primary me-2 d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 40px;">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div>
                                        <span class="fw-medium">{{ $item->nama }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->no_telp }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>
                                <span class="badge badge-guru">
                                    <i class="fas fa-book me-1"></i> {{ $item->mapel->mata_pelajaran ?? 'Tidak Ada' }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-action-container">
                                    <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-warning btn-action">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('guru.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-action"
                                            onclick="return confirm('Yakin ingin menghapus guru ini?')">
                                            <i class="fas fa-trash-alt me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-empty">
                                <i class="fas fa-info-circle me-2"></i>Tidak ada data guru ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $guru->appends(['search' => request('search'), 'sort' => request('sort'), 'direction' => request('direction')])->links() }}
    </div>
@endsection
