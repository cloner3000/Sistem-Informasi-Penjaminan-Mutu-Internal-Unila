<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>User Auditor</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="index.html">Manajemen User</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>User Auditor</strong>
                </li>      
            </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Daftar User Auditor</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="user_auditor" class="table table-striped table-bordered table-hover user_auditor" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
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

<script type="text/javascript">
  $('#user_auditor').DataTable({
    "processing": true,
    "autoWidth" : false,
    "ajax"      : "<?php echo base_url().'su/user/get_auditor'?>",
    stateSave   : true,
    "order": [],
  });
</script>







        