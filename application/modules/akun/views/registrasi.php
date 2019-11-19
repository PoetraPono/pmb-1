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
        <div class="row justify-content-md-center">
            <div class="col-md-6">
              <?php if($this->session->flashdata('error') == true):?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Perhatian!</h5>
                Email sudah pernah digunakan, silahkan isi ulang form kembali.
              </div>
              <?php endif;?>
              <?php if($this->session->flashdata('success') == true):?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Registrasi Akun Berhasil!</h5>
                Silahkan melakukan login untuk memulai PMB. 
                <a href="<?= site_url('akun');?>" class="btn btn-primary btn-sm text-white" style="text-decoration:none;">LOGIN</a>		
               
              </div>
              <?php endif;?>
              <!-- form -->
              <form action="<?= site_url('akun/post_registrasi');?>" class="needs-validation" method="post" 
              oninput='password2.setCustomValidity(password2.value != password.value ? "Passwords do not match." : "")' accept-charset="utf-8" novalidate>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Data Akun (<i>Account</i>)</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="email" class="col control-label">Email *</label>
                      <div class="col">
                        <input type="email" class="form-control" id="email" name="email" value="" REQUIRED>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                          Format salah!
                        </div>
                        <small class="text-primary"><cite class="limiter-label">Email yang didaftarkan adalah email aktif dan untuk penggunaan personal (bukan email jabatan atau institusi)</cite></small>
                       
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col control-label">PASSWORD *</label>
                      <div class="col">
                        <input type="password" class="form-control" id="password" name="password" value="" pattern=".{6,}" title="6 characters minimum" REQUIRED>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                          Password tidak sesuai aturan!
                        </div> 
                        <small class="text-primary"><cite class="limiter-label">PASSWORD adalah kunci yang dipergunakan untuk login pendaftaran.
                        PASSWORD bebas diisi sendiri dan wajib terdiri dari (minimal) 6 digit angka dan/atau huruf dan/atau kombinasi keduanya.</cite></small>
                        
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password2" class="col control-label">Ulangi PASSWORD *</label>
                      <div class="col">
                        <input type="password" class="form-control" id="password2" name="password2" value="" REQUIRED>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                          Password tidak sama!
                        </div>         
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <div class="card card-dark">
                  <div class="card-header">
                    <h3 class="card-title">Data Pribadi (<i>Personal</i>)</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="namalengkap" class="col control-label">Nama Lengkap *</label>
                      <div class="col">
                        <input type="text" class="form-control" id="namalengkap" name="namalengkap" value="" REQUIRED>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                          Form belum terisi!
                        </div>  
                        <small><cite class="limiter-label text-primary">Nama lengkap tanpa gelar sesuai dengan ijazah sebelumnya</cite></small>
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <label for="provtempatlahir" class="col control-label">Provinsi Tempat Lahir *</label>
                      <div class="col">
                        <select class="form-control form-group-margin" name="provtempatlahir" id="provtempatlahir" REQUIRED>
                          <option value="">- Pilih Provinsi -</option>
                          <?php foreach($provinsi->result() as $row):?>
                              <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                          <?php endforeach;?>
                          <option value="0">LUAR NEGERI</option>
                        </select>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                          Form belum terisi!
                        </div> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="kabtempatlahir" class="col control-label">Kabupaten Tempat Lahir *</label>
                      <div class="col">
                          <select class="form-control form-group-margin" name="kabtempatlahir" id="kabtempatlahir" REQUIRED>
                            <option></option>
                          </select>	
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                          <div class="invalid-feedback">
                            Form belum terisi!
                          </div>  
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tempatlahir" class="col control-label">Tempat Lahir *</label>
                      <div class="col">
                        <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" value="" REQUIRED>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                          Form belum terisi!
                        </div>  
                        <small><cite class="limiter-label text-primary">Sesuai ijazah terakhir</cite></small>			
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tgltempatlahir" class="col control-label">Tanggal Lahir *</label>
                      <div class="row" style="padding-left:8px;">
                          <div class="col-2">
                            <select class="form-control" id="lahir_tgl_day" name="lahir_tgl_day" REQUIRED>
                              <option></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                              <option value="31">31</option>
                          </select>
                          </div>
                          <div class="col-4">
                            <select class="form-control" id="lahir_tgl_month" name="lahir_tgl_month" REQUIRED>
                              <option></option>
                              <option value="1">Januari</option>
                              <option value="2">Februari</option>
                              <option value="3">Maret</option>
                              <option value="4">April</option>
                              <option value="5">Mei</option>
                              <option value="6">Juni</option>
                              <option value="7">Juli</option>
                              <option value="8">Agustus</option>
                              <option value="9">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">Desember</option>
                            </select>
                          </div>
                          <div class="col-3">
                            <select class="form-control" id="lahir_tgl_year" name="lahir_tgl_year" REQUIRED>
                              <option></option>
                              <option value="2009">2009</option>
                              <option value="2008">2008</option>
                              <option value="2007">2007</option>
                              <option value="2006">2006</option>
                              <option value="2005">2005</option>
                              <option value="2004">2004</option>
                              <option value="2003">2003</option>
                              <option value="2002">2002</option>
                              <option value="2001">2001</option>
                              <option value="2000">2000</option>
                              <option value="1999">1999</option>
                              <option value="1998">1998</option>
                              <option value="1997">1997</option>
                              <option value="1996">1996</option>
                              <option value="1995">1995</option>
                              <option value="1994">1994</option>
                              <option value="1993">1993</option>
                              <option value="1992">1992</option>
                              <option value="1991">1991</option>
                              <option value="1990">1990</option>
                              <option value="1989">1989</option>
                              <option value="1988">1988</option>
                              <option value="1987">1987</option>
                              <option value="1986">1986</option>
                              <option value="1985">1985</option>
                              <option value="1984">1984</option>
                              <option value="1983">1983</option>
                              <option value="1982">1982</option>
                              <option value="1981">1981</option>
                              <option value="1980">1980</option>
                              <option value="1979">1979</option>
                              <option value="1978">1978</option>
                              <option value="1977">1977</option>
                              <option value="1976">1976</option>
                              <option value="1975">1975</option>
                              <option value="1974">1974</option>
                              <option value="1973">1973</option>
                              <option value="1972">1972</option>
                              <option value="1971">1971</option>
                              <option value="1970">1970</option>
                              <option value="1969">1969</option>
                              <option value="1968">1968</option>
                              <option value="1967">1967</option>
                              <option value="1966">1966</option>
                              <option value="1965">1965</option>
                              <option value="1964">1964</option>
                              <option value="1963">1963</option>
                              <option value="1962">1962</option>
                              <option value="1961">1961</option>
                              <option value="1960">1960</option>
                              <option value="1959">1959</option>
                              <option value="1958">1958</option>
                              <option value="1957">1957</option>
                              <option value="1956">1956</option>
                              <option value="1955">1955</option>
                              <option value="1954">1954</option>
                              <option value="1953">1953</option>
                              <option value="1952">1952</option>
                              <option value="1951">1951</option>
                              <option value="1950">1950</option>
                              <option value="1949">1949</option>
                            </select>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="jnskelamin" class="col control-label">Jenis Kelamin *</label>
                      <div class="col">	
                        <select class="form-control form-group-margin" name="jnskelamin" id="jnskelamin" REQUIRED>
                          <option></option>
                          <option value="L">Laki-laki</option>
                          <option value="P">Perempuan</option>
                        </select>	
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                          Form belum terisi!
                        </div>  
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="namaibu" class="col control-label">Nama Ibu Kandung *</label>
                      <div class="col">
                        <input type="text" class="form-control" id="namaibu" name="namaibu" value="" REQUIRED>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                          Form belum terisi!
                        </div>  
                        <small><cite class="limiter-label text-primary">Nama ibu sesuai identitas (KTP)</cite></small>
                      </div>
                    </div>
                  </div>   
                </div>
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Pernyataan (<i>Disclaimer</i>)</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <div class="col">
                        <div class="form-check"> 
                          <label>
                            <input class="form-check-input" type="checkbox" name="pernyataan" REQUIRED> 
                            <small class="form-check-label" for="invalidCheck">Ya, saya setuju bahwa seluruh data yang saya isikan dan/atau unggah adalah benar, sah, legal dan/atau sesuai dengan keadaan dan/atau kenyataan.</small>
                            <div class="invalid-feedback">  
                              Anda belum menyetujui pernyataan
                            </div> 
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                      <div class="col">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <a href="#" class="btn btn-danger">Cancel</a>						
                      </div>
                    </div>
                  </div>   
                </div>
              </form>
              <!-- /.form -->
            </div>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#provtempatlahir').change(function(e){
            var id=$(this).val();
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>', 
            csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
           
            var provinsi_id = $('#provtempatlahir option:selected').val()
            if(provinsi_id != 0){
              $.ajax({
                url : "<?php echo base_url();?>akun/get_kabupaten",
                method : "POST",
                data : {[csrfName]: csrfHash,id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    html = '<option value="">- Pilih Kabupaten / Kota -</option>'
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                    }
                    $('#kabtempatlahir').html(html);
                }
              });
            }else{
              html = '<option value="0">LUAR NEGERI</option>'
              $('#kabtempatlahir').html(html);
            }
            
        });
    });
</script>
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
</body>
</html>
