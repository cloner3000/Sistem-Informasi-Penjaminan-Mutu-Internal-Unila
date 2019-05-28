<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Badan Pengelola</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Kelola Badan Pengelola</strong>
                </li>      
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <button data-toggle="modal" href="#tambah-badan" class="btn btn-primary float-right" type="submit"><i class="fa fa-pencil-square-o"></i> Tambah Data</button>
        </div>   
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Daftar Badan Pengelola/SPI Universitas Lampung</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="manajemen_badan" class="table table-striped table-bordered table-hover manajemen_badan" >
                            <thead>
                                <tr>   
                                    <th>Badan Pengelola</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Badan Pengelola</th>
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

<div id="tambah-badan" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        <form  id="tambah_badan"class="form-horizontal">
            <div class="form-group">
                <label class="font-normal"><b>Badan Pengelola</b></label>
                <input id="nama_badan" name="nama_badan" type="text" placeholder="Badan Pengelola" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Kepala Badan Pengelola</b></label>
                <input id="nama_kabadan" name="nama_kabadan" type="text" placeholder="Kepala Pusat Badan" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-normal"><b>NIP</b></label>
                <input id="nip_kabadan" name="nip_kabadan" type="text" placeholder="NIP Kepala Pusat Badan" class="form-control">
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

<div id="detail_badan" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Detail Badan Pengelola</h4>
        </div>
        <div class="modal-body">
            <div id="tampil_badan">
        
            </div>
        </div>
    </div>
    </div>
</div>

<div id="ubah_badan" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Edit Data</h4>
            </div>
        <div class="modal-body">
        <div id="form_edit_badan">
        
        </div>
    </div>
</div>
</div></div>

<div id="ganti_kabadan" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Ganti Kepala Badan Pengelola</h4>
            </div>
            <div class="modal-body">
                <div id="form_ganti_kabadan">
        
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>

<script>
  //manajemen badan pengelola
  $(document).ready(function () {
    var badan = $('#manajemen_badan').DataTable({
        "processing": true,
        "ajax"      : 'badan/data_badan',
        stateSave   : true,
        "order"     : []
    })

    $('#tambah_badan').on('submit', function(){
      var nama_badan      = $('#nama_badan').val();

      var nama_kabadan    = $('#nama_kabadan').val();
      var nip_kabadan     = $('#nip_kabadan').val();
      var mulai_jabatan      = $('#mulai_jabatan').val();
      var selesai_jabatan    = $('#selesai_jabatan').val();
  
      $.ajax({
        type      : "POST",
        url       : 'badan/tambah_badan',
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
          nama_badan    : nama_badan,
         
          nama_kabadan  : nama_kabadan,
          nip_kabadan  : nip_kabadan,
          mulai_jabatan     : mulai_jabatan,
          selesai_jabatan   : selesai_jabatan
        },
        dataType: "JSON",
        success : function (data) {
          badan.ajax.reload(null, false);
          swal({
            type : "success",
            title: 'Tambah Badan Pengelola',
            text : 'Anda berhasil menambah badan pengelola',
          })
  
          $('#tambah-badan').modal('hide');
  
          $('#nama_badan').val('');

          $('#nama_kabadan').val('');
          $('#nip_kabadan').val('');
          $('#mulai_jabatan').val('');
          $('#selesai_jabatan').val('');
        }
      })
      return false;
    });

    $('#manajemen_badan').on('click', '.ubah-badan', function(){
      var id_badan = $(this).data('id_badan');
  
      $.ajax({
        type     : "POST",
        url      : 'badan/edit_badan',
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
          id_badan : id_badan
        },
        success: function (data) {
          swal.close();
          $('#ubah_badan').modal('show');
          $('#form_edit_badan').html(data);

          $('#editbadan').on('submit', function(){
            var edit_nama_badan      = $('#edit_nama_badan').val();

            var id_badan = $('#idbadan').val();
            $.ajax({
              type      : "POST",
              url       : 'badan/update_badan',
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
                edit_nama_badan    : edit_nama_badan,

                id_badan            : id_badan
              },
              dataType: "JSON",
              success : function (data) {
                badan.ajax.reload(null, false);
                swal({
                  type : "success",
                  title: 'Ubah Badan Pengelola',
                  text : 'Anda berhasil mengubah badan pengelola',
                })
        
                $('#ubah_badan').modal('hide');

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

    $('#manajemen_badan').on('click', '.ganti-kabadan', function(){
      var id_badan = $(this).data('id_badan');
  
      $.ajax({
        type     : "POST",
        url      : 'badan/ganti_kabadan',
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
          id_badan: id_badan
        },
        success: function (data) {
          swal.close();
          $('#ganti_kabadan').modal('show');
          $('#form_ganti_kabadan').html(data);

          $('#new_kabadan').on('submit', function(){
            var badan_id = $('#badan_id').val();

            var new_nama_kabadan = $('#new_nama_kabadan').val();
            var new_nip_kabadan  = $('#new_nip_kabadan').val();
            var new_mulai_jabatan   = $('#new_mulai_jabatan').val();
            var new_selesai_jabatan = $('#new_selesai_jabatan').val();

            $.ajax({
              type      : "POST",
              url       : 'badan/new_kabadan',
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
                new_nama_kabadan: new_nama_kabadan,
                new_nip_kabadan : new_nip_kabadan,
                new_mulai_jabatan  : new_mulai_jabatan,
                new_selesai_jabatan: new_selesai_jabatan,

                badan_id: badan_id
              },
              dataType: "JSON",
              success : function (data) {
                badan.ajax.reload(null, false);
                swal({
                  type : "success",
                  title: 'Ganti Kepala Badan Pengelola',
                  text : 'Anda berhasil mengganti kepala badan pengelola',
                })
        
                $('#ganti_kabadan').modal('hide');
                
              } 
            })
            return false;
          });
        }
      });
    });

    $('#manajemen_badan').on('click','.detail-badan', function () {
      var id_badan = $(this).data('id_badan');
  
      $.ajax({
        type     : "POST",
        url      : 'badan/detail_badan',
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
        data   : {id_badan:id_badan},
        success: function (data){
          swal.close();
            $('#detail_badan').modal('show');
            $('#tampil_badan').html(data);
        }
      })
      return false;
    });

    $('#manajemen_badan').on('click', '.hapus-badan', function(){
      var id_badan = $(this).data('id_badan');
      swal({
        title             : 'Konfirmasi',
        text              : "Anda ingin hapus badan pengelola",
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
            url      : 'badan/delete_badan',
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
            data    : {id_badan:id_badan},
            dataType: "JSON",
            success : function(data){
              swal(
                'Hapus',
                'Badan Pengelola berhasil di hapus',
                'success'
              )
              badan.ajax.reload(null, false)
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



