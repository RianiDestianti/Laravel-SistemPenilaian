@extends('layouts.app')

@section('title', 'Bantuan')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-white pb-0">
                    <div class="row">
                        <div class="col">
                            <h4 class="text-primary fw-bold mb-0">
                                <i class="fas fa-question-circle me-2"></i>Pusat Bantuan
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body px-4 pt-3 pb-4">
                    <ul class="nav nav-tabs mb-4" id="helpTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="true">
                                <i class="fas fa-question me-2"></i>FAQ
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="workflow-tab" data-bs-toggle="tab" data-bs-target="#workflow" type="button" role="tab" aria-controls="workflow" aria-selected="false">
                                <i class="fas fa-sitemap me-2"></i>Alur Kerja
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                <i class="fas fa-headset me-2"></i>Hubungi Kami
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="helpTabsContent">
                        <div class="tab-pane fade show active" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                            <div class="row mb-4">
                                <div class="col-12 col-md-6 col-lg-4 mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0">
                                            <i class="fas fa-search text-muted"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0" id="searchFaq" placeholder="Cari pertanyaan..." aria-label="Search FAQ">
                                    </div>
                                </div>
                            </div>

                            <div class="accordion" id="faqAccordion">
                                @forelse($faq as $i => $item)
                                <div class="accordion-item border mb-3 rounded shadow-sm faq-item">
                                    <h2 class="accordion-header" id="heading{{ $i }}">
                                        <button class="accordion-button @if($i != 0) collapsed @endif fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="{{ $i == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $i }}">
                                            {{ $item['question'] }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $i }}" class="accordion-collapse collapse @if($i == 0) show @endif" aria-labelledby="heading{{ $i }}" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <p class="mb-0">{{ $item['answer'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>Belum ada FAQ yang tersedia saat ini.
                                </div>
                                @endforelse
                            </div>
                        </div>

                        <div class="tab-pane fade" id="workflow" role="tabpanel" aria-labelledby="workflow-tab">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title mb-4 text-primary">
                                        <i class="fas fa-sitemap me-2"></i>Panduan Alur Kerja Sistem
                                    </h5>
                                    
                                    <div class="workflow-content">
                                        <p style="white-space: pre-line;" class="mb-4">{{ $panduan }}</p>
                                        
                                        @if(isset($workflowDiagram) && $workflowDiagram)
                                        <div class="text-center my-4">
                                            <img src="{{ asset($workflowDiagram) }}" alt="Diagram Alur Kerja" class="img-fluid rounded shadow-sm">
                                        </div>
                                        @endif
                                        
                                        <div class="workflow-steps mt-4">
                                            <div class="timeline">
                                                @foreach($workflowSteps ?? [] as $index => $step)
                                                <div class="timeline-item">
                                                    <div class="timeline-badge bg-primary">{{ $index + 1 }}</div>
                                                    <div class="timeline-content">
                                                        <h6 class="fw-bold">{{ $step['title'] ?? '' }}</h6>
                                                        <p>{{ $step['description'] ?? '' }}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm h-100">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4 text-primary">
                                                <i class="fas fa-envelope me-2"></i>Kirim Pesan
                                            </h5>
                                            
                                            <form id="helpForm">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kategori" class="form-label">Kategori</label>
                                                    <select class="form-select" id="kategori" name="kategori" required>
                                                        <option value="" selected disabled>Pilih kategori</option>
                                                        <option value="pertanyaan">Pertanyaan</option>
                                                        <option value="masalah">Laporan Masalah</option>
                                                        <option value="saran">Saran</option>
                                                        <option value="lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pesan" class="form-label">Pesan</label>
                                                    <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
                                                </div>
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mt-4 mt-md-0">
                                    <div class="card border-0 shadow-sm mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3 text-primary">
                                                <i class="fas fa-info-circle me-2"></i>Informasi Kontak
                                            </h5>
                                            <ul class="list-unstyled">
                                                <li class="mb-3">
                                                    <i class="fas fa-envelope text-primary me-2"></i>
                                                    <a href="mailto:support@example.com">support@example.com</a>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-phone-alt text-primary me-2"></i>
                                                    <a href="tel:+6281234567890">+62 812-3456-7890</a>
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fas fa-clock text-primary me-2"></i>
                                                    Senin - Jumat: 08.00 - 17.00 WIB
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3 text-primary">
                                                <i class="fas fa-file-alt me-2"></i>Panduan Populer
                                            </h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 border-0">
                                                    <a href="#" class="text-decoration-none">
                                                        <i class="fas fa-angle-right me-2 text-primary"></i>Cara Memulai
                                                    </a>
                                                </li>
                                                <li class="list-group-item px-0 border-0">
                                                    <a href="#" class="text-decoration-none">
                                                        <i class="fas fa-angle-right me-2 text-primary"></i>Mengelola Akun
                                                    </a>
                                                </li>
                                                <li class="list-group-item px-0 border-0">
                                                    <a href="#" class="text-decoration-none">
                                                        <i class="fas fa-angle-right me-2 text-primary"></i>Tutorial Penggunaan Sistem
                                                    </a>
                                                </li>
                                                <li class="list-group-item px-0 border-0">
                                                    <a href="#" class="text-decoration-none">
                                                        <i class="fas fa-angle-right me-2 text-primary"></i>Kebijakan Privasi
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchFaq');
        const faqItems = document.querySelectorAll('.faq-item');
        
        searchInput.addEventListener('keyup', function(e) {
            const searchString = e.target.value.toLowerCase();
            
            faqItems.forEach(item => {
                const question = item.querySelector('.accordion-button').textContent.toLowerCase();
                const answer = item.querySelector('.accordion-body').textContent.toLowerCase();
                
                if (question.includes(searchString) || answer.includes(searchString)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
        
        const helpForm = document.getElementById('helpForm');
        if (helpForm) {
            helpForm.addEventListener('submit', function(e) {
                e.preventDefault();
         
                const formContainer = helpForm.parentElement;
                const successMessage = document.createElement('div');
                successMessage.className = 'alert alert-success mt-3';
                successMessage.innerHTML = '<i class="fas fa-check-circle me-2"></i>Pesan Anda telah terkirim. Kami akan menghubungi Anda segera.';
                formContainer.appendChild(successMessage);
                
                helpForm.reset();
                
                setTimeout(() => {
                    successMessage.remove();
                }, 5000);
            });
        }
    });
</script>
@endsection

@section('styles')
<style>
    .timeline {
        position: relative;
        padding: 20px 0;
    }
    
    .timeline:before {
        content: '';
        position: absolute;
        top: 0;
        left: 15px;
        height: 100%;
        width: 2px;
        background: #e9ecef;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 30px;
        padding-left: 40px;
    }
    
    .timeline-badge {
        position: absolute;
        left: 0;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        text-align: center;
        color: white;
        line-height: 30px;
        z-index: 1;
    }
    
    .timeline-content {
        padding: 15px;
        background: #f8f9fa;
        border-radius: 5px;
        border-left: 3px solid #0d6efd;
    }
    
    .accordion-button:not(.collapsed) {
        background-color: rgba(13, 110, 253, 0.05);
        color: #0d6efd;
    }
    
    .accordion-button:focus {
        box-shadow: none;
    }
    
    .list-group-item:hover {
        background-color: rgba(13, 110, 253, 0.05);
    }
    
    .tab-pane {
        transition: all 0.3s ease;
    }
</style>
@endsection