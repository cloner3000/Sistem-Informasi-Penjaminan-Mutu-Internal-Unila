<div class="ibox-content profile-content">
    <form  id="edit_aspek_praktikum"  class="form-horizontal">
        <div class="form-group">
            <label><b>Aspek Penilaian</b></label> 
            <input id="id_aspek_praktikum" value="<?php echo $edit_aspek['id_aspek_penilaian_p']?>" type="hidden">
            <input value="<?php echo $edit_aspek['aspek_penilaian']?>" id="edit_aspek_penilaian_praktikum" name="aspek_penilaian" type="text" placeholder="Aspek Penilaian" class="form-control required">
        </div>
        <div class="form-group">
            <label><b>Max Bobot</b></label> 
            <input  value="<?php echo $edit_aspek['max_bobot']?>" id="edit_max_bobot_praktikum" name="max_bobot" type="number" placeholder="bobot" class="form-control required">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>