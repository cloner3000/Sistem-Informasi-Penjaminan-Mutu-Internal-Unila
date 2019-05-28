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
    <div class="col-lg-4">
        <div class="title-action">
            <form action="<?php echo base_url().'auditor/cetak_laporan'?>" method="post">
                <input type="hidden" name="jadwal" value="<?php echo $jadwal_audit ?>">
                <input type="hidden" name="prodi" value="<?php echo $prodi ?>">
                <button class="btn btn-primary" type="submit" formtarget="_blank"><i class="fa fa-print"></i> Laporan</button>
            </form>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="title-action">
            <form action="<?php echo base_url().'auditor/cetak_berita_acara'?>"  method="post">
                <input type="hidden" name="jadwal" value="<?php echo $jadwal_audit ?>">
                <input type="hidden" name="prodi" value="<?php echo $prodi ?>">
                <button class="btn btn-success float-left" type="submit" formtarget="_blank"><i class="fa fa-print"></i> Berita Acara</button>
            </form>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="row">
        <div class="col-lg-12">
        
                <?php  
                    $start_date = strtotime($jadwal['mulai_audit']);
                    $end_date = strtotime($jadwal['selesai_audit']);
                    $todays_date = strtotime(date("Y-m-d"));
                ?>
                <?php if ($todays_date >= $start_date && $todays_date  <= $end_date ) { ?> 
                    <div class="alert alert-success alert-dismissable">
                        <li> Tanggal Entri : <strong><?php echo date("d F Y", strtotime($jadwal['mulai_audit'])) ?></strong> s.d. <strong><?php echo date("d F Y", strtotime($jadwal['selesai_audit'])) ?></strong> sedang berlangsung</li>
                    </div>
                <?php } else { ?> 
                    <?php if($todays_date < $start_date ) { ?>
                        <div class="alert alert-warning alert-dismissable">
                            <li> Tanggal Entri: <strong><?php echo date("d F Y", strtotime($jadwal['mulai_audit'])) ?></strong> s.d. <strong><?php echo date("d F Y", strtotime($jadwal['selesai_audit'])) ?></strong></li>
                        </div>
                    <?php } else {?>
                        <div class="alert alert-danger alert-dismissable">
                            <li> Tanggal Entri: <strong><?php echo date("d F Y", strtotime($jadwal['mulai_audit'])) ?></strong> s.d. <strong><?php echo date("d F Y", strtotime($jadwal['selesai_audit'])) ?></strong></li>
                        </div>
                    <?php } ?>
                <?php } ?>
        </div>
    </div>
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
                                    <th>Kode MK</th>   
                                    <th>Mata Kuliah</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($daftar_audit as $audit): ?>
                                <tr>
                                    <td><?php echo $audit['kode_mk']?></td>
                                    <td><?php echo $audit['nama_mk']?></td>
                                    <td>
                                    <?php if($audit['status_auditor'] == false ) {?>
                                        <span class='label label-danger'>Belum Mengisi</span>
                                    <?php }?>
                                    <?php if($audit['status_auditor'] == true ) {?>
                                        <span class='label label-primary'>Sudah Mengisi</span>
                                    <?php }?>
                                    </td>
                                    <td>
                                    <?php if($audit['status_auditor'] == false ) {?>
                                        <?php if($todays_date >= $start_date && $todays_date  <= $end_date){?>
                                            <button class="btn btn-success isi-borang" id="id_audit_mata_kuliah" data-toggle="modal" data-id_audit_mata_kuliah="<?php echo $audit['id_audit_mata_kuliah']?>">Isi Borang</button>
                                        <?php } ?>
                                        <button class="btn btn-warning detail-audit" id="id_audit_mata_kuliah" data-toggle="modal" data-id_audit_mata_kuliah="<?php echo $audit['id_audit_mata_kuliah']?>">Detail</button>
                                        <button class="btn btn-info lihat-skor" id="id_audit_mata_kuliah" data-toggle="modal" data-id_audit_mata_kuliah="<?php echo $audit['id_audit_mata_kuliah']?>">Lihat Skor</button>
                                    <?php }?>
                                    <?php if($audit['status_auditor'] == true ) {?>
                                        <?php if($todays_date >= $start_date && $todays_date  <= $end_date){?>
                                            <button class="btn btn-primary edit-audit" id="id_audit_mata_kuliah" data-toggle="modal" data-id_audit_mata_kuliah="<?php echo $audit['id_audit_mata_kuliah']?>">Edit</button>
                                        <?php } ?>
                                        <button class="btn btn-warning detail-audit" id="id_audit_mata_kuliah" data-toggle="modal" data-id_audit_mata_kuliah="<?php echo $audit['id_audit_mata_kuliah']?>">Detail</button>
                                        <button class="btn btn-info lihat-skor" id="id_audit_mata_kuliah" data-toggle="modal" data-id_audit_mata_kuliah="<?php echo $audit['id_audit_mata_kuliah']?>">Lihat Skor</button>
                                    <?php }?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Kode MK</th>
                                    <th>Mata kuliah</th>
                                    <th>Status</th>
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
            text: "Data masih kosong, input daftar audit mata kuliah terlebih dahulu!",
            showConfirmButton: false,
            timer: 4000,
        });
    }).DataTable({
        "processing": true,
        "autoWidth" : false,
        stateSave   : true,
        "order"     : [],
    })

    $('#daftar_matakuliah').on('click','.detail-audit', function () {
        var id_audit_mata_kuliah = $(this).data('id_audit_mata_kuliah');
    
        $.ajax({
            type     : "POST",
            url      : '<?php echo base_url().'auditor/detail_audit_matkul'?>',
            beforeSend: function (){
            let timerInterval
            swal({
                title : 'Menunggu',
                html  : 'Memproses data',
                text  : 'Proses Data',
                timer : 2000,
                onOpen: () => {
                swal.showLoading()
                }
            })
            },
            data   : {id_audit_mata_kuliah:id_audit_mata_kuliah},
            success: function (data){
            swal.close();
                $('#detail_audit').modal('show');
                $('#tampil_audit').html(data);
            }
        })
        return false;
    });

    $('#daftar_matakuliah').on('click','.lihat-skor', function () {
        var id_audit_mata_kuliah = $(this).data('id_audit_mata_kuliah');
    
        $.ajax({
            type     : "POST",
            url      : '<?php echo base_url().'auditor/lihat_skor_matkul'?>',
            beforeSend: function (){
            let timerInterval
            swal({
                title : 'Menunggu',
                html  : 'Memproses data',
                text  : 'Proses Data',
                onOpen: () => {
                swal.showLoading()
                }
            })
            },
            data   : {id_audit_mata_kuliah:id_audit_mata_kuliah},
            success: function (data){
            swal.close();
                $('#lihat_skor').modal('show');
                $('#tampil_skor').html(data);
            }
        })
        return false;
    });

    $('#daftar_matakuliah').on('click','.isi-borang', function (){
        var id_audit_mata_kuliah = $(this).data('id_audit_mata_kuliah');

        swal({
            title             : 'Konfirmasi',
            text              : "Anda yakin ingin mengisi borang?",
            type              : 'warning',
            showCancelButton  : true,
            confirmButtonText : 'Mulai Mengisi',
            confirmButtonColor: '#3085d6',
            cancelButtonColor : '#d33',
            cancelButtonText  : 'Tidak',
            reverseButtons    : true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'auditor/audit_matkul'?>",
                    beforeSend: function () {
                        let timerInterval
                        swal({
                            title : 'Menunggu',
                            html  : 'Menyiapkan borang...',
                            text : 'Proses Data',
                            time : 3000,
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
            } else if (result.dismiss === swal.DismissReason.cancel) {
                swal({
                    title : 'Batal',
                    html : 'Anda membatalkan mengisi borang',
                    type :'error',
                    timer : 2000,
                    showConfirmButton: false,
                })
            }
        })
    });

    $('#daftar_matakuliah').on('click','.edit-audit', function (){
        var id_audit_mata_kuliah = $(this).data('id_audit_mata_kuliah');

        swal({
            title             : 'Konfirmasi',
            text              : "Anda yakin ingin mengedit isian borang?",
            type              : 'warning',
            showCancelButton  : true,
            confirmButtonText : 'Edit isian borang',
            confirmButtonColor: '#3085d6',
            cancelButtonColor : '#d33',
            cancelButtonText  : 'Tidak',
            reverseButtons    : true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'auditor/edit_audit_matkul'?>",
                    beforeSend: function () {
                        let timerInterval
                        swal({
                            title : 'Menunggu',
                            html  : 'Menyiapkan borang...',
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
            } else if (result.dismiss === swal.DismissReason.cancel) {
                swal({
                    title : 'Batal',
                    html : 'Anda membatalkan nengedit borang',
                    type :'error',
                    timer : 2000,
                    showConfirmButton: false,
                })
            }
        })
    });
});
</script>