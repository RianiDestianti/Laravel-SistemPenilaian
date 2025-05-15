@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Mata Pelajaran</h1>

    <form action="{{ route('mata-pelajaran.update', $mapel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kode" class="form-label">Kode</label>
            <input type="text" class="form-control" id="kode" name="kode" value="{{ $mapel->kode }}" required>
        </div>

        <div class="mb-3">
            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
            <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" value="{{ $mapel->mata_pelajaran }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <a href="{{ route('mata-pelajaran.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection

