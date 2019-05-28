<div class="ibox-content profile-content">
    <h4>Mata Kuliah </h4>
    <p><i class="fa fa-book"></i>  <?php echo $audit_matkul['nama_mk']; ?> (<?php echo $audit_matkul['sks_teori']?> - <?php echo $audit_matkul['sks_prak']?>) Kur. <?php echo $audit_matkul['kurikulum']; ?></p>
    <h4>Jadwal Audit</h4>
    <p>
        <li>Semester <?php echo $audit_matkul['semester']?> Tahun Akademik <?php echo $audit_matkul['tahun_akademik']?></li>
    </p>
   <h4>Dosen Pengampu</h4>
   <p>
    <?php foreach ($dosen_pengampu as $dosen):?>
            <li><?php echo $dosen['nama']?></li>
    <?php endforeach;?>
    </p>    
</div>