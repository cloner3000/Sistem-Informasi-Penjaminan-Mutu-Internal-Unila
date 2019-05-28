<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Data Dosen</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Daftar Dosen</strong>
                </li>      
            </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Daftar Dosen</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="manajemen_dosen_remun" class="table table-striped table-bordered table-hover manajemen_dosen_remun" >
                            <thead>
                                <tr>   
                                    <th>Nama</th>
                                    <th>Fakultas</th>
                                    <th>Program Studi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama</th>
                                    <th>Fakultas</th>
                                    <th>Program Studi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>

<script>
$(document).ready(function(){
  var dosen_remun = $('#manajemen_dosen_remun').DataTable({
    "processing": true,
    "ajax"      : 'dosen/dosen_remun',
    stateSave   : true,
    "order"     : []
  })
})
</script>