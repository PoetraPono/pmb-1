<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <h5 class="card-title">
                            Detail Jalur Seleksi
                        </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="<?= site_url('dashboard/pendaftaran/post_apply/'.$id_jalur_seleksi);?>" method="post" class="form-horizontal needs-validation" >
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="col-xs-12">
                                <label class="col-xs-3 control-label">Nama Jalur Seleksi</label>
                                <div class="col-xs-9">
                                    <em>
                                        <?= $detail_jalur_seleksi->nama_jalur;?>
                                    </em>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-xs-3 control-label">Deskripsi</label>
                                    <div class="col-xs-9">
                                        <?= $detail_jalur_seleksi->deskripsi;?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-3 control-label">Periode Pendaftaran</label>
                                    <div class="col-xs-9"><?= date('d F Y', strtotime(''.$detail_jalur_seleksi->start_pendaftaran.''));?> s.d. <?= date('d F Y', strtotime(''.$detail_jalur_seleksi->end_pendaftaran.''));?></div>
                                </div>
                                <hr>
                            </div>
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-sm btn-danger">Daftar Sekarang!</button>
                                <a href="<?= site_url('dashboard/pendaftaran');?>" class="btn btn-default btn-sm">Kembali</a>						
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>