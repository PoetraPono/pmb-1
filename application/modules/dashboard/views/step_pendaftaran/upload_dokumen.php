<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <h5 class="card-title">
                            Upload Dokumen
                        </h5>
                    </div>
                </div>
                <form action="<?= site_url('dashboard/pendaftaran/upload_dokumen/upload_doc/'.$id_pendaftaran_jalur_seleksi);?>" method="post" class="form-horizontal needs-validation" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-12">
                                    <label for="customFile">Pas Foto Resmi *</label>
                                    <?php foreach ($dokumen_pendaftar->result() as $d) { ?>
                                    </div>
                                    <div class="col-8">
                                        <div class="custom-file">
                                            <input type="file" name="pas_foto" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-danger">Upload</button>
                                        <?php if ($d->pas_foto!=NULL) {
                                            ?>
                                            <a href="<?= base_url(); ?>uploads/documents/<?php echo $d->pas_foto ?>" class="btn btn-success">Lihat Dokumen</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                    <label for="customFile">Scan ijazah terakhir *</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="custom-file">
                                            <input type="file" name="ijazah" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-danger">Upload</button>
                                        <?php if ($d->ijazah!=NULL) {
                                            ?>
                                            <a href="<?= base_url(); ?>uploads/documents/<?php echo $d->ijazah ?>" class="btn btn-success">Lihat Dokumen</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="customFile">Scan kartu identitas *</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="custom-file">
                                            <input type="file" name="kartu_identitas" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-danger">Upload</button>
                                        <?php if ($d->kartu_identitas!=NULL) {
                                            ?>
                                            <a href="<?= base_url(); ?>uploads/documents/<?php echo $d->kartu_identitas ?>" class="btn btn-success">Lihat Dokumen</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="customFile">Scan kartu keluarga *</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="custom-file">
                                            <input type="file" name="kartu_keluarga" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-danger">Upload</button>
                                        <?php if ($d->kartu_keluarga!=NULL) {
                                            ?>
                                            <a href="<?= base_url(); ?>uploads/documents/<?php echo $d->kartu_keluarga ?>" class="btn btn-success">Lihat Dokumen</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="customFile">Scan transkrip nilai hasil ujian nasional *</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="custom-file">
                                            <input type="file" name="transkrip_nilai" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-danger">Upload</button>
                                        <?php if ($d->transkrip_nilai!=NULL) {
                                            ?>
                                            <a href="<?= base_url(); ?>uploads/documents/<?php echo $d->transkrip_nilai ?>" class="btn btn-success">Lihat Dokumen</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="customFile">Scan 1 sertifikat lomba (tidak wajib)</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="custom-file">
                                            <input type="file" name="sertifikat_pendukung" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-danger">Upload</button>
                                        <?php if ($d->sertifikat_pendukung!=NULL) {
                                            ?>
                                            <a href="<?= base_url(); ?>uploads/documents/<?php echo $d->sertifikat_pendukung ?>" class="btn btn-success">Lihat Dokumen</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </form>
                        <form action="<?= site_url('dashboard/pendaftaran/upload_dokumen/update/'.$id_pendaftaran_jalur_seleksi);?>" method="post">
                            <div class="col-md-12">
                                <?php if ($d->pas_foto&&$d->ijazah&&$d->kartu_identitas&&$d->kartu_keluarga&&$d->transkrip_nilai!=NULL) {
                                ?>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Simpan</button>
                            <?php } ?>
                                <a href="<?= site_url('dashboard/pendaftaran/details/'.$id_pendaftaran_jalur_seleksi);?>" class="btn btn-default btn-sm">Kembali</a>                        
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </form> 
            </div>
        </div>
        
    </div>
</div>
<script src="<?= base_url();?>assets/dist/js/custom-file-input.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

<script>
$('#tanggal_mulai_berlaku').datepicker({
    uiLibrary: 'bootstrap4',
    modal: true,
    footer: true,
    format: 'yyyy-mm-dd'
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#provinsi').change(function(e){
            var id=$(this).val();
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>', 
            csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
           
            var provinsi_id = $('#provinsi option:selected').val()
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
                    $('#kabupaten').html(html);
                }
              });
            }
            
        });
    });
</script>