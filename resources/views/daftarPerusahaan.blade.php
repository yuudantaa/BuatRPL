@extends('layouts.main')

@section('title', 'Daftar Perusahaan')

@section('content')
<div class="container mt-4">
    <h1>Daftar Perusahaan</h1>
    <a href="{{ route('perusahaan.create') }}" class="btn btn-primary mb-3">Tambah Perusahaan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Perusahaan</th>
                <th>Nama Bank</th>
                <th>Rekening</th>
                <th>Jumlah Karyawan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($perusahaans as $perusahaan)
                <tr>
                    <td>{{ $perusahaan->nama_perusahaan }}</td>
                    <td>{{ $perusahaan->nama_bank }}</td>
                    <td>{{ $perusahaan->rekening }}</td>
                    <td>{{ $perusahaan->karyawans_count }}</td>
                    <td>
                        <a href="{{ route('perusahaan.edit', $perusahaan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('perusahaan.destroy', $perusahaan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus perusahaan?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
