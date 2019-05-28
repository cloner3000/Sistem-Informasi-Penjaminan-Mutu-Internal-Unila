<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Fakultas</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Kelola Fakultas</strong>
                </li>      
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <button data-toggle="modal" href="#tambah-fakultas" class="btn btn-primary float-right" type="submit"><i class="fa fa-pencil-square-o"></i> Tambah Data</button>
        </div>   
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Daftar Fakultas</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="manajemen_fakultas" class="table table-striped table-bordered table-hover manajemen_fakultas" >
                            <thead>
                                <tr>   
                                    <th>Fakultas</th>
                                    <th>Singkatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Fakultas</th>
                                    <th>Singkatan</th>
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

<div id="tambah-fakultas" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        <form  id="tambah_fakultas"class="form-horizontal">
            <div class="form-group">
                <label class="font-normal"><b>Fakultas</b></label>
                <input id="nama_fakultas" name="nama_fakultas" type="text" placeholder="Fakultas" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Singkatan</b></label>
                <input id="singkatan_fakultas" name="singkatan_fakultas" type="text" placeholder="Singkatan" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Wakil Dekan Satu</b></label>
                <input id="nama_wadek_satu" name="nama_wadek_satu" type="text" placeholder="Wakil Dekan Satu" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-normal"><b>NIP Dekan Satu</b></label>
                <input id="nip_wadek_satu" name="nip_wadek_satu" type="text" placeholder="NIP Dekan Satu" class="form-control">
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
<div id="detail_fakultas" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Detail Fakultas</h4>
        </div>
        <div class="modal-body">
            <div id="tampil_fakultas">
        
            </div>
        </div>
    </div>
    </div>
</div>
<div id="ubah_fakultas" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Edit Data</h4>
            </div>
        <div class="modal-body">
        <div id="form_edit_fakultas">
        
        </div>
    </div>
</div>
</div></div>

<div id="ganti_wadek" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Ganti Wakil Dekan Satu</h4>
            </div>
            <div class="modal-body">
                <div id="form_ganti_wadek">
        
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>

<script>
 //manajemen_fakultas
 $(document).ready(function () {
    var fakultas = $('#manajemen_fakultas').DataTable({
        "processing": true,
        "ajax"      : 'fakultas/data_fakultas',
        stateSave   : true,
        "order"     : []
    })

    $('#tambah_fakultas').on('submit', function(){
      var nama_fakultas      = $('#nama_fakultas').val();
      var singkatan_fakultas = $('#singkatan_fakultas').val();
      var nama_wadek_satu    = $('#nama_wadek_satu').val();
      var nip_wadek_satu     = $('#nip_wadek_satu').val();
      var mulai_jabatan      = $('#mulai_jabatan').val();
      var selesai_jabatan    = $('#selesai_jabatan').val();
  
      $.ajax({
        type      : "POST",
        url       : 'fakultas/tambah_fakultas',
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
          nama_fakultas     : nama_fakultas,
          singkatan_fakultas: singkatan_fakultas,
          nama_wadek_satu   : nama_wadek_satu,
          nip_wadek_satu    : nip_wadek_satu,
          mulai_jabatan     : mulai_jabatan,
          selesai_jabatan   : selesai_jabatan
        },
        dataType: "JSON",
        success : function (data) {
          fakultas.ajax.reload(null, false);
          swal({
            type : "success",
            title: 'Tambah Fakultas',
            text : 'Anda berhasil menambah fakultas',
          })
  
          $('#tambah-fakultas').modal('hide');
  
          $('#nama_fakultas').val('');
          $('#singkatan_fakultas').val('');
          $('#wadek_satu').val('');
          $('#nip_wadek_satu').val('');
          $('#mulai_jabatan').val('');
          $('#selesai_jabatan').val('');
        }
      })
      return false;
    });

    $('#manajemen_fakultas').on('click', '.ubah-fakultas', function(){
      var id_fakultas = $(this).data('id_fakultas');
  
      $.ajax({
        type     : "POST",
        url      : 'fakultas/edit_fakultas',
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
          id_fakultas: id_fakultas
        },
        success: function (data) {
          swal.close();
          $('#ubah_fakultas').modal('show');
          $('#form_edit_fakultas').html(data);

          $('#editfakultas').on('submit', function(){
            var edit_nama_fakultas      = $('#edit_nama_fakultas').val();
            var edit_singkatan_fakultas = $('#edit_singkatan_fakultas').val();

            var id_fakultas = $('#idfakultas').val();
            $.ajax({
              type      : "POST",
              url       : 'fakultas/update_fakultas',
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
                edit_nama_fakultas     : edit_nama_fakultas,
                edit_singkatan_fakultas: edit_singkatan_fakultas,
                id_fakultas            : id_fakultas
              },
              dataType: "JSON",
              success : function (data) {
                fakultas.ajax.reload(null, false);
                swal({
                  type : "success",
                  title: 'Ubah Fakultas',
                  text : 'Anda berhasil mengubah fakultas',
                })
        
                $('#ubah_fakultas').modal('hide');

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

    $('#manajemen_fakultas').on('click', '.ganti-wadek', function(){
      var id_fakultas = $(this).data('id_fakultas');
  
      $.ajax({
        type     : "POST",
        url      : 'fakultas/ganti_wadek',
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
          id_fakultas: id_fakultas
        },
        success: function (data) {
          swal.close();
          $('#ganti_wadek').modal('show');
          $('#form_ganti_wadek').html(data);

          $('#new_wadek').on('submit', function(){
            var fakultas_id = $('#fakultas_id').val();

            var new_nama_wadek_satu = $('#new_nama_wadek_satu').val();
            var new_nip_wadek_satu  = $('#new_nip_wadek_satu').val();
            var new_mulai_jabatan   = $('#new_mulai_jabatan').val();
            var new_selesai_jabatan = $('#new_selesai_jabatan').val();

            $.ajax({
              type      : "POST",
              url       : 'fakultas/new_wadek',
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
                new_nama_wadek_satu: new_nama_wadek_satu,
                new_nip_wadek_satu : new_nip_wadek_satu,
                new_mulai_jabatan  : new_mulai_jabatan,
                new_selesai_jabatan: new_selesai_jabatan,

                fakultas_id: fakultas_id
              },
              dataType: "JSON",
              success : function (data) {
                fakultas.ajax.reload(null, false);
                swal({
                  type : "success",
                  title: 'Ganti Dekan',
                  text : 'Anda berhasil mengganti dekan',
                })
        
                $('#ganti_wadek').modal('hide');
                
              } 
            })
            return false;
          });
        }
      });
    });

    $('#manajemen_fakultas').on('click','.detail-fakultas', function () {
      var id_fakultas = $(this).data('id_fakultas');
  
      $.ajax({
        type     : "POST",
        url      : 'fakultas/detail_fakultas',
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
        data   : {id_fakultas:id_fakultas},
        success: function (data){
          swal.close();
            $('#detail_fakultas').modal('show');
            $('#tampil_fakultas').html(data);
        }
      })
      return false;
    });

    $('#manajemen_fakultas').on('click', '.hapus-fakultas', function(){
      var id_fakultas = $(this).data('id_fakultas');
      swal({
        title             : 'Konfirmasi',
        text              : "Anda ingin hapus fakultas",
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
            url      : 'fakultas/delete_fakultas',
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
            data    : {id_fakultas:id_fakultas},
            dataType: "JSON",
            success : function(data){
              swal(
                'Hapus',
                'Fakultas berhasil di hapus',
                'success'
              )
              fakultas.ajax.reload(null, false)
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


