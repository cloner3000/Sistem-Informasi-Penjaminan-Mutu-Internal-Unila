<form id="editfakultas"class="form-horizontal">
    <div class="form-group">
        <label class="font-normal"><b>Fakultas</b></label>
            <input type="hidden" value="<?=$data_fakultas['id_fakultas']?>" id="idfakultas" name="id_fakultas" class="form-control"  >
            <input id="edit_nama_fakultas" name="nama_fakultas" value="<?=$data_fakultas['nama_fakultas']?>" name="nama_fakultas" type="text" placeholder="Fakultas" class="form-control">
    </div>
    <div class="form-group">
        <label class="font-normal"><b>Singkatan</b></label>
            <input id="edit_singkatan_fakultas" name="singkatan_fakultas" value="<?=$data_fakultas['singkatan_fakultas']?>" name="singkatan_fakultas" type="text" placeholder="Singkatan" class="form-control">
    </div>
    
    <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>