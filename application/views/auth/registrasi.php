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
  <link href="<?=base_url("sb-admin/"); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?=base_url("sb-admin/"); ?>https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url("sb-admin/"); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head> 


<body class="bg-gradient-warning">
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <img src="<?= base_url('assets/logo_ruberi.png'); ?>" height= "106" widht="116">
                 <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
              </div>
              <form class="user" method="POST" action="">
               <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="kd_user" placeholder="kode user" value="<?= $newkode; ?>" hidden>   
                </div>
               <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Ketik namamu..." value="<?= set_value('username'); ?>">
                  <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Ketik alamat E-mailmu..." value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Buat kata sandi...">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ketik ulang kata sandi...">
                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>

                <button type="submit" class="btn btn-warning btn-user btn-block">
                  Daftar Akun
                </button>
              </form>
              <hr>
              <!-- <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div> -->
              <div class="text-center">
                <p>Sudah punya akun ruberi? klik <a class="" href="<?= base_url('auth')?>"> Login!</a></p> <br>
                <p><a class="" href="<?= base_url('Home')?>"> <- Kembali ke beranda</a></p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url("sb-admin/"); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url("sb-admin/"); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url("sb-admin/"); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url("sb-admin/"); ?>js/sb-admin-2.min.js"></script>

</body>

</html>
