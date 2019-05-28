<div class="ibox-content profile-content">
<form id="editupt" method="post" class="form-horizontal">
    <div class="form-group">
        <label class="font-normal"><b>Unit Pelaksana Teknis</b></label>
            <input type="hidden" value="<?=$data_upt['id_upt']?>" id="idupt" name="id_upt" class="form-control"  >
            <input id="edit_unit_pelaksana" name="unit_pelaksana" value="<?=$data_upt['unit_pelaksana']?>" name="unit_pelaksana" type="text" placeholder="Unit Pelaksana" class="form-control">
    </div>
    
    <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
</div>