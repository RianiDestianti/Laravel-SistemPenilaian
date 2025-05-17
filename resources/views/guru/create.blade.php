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
    
    .form-panel {
        background-color: white;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .form-select, .form-control {
        border-radius: 8px;
        padding: 0.75rem 1rem;
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-shadow: none;
        transition: all 0.3s ease;
    }
    
    .form-select:focus, .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
    }
    
    .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #495057;
    }
    
    .btn {
        border-radius: 8px;
        padding: 0.6rem 1.2rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-primary {
        background: linear-gradient(90deg, #3490dc, #6574cd);
        border: none;
        box-shadow: 0 4px 10px rgba(52, 152, 219, 0.2);
    }
    
    .btn-primary:hover {
        background: linear-gradient(90deg, #2980b9, #5e66c7);
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
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .invalid-feedback {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: 0.5rem;
    }
    
    .required::after {
        content: '*';
        color: #e74c3c;
        margin-left: 4px;
    }
    
    .btn-container {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }
    
    .alert-success {
        background-color: rgba(46, 204, 113, 0.1);
        border-color: rgba(46, 204, 113, 0.2);
        color: #27ae60;
        padding: 1rem 1.5rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
    }
    
    .alert-danger {
        background-color: rgba(231, 76, 60, 0.1);
        border-color: rgba(231, 76, 60, 0.2);
        color: #e74c3c;
        padding: 1rem 1.5rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
    }
    
    @media (max-width: 768px) {
        .form-panel {
            padding: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1><i class="fas fa-chalkboard-teacher me-2"></i> Tambah Guru Baru</h1>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle me-2"></i>Ada kesalahan dalam pengisian form:
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="form-panel">
        <form method="POST" action="{{ route('guru.store') }}">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama" class="form-label required">Nama Guru</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-user"></i></span>
                            <input type="text" 
                                   name="nama" 
                                   id="nama" 
                                   class="form-control @error('nama') is-invalid @enderror" 
                                   value="{{ old('nama') }}" 
                                   placeholder="Masukkan nama guru" 
                                   required autofocus>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nip" class="form-label required">NIP</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-id-card"></i></span>
                            <input type="text" 
                                   name="nip" 
                                   id="nip" 
                                   class="form-control @error('nip') is-invalid @enderror" 
                                   value="{{ old('nip') }}" 
                                   placeholder="Masukkan NIP" 
                                   required>
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Nomor Induk Pegawai harus unik dan valid.</small>
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="form-label required">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-envelope"></i></span>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email') }}" 
                                   placeholder="Masukkan email" 
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_telp" class="form-label required">No. Telepon</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-phone"></i></span>
                            <input type="text" 
                                   name="no_telp" 
                                   id="no_telp" 
                                   class="form-control @error('no_telp') is-invalid @enderror" 
                                   value="{{ old('no_telp') }}" 
                                   placeholder="Masukkan no. telepon" 
                                   required>
                            @error('no_telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_lahir" class="form-label required">Tanggal Lahir</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-calendar-alt"></i></span>
                            <input type="date" 
                                   name="tanggal_lahir" 
                                   id="tanggal_lahir" 
                                   class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                   value="{{ old('tanggal_lahir') }}" 
                                   required>
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_kelamin" class="form-label required">Jenis Kelamin</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-venus-mars"></i></span>
                            <select name="jenis_kelamin" 
                                    id="jenis_kelamin" 
                                    class="form-select @error('jenis_kelamin') is-invalid @enderror" 
                                    required>
                                <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_user" class="form-label required">ID User</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-user-tag"></i></span>
                            <input type="text" 
                                   name="id_user" 
                                   id="id_user" 
                                   class="form-control @error('id_user') is-invalid @enderror" 
                                   value="{{ old('id_user') }}" 
                                   placeholder="Masukkan ID User" 
                                   required>
                            @error('id_user')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Masukkan ID User yang sudah terdaftar di sistem.</small>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mata_pelajaran" class="form-label required">Mata Pelajaran</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-book"></i></span>
                            <select name="mata_pelajaran" 
                                    id="mata_pelajaran" 
                                    class="form-select @error('mata_pelajaran') is-invalid @enderror" 
                                    required>
                                <option value="" selected disabled>-- Pilih Mata Pelajaran --</option>
                                @foreach ($mapel as $m)
                                    <option value="{{ $m->id }}" {{ old('mata_pelajaran') == $m->id ? 'selected' : '' }}>
                                        {{ $m->mata_pelajaran }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mata_pelajaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Guru
                </button>
                <a href="{{ route('guru.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection