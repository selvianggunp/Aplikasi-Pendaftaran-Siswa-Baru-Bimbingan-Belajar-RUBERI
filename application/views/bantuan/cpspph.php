<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $judul; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('sb-admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('sb-admin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home'); ?>">

        <div class="sidebar-brand-icon rotate-n-15">
          
        </div>
        <img src="<?= base_url('assets/logo_ruberi.png'); ?>"  width="47" height="53" >
        <div class="sidebar-brand-text mx-3">RUBERI</div>

      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

       <!-- Nav Item - Profile /  dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('home'); ?>">
         <i class="fas fa-home"></i>
          <span>Beranda</span></a> 
      </li>

      <!-- Nav Item - Profile /  dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Pendaftaran/pj'); ?>">
         <i class="fas fa-users"></i>
          <span>Pendaftaran Siswa Baru</span></a>
      </li>
      <!-- Nav Item -  Pembayaran SPP / chart-->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/daftar');  ?>">
         <i class="fas fa-user-plus"></i>
          <span>SIGN UP</span></a>
      </li>

      <!-- Nav Item -  Pembayaran SPP / tabel-->
      <li class="nav-item">
        <a class="nav-link"  href="<?= base_url('auth'); ?>">
          <i class="fas fa-sign-in-alt"></i>
          <span>LOGIN</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              
            </li>
          

    <!--<div class="topbar-divider d-none d-sm-block"></div> -->
<!-- Nav Item - User Information -->
            <li class="nav-item dropdown " >
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Bantuan</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('home/cpbh'); ?>">
                  <i class="fas fa-align-justify fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cara Pendaftaran Bimbel
                </a>
                <a class="dropdown-item" href="<?= base_url('home/cpspph'); ?>">
                 <i class="fas fa-align-justify fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cara Pembayaran SPP
                </a>
                 <a class="dropdown-item" href="<?= base_url('home/tentang_kami'); ?>">
                  <i class="fas fa-school fa-sm fa-fw mr-2 text-gray-400"></i>
                  Tentang kami
                </a>
              </div>
            </li>


          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
           
            <ul class="list-group col-md">
               <li class="list-group-item">
                <div  class="alert alert-info" role="alert">
                 <h2 align="center">Cara Pembayaran SPP</h2>
                </div><br>
              Pembayaran SPP bisa dilakukan dengan 2 cara:<br>
                <b>1. TRANSFER</b><br>
                   a. Login<br>
                   b. Klik menu pembayaran SPP<br>
                   c. Mengisi data pembayaran SPP<br>
                   d. Klik BAYAR SPP<br>
                   e. Setelah itu, kamu bisa mengambil kwitansi pembayaran SPP dengan menunjukkan kode transaksi SPP ke bagian administrasi di RUBERI <br>
                   f. Selesai <br><br>
                <b>2. NON TRANSFER</b> <br>
                Pembayaran SPP Non Transfer dilakukan dengan menunjukkan kode siswa ke bagian adminstrasi di RUBERI, setelah itu kamu akan menerima kwitansi pembayaran SPP.
                <br><br>
                 <b>Rincian Biaya SPP</b>
                <table border="1" id="dataTable" width="100%" cellspacing="0">
                <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Jenjang</th>
              <th class="text-center">Biaya</th>         
            </tr>
          </thead>
          <tbody>
          <?php $i= 1; foreach ($data_jenis_SPP as $djs) { ?>
            <tr>
                <td class="text-center"><?= $i++; ?></td>
                <td class="text-center"><?= $djs['jenjang']; ?></td>
                <td class="text-center">Rp. <?= number_format($djs['biaya'], 0, ',', '.'); ?></td>
            </tr>
            <?php } ?>
          </tbody>
                </table>
                
               </li>
            </ul>
           


          </div>

          <!-- Content Row --> 
  

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>Copyright &copy; Rumah Belajar Mekarsari <?= date('yy'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('sb-admin/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('sb-admin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('sb-admin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('sb-admin/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('sb-admin/'); ?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('sb-admin/'); ?>js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url('sb-admin/'); ?>js/demo/chart-pie-demo.js"></script>

</body>

</html>
