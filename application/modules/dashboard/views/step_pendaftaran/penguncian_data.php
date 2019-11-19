<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <h5 class="card-title">
                            Data Pendaftar
                        </h5>
                    </div>
                </div>

                <div class="card-body">
                	<div class="table-responsive">
                		<table class="w-100">
                		<tr>
                			<td>Email Aktif</td>
                			<td><?= $data_pendaftar->row()->email_aktif;?></td>
                		</tr>

                		<tr>
                			<td>NIK</td>
                			<td><?= $data_pendaftar->row()->nik;?></td>
                		</tr>

                		<tr>
                			<td>Jenis Identitas</td>
                			<td><?= strtoupper($data_pendaftar->row()->jenis_identitas);?></td>
                		</tr>

                		<tr>
                			<td>Alamat</td>
                			<td>
                				<?= $data_pendaftar->row()->alamat_tinggal;?>
                				<p> <a target='_blank' href="https://www.google.com/maps/search/?api=1&query=<?= rawurlencode($data_pendaftar->row()->alamat_tinggal);?>">Buka Maps <i class="fas fa-external-link-alt"></i></a> </p>
                			</td>
                		</tr>

                		<tr>
                			<td>Kode POS</td>
                			<td><?= $data_pendaftar->row()->kodepos;?></td>
                		</tr>

                		<tr>
                			<td>Nomor Hp</td>
                			<td><?= $data_pendaftar->row()->nomor_hp;?></td>
                		</tr>

                		<tr>
                			<td>Nomor WhatsApp</td>
                			<td><?= $data_pendaftar->row()->nomor_whatsapp;?></td>
                		</tr>
                	</table>
                	</div>

                	<br><br>
                	<div>
                		<form class="d-inline" action="<?= site_url('dashboard/pendaftaran/penguncian_data/update/'.$id_pendaftaran_jalur_seleksi);?>" method="POST">
                			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                			<button class="btn btn-sm btn-primary">Kunci Data</button>
                		</form>
                		<a href="<?= site_url('dashboard/pendaftaran/details/'.$id_pendaftaran_jalur_seleksi);?>" class="btn btn-default btn-sm">Kembali</a>
                	</div>
                </div>
                
            </div>
        </div>
        
    </div>
</div>

