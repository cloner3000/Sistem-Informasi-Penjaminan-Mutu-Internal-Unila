<div class="wrapper wrapper-content animated fadeInRight">
    <form action="">
        <div class="ibox-content">
            <div class="row bg-primary"> 
                <div class="col-lg-1">
                    <img alt="image" height="77" width="77" src="<?php echo base_url("assets/img/unila.png");?>"/>
                    <h4 class="text-center">JUDUL</h4>
                    <h4 class="text-center">AREA</h4>
                </div>
                <div class="col-lg-8">
                    <h1><b>UNIVERSITAS LAMPUNG | DOKUMEN LEVEL</b></h1>
                    <h3><b>Borang Monitoring & Evaluasi</b></h3>
                    <h4>: BORANG MONEV PORSES KINERJA LABORATORIUM</h4>
                    <h4>: JURUSAN/BAGIAN</h4>
                </div>  
                <div class="col-lg-3">
                    <div class="form-group row">
                        <label class="col-lg-5 col-form-label"><b>Kode</b></label>
                            <div class="col-lg-3">
                                <h4>: -</h4>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-5 col-form-label"><b>Tanggal</b></label>
                            <div class="col-lg-3">
                                <h4>: -</h4>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-5 col-form-label"><b>No. Revisi</b></label>
                            <div class="col-lg-3">
                                <h4>: -</h4>
                            </div>
                    </div>
                </div>   
            </div>
                <h3 class="text-center"><strong>BORANG LABORATORIUM</strong></h3>
            <div class="row">
                <div class="col-lg-1">
                    <h5>LAB</h5>
                    <h5>JUR/BAG</h5>
                    <h5>FAKULTAS</h5>
                </div>
                <div class="col-lg-8">
                    <h5>: -</h5>
                    <h5>: -</h5>
                    <h5>: -</h5>

                </div>
                <div class="col-lg-3">
                    <h5>Semester</h5>
                    <p>Genap</p>
                    <h5>Tahun Akademik</h5>
                    <p>2017/2018</p>
                </div>
            </div>
        </div>

        <div class="ibox-content">
            <input name="jenis_borang" type="hidden" value="<?=$jenis_borang?>" >
            <?php $noo = 0; ?>
                <?php foreach($aspek as $as):?>
                    <?php if( $jenis_borang == $as['jenis_borang_id']) { ?>
                        <?php $noo++ ?>
                        <table class="table">
                            <thead>
                                <tr class="bg-success">
                                    <th style="vertical-align : middle;text-align:center;" class="text-center" rowspan="2">No</th>
                                    <th style="vertical-align : middle;text-align:center;" class="text-center" rowspan="2">Aspek Penilaian</th>
                                    <th class="text-center">Skor</th>
                                    <th class="text-center" colspan="2">Kepala Lab</th>
                                    <th class="text-center" colspan="2">AI</th>
                                </tr>
                                <tr class="bg-success">
                                    <th class="text-center">Max</th>
                                    <th class="text-center">Nilai</th>
                                    <th class="text-center" >Skor</th>
                                    <th class="text-center">Nilai</th>
                                    <th class="text-center" >Skor</th>
                                </tr>
                                <tr class="bg-success">
                                    <th class="text-center"><?php echo $noo ?></th>
                                    <th class="text-center"><?php echo $as['aspek_penilaian']?> (<?php echo $as['max_bobot']?>)</th>
                                    <th class="text-center" colspan="5"></th>
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
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden"  value="<?=$bo['bobot']?>"  disabled="true"  class="form-control" id="kul<?php echo $bo['id_borang'] ?>" onkeyup="sumsks(<?php echo $bo['id_borang'] ?>);">
                                        <?php echo $bo['bobot']?>
                                    </td>
                                    <td style="min-width: 20px;max-width: 20px;" class="text-center">
                                        <input   name="jawaban[]" id="jawab<?php echo $bo['id_borang'] ?>" class="text-center form-control b-r-lg bg-white" type="text">
                                    </td>
                                    <td style="min-width: 30px;max-width: 30px;" class="text-center">
                                        <input  value="<?=$bo['id_borang']?>" name="borang_id[]" type="hidden">
                                        <input  type="text"  name="skor[]" type="text" id="total<?php echo $bo['id_borang'] ?>" class="subtotal<?php echo $as['id_aspek_penilaian'] ?> text-center form-control b-r-lg bg-white ">
                                    </td>
                                    <td style="min-width: 20px;max-width: 20px;" class="text-center">
                                        <input   name="jawaban[]" id="jawab<?php echo $bo['id_borang'] ?>" class="text-center form-control b-r-lg bg-white" type="text">
                                    </td>
                                    <td style="min-width: 30px;max-width: 30px;" class="text-center">
                                        <input  value="<?=$bo['id_borang']?>" name="borang_id[]" type="hidden">
                                        <input  type="text"  name="skor[]" type="text" id="total<?php echo $bo['id_borang'] ?>" class="subtotal<?php echo $as['id_aspek_penilaian'] ?> text-center form-control b-r-lg bg-white ">
                                    </td>
                                </tr>
                            <?php }?>
                            <?php endforeach;?>  
                            </tbody>
                        </table>
                    <?php }?>
                <?php endforeach;?>
        </div>
    </form>
</div>
<script>
    function sumsks(a) {

        var button1 = document.getElementById('1'+a);
        var button2 = document.getElementById('2'+a);
        var button3 = document.getElementById('3'+a);
        var button4 = document.getElementById('4'+a);
        var button5 = document.getElementById('5'+a);
        //var rows = document.getElementById(tableId).getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;


        var kul = document.getElementById('kul'+a).value;

            if (button1.checked){
                    var result = parseInt(kul) * parseInt(4)/ parseInt(4);
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                        document.getElementById('jawab'+a).value = "A";
                    }
                }else if (button2.checked) {
                    var result = parseInt(kul) * parseInt(3)/ parseInt(4);
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                        document.getElementById('jawab'+a).value = "B";
                    }
                }

                if (button3.checked){
                    var result = parseInt(kul) * parseInt(2)/ parseInt(4);
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                        document.getElementById('jawab'+a).value = "C";
                    }
                }else if (button4.checked) {
                    var result = parseInt(kul) / (4.0);
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                        document.getElementById('jawab'+a).value = "D";
                    }
                }

                if (button5.checked){
                    var result = 0;
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                        document.getElementById('jawab'+a).value = "E";
                    }
                }         
            }

</script>