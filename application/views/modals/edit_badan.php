<div class="ibox-content profile-content">
<form id="editbadan"class="form-horizontal">
    <div class="form-group">
        <label class="font-normal"><b>Badan Pengelola</b></label>
            <input type="hidden" value="<?=$data_badan['id_badan']?>" id="idbadan" name="id_badan" class="form-control"  >
            <input id="edit_nama_badan" name="nama_badan" value="<?=$data_badan['nama_badan']?>" type="text" placeholder="Badan Pengelola" class="form-control">
    </div>
    
    <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
</div>