<link href="<?php echo base_url("assets/css/plugins/select2/select2.min.css");?>" rel="stylesheet">
<div id="cari">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Laporan Audit Mata Kuliah</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Laporan Audit Mata Kuliah</strong>
                    </li>      
                </ol>
        </div>
    </div>

    <div class="wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Laporan Audit Matakuliah</h5>
                    </div>
                    <div class="ibox-content">
                        <form action="<?php echo base_url().'pimpinan/print_laporan'?>" method="post"> 
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label"><b>Jadwal Audit</b></label>
                                <div class="col-lg-10">
                                    <select name="jadwal_id" id="jadwal_id" class="form-control-sm form-control">
                                        <?php foreach($jadwal as $jad):?>
                                            <option value="<?php echo $jad['id_jadwal']?>">
                                                <?php echo $jad['semester']?> <?php echo $jad['tahun_akademik']?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label"><b>Program_studi</b></label>
                                <div class="col-lg-10">
                                    <select name="prodi_id" id="prodi_id" data-placeholder="Pilih Prodi..." class="pilih-prodi">
                                        <option value=""></option>
                                        <?php foreach($prodi->result() as $jad):?>
                                            <option value="<?php echo $jad->id_prodi?>">
                                                <?php echo $jad->program_studi?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>       
                            <div class="modal-footer">
                                <button name="submit" value="Simpan"  type="submit" class="btn btn-danger">Reset</button>
                                <button target="_blank" name="submit" value="Simpan" type="submit" class="btn btn-success">Proses</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="hasil">

</div>


<script language="JavaScript" type="text/javascript" src="<?php echo base_url("assets/js/plugins/select2/select2.full.min.js");?>"></script>

<script>
$(document).ready(function(){
    $('.pilih-prodi').select2({
        width: "100%", 
    });
});
</script>

<script>
$(document).ready(function(){
    $('#laporan').on('click', function (){
        var jadwal_id = $('#jadwal_id').val();
        var prodi_id = $('#prodi_id').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'laporan/print_laporan'?>",
                    beforeSend: function () {
                        let timerInterval
                        swal({
                            title : 'Menunggu',
                            html  : 'Download laporan...',
                            text : 'Proses Data',
                            time : 3000,
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                    }, 
                    data : {
                        jadwal_id : jadwal_id,
                        prodi_id : prodi_id,
                    },
                    success: function (data){
                        swal.close();
                        // $('#cari').fadeOut(500);
                        $('#hasil').html(data);

                    }
                })
    });

})
</script>
