<div class="ibox-content profile-content">
<form id="editprodi"class="form-horizontal">
    <div class="form-group">
        <label class="font-normal"><b>Program Studi</b></label>
            <input type="hidden" value="<?=$data_prodi['id_prodi']?>" id="idprodi" name="id_prodi" class="form-control"  >
            <input id="edit_program_studi" name="program_studi" value="<?=$data_prodi['program_studi']?>" type="text" placeholder="Program Studi" class="form-control">
    </div>
    <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
</div>