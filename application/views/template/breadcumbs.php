<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
    <div class="row">
        <div class="col">
            <h5 class="m-0 text-dark"><?php if(!empty($breadcumbs_header)){
                echo $breadcumbs_header;
            };?></h5>
        </div><!-- /.col -->
        <div class="col">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item text-capitalize"><a href="<?= site_url($this->uri->segment(1)."/".$this->uri->segment(2))?>"><?= $this->uri->segment(1);?></a></li>
            <li class="breadcrumb-item text-capitalize active"><?= $this->uri->segment(2);?></li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
