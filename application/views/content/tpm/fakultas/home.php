<link href="<?php echo base_url("assets/css/plugins/select2/select2.min.css");?>" rel="stylesheet">

<div id="cari">
    <div class="wrapper wrapper-content animated fadeIn">
    <?php if ($tpmf['nama_tpmf'] == false ){?>
        <div class="alert alert-primary alert-dismissable">
            Hallo <?php echo $this->session->userdata('username')?> sebagai Tim Penjamin Mutu <?php echo $tpmf['singkatan_fakultas']?> lengkapi Biodata anda<a class="alert-link" href="<?php echo base_url().'tpm/tpm_fakultas/detail_user/'.$this->session->userdata('id_user')?>"> <b>Klik Disini</b></a>.
        </div>
    <?php }?>
    <?php if ($tpmf['nama_tpmf'] == true ){?>
        <div class="alert alert-success alert-dismissable">
            Selamat Datang <b><?php echo $tpmf['nama_tpmf'] ?></b> sebagai Tim Penjamin Mutu <b><?php echo $tpmf['singkatan_fakultas']?></b> di Sistem Informasi Penjaminan Mutu Internal Universitas Lampung
        </div>
    <?php }?>
    
        <div class="row">
            <div class="col-lg-6">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Laporan Audit</h5>
                        </div>
                        <div class="ibox-content">
                            <form action="<?php echo base_url().'tpm/tpm_fakultas/print_laporan'?>" method="post"> 
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
                                    <label class="col-lg-2 col-form-label"><b>Program Studi</b></label>
                                    <div class="col-lg-10">
                                        <select name="prodi_id" id="prodi_id" data-placeholder="Pilih Prodi..." class="form-control-sm form-control">
                                            <option value="">-Pilih Prodi-</option>
                                            <?php foreach($prodi->result() as $jad):?>
                                                <?php if($tpmf['fakultas_id'] == $jad->fakultas_id): ?>
                                                <option value="<?php echo $jad->id_prodi?>">
                                                    <?php echo $jad->program_studi?>
                                                </option>
                                                <?php endif; ?>
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
            
            <div class="col-lg-6">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Rekapitulasi Audit</h5>
                        </div>
                        <div class="ibox-content">
                             <form action="<?php echo base_url().'tpm/tpm_fakultas/result_rekap'?>" method="post"> 
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
                                    <label class="col-lg-2 col-form-label"><b>Nama Dosen</b></label>
                                    <div class="col-lg-10">
                                        <select name="dosen_id" id="dosen_id" data-placeholder="Pilih Dosen PJ..." class="pilih-dosen">
                                                <option value=""></option>
                                            <?php foreach($dosen as $dos):?>
                                                    <option value="<?php echo $dos['id']?>"><?php echo $dos['nama']?></option>
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
    </div
</div>

<div id="hasil">

</div>

<script language="JavaScript" type="text/javascript" src="<?php echo base_url("assets/js/plugins/select2/select2.full.min.js");?>"></script>

<script>
$(document).ready(function(){
    $('.pilih-dosen').select2({
        width: "100%",
        minimumInputLength: 3, 
    });
});
</script>

<script>
$(document).ready(function(){
    $('#rekap').on('click', function (){
        var jadwal_id = $('#jadwal_id').val();
        var dosen_id = $('#dosen_id').val();
        
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url().'tpm/tpm_fakultas/result_rekap'?>",
            beforeSend: function () {
                let timerInterval
                swal({
                    title : 'Menunggu',
                    html  : 'Merekap hasil audit...',
                    text : 'Proses Data',
                        onOpen: () => {
                            swal.showLoading()
                    }
                })
            }, 
            data : {
                jadwal_id : jadwal_id,
                dosen_id : dosen_id
            },
            success: function (data){
                swal.close();
                $('#cari').fadeOut(500);
                $('#hasil').html(data);

            }
        })
    });

})
</script>

<?php if ($this->session->flashdata('tidak')): ?>
<script>
$(document).ready(function(){
    swal({
        type : "error",
        title: "Oops!",
        text: "Password lama salah!",
        showConfirmButton: false,
        timer: 4000,
    });
});   
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
<script>
$(document).ready(function(){
    swal({
        type : "error",
        title: "Oops!",
        text: "Tidak ada akses!",
        showConfirmButton: false,
        timer: 4000,
    });
});   
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
<script>
$(document).ready(function(){
    swal({
        type : "success",
        title: "Berhasil",
        text: "Data berhasil di perbarui",
        showConfirmButton: false,
        timer: 4000,
    });
});   
</script>
<?php endif; ?>

<script>
$(document).ready(function(){
    $('.pilih-prodi').select2({
        width: "100%", 
    });
});
</script>