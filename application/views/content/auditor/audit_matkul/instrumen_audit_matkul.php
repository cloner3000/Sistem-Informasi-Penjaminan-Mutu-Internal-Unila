<div id="audit-matkul">
    <form action="<?php echo base_url().'auditor/save_jawaban'?>" method="post">
        <input type="hidden" value="<?php echo $audit_matkul['id_audit_mata_kuliah']?>" name="id_audit_mata_kuliah">
        <input name="sks_teori" type="hidden" value="<?=$audit_matkul['sks_teori']?>" >
        <input name="sks_prak" type="hidden" value="<?=$audit_matkul['sks_prak']?>" >
        <input name="total_sks" type="hidden" value="<?=$audit_matkul['total_sks']?>" >
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content">
                <div class="row bg-success"> 
                    <div class="col-lg-1">
                        <img alt="image" height="77" width="77" src="<?php echo base_url("assets/img/unila.png");?>"/>
                        <h4 class="text-center">JUDUL</h4>
                        <h4 class="text-center">AREA</h4>
                    </div>
                        <div class="col-lg-8">
                            <h1><b>UNIVERSITAS LAMPUNG | DOKUMEN LEVEL</b></h1>
                            <h3><b>Borang Monitoring & Evaluasi</b></h3>
                            <h4>: <?php echo $audit_matkul['judul_borang']?></h4>
                            <h4>: <?php echo $audit_matkul['area_borang']?></h4>
                        </div>
                    <div class="col-lg-3">
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label"><b>Kode</b></label>
                            <div class="col-lg-6">
                                <h4>: <?php echo $audit_matkul['kode']?></h4>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label"><b>Tanggal</b></label>
                            <div class="col-lg-6">
                                <h4>: <?php echo $audit_matkul['tanggal']?></h4>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label"><b>No. Revisi</b></label>
                            <div class="col-lg-6">
                                <h4>: <?php echo $audit_matkul['no_revisi']?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="text-center"><strong>BORANG PERKULIAHAN</strong></h3>
                <div class="row">
                    <div class="col-lg-1">
                        <h5>KOMAK</h5>
                        <h5>NAMA MK</h5>
                        <h5>PRODI</h5>
                        <h5>FAKULTAS</h5>
                    </div>
                    <div class="col-lg-8">
                        <h5>: <?php echo $audit_matkul['kode_mk']?></h5>
                        <h5>: <?php echo $audit_matkul['nama_mk']?></h5>
                        <h5>: <?php echo $audit_matkul['program_studi']?></h5>
                        <h5>: <?php echo $audit_matkul['nama_fakultas']?></h5>
                    </div>
                    <div class="col-lg-3">
                        <h5>Semester</h5>
                        <p><?php echo $audit_matkul['semester']?></p>
                        <h5>Tahun Akademik</h5>
                        <p><?php echo $audit_matkul['tahun_akademik']?></p>
                    </div>
                </div>
            </div>
        <div class="ibox-content">
            <input name="jenis_borang" type="hidden" value="<?=$audit_matkul['borang_id']?>" >
            <?php $noo = 0; ?>
            <?php foreach($aspek as $as):?>
            <?php if( $audit_matkul['borang_id'] == $as['jenis_borang_id']) { ?>
            <?php $noo++ ?>
            <table id="aspek<?php $as['jenis_borang_id'] ?>" class="table">
                <thead>
                    <tr class="bg-info">
                        <th class="text-center">No</th>
                        <th class="text-center">Pertanyaan</th>
                        <th class="text-center">Bobot</th>
                        <th class="text-center">Pilihan</th>
                        <th class="text-center">Skor</th>
                    </tr>
                    <tr class="bg-info">
                        <th class="text-center"><?php echo $noo ?></th>
                        <th class="text-center" colspan="4"><?php echo $as['aspek_penilaian']?> (<?php echo $as['max_bobot']?>)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0; ?>
                    <?php foreach($borang as $bo):?>
                    <?php if( $as['id_aspek_penilaian'] == $bo['aspek_penilaian_id'] ) { ?>
                    <?php $no++?>
                    <tr>
                        <td class="text-center"><?php echo $no ?></td>
                            <td style="word-wrap: break-word;min-width: 350px;max-width: 350px;">
                            <?php echo $bo['pertanyaan']?> <br>
                            <p></p>
                            <?php $id = 0; ?>
                            <?php foreach($jawaban as $ja):?>
                                <?php if( $bo['id_borang'] == $ja['borang_id']) { ?>
                                <?php $id++?>
                                    <div class="i-checks">
                                        <input id="<?php echo $id ?><?php echo $bo['id_borang'] ?>" type="radio" onclick="sumsks(<?php echo $bo['id_borang'] ?>)" name="jawaban<?php echo $bo['id_borang'] ?>" class="flat-red"> <?php echo $ja['opsi'] ?> <br>
                                    </div>
                                <?php }?>
                            <?php endforeach;?>  
                            <hr>
                            <?php foreach($hasil_jawaban as $has):?>
                                <?php if($bo['id_borang'] == $has['borang_id']): ?>
                                    <p><strong>Jawaban TPM : <?php echo $has['jawaban']?></strong></p>
                                <?php endif; ?>
                            <?php endforeach;?>  
                        </td>
                        <td class="text-center">
                            <input type="hidden"  value="<?=$bo['bobot']?>"  disabled="true"  class="form-control" id="kul<?php echo $bo['id_borang'] ?>" onkeyup="sumsks(<?php echo $bo['id_borang'] ?>);">
                            <?php echo $bo['bobot']?>
                        </td>
                        <td style="min-width: 20px;max-width: 20px;" class="text-center">
                            <?php foreach($hasil_jawaban as $has):?>
                                <?php if($bo['id_borang'] == $has['borang_id']): ?>
                                    <input value="<?php echo $has['jawaban']?>" name="jawaban_teori[]" type="hidden">
                                    <input value="<?php echo $has['jawaban']?>" name="jawaban_teori_auditor[]" id="jawab<?php echo $bo['id_borang'] ?>" class="text-center form-control b-r-lg bg-white" type="text">
                                <?php endif; ?>
                            <?php endforeach;?>  
                        </td>
                        <td style="min-width: 30px;max-width: 30px;" class="text-center">
                            <input  value="<?=$bo['id_borang']?>" name="borang_id[]" type="hidden">
                            <input  value="<?=$as['id_aspek_penilaian']?>" name="aspek_penilaian_id[]" type="hidden">
                            <input  value="<?=$audit_matkul['id_audit_mata_kuliah']?>" name="audit_mata_kuliah_id[]" type="hidden">
                            <input  value="<?=$audit_matkul['borang_id']?>" name="jenis_borang_id[]" type="hidden">
                            
                            <?php foreach($hasil_jawaban as $has):?>
                                <?php if($bo['id_borang'] == $has['borang_id']): ?>
                                    <input value="<?php echo $has['sekor']?>" type="hidden"  name="skor_teori[]">
                                    <input value="<?php echo $has['sekor']?>" type="text"  name="skor_teori_auditor[]"  id="total<?php echo $bo['id_borang'] ?>" class="subtotal<?php echo $as['id_aspek_penilaian'] ?> text-center form-control b-r-lg bg-white ">
                                <?php endif; ?>
                            <?php endforeach;?> 
                        </td>
                    </tr>
                    <?php }?>
                    <?php endforeach;?>  
                </tbody>
            </table>
            <?php }?>
            <?php endforeach;?>   
        </div>
        </div>
        <?php if($audit_matkul['sks_prak'] > 0):?>
            <?php $this->view('content/auditor/audit_matkul/instrumen_audit_matkul_p');?>
        <?php endif;?>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div>
                <div class="ibox-title">
                    <h2 class="text-primary"><strong>Pastikan semua borang terisi...</strong> </h2>
                </div>
                <div class="ibox-content">
                    <button class="btn btn-info">Info</button>
                    <button id="submit" name="submit" class="btn btn-success">Selesai</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php $this->view('rumus/rumus');?>
<?php $this->view('rumus/rumus_p');?>

