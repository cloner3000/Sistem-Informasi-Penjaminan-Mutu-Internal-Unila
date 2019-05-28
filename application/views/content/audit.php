<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-8">
        <form role="form" name="_form" method="post" id="_form">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Borang Ke <span class="label label-primary" id="soalke"></span></h5>
                </div>
                <div class="ibox-content">
                    <?php $no = 1 ?>
                    <?php foreach($borang as $q): ?>
                        <div class="step" id="widget_<?php echo $no?>">
                            <label><?php echo $q['pertanyaan'] ?></label>
                            <?php $val = 0 ?>
                            <?php foreach ($jawaban as $a):?>
                                <?php if($q['id_borang'] == $a['borang_id']) {?>
                                    <?php $val++ ?>
                                    <div class="i-checks">
                                        <input id="<?php echo $val ?><?php echo $q['id_borang'] ?>" type="radio" onclick="sumsks(<?php echo $q['id_borang'] ?>)" name="jawaban<?php echo $q['id_borang'] ?>" class="flat-red"> <?php echo $a['opsi'] ?> <br>
                                    </div>
                                <?php } ?>
                            <?php endforeach;?>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <input name="skskul" type="hidden"  value="<?=$q['bobot']?>"  disabled="true"  class="form-control" id="kul<?php echo $q['id_borang'] ?>" onkeyup="sumsks(<?php echo $q['id_borang'] ?>);">
                                <input name="total" type="text" class="form-control col-md-2" disabled="true" id="total<?php echo $q['id_borang'] ?>">
                                <input name="jawab" type="text" class="form-control col-md-2" disabled="true" id="jawab<?php echo $q['id_borang'] ?>">
                            </div>
                        </div>
                    <?php $no++ ?>
                    <?php endforeach; ?>
                </div>
                <div class="ibox-content">
                    <div calss="form-group row">
                        <div class="col-sm-11 col-sm-offset-2">
                            <button type="button" class=" action back btn btn-danger" rel="0" onclick="return back();">Kembali</button>
                            <button type="button" class="action next btn btn-primary" rel="2" onclick="return next();">Selanjutnya</button>
                            <button type="submit" class="btn btn-success ">Selesai</button>
                            <input type="hidden" name="jml_soal" value="<?php echo $no; ?>">
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
        </div>
        <div class="col-lg-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Navigasi</h5>
                </div>
                <?php foreach($aspek as $as): ?>
                <div class="ibox-content">
                    <div>
                        <h4><?php echo $as['standar'] ?> (<?php echo $as['max_bobot'] ?>)</h4>
                        <?php $no = 1 ?>
                        <?php foreach($borang as $q): ?>
                            <?php if($q['aspek_penilaian_id'] == $as['id_aspek_penilaian']) {?>
                                <button type="button" class="btn btn-danger" id="soalke"  onclick="return buka(<?php echo $no?>);"><?php echo $no?></button>
                            <?php } ?>
                            <?php $no++ ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
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
                        document.getElementById('jawab'+a).value = "a";
                    }
                }else if (button2.checked) {
                    var result = parseInt(kul) * parseInt(3)/ parseInt(4);
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                        document.getElementById('jawab'+a).value = "b";
                    }
                }

                if (button3.checked){
                    var result = parseInt(kul) * parseInt(2)/ parseInt(4);
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                        document.getElementById('jawab'+a).value = "c";
                    }
                }else if (button4.checked) {
                    var result = parseInt(kul) / (4.0);
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                        document.getElementById('jawab'+a).value = "d";
                    }
                }

                if (button5.checked){
                    var result = 0;
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                        document.getElementById('jawab'+a).value = "e";
                    }
                }

            }

</script>


