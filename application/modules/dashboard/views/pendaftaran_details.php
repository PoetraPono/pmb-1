<div class="container">
    <div class="row">
        <div class="col-12">
            <?php //var_dump($details);?>
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <h5 class="card-title">
                            [<?= $details->kode_jalur_seleksi;?>] : <?= $details->nama_jalur;?>
                        </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                         <!-- The time line -->
                        <div class="timeline">
                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-success">
                                Tahap Pendaftaran Seleksi
                            </span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-angle-double-down bg-success"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                                <h3 class="timeline-header"><a href="#">1. Pendaftaran</a></h3>

                                <div class="timeline-body bg-light">
                                    <p>Jadwal: <em><?= date('d F Y', strtotime(''.$details->start_pendaftaran.''));?></em> s.d. <em><?= date('d F Y', strtotime(''.$details->end_pendaftaran.''));?></em> 
                                    <br>Dilakukan pada <strong><em><?= date('d F Y', strtotime(''.$details->tanggal_pendaftaran.''));?> pukul <?= date('H:i:s', strtotime(''.$details->tanggal_pendaftaran.''));?> WIB</em></strong></p>
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <?php
                            if($details->tahap_seleksi == 2 && $tanggal_tahap_pendaftaran->tanggal_pemilihan_prodi == null):
                        ?>
                        <div>
                            <i class="fas fa-angle-double-down bg-success"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                                <h3 class="timeline-header"><a href="<?= site_url('dashboard/pendaftaran/pemilihan_prodi/'.$details->id);?>">2. Pemilihan Program Studi</a></h3>

                                <div class="timeline-body bg-light">
                                    <p>Sudah dibuka, namun belum dilakukan pengisian.</p>
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->
                        <?php
                            else:
                        ?>
                        <div>
                            <i class="fas fa-angle-double-down bg-success"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                                
                                <?php if ($details->tahap_seleksi > 5 && $details->tanggal_terakhir_dirubah != ''): ?>
                                    <h3 class="timeline-header"><a data-toggle="modal" data-target="#myModallocked" href="#myModallocked">2. Pemilihan Program Studi</a></h3>
                                <?php else: ?>
                                    <h3 class="timeline-header"><a href="<?= site_url('dashboard/pendaftaran/pemilihan_prodi/'.$details->id);?>">2. Pemilihan Program Studi</a></h3>
                                <?php endif ?>

                                <div class="timeline-body bg-light">
                                    Dilakukan pada <strong><em><?= date('d F Y', strtotime(''.$tanggal_tahap_pendaftaran->tanggal_pemilihan_prodi.''));?> pukul <?= date('H:i:s', strtotime(''.$tanggal_tahap_pendaftaran->tanggal_pemilihan_prodi.''));?> WIB</em></strong></p>
                                </div>
                            </div>
                        </div>
                        <?php
                            endif;
                        ?>
                        <!----------------------->
                        <!-- 3. PENGISIAN DATA -->
                        <!----------------------->
                        <?php
                            if($details->tahap_seleksi < 3 && $tanggal_tahap_pendaftaran->tanggal_pengisian_data == null):
                        ?>
                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-lock bg-danger"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                                <h3 class="timeline-header"><a href="#" class="text-danger">3. Pengisian Data</a></h3>

                                <div class="timeline-body bg-light">
                                    <p><em>Belum dapat dilakukan.</em></p>
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->
                        <?php
                            elseif($details->tahap_seleksi == 3 && $tanggal_tahap_pendaftaran->tanggal_pengisian_data == null):
                        ?>
                        <div>
                            <i class="fas fa-angle-double-down bg-success"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                                <h3 class="timeline-header"><a href="<?= site_url('dashboard/pendaftaran/pengisian_data/'.$details->id);?>">3. Pengisian Data</a></h3>

                                <div class="timeline-body bg-light">
                                    <p>Sudah dibuka, namun belum dilakukan pengisian.</p>
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->
                        <?php
                            else:
                        ?>
                        <div>
                            <i class="fas fa-angle-double-down bg-success"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                                <?php if ($details->tahap_seleksi > 5 && $details->tanggal_terakhir_dirubah != ''): ?>
                                    <h3 class="timeline-header"><a href="#" data-toggle="modal" data-target="#myModallocked">3. Pengisian Data</a></h3>
                                <?php else: ?>                                    
                                    <h3 class="timeline-header"><a href="<?= site_url('dashboard/pendaftaran/pengisian_data/'.$details->id);?>">3. Pengisian Data</a></h3>
                                <?php endif ?>  

                                <div class="timeline-body bg-light">
                                    Dilakukan pada <strong><em><?= date('d F Y', strtotime(''.$tanggal_tahap_pendaftaran->tanggal_pengisian_data.''));?> pukul <?= date('H:i:s', strtotime(''.$tanggal_tahap_pendaftaran->tanggal_pengisian_data.''));?> WIB</em></strong></p>
                                </div>
                            </div>
                        </div>
                        <?php
                            endif;
                        ?>
                        <!----------------------->
                        <!-- 4. UPLOAD DOKUMEN -->
                        <!----------------------->
                        <?php
                            if($details->tahap_seleksi < 4 && $tanggal_tahap_pendaftaran->tanggal_upload_dokumen == null):
                        ?>
                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-lock bg-danger"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                                <h3 class="timeline-header"><a href="#" class="text-danger">4. Upload Dokumen</a></h3>

                                <div class="timeline-body bg-light">
                                    <p><em>Belum dapat dilakukan.</em></p>
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->
                        <?php
                            elseif($details->tahap_seleksi == 4 && $tanggal_tahap_pendaftaran->tanggal_upload_dokumen == null):
                        ?>
                        <div>
                            <i class="fas fa-angle-double-down bg-success"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                            
                            <?php if ($details->tahap_seleksi > 5 && $details->tanggal_terakhir_dirubah != ''): ?>
                                <h3 class="timeline-header"><a href="#" data-toggle="modal" data-target="#myModallocked">4. Upload Dokumen</a></h3>
                            <?php else: ?>                                    
                                <h3 class="timeline-header"><a href="<?= site_url('dashboard/pendaftaran/upload_dokumen/'.$details->id);?>">4. Upload Dokumen</a></h3>
                            <?php endif ?>                                

                                <div class="timeline-body bg-light">
                                    <p>Sudah dibuka, namun belum dilakukan pengisian.</p>
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->
                        <?php
                            else:
                        ?>
                        <div>
                            <i class="fas fa-angle-double-down bg-success"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                            <?php if ($details->tahap_seleksi > 5 && $details->tanggal_terakhir_dirubah != ''): ?>
                                <h3 class="timeline-header"><a href="#" data-toggle="modal" data-target="#myModallocked">4. Upload Dokumen</a></h3>
                            <?php else: ?>                                    
                                <h3 class="timeline-header"><a href="<?= site_url('dashboard/pendaftaran/upload_dokumen/'.$details->id);?>">4. Upload Dokumen</a></h3>
                            <?php endif ?>  

                                <div class="timeline-body bg-light">
                                    Dilakukan pada <strong><em><?= date('d F Y', strtotime(''.$tanggal_tahap_pendaftaran->tanggal_upload_dokumen.''));?> pukul <?= date('H:i:s', strtotime(''.$tanggal_tahap_pendaftaran->tanggal_upload_dokumen.''));?> WIB</em></strong></p>
                                </div>
                            </div>
                        </div>
                        <?php
                            endif;
                        ?>
                        <!----------------------->
                        <!-- 5. PENGUNCIAN DATA -->
                        <!----------------------->
                        <!-- timeline item -->
                        <?php if ($details->tahap_seleksi > 5 && $details->tanggal_terakhir_dirubah != ''): ?>
                        <div>
                            <i class="fas fa-angle-double-down bg-success"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                                <h3 class="timeline-header"><a href="#" data-toggle="modal" data-target="#myModallocked" class="text-primary">5. Penguncian Data</a></h3>

                                <div class="timeline-body bg-light">
                                <p><em>Dilakukan pada <strong><?php echo $details->tanggal_terakhir_dirubah ; ?></strong> .</em></p>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                            <?php if ($details->tahap_seleksi == 5): ?>
                        <div>
                            <i class="fas fa-lock bg-success"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                                <h3 class="timeline-header"><a href="<?= site_url('dashboard/pendaftaran/penguncian_data/'.$details->id);?>" class="text-success">5. Penguncian Data</a></h3>

                                <div class="timeline-body bg-light">
                                <p><em>Sudah terbuka namun  belum dilakukan</em></p>
                                </div>
                            </div>
                        </div>
                            <?php else: ?>
                        <div>
                            <i class="fas fa-lock bg-danger"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                                <h3 class="timeline-header"><a href="<?= site_url('dashboard/pendaftaran/penguncian_data/'.$details->id);?>" class="text-danger">5. Penguncian Data</a></h3>

                                <div class="timeline-body bg-light">
                                <p><em>Belum dapat Dilakukan.</em></p>
                                </div>
                            </div>
                        </div>
                            <?php endif ?>
                        <?php endif ?>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                            
                            <?php if ($details->tahap_seleksi == 6): ?>
                                <i class="fas fa-angle-double-down bg-success"></i>
                            <?php else: ?>
                                <i class="fas fa-lock bg-danger"></i>
                            <?php endif ?>


                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                                
                                <?php if ($details->tahap_seleksi == 6): ?>
                                    <h3 class="timeline-header"><a href="<?= site_url('dashboard/pendaftaran/pembayaran/'.$details->id);?>" class="text-primary">6. Pembayaran</a></h3>
                                <?php else: ?>
                                    <h3 class="timeline-header"><a href="<?= site_url('dashboard/pendaftaran/pembayaran/'.$details->id);?>" class="text-danger">6. Pembayaran</a></h3>
                                <?php endif ?>

                                <div class="timeline-body bg-light">
                                    <?php if ($details->tahap_seleksi == 6 && $details->status_pembayaran == 0): ?>
                                          Sudah terbuka namun belum dilakukan
                                    <?php endif ?>                           

                                    <?php if ($details->tahap_seleksi > 6 && $details->status_pembayaran != 0): ?>
                                        Sudah dilakukan pembayaran             
                                    <?php endif ?>         
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-lock bg-danger"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                                <h3 class="timeline-header"><a href="#" class="text-danger">7. Cetak Kartu</a></h3>

                                <div class="timeline-body bg-light">
                                    <p>Jadwal: <em>10 September 2019 pukul 00:00:00 WIB</em> s.d. <em>11 Oktober 2019 pukul 23:59:59 WIB</em> <br>Dilakukan pada <strong><em>10 Oktober 2019 pukul 08:52:20 WIB</em></strong></p>
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-lock bg-danger"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                                <h3 class="timeline-header"><a href="#" class="text-danger">8. Verifikasi Berkas dan Daftar Ulang</a></h3>

                                <div class="timeline-body bg-light">
                                    <p>Jadwal: <em>10 September 2019 pukul 00:00:00 WIB</em> s.d. <em>11 Oktober 2019 pukul 23:59:59 WIB</em> <br>Dilakukan pada <strong><em>10 Oktober 2019 pukul 08:52:20 WIB</em></strong></p>
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-lock bg-danger"></i>
                            <div class="timeline-item">
                                <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                                <h3 class="timeline-header"><a href="#" class="text-danger">9. Pengumuman</a></h3>

                                <div class="timeline-body bg-light">
                                    <p>Jadwal: <em>10 September 2019 pukul 00:00:00 WIB</em> s.d. <em>11 Oktober 2019 pukul 23:59:59 WIB</em> <br>Dilakukan pada <strong><em>10 Oktober 2019 pukul 08:52:20 WIB</em></strong></p>
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->
                        <div>
                            <i class="fas fa-user-lock bg-dark"></i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="myModallocked">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Peringatan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Kamu tidak bisa mengedit data karena kamu telah melakukan penguncian data
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>