<div class="ibox-content profile-content">
    <div class="row">
        <div class="col-lg 5">
            <h3>Hasil Skor TPMP</h3>
            <?php foreach($hasil as $has): ?>
                <cite title="" data-original-title=""><?php echo $has['hasil_audit_matkul_tpm'] ?></cite>
            <?php endforeach;?>
            <hr>
            <h3>Rincian Skor</h3>
            <table class="table table-striped">
                <tbody>
                    <?php foreach($aspek as $as):?>
                        <?php if($as['jenis_borang_id'] == $audit_matkul['borang_id']): ?>
                            <tr>
                                <td><?php echo $as['aspek_penilaian']?> (<?php echo $as['max_bobot']?>)</td>
                                <?php $sum = 0; ?>    
                                    <?php foreach($hasil_jawaban as $has): ?>
                                        <?php if($has['aspek_penilaian_id'] == $as['id_aspek_penilaian']):?>
                                            <?php $sum += $has['sekor'] ?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                <td><?php echo $sum ?></td>
                            </tr>
                        <?php endif;?>   
                    <?php endforeach;?>
                </tbody>
                <tfoot class="bg-primary">
                    <tr>
                        <td><strong>Total</strong></td>
                        <?php $total_teori = 0;?>
                        <?php foreach($hasil_jawaban as $su): ?>
                            <?php $total_teori += $su['sekor'] ?>
                        <?php endforeach;?>
                        <td><strong><?php echo $total_teori ?></strong></td>
                    </tr>
                </tfoot>
            </table>
            
            <?php if($audit_matkul['sks_prak'] > 0):?>
            <hr>
            <h3>Rincian Skor (Praktikum)</h3>
            <table class="table table-striped">
                <tbody>
                    <?php foreach($praktikum as $as):?>
                        <?php if($as['jenis_borang_praktikum_id'] == $audit_matkul['borang_id']): ?>
                            <tr>
                                <td><?php echo $as['aspek_penilaian']?> (<?php echo $as['max_bobot']?>)</td>
                                <?php $sum = 0; ?>    
                                    <?php foreach($hasil_jawaban_p as $has): ?>
                                        <?php if($has['aspek_penilaian_p_id'] == $as['id_aspek_penilaian_p']):?>
                                            <?php $sum += $has['sekor'] ?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                <td><?php echo $sum ?></td>
                            </tr>
                        <?php endif;?>
                    <?php endforeach;?>
                </tbody>
                <tfoot class="bg-primary">
                    <tr>
                        <td><strong>Total</strong></td>
                        <?php $total_prak = 0;?>
                        <?php foreach($hasil_jawaban_p as $su): ?>
                            <?php $total_prak += $su['sekor'] ?>
                        <?php endforeach;?>
                        <td><strong><?php echo $total_prak ?></strong></td>
                    </tr>
                </tfoot>
            </table>
            <hr>
            <h2><strong>Rincian Perhitungan</strong></h2>
            <p><?php echo $audit_matkul['kode_mk']?> <?php echo $audit_matkul['nama_mk']?> Kurikulum <?php echo $audit_matkul['kurikulum']?></p>
            <li><?php echo $audit_matkul['sks_teori']?> sks teori</li>
            <li><?php echo $audit_matkul['sks_prak']?> sks praktikum</li>
            <p></p>
            <pre>Rumus : (<?php echo $total_teori?> * (<?php echo $audit_matkul['sks_teori']?> / <?php echo $audit_matkul['total_sks'] ?>)) + (<?php echo $total_prak?> * (<?php echo $audit_matkul['sks_prak']?> / <?php echo $audit_matkul['total_sks'] ?>)) </pre>
            <?php foreach($hasil as $has): ?>
            <h2>hasil : <strong><?php echo $has['hasil_audit_matkul_tpm'] ?></strong></h2>
            <?php endforeach;?>
            <?php endif; ?>
        </div>
        <div class="col-lg 5"> 
            <h3>Hasil Skor Auditor</h3>
            <?php foreach($hasil as $has): ?>
                <?php if ( $has['hasil_audit_matkul_auditor'] == "0.00") {?>
                    <cite title="" data-original-title="">Belum ada skor atau belum di diaudit oleh auditor</cite>
                <?php } else {?>
                            <cite title="" data-original-title=""><?php echo $has['hasil_audit_matkul_auditor'] ?></cite>
                        <?php } ?>
            <?php endforeach;?>
            <hr>
            <h3>Rincian Skor</h3>
            <table class="table table-striped">
                <tbody>
                    <?php foreach($aspek as $as):?>
                        <?php if($as['jenis_borang_id'] == $audit_matkul['borang_id']): ?>
                            <tr>
                                <td><?php echo $as['aspek_penilaian']?> (<?php echo $as['max_bobot']?>)</td>
                                <?php $sum = 0; ?>    
                                    <?php foreach($hasil_jawaban as $has): ?>
                                        <?php if($has['aspek_penilaian_id'] == $as['id_aspek_penilaian']):?>
                                            <?php $sum += $has['sekor_auditor'] ?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                <td><?php echo $sum ?></td>
                            </tr>
                        <?php endif;?>   
                    <?php endforeach;?>
                </tbody>
                <tfoot class="bg-primary">
                    <tr>
                        <td><strong>Total</strong></td>
                        <?php $total_teori = 0;?>
                        <?php foreach($hasil_jawaban as $su): ?>
                            <?php $total_teori += $su['sekor_auditor'] ?>
                        <?php endforeach;?>
                        <td><strong><?php echo $total_teori ?></strong></td>
                    </tr>
                </tfoot>
            </table>

            <?php if($audit_matkul['sks_prak'] > 0):?>
            <hr>
            <h3>Rincian Skor (Praktikum)</h3>
            <table class="table table-striped">
                <tbody>
                    <?php foreach($praktikum as $as):?>
                        <?php if($as['jenis_borang_praktikum_id'] == $audit_matkul['borang_id']): ?>
                            <tr>
                                <td><?php echo $as['aspek_penilaian']?> (<?php echo $as['max_bobot']?>)</td>
                                <?php $sum = 0; ?>    
                                    <?php foreach($hasil_jawaban_p as $has): ?>
                                        <?php if($has['aspek_penilaian_p_id'] == $as['id_aspek_penilaian_p']):?>
                                            <?php $sum += $has['sekor_auditor'] ?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                <td><?php echo $sum ?></td>
                            </tr>
                        <?php endif;?>
                    <?php endforeach;?>
                </tbody>
                <tfoot class="bg-primary">
                    <tr>
                        <td><strong>Total</strong></td>
                        <?php $total_prak = 0;?>
                        <?php foreach($hasil_jawaban_p as $su): ?>
                            <?php $total_prak += $su['sekor_auditor'] ?>
                        <?php endforeach;?>
                        <td><strong><?php echo $total_prak ?></strong></td>
                    </tr>
                </tfoot>
            </table>
            <hr>
            <h2><strong>Rincian Perhitungan</strong></h2>
            <p><?php echo $audit_matkul['kode_mk']?> <?php echo $audit_matkul['nama_mk']?> Kurikulum <?php echo $audit_matkul['kurikulum']?></p>
            <li><?php echo $audit_matkul['sks_teori']?> sks teori</li>
            <li><?php echo $audit_matkul['sks_prak']?> sks praktikum</li>
            <p></p>
            <pre>Rumus : (<?php echo $total_teori?> * (<?php echo $audit_matkul['sks_teori']?> / <?php echo $audit_matkul['total_sks'] ?>)) + (<?php echo $total_prak?> * (<?php echo $audit_matkul['sks_prak']?> / <?php echo $audit_matkul['total_sks'] ?>)) </pre>
            <?php foreach($hasil as $has): ?>
            <h2>hasil : <strong><?php echo $has['hasil_audit_matkul_auditor'] ?></strong></h2>
            <?php endforeach;?>
            <?php endif; ?>
        </div>
    </div>
</div>