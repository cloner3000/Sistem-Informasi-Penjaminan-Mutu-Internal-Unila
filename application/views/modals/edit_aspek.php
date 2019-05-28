<div class="ibox-content profile-content">
    <form  id="editaspek"  class="form-horizontal">
        <div class="form-group">
            <label><b>Jenis Borang</b></label> 
            <select class="form-control" name="jenis_borang_id" id="edit_jenis_borang_id">
                <option value="">- Jenis Borang -</option>
                <?php foreach($jenis_borang as $row):?>
                <option  value="<?php echo $row['id_jenis_borang']?>"><?php echo $row['jenis_borang'] ?> <?php echo $row['tahun']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label><b>Aspek Penilaian</b></label> 
            <input id="idaspek" value="<?php echo $edit_aspek['id_aspek_penilaian']?>" type="hidden">
            <input value="<?php echo $edit_aspek['aspek_penilaian']?>" id="edit_aspek_penilaian" name="aspek_penilaian" type="text" placeholder="Aspek Penilaian" class="form-control required">
        </div>
        <div class="form-group">
            <label><b>Max Bobot</b></label> 
            <input  value="<?php echo $edit_aspek['max_bobot']?>" id="edit_max_bobot" name="max_bobot" type="number" placeholder="bobot" class="form-control required">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>