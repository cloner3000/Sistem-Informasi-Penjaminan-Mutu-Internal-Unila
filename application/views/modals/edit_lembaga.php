<div class="ibox-content profile-content">
<form id="editlembaga"class="form-horizontal">
    <div class="form-group">
        <label class="font-normal"><b>Pusat Lembaga</b></label>
            <input type="hidden" value="<?=$data_lembaga['id_pusat_lembaga']?>" id="idlembaga" name="id_fakultas" class="form-control"  >
            <input id="edit_pusat_lembaga" name="pusat_lembaga" value="<?=$data_lembaga['pusat_lembaga']?>" type="text" placeholder="Pusat Lembaga" class="form-control">
    </div>
    <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
</div>