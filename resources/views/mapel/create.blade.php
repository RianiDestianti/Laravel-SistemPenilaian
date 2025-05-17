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
    
    /* Password toggle icon */
    .password-toggle {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6c757d;
    }
    
    /* Required asterisk */
    .required::after {
        content: '*';
        color: #e74c3c;
        margin-left: 4px;
    }
    
    /* Role options styling */
    .role-options {
        display: flex;
        gap: 1rem;
        margin-top: 0.5rem;
    }
    
    .role-option {
        flex: 1;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 1rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .role-option:hover {
        border-color: #3498db;
        background-color: rgba(52, 152, 219, 0.05);
    }
    
    .role-option.selected {
        border-color: #3498db;
        background-color: rgba(52, 152, 219, 0.1);
    }
    
    .role-option i {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        display: block;
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
        
        .role-options {
            flex-direction: column;
            gap: 0.75rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="page-header">
        <h1><i class="fas fa-book me-2"></i> Tambah Mata Pelajaran</h1>
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
        <form method="POST" action="{{ route('mata-pelajaran.store') }}">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <!-- Kode Field -->
                    <div class="form-group">
                        <label for="kode" class="form-label required">Kode</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-code"></i></span>
                            <input type="text" 
                                   name="kode" 
                                   id="kode" 
                                   class="form-control @error('kode') is-invalid @enderror" 
                                   value="{{ old('kode') }}" 
                                   placeholder="Masukkan kode mapel" 
                                   required>
                            @error('kode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Kode unik untuk setiap mata pelajaran.</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Nama Mata Pelajaran Field -->
                    <div class="form-group">
                        <label for="mata_pelajaran" class="form-label required">Mata Pelajaran</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-book-open"></i></span>
                            <input type="text" 
                                   name="mata_pelajaran" 
                                   id="mata_pelajaran" 
                                   class="form-control @error('mata_pelajaran') is-invalid @enderror" 
                                   value="{{ old('mata_pelajaran') }}" 
                                   placeholder="Masukkan nama mata pelajaran" 
                                   required>
                            @error('mata_pelajaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Contoh: Matematika, Bahasa Indonesia, dll.</small>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="btn-container mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('mata-pelajaran.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
