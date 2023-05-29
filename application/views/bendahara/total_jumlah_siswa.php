 
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
      <li class="nav-item active">
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
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('bendahara/data_transaksi_pendaftaran'); ?>">
         <i class="fas fa-folder"></i>
           <span>Data Transaksi Pendaftaran</span>          
        </a>
      </li>

      <!-- Nav Item - Data Transaksi SPP -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('bendahara/data_transaksi_SPP'); ?>">
         <i class="fas fa-folder"></i>
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
          <div class="row-md">
            <!-- start tabel -->

            <div class="row">
               <!-- TOTAL JUMLAH SISWA -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-black shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                        <a href="<?= base_url('bendahara/total_jumlah_siswa'); ?>">Total jumlah siswa</a>
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_siswa; ?></div>
                    </div>
                    <div class="col-auto">
                     <i class="fas fa-clipboard-list fa-3x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        <a href="<?= base_url('bendahara/jumlah_siswa_sd'); ?>">Jumlah Siswa SD</a>
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $SD; ?></div>
                    </div>
                    <div class="col-auto">
                       <i class="fas fa-clipboard-list fa-3x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <a href="<?= base_url('bendahara/jumlah_siswa_smp'); ?>">
                        Jumlah Siswa SMP
                        </a>
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $SMP; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-3x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                        <a href="<?= base_url('bendahara/jumlah_siswa_sma'); ?>">
                          Jumlah Siswa SMA
                        </a>
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $SMA; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-3x text-white-50"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          <div class="card shadow mb-4">

          <nav class="navbar navbar-light bg-light ">
           <h6 class="m-0 font-weight-bold">Data Seluruh Siswa</h6>
          </nav>
          
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
            <tr>
              <th  class="text-center">No</th>
              <th>Kode Siswa</th>
              <th>Kode User</th>
              <th>Nama</th>
              <th>Foto</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Agama</th>
              <th>Jenjang</th>
              <th>Kelas</th>
              <th>Sekolah</th>
              <th>Alamat</th>
              <th>Nama Ibu </th>
              <th>Telp Ibu</th>
              <th>Pekerjaan Ibu</th>
              <th>Nama Ayah </th>
              <th>Telp Ayah</th>
              <th>Pekerjaan Ayah</th>
              <th>tgl daftar</th>
             
            </tr>
          </thead>
          <tbody>
          <?php $no=0; foreach ($data_siswa as $ds) { ?>
            <tr>
                
                <td class="text-center"><?= ++$no; ?></td>
                <td><?= $ds['kd_siswa']; ?></td>
                <td><?= $ds['kd_user']; ?></td>
                <td><?= $ds['nama_lengkap']; ?></td>
                <td><img width="50" src="<?= base_url('assets/photo/') . $ds['photo'];  ?> "></td>
                <td><?= $ds['jenis_kelamin']; ?></td>
                <td><?= $ds['tempat_lahir']; ?>, <?= $ds['tgl_lahir']; ?></td>
                <td><?= $ds['agama']; ?></td>
                <td><?= $ds['jenjang']; ?></td>
                <td><?= $ds['kelas']; ?></td>
                <td><?= $ds['sekolah']; ?></td>
                <td><?= $ds['alamat']; ?></td>
                <td><?= $ds['nama_ibu']; ?></td>
                <td><?= $ds['telp_ibu']; ?></td>
                <td><?= $ds['pekerjaan_ibu']; ?></td>
                <td><?= $ds['nama_ayah']; ?></td>
                <td><?= $ds['telp_ayah']; ?></td>
                <td><?= $ds['pekerjaan_ayah']; ?></td>
                <td><?= $ds['tgl_daftar']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- end tabel -->

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
