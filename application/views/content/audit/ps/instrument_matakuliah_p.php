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
                    <label class ="col-lg-5 col-form-label"><b>Tanggal</b></label>
                    <div class ="col-lg-6">
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
                    
    <h3 class="text-center"><strong>BORANG PRAKTIKUM</strong></h3>
                        
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
            <?php foreach($praktikum as $as):?>
            <?php if( $audit_matkul['borang_id'] == $as['jenis_borang_praktikum_id']) { ?>
            <?php $noo++ ?>
                <table id="aspek" class="table">
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
                        <?php foreach($borang_praktikum as $bo):?>
                        <?php if( $as['id_aspek_penilaian_p'] == $bo['aspek_penilaian_praktikum_id'] ) { ?>
                        <?php $no++?>
                        <tr>
                            <td class="text-center"><?php echo $no ?></td>
                            <td style="word-wrap: break-word;min-width: 350px;max-width: 350px;">
                            <?php echo $bo['pertanyaan']?> <br>
                            <p></p>
                            <?php $id = 0; ?>
                            <?php foreach($jawaban_praktikum as $ja):?>
                            <?php if( $bo['id_borang_praktikum'] == $ja['borang_praktikum_id']) { ?>
                            <?php $id++?>
                                <div class="i-checks">
                                    <input id="<?php echo $id ?>p<?php echo $bo['id_borang_praktikum'] ?>" type="radio" onclick="rumus_praktikum(<?php echo $bo['id_borang_praktikum'] ?>)" name="jawaban<?php echo $bo['id_borang_praktikum'] ?>" class="flat-red"> <?php echo $ja['opsi'] ?> <br>
                                </div>
                            <?php }?>
                            <?php endforeach;?>  
                            </td>
                            <td class="text-center">
                                <input type="hidden"  value="<?=$bo['bobot']?>"  disabled="true"  class="form-control" id="kul_p<?php echo $bo['id_borang_praktikum'] ?>" onkeyup="rumus_praktikum(<?php echo $bo['id_borang_praktikum'] ?>);">
                                <?php echo $bo['bobot']?>
                            </td>
                            <td style="min-width: 20px;max-width: 20px;" class="text-center">
                                <input   name="jawaban_praktikum[]" id="jawab_p<?php echo $bo['id_borang_praktikum'] ?>" class="text-center form-control b-r-lg bg-white" type="text">
                            </td>
                            <td style="min-width: 30px;max-width: 30px;" class="text-center">
                                <input  value="<?=$bo['id_borang_praktikum']?>" name="borang_praktikum_id[]" type="hidden">
                                <input  value="<?=$as['id_aspek_penilaian_p']?>" name="aspek_penilaian_p_id[]" type="hidden">
                                <input  type="text"  name="skor_praktikum[]" type="text" id="total_p<?php echo $bo['id_borang_praktikum'] ?>" class="subtotal<?php echo $as['id_aspek_penilaian_p'] ?> text-center form-control b-r-lg bg-white ">
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
