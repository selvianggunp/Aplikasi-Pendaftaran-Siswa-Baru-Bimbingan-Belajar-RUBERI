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


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <div class="sidebar-brand-icon rotate-n-15">
          
        </div>
        <img src="<?= base_url('assets/logo_ruberi.png'); ?>"  width="47" height="53" >
        <div class="sidebar-brand-text mx-3">RUBERI</div>

      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Profile /  dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('userhome'); ?>">
         <i class="fas fa-home"></i>
          <span>Beranda</span></a>
      </li>
      <!-- Nav Item - Profile /  dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Pendaftaran/pj'); ?>">
         <i class="fas fa-users"></i>
          <span>Pendaftaran Siswa Baru</span></a>
      </li>
      <!-- Nav Item -  Pembayaran SPP / chart-->

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

             <!-- Nav Item - User Information -->
            <li class="nav-item dropdown " >
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Bantuan</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('userhome/cpb'); ?>">
                  <i class="fas fa-align-justify fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cara Pendaftaran Bimbel
                </a>
                <a class="dropdown-item" href="<?= base_url('userhome/cpspp'); ?>">
                 <i class="fas fa-align-justify fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cara Pembayaran SPP
                </a>
                 <a class="dropdown-item" href="<?= base_url('userhome/tentang_kami'); ?>">
                  <i class="fas fa-school fa-sm fa-fw mr-2 text-gray-400"></i>
                  Tentang kami
                </a>
              </div>
            </li>

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
                <a class="dropdown-item" href="<?= base_url('userhome/edit_akun/'); ?><?= $data_user['kd_user']; ?>">
                  <i class="fas fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit Akun
                </a>
                <a class="dropdown-item" href="<?= base_url('userhome/ganti_password');  ?>">
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
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->    
         
         
          <div class="container">
            <?= $this->session->flashdata('message'); ?> 
            <?= $this->session->flashdata('msg'); ?> 
            <div class="row">
              <div class="col-md">
                <div class="card">
                  <div class="card-header" align="center">
                    Formulir Pendaftaran Siswa Baru 
                  </div>
                  <div class="card-body">
                   <form action="" method="POST" enctype="multipart/form-data">
                    <!----------------------------- FORMULIR ------------------------------------->
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="kd_siswa" id="kd_siswa" value="<?= $newkodes; ?>" readonly hidden>
                    </div>
                    
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="kd_user" id="kd_user" value="<?= $user['kd_user']; ?>" readonly hidden>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text" class="form-control form-control-user" name="nama" id="nama" required="">
                      </div>
                    </div>

                     <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Kota Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required="" > 
                      </div>
                       <div class="form-group col-md-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control form-control-user" name="tanggal" id="tanggal" required="" >
                      </div>
                       <div class="form-group col-md-3">
                        <label for="jk">Jenis Kelamin</label><br>
                        <select name="jk" class="form-control form-control-user" id="jk">
                          <option>Perempuan</option>
                          <option>Laki-Laki</option>
                        </select> 
                      </div>
                      <div class="form-group col-md-3">
                        <label for="agama">Agama</label><br>
                          <select name="agama" class="form-control form-control-user" >
                            <option>Islam</option>
                            <option>Protestan</option>
                            <option>Katolik</option>
                            <option>Hindu</option>
                            <option>Buddha</option>
                            <option>Konghucu</option>
                          </select>
                      </div>
                    </div> 

                    <div class="form-row">
                      <div class="form-group col-md-1">
                        <label for="jenjang">Jenjang</label>
                        <input type="text" class="form-control form-control-user" name="jenjang" id="jenjang" value="<?= $jenis; ?>" readonly>
                      </div>
                      <div class="form-group col-md-1">
                         <label for="kelas">Kelas</label>
                          <select name="kelas" class="form-control form-control-user" >
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                          </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="sekolah">Sekolah</label>
                        <input type="text" class="form-control form-control-user" name="sekolah" id="sekolah" required="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="alamat">Alamat</label>
                         <input type="text" class="form-control form-control-user" name="alamat" id="alamat" required="">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" class="form-control form-control-user" name="nama_ibu" id="nama_ayah" required="">
                      </div>

                      <script type="text/javascript">
                        function validasi_input(form){
                          var mincar = 12;
                          if (form.telp_ibu.value.length < mincar){
                            alert("input no telepon harus 12 nomor!");
                            form.telp_ibu.focus();
                            return (false);
                          }
                           return (true);
                        }
                        </script>

                      <div class="form-group col-md-4">
                        <label for="telp_ibu">telepon/Hp Ibu</label>
                        <input type="text" class="form-control form-control-user " name="telp_ibu" id="telp" onkeypress="return event.charCode >= 48 && event.charCode <=57" required="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                        <input type="text" class="form-control form-control-user" name="pekerjaan_ibu" id="pekerjaan_ibu" required="">
                      </div>
                    </div>

                      <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" class="form-control form-control-user" name="nama_ayah" id="nama_ayah" required="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="telp_ayah">telepon/Hp Ayah</label>
                        <input type="text" class="form-control form-control-user " name="telp_ayah" id="telp" onkeypress="return event.charCode >= 48 && event.charCode <=57" required="" >
                      </div>
                      <div class="form-group col-md-4">
                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                        <input type="text" class="form-control form-control-user" name="pekerjaan_ayah" id="pekerjaan_ayah" required="">
                      </div>
                    </div>
                    
                     <div class="form-row ">
                      <div class="form-group col-md-12">
                        <label>Upload Pas Photo</label>          
                        <input type="file" name="photo" class="form-control form-control-user" required="">
                       
                      <p class="text-info">
                       <i class="fas fa-info-circle"></i> pas foto ukuran 4x3 dengan latar belakang merah<br>
                       <i class="fas fa-info-circle"></i> ukuran foto minimal 2 MB<br> 
                       <i class="fas fa-info-circle"></i> format foto PNG/JPG/JPEG
                      </p>
                      </div>
                    </div>

                      <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">DAFTAR</button>
               
                     </form>
                  </div>
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
 <script>
    // $('.custom-file-input').on('change', function(){
    //   let fileName = $(this).val().split('\\').pop();
    //   $(this).next('.custom-file-label').addClass("selected").html(fileName);
    // });
  </script>

</body>

</html>
