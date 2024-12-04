@extends("layouts/main")

@section("title", "Dashboard")

@section('content')
<div class="container mt-4">
    <!-- Page Title -->
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mb-4" style="font-weight: bold;">Dashboard</h1>
        </div>
    </div>

    <!-- Stats Row -->
    <div class="row d-flex justify-content-center">
        <!-- Total Karyawan Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0 position-relative" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white;">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Total Karyawan</h5>
                        <h4 class="card-subtitle mb-0">{{ $totalKaryawan ?? '10' }}</h4>
                    </div>
                </div>
                <small class="position-absolute end-0 bottom-0 m-2 text-white-50">Last updated: {{ now()->format('d M Y') }}</small>
            </div>
        </div>

        <!-- Total Perusahaan Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0 position-relative" style="background: linear-gradient(to right, #ff512f, #f09819); color: white;">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-building fa-3x"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Total Perusahaan</h5>
                        <h4 class="card-subtitle mb-0">{{ $totalPerusahaan ?? '1' }}</h4>
                    </div>
                </div>
                <small class="position-absolute end-0 bottom-0 m-2 text-white-50">Last updated: {{ now()->format('d M Y') }}</small>
            </div>
        </div>
    </div>

    <!-- Recent Activities Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="card-title">Aktivitas Terbaru</h5>
                    <ul class="list-group">
                        @forelse($recentActivities ?? [] as $activity)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $activity->description }}
                                <span class="badge bg-primary">{{ $activity->created_at->diffForHumans() }}</span>
                            </li>
                        @empty
                            <li class="list-group-item">Belum ada aktivitas terbaru.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
