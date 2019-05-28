<div class="ibox-content profile-content">
    <form  id="new_kalembaga"class="form-horizontal">
        <div class="form-group">
                <label class="font-normal"><b>Kepala Pusat Lembaga </b></label>
                <input type="hidden" value="<?=$data_lembaga['id_pusat_lembaga']?>" id="pusat_lembaga_id" name="pusat_lembaga_id" class="form-control"  >
                <input id="new_nama_kalembaga" name="nama_kalembaga" type="text" placeholder="Kepala Pusat Lembaga" class="form-control">
        </div>
        <div class="form-group">
                <label class="font-normal"><b>NIP Kepala Laboratorium</b></label>
                <input id="new_nip_kalembaga" name="nip_kalembaga" type="text" placeholder="NIP Kepala Pusat Lembaga" class="form-control">
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