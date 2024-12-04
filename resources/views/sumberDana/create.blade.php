@extends('layouts.main')

@section('title', 'Tambah Sumber Dana')

@section('content')
<div class="container">
    <h1>Tambah Sumber Dana</h1>
    <form action="{{ route('sumberDana.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_sumber">Nama Sumber Dana</label>
            <input type="text" class="form-control" id="nama_sumber" name="nama_sumber" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
