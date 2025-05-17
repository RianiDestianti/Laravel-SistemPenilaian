@extends('layouts.app')
@section('title', 'Dashboard - Sistem Informasi Akademik')
@section('styles')
<style>
    .stat-card {
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        overflow: hidden;
        border: none;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.1);
    }
    
    .stat-icon {
        height: 70px;
        width: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin: 0 auto;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #6e8efb, #a777e3);
    }
    
    .bg-gradient-success {
        background: linear-gradient(135deg, #2dceb1, #7ed56f);
    }
    
    .bg-gradient-warning {
        background: linear-gradient(135deg, #ffa236, #ffcc33);
    }
    
    .bg-gradient-danger {
        background: linear-gradient(135deg, #f96868, #ff8f8f);
    }
    
    .card-header-custom {
        background: linear-gradient(to right, #f8f9fa, #ffffff);
        border-bottom: 2px solid #f0f0f0;
        padding: 15px 20px;
    }
    
    .announcement-card {
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border: none;
        transition: all 0.3s;
    }
    
    .announcement-card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }
    
    .list-group-item {
        border-left: none;
        border-right: none;
        padding: 15px 20px;
        transition: all 0.2s;
    }
    
    .list-group-item:hover {
        background-color: #f8f9fa;
    }
    
    .announcement-badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-weight: 500;
    }
    
    .page-header {
        padding: 30px 0;
        margin-bottom: 30px;
        position: relative;
    }
    
    .page-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 3px;
        background: linear-gradient(to right, #6e8efb, #a777e3);
    }
    
    .dashboard-wrapper {
        background-color: #f8f9fc;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 30px;
    }
    
    .event-date {
        font-size: 0.85rem;
        display: inline-block;
        padding: 3px 10px;
        border-radius: 30px;
    }
</style>
@endsection
@section('content')
<div class="container py-4">
    <div class="page-header text-center">
        <h1 class="fw-bold display-5 mb-2">Dashboard Sistem Informasi Akademik</h1>
        <p class="text-muted lead">Selamat datang di portal pengelolaan data dan informasi akademik</p>
    </div>
<div class="dashboard-wrapper">
    <div class="row g-4">
        <!-- Kartu Statistik -->
        <div class="col-md-3 mb-4">
            <div class="card stat-card h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-icon bg-gradient-primary mb-3 text-white">
                        <i class="fas fa-user-graduate fa-2x"></i>
                    </div>
                    <h5 class="card-title text-dark mb-3">Total Murid</h5>
                    <h2 class="display-5 fw-bold text-primary mb-2">{{ $totalMurid ?? '250' }}</h2>
                    <p class="text-muted small mb-3">Terdaftar aktif dalam semester ini</p>
                    <a href="{{ route('murid.index') }}" class="btn btn-primary btn-sm rounded-pill px-4">
                        <i class="fas fa-eye me-1"></i> Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card stat-card h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-icon bg-gradient-success mb-3 text-white">
                        <i class="fas fa-chalkboard-teacher fa-2x"></i>
                    </div>
                    <h5 class="card-title text-dark mb-3">Total Guru</h5>
                    <h2 class="display-5 fw-bold text-success mb-2">{{ $totalGuru ?? '45' }}</h2>
                    <p class="text-muted small mb-3">Tenaga pengajar profesional</p>
                    <a href="{{ route('guru.index') }}" class="btn btn-success btn-sm rounded-pill px-4">
                        <i class="fas fa-eye me-1"></i> Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card stat-card h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-icon bg-gradient-warning mb-3 text-white">
                        <i class="fas fa-book fa-2x"></i>
                    </div>
                    <h5 class="card-title text-dark mb-3">Mata Pelajaran</h5>
                    <h2 class="display-5 fw-bold text-warning mb-2">{{ $totalMapel ?? '18' }}</h2>
                    <p class="text-muted small mb-3">Kurikulum terkini</p>
                    <a href="{{ route('mata-pelajaran.index') }}" class="btn btn-warning btn-sm text-dark rounded-pill px-4">
                        <i class="fas fa-eye me-1"></i> Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card stat-card h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-icon bg-gradient-danger mb-3 text-white">
                        <i class="fas fa-chart-line fa-2x"></i>
                    </div>
                    <h5 class="card-title text-dark mb-3">Nilai Terbaru</h5>
                    <h2 class="display-5 fw-bold text-danger mb-2">{{ $totalNilai ?? '150' }}</h2>
                    <p class="text-muted small mb-3">Inputan dalam minggu ini</p>
                    <a href="{{ route('nilai.index') }}" class="btn btn-danger btn-sm rounded-pill px-4">
                        <i class="fas fa-eye me-1"></i> Lihat Detail
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <div class="card announcement-card">
                <div class="card-header card-header-custom">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-chart-bar text-primary me-2"></i>
                        <h5 class="card-title fw-bold mb-0">Performa Akademik</h5>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="performaAkademik" height="250"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card announcement-card">
                <div class="card-header card-header-custom">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-clock text-success me-2"></i>
                        <h5 class="card-title fw-bold mb-0">Status Kehadiran Hari Ini</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row text-center g-3">
                        <div class="col-md-4">
                            <div class="py-3 bg-light rounded-3">
                                <h3 class="text-success mb-1">{{ $hadir ?? '230' }}</h3>
                                <p class="mb-0 text-muted">Hadir</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="py-3 bg-light rounded-3">
                                <h3 class="text-warning mb-1">{{ $izin ?? '15' }}</h3>
                                <p class="mb-0 text-muted">Izin</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="py-3 bg-light rounded-3">
                                <h3 class="text-danger mb-1">{{ $alpha ?? '5' }}</h3>
                                <p class="mb-0 text-muted">Alfa</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-3 border-top">
                        <h6 class="fw-bold">Ketidakhadiran Terbaru</h6>
                        <div class="list-group list-group-flush small">
                            <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="fw-semibold">Ahmad Fadillah</span>
                                    <small class="d-block text-muted">Kelas XI IPA 2</small>
                                </div>
                                <span class="badge bg-warning text-dark">Izin - Sakit</span>
                            </div>
                            <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="fw-semibold">Siti Nurhaliza</span>
                                    <small class="d-block text-muted">Kelas XII IPS 1</small>
                                </div>
                                <span class="badge bg-danger">Alpha</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-6 mb-4">
            <div class="card announcement-card">
                <div class="card-header card-header-custom">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fas fa-bell text-primary me-2"></i>
                            <h5 class="card-title fw-bold d-inline">Pengumuman Terbaru</h5>
                        </div>
                        <a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Lihat Semua</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 fw-bold">Jadwal UTS Semester Ganjil</h6>
                                <small class="text-primary">3 hari yang lalu</small>
                            </div>
                            <p class="mb-1">Jadwal UTS akan dilaksanakan pada tanggal 10-15 Juni 2025.</p>
                            <div class="d-flex align-items-center mt-2">
                                <div class="avatar-group">
                                    <img src="/api/placeholder/30/30" class="rounded-circle border border-white" alt="Admin">
                                    <span class="ms-2 text-muted small">Diposting oleh Admin</span>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 fw-bold">Pengumpulan Tugas Akhir</h6>
                                <small class="text-primary">1 minggu yang lalu</small>
                            </div>
                            <p class="mb-1">Batas pengumpulan tugas akhir adalah 20 Mei 2025. Harap memperhatikan ketentuan format yang telah diberikan.</p>
                            <div class="d-flex align-items-center mt-2">
                                <div class="avatar-group">
                                    <img src="/api/placeholder/30/30" class="rounded-circle border border-white" alt="Koordinator">
                                    <span class="ms-2 text-muted small">Diposting oleh Koordinator Akademik</span>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 fw-bold">Libur Hari Raya</h6>
                                <small class="text-primary">2 minggu yang lalu</small>
                            </div>
                            <p class="mb-1">Sekolah akan libur pada tanggal 25-30 Mei 2025. Aktivitas belajar mengajar akan kembali normal pada tanggal 31 Mei 2025.</p>
                            <div class="d-flex align-items-center mt-2">
                                <div class="avatar-group">
                                    <img src="/api/placeholder/30/30" class="rounded-circle border border-white" alt="Kepala Sekolah">
                                    <span class="ms-2 text-muted small">Diposting oleh Kepala Sekolah</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card announcement-card">
                <div class="card-header card-header-custom">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fas fa-calendar-alt text-success me-2"></i>
                            <h5 class="card-title fw-bold d-inline">Kegiatan Mendatang</h5>
                        </div>
                        <a href="#" class="btn btn-sm btn-outline-success rounded-pill">Lihat Kalendar</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 text-center" style="width: 60px">
                                        <span class="d-block fw-bold">20</span>
                                        <small>Mei</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <h6 class="mb-1 fw-bold">Rapat Guru</h6>
                                    <p class="mb-1">Rapat evaluasi kinerja semester ganjil.</p>
                                    <div class="d-flex align-items-center mt-2 text-muted small">
                                        <i class="fas fa-map-marker-alt me-1"></i> Ruang Rapat Utama
                                        <span class="mx-2">•</span>
                                        <i class="fas fa-clock me-1"></i> 09:00 - 12:00 WIB
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3 text-center" style="width: 60px">
                                        <span class="d-block fw-bold">01</span>
                                        <small>Jun</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <h6 class="mb-1 fw-bold">Ujian Akhir Semester</h6>
                                    <p class="mb-1">Persiapan pelaksanaan Ujian Akhir Semester.</p>
                                    <div class="d-flex align-items-center mt-2 text-muted small">
                                        <i class="fas fa-map-marker-alt me-1"></i> Seluruh Ruang Kelas
                                        <span class="mx-2">•</span>
                                        <i class="fas fa-clock me-1"></i> 07:30 - 13:30 WIB
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-3 text-center" style="width: 60px">
                                        <span class="d-block fw-bold">25</span>
                                        <small>Jun</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <h6 class="mb-1 fw-bold">Pembagian Rapor</h6>
                                    <p class="mb-1">Pembagian rapor semester ganjil kepada orang tua/wali murid.</p>
                                    <div class="d-flex align-items-center mt-2 text-muted small">
                                        <i class="fas fa-map-marker-alt me-1"></i> Aula Utama
                                        <span class="mx-2">•</span>
                                        <i class="fas fa-clock me-1"></i> 08:00 - 15:00 WIB
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-2">
        <div class="col-md-6 mb-4">
            <div class="card announcement-card">
                <div class="card-header card-header-custom">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-star text-warning me-2"></i>
                        <h5 class="card-title fw-bold mb-0">Guru Favorit Bulan Ini</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center">
                            <img src="/api/placeholder/120/120" class="rounded-circle img-thumbnail mb-3" alt="Foto Guru">
                        </div>
                        <div class="col-md-8">
                            <h5 class="fw-bold mb-1">Budi Santoso, S.Pd</h5>
                            <p class="text-muted mb-2">Guru Matematika</p>
                            <div class="mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <span class="ms-2 small">(4.9/5 dari 120 suara)</span>
                            </div>
                            <p class="small">"Pak Budi selalu mengajar dengan penuh dedikasi dan kreatifitas, membuat matematika terasa mudah dan menyenangkan untuk dipelajari."</p>
                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <span class="badge bg-info bg-opacity-10 text-info">Kreatif</span>
                                <span class="badge bg-success bg-opacity-10 text-success">Komunikatif</span>
                                <span class="badge bg-primary bg-opacity-10 text-primary">Sabar</span>
                                <span class="badge bg-warning bg-opacity-10 text-warning">Inspiratif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card announcement-card">
                <div class="card-header card-header-custom">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-link text-primary me-2"></i>
                        <h5 class="card-title fw-bold mb-0">Link & Sumber Daya Cepat</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="#" class="card border-0 bg-primary bg-opacity-10 text-primary text-decoration-none p-3 h-100">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-file-alt fa-2x me-3"></i>
                                    <div>
                                        <h6 class="mb-0 fw-bold">Peraturan Akademik</h6>
                                        <small>Panduan & tata tertib</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="card border-0 bg-success bg-opacity-10 text-success text-decoration-none p-3 h-100">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-download fa-2x me-3"></i>
                                    <div>
                                        <h6 class="mb-0 fw-bold">Materi Pelajaran</h6>
                                        <small>Unduh modul & materi</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="card border-0 bg-warning bg-opacity-10 text-warning text-decoration-none p-3 h-100">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-question-circle fa-2x me-3"></i>
                                    <div>
                                        <h6 class="mb-0 fw-bold">Bantuan</h6>
                                        <small>Panduan penggunaan</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="card border-0 bg-danger bg-opacity-10 text-danger text-decoration-none p-3 h-100">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-video fa-2x me-3"></i>
                                    <div>
                                        <h6 class="mb-0 fw-bold">Video Tutorial</h6>
                                        <small>Materi pendukung</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
    const ctx = document.getElementById('performaAkademik').getContext('2d');
    const performaChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Matematika', 'B. Indonesia', 'B. Inggris', 'IPA', 'IPS', 'Agama'],
            datasets: [
                {
                    label: 'Nilai Rata-rata',
                    backgroundColor: '#6e8efb',
                    data: [82, 79, 85, 80, 76, 88]
                },
                {
                    label: 'Nilai Tertinggi',
                    backgroundColor: '#2dceb1',
                    data: [95, 90, 97, 93, 88, 96]
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
</script>
@endsection