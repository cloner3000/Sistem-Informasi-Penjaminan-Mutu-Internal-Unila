<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Jadwal</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Kelola Jadwal</strong>
                </li>      
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <button data-toggle="modal" href="#tambah-jadwal" class="btn btn-primary float-right" type="submit"><i class="fa fa-pencil-square-o"></i> Tambah Data</button>
        </div>   
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Daftar Jadwal Audit</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="manajemen_jadwal" class="table table-striped table-bordered table-hover manajemen_user" >
                            <thead>
                                <tr>   
                                    <th>Mulai Audit</th>
                                    <th>Selesai Audit</th>
                                    <th>Role User</th>
                                    <th>Jenis Audit</th>
                                    <th>Status</th>
                                    <th>Semester</th>
                                    <!-- <th>Tahun</th> -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Mulai Audit</th>
                                    <th>Selesai Audit</th>
                                    <th>Role User</th>
                                    <th>Jenis Audit</th>
                                    <th>Status</th>
                                    <th>Semester</th>
                                    <!-- <th>Tahun</th> -->
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

<div id="tambah-jadwal" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        <form  id="tambah_jadwal" class="form-horizontal">
            <div class="form-group">
                <label class="font-normal"><b>Tanggal Mulai Audit</b><small class="text-info"> (*yyyy-mm-dd")</small></label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input id="mulai_audit" name="mulai_audit" type="text" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d')?>" required>
                    </div>
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Tanggal Selesai Audit</b><small class="text-info"> (*yyyy-mm-dd")</small></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input id="selesai_audit" name="selesai_audit" type="text" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d')?>" required>
                    </div>
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Role User</b></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <select id="role_id" name="role_id" class="form-control m-b" required>
                            <option value="">-Pilih Role-</option>
                            <?php foreach($role as $row):?>
                                <?php if($row['id_role'] !="1" && $row['id_role'] !="4" ) {?>
                                    <option  value="<?php echo $row['id_role'];?>"><?php echo $row['role'];?></option>
                                <?php }?>
                            <?php endforeach;?>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Semester</b></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <select id="semester_id" name="semester_id" class="form-control m-b" required>
                            <option value="">-Pilih Semester-</option>
                            <?php foreach($semester->result() as $row):?>
                                <option  value="<?php echo $row->id_semester;?>"><?php echo $row->semester;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Tahun Ajaran</b></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <select id="tahun_akademik_id" name="tahun_akademik_id" class="form-control m-b" required>
                            <option value="">-Tahun Ajaran-</option>
                            <?php foreach($tahun_akademik->result() as $row):?>
                                <option  value="<?php echo $row->id_tahun_akademik;?>"><?php echo $row->tahun_akademik;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label class="font-normal"><b>Jenis Audit</b></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-share-alt"></i></span>
                        <select id="jenis_audit_id" name="jenis_audit_id" class="form-control m-b" required>
                            <option value="">-Pilih Jenis Audit-</option>
                            <?php foreach($jenis_audit->result() as $row):?>
                                <option  value="<?php echo $row->id_jenis_audit;?>"><?php echo $row->jenis_audit;?></option>
                            <?php endforeach;?>
                        </select>
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

<div id="ubah_jadwal" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                <h4 class="modal-title">Edit Data</h4>
            </div>
        <div class="modal-body">
        <div id="form_edit_jadwal">
        
        </div>
    </div>
</div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>

<script>
//manajemen jadwal
$(document).ready(function(){
    var jadwal = $('#manajemen_jadwal').DataTable({
  
      "processing": true,
      "autoWidth" : false,
      "ajax"      : 'data_jadwal',
      stateSave   : true,
      "order"     : []
    })
  
    $('#tambah_jadwal').on('submit', function(){
      var mulai_audit       = $('#mulai_audit').val();
      var selesai_audit     = $('#selesai_audit').val();
      var role_id    = $('#role_id').val();
      var semester_id       = $('#semester_id').val();
      var tahun_akademik_id = $('#tahun_akademik_id').val();
      var jenis_audit_id    = $('#jenis_audit_id').val();
  
      $.ajax({
        type      : "POST",
        url       : 'tambah_jadwal',
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
          mulai_audit      : mulai_audit,
          selesai_audit    : selesai_audit,
          semester_id      : semester_id,
          role_id : role_id,
          tahun_akademik_id: tahun_akademik_id,
          jenis_audit_id   : jenis_audit_id,
        },
        dataType: "JSON",
        success : function (data) {
          jadwal.ajax.reload(null, false);
          swal({
            type : "success",
            title: 'Tambah Jadwal',
            text : 'Anda berhasil menambah jadwal',
          })
  
          $('#tambah-jadwal').modal('hide');
  
          $('#mulai_audit').val('');
          $('#selesai_audit').val('');
          $('#role_id').val('');
          $('#semester_id').val('');
          $('#tahun_akademik_id').val('');
          $('#jenis_audit_id').val('');
        }
      })
      return false;
    });
  
    $('#manajemen_jadwal').on('click', '.ubah-jadwal', function(){
      var id_jadwal = $(this).data('id_jadwal');
  
      $.ajax({
        type     : "POST",
        url      : 'edit_jadwal',
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
          id_jadwal: id_jadwal
        },
        success: function (data) {
          swal.close();
          $('#ubah_jadwal').modal('show');
          $('#form_edit_jadwal').html(data);

          $('#editjadwal').on('submit', function(){
            var edit_mulai_audit       = $('#edit_mulai_audit').val();
            var edit_selesai_audit     = $('#edit_selesai_audit').val();
            var edit_semester_id       = $('#edit_semester_id').val();
            var edit_tahun_akademik_id = $('#edit_tahun_akademik_id').val();
            var edit_jenis_audit_id    = $('#edit_jenis_audit_id').val();

            var id_jadwal = $('#idjadwal').val();
            $.ajax({
              type      : "POST",
              url       : 'update_jadwal',
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
                edit_mulai_audit      : edit_mulai_audit,
                edit_selesai_audit    : edit_selesai_audit,
                edit_semester_id      : edit_semester_id,
                edit_tahun_akademik_id: edit_tahun_akademik_id,
                edit_jenis_audit_id   : edit_jenis_audit_id,
                id_jadwal             : id_jadwal
              },
              dataType: "JSON",
              success : function (data) {
                jadwal.ajax.reload(null, false);
                swal({
                  type : "success",
                  title: 'Ubah Jadwal',
                  text : 'Anda berhasil mengubah jadwal',
                })
        
                $('#ubah_jadwal').modal('hide');

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
    })

    $('#manajemen_jadwal').on('click', '.hapus-jadwal', function(){
      var id_jadwal = $(this).data('id_jadwal');
      swal({
        title             : 'Konfirmasi',
        text              : "Anda ingin hapus jadwal",
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
            url      : 'delete_jadwal',
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
            data    : {id_jadwal:id_jadwal},
            dataType: "JSON",
            success : function(data){
              swal(
                'Hapus',
                'Jadwal berhasil di hapus',
                'success'
              )
              jadwal.ajax.reload(null, false)
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


