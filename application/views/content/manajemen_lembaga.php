<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Pusat Lembaga</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Kelola Pusat Lembaga</strong>
                </li>      
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <button data-toggle="modal" href="#tambah-lembaga" class="btn btn-primary float-right" type="submit"><i class="fa fa-pencil-square-o"></i> Tambah Data</button>
        </div>   
    </div>
    
</div>

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Daftar Pusat Lembaga Universitas Lampung</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="manajemen_lembaga" class="table table-striped table-bordered table-hover manajemen_lembaga" >
                            <thead>
                                <tr>   
                                    <th>Pusat Lembaga</th>
                                    <th>Lembaga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Pusat Lembaga</th>
                                    <th>Lembaga</th>
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

<div id="tambah-lembaga" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        <form  id="tambah_lembaga"class="form-horizontal">
            <div class="form-group">
                <label class="font-normal"><b>Lembaga</b></label>
                <select  id="lembaga_id" name="lembaga_id" class="form-control"  tabindex="2">
                    <option value="0">-Pilih Lembaga-</option>
                    <?php foreach ($lembaga as $key): ?>
                    <option value="<?php echo $key['id_lembaga'];?>"><?php echo $key['lembaga'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Pusat Lembaga</b></label>
                <input id="pusat_lembaga" name="pusat_lembaga" type="text" placeholder="Pusat Lembaga" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Ketua Pusat Lembaga</b></label>
                <input id="nama_kalembaga" name="nama_kalembaga"  type="text" placeholder="Kepala Pusat Lembaga" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-normal"><b>NIP Ketua Pusat Lembaga</b></label>
                <input id="nip_kalembaga" name="nip_kalembaga"  type="text" placeholder="NIP Kepala Pusat Lembaga" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Masa Jabatan</b><small class="text-info"></small></label>
                    <div class="input-daterange input-group" id="datepicker">
                        <input id="mulai_jabatan"  name="mulai_jabatan" type="text" class="form-control-sm form-control"data-provide="datepicker" data-date-format="yyyy-mm-dd" value="2019-09-20"/>
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
<div id="detail_lembaga" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Detail Pusat Lembaga</h4>
        </div>
        <div class="modal-body">
            <div id="tampil_lembaga">
        
            </div>
        </div>
    </div>
    </div>
</div>
<div id="ubah_lembaga" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Edit Data</h4>
            </div>
        <div class="modal-body">
        <div id="form_edit_lembaga">
        
        </div>
    </div>
</div>
</div>
</div>

<div id="ganti_kalembaga" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Ganti Kepala Pusat Lembaga</h4>
            </div>
            <div class="modal-body">
                <div id="form_ganti_kalembaga">
        
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>

<script>
  //manajemen lembaga
  $(document).ready(function () {
    var lembaga= $('#manajemen_lembaga').DataTable({
        "processing": true,
        "ajax"      : 'lembaga/data_lembaga',
        stateSave   : true,
        "order"     : []
    })

    $('#tambah_lembaga').on('submit', function(){
      var pusat_lembaga     = $('#pusat_lembaga').val();
      var lembaga_id = $('#lembaga_id').val();
      var nama_kalembaga   = $('#nama_kalembaga').val();
      var nip_kalembaga    = $('#nip_kalembaga').val();
      var mulai_jabatan      = $('#mulai_jabatan').val();
      var selesai_jabatan    = $('#selesai_jabatan').val();
  
      $.ajax({
        type      : "POST",
        url       : 'lembaga/tambah_lembaga',
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
          pusat_lembaga     : pusat_lembaga,
          lembaga_id: lembaga_id,
          nama_kalembaga   : nama_kalembaga,
          nip_kalembaga    : nip_kalembaga,
          mulai_jabatan     : mulai_jabatan,
          selesai_jabatan   : selesai_jabatan
        },
        dataType: "JSON",
        success : function (data) {
          lembaga.ajax.reload(null, false);
          swal({
            type : "success",
            title: 'Tambah Pusat Lembaga',
            text : 'Anda berhasil menambah lembaga',
          })
  
          $('#tambah-lembaga').modal('hide');
  
          $('#pusat_lembaga').val('');
          $('#lembaga_id').val('');
          $('#nama_kalembaga').val('');
          $('#nip_kalembaga').val('');
          $('#mulai_jabatan').val('');
          $('#selesai_jabatan').val('');
        }
      })
      return false;
    });

    $('#manajemen_lembaga').on('click', '.ubah-lembaga', function(){
      var id_pusat_lembaga = $(this).data('id_pusat_lembaga');
  
      $.ajax({
        type     : "POST",
        url      : 'lembaga/edit_lembaga',
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
          id_pusat_lembaga: id_pusat_lembaga
        },
        success: function (data) {
          swal.close();
          $('#ubah_lembaga').modal('show');
          $('#form_edit_lembaga').html(data);

          $('#editlembaga').on('submit', function(){
            var edit_pusat_lembaga      = $('#edit_pusat_lembaga').val();

            var id_pusat_lembaga = $('#idlembaga').val();
            $.ajax({
              type      : "POST",
              url       : 'lembaga/update_lembaga',
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
                edit_pusat_lembaga    : edit_pusat_lembaga,
                
                id_pusat_lembaga      : id_pusat_lembaga
              },
              dataType: "JSON",
              success : function (data) {
                lembaga.ajax.reload(null, false);
                swal({
                  type : "success",
                  title: 'Ubah Pusat Lembaga',
                  text : 'Anda berhasil mengubah pusat lembaga',
                })
        
                $('#ubah_lembaga').modal('hide');

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

    $('#manajemen_lembaga').on('click', '.ganti-kalembaga', function(){
      var id_pusat_lembaga = $(this).data('id_pusat_lembaga');
  
      $.ajax({
        type     : "POST",
        url      : 'lembaga/ganti_kalembaga',
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
          id_pusat_lembaga: id_pusat_lembaga
        },
        success: function (data) {
          swal.close();
          $('#ganti_kalembaga').modal('show');
          $('#form_ganti_kalembaga').html(data);

          $('#new_kalembaga').on('submit', function(){
            var pusat_lembaga_id = $('#pusat_lembaga_id').val();

            var new_nama_kalembaga = $('#new_nama_kalembaga').val();
            var new_nip_kalembaga = $('#new_nip_kalembaga').val();
            var new_mulai_jabatan   = $('#new_mulai_jabatan').val();
            var new_selesai_jabatan = $('#new_selesai_jabatan').val();

            $.ajax({
              type      : "POST",
              url       : 'lembaga/new_kalembaga',
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
                new_nama_kalembaga: new_nama_kalembaga,
                new_nip_kalembaga : new_nip_kalembaga,
                new_mulai_jabatan  : new_mulai_jabatan,
                new_selesai_jabatan: new_selesai_jabatan,

                pusat_lembaga_id: pusat_lembaga_id
              },
              dataType: "JSON",
              success : function (data) {
                lembaga.ajax.reload(null, false);
                swal({
                  type : "success",
                  title: 'Ganti Kapus Lembaga',
                  text : 'Anda berhasil mengganti KAPUS Lembaga',
                })
        
                $('#ganti_kalembaga').modal('hide');
                
              } 
            })
            return false;
          });
        }
      });
    });

    $('#manajemen_lembaga').on('click','.detail-lembaga', function () {
      var id_pusat_lembaga = $(this).data('id_pusat_lembaga');
  
      $.ajax({
        type     : "POST",
        url      : 'lembaga/detail_lembaga',
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
        data   : {id_pusat_lembaga:id_pusat_lembaga},
        success: function (data){
          swal.close();
            $('#detail_lembaga').modal('show');
            $('#tampil_lembaga').html(data);
        }
      })
      return false;
    });

    $('#manajemen_lembaga').on('click', '.hapus-lembaga', function(){
      var id_pusat_lembaga = $(this).data('id_pusat_lembaga');
      swal({
        title             : 'Konfirmasi',
        text              : "Anda ingin hapus lembaga",
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
            url      : 'lembaga/delete_lembaga',
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
            data    : {id_pusat_lembaga:id_pusat_lembaga},
            dataType: "JSON",
            success : function(data){
              swal(
                'Hapus',
                'Lembaga berhasil di hapus',
                'success'
              )
              lembaga.ajax.reload(null, false)
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


