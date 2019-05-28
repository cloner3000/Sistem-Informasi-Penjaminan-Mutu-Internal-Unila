<div class="row wrapper border-bottom white-bg page-heading">

        <img height="200px" width="1100x"src="<?php echo base_url("assets/img/kuliah.png");?>" alt="unila" >

</div>
<div class="wrapper wrapper-content animated fadeInRight">
        <?php foreach ($aspek as $stan): ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h3><?php echo $stan['standar']; ?> <span class="label label-primary"><?php echo $stan['max_bobot']; ?></span></h3>
                        </div>
                        <div class="ibox-content">
                        
                            <table class="instrumen_matkul table table-stripped toggle-arrow-tiny">
                                <thead>
                                <tr>
                                    <th>No</th>  
                                    <th data-toggle="true">Pertanyaan</th>
                                    <th>Bobot</th>                                  
                                    <th data-hide="all">Jawaban</th>
                                    <th>Skor</th>    
                                </tr>
                                
                                </thead>
                                <tbody>
                                <?php $no = 0;?>
                                <?php foreach ($borang as $bor): ?>
                                <?php if($stan['id_aspek_penilaian'] == $bor['aspek_penilaian_id']) {?>
                                <tr>
                                <?php $no++?>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $bor['pertanyaan']; ?></td>
                                    <td>
                                    <input name="skskul" type="hidden"  value="<?=$bor['bobot']?>"  disabled="true"  class="form-control" id="kul<?php echo $bor['id_borang'] ?>" onkeyup="sumsks(<?php echo $bor['id_borang'] ?>);">
                                        <?php echo $bor['bobot']; ?>
                                    </td>
                                    <td>
                                        <?php $no = 0; ?>
                                        <?php foreach ($jawaban as $bissmilah):?>
                                        <?php if($bor['id_borang'] == $bissmilah['borang_id']) {?>
                                            <?php $no++ ?> 
                                            <div class="i-checks">
                                                <input id="<?php echo $no ?><?php echo $bor['id_borang'] ?>"   onclick="sumsks(<?php echo $bor['id_borang'] ?>)" type="radio" name="jawaban<?php echo $no ?><?php echo $bor['id_borang'] ?>" class="flat-red"> <?php echo $bissmilah['opsi'] ?> <br>
                                            </div>
                                        <?php } ?>
                                        <?php endforeach;?>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input name="total" type="text" class="form-control" disabled="true" id="total<?php echo $bor['id_borang'] ?>">
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3"><h3 class="float-right">Sub Total <?php echo $stan['standar']; ?></h3></th>  
                                        <th ><h3>123</h3></th>    
                                    </tr>
                                 
                                </tfoot>
                            </table>
                        
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
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
                    }
                }else if (button2.checked) {
                    var result = parseInt(kul) * parseInt(3)/ parseInt(4);
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                    }
                }

                if (button3.checked){
                    var result = parseInt(kul) * parseInt(2)/ parseInt(4);
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                    }
                }else if (button4.checked) {
                    var result = parseInt(kul) / (4.0);
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                    }
                }

                if (button5.checked){
                    var result = 0;
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                    }
                }
                //   var fix1 = angka.toFixed(4);
            }

</script>