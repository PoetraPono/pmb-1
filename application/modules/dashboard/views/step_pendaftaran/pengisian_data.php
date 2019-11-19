
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <h5 class="card-title">
                            Pengisian Data Pribadi
                        </h5>
                    </div>
                </div>
                <form action="<?= site_url('dashboard/pendaftaran/pengisian_data/update/'.$id_pendaftaran_jalur_seleksi);?>" method="post" class="form-horizontal needs-validation" >
                    <div class="card-body">
                        <div class="row">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="email_aktif" class="col-md-4 col-form-label">Email Aktif *</label>
                                    <div class="col-md-8">
                                        <input type="email" class="form-control" id="email_aktif" name="email_aktif" value="<?= $data_pendaftar->row()->email_aktif;?>" REQUIRED>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nomor_induk_kependudukan" class="col-md-4 col-form-label">Nomor Induk Kependudukan *</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" id="nomor_induk_kependudukan" name="nomor_induk_kependudukan" value="<?= $data_pendaftar->row()->nik;?>" REQUIRED>
                                        <small>Diisi NIK (Nomor Induk Kependudukan) yang tercantum pada KTP atau Kartu Keluarga (bagi yang belum memiliki KTP)</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_identitas" class="col-md-4 col-form-label">Jenis Identitas *</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_identitas" value="ktp" <?php if($data_pendaftar->row()->jenis_identitas == "ktp"){ echo "checked";};?> REQUIRED>
                                                <label class="form-check-label">KTP</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_identitas" value="kk" <?php if($data_pendaftar->row()->jenis_identitas == "kk"){ echo "checked";};?> REQUIRED>
                                                <label class="form-check-label">KARTU KELUARGA</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nomor_identitas_berfoto" class="col-md-4 col-form-label">Nomor Identitas Berfoto *</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="nomor_identitas_berfoto" name="nomor_identitas_berfoto" value="<?= $data_pendaftar->row()->nomor_identitas_berfoto;?>" REQUIRED>
                                        <small>Diisi nomor identitas berfoto. Contoh: NIK (Nomor Induk Kependudukan) jika memilih KTP/KK, nomor SIM jika memilih SIM, nomor passport jika memilih passport</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_mulai_berlaku" class="col-md-4 col-form-label">Tanggal Mulai Berlaku *</label>
                                    <div class="col-md-8">
                                        <input id="tanggal_mulai_berlaku" class="form-control" name="tanggal_mulai_berlaku" readonly value="<?= $data_pendaftar->row()->tanggal_mulai_berlaku;?>" REQUIRED>
                                        <small>Diisi tanggal mulai berlakunya kartu identitas berfoto anda</small>
                                    </div>
                                </div>
                                <hr>
                                <p class="text-center text-bold">INFORMASI ALAMAT TINGGAL</p>
                                <hr>
                                <div class="form-group row">
                                    <label for="alamat_tinggal" class="col-md-4 col-form-label">Alamat tempat tinggal asal *</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="alamat_tinggal" name="alamat_tinggal" value="<?= $data_pendaftar->row()->alamat_tinggal;?>" REQUIRED>
                                        <small>Diisi alamat tinggal asal, <b>BUKAN</b> kontrakan / kos</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="provinsi" class="col-md-4 col-form-label">Provinsi tempat tinggal asal *</label>
                                    <div class="col-md-8">
                                        <select class="form-control form-group-margin" name="provinsi" id="provinsi" REQUIRED>
                                            <option value="">- Pilih Provinsi -</option>
                                            <?php foreach($provinsi->result() as $row):?>
                                                <option <?php if($row->id == $data_pendaftar->row()->provinsi){ echo 'selected="selected"'; } ?> value="<?php echo $row->id; ?>"><?php echo $row->name;?> </option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kabupaten" class="col-md-4 col-form-label">Kabupaten tempat tinggal asal *</label>
                                    <div class="col-md-8">
                                        <select class="form-control form-group-margin" name="kabupaten" id="kabupaten" REQUIRED>
                                            <?php foreach($kabupaten->result() as $row):?>
                                                <option <?php if($row->id == $data_pendaftar->row()->kabupaten){ echo 'selected="selected"'; } ?> value="<?php echo $row->id; ?>"><?php echo $row->name;?> </option>
                                            <?php endforeach;?>
                                        </select>	
                                        <!-- <small>Untuk mengganti kabupaten silahkan pilih provinsi terlebih dahulu</small> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kodepos" class="col-md-4 col-form-label">Kode Pos *</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kodepos" name="kodepos" value="<?= $data_pendaftar->row()->kodepos;?>" REQUIRED>
                                    </div>
                                </div>
                                <hr>
                                <p class="text-center text-bold">NOMOR KONTAK YANG DAPAT DIHUBUNGI</p>
                                <hr>
                                <div class="form-group row">
                                    <label for="nomor_hp" class="col-md-4 col-form-label">Nomor Telpon *</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" value="<?= $data_pendaftar->row()->nomor_hp;?>" REQUIRED>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nomor_whatsapp" class="col-md-4 col-form-label">Nomor Whatsapp *</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" id="nomor_whatsapp" name="nomor_whatsapp" value="<?= $data_pendaftar->row()->nomor_whatsapp;?>" REQUIRED>
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