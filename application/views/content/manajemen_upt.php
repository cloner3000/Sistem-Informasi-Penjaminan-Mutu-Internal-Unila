<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Unit Pelaksana Teknis</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Kelola Unit Pelaksana Teknis</strong>
                </li>      
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <button data-toggle="modal" href="#tambah-upt" class="btn btn-primary float-right" type="submit"><i class="fa fa-pencil-square-o"></i> Tambah Data</button>
        </div>   
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Daftar Unit Pelaksana Teknis</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="manajemen_upt" class="table table-striped table-bordered table-hover manajemen_upt" >
                            <thead>
                                <tr>   
                                    <th>Unit Pelaksana Teknis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Unit Pelaksana Teknis</th>
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

<div id="tambah-upt" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        <form  id="tambah_upt"class="form-horizontal">
            <div class="form-group">
                <label class="font-normal"><b>Unit Pelaksana Teknis</b></label>
                <input id="unit_pelaksana" name="unit_pelaksana" type="text" placeholder="Unit Pelaksana Teknis" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Kepala Unit Pelaksana Teknis</b></label>
                <input id="nama_kaupt" name="nama_kaupt" type="text" placeholder="Kepala Unit Pelaksana Teknis" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-normal"><b>NIP Unit Pelaksana Teknis</b></label>
                <input id="nip_kaupt" name="nip_kaupt" type="text" placeholder="NIP Unit Pelaksana Teknis" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Masa Jabatan</b><small class="text-info"></small></label>
                    <div class="input-daterange input-group" id="datepicker">
                        <input id="mulai_jabatan" name="mulai_jabatan" type="text" class="form-control-sm form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="2019-09-20"/>
                        <span class="input-group-addon">to</span>
                        <input id="selesai_jabatan" name="selesai_jabatan" type="text" class="form-control-sm form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="2019-09-20" />
                    </div>
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
<div id="detail_upt" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Detail Unit Pelaksana Teknis</h4>
        </div>
        <div class="modal-body">
            <div id="tampil_upt">
        
            </div>
        </div>
    </div>
    </div>
</div>
<div id="ubah_upt" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Edit Data</h4>
            </div>
        <div class="modal-body">
        <div id="form_edit_upt">
        
        </div>
    </div>
</div>
</div></div>

<div id="ganti_kaupt" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Ganti Kepala UPT</h4>
            </div>
            <div class="modal-body">
                <div id="form_ganti_kaupt">
        
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>

<script>
//manajemen_upt
$(document).ready(function () {
  var upt = $('#manajemen_upt').DataTable({
      "processing": true,
      "ajax"      : '<?php echo base_url().'su/upt/data_upt'?>',
      stateSave   : true,
      "order"     : []
  })

  $('#tambah_upt').on('submit', function(){
    var unit_pelaksana      = $('#unit_pelaksana').val();
    var nama_kaupt    = $('#nama_kaupt').val();
    var nip_kaupt     = $('#nip_kaupt').val();
    var mulai_jabatan      = $('#mulai_jabatan').val();
    var selesai_jabatan    = $('#selesai_jabatan').val();

    $.ajax({
      type      : "POST",
      url       : 'upt/tambah_upt',
      beforeSend: function() {
        swal({
          title : 'Menunggu',
          html  : 'Memproses data',
          onOpen: () => {
            swal.showLoading()
          }
        })
      },
      data: {
        unit_pelaksana: unit_pelaksana,

        nama_kaupt     : nama_kaupt,
        nip_kaupt      : nip_kaupt,
        mulai_jabatan  : mulai_jabatan,
        selesai_jabatan: selesai_jabatan
      },
      dataType: "JSON",
      success : function (data) {
        upt.ajax.reload(null, false);
        swal({
          type : "success",
          title: 'Tambah Unit Pelelaksana Teknis',
          text : 'Anda berhasil menambah upt',
        })

        $('#tambah-upt').modal('hide');

        $('#unit_pelaksana').val('');
        $('#nama_kaupt').val('');
        $('#nip_kaupt').val('');
        $('#mulai_jabatan').val('');
        $('#selesai_jabatan').val('');
      }
    })
    return false;
  });

  $('#manajemen_upt').on('click', '.ubah-upt', function(){
    var id_upt = $(this).data('id_upt');

    $.ajax({
      type     : "POST",
      url      : 'upt/edit_upt',
      beforeSend: function(){
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
        id_upt: id_upt
      },
      success: function (data) {
        swal.close();
        $('#ubah_upt').modal('show');
        $('#form_edit_upt').html(data);

        $('#editupt').on('submit', function(){
          var edit_unit_pelaksana     = $('#edit_unit_pelaksana').val();

          var id_upt = $('#idupt').val();
          $.ajax({
            type      : "POST",
            url       : 'upt/update_upt',
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
              edit_unit_pelaksana     : edit_unit_pelaksana,
            
              id_upt            : id_upt
            },
            dataType: "JSON",
            success : function (data) {
              upt.ajax.reload(null, false);
              swal({
                type : "success",
                title: 'Ubah Unit Pelaksana',
                text : 'Anda berhasil mengubah upt',
              })
      
              $('#ubah_upt').modal('hide');

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

  $('#manajemen_upt').on('click', '.ganti-kaupt', function(){
    var id_upt = $(this).data('id_upt');

    $.ajax({
      type     : "POST",
      url      : 'upt/ganti_kaupt',
      beforeSend: function(){
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
        id_upt: id_upt
      },
      success: function (data) {
        swal.close();
        $('#ganti_kaupt').modal('show');
        $('#form_ganti_kaupt').html(data);

        $('#new_kaupt').on('submit', function(){
          var upt_id = $('#upt_id').val();

          var new_nama_kaupt= $('#new_nama_kaupt').val();
          var new_nip_kaupt = $('#new_nip_kaupt').val();
          var new_mulai_jabatan   = $('#new_mulai_jabatan').val();
          var new_selesai_jabatan = $('#new_selesai_jabatan').val();

          $.ajax({
            type      : "POST",
            url       : 'upt/new_kaupt',
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
              new_nama_kaupt: new_nama_kaupt,
              new_nip_kaupt : new_nip_kaupt,
              new_mulai_jabatan  : new_mulai_jabatan,
              new_selesai_jabatan: new_selesai_jabatan,

              upt_id: upt_id
            },
            dataType: "JSON",
            success : function (data) {
              upt.ajax.reload(null, false);
              swal({
                type : "success",
                title: 'Ganti Kepala UPT',
                text : 'Anda berhasil mengganti kaupt',
              })
      
              $('#ganti_kaupt').modal('hide');
              
            } 
          })
          return false;
        });
      }
    });
  });

  $('#manajemen_upt').on('click','.detail-upt', function () {
    var id_upt = $(this).data('id_upt');

    $.ajax({
      type     : "POST",
      url      : 'upt/detail_upt',
      beforeSend: function (){
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
      data   : {id_upt:id_upt},
      success: function (data){
        swal.close();
          $('#detail_upt').modal('show');
          $('#tampil_upt').html(data);
      }
    })
    return false;
  });

  $('#manajemen_upt').on('click', '.hapus-upt', function(){
    var id_upt = $(this).data('id_upt');
    swal({
      title             : 'Konfirmasi',
      text              : "Anda ingin hapus upt",
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
          url      : 'upt/delete_upt',
          method   : "POST",
          beforeSend: function() {
            swal({
              title : 'Menunggu',
              html  : 'Memproses data',
              onOpen: () => {
                swal.showLoading()
              }
            })
          },
          data    : {id_upt:id_upt},
          dataType: "JSON",
          success : function(data){
            swal(
              'Hapus',
              'UPT berhasil di hapus',
              'success'
            )
            upt.ajax.reload(null, false)
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

