<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Seleksi Penerimaan Mahasiswa Baru :: STIKES IBNU SINA AJIBARANG</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?= base_url();?>" class="navbar-brand">
        <!-- <img src="<?= base_url();?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8"> -->
        <span class="brand-text font-weight-bold">PMB STIKES IBNU SINA</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="nav-link">WEB STIKES IBNU SINA</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">FASILITAS AKADEMIK</a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
		  	<div class="callout callout-info">
				<h5>Belum punya akun ?</h5>
				<p>
					Akun anda akan digunakan untuk memulai pendaftaran dan memantau hasil akhir seleksi masuk::
					<b class="text-danger"><i>Pastikan Email Aktif. </i></b>
					<a href="<?= site_url('akun/registrasi');?>" class="btn bg-gradient-success btn-sm text-white" style="text-decoration:none;">Buat Akun</a>
				</p>
			</div>
			<div class="callout callout-info">
				<h5>Belum menerima email aktivasi ?</h5>
				<p>
					<button type="button" class="btn bg-gradient-info btn-sm">Kirim Ulang Email</button>
				</p>
				<h5>Lupa Password ?</h5>
				<p>
					<button type="button" class="btn bg-gradient-danger btn-sm">Reset Password</button>
				</p>
			</div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
		  	<div class="callout callout-warning">
				<div class="login-card-body">
          <p class="login-box-msg"><strong>LOGIN</strong></p>
          <?php if($this->session->flashdata('error') == true):?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-ban"></i> Perhatian!</h5>
              Email atau password salah. Silahkan ulangi kembali.
            </div>
            <?php endif;?>

          <form action="<?= site_url('akun/post_login');?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<div class="input-group mb-3">
						<input type="email" class="form-control" placeholder="Email" name="email">
						<div class="input-group-append">
							<div class="input-group-text">
							<span class="fas fa-envelope"></span>
							</div>
						</div>
						</div>
						<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Password" name="password">
						<div class="input-group-append">
							<div class="input-group-text">
							<span class="fas fa-lock"></span>
							</div>
						</div>
						</div>
						<div class="row">
						<div class="col-8">
						</div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
						</div>
						<!-- /.col -->
						</div>
					</form>
				</div>
			</div>
			
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <!-- Default to the left -->
    Copyright &copy;2019 <a href="#">STIKES IBNU SINA AJIBARANG</a>. All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>
