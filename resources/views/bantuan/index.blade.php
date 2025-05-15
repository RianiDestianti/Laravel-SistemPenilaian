@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Halaman Bantuan</h1>

    <h3>FAQ (Pertanyaan yang Sering Diajukan)</h3>
    <div class="accordion" id="faqAccordion">
        @foreach($faq as $i => $item)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $i }}">
                <button class="accordion-button @if($i != 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="{{ $i == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $i }}">
                    {{ $item['question'] }}
                </button>
            </h2>
            <div id="collapse{{ $i }}" class="accordion-collapse collapse @if($i == 0) show @endif" aria-labelledby="heading{{ $i }}" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    {{ $item['answer'] }}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <hr>

    <h3>Panduan Alur Kerja Sistem</h3>
    <p style="white-space: pre-line;">{{ $panduan }}</p>
</div>
@endsection
