@extends('layouts.app')

@section('styles')
<style>
    /* Main content styling */
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
    
    /* Form panel styling */
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
    
    /* Button styling */
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
    
    /* Form group styling */
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    /* Invalid feedback */
    .invalid-feedback {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: 0.5rem;
    }
    
    /* Required asterisk */
    .required::after {
        content: '*';
        color: #e74c3c;
        margin-left: 4px;
    }
    
    /* Button container */
    .btn-container {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }
    
    /* Alert styling */
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
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .form-panel {
            padding: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="page-header">
        <h1><i class="fas fa-graduation-cap me-2"></i> Tambah Nilai</h1>
    </div>
    
    <!-- Alert -->
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
    
    <!-- Form Panel -->
    <div class="form-panel">
        <form method="POST" action="{{ route('nilai.store') }}">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <!-- Nama Guru Field -->
                    <div class="form-group">
                        <label for="id_guru" class="form-label required">Nama Guru</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-chalkboard-teacher"></i></span>
                            <select name="id_guru" 
                                    id="id_guru" 
                                    class="form-select @error('id_guru') is-invalid @enderror" 
                                    required>
                                <option value="" selected disabled>Pilih Guru</option>
                                @foreach ($guru as $g)
                                    <option value="{{ $g->id }}" {{ old('id_guru') == $g->id ? 'selected' : '' }}>
                                        {{ $g->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_guru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <!-- Nama Murid Field -->
                    <div class="form-group">
                        <label for="id_murid" class="form-label required">Nama Murid</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-user-graduate"></i></span>
                            <select name="id_murid" 
                                    id="id_murid" 
                                    class="form-select @error('id_murid') is-invalid @enderror" 
                                    required>
                                <option value="" selected disabled>Pilih Murid</option>
                                @foreach ($murid as $m)
                                    <option value="{{ $m->id }}" {{ old('id_murid') == $m->id ? 'selected' : '' }}>
                                        {{ $m->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_murid')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-md-12">
                    <!-- Mata Pelajaran Field -->
                    <div class="form-group">
                        <label for="id_mata_pelajaran" class="form-label required">Mata Pelajaran</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-book"></i></span>
                            <select name="id_mata_pelajaran" 
                                    id="id_mata_pelajaran" 
                                    class="form-select @error('id_mata_pelajaran') is-invalid @enderror" 
                                    required>
                                <option value="" selected disabled>Pilih Mata Pelajaran</option>
                                @foreach ($mataPelajaran as $mp)
                                    <option value="{{ $mp->id }}" {{ old('id_mata_pelajaran') == $mp->id ? 'selected' : '' }}>
                                        {{ $mp->mata_pelajaran }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_mata_pelajaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-md-4">
                    <!-- Nilai Field -->
                    <div class="form-group">
                        <label for="nilai" class="form-label required">Nilai</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-star"></i></span>
                            <input type="text" 
                                   name="nilai" 
                                   id="nilai" 
                                   class="form-control @error('nilai') is-invalid @enderror" 
                                   value="{{ old('nilai') }}" 
                                   placeholder="Masukkan nilai numerik" 
                                   required>
                            @error('nilai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Masukkan nilai dalam bentuk angka (0-100).</small>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <!-- Predikat Field -->
                    <div class="form-group">
                        <label for="predikat" class="form-label required">Predikat</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-award"></i></span>
                            <input type="text" 
                                   name="predikat" 
                                   id="predikat" 
                                   class="form-control @error('predikat') is-invalid @enderror" 
                                   value="{{ old('predikat') }}" 
                                   placeholder="Masukkan predikat" 
                                   required>
                            @error('predikat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Contoh: A, B, C, atau D.</small>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <!-- Semester Field -->
                    <div class="form-group">
                        <label for="semester" class="form-label required">Semester</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-calendar-alt"></i></span>
                            <select name="semester" 
                                    id="semester" 
                                    class="form-select @error('semester') is-invalid @enderror" 
                                    required>
                                <option value="" selected disabled>Pilih Semester</option>
                                <option value="1" {{ old('semester') == '1' ? 'selected' : '' }}>Semester 1</option>
                                <option value="2" {{ old('semester') == '2' ? 'selected' : '' }}>Semester 2</option>
                            </select>
                            @error('semester')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Buttons -->
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Nilai
                </button>
                <a href="{{ route('nilai.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection