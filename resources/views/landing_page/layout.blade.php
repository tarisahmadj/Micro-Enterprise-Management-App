<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>E-Bumdes | {{ $title }}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../template/vendors/feather/feather.css">
  <link rel="stylesheet" href="../../template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../template/images/jateng.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
  <div class="container-scroller">
      {{-- Navbar --}}
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="/"><img src="../../template/images/jateng.png" alt="logo" width="40px"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
              <a class="nav-link {{ Request::is('/') ? 'active' : '' }} font-weight-bold text-lg" href="/">Beranda <span class="sr-only">(current)</span></a>
              <a class="nav-link font-weight-bold text-lg" href="#wisata">Wisata Desa</a>
              <a href="/login" class="btn btn-sm btn-primary my-auto font-weight-bold">Login</a>
              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Masuk sebagai : </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                          <a class="btn btn-sm btn-primary px-4 my-auto font-weight-bold" href="admin/login">Admin</a>
                          <a class="btn btn-sm btn-primary px-4 my-auto font-weight-bold" href="/login">User</a>
                          <a class="btn btn-sm btn-primary px-4 my-auto font-weight-bold" href="superadmin/login">TU</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
      {{-- End of navbar --}}
      @yield('contentLandingPage')
      {{-- Footer --}}
      <div class="bg-dark">
        <div class="container py-5 text-white">
          <div class="row my-5">
            <div class="col-2">
              <img src="../../template/images/jateng.png" alt="Logo sekolah" width="150px">
            </div>
            <div class="col-4">
              <h3 class="font-weight-bold mb-3">Tentang Instansi</h3>
              <h5 class="font-weight-normal">Dinas Pemberdayaan Masyarakat dan Desa Kabupaten Grobogan</h5>
              <p class="font-weight-normal mb-4">Jl. Gn. Muria No.4, Simpang Utara, Purwodadi, Kec. Purwodadi, Kabupaten Grobogan, Jawa Tengah 53122</p>
              <p class="font-weight-bold">Telepon: (0292) 421564</p>
            </div>
            <div class="col-3">
              <h3 class="font-weight-bold mb-3">Navigasi</h3>
              <ul>
                <li><a href="/" class="text-decoration-none">Beranda</a></li>
                <li><a href="/wisata" class="text-decoration-none">Wisata Desa</a></li>
              </ul>
            </div>
            <div class="col-3">
              <h3 class="font-weight-bold mb-3">Tautan Eksternal</h3>
              <a href="https://dispermasdes.grobogan.go.id/" class="text-decoration-none">Website Instansi</a>
            </div>
          </div>
        </div>
      </div>
      {{-- End of Footer --}}
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../template/js/off-canvas.js"></script>
  <script src="../../template/js/hoverable-collapse.js"></script>
  <script src="../../template/js/template.js"></script>
  <script src="../../template/js/settings.js"></script>
  <script src="../../template/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
