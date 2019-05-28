<form  id="editjadwal"class="form-horizontal">
    <div class="form-group">
        <label class="font-normal"><b>Tanggal Mulai Audit</b><small class="text-info"> (*yyyy-mm-dd")</small></label>
        <div class="input-group date">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input type="hidden" value="<?=$data_jadwal['id_jadwal']?>" id="idjadwal" name="id_jadwal" class="form-control"  >
            <input id="edit_mulai_audit" name="mulai_audit" type="text" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?=$data_jadwal['mulai_audit']?>">
        </div>
    </div>
    <div class="form-group">
        <label class="font-normal"><b>Tanggal Selesai Audit</b><small class="text-info"> (*yyyy-mm-dd")</small></label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input id="edit_selesai_audit" name="selesai_audit" type="text" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?=$data_jadwal['selesai_audit']?>">
        </div>
    </div>
    <div class="form-group">
        <label class="font-normal"><b>Semester</b><small class="text-info"></small></label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <select id="edit_semester_id" name="semester_id" class="form-control m-b">
                <option value="">-Pilih Semester-</option>
                <?php foreach($semester->result() as $row):?>
                <option  value="<?php echo $row->id_semester;?>"><?php echo $row->semester;?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="font-normal"><b>Tahun Ajaran</b></label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <select id="edit_tahun_akademik_id" name="tahun_akademik_id" class="form-control m-b">
                    <option value="">-Pilih Semester-</option>
                    <?php foreach($tahun_akademik->result() as $row):?>
                    <option  value="<?php echo $row->id_tahun_akademik;?>"><?php echo $row->tahun_akademik;?></option>
                    <?php endforeach;?>
                </select>
            </div>
    </div>
    <div class="form-group">
        <label class="font-normal"><b>Jenis Audit</b></label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-share-alt"></i></span>
            <select id="edit_jenis_audit_id" name="jenis_audit_id" class="form-control m-b">
                <option value="">-Pilih Jenis Audit-</option>
                <?php foreach($jenis_audit->result() as $row):?>
                <option  value="<?php echo $row->id_jenis_audit;?>"><?php echo $row->jenis_audit;?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>