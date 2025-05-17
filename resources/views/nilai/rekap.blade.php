@extends('layouts.app')

@section('title', 'Rekap Nilai Siswa - Sistem Informasi Akademik')

@section('styles')
<style>
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
    
    .rekap-card {
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        overflow: hidden;
        border: none;
    }
    
    .rekap-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.1);
    }
    
    .card-header-custom {
        background: linear-gradient(to right, #f8f9fa, #ffffff);
        border-bottom: 2px solid #f0f0f0;
        padding: 15px 20px;
    }
    
    .nilai-list {
        list-style-type: none;
        padding-left: 0;
    }
    
    .nilai-list li {
        padding: 8px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .nilai-list li:last-child {
        border-bottom: none;
    }
    
    .nilai-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 30px;
        font-weight: 500;
        float: right;
    }
    
    .nilai-excellent {
        background-color: rgba(46, 184, 92, 0.1);
        color: #2eb85c;
    }
    
    .nilai-good {
        background-color: rgba(51, 153, 255, 0.1);
        color: #3399ff;
    }
    
    .nilai-average {
        background-color: rgba(247, 184, 75, 0.1);
        color: #f7b84b;
    }
    
    .nilai-poor {
        background-color: rgba(229, 83, 83, 0.1);
        color: #e55353;
    }
    
    .btn-download {
        padding: 8px 16px;
        border-radius: 30px;
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .btn-download:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .download-section {
        background-color: #fff;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.03);
        margin-bottom: 25px;
    }
    
    .rata-rata-badge {
        font-size: 1.1rem;
        font-weight: 600;
        padding: 5px 15px;
        border-radius: 30px;
    }
    
    .student-info {
        display: flex;
        align-items: center;
    }
    
    .student-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 15px;
        background-color: #e9ecef;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #6e8efb;
    }
    
    .table-rekap th {
        background: linear-gradient(135deg, #f8f9fa, #ffffff);
        color: #495057;
        font-weight: 600;
    }
    
    .empty-data-message {
        padding: 40px 0;
        text-align: center;
        color: #6c757d;
    }
    
    .empty-data-message i {
        font-size: 3rem;
        margin-bottom: 15px;
        color: #dee2e6;
    }
</style>
@endsection

@section('content')
<div class="container py-4">
    <div class="page-header text-center">
        <h1 class="fw-bold display-5 mb-2">Rekap Nilai Siswa</h1>
        <p class="text-muted lead">Ringkasan performa akademik seluruh siswa</p>
    </div>
    
    <div class="dashboard-wrapper">
        <!-- Navigation & Download Buttons -->
        <div class="row mb-4">
            <div class="col-md-6">
                <a href="{{ route('nilai.index') }}" class="btn btn-outline-secondary btn-download">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Data Nilai
                </a>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="download-section">
                    <span class="me-2"><i class="fas fa-download me-1"></i> Unduh Laporan:</span>
                    <a href="{{ route('nilai.rekap.pdf') }}" class="btn btn-danger btn-download ms-2">
                        <i class="fas fa-file-pdf me-1"></i> PDF
                    </a>
                    <a href="{{ route('nilai.rekap.excel') }}" class="btn btn-success btn-download ms-2">
                        <i class="fas fa-file-excel me-1"></i> Excel
                    </a>
                    <a href="{{ route('nilai.rekap.word') }}" class="btn btn-primary btn-download ms-2">
                        <i class="fas fa-file-word me-1"></i> Word
                    </a>
                </div>
            </div>
        </div>
        
        @if(count($rekap) > 0)
        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-4">
                <div class="card rekap-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="stat-icon bg-gradient-primary mb-3 text-white">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <h5 class="card-title text-dark mb-3">Total Siswa</h5>
                        <h2 class="display-5 fw-bold text-primary mb-2">{{ count($rekap) }}</h2>
                        <p class="text-muted small mb-0">Siswa dengan nilai terekam</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card rekap-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="stat-icon bg-gradient-success mb-3 text-white">
                            <i class="fas fa-award fa-2x"></i>
                        </div>
                        <h5 class="card-title text-dark mb-3">Nilai Tertinggi</h5>
                        <h2 class="display-5 fw-bold text-success mb-2">
                            {{ max(array_column($rekap, 'rata_rata')) }}
                        </h2>
                        <p class="text-muted small mb-0">Rata-rata nilai tertinggi</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card rekap-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="stat-icon bg-gradient-warning mb-3 text-white">
                            <i class="fas fa-chart-simple fa-2x"></i>
                        </div>
                        <h5 class="card-title text-dark mb-3">Nilai Rata-rata</h5>
                        <h2 class="display-5 fw-bold text-warning mb-2">
                            {{ round(array_sum(array_column($rekap, 'rata_rata')) / count($rekap), 2) }}
                        </h2>
                        <p class="text-muted small mb-0">Rata-rata keseluruhan</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card rekap-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="stat-icon bg-gradient-danger mb-3 text-white">
                            <i class="fas fa-book fa-2x"></i>
                        </div>
                        <h5 class="card-title text-dark mb-3">Mata Pelajaran</h5>
                        @php
                            $totalMapel = 0;
                            foreach($rekap as $item) {
                                $totalMapel = max($totalMapel, count($item['nilai']));
                            }
                        @endphp
                        <h2 class="display-5 fw-bold text-danger mb-2">{{ $totalMapel }}</h2>
                        <p class="text-muted small mb-0">Total mata pelajaran</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Rekap Nilai Table -->
        <div class="card rekap-card">
            <div class="card-header card-header-custom">
                <div class="d-flex align-items-center">
                    <i class="fas fa-table text-primary me-2"></i>
                    <h5 class="card-title fw-bold mb-0">Data Rekap Nilai</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-rekap">
                        <thead>
                            <tr>
                                <th style="width: 30%">Nama Siswa</th>
                                <th style="width: 50%">Rekap Nilai per Mata Pelajaran</th>
                                <th style="width: 20%">Rata-rata</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rekap as $item)
                                <tr>
                                    <td>
                                        <div class="student-info">
                                            <div class="student-avatar">
                                                {{ substr($item['murid']->nama, 0, 1) }}
                                            </div>
                                            <div>
                                                <strong>{{ $item['murid']->nama }}</strong>
                                                @if(isset($item['murid']->kelas))
                                                    <div class="small text-muted">{{ $item['murid']->kelas }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="nilai-list mb-0">
                                            @foreach($item['nilai'] as $mapel => $nilai)
                                                <li class="d-flex justify-content-between align-items-center">
                                                    {{ $mapel }}
                                                    @php
                                                        $avgNilai = round($nilai['total'] / $nilai['count'], 2);
                                                        $badgeClass = '';
                                                        if($avgNilai >= 85) {
                                                            $badgeClass = 'nilai-excellent';
                                                        } elseif($avgNilai >= 75) {
                                                            $badgeClass = 'nilai-good';
                                                        } elseif($avgNilai >= 65) {
                                                            $badgeClass = 'nilai-average';
                                                        } else {
                                                            $badgeClass = 'nilai-poor';
                                                        }
                                                    @endphp
                                                    <span class="nilai-badge {{ $badgeClass }}">
                                                        {{ $avgNilai }}
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $rataRata = $item['rata_rata'];
                                            $badgeClass = '';
                                            if($rataRata >= 85) {
                                                $badgeClass = 'bg-success';
                                            } elseif($rataRata >= 75) {
                                                $badgeClass = 'bg-primary';
                                            } elseif($rataRata >= 65) {
                                                $badgeClass = 'bg-warning text-dark';
                                            } else {
                                                $badgeClass = 'bg-danger';
                                            }
                                        @endphp
                                        <span class="rata-rata-badge {{ $badgeClass }}">
                                            {{ $rataRata }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
        <div class="empty-data-message">
            <i class="fas fa-database d-block"></i>
            <h4>Tidak Ada Data</h4>
            <p>Belum ada data rekap nilai yang tersedia saat ini.</p>
            <a href="{{ route('nilai.create') }}" class="btn btn-primary mt-3">
                <i class="fas fa-plus me-2"></i>Tambah Data Nilai
            </a>
        </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
</script>
@endsection