<form  id="edituser" class="form-horizontal">
    <div class="form-group">
        <label><b>Username</b></label> 
        <input type="hidden" value="<?=$data_user['id_user']?>" id="iduser" name="id_user" class="form-control"  >
        <input value="<?=$data_user['username']?>" id="editusername" name="username" type="text" placeholder="username" class="form-control">
    </div>
    <div class="form-group">
        <label><b>Password</b></label> 
        <input id="editpassword" type="text"  value="<?=base64_decode($data_user['session'])?>" name="password" value="unilajaya" placeholder="password" class="form-control">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>