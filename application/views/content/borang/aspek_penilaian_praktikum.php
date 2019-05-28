<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Aspek Penilaian Praktikum</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    Manajemen Borang
                </li> 
                <li class="breadcrumb-item">
                    Borang Praktikum
                </li> 
                <li class="breadcrumb-item active">
                    <strong>Aspek Penilaian Praktikum</strong>
                </li>      
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="ibox-content center">
            <div class="title-action">
                <button data-toggle="modal" href="#set-aspek-praktikum" class="btn btn-primary float-right" type="submit"><i class="fa fa-pencil-square-o"></i> Tambah Data</button>
            </div>  
        </div>   
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Aspek Penilaian</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="aspek_praktikum" class="table table-striped table-bordered table-hover aspek_praktikum" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aspek Penilaian</th>
                                    <th>Jenis Borang Kuliah</th>
                                    <th>Max Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Aspek Penilaian Kuliah</th>
                                    <th>Jenis Borang</th>
                                    <th>Max Bobot</th>
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
<div id="set-aspek-praktikum" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        <form  id="tambah_aspek_praktikum"class="form-horizontal">
            <div class="form-group">
                <label><b>Jenis Borang</b></label> 
                <select class="jenis form-control" name="jenis_borang_praktikum_id" id="jenis_borang_praktikum_id">
                      <option value="">- Jenis Borang Kuliah -</option>
                      <?php foreach($jenis_borang as $row):?>
                      <option  value="<?php echo $row['jenis_borang_id']?>"><?php echo $row['jenis_borang'] ?> <?php echo $row['tahun']?></option>
                  <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label><b>Aspek Penilaian</b></label> 
                <input  id="aspek_penilaian" name="aspek_penilaian" type="text" placeholder="Aspek Penilaian" class="form-control required">
            </div>
            <div class="form-group">
                <label><b>Max Bobot</b></label> 
                <input  id="max_bobot" name="max_bobot" type="number" placeholder="bobot" class="form-control required">
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

<div id="ubah_aspek_praktikum" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Edit Data</h4>
        </div>
        <div class="modal-body">
            <div id="form_edit_aspek_praktikum">

            </div>
        </div>
        
    </div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>

<script>
//aspek penilaian khusus borang kuliah
$(document).ready(function(){
  var aspek = $('#aspek_praktikum').DataTable({
    "processing": true,
    "autoWidth" : false,
    "ajax"      : 'get_aspek_praktikum',
    stateSave   : true,
    "order"     : [],
  })

  $('#tambah_aspek_praktikum').on('submit', function(){
    var jenis_borang_praktikum_id = $('#jenis_borang_praktikum_id').val();
    var aspek_penilaian = $('#aspek_penilaian').val();
    var max_bobot       = $('#max_bobot').val();

    $.ajax({
      type      : "POST",
      url       : 'act_set_aspek_praktikum',
      beforeSend: function(){
        swal({
            title : 'Menunggu',
            html  : 'Memproses data',
            onOpen: () => {
              swal.showLoading()
            }
          })
        },
        data: {
          jenis_borang_praktikum_id: jenis_borang_praktikum_id,
          aspek_penilaian: aspek_penilaian,
          max_bobot      : max_bobot
        },
        dataType: "JSON",
        success : function (data) {
          aspek.ajax.reload(null, false);
          swal({
            type : "success",
            title: 'Tambah Aspek Penilaian',
            text : 'Anda berhasil menambah Aspek Penilaian',
          })

          $('#set-aspek-praktikum').modal('hide');

          $('#jenis_borang_praktikum_id').val('');
          $('#aspek_penilaian').val('');
          $('#max_bobot').val('');
      }
    })
    return false;
  })

  $('#aspek_praktikum').on('click', '.ubah-aspek', function(){
    var id_aspek_penilaian_p = $(this).data('id_aspek_penilaian_p');

    $.ajax({
      type     : "POST",
      url      : 'edit_aspek_praktikum',
      beforSend: function(){
        let timerInterval
        swal({
          title : 'Menunggu',
          html  : 'Memproses data',
          text  : 'Proses Data',
          timer : 2000,
          onOpen: () => {
            swal.showLoading()
          }
        })
      },
      data: {
        id_aspek_penilaian_p : id_aspek_penilaian_p
      },
      success: function (data) {
        swal.close();
        $('#ubah_aspek_praktikum').modal('show');
        $('#form_edit_aspek_praktikum').html(data);

        $('#edit_aspek_praktikum').on('submit', function(){
          var edit_aspek_penilaian_praktikum = $('#edit_aspek_penilaian_praktikum').val();
          var edit_max_bobot_praktikum       = $('#edit_max_bobot_praktikum').val();

          var id_aspek_praktikum= $('#id_aspek_praktikum').val();
          $.ajax({
            type      : "POST",
            url       : 'act_edit_aspek_praktikum',
            beforeSend: function(){
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
            
            data: {
              edit_aspek_penilaian_praktikum   : edit_aspek_penilaian_praktikum,
              edit_max_bobot_praktikum         : edit_max_bobot_praktikum,

              id_aspek_praktikum            : id_aspek_praktikum
            },
            dataType: "JSON",
            success : function (data) {
              aspek.ajax.reload(null, false);
              swal({
                type : "success",
                title: 'Ubah Aspek',
                text : 'Anda berhasil mengubah aspek',
              })
      
              $('#ubah_aspek_praktikum').modal('hide');

              if(data.success == true){ // if true (1)
                setTimeout(function(){// wait for 5 secs(2)
                     location.reload(); // then reload the page.(3)
                }, 5000); 
            }
              
            } 
          })
          return false;
        });
      }
    });
  });

  $('#aspek_praktikum').on('click', '.hapus-aspek', function(){
    var id_aspek_penilaian_p = $(this).data('id_aspek_penilaian_p');
    swal({
      title             : 'Konfirmasi',
      text              : "Anda ingin hapus Aspek Penilaian",
      type              : 'warning',
      showCancelButton  : true,
      confirmButtonText : 'Hapus',
      confirmButtonColor: '#d33',
      cancelButtonColor : '#3085d6',
      cancelButtonText  : 'Tidak',
      reverseButtons    : true
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url      : 'act_hapus_aspek_praktikum',
          method   : "POST",
          beforSend: function() {
            swal({
              title : 'Menunggu',
              html  : 'Memproses data',
              onOpen: () => {
                swal.showLoading()
              }
            })
          },
          data    : {id_aspek_penilaian_p :id_aspek_penilaian_p},
          dataType: "JSON",
          success : function(data){
            swal(
              'Hapus',
              'Aspek Penilaian berhasil di hapus',
              'success'
            )
            aspek.ajax.reload(null, false)
          }
        })
      } else if (result.dismiss === swal.DismissReason.cancel) {
          swal(
            'Batal',
            'Anda membatalkan menghapaus data',
            'error'
          )
        }
      })
  });

});

</script>
