<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs" role="tablist">
                    <li><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Detail User</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#tab-2"><i class="fa fa-cog"></i> Ganti Password</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <form action="<?php echo base_url().'tpm/tpm_fakultas/update_tpmf'?>" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label"><b>Fakultas</b></label>
                                    <div class="col-lg-10">
                                        <input type="hidden" value="<?=$detail_user['id_tpmf']?>" name="id_tpmf" class="form-control" > 
                                        <input type="text" placeholder="Badan Pengelola" class="form-control" disabled value="<?php echo $detail_user['nama_fakultas'] ?>"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label"><b>Nama</b></label>
                                    <div class="col-lg-10">
                                        <input name="nama_tpmf" type="text" value="<?=$detail_user['nama_tpmf']?>"  placeholder="Nama" class="form-control" required> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label"><b>NIP</b></label>
                                        <div class="col-lg-10">
                                            <input name="nip_tpmf" type="text" value="<?=$detail_user['nip_tpmf']?>" placeholder="NIP" class="form-control"  required> 
                                        </div>
                                </div>
                                        
                                <div class="modal-footer">
                                        <button name="submit" value="Simpan" type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div role="tabpanel" id="tab-2" class="tab-pane">
                        <div id="ibox1" class="panel-body">
                            <form action="<?php echo base_url().'tpm/tpm_fakultas/update_user'?>" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label"><b>Password Lama</b></label>
                                    <div class="col-lg-10">
                                        <input name="password" type="password"  placeholder="Password" class="form-control" required> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label"><b>Password Baru</b></label>
                                    <div class="col-lg-10">
                                        <input id="password" onkeyup='check();' type="password" placeholder="Password" class="form-control"  required> 
                                        <span id='char'></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label"><b>Confirm Password</b></label>
                                    <div class="col-lg-10">
                                        <input id="confirm_password"  onkeyup='check();' name="new_password" type="password" placeholder="Password" class="form-control"  required> 
                                        <span id='message'></span>
                                    </div>
                                </div>   
                                <div class="modal-footer">
                                        <button id="submit" onkeyup='check();' name="submit" value="simpan" type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var check = function() {
var password = document.getElementById('password').value;
var confirm_password = document.getElementById('confirm_password').value;
var message = document.getElementById('message');
var char = document.getElementById('char');

    if(password.length > 5){
        char.style.color = 'green';
        char.innerHTML = 'Mantab!';
    }else{
        char.style.color = 'red';
        char.innerHTML = 'Anda harus memasukkan setidaknya 6 digit!';
    }
    if ( password == confirm_password != 0 && password.length > 5) {
        message.style.color = 'green';
        message.innerHTML = 'Password Ok!';
        $("#submit").removeAttr("disabled");
    } else {
        message.style.color = 'red';
        message.innerHTML = "Password ini tidak cocok!";
        $("#submit").attr("disabled","true");
    }
}
</script>