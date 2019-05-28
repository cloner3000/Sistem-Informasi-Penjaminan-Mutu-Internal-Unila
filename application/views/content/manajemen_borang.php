<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Borang</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Manajemen Borang</strong>
                </li>      
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="ibox-content center">
            <div class="title-action">
                <button data-toggle="modal" href="#tambah-borang" class="btn btn-primary float-right" type="submit"><i class="fa fa-pencil-square-o"></i> Tambah Data</button>
            </div>  
        </div>   
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Manajemen User</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="manajemen_borang" class="table table-striped table-bordered table-hover manajemen_user" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="tambah-borang" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        <form  id="tambah_borang"class="form-horizontal">
            <div class="form-group">
                <label><b>Jenis Borang</b></label> 
                <select class="form-control" name="jenis_borang_id" id="jenis_borang_id"">
                      <option value="">- Jenis Borang -</option>
                      <?php foreach($jenis_borang->result() as $row):?>
                      <option  value="<?php echo $row->id_jenis_borang?>"><?php echo $row->jenis_borang;?></option>
                  <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label><b>Aspek Penilaian</b></label> 
                <select class="form-control" name="aspek_penilaian_id" id="aspek_penilaian_id">
                      <option value="">- Aspek Penilaian -</option>
                      <?php foreach($aspek->result() as $row):?>
                      <option  value="<?php echo $row->id_aspek_penilaian?>"><?php echo $row->standar;?> (<?php echo $row->max_bobot;?>)</option>
                  <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label><b>Bobot</b></label> 
                <input  id="bobot" name="bobot" type="number" placeholder="bobot" class="form-control">
            </div>

            <div class="form-group">
                <label><b>Pertanyaan</b></label> 
                <textarea id="pertanyaan" name="pertanyaan" type="number"   placeholder="pertanyaan" class="form-control"></textarea>
            </div>
            <div class="form-group">
            
                <div class="col-sm-10">
                <label><b>Opsi 1</b></label> 
                    <div class="input-group">
                        <input id="opsi" type="text"  name="opsi[]" type="text" class="form-control" placeholder="opsi jawaban"> 
                        <span class="input-group-append"> 
                            <button onclick="education_fields();" type="button" type="button" class="btn btn-primary">+</button> 
                        </span>
                    </div>
                </div>
            </div>
          <div id="education_fields" >
                
          </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>

<div id="edit_user" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Edit Data</h4>
        </div>
        <div class="modal-body">
            <div id="form_edit_user">

            </div>
        </div>
        
    </div>
    </div>
</div>

<div id="detail_borang_matkul" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Detail Borang</h4>
        </div>
        <div class="modal-body">
            <div id="tampil_borang_matkul">

            </div>
        </div>
        
    </div>
    </div>
</div>

<script type="text/javascript">
var room = 1;
var opsi = 1;
function education_fields() {
 
    room++;
    opsi++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<label class="col-sm-2 control-label"><b>Opsi '+ opsi +'</b></label><div class="col-sm-10"><div class="input-group input-group-sm"><input type="text" id="opsi" name="opsi[]" class="form-control"  placeholder="opsi jawaban"><span class="input-group-btn"><button class="btn btn-danger btn-flat" type="button" onclick="remove_education_fields('+ room +');">-</button></span></div></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>


 


        