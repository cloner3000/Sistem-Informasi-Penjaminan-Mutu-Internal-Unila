<div class="ibox-content profile-content">
    <form  id="new_kaprodi"class="form-horizontal">
        <div class="form-group">
                <label class="font-normal"><b>Kepala Program Studi </b></label>
                <input type="hidden" value="<?=$data_prodi['id_prodi']?>" id="prodi_id" name="prodi_id" class="form-control"  >
                <input id="new_nama_kaprodi" name="nama_kaprodi" type="text" placeholder="Kepala Prodi" class="form-control">
        </div>
        <div class="form-group">
                <label class="font-normal"><b>NIP Kepala Program Studi</b></label>
                <input id="new_nip_kaprodi" name="nip_kaprodi" type="text" placeholder="NIP Kepala Prodi" class="form-control">
        </div>
        <div class="form-group">
            <label class="font-normal"><b>Masa Jabatan</b><small class="text-info"></small></label>
                <div class="input-daterange input-group" id="datepicker">
                    <input id="new_mulai_jabatan" name="mulai_jabatan" type="text" class="form-control-sm form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="2019-09-20"/>
                    <span class="input-group-addon">to</span>
                    <input id="new_selesai_jabatan" name="selesai_jabatan" type="text" class="form-control-sm form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="2019-09-20" />
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
        </div>
</form>
</div>