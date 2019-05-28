<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Program Studi</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Kelola Program Studi</strong>
                </li>      
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <button data-toggle="modal" href="#tambah-prodi" class="btn btn-primary float-right" type="submit"><i class="fa fa-pencil-square-o"></i> Tambah Data</button>
        </div>   
    </div>
    
</div>

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Daftar Program Studi</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="manajemen_prodi" class="table table-striped table-bordered table-hover manajemen_user" >
                            <thead>
                                <tr>   
                                    <th>Prodi</th>
                                    <th>Fakultas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Prodi</th>
                                    <th>Fakultas</th>
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

<div id="tambah-prodi" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        <form  id="tambah_prodi"class="form-horizontal">
            <div class="form-group">
                <label class="font-normal"><b>Fakultas</b></label>
                <select  id="fakultas_id" name="fakultas_id" data-placeholder="Choose a Country..." class="form-control"  tabindex="2">
                    <option value="0">-PILIH-</option>
                    <?php foreach ($fakultas->result() as $key): ?>
                    <option value="<?php echo $key->id_fakultas;?>"><?php echo $key->nama_fakultas; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label class="font-normal"><b>Strata</b></label>
                <select id="strata_id" data-placeholder="Choose a Country..." class="form-control"  tabindex="2">
                <?php foreach ($strata->result() as $key): ?>
                    <option value="<?php echo $key->id_strata;?>"><?php echo $key->strata; ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Program Studi</b></label>
                <input id="program_studi" name="program_studi" type="text" placeholder="Program Studi" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Ketua Prodi</b></label>
                <input id="nama_kaprodi" name="nama_kaprodi"  type="text" placeholder="Ketua kaprodi" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-normal"><b>NIP Ketua Prodi</b></label>
                <input id="nip_kaprodi" name="nip_kaprodi"  type="text" placeholder="NIP kaprodi" class="form-control">
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
<div id="detail_prodi" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Detail Prodi</h4>
        </div>
        <div class="modal-body">
            <div id="tampil_prodi">
        
            </div>
        </div>
    </div>
    </div>
</div>
<div id="ubah_prodi" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Edit Data</h4>
            </div>
        <div class="modal-body">
        <div id="form_edit_prodi">
        
        </div>
    </div>
</div>
</div>
</div>

<div id="ganti_kaprodi" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Ganti Kepala Program Studi</h4>
            </div>
            <div class="modal-body">
                <div id="form_ganti_kaprodi">
        
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>

<script>
  //manajemen_jurusan
  $(document).ready(function () {
    var prodi= $('#manajemen_prodi').DataTable({
      columns : [
        { width : '50px' },
        { width : '100px' },
        { width : '100px' }       
    ], 
      "processing": true,
      "autoWidth" : true,
      "ajax"      : 'prodi/data_prodi',
      stateSave   : true,
      "order"     : []
    })

    $('#tambah_prodi').on('submit', function(){
      var fakultas_id     = $('#fakultas_id').val();
      var strata_id       = $('#strata_id').val();
      var program_studi   = $('#program_studi').val();
      var nama_kaprodi    = $('#nama_kaprodi').val();
      var nip_kaprodi     = $('#nip_kaprodi').val();
      var mulai_jabatan   = $('#mulai_jabatan').val();
      var selesai_jabatan = $('#selesai_jabatan').val();
  
      $.ajax({
        type      : "POST",
        url       : 'prodi/tambah_prodi',
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
          fakultas_id    : fakultas_id,
          strata_id      : strata_id,
          program_studi  : program_studi,
          nama_kaprodi   : nama_kaprodi,
          nip_kaprodi    : nip_kaprodi,
          mulai_jabatan  : mulai_jabatan,
          selesai_jabatan: selesai_jabatan
        },
        dataType: "JSON",
        success : function (data) {
          prodi.ajax.reload(null, false);
          swal({
            type : "success",
            title: 'Tambah Program Studi',
            text : 'Anda berhasil menambah prodi',
          })
  
          $('#tambah-prodi').modal('hide');
  
          $('#fakultas_id').val('');
          $('#strata_id').val('');
          $('#program_studi').val('');
          $('#nama_kapordi').val('');
          $('#nip_kaprodi').val('');
          $('#mulai_jabatan').val('');
          $('#selesai_jabatan').val('');
        }
      })
      return false;
    });

    $('#manajemen_prodi').on('click', '.ubah-prodi', function(){
      var id_prodi = $(this).data('id_prodi');
  
      $.ajax({
        type     : "POST",
        url      : 'prodi/edit_prodi',
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
          id_prodi: id_prodi
        },
        success: function (data) {
          swal.close();
          $('#ubah_prodi').modal('show');
          $('#form_edit_prodi').html(data);

          $('#editprodi').on('submit', function(){
            var edit_program_studi = $('#edit_program_studi').val();

            var id_prodi = $('#idprodi').val();
            $.ajax({
              type      : "POST",
              url       : 'prodi/update_prodi',
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
                edit_program_studi: edit_program_studi,

                id_prodi: id_prodi
              },
              dataType: "JSON",
              success : function (data) {
                prodi.ajax.reload(null, false);
                swal({
                  type : "success",
                  title: 'Ubah Prodi',
                  text : 'Anda berhasil mengubah Prodi',
                })
        
                $('#ubah_prodi').modal('hide');

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

    $('#manajemen_prodi').on('click', '.ganti-kaprodi', function(){
      var id_prodi = $(this).data('id_prodi');
  
      $.ajax({
        type     : "POST",
        url      : 'prodi/ganti_kaprodi',
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
          id_prodi: id_prodi
        },
        success: function (data) {
          swal.close();
          $('#ganti_kaprodi').modal('show');
          $('#form_ganti_kaprodi').html(data);

          $('#new_kaprodi').on('submit', function(){
            var prodi_id = $('#prodi_id').val();

            var new_nama_kaprodi    = $('#new_nama_kaprodi').val();
            var new_nip_kaprodi     = $('#new_nip_kaprodi').val();
            var new_mulai_jabatan   = $('#new_mulai_jabatan').val();
            var new_selesai_jabatan = $('#new_selesai_jabatan').val();

            $.ajax({
              type      : "POST",
              url       : 'prodi/new_kaprodi',
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
                new_nama_kaprodi   : new_nama_kaprodi,
                new_nip_kaprodi    : new_nip_kaprodi,
                new_mulai_jabatan  : new_mulai_jabatan,
                new_selesai_jabatan: new_selesai_jabatan,

                prodi_id: prodi_id
              },
              dataType: "JSON",
              success : function (data) {
                prodi.ajax.reload(null, false);
                swal({
                  type : "success",
                  title: 'Ganti Kapordi',
                  text : 'Anda berhasil mengganti kaprodi',
                })
        
                $('#ganti_kaprodi').modal('hide');
                
              } 
            })
            return false;
          });
        }
      });
    });

    $('#manajemen_prodi').on('click','.detail-prodi', function () {
      var id_prodi = $(this).data('id_prodi');
  
      $.ajax({
        type     : "POST",
        url      : 'prodi/detail_prodi',
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
        data   : {id_prodi:id_prodi},
        success: function (data){
          swal.close();
            $('#detail_prodi').modal('show');
            $('#tampil_prodi').html(data);
        }
      })
      return false;
    });

    $('#manajemen_prodi').on('click', '.hapus-prodi', function(){
      var id_prodi = $(this).data('id_prodi');
      swal({
        title             : 'Konfirmasi',
        text              : "Anda ingin hapus prodi",
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
            url      : 'prodi/delete_prodi',
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
            data    : {id_prodi:id_prodi},
            dataType: "JSON",
            success : function(data){
              swal(
                'Hapus',
                'Fakultas berhasil di prodi',
                'success'
              )
              prodi.ajax.reload(null, false)
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

