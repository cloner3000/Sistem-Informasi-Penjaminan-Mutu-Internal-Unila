<div class="ibox-content profile-content">
   
    <h4>Kepala Program Studi</h4>
    <p><i class="fa fa-user-circle-o"></i>  <?php echo $kaprodi->nama_kaprodi; ?></p>
    <h4>NIP</h4>
    <p><i class="fa fa-sort-numeric-asc"></i>  <?php echo $kaprodi->nip_kaprodi; ?></p>
    <h4>Mulai Menjabat</h4>
    <p><i class="fa fa-calendar"></i>  <?php echo date("d F Y", strtotime($kaprodi->mulai_jabatan)); ?></p>
    <h4>Selesai Menjabat</h4>
    <p><i class="fa fa-calendar"></i>  <?php echo date("d F Y", strtotime($kaprodi->selesai_jabatan)); ?></p>
    

</div>