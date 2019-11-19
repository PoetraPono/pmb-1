<div class="container">
<div class="row">
    <!-- <div class="col-12">
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
                <h3 class="card-title">Aktivasi Akun Pendaftar</h3>
            </div>
            <form action="<?= site_url('dashboard/prodi/add');?>" method="post" class="form-horizontal needs-validation" >
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="card-body" >
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-12">
                                <input disabled type="text" class="form-control" name="nama_pendaftar" id="nama_pendaftar" placeholder="Nama Pendaftar" REQUIRED>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                           <div class="col-12">
                                <input disabled type="text" class="form-control" name="aktivasi" id="aktivasi" placeholder="Status Aktivasi" REQUIRED>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-12">
                                <select class="form-control form-group-margin" name="jenis_pendidikan" id="jenis_pendidikan" REQUIRED>
                                    <option value="">- Cari Nama -</option>
                                    <option value="S1">S1</option>
                                    <option value="D3">D3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-info">Aktifkan Akun</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div> -->
    <div class="col-12">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pendaftar</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                    <table class="table table-bordered table-striped" id="table" style="width:100%;">
                        <thead class="bg-info">
                            <tr>
                                <th>ID</th>
                                <th>EMAIL</th>
                                <th>AKTIVASI</th>
                                <th>NAMA LENGKAP</th>
                                <th>TEMPAT LAHIR</th>
                                <th>TANGGAL LAHIR</th>
                                <th>JENIS KELAMIN</th>
                                <th>NAMA IBU</th>
                                <th>TANGGAL MENDAFTAR</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 4.0
                                </td>
                                <td>
                                    Hahah
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                        </div>
                    </div>
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
                <h4 class="modal-title">Edit Data Pendaftar</h4>
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
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="email" name="modal_email" REQUIRED>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" placeholder="nama lengkap" name="modal_nama_lengkap" REQUIRED>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" placeholder="tempat lahir" name="modal_tempat_lahir" REQUIRED>
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
            // responsive: true,
            // responsive: {
            //     breakpoints: [
            //         { name: 'desktop', width: Infinity },
            //         { name: 'tablet',  width: 1024 },
            //         { name: 'fablet',  width: 768 },
            //         { name: 'phone',   width: 480 }
            //     ]
            // },
            // "bStateSave": true,
            // "aoColumns": [{ "bSearchable": true },
            // { "bSearchable": false },
            // { "bSearchable": true }],
            "responsive": true,
            "processing": true,
            // "serverSide": true,
            "ajax":{
                "url": "<?php echo site_url('dashboard/pendaftar/get/') ?>",
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
                        return data +' '+ row[10]+'';
                    },
                    "targets": 9
                },
                { "visible": true,  "targets": [ 9 ] }
            ]
        });
        $("table.dataTable").css("font-size", 10);
        table.columns.adjust().draw();
    });
    function edit_pendaftar(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
    
        console.log('id',id);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('dashboard/pendaftar/edit/')?>"+id,
            type: "GET",
            dataType: "JSON",
            data:{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' },
            success: function(data)
            {
                console.log(data);
    
                $('[name="modal_id"]').val(data.id);
                $('[name="modal_email"]').val(data.email);
                $('[name="modal_nama_lengkap"]').val(data.nama_lengkap);
                $('[name="modal_tempat_lahir"]').val(data.tempat_lahir);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Prodi'); // Set title to Bootstrap modal title
    
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
        
        url = "<?php echo site_url('dashboard/pendaftar/post_edit')?>";
    
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