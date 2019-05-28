<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Kurikulum</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Kurikulum</strong>
                </li>      
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <button data-toggle="modal" href="#tambah-kurikulum" class="btn btn-primary float-right" type="submit"><i class="fa fa-pencil-square-o"></i> Tambah Data</button>
        </div>   
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Daftar Kurikulum</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="kurikulum" class="table table-striped table-bordered table-hover kurikulum" >
                            <thead>
                                <tr>   
                                    <th>Kurikulum</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Kurikulum</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="daftar_matakuliah">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox"> 
                
            </div>        
        </div>
    </div>
    </div>
</div>



<div id="tambah-kurikulum" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        <form  id="tambah_kurikulum"class="form-horizontal">
            <div class="form-group">
                <label class="font-normal"><b>kurikulum</b></label>
                <?php if ($this->session->userdata('role_id') == '2') {?>
                    <?php foreach ($tpm_prodi as $tpmp):?>
                        <?php if ($this->session->userdata('id_user') == $tpmp['user_id'] ) {?>
                            <input id="prodi_id" name="prodi_id" type="hidden" value="<?php echo $tpmp['prodi_id']?>"  onblur="yearValidation(this.value,event)" onkeypress="yearValidation(this.value,event)"required>
                        <?php }?>
                    <?php endforeach;?>
                <?php }?>
                <input id="kurikulum_tahun" name="kurikulum" type="number" placeholder="Kurikulum" class="form-control">
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

<div id="tambah-matkul" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
            <div id="form_tambah_matkul">
            
            </div>
        </div>
    </div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>

<script>
    function yearValidation(year,ev) {

      var text = /^[0-9]+$/;
      if(ev.type=="blur" || year.length==4 && ev.keyCode!=8 && ev.keyCode!=46) {
        if (year != 0) {
            if ((year != "") && (!text.test(year))) {
    
                alert("Please Enter Numeric Values Only");
                return false;
            }
    
            if (year.length != 4) {
                alert("Year is not proper. Please check");
                return false;
            }
            var current_year=new Date().getFullYear();
            if((year < 1920) || (year > current_year))
                {
                alert("Year should be in range 1920 to current year");
                return false;
                }
            return true;
        } }
    }
</script>

<script>
$(document).ready(function(){
    $.fn.dataTable.ext.errMode = 'none';
    var data_kurikulum = $('#kurikulum').on( 'error.dt', function ( e, settings, techNote, message ) {
        swal({
            type : "error",
            title: "Gagal",
            text: "Data masih kosong, input daftar audit mata kuliah terlebih dahulu!",
            showConfirmButton: false,
            timer: 4000,
        });
    }).DataTable({
    "processing": true,
    "autoWidth" : false,
    "ajax"      : 'data_kurikulum',
    stateSave   : true,
    "order"     : [],

  })

  $('#tambah_kurikulum').on('submit', function(){
    var prodi_id       = $('#prodi_id').val();
    var kurikulum_tahun    = $('#kurikulum_tahun').val();

    $.ajax({
      type      : "POST",
      url       : 'act_kurikulum',
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
        prodi_id     : prodi_id ,
        kurikulum_tahun   : kurikulum_tahun,
      },
      dataType: "JSON",
      success : function (data) {
        data_kurikulum.ajax.reload(null, false);
        swal({
          type : "success",
          title: 'Tambah Kurikulum',
          text : 'Anda berhasil menambah Kurikulum',
        })

        $('#tambah-kurikulum').modal('hide');
        $('#kurikulum').val('');
      }
    })
    return false;
  })

  $('#kurikulum').on('click','.ubah-kurikulum', function () {
    var id_kurikulum = $(this).data('id_kurikulum');

    $.ajax({
      type     : "POST",
      url      : 'detail_kurikulum',
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
      data   : {id_kurikulum:id_kurikulum},
      success: function (data){
        swal.close();
          $('#tambah-matkul').modal('show');
          $('#form_tambah_matkul').html(data);

          $('#tambah_matkul').on('submit', function(){

            var prodi_id = $('#prodi_id').val();
            var kurikulum_id = $('#kurikulum_id').val();
            var kode_mk = $('#kode_mk').val();
            var nama_mk = $('#nama_mk').val();
            var sks_teori = $('#sks_teori').val();
            var sks_prak = $('#sks_prak').val();
            var total = $('#total').val();
            var bobot_teori = $('#bobot_teori').val();
            var bobot_prak = $('#bobot_prak').val();

            $.ajax({
              type      : "POST",
              url       : 'act_tambah_mk',
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
                prodi_id    : prodi_id,
                kurikulum_id : kurikulum_id,
                kode_mk : kode_mk,
                nama_mk : nama_mk,
                sks_teori : sks_teori,
                sks_prak : sks_prak,
                total : total,
                bobot_teori : bobot_teori,
                bobot_prak : bobot_prak,
            
              },
              dataType: "JSON",
              success : function (data) {
                data_kurikulum.ajax.reload(null, false);
                swal({
                  type : "success",
                  title: 'Tambah Mata Kuliah',
                  text : 'Anda berhasil menambah matakuliah',
                })
        
                $('#tambah-matkul').modal('hide');
  
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
    })
    return false;
  });

  $('#kurikulum').on('click','.lihat-matakulaih', function () {
    var id_kurikulum = $(this).data('id_kurikulum');

    $.ajax({
      type     : "POST",
      url      : 'daftar_mk',
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
      data   : {id_kurikulum:id_kurikulum},
      success: function (data){
        swal.close();
          $('#daftar_matakuliah').html(data);
      }
    })
    return false;
  });
  
  $('#kurikulum').on('click', '.hapus-kurikulum', function(){
      var id_kurikulum = $(this).data('id_kurikulum');
      swal({
        title             : 'Konfirmasi',
        text              : "Anda ingin hapus kurikulum?",
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
            url      : 'act_hapus_kurikulum',
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
            data    : {id_kurikulum:id_kurikulum},
            dataType: "JSON",
            success : function(data){
              swal({
                    type : "success",
                    title: "Hapus",
                    text: "Kurikulum berhasil di hapus",
                    showConfirmButton: false,
                });

                data_kurikulum.ajax.reload();
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

        return false;
    });
});
</script>






