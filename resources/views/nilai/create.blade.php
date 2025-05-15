@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Nilai</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_guru" class="form-label">Nama Guru</label>
            <select name="id_guru" class="form-control" required>
                @foreach ($guru as $g)
                    <option value="{{ $g->id }}">{{ $g->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_murid" class="form-label">Nama Murid</label>
            <select name="id_murid" class="form-control" required>
                @foreach ($murid as $m)
                    <option value="{{ $m->id }}">{{ $m->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_mata_pelajaran" class="form-label">Mata Pelajaran</label>
            <select name="id_mata_pelajaran" class="form-control" required>
                @foreach ($mataPelajaran as $mp)
                    <option value="{{ $mp->id }}">{{ $mp->mata_pelajaran }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="text" name="nilai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="predikat" class="form-label">Predikat</label>
            <input type="text" name="predikat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="text" name="semester" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
