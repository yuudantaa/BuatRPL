@extends('layouts.main')

@section('title', 'Edit Karyawan')

@section('content')
<div class="container mt-4">
    <h1>Edit Karyawan</h1>
    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Input Nama Karyawan -->
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $karyawan->nama) }}" required>
        </div>

        <!-- Input No Rekening -->
        <div class="form-group">
            <label>No Rekening</label>
            <input type="text" name="no_rekening" class="form-control" value="{{ old('no_rekening', $karyawan->no_rekening) }}" required>
        </div>

        <!-- Input Status -->
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Aktif" {{ old('status', $karyawan->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Non-Aktif" {{ old('status', $karyawan->status) == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
            </select>
        </div>

        <!-- Input Department -->
        <div class="form-group">
            <label>Department</label>
            <select name="department" class="form-control" required>
                <option value="HRD" {{ old('department', $karyawan->department) == 'HRD' ? 'selected' : '' }}>HRD</option>
                <option value="Finance" {{ old('department', $karyawan->department) == 'Finance' ? 'selected' : '' }}>Finance</option>
                <option value="IT" {{ old('department', $karyawan->department) == 'IT' ? 'selected' : '' }}>IT</option>
                <option value="Marketing" {{ old('department', $karyawan->department) == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                <option value="Sales" {{ old('department', $karyawan->department) == 'Sales' ? 'selected' : '' }}>Sales</option>
            </select>
        </div>

        <!-- Input Joining Date -->
        <div class="form-group">
            <label>Joining Date</label>
            <input type="date" name="joining_date" class="form-control" value="{{ old('joining_date', $karyawan->joining_date) }}" required>
        </div>

        <!-- Dropdown Nama Bank -->
        <div class="form-group">
            <label>Nama Bank</label>
            <select name="nama_bank" class="form-control" required>
                <option value="BCA" {{ old('nama_bank', $karyawan->nama_bank) == 'BCA' ? 'selected' : '' }}>BCA</option>
                <option value="Mandiri" {{ old('nama_bank', $karyawan->nama_bank) == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                <option value="BNI" {{ old('nama_bank', $karyawan->nama_bank) == 'BNI' ? 'selected' : '' }}>BNI</option>
                <option value="BRI" {{ old('nama_bank', $karyawan->nama_bank) == 'BRI' ? 'selected' : '' }}>BRI</option>
            </select>
        </div>

        <!-- Input Manual Nama Perusahaan -->
        <select name="perusahaan_id" class="form-control" required>
            <option value="">--Pilih Perusahaan--</option>
            @foreach($perusahaans as $perusahaan)
                <option value="{{ $perusahaan->id }}" {{ old('perusahaan_id') == $perusahaan->id ? 'selected' : '' }}>
                    {{ $perusahaan->nama_perusahaan }}
                </option>
            @endforeach
        </select>


        <!-- Error Handling -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Tombol Simpan -->
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
