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

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
  <link href="<?= base_url('sb-admin/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head> 

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('bendahara/dashboard'); ?>">

        <div class="sidebar-brand-icon rotate-n-15">
          
        </div>
       <img src="<?= base_url('assets/logo_ruberi.png'); ?>"  width="47" height="53" >
        <div class="sidebar-brand-text mx-3">RUBERI</div>

      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

   
     <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('bendahara/dashboard'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

       <!-- Nav Item - Data jenis Pendaftaran -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('bendahara/data_jenis_pendaftaran'); ?>">
          <i class="fas fa-folder"></i>
          <span >Data Jenis Pendaftaran</span></a>
      </li>

      <!-- Nav Item - Data jenis SPP -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('bendahara/data_jenis_SPP'); ?>">
          <i class="fas fa-folder"></i>
          <span >Data Jenis SPP</span></a>
      </li>

       <!-- Nav Item - Data User -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('bendahara/data_user'); ?>">
         <i class="fas fa-folder"></i>
          <span >Data User</span></a>
      </li>

      <!-- Nav Item - data siswa -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('bendahara/data_siswa'); ?>">
         <i class="fas fa-folder"></i>
          <span >Data Siswa</span></a>
      </li>

      <!-- Nav Item - data transaksi pendaftaran siswa -->
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('bendahara/data_transaksi_pendaftaran'); ?>">
         <i class="fas fa-folder"></i>
           <span>Data Transaksi Pendaftaran</span>          
        </a>
      </li>

      <!-- Nav Item - Data Transaksi SPP -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('bendahara/data_transaksi_SPP'); ?>">
      <i class="far fa-folder-open"></i>
          <span>Data Transaksi SPP</span></a>
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

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
             <!-- Akun -->
           <div class="topbar-divider d-none d-sm-block"></div>

             <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              
                <img class="img-profile" width="100" src="<?= base_url('assets/foto_user/'); ?><?= $data_user['photo']; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="card-body">
                  <div> <h5 class="card-title text-success left" ><?= $data_user['level']; ?></h5>
                  <p class="card-text mt-1"><?= $data_user['username']; ?></p></div>
                 
                  <p class="card-text"><?= $data_user['email']; ?></p>

                </div>
                

              <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="<?= base_url('bendahara/edit_akun/'); ?><?= $data_user['kd_user']; ?>">
                  <i class="fas fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit Akun
                </a>
                <a class="dropdown-item" href="<?= base_url('bendahara/ganti_password');  ?>">
                  <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i> 
                  Ganti Password
                </a>
                <a class="dropdown-item" href="<?= base_url('auth/logout');  ?>">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
               
              </div>
            </li>
            <!-- End Akun -->
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
         <?= $this->session->flashdata('message'); ?>

            <!-- Content Row -->
        <!-- Page Heading -->
          <div class="row">
            <div class="col-md-8">
                <div class="card">
                  <div class="card-header" align="center">
                   Detail Transaksi SPP
                  </div>
                  <div class="card-body"> 
                   <div class="row">
                     <div class="col-5">
                       Kode Transaksi SPP
                     </div>
                     <div class="col-4">
                       : <?= $detail_spp['kd_transaksi_spp'] ?>
                     </div>
                   </div>
                    <hr>
                    <div class="row">
                     <div class="col-5">
                       Kode Jenis SPP
                     </div>
                     <div class="col-4">
                       : <?= $detail_spp['kd_jenis_spp'] ?>
                     </div>
                   </div>
                   <hr>
                   <div class="row">
                     <div class="col-5">
                       Kode User
                     </div>
                     <div class="col-4">
                       : <?= $detail_spp['kd_user'] ?>
                     </div>
                   </div>
                   <hr>
                    <div class="row">
                     <div class="col-5">
                       Kode Siswa
                     </div>
                     <div class="col-4">
                       : <?= $detail_spp['kd_siswa'] ?>
                     </div>
                   </div>
                   <hr>
                    <div class="row">
                     <div class="col-5">
                       Nama
                     </div>
                     <div class="col-4">
                       : <?= $detail_spp['nama_lengkap'] ?>
                     </div>
                   </div>
                   <hr>
                   <div class="row">
                     <div class="col-5">
                       Tanggal Bayar
                     </div>
                     <div class="col-4">
                       : <?php $tgl = date_create($detail_spp['tgl_bayar']); echo date_format($tgl, 'd-m-Y'); ?>
                     </div>
                   </div>
                   <hr>
                    <div class="row">
                     <div class="col-5">
                       Bulan
                     </div>
                     <div class="col-4">
                      : <?= $detail_spp['bulan'] ?>
                     </div>
                   </div>
                   <hr>
                    <div class="row">
                     <div class="col-5">
                       Metode Pembayaran
                     </div>
                     <div class="col-4">
                      : <?= $detail_spp['metode_pembayaran'] ?>
                     </div>
                   </div>
                   <hr>
                   <div class="row">
                     <div class="col-5">
                       Nama Bank
                     </div>
                     <div class="col-4">
                     : <?= $detail_spp['nama_bank'] ?>
                     </div>
                   </div>
                   <hr>
                   <div class="row">
                     <div class="col-5">
                       Pemilik Rekening
                     </div>
                     <div class="col-4">
                     : <?= $detail_spp['pemilik_rekening'] ?>
                     </div>
                   </div>
                   <hr>
                   <div class="row">
                     <div class="col-5">
                       No Rekening
                     </div>
                     <div class="col-4">
                     : <?= $detail_spp['no_rekening'] ?>
                     </div>
                   </div>
                   <hr>
                   <div class="row">
                     <div class="col-5">
                      File Bukti Transfer
                     </div>
                     <div class="col-4">
                     : <?= $detail_spp['file_transfer'] ?>
                     </div>
                   </div>
                   <hr>
                    <div class="row">
                     <div class="col-5">
                      Status
                     </div>
                     <div class="col-4">
                     : <?= $detail_spp['status'] ?>
                     </div>
                   </div>
                   <hr>
                    <a class="btn btn-primary" href="<?= base_url('bendahara/data_transaksi_spp'); ?>"> <i class="fas fa-caret-left"></i>  Kembali</a>
                  
                  </div>
                </div>
              </div>
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
  <script src="<?= base_url('sb-admin/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('sb-admin/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('sb-admin/'); ?>js/demo/datatables-demo.js"></script>

</body>

</html>
