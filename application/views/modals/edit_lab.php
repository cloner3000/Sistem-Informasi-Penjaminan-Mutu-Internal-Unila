<div class="ibox-content profile-content">
<form id="editlab"class="form-horizontal">
    <div class="form-group">
        <label class="font-normal"><b>Laboratorium</b></label>
            <input type="hidden" value="<?=$data_lab['id_lab']?>" id="idlab" name="id_lab" class="form-control"  >
            <input id="edit_nama_lab" name="nama_lab" value="<?=$data_lab['nama_lab']?>" name="nama_fakultas" type="text" placeholder="Laboratorium" class="form-control">
    </div>
    
    <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
</div>