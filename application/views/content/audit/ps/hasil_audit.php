<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<!-- <div id="cari"> -->
    <!-- <div class="wrapper-content animated fadeInUp"> -->
        <!-- <div class="row"> -->
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Daftar Hasil Audit Matakuliah</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table id="daftar_matakuliah" class="table table-striped table-bordered table-hover daftar_matakuliah" >
                                <thead>
                                    <tr>
                                        <th>Kode MK</th>   
                                        <th>Mata Kuliah</th>
                                        <th>Mulai Audit</th>
                                        <th>Selesai Audit</th>
                                        <th>Semester</th>
                                        <th>Tahun Akademik</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($hasil as $matkul): ?>
                                    <tr>
                                        <td><?php echo $matkul['kode_mk']?></td>
                                        <td><?php echo $matkul['nama_mk']?></td>
                                        <td><?php echo $matkul['mulai_audit']?></td>
                                        <td><?php echo $matkul['selesai_audit']?></td>
                                        <td><?php echo $matkul['semester']?></td>
                                        <td><?php echo $matkul['tahun_akademik']?></td>
                                        <td>
                                            <button class="btn btn-warning detail-audit" id="id_audit_mata_kuliah" data-toggle="modal" data-id_audit_mata_kuliah="<?php echo $matkul['id_audit_mata_kuliah']?>">Detail</button>
                                            <p></p>
                                            <button class="btn btn-info lihat-skor" id="id_audit_mata_kuliah" data-toggle="modal" data-id_audit_mata_kuliah="<?php echo $matkul['id_audit_mata_kuliah'] ?>">Lihat Skor</button>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Kode MK</th>   
                                        <th>Mata Kuliah</th>
                                        <th>Mulai Audit</th>
                                        <th>Selesai Audit</th>
                                        <th>Semester</th>
                                        <th>Tahun Akademik</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->



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

<script>
$(document).ready(function(){
    var daftar_matakuliah = $('#daftar_matakuliah').DataTable({
        "processing": true,
        "autoWidth" : true,
        stateSave   : true,
        "order"     : [],
    })

    $('#btn-filter').click(function(){ //button filter event click
        daftar_matakuliah.ajax.reload();  //just reload table
    });

    $('#daftar_matakuliah').on('click','.detail-audit', function () {
        var id_audit_mata_kuliah = $(this).data('id_audit_mata_kuliah');
    
        $.ajax({
            type     : "POST",
            url      : '<?php echo base_url().'audit_ps/detail_audit'?>',
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
            url      : '<?php echo base_url().'audit_ps/lihat_skor'?>',
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
                $('#lihat_skor').modal('show');
                $('#tampil_skor').html(data);
            }
        })
        return false;
    });
});
</script>