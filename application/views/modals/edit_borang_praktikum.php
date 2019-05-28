<div class="ibox-content profile-content">
    <form  id="edit_borang_praktikum"  class="form-horizontal">
        <div class="form-group">
            <label><b>Bobot</b></label> 
            <input id="idborangpraktikum" type="hidden" value="<?=$borang['id_borang_praktikum']?>">
            <input  id="edit_bobot_praktikum" name="bobot" type="number" value="<?=$borang['bobot']?>" placeholder="bobot" class="form-control">
        </div>

        <div class="form-group">
            <label><b>Pertanyaan</b></label> 
            <textarea id="edit_pertanyaan_praktikum" name="pertanyaan" type="text" placeholder="pertanyaan" class="form-control"><?=$borang['pertanyaan']?></textarea>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>