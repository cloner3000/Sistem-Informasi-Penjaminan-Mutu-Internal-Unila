<div class="ibox-content profile-content">
   
    <h4>Wakil Dekan Satu</h4>
    <p><i class="fa fa-user-circle-o"></i>  <?php echo $wadek->nama_wadek_satu; ?></p>
    <h4>NIP</h4>
    <p><i class="fa fa-sort-numeric-asc"></i>  <?php echo $wadek->nip_wadek_satu; ?></p>
    <h4>Mulai Menjabat</h4>
    <p><i class="fa fa-calendar"></i>  <?php echo date("d F Y", strtotime($wadek->mulai_jabatan)); ?></p>
    <h4>Selesai Menjabat</h4>
    <p><i class="fa fa-calendar"></i>  <?php echo date("d F Y", strtotime($wadek->selesai_jabatan)); ?></p>
    

</div>