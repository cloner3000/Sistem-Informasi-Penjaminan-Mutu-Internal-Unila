<div class="ibox-content profile-content">
   
    <h4>Kepala Unit Pelaksana Teknis</h4>
    <p><i class="fa fa-user-circle-o"></i>  <?php echo $kaupt->nama_kaupt; ?></p>
    <h4>NIP</h4>
    <p><i class="fa fa-sort-numeric-asc"></i>  <?php echo $kaupt->nip_kaupt; ?></p>
    <h4>Mulai Menjabat</h4>
    <p><i class="fa fa-calendar"></i>  <?php echo date("d F Y", strtotime($kaupt->mulai_jabatan)); ?></p>
    <h4>Selesai Menjabat</h4>
    <p><i class="fa fa-calendar"></i>  <?php echo date("d F Y", strtotime($kaupt->selesai_jabatan)); ?></p>
    

</div>