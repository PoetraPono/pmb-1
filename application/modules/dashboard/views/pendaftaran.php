<div class="container">
<div class="row">
    <div class="col-md-8">
        <?php if ($this->session->flashdata('error')): ?>
            <script>
                $(function() {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    });
                    Toast.fire({
                    type: 'error',
                    title: 'Terjadi kesalahan.'
                    })
                });
            </script>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <script type="text/javascript">
                $(function() {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    });
                    Toast.fire({
                        type: 'success',
                        title: 'Berhasil.'
                    })
                });
            </script>
        <?php endif; ?>
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Informasi Pendaftaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-justify">
                <ol style="font-size:12px;">
                    <li>Saudara <strong>wajib</strong> memperhatikan dan mengikuti setiap tahapan pada jalur seleksi yang dipilih.</li>
                    <li>Untuk melengkapi data pendaftaran, silakan akses melalui <strong>aksi &gt; lengkapi</strong>.</li>
					<li>Proses pengisian data pendaftaran dan unggah dokumen dapat dilakukan <strong>secara bertahap</strong> selama belum dilakukan penguncian data pendaftaran. 
						Oleh karena itu, Saudara <strong>tidak wajib</strong> mendaftar pada jalur seleksi yang sama apabila ingin melanjutkan proses pendaftaran.</li>
					<li>Pembayaran biaya pendaftaran hanya dapat dilakukan <strong>setelah</strong> Saudara melakukan penguncian data.</li>
					<li>Pastikan Saudara membayar biaya pendaftaran <strong>sebelum</strong> batas pembayaran Saudara berakhir.</li>
					<li>Untuk melihat hasil seleksi, silakan akses melalui <strong>aksi &gt; detail &gt; pengumuman</strong>.</li>
				</ol>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Riwayat Pendaftaran</h3>
            </div>
            <?php //var_dump($riwayat_pendaftaran);?>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            <table class="table table-striped">
                <thead>
                    <tr style="font-size:14px;">
                        <th>Nomor</th>
                        <th>Jalur Seleksi</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($riwayat_pendaftaran)):
                            foreach($riwayat_pendaftaran as $row):
                    ?>
                    <tr>
                        <td><?= $row['id'];?></td>
                        <td><?= $row['nama_jalur'];?></td>
                        <td>
                            <strong>pendaftaran</strong><br>
                            <small>
                                <em><?= date('d F Y', strtotime(''.$row['tanggal_pendaftaran'].''));?><em><br>
                                <em><?= date('H:i:s', strtotime(''.$row['tanggal_pendaftaran'].''));?> WIB</em>
                            </small>
                        </td>
                        <td>
                            <?php   
                                if($row['status_pembayaran'] == 0):
                            ?>
                            <span class="badge bg-danger"><small>Belum dikunci</small></span>
                            <?php
                                endif;
                                if($row['status_pembayaran'] == 1):
                            ?>
                            <span class="badge bg-success"><small>Sudah dibayar</small></span>
                            <?php 
                                endif;
                            ?>
                        </td>
                        <td><a href="<?= site_url('dashboard/pendaftaran/details/'.$row['id']);?>" class="btn bg-gradient-info btn-sm">Lengkapi</a></td>
                    </tr>
                    <?php
                            endforeach;
                        endif;
                        if(empty($riwayat_pendaftaran)):
                    ?>
                    <tr>
                        <td colspan="5"><i>Anda belum melakukan pendaftaran.</i></td>
                    </tr>
                    <?php
                        endif;
                    ?>
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-md-4">
        <?php if ($this->session->flashdata('error')): ?>
            <script>
                $(function() {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    });
                    Toast.fire({
                    type: 'error',
                    title: 'Terjadi kesalahan.'
                    })
                });
            </script>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <script type="text/javascript">
                $(function() {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    });
                    Toast.fire({
                        type: 'success',
                        title: 'Berhasil.'
                    })
                });
            </script>
        <?php endif; ?>
        
       
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Daftar sekarang...
                </h3>
            </div>
            <?php //var_dump($jalur_seleksi_aktif);?>
            <div class="card-body">
                <ul class="fa-ul text-danger">
                    <?php
                        if(!empty($jalur_seleksi_aktif)):
                            foreach($jalur_seleksi_aktif as $row):
                    ?>
                    <li>
                        <i class="fa-li fas fa-graduation-cap"></i>
                        <a href="<?= site_url('dashboard/pendaftaran/apply/'.$row['id']);?>" >
                            <?= $row['nama_jalur'];?><br>
                            <small><i><?= $row['deskripsi'];?></i></small>
                        </a>
                        <hr>
                    </li>
                    <?php
                            endforeach;
                        endif;
                        if(empty($jalur_seleksi_aktif)):
                    ?>
                    <li>
                        <i>Tidak ada jalur seleksi yang aktif.</i>
                    </li>
                    <?php
                        endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Bootstrap modal -->
    <div class="modal fade" id="modal_form">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Program Studi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="form" role="form">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="card-body">
                        <input type="hidden" value="" name="modal_id"/> 
                        <div class="form-group">
                            <label for="modal_kode_jalur_seleksi">Kode</label>
                            <input type="text" class="form-control" id="modal_kode_jalur_seleksi" placeholder="Kode" name="modal_kode_jalur_seleksi" REQUIRED>
                        </div>
                        <div class="form-group">
                            <label for="modal_nama_jalur">Nama Jalur</label>
                            <input type="text" class="form-control" id="modal_nama_jalur" placeholder="Nama Jalur Seleksi" name="modal_nama_jalur" REQUIRED>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- End Bootstrap modal -->
</div>
</div>
<script>
    $('#tgl_buka').datetimepicker({
        uiLibrary: 'bootstrap4',
        modal: true,
        footer: true,
        format: 'yyyy/mm/dd H:M'
    });
    $('#tgl_tutup').datetimepicker({
        uiLibrary: 'bootstrap4',
        modal: true,
        footer: true,
        format: 'yyyy/mm/dd H:M'
    });
</script>