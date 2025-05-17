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
    
    /* User info panel */
    .user-info-panel {
        background-color: rgba(52, 152, 219, 0.05);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        border: 1px solid rgba(52, 152, 219, 0.1);
    }
    
    .user-info-panel h3 {
        font-size: 1.25rem;
        margin-bottom: 1rem;
        color: #2980b9;
        font-weight: 600;
    }
    
    .user-info-panel .user-detail {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
    }
    
    .user-info-panel .user-detail i {
        width: 24px;
        color: #3498db;
        margin-right: 0.75rem;
    }
    
    .user-info-panel .user-detail strong {
        margin-right: 0.5rem;
        font-weight: 600;
    }
    
    .user-info-panel .badge-container {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    /* Change password section */
    .change-password-section {
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        padding-top: 1.5rem;
        margin-top: 1.5rem;
    }
    
    .change-password-toggle {
        display: flex;
        align-items: center;
        cursor: pointer;
        font-weight: 600;
        margin-bottom: 1rem;
        color: #3498db;
    }
    
    .change-password-toggle i {
        margin-right: 0.5rem;
        transition: transform 0.3s ease;
    }
    
    .change-password-toggle i.rotated {
        transform: rotate(90deg);
    }
    
    /* Badge styling */
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
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .form-panel {
            padding: 1.5rem;
        }
        
        .role-options {
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .btn-container {
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="page-header">
        <h1><i class="fas fa-user-edit me-2"></i> Edit User</h1>
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
    
    <!-- User Info Panel -->
    <div class="user-info-panel">
        <h3><i class="fas fa-info-circle me-2"></i>Informasi User</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="user-detail">
                    <i class="fas fa-id-badge"></i>
                    <strong>ID:</strong> #{{ $user->id }}
                </div>
                <div class="user-detail">
                    <i class="fas fa-user"></i>
                    <strong>Username:</strong> {{ $user->username }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="user-detail">
                    <i class="fas fa-user-tag"></i>
                    <strong>Role:</strong>
                    <div class="badge-container">
                        @if($user->role == 'admin')
                            <span class="badge badge-admin">
                                <i class="fas fa-user-shield me-1"></i> Admin
                            </span>
                        @elseif($user->role == 'guru')
                            <span class="badge badge-guru">
                                <i class="fas fa-chalkboard-teacher me-1"></i> Guru
                            </span>
                        @elseif($user->role == 'murid')
                            <span class="badge badge-murid">
                                <i class="fas fa-user-graduate me-1"></i> Murid
                            </span>
                        @endif
                    </div>
                </div>
                <div class="user-detail">
                    <i class="fas fa-calendar-alt"></i>
                    <strong>Dibuat pada:</strong> {{ $user->created_at->format('d M Y, H:i') }}
                </div>
            </div>
        </div>
    </div>
    
    <!-- Form Panel -->
    <div class="form-panel">
        <form method="POST" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-12">
                    <!-- Username Field -->
                    <div class="form-group">
                        <label for="username" class="form-label required">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-user"></i></span>
                            <input type="text" 
                                   name="username" 
                                   id="username" 
                                   class="form-control @error('username') is-invalid @enderror" 
                                   value="{{ old('username', $user->username) }}" 
                                   placeholder="Masukkan username" 
                                   required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Username harus unik dan terdiri dari minimal 5 karakter.</small>
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-md-12">
                    <!-- Role Field -->
                    <div class="form-group">
                        <label class="form-label required">Pilih Role</label>
                        <div class="role-options">
                            <div class="role-option @if(old('role', $user->role) == 'admin') selected @endif" onclick="selectRole('admin')">
                                <i class="fas fa-user-shield text-purple"></i>
                                <div class="role-name">Admin</div>
                                <div class="role-desc text-muted small">Akses penuh ke semua fitur sistem</div>
                            </div>
                            
                            <div class="role-option @if(old('role', $user->role) == 'guru') selected @endif" onclick="selectRole('guru')">
                                <i class="fas fa-chalkboard-teacher text-primary"></i>
                                <div class="role-name">Guru</div>
                                <div class="role-desc text-muted small">Akses untuk mengelola kelas dan materi</div>
                            </div>
                            
                            <div class="role-option @if(old('role', $user->role) == 'murid') selected @endif" onclick="selectRole('murid')">
                                <i class="fas fa-user-graduate text-success"></i>
                                <div class="role-name">Murid</div>
                                <div class="role-desc text-muted small">Akses untuk mengikuti kelas dan ujian</div>
                            </div>
                        </div>
                        <input type="hidden" name="role" id="role" value="{{ old('role', $user->role) }}">
                        @error('role')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Change Password Section -->
            <div class="change-password-section mt-4">
                <div class="change-password-toggle" onclick="togglePasswordForm()">
                    <i class="fas fa-chevron-right" id="password-chevron"></i>
                    <span>Ganti Password</span>
                </div>
                
                <div id="password-form" style="display: none;">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Password Field -->
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group position-relative">
                                    <span class="input-group-text bg-white"><i class="fas fa-lock"></i></span>
                                    <input type="password" 
                                           name="password" 
                                           id="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           placeholder="Masukkan password baru">
                                    <span class="password-toggle" onclick="togglePassword()">
                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                    </span>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti password.</small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <!-- Password Confirmation Field -->
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white"><i class="fas fa-lock"></i></span>
                                    <input type="password" 
                                           name="password_confirmation" 
                                           id="password_confirmation" 
                                           class="form-control" 
                                           placeholder="Konfirmasi password baru">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Buttons -->
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Toggle password visibility
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
    
    // Toggle password form
    function togglePasswordForm() {
        const passwordForm = document.getElementById('password-form');
        const passwordChevron = document.getElementById('password-chevron');
        
        if (passwordForm.style.display === 'none') {
            passwordForm.style.display = 'block';
            passwordChevron.classList.add('rotated');
        } else {
            passwordForm.style.display = 'none';
            passwordChevron.classList.remove('rotated');
        }
    }
    
    // Select role
    function selectRole(role) {
        document.getElementById('role').value = role;
        
        // Remove selected class from all options
        const options = document.querySelectorAll('.role-option');
        options.forEach(option => {
            option.classList.remove('selected');
        });
        
        // Add selected class to the clicked option
        event.currentTarget.classList.add('selected');
    }
</script>
@endsection