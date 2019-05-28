<div class="ibox-content profile-content">
    <form  id="new_kaupt"class="form-horizontal">
        <div class="form-group">
                <label class="font-normal"><b>Kepala Unit Pelaksana Teknis </b></label>
                <input type="hidden" value="<?=$data_upt['id_upt']?>" id="upt_id" name="upt_id" class="form-control"  >
                <input id="new_nama_kaupt" name="nama_kaupt" type="text" placeholder="Kepala Unit Pelaksana Teknis" class="form-control">
        </div>
        <div class="form-group">
                <label class="font-normal"><b>NIP Dekan Satu</b></label>
                <input id="new_nip_kaupt" name="nip_kaupt" type="text" placeholder="NIP Kepala Unit Pelaksana Teknis" class="form-control">
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