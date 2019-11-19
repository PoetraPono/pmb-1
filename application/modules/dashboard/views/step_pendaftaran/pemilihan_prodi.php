<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <h5 class="card-title">
                            Pemilihan Program Studi
                        </h5>
                    </div>
                </div>
                <?php 
                    //var_dump($data_pendaftar->row()->pemilihan_prodi);
                ?>
                <form action="<?= site_url('dashboard/pendaftaran/pemilihan_prodi/update/'.$id_pendaftaran_jalur_seleksi);?>" method="post" class="form-horizontal needs-validation" >
                    <div class="card-body">
                        <div class="row">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="pemilihan_prodi" class="col-md-4 col-form-label">Program Studi Pilihan*</label>
                                    <div class="col-md-8">
                                        <select class="form-control form-group-margin" name="pemilihan_prodi" id="pemilihan_prodi" REQUIRED>
                                            <option value="">- Pilih Program Studi -</option>
                                            <?php foreach ($prodi->result() as $row) {?>
                                            <option <?php if($row->id == $data_pendaftar->row()->pemilihan_prodi){ echo 'selected="selected"'; } ?> value="<?php echo $row->id; ?>"><?php echo $row->nama_prodi;?> </option>
                                            <?php } ?>
                                        </select>
                                        <!-- <select class="form-control form-group-margin" name="pemilihan_prodi" id="pemilihan_prodi" REQUIRED>
                                            <option value="">- Pilih Program Studi -</option>
                                            <?php foreach($prodi->result() as $row):?>
                                                <option value="<?php echo $row->id;?>"><?php echo $row->nama_prodi;?></option>
                                            <?php endforeach;?>
                                        </select> -->
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-danger">Simpan</button>
                                <a href="<?= site_url('dashboard/pendaftaran/details/'.$id_pendaftaran_jalur_seleksi);?>" class="btn btn-default btn-sm">Kembali</a>						
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
        
    </div>
</div>