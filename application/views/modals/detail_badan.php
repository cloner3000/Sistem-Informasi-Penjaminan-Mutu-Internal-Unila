<div class="ibox-content profile-content">
    <h4>Kepala Badan Pengelola</h4>
    <p><i class="fa fa-user-circle-o"></i>  <?php echo $kabadan->nama_kabadan; ?></p>
    <h4>NIP</h4>
    <p><i class="fa fa-sort-numeric-asc"></i>  <?php echo $kabadan->nip_kabadan; ?></p>
    <h4>Mulai Menjabat</h4>
    <p><i class="fa fa-calendar"></i>  <?php echo date("d F Y", strtotime($kabadan->mulai_jabatan)); ?></p>
    <h4>Selesai Menjabat</h4>
    <p><i class="fa fa-calendar"></i>  <?php echo date("d F Y", strtotime($kabadan->selesai_jabatan)); ?></p>
</div>