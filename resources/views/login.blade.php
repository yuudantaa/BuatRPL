<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!--buat tabel-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <!--icon-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <title>Document</title>
</head>
<body>
        <div class="container-fluid">
            <!--header-->
            <div class="row">
              <div class="col-md-12 bg-plain py-2">
               <span class="badge badge-pill badge-white text-primary text-left" style="font-size: 24px;">
                 INI PAYROLL </span>
               <div class="dropdown float-right">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bi bi-file-person"></i> User
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">nama user</a>
                  <a class="dropdown-item" href="/user">Ganti Password</a>
                  <a class="dropdown-item" href="/logout">Keluar</a>
                </div>
              </div>
              </div>
            </div>

            <div class="row">
                <div class="col-md-12 bg-primary py-3">
                <div class="dropdown float-right">
                </div>
                </div>
            </div>

            <div class="row vh-100">
                <div class="col-md-2 shadow">
                    
                    <div class="row mt-4">
                        <div class="col-3 ">
                          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link {{($key=="home") ? "active":""}}" id="v-pills-home-tab" href="/" >Dashboard</a>
                            <a class="nav-link {{($key=="daftarKaryawan") ? "active":""}}" id="v-pills-profile-tab" href="/daftarKaryawan">Karyawan</a>
                            <a class="nav-link" id="v-pills-messages-tab" href="#" >Perusahaan</a>
                            <a class="nav-link" id="v-pills-settings-tab" href="#" >Settings</a>
                          </div>
                        </div>
                        
                      </div>
                </div>

                <div class="col-md-10">
                    <div class="card mt-4">
                      <div class="card-header"></div>
                      <div class="card-body shadow">
                      @yield('home')
                      @yield('daftarKaryawan')
                   </div>          
                </div>
            </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--link table css-->
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
    new DataTable('#example');
    </script>
</body>
</html>