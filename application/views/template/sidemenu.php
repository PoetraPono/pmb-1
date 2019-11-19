 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url();?>" class="brand-link">
      <!-- <img src="<?= base_url();?>assets/images/logo.png" alt="Logo Stikes Ibnu Sina Ajibarang" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">PMB Stikes Ibnu Sina</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://via.placeholder.com/150" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-capitalize"><?= $this->session->userdata('nama_lengkap');?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header" style="padding-left:15px;">SELEKSI MASUK</li>
          <li class="nav-item">
            <a href="<?= site_url('dashboard/pendaftaran');?>" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pendaftaran
                <span class="right badge badge-primary">Dibuka</span>
              </p>
            </a>
          </li>
          <?php 
            if($this->session->userdata('role') != 'mahasiswa'):
          ?>
          <li class="nav-header" style="padding-left:15px;">PENGELOLAAN</li>
          <li class="nav-item">
            <a href="<?= site_url('dashboard/prodi');?>" class="nav-link">
              <i class="nav-icon fas fa-angle-double-right"></i>
              <p>
                Program Studi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('dashboard/jalur_seleksi');?>" class="nav-link">
              <i class="nav-icon fas fa-angle-double-right"></i>
              <p>
                Jalur Seleksi Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('dashboard/pendaftar');?>" class="nav-link">
              <i class="nav-icon fas fa-angle-double-right"></i>
              <p>
                Data Pendaftar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-angle-double-right"></i>
              <p>
                Daftar Ulang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-angle-double-right"></i>
              <p>
                Pengumuman
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-angle-double-right"></i>
              <p>
                Download
              </p>
            </a>
          </li>
          <li class="nav-header" style="padding-left:15px;">VERIFIKASI</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Dokumen PMB
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Pembayaran
              </p>
            </a>
          </li>
          <li class="nav-header" style="padding-left:15px;">PENGATURAN</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Pengguna
              </p>
            </a>
          </li>
          <li class="nav-header" style="padding-left:15px;">EXPORT</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-export"></i>
              <p>
                Pindah Data ke SIMAK
              </p>
            </a>
          </li>
          <li class="nav-header">INFORMASI</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-volume-up"></i>
              <p>
                Pengumuman
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-download"></i>
              <p>
                Download
              </p>
            </a>
          </li>
          <li class="nav-header">AKUN</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Ganti Passwords
              </p>
            </a>
          </li>
          <?php
              endif;
          ?>
          <li class="nav-item">
            <a href="<?= site_url('dashboard/logout');?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<!-- End Sidebar -->