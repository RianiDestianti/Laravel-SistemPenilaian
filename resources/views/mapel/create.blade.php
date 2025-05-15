@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Mata Pelajaran</h1>

    <form action="{{ route('mata-pelajaran.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="kode" class="form-label">Kode</label>
            <input type="text" class="form-control" id="kode" name="kode" required>
        </div>

        <div class="mb-3">
            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
            <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <a href="{{ route('mata-pelajaran.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
