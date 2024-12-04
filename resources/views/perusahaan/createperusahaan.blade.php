@extends('layouts.main')

@section('title', 'Tambah Perusahaan')

@section('content')
<div class="container mt-4">
    <h1>Tambah Perusahaan</h1>
    <form action="{{ route('perusahaan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" class="form-control" value="{{ old('nama_perusahaan') }}" required>
        </div>
        <div class="form-group">
            <label>Nama Bank</label>
            <input type="text" name="nama_bank" class="form-control" value="{{ old('nama_bank') }}" required>
        </div>
        <div class="form-group">
            <label>No. Rekening</label>
            <input type="text" name="rekening" class="form-control" value="{{ old('rekening') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
