<div class="container">
<div class="row">
    <div class="col-12">
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
        
       
        <div class="card card-info" style="margin:7px;">
            <div class="card-header">
                <h3 class="card-title">
                    <a class="btn btn-block btn-info" data-toggle="collapse" href="#tambahJalurSeleksi" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fas fa-plus"></i> Jalur Seleksi Masuk
                    </a>
                </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= site_url('dashboard/jalur_seleksi/add');?>" method="post" class="form-horizontal needs-validation" >
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="collapse" id="tambahJalurSeleksi">
                    <div class="card-body" >
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="kode_jalur_seleksi" id="kode_jalur_seleksi" placeholder="Kode" REQUIRED>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="nama_jalur_seleksi" id="nama_jalur_seleksi" placeholder="Nama Jalur Seleksi" REQUIRED>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label style="font-size:14px;">Dibuka tanggal:</label>
                                        <input id="tgl_buka" class="form-control" name="tgl_buka" readonly REQUIRED>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="kuota_pendaftar" id="kuota_pendaftar" placeholder="Kuota Pendaftar" REQUIRED>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <select class="form-control form-group-margin" name="status_seleksi" id="status_seleksi" REQUIRED>
                                            <option value="">- Pilih Status Seleksi -</option>
                                            <option value="0">Non Aktif</option>
                                            <option value="1">Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label style="font-size:14px;">Ditutup tanggal:</label>
                                        <input id="tgl_tutup" class="form-control" name="tgl_tutup" readonly REQUIRED>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-info btn-block">Tambah</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Masukan ringkasan informasi dari jalur seleksi" REQUIRED></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    </div>
                </div>
            <!-- /.card-body -->
            </form>
        </div>
    </div>
    <div class="col-12">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Jalur Seleksi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>KODE</th>
                                <th>NAMA</th>
                                <th>DESKRIPSI</th>
                                <th>DIBUKA</th>
                                <th>DITUTUP</th>
                                <th>KUOTA</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
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
    var save_method; //for save method string
    var table;
    $(document).ready(function () {
        table = $('#table').DataTable({
            scrollY:        "300px",
            scrollX:        true,
            scrollCollapse: true,
            paging:         false,
            columnDefs: [
                { width: '20%', targets: 0 }
            ],
            fixedColumns: true,
            "responsive":true,
            "processing": true,
            // "serverSide": true,
            "ajax":{
                "url": "<?php echo site_url('dashboard/jalur_seleksi/get') ?>",
                "dataType": "json",
                "type": "POST",
                "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
            },
            "columnDefs": [
                {
                    // The `data` parameter refers to the data for the cell (defined by the
                    // `data` option, which defaults to the column being worked with, in
                    // this case `data: 0`.
                    "render": function ( data, type, row ) {
                        console.log(data,type,row);
                        return data +' '+ row[9]+'';
                    },
                    "targets": 8
                },
                { "visible": true,  "targets": [ 8 ] }
            ]
	    });
    });
    function edit_jalur_seleksi(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
    
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('dashboard/jalur_seleksi/edit/')?>"+id,
            type: "GET",
            dataType: "JSON",
            data:{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' },
            success: function(data)
            {
                console.log(data);
    
                $('[name="modal_id"]').val(data.id);
                $('[name="modal_kode_jalur_seleksi"]').val(data.kode_jalur_seleksi);
                $('[name="modal_nama_jalur"]').val(data.nama_jalur);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Jalur Seleksi'); // Set title to Bootstrap modal title
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log('Error get data from ajax');
            }
        });
    }
    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax 
    }
    function save()
    {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        
        var url;
        
        url = "<?php echo site_url('dashboard/prodi/post_edit')?>";
    
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
    
                if(data.status) //if success close modal and reload ajax table
                {
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
                    $('#modal_form').modal('hide');
                    reload_table();
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
    
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
    
            }
        });
    }
</script>