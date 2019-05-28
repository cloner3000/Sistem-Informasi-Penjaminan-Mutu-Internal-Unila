<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<div id="daftar_audit">
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Daftar Audit Matakuliah</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Daftar Audit Matakuliah</strong>
                </li>      
            </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Daftar Audit Mata Kuliah</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="daftar_matakuliah" class="table table-striped table-bordered table-hover daftar_matakuliah" >
                            <thead>
                                <tr>
                                    <th>Lokasi Audit</th>
                                    <th>Jadwal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Lokasi Audit</th>
                                    <th>Jadwal</th>
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
</div>

<div id="instrument">

</div>

<div id="detail_audit" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Detail Audit Mata Kuliah</h4>
        </div>
        <div class="modal-body">
            <div id="tampil_audit">
        
            </div>
        </div>
    </div>
    </div>
</div>

<div id="lihat_skor" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Hasil Audit Mata Kuliah</h4>
        </div>
        <div class="modal-body">
            <div id="tampil_skor">
        
            </div>
        </div>
    </div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>


<?php if ($this->session->flashdata('success')): ?>
<script>
$(document).ready(function(){
    swal({
        type : "success",
        title: "Success",
        text: "Your request has been completed Successfully!",
        showConfirmButton: false,
        timer: 4000,
    });
});   
</script>
<?php endif; ?>


<script>
$(document).ready(function(){
    $.fn.dataTable.ext.errMode = 'none';
    var daftar_matakuliah = $('#daftar_matakuliah').on( 'error.dt', function ( e, settings, techNote, message ) {
        swal({
            type : "error",
            title: "Gagal",
            text: "Tidak ada jadwal audit",
            showConfirmButton: false,
            timer: 4000,
        });
    }).DataTable({
        "processing": true,
        "autoWidth" : false,
        "ajax"      : 'data_daftar_jadwal_auditor',
        stateSave   : true,
        "order"     : [],
    })


    $('#daftar_matakuliah').on('click','.audit', function (){
        var id_audit_mata_kuliah = $(this).data('id_audit_mata_kuliah');

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'auditor/daftar_audit_matkul'?>",
                beforeSend: function () {
                    let timerInterval
                    swal({
                        title : 'Menunggu',
                        html  : 'Memproses data...',
                        text : 'Proses Data',
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, 
                data : {id_audit_mata_kuliah : id_audit_mata_kuliah},
                success: function (data){
                    swal.close();
                    $('#daftar_audit').fadeOut(500);
                    $('#instrument').html(data);

            }
        })
    });
});
</script>