<div class="ibox-content profile-content"><div class="ibox-content profile-content">
    <h4><?=$borang['pertanyaan']?></h4>
    <h4 id="bobot" value="<?=$borang['bobot']?>">Bobot <?=$borang['bobot']?></h4>
    <?php foreach ($jawaban as $bissmilah):?>
    <form action="<?php echo base_url('su/borang/act_edit_opsi'); ?>" method="post" class="form-horizontal">
        <div class="form-group">      
                <?php if($borang['id_borang'] == $bissmilah['borang_id']) {?>
                <div class="input-group">
                <input id="id_opsi" type="hidden" value="<?php echo $bissmilah['id_opsi'] ?>" name="id_opsi"> 
                <input id="opsi"  type="text" value="<?php echo $bissmilah['opsi'] ?>" name="opsi" class="form-control"> 
                    <span class="input-group-append"> 
                        <button type="submit" class="ladda-button coba btn btn-primary" data-style="zoom-in"><i class="fa fa-save"></i></button> 
                    </span><br>
                </div>
                <?php } ?>   
        </div>
    </form>
    <?php endforeach;?>
</div>
</div>
<script>

$(document).ready(function (){
  Ladda.bind( '.coba',{ timeout: 2000 });
});
</script>
