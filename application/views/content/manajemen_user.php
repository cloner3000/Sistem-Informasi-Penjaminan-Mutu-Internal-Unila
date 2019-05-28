<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/plugins/chosen/bootstrap-chosen.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>User</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Manajemen User</strong>
                </li>      
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="ibox-content center">
            <div class="title-action">
                <button data-toggle="modal" href="#tambah-user" class="btn btn-primary float-right" type="submit"><i class="fa fa-pencil-square-o"></i> Tambah Data</button>
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
                        <table id="manajemen_user" class="table table-striped table-bordered table-hover manajemen_user" >
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Password</th>
                                    <th>Masuk</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Password</th>
                                    <th>Masuk</th>
                                    <th>Status</th>
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

<div id="tambah-user" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        <form  id="tambah_user"class="form-horizontal">
            <div class="form-group">
                <label><b>Role</b></label> 
                <select id="role" name="role_id" class="form-control m-b" required>
                    <option value="">-Pilih Role-</option>
                  <?php foreach($role->result() as $row):?>
                    <?php if($row->id_role !="1") {?>
                        <option  value="<?php echo $row->id_role;?>"><?php echo $row->role;?></option>
                    <?php }?>
                  <?php endforeach;?>
                </select>
            </div>
            <div id="select_lembaga" class="form-group">
                <label><b>Pusat Lembaga</b></label> 
                <select id="pusat_lembaga_id" name="pusat_lembaga_id" class="form-control m-b">
                    <option value="">-Pilih Pusat Lembaga-</option>
                  <?php foreach($lembaga as $row):?>
                        <option  value="<?php echo $row['id_pusat_lembaga']?>"><?php echo $row['pusat_lembaga'];?></option>
                  <?php endforeach;?>
                </select>
            </div>
            <div id="select_jurusan" class="form-group">
                <label><b>Program Studi</b></label> 
                <select id="prodi_id" name="prodi_id" data-placeholder="Pilih Program Studi..." class="prodi-select">
                        <option value=""></option>
                  <?php foreach($prodi->result() as $row):?>
                        <option  value="<?php echo $row->id_prodi;?>"><?php echo $row->program_studi;?></option>
                  <?php endforeach;?>
                </select>
            </div>
            <div id="select_lab" class="form-group">
                <label><b>Laboratorium</b></label> 
                <select id="lab_id" name="lab_id"  data-placeholder="Pilih Laboiratorium..."  class="lab-select">
                    <option value=""></option>
                  <?php foreach($lab->result() as $row):?>
                        <option  value="<?php echo $row->id_lab;?>"><?php echo $row->nama_lab;?></option>
                  <?php endforeach;?>
                </select>
            </div>
            <div id="select_unit" class="form-group">
                <label><b>Unit Pelaksana</b></label> 
                <select id="unit_id" name="unit_id" data-placeholder="Unit Pelaksana..." class="unit-select form-control m-b">
                        <option value=""></option>
                  <?php foreach($upt as $row):?>
                        <option  value="<?php echo $row['id_upt'];?>"><?php echo $row['unit_pelaksana'];?></option>
                  <?php endforeach;?>
                </select>
            </div>
            <div id="select_badan" class="form-group">
                <label><b>Badan Pengelola</b></label> 
                <select id="badan_id" name="badan_id" class="form-control m-b">
                    <option value="">-Pilih Badan Pengelola-</option>
                  <?php foreach($badan as $row):?>
                        <option  value="<?php echo $row['id_badan'];?>"><?php echo $row['nama_badan'];?></option>
                  <?php endforeach;?>
                </select>
            </div>
             <div id="select_tpmf" class="form-group">
                <label><b>Fakultas</b></label> 
                <select id="fakultas_id" name="fakultas_id" class="form-control m-b">
                    <option value="">-Pilih Fakultas-</option>
                  <?php foreach($fakultas->result() as $row):?>
                        <option  value="<?php echo $row->id_fakultas;?>"><?php echo $row->nama_fakultas;?></option>
                  <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label><b>Username</b></label> 
                <input id="username" name="username" type="text" placeholder="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label><b>Password</b></label> 
                <input id="password" type="text"  name="password" value="unilajaya" placeholder="password" class="form-control" required>
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

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>

<script language="JavaScript" type="text/javascript" src="<?php echo base_url("assets/js/plugins/select2/select2.full.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/chosen/chosen.jquery.js");?>"></script>

<script>
$(document).ready(function(){
  $('.prodi-select').chosen({
    width: "100%"
  });
  $('.lab-select').chosen({
    width: "100%"
  });

  $('.unit-select').chosen({
    width: "100%"
  });
})
</script>

<script type="text/javascript">
 //manajemen user
  $(document).ready(function () {
  // ini adalah fungsi untuk mengambil data user dan di  incluce ke dalam datatable
  var user = $('#manajemen_user').DataTable({
    "processing": true,
    "autoWidth" : true,
    "ajax"      : '<?php echo base_url().'su/user/data_user'?>',
    stateSave   : true,
    "order"     : []
  })

  $('#tambah_user').on('submit', function () {
    var role_id  = $('#role').val();
    var username = $('#username').val();  // diambil dari id nama yang ada diform modal
    var password = $('#password').val();

    var prodi_id = $('#prodi_id').val();
    var lab_id   = $('#lab_id').val();
    var unit_id   = $('#unit_id').val();
    var badan_id   = $('#badan_id').val();
    var pusat_lembaga_id   = $('#pusat_lembaga_id').val();
    var fakultas_id = $('#fakultas_id').val();
    

    $.ajax({
      type      : "POST",
      url       : '<?php echo base_url().'su/user/tambah_user'?>',
      beforeSend: function () {
        swal({
            title : 'Menunggu',
            html  : 'Memproses data',
            onOpen: () => {
              swal.showLoading()
            }
          })
        },
      data: {
        role_id : role_id,
        username: username,
        password: password,


        prodi_id: prodi_id,
        lab_id  : lab_id,
        unit_id : unit_id,
        badan_id : badan_id,
        pusat_lembaga_id : pusat_lembaga_id,
        fakultas_id : fakultas_id

      },
      dataType: "JSON",
      success : function (data) {
	      user.ajax.reload(null, false);
        swal({
          type : 'success',
          title: 'Tambah User',
          text : 'Anda Berhasil Menambah User'
        })
        // bersihkan form pada modal
        $('#tambah-user').modal('hide');
        // tutup modal
        $('#role').val('');
        $('#username').val('');
        $('#prodi_id').val('');
        $('#lab_id').val('');
        $('#unit_id').val('');
        $('#pusat_lembaga_id').val('');
        $('#badan_id').val('');
        $('fakultas_id').val('');
	      
      },
      error : function() {
        user.ajax.reload(null,false);
        swal({
          type : 'error',
          title: 'Oops Error!',
          text : 'Username sudah ada.'
        })
        $('#tambah-user').modal('hide');
      }
    })
    return false;
  });

  $('#manajemen_user').on('click','.ubah-user', function () {
  // ambil element id pada saat klik ubah
  var id_user = $(this).data('id_user');

  $.ajax({
    type      : "POST",
    url       : '<?php echo base_url().'su/user/edit_user'?>',
    beforeSend: function () {
      let timerInterval
      swal({
          title : 'Menunggu',
          html  : 'Memproses data',
          text  : 'Proses Dataa',
          timer : 2000,
          onOpen: () => {
            swal.showLoading()
          }
        })
      },
    data   : {id_user:id_user},
    success: function (data) {
      swal.close();
        $('#edit_user').modal('show');
        $('#form_edit_user').html(data);

        // proses untuk mengubah data
        $('#edituser').on('submit', function () {
          var editusername = $('#editusername').val();  // diambil dari id nama yang ada diform modal
          var editpassword = $('#editpassword').val();  // diambil dari id alamat yanag ada di form modal
          var id_user      = $('#iduser').val();        //diambil dari id yang ada di form modal
          $.ajax({
            type      : "POST",
            url       : '<?php echo base_url().'su/user/update_user'?>',
            beforeSend: function () {
              swal({
                  title  : 'Menunggu',
                  html   : 'Memproses data',
                  text   : 'Proses Update Dataa',
                  buttons: false,
                  onOpen : () => {
                    swal.showLoading()
                  },
                })
              },
            data    : {editusername:editusername,editpassword:editpassword,id_user:id_user},   // ambil datanya dari form yang ada di variabel
            dataType: "JSON",
            success : function (data) {
              user.ajax.reload(null,false);
              swal({
                  type : 'success',
                  title: 'Update User',
                  text : 'Anda Berhasil Mengubah Data User',
                })
                // tutup form pada modal
                $('#edit_user').modal('hide');
            },
            error : function() {
              user.ajax.reload(null,false);
              swal({
                type : 'error',
                title: 'Oops Error!',
                text : 'Username sudah ada.'
              })
              $('#edit_user').modal('hide');
            }
          })
          return false;
        });
    }
  });
});

$('#manajemen_user').on('click','.reset-pw-user', function () {
  var id_user = $(this).data('id_user');
  swal({
      title             : 'Konfirmasi',
      text              : "Anda ingin reset password",
      type              : 'warning',
      showCancelButton  : true,
      confirmButtonText : 'Reset',
      confirmButtonColor: '#d33',
      cancelButtonColor : '#3085d6',
      cancelButtonText  : 'Tidak',
      reverseButtons    : true

    }).then((result) => {
      if (result.value) {
        $.ajax({
          url       : '<?php echo base_url().'su/user/reset_password'?>',
          method    : "POST",
          beforeSend: function () {
          swal({
              title : 'Menunggu',
              html  : 'Memproses data',
              onOpen: () => {
                swal.showLoading()
              }
            })
          },
          data    : {id_user:id_user},
          dataType: "JSON",
          success : function(data){
            swal(
              'Hapus',
              'Password Berhasil di Reset',
              'success'
            )
            user.ajax.reload(null, false)
          }
        })
    } else if (result.dismiss === swal.DismissReason.cancel) {
        swal(
          'Batal',
          'Anda membatalkan reset password',
          'error'
        )
      }
    })
  });

  $('#manajemen_user').on('click','.non-aktif-user', function () {
    var id_user = $(this).data('id_user');
    swal({
        title             : 'Konfirmasi',
        text              : "Anda ingin Non-Aktifkan User ini?",
        type              : 'warning',
        showCancelButton  : true,
        confirmButtonText : 'Non-Aktif',
        confirmButtonColor: '#d33',
        cancelButtonColor : '#3085d6',
        cancelButtonText  : 'Tidak',
        reverseButtons    : true

      }).then((result) => {
        if (result.value) {
          $.ajax({
            url       : '<?php echo base_url().'su/user/non_aktif_user'?>',
            method    : "POST",
            beforeSend: function () {
            swal({
                title : 'Menunggu',
                html  : 'Memproses data',
                onOpen: () => {
                  swal.showLoading()
                }
              })
            },
            data    : {id_user:id_user},
            dataType: "JSON",
            success : function(data){
              swal(
                'Non-Aktif User',
                'User berhasil di Non-Aktifkan',
                'success'
              )
              user.ajax.reload(null, false)
            }
          })
      } else if (result.dismiss === swal.DismissReason.cancel) {
          swal(
            'Batal',
            'Anda membatalkan Non-Aktif User',
            'error'
          )
        }
      })
    });

    $('#manajemen_user').on('click','.aktif-user', function () {
      var id_user = $(this).data('id_user');
      swal({
          title             : 'Konfirmasi',
          text              : "Anda ingin Aktifkan User ini?",
          type              : 'warning',
          showCancelButton  : true,
          confirmButtonText : 'Aktifkan',
          confirmButtonColor: '#00a65a',
          cancelButtonColor : '#d33',
          cancelButtonText  : 'Tidak',
          reverseButtons    : true

        }).then((result) => {
          if (result.value) {
            $.ajax({
              url       : '<?php echo base_url().'su/user/aktif_user'?>',
              method    : "POST",
              beforeSend: function () {
              swal({
                  title : 'Menunggu',
                  html  : 'Memproses data',
                  onOpen: () => {
                    swal.showLoading()
                  }
                })
              },
              data    : {id_user:id_user},
              dataType: "JSON",
              success : function(data){
                swal(
                  'Non-Aktif User',
                  'User berhasil di Aktifkan',
                  'success'
                )
                user.ajax.reload(null, false)
              }
            })
        } else if (result.dismiss === swal.DismissReason.cancel) {
            swal(
              'Batal',
              'Anda membatalkan Aktifkan User',
              'error'
            )
          }
        })
      });
});


$(document).ready(function(){
    $("#select_lembaga").hide();
    $("#select_jurusan").hide();
    $("#select_lab").hide();
    $("#select_unit").hide();
    $("#select_badan").hide();
    $("#select_tpmf").hide();
    setSelector("#role");
    $("#role").change(function(){
      setSelector(this);
    });
    
    function setSelector(select){
      if($(select).val() == '7'){
        $("#select_lembaga").show();
        $("#select_jurusan").hide();
        $("#select_lab").hide();
        $("#select_unit").hide();
        $("#select_badan").hide();
        $("#select_tpmf").hide();
      }
      else{
        if($(select).val() == '2'){
          $("#select_lembaga").hide();
          $("#select_jurusan").show();
          $("#select_lab").hide();
          $("#select_unit").hide();
          $("#select_badan").hide();
          $("#select_tpmf").hide();
        }
        else{
          if($(select).val() == '6'){
            $("#select_lembaga").hide();
            $("#select_jurusan").hide();
            $("#select_lab").hide();
            $("#select_unit").show();
            $("#select_badan").hide();
            $("#select_tpmf").hide();
          }else{
            if($(select).val() == '5'){
              $("#select_lembaga").hide();
              $("#select_jurusan").hide();
              $("#select_lab").show();
              $("#select_unit").hide();
              $("#select_badan").hide();
              $("#select_tpmf").hide();
            }else{
              if($(select).val() == '8'){
                $("#select_lembaga").hide();
                $("#select_jurusan").hide();
                $("#select_lab").hide();
                $("#select_unit").hide();
                $("#select_badan").show();
                $("#select_tpmf").hide();
              }else{
                  if($(select).val() == '10'){
                    $("#select_lembaga").hide();
                    $("#select_jurusan").hide();
                    $("#select_lab").hide();
                    $("#select_unit").hide();
                    $("#select_badan").hide();
                    $("#select_tpmf").show(); 
                  }else{
                    $("#select_lembaga").hide();
                    $("#select_jurusan").hide();
                    $("#select_lab").hide();
                    $("#select_unit").hide();
                    $("#select_badan").hide();
                    $("#select_tpmf").hide();
                  }
                }
            }
          }
        }
      }
    }
  })

</script>



        