<div class="ibox-content profile-content">
    <form  id="editborang"  class="form-horizontal">
        <div class="form-group">
            <label><b>Bobot</b></label> 
            <input id="idborang" type="hidden" value="<?=$borang['id_borang']?>">
            <input  id="edit_bobot" name="bobot" type="number" value="<?=$borang['bobot']?>" placeholder="bobot" class="form-control">
        </div>

        <div class="form-group">
            <label><b>Pertanyaan</b></label> 
            <textarea id="edit_pertanyaan" name="pertanyaan" type="text" placeholder="pertanyaan" class="form-control"><?=$borang['pertanyaan']?></textarea>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>