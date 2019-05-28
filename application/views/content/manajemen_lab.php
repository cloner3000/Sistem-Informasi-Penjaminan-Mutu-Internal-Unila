<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Laboratorium</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Kelola Laboratorium</strong>
                </li>      
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <button data-toggle="modal" href="#tambah-lab" class="btn btn-primary float-right" type="submit"><i class="fa fa-pencil-square-o"></i> Tambah Data</button>
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
                        <table id="manajemen_lab" class="table table-striped table-bordered table-hover manajemen_lab" >
                            <thead>
                                <tr>   
                                    <th>Laboratorium</th>
                                    <th>Fakultas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Laboratorium</th>
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

<div id="tambah-lab" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        <form  id="tambah_lab"class="form-horizontal">
            <div class="form-group">
                <label class="font-normal"><b>Laboratorium</b></label>
                <input id="nama_lab" name="nama_lab" type="text" placeholder="Laboratorium" class="form-control">
            </div>
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
                <label class="font-normal"><b>Kepala Lab</b></label>
                <input id="nama_kalab" name="nama_kalab" type="text" placeholder="Kepala Laboratorium" class="form-control">
            </div>
            <div class="form-group">
                <label class="font-normal"><b>NIP Kepala Lab</b></label>
                <input id="nip_kalab" name="nip_kalab" type="text" placeholder="NIP Kepala Laboratorium" class="form-control">
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
<div id="detail_lab" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Detail Fakultas</h4>
        </div>
        <div class="modal-body">
            <div id="tampil_lab">
        
            </div>
        </div>
    </div>
    </div>
</div>
<div id="ubah_lab" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Edit Data</h4>
            </div>
        <div class="modal-body">
        <div id="form_edit_lab">
        
        </div>
    </div>
</div>
</div></div>

<div id="ganti_kalab" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Ganti Kepala Laboratorium</h4>
            </div>
            <div class="modal-body">
                <div id="form_ganti_kalab">
        
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>


<script>
//manajemen laboratorium
$(document).ready(function () {
    var lab = $('#manajemen_lab').DataTable({
        "processing": true,
        "ajax"      : 'lab/data_lab',
        stateSave   : true,
        "order"     : []
    })

    $('#tambah_lab').on('submit', function(){
      var nama_lab      = $('#nama_lab').val();
      var fakultas_id = $('#fakultas_id').val();
      var nama_kalab    = $('#nama_kalab').val();
      var nip_kalab   = $('#nip_kalab').val();
      var mulai_jabatan      = $('#mulai_jabatan').val();
      var selesai_jabatan    = $('#selesai_jabatan').val();
  
      $.ajax({
        type      : "POST",
        url       : 'lab/tambah_lab',
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
          nama_lab    : nama_lab,
          fakultas_id: fakultas_id,
          nama_kalab   : nama_kalab,
          nip_kalab   : nip_kalab,
          mulai_jabatan     : mulai_jabatan,
          selesai_jabatan   : selesai_jabatan
        },
        dataType: "JSON",
        success : function (data) {
          lab.ajax.reload(null, false);
          swal({
            type : "success",
            title: 'Tambah Laboratorium',
            text : 'Anda berhasil menambah Laboratorium',
          })
  
          $('#tambah-lab').modal('hide');
  
          $('#nama_lab').val('');
          $('#fakultas_id').val('');
          $('#nama_kalab').val('');
          $('#nip_kalab').val('');
          $('#mulai_jabatan').val('');
          $('#selesai_jabatan').val('');
        }
      })
      return false;
    });

    $('#manajemen_lab').on('click', '.ubah-lab', function(){
      var id_lab = $(this).data('id_lab');
  
      $.ajax({
        type     : "POST",
        url      : 'lab/edit_lab',
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
          id_lab: id_lab
        },
        success: function (data) {
          swal.close();
          $('#ubah_lab').modal('show');
          $('#form_edit_lab').html(data);

          $('#editlab').on('submit', function(){
            var edit_nama_lab     = $('#edit_nama_lab').val();

            var id_lab = $('#idlab').val();
            $.ajax({
              type      : "POST",
              url       : 'lab/update_lab',
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
                edit_nama_lab    : edit_nama_lab,
                
                id_lab          : id_lab
              },
              dataType: "JSON",
              success : function (data) {
                lab.ajax.reload(null, false);
                swal({
                  type : "success",
                  title: 'Ubah Laboratorium',
                  text : 'Anda berhasil mengubah Laboratorium',
                })
        
                $('#ubah_lab').modal('hide');

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

    $('#manajemen_lab').on('click', '.ganti-kalab', function(){
      var id_lab = $(this).data('id_lab');
  
      $.ajax({
        type     : "POST",
        url      : 'lab/ganti_kalab',
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
          id_lab: id_lab
        },
        success: function (data) {
          swal.close();
          $('#ganti_kalab').modal('show');
          $('#form_ganti_kalab').html(data);

          $('#new_kalab').on('submit', function(){
            var lab_id = $('#lab_id').val();

            var new_nama_kalab = $('#new_nama_kalab').val();
            var new_nip_kalab = $('#new_nip_kalab').val();
            var new_mulai_jabatan   = $('#new_mulai_jabatan').val();
            var new_selesai_jabatan = $('#new_selesai_jabatan').val();

            $.ajax({
              type      : "POST",
              url       : 'lab/new_kalab',
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
                new_nama_kalab: new_nama_kalab,
                new_nip_kalab : new_nip_kalab,
                new_mulai_jabatan  : new_mulai_jabatan,
                new_selesai_jabatan: new_selesai_jabatan,

                lab_id: lab_id
              },
              dataType: "JSON",
              success : function (data) {
                lab.ajax.reload(null, false);
                swal({
                  type : "success",
                  title: 'Ganti Kepala Lab',
                  text : 'Anda berhasil mengganti kalab',
                })
        
                $('#ganti_kalab').modal('hide');
                
              } 
            })
            return false;
          });
        }
      });
    });

    $('#manajemen_lab').on('click','.detail-lab', function () {
      var id_lab = $(this).data('id_lab');
  
      $.ajax({
        type     : "POST",
        url      : 'lab/detail_lab',
        beforSend: function (){
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
        data   : {id_lab:id_lab},
        success: function (data){
          swal.close();
            $('#detail_lab').modal('show');
            $('#tampil_lab').html(data);
        }
      })
      return false;
    });

    $('#manajemen_lab').on('click', '.hapus-lab', function(){
      var id_lab = $(this).data('id_lab');
      swal({
        title             : 'Konfirmasi',
        text              : "Anda ingin hapus Laboratorium",
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
            url      : 'lab/delete_lab',
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
            data    : {id_lab:id_lab},
            dataType: "JSON",
            success : function(data){
              swal(
                'Hapus',
                'Laboratorium berhasil di hapus',
                'success'
              )
              lab.ajax.reload(null, false)
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



