<div class="ibox-content profile-content">
   
    <h4>Kepala Pusat Lembaga</h4>
    <p><i class="fa fa-user-circle-o"></i>  <?php echo $kalembaga->nama_kalembaga; ?></p>
    <h4>NIP</h4>
    <p><i class="fa fa-sort-numeric-asc"></i>  <?php echo $kalembaga->nip_kalembaga; ?></p>
    <h4>Mulai Menjabat</h4>
    <p><i class="fa fa-calendar"></i>  <?php echo date("d F Y", strtotime($kalembaga->mulai_jabatan)); ?></p>
    <h4>Selesai Menjabat</h4>
    <p><i class="fa fa-calendar"></i>  <?php echo date("d F Y", strtotime($kalembaga->selesai_jabatan)); ?></p>
    

</div>