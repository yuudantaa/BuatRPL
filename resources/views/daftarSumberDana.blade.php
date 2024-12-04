@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Daftar Sumber Dana</h1>
    <a href="{{ route('sumberDana.create') }}" class="btn btn-primary mb-3">Tambah Sumber Dana</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Sumber</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sumberDanas as $key => $sumberDana)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $sumberDana->nama_sumber }}</td>
                <td>{{ $sumberDana->deskripsi }}</td>
                <td>
                    <a href="{{ route('sumberDana.edit', $sumberDana->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('sumberDana.destroy', $sumberDana->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
