<div class="wrapper wrapper-content animated fadeIn">
    <?php if ($this->session->userdata('role_id') == '2') {?>
        <?php foreach ($tpm_prodi as $tpmp):?>
            <?php if ($this->session->userdata('id_user') == $tpmp['user_id'] ) {?>
                <?php if ($tpmp['nama_tpm_prodi'] == false ){?>
                    <div class="alert alert-primary alert-dismissable">
                        Hallo <?php echo $this->session->userdata('username')?> sebagai Tim Penjamin Mutu <?php echo $tpmp['program_studi']?> lengkapi Biodata anda<a class="alert-link" href="<?php echo base_url().'tpm/tpm_prodi/detail_user/'.$this->session->userdata('id_user')?>"> <b>Klik Disini</b></a>.
                    </div>
                <?php }?>
                <?php if ($tpmp['nama_tpm_prodi'] == true ){?>
                    <div class="alert alert-success alert-dismissable">
                        Selamat Datang <b><?php echo $tpmp['nama_tpm_prodi']?></b> sebagai Tim Penjamin Mutu <b><?php echo $tpmp['program_studi']?></b> di Sistem Informasi Penjaminan Mutu Internal Universitas Lampung
                    </div>
                <?php }?>
            <?php }?>
        <?php endforeach;?>
    <?php }?>
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="m-b-md">
                                    <h2><?php echo $jadwal->jenis_audit?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <dl class="row mb-1">
                                    <div class="col-sm-4"><dt>Status Pengisian</dt> </div>
                                        <?php $start_date = strtotime($jadwal->mulai_audit);?>
                                        <?php  $end_date = strtotime($jadwal->selesai_audit);?>
                                        <?php $todays_date = strtotime(date("Y-m-d"));?>
                                            <?php if ($todays_date >= $start_date && $todays_date  <= $end_date ) { ?> 
                                                <div class="col-sm-5"><dd class="mb-1"><span class="label label-primary">Sedang Berlangsung</span></dd></div>
                                            <?php } else { ?> 
                                                <?php if($todays_date < $start_date ) { ?>
                                                    <div class="col-sm-5"><dd class="mb-1"><span class="label label-warning">Belum di mulai</span></dd></div>
                                                <?php } else {?>
                                                    <div class="col-sm-5"><dd class="mb-1"><span class="label label-danger">Sudah berakhir</span></dd></div>
                                                <?php } ?>
                                            <?php } ?>
                                </dl>
                                <dl class="row mb-1">
                                    <div class="col-sm-4"><dt>Semester</dt> </div>
                                    <div class="col-sm-5"><dd class="mb-1">: <?php echo $jadwal->semester ?></dd> </div>
                                </dl>
                                <dl class="row mb-1">
                                    <div class="col-sm-4"><dt>Tahun Akademik</dt> </div>
                                    <div class="col-sm-5"> <dd class="mb-1">: <?php echo $jadwal->tahun_akademik ?></dd></div>
                                </dl>
                            </div>
                            <div class="col-lg-5">
                                <dl class="row mb-0">
                                    <div class="col-sm-3">
                                        <dt>Auditor :</dt>
                                    </div>
                                    <div class="col-sm-8">
                                    <?php $no = 0;?>
                                    <?php foreach($auditor as $au):?>
                                    <?php $no++;?>
                                        <?php if ($au != 0){?>
                                            <dd class="mb-0"><?php echo $no?>. <?php echo $au['nama_auditor'] ?></dd>
                                        <?php } else{ ?>
                                            <dd class="mb-0">belum di setting</dd>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                    </div>
                                </dl>
                            </div>
                            <div class="col-lg-3" id="cluster_info">
                                <dl class="row mb-0">
                                    <div class="col-sm-6 text-sm-right">
                                        <dt>Mulai:</dt>
                                    </div>
                                    <div class="col-sm-6 text-sm-left">
                                        <dd class="mb-1"><?php echo date("d F Y", strtotime($jadwal->mulai_audit)) ?></dd>
                                    </div>
                                </dl>
                                <dl class="row mb-0">
                                    <div class="col-sm-6 text-sm-right">
                                        <dt>Selesai:</dt>
                                    </div>
                                    <div class="col-sm-6 text-sm-left">
                                        <dd class="mb-1"> <?php echo date("d F Y", strtotime($jadwal->selesai_audit)) ?></dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <dl class="row mb-0">
                                    <div class="col-sm-1 ">
                                        <dt>Completed </dt>
                                    </div>
                                    <div class="col-sm-8 ">
                                        <dd>
                                            <?php if ($progres_status && $progres != 0) {?>
                                                <?php 
                                                    $percent = 0;
                                                    $total = count($progres);
                                                    $total_status = count($progres_status);
                                                    $percent = $total / $total_status * 100;
                                                ?>
                                                    <div class="progress m-b-1">
                                                        <?php if($percent < 50) {?>
                                                            <div style="width: <?php echo round($percent) ?>%;" class="progress-bar progress-bar-striped progress-bar-animated progress-bar-danger"></div>
                                                        <?php } else{?>
                                                            <div style="width: <?php echo round($percent) ?>%;" class="progress-bar progress-bar-striped progress-bar-animated"></div>
                                                        <?php }  ?>
                                                    </div>
                                            <small>Project completed in <strong><?php echo round($percent) ?>%</strong>. Bertambah ketika auditor mengisi borang.</small> 
                                                <?php } else { ?>
                                                    <small>belum ada data yang di input</small><?php }  ?>
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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