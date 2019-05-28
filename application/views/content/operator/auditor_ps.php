<link href="<?php echo base_url("assets/css/plugins/chosen/bootstrap-chosen.css");?>" rel="stylesheet">

<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Jadwal</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Kelola Jadwal Auditor</strong>
                </li>      
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <button data-toggle="modal" href="#tambah-jadwal" class="btn btn-primary float-right" type="submit"><i class="fa fa-pencil-square-o"></i> Tambah Data</button>
        </div>   
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Daftar Jadwal Audit Auditor</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="auditor_ps" class="table table-striped table-bordered table-hover manajemen_user" >
                            <thead>
                                <tr> 
                                    <th>Nama Auditor</th>  
                                    <th>Jadwal Auditor</th>
                                    <th>Lokasi Audit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Auditor</th>  
                                    <th>Jadwal Auditor</th>
                                    <th>Lokasi Audit</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="tambah-jadwal" class="tambah-jadwal modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        
        <form action="<?php echo base_url().'set_auditor/tambah_auditor_ps'?>" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="font-normal"><b>Jadwal Audit</b></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <select id="jadwal_id" name="jadwal_id" class="form-control m-b" required>
                            <option value="">-Jadwal Audit Matkul-</option>
                            <?php foreach($jadwal as $row):?>
                                <?php if ($row['jenis_audit_id'] == 1):?>
                                    <option value="<?php echo $row['id_jadwal'];?>"><?php echo $row['semester'];?> <?php echo $row['tahun_akademik'];?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Jadwal Auditor</b></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <select id="jadwal_id" name="jadwal_auditor_id" class="form-control m-b" required>
                            <option value="">-Jadwal Auditor-</option>
                            <?php foreach($jadwal_auditor as $row):?>
                                <?php if ($row['jenis_audit_id'] == 1):?>
                                    <option value="<?php echo $row['id_jadwal'];?>"><?php echo date("d F Y", strtotime($row['mulai_audit'])) ?></strong> s.d. <strong><?php echo date("d F Y", strtotime($row['selesai_audit'])) ?> <?php echo $row['semester'];?> <?php echo $row['tahun_akademik'];?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Program Studi</b></label>
                    <div class="input-group">
                        <select id="prodi_id" name="prodi_id" data-placeholder="Pilih Program Studi.." class="prodi-select" required>
                            <option value=""></option>
                            <?php foreach($prodi->result() as $row):?>
                                <option value="<?php echo $row->id_prodi;?>"><?php echo $row->program_studi;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Auditor</b></label>
                    <div class="input-group">
                        <select id="auditor_id" name="auditor_id[]" data-placeholder="Pilih Auditor.." class="auditor" multiple required>
                            <option value=""></option>
                            <?php foreach($auditor as $row):?>
                                <option value="<?php echo $row['id_auditor'];?>"><?php echo $row['nama_auditor'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    </div>
</div>

<div id="ubah_jadwal" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Edit Data</h4>
            </div>
        <div class="modal-body">
        <div id="form_edit_jadwal">
        
        </div>
    </div>
</div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/plugins/chosen/chosen.jquery.js");?>"></script>

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>

<?php if ($this->session->flashdata('success')): ?>
<script>
$(document).ready(function(){
    swal({
        type : "success",
        title: "Success!",
        text: "berhasil menambahkan auditor!",
        showConfirmButton: false,
        timer: 4000,
    });
});   
</script>
<?php endif; ?>

<script>
$(document).ready(function(){
    $('.auditor').chosen({
        width: "100%"
    });
    $('.prodi-select').chosen({
        width: "100%"
    });
})
</script>
<script>
//manajemen jadwal
$(document).ready(function(){
        var auditor_ps = $('#auditor_ps').DataTable({
    
        "processing": true,
        "autoWidth" : false,
        "ajax"      : 'data_auditor_ps',
        stateSave   : true,
        "order"     : []
        })

        $('#auditor_ps').on('click', '.hapus-auditor', function(){
            var id_auditor = $(this).data('id_auditor_ps');
            swal({
                title             : 'Konfirmasi',
                text              : "Anda ingin hapus jadwal",
                type              : 'warning',
                showCancelButton  : true,
                confirmButtonText : 'Hapus',
                confirmButtonColor: '#d33',
                cancelButtonColor : '#3085d6',
                cancelButtonText  : 'Tidak',
                reverseButtons    : true
            }).then((result) => {
                if (result.value) {
                $.ajax({
                    url      : 'delete_auditor_ps',
                    method   : "POST",
                    beforSend: function() {
                    swal({
                        title : 'Menunggu',
                        html  : 'Memproses data',
                        onOpen: () => {
                        swal.showLoading()
                        }
                    })
                    },
                    data    : {id_auditor:id_auditor},
                    dataType: "JSON",
                    success : function(data){
                    swal(
                        'Hapus',
                        'Jadwal berhasil di hapus',
                        'success'
                    )
                    auditor_ps.ajax.reload(null, false)
                    }
                })
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal(
                    'Batal',
                    'Anda membatalkan menghapaus data',
                    'error'
                    )
                }
            })
        });
});
</script>


