<link href="<?php echo base_url("assets/css/plugins/select2/select2.min.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Audit Mata Kuliah</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Audit Mata Kuliah</strong>
                </li>      
            </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <?php $start_date = strtotime($jadwal->mulai_audit);?>
            <?php  $end_date = strtotime($jadwal->selesai_audit);?>
            <?php $todays_date = strtotime(date("Y-m-d"));?>
                <?php if ($todays_date >= $start_date && $todays_date  <= $end_date ) { ?> 
                    <div class="alert alert-success alert-dismissable">
                        <li> Tanggal <?php echo $jadwal->jenis_audit?>: <strong><?php echo date("d F Y", strtotime($jadwal->mulai_audit)) ?></strong> s.d. <strong><?php echo date("d F Y", strtotime($jadwal->selesai_audit)) ?></strong> untuk para <?php echo $jadwal->role ?> sedang berlangsung</li>
                    </div>
                <?php } else { ?> 
                    <?php if($todays_date < $start_date ) { ?>
                        <div class="alert alert-warning alert-dismissable">
                            <li> Tanggal Audit Matakuliah: <strong><?php echo date("d F Y", strtotime($jadwal->mulai_audit)) ?></strong> s.d. <strong><?php echo date("d F Y", strtotime($jadwal->selesai_audit)) ?></strong> untuk para <?php echo $jadwal->role ?></li>
                        </div>
                    <?php } else {?>
                        <div class="alert alert-danger alert-dismissable">
                            <li> Tanggal Audit Matakuliah: <strong><?php echo date("d F Y", strtotime($jadwal->mulai_audit)) ?></strong> s.d. <strong><?php echo date("d F Y", strtotime($jadwal->selesai_audit)) ?></strong> untuk para <?php echo $jadwal->role ?> sudah berakhir</li>
                        </div>
                    <?php } ?>
                <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox"> 
                <div class="ibox-title">
                    <h5>Form Audit Mata Kuliah</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form action="<?php echo base_url().'audit_ps/act_audit_matkul'?>" method="post">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label"><strong>Program Studi *</strong></label>
                            <div class="col-lg-10">
                                <input type="text" disabled value="<?php echo $tpm_prodi['program_studi']?>" placeholder="Program Studi" class="form-control">
                                <input type="hidden" name="prodi_id" value="<?php echo $tpm_prodi['prodi_id']?>">
                                <input type="hidden" name="fakultas_id" value="<?php echo $tpm_prodi['fakultas_id']?>">
                                <input type="hidden" name="jadwal_id" value="<?php echo $jadwal->id_jadwal?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label"><strong>Fakultas *</strong></label>
                            <div class="col-lg-10">
                                <input type="text" disabled value="<?php echo $tpm_prodi['nama_fakultas']?>" placeholder="Fakultas" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label"><strong>Pilih Instrumen *</strong></label>
                            <div class="col-lg-10">
                                <select id="borang_id" name="borang_id" data-placeholder="Pilih Matakuiliah..." class="form-control" required>
                                    <?php foreach($borang as $row):?>
                                        <?php if ($row['jenis_audit_id'] == "1" ){?>   
                                            <option value="<?php echo $row['id_jenis_borang']?>"><?php echo $row['jenis_borang']?></option>
                                             
                                        <?php } ?>
                                    <?php endforeach;?>
                                </select>
                                <small class="text-success">* Pilih sesuai strata </small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label"><strong>Matakuliah *</strong></label>
                            <div class="col-lg-10">
                                <select id="matkul_id" name="matkul_id" data-placeholder="Pilih Matakuiliah..." class="matkul" required>
                                    <option value=""></option>
                                    <?php foreach($matakuliah as $row):?>
                                        <?php if ($tpm_prodi['prodi_id'] == $row['prodi_id'] ){?>
                                            <option  value="<?php echo $row['id_mata_kuliah'];?>"><?php echo $row['kode_mk'];?> - <?php echo $row['nama_mk'];?> (<?php echo $row['sks_teori'];?> - <?php echo $row['sks_prak'];?>) Kurikulum <?php echo $row['kurikulum'] ?></option>
                                        <?php } ?>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <p>
                            <strong>Dosen Pengampu</strong><br>
                            <small class="text-success">*) dapat memilih lebih dari satu dosen pengampu, dan dosen penanggung jawab di letakan pada posisi pertama </small>
                        </p>
                        <div class="form-group thing">
                            <div class="skiller">
                                <div class="partner">
                                    <select id="dosen_id" name="dosen_id[]" data-placeholder="Pilih Dosen PJ..." class="matkul" multiple required>
                                        <?php foreach($dosen as $row):?>
                                            <option  value="<?php echo $row['id'];?>"><?php echo $row['nama'];?> </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>      
        </div>
    </div>
</div>

<script language="JavaScript" type="text/javascript" src="<?php echo base_url("assets/js/plugins/select2/select2.full.min.js");?>"></script>

<?php if ($this->session->flashdata('success')): ?>
<script>
$(document).ready(function(){
    swal({
        type : "success",
        title: "Success",
        text: "Your request has been completed Successfully! Silakan kemenu daftar audit untuk mengisi borang.",
        showConfirmButton: false,
        timer: 4000,
    });
});   
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('belum')): ?>
<script>
$(document).ready(function(){
    swal({
        type : "error",
        title: "Oops!",
        text: "Waktu Audit belum dimulai!",
        showConfirmButton: false,
        timer: 4000,
    });
});   
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('tutup')): ?>
<script>
$(document).ready(function(){
    swal({
        type : "error",
        title: "Oops!",
        text: "Waktu Audit telah berakhir!",
        showConfirmButton: false,
        timer: 4000,
    });
});   
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('tidak')): ?>
<script>
$(document).ready(function(){
    swal({
        type : "error",
        title: "Oops!",
        text: "Data Sudah ada dalam audit!",
        showConfirmButton: false,
        timer: 4000,
    });
});   
</script>
<?php endif; ?>

<script>
$(document).ready(function(){
    $('.matkul').select2({
        width: "100%",
        minimumInputLength: 3, 
    });
});
</script>





