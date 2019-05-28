<div class="wrapper wrapper-content animated fadeIn">
<?php if ($this->session->userdata('role_id') == '3') {?>
        <?php foreach ($auditor as $ai):?>
            <?php if ($this->session->userdata('id_user') == $ai['user_id'] ) {?>
                <?php if ($ai['nama_auditor'] == false ){?>
                    <div class="alert alert-primary alert-dismissable">
                        Hallo <?php echo $this->session->userdata('username')?> sebagai Auditor lengkapi Biodata anda<a class="alert-link" href="<?php echo base_url().'auditor/detail_user/'.$this->session->userdata('id_user')?>"> <b>Klik Disini</b></a>.
                    </div>
                <?php }?>
                <?php if ($ai['nama_auditor'] == true ){?>
                    <div class="alert alert-success alert-dismissable">
                        Selamat Datang <b><?php echo $ai['nama_auditor']?></b> sebagai Auditor di E-LP3M Universitas Lampung
                    </div>
                <?php }?>
            <?php }?>
        <?php endforeach;?>
    <?php }?>
</div>

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
        text: "Username sudah ada, gunakan yang lain!",
        showConfirmButton: false,
        timer: 4000,
    });
});   
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('berhasil')): ?>
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