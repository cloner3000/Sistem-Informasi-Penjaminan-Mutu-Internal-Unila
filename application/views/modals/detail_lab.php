<div class="ibox-content profile-content">
    <h4>Kepala Laboratorium</h4>
    <p><i class="fa fa-user-circle-o"></i>  <?php echo $kalab->nama_kalab; ?></p>
    <h4>NIP</h4>
    <p><i class="fa fa-sort-numeric-asc"></i>  <?php echo $kalab->nip_kalab; ?></p>
    <h4>Mulai Menjabat</h4>
    <p><i class="fa fa-calendar"></i>  <?php echo date("d F Y", strtotime($kalab->mulai_jabatan)); ?></p>
    <h4>Selesai Menjabat</h4>
    <p><i class="fa fa-calendar"></i>  <?php echo date("d F Y", strtotime($kalab->selesai_jabatan)); ?></p>
</div>