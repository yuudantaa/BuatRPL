@extends("layouts.main")

@section("title", "Daftar Karyawan")

@section('content')
    <div class="container mt-4">
        <h1>Daftar Karyawan</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Tambah -->
        <div class="mb-3">
            <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Karyawan</a>
        </div>

        <!-- Tabel Karyawan -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Nama Bank</th>
                    <th>No Rekening</th>
                    <th>Status</th>
                    <th>Department</th>
                    <th>Joining Date</th>
                    <th>Perusahaan</th> <!-- Kolom perusahaan ditambahkan -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($karyawans as $karyawan)
                    <tr>
                        <td>{{ $karyawan->nama }}</td>
                        <td>{{ $karyawan->nama_bank }}</td>
                        <td>{{ $karyawan->no_rekening }}</td>
                        <td>{{ $karyawan->status }}</td>
                        <td>{{ $karyawan->department }}</td>
                        <td>{{ $karyawan->joining_date }}</td>
                        <td>
                            <!-- Menampilkan Nama Perusahaan yang terkait -->
                            @if($karyawan->perusahaan)
                                {{ $karyawan->perusahaan->nama_perusahaan }}
                            @else
                                Belum ada perusahaan
                            @endif
                        </td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus karyawan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data karyawan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
