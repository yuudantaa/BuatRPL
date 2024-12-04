@extends('layouts.main')

@section('title', 'Edit Perusahaan')

@section('content')
<div class="container mt-4">
    <h1>Edit Perusahaan</h1>
    <form action="{{ route('perusahaan.update', $perusahaan->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- Menandakan bahwa ini adalah update dengan metode PUT -->
        <div class="form-group">
            <label>Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" class="form-control" value="{{ old('nama_perusahaan', $perusahaan->nama_perusahaan) }}" required>
        </div>
        <div class="form-group">
            <label>Nama Bank</label>
            <input type="text" name="nama_bank" class="form-control" value="{{ old('nama_bank', $perusahaan->nama_bank) }}" required>
        </div>
        <div class="form-group">
            <label>No. Rekening</label>
            <input type="text" name="rekening" class="form-control" value="{{ old('rekening', $perusahaan->rekening) }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
