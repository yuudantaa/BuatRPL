@extends('layouts.main')

@section('title', 'Tambah Karyawan')

@section('content')
<div class="container mt-4">
    <h1>Tambah Karyawan</h1>
    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf

        {{-- Nama --}}
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Masukkan nama karyawan" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- No Rekening --}}
        <div class="form-group">
            <label for="no_rekening">No Rekening</label>
            <input type="text" id="no_rekening" name="no_rekening" class="form-control @error('no_rekening') is-invalid @enderror" value="{{ old('no_rekening') }}" placeholder="Masukkan nomor rekening" required>
            @error('no_rekening')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Status --}}
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                <option value="">--Pilih Status--</option>
                <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Non-Aktif" {{ old('status') == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Department --}}
        <div class="form-group">
            <label for="department">Department</label>
            <select id="department" name="department" class="form-control @error('department') is-invalid @enderror" required>
                <option value="">--Pilih Department--</option>
                <option value="HRD" {{ old('department') == 'HRD' ? 'selected' : '' }}>HRD</option>
                <option value="Finance" {{ old('department') == 'Finance' ? 'selected' : '' }}>Finance</option>
                <option value="IT" {{ old('department') == 'IT' ? 'selected' : '' }}>IT</option>
                <option value="Marketing" {{ old('department') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                <option value="Sales" {{ old('department') == 'Sales' ? 'selected' : '' }}>Sales</option>
            </select>
            @error('department')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Joining Date --}}
        <div class="form-group">
            <label for="joining_date">Joining Date</label>
            <input type="date" id="joining_date" name="joining_date" class="form-control @error('joining_date') is-invalid @enderror" value="{{ old('joining_date') }}" required>
            @error('joining_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Nama Bank (Dropdown) --}}
        <div class="form-group">
            <label for="nama_bank">Nama Bank</label>
            <select id="nama_bank" name="nama_bank" class="form-control @error('nama_bank') is-invalid @enderror" required>
                <option value="">--Pilih Bank--</option>
                <option value="BCA" {{ old('nama_bank') == 'BCA' ? 'selected' : '' }}>BCA</option>
                <option value="Mandiri" {{ old('nama_bank') == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                <option value="BNI" {{ old('nama_bank') == 'BNI' ? 'selected' : '' }}>BNI</option>
                <option value="BRI" {{ old('nama_bank') == 'BRI' ? 'selected' : '' }}>BRI</option>
            </select>
            @error('nama_bank')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Nama Perusahaan (Input Manual) --}}
        <select name="perusahaan_id" class="form-control" required>
            <option value="">--Pilih Perusahaan--</option>
            @foreach($perusahaans as $perusahaan)
                <option value="{{ $perusahaan->id }}" {{ old('perusahaan_id') == $perusahaan->id ? 'selected' : '' }}>
                    {{ $perusahaan->nama_perusahaan }}
                </option>
            @endforeach
        </select>


        {{-- Tombol Simpan --}}
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
