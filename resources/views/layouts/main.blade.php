<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Payroll System')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row bg-primary text-white py-2">
            <div class="col-md-12 d-flex align-items-center justify-content-between">
                <h4 class="mb-0">PAYROLL</h4>
                <div class="dropdown">
                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-file-person"></i> Profile
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">User</a>
                        <a class="dropdown-item" href="/logout">Keluar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row vh-100">
            <div class="col-md-2 bg-light shadow p-3">
                <nav class="nav flex-column">
                    <a class="nav-link {{ ($key ?? '') == 'home' ? 'active' : '' }}" href="/">Dashboard</a>
                    <a class="nav-link {{ ($key ?? '') == 'daftarKaryawan' ? 'active' : '' }}" href="/daftarKaryawan">Karyawan</a>
                    <a class="nav-link {{ ($key ?? '') == 'daftarPerusahaan' ? 'active' : '' }}" href="/daftarPerusahaan">Perusahaan</a>
                    <a class="nav-link {{ ($key ?? '') == 'sumberDana' ? 'active' : '' }}" href="/sumberDana">Sumber Dana</a> <!-- Tambahan Menu -->
                </nav>
            </div>

            <div class="col-md-10">
                <div class="card mt-4 shadow-sm">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
