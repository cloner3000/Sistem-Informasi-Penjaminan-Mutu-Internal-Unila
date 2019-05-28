<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Borang</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Manajemen Borang</strong>
                </li>      
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="ibox-content center">
            <div class="title-action">
                <button data-toggle="modal" href="#tambah-borang-praktikum" class="btn btn-primary float-right" type="submit"><i class="fa fa-pencil-square-o"></i> Tambah Data</button>
            </div>  
        </div>   
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Manjemen Borang Praktikum</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="borang_praktikum" class="table table-striped table-bordered table-hover borang_praktikum" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Bobot</th>
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

<div id="tambah-borang-praktikum" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        <form  id="tambah_borang_praktikum" method="post" class="form-horizontal">
            <div class="form-group">
                <label><b>Jenis Borang</b></label> 
                <select class="jenis_borang_praktikum form-control" name="jenis_borang_praktikum_id" id="jenis_borang_praktikum_id">
                      <option value="">- Jenis Borang -</option>
                      <?php foreach($jenis_borang->result() as $row):?>
                      <option  value="<?php echo $row->id_jenis_borang?>"><?php echo $row->jenis_borang;?></option>
                  <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label><b>Aspek Penilaian</b></label> 
                <select class="aspek_praktikum form-control" name="aspek_penilaian_praktikum_id" id="aspek_penilaian_praktikum_id">
                      <option value="">- Aspek Penilaian -</option>
                </select>
            </div>
            <div class="form-group">
                <label><b>Bobot</b></label> 
                <input  id="bobot" name="bobot" type="number" placeholder="bobot" class="form-control">
            </div>

            <div class="form-group">
                <label><b>Pertanyaan</b></label> 
                <textarea id="pertanyaan" name="pertanyaan" type="number"   placeholder="pertanyaan" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                <label><b>Opsi 1</b></label> 
                    <div class="input-group">
                        <input id="opsi" type="text"  name="opsi[]" type="text" class="form-control" placeholder="opsi jawaban"> 
                        <span class="input-group-append"> 
                            <button onclick="education_fields();" type="button" type="button" class="btn btn-primary">+</button> 
                        </span>
                    </div>
                </div>
            </div>
          <div id="education_fields" >
                
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

<div id="ubah_borang_praktikum" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Edit Data</h4>
        </div>
        <div class="modal-body">
            <div id="form_ubah_borang_praktikum">

            </div>
        </div>
        
    </div>
    </div>
</div>

<div id="detail_borang_praktikum" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Detail Borang</h4>
        </div>
        <div class="modal-body">
            <div id="tampil_borang_praktikum">

            </div>
        </div>
        
    </div>
    </div>
</div>

<script type="text/javascript">
var room = 1;
var opsi = 1;
function education_fields() {
 
    room++;
    opsi++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<label class="col-sm-2 control-label"><b>Opsi '+ opsi +'</b></label><div class="col-sm-10"><div class="input-group input-group-sm"><input type="text" id="opsi" name="opsi[]" class="form-control"  placeholder="opsi jawaban"><span class="input-group-btn"><button class="btn btn-danger btn-flat" type="button" onclick="remove_education_fields('+ room +');">-</button></span></div></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>

<script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>

<script>
//manajemen borang praktikum
$(document).ready(function(){
  var borang = $('#borang_praktikum').DataTable({
    columns : [
      { width : '2px' },
      { width : '100px' },
      { width : '50px' },
      { width : '50px' }       
  ], 

    "processing": true,
    "autoWidth" : false,
    "ajax"      : 'data_borang_praktikum',
    stateSave   : true,
    "order": [[ 3, "desc" ]],
    fixedColumns: {
      leftColumns : 1,
      rightColumns: 1
  }
  })

  $('#tambah_borang_praktikum').on('submit', function(){
    var jenis_borang_praktikum_id    = $('#jenis_borang_praktikum_id').val();
    var aspek_penilaian_praktikum_id = $('#aspek_penilaian_praktikum_id').val();
    var bobot              = $('#bobot').val();
    var pertanyaan         = $('#pertanyaan').val();
    
    var opsi = $('input[name="opsi[]"]').map(function(){ 
      return this.value; 
    }).get();

    $.ajax({
      type      : "POST",
      url       : 'tambah_borang_praktikum',
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
        jenis_borang_praktikum_id   : jenis_borang_praktikum_id,
        aspek_penilaian_praktikum_id: aspek_penilaian_praktikum_id,
        bobot             : bobot,
        pertanyaan        : pertanyaan,

        'opsi[]': opsi,
      },
      dataType: "JSON",
      success : function (data) {
        borang.ajax.reload(null, false);
        swal({
          type : "success",
          title: 'Tambah Borang',
          text : 'Anda berhasil menambah borang',
        })

        $('#tambah-borang-praktikum').modal('hide');

      
        $('#jenis_borang_praktikum_id').val('');
        $('#aspek_penilaian_praktikum_id').val('');
        $('#bobot').val('');
        $('#pertanyaan').val('');
        $('input[name="opsi[]"]').val('')
      }
    })
    return false;
  });

  $('#borang_praktikum').on('click','.detail-borang', function () {
    var id_borang_praktikum = $(this).data('id_borang_praktikum');

    $.ajax({
      type     : "POST",
      url      : 'detail_borang_praktikum',
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
      data   : {id_borang_praktikum:id_borang_praktikum},
      success: function (data){
        swal.close();
          $('#detail_borang_praktikum').modal('show');
          $('#tampil_borang_praktikum').html(data);
      }
    })
    return false;
  });

  $('#borang_praktikum').on('click', '.ubah-borang', function(){
    var id_borang_praktikum = $(this).data('id_borang_praktikum');

    var pertanyaan = $(this).data('pertanyaan');
    var bobot  = $(this).data('max_bobot');

    $.ajax({
      type     : "POST",
      url      : 'update_borang_praktikum',
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
        id_borang_praktikum: id_borang_praktikum,

        pertanyaan : pertanyaan,
        bobot : bobot
      },
      success: function (data) {
        swal.close();
        $('#ubah_borang_praktikum').modal('show');
        $('#form_ubah_borang_praktikum').html(data);

        $('#edit_borang_praktikum').on('submit', function(){
          var edit_bobot_praktikum    = $('#edit_bobot_praktikum').val();
          var edit_pertanyaan_praktikum    = $('#edit_pertanyaan_praktikum').val();

          var idborangpraktikum = $('#idborangpraktikum').val();
          $.ajax({
            type      : "POST",
            url       : 'act_edit_pertanyaan_praktikum',
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
              edit_bobot_praktikum     : edit_bobot_praktikum,
              edit_pertanyaan_praktikum   : edit_pertanyaan_praktikum,

              idborangpraktikum             : idborangpraktikum
            },
            dataType: "JSON",
            success : function (data) {
              borang.ajax.reload(null, false);
              swal({
                type : "success",
                title: 'Ubah Borang',
                text : 'Anda berhasil mengubah borang',
              })
      
              $('#ubah_borang_praktikum').modal('hide');

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

  $('#borang_praktikum').on('click', '.hapus-borang', function(){
    var id_borang_praktikum = $(this).data('id_borang_praktikum');
    swal({
      title             : 'Konfirmasi',
      text              : "Anda ingin hapus Pertanyaan",
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
          url      : 'act_hapus_pertanyaan_praktikum',
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
          data    : {id_borang_praktikum :id_borang_praktikum},
          dataType: "JSON",
          success : function(data){
            swal(
              'Hapus',
              'Pertanyaan berhasil di hapus',
              'success'
            )
            borang.ajax.reload(null, false)
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

$(document).ready(function(){
  $('.jenis_borang_praktikum').change(function(){
      var id = $(this).val();
      $.ajax({
          url     : "get_aspek_praktikum_id",
          method  : "POST",
          data    : {id: id},
          async   : false,
          dataType: 'json',
          success : function(data){
              var html = '';
              var i;
              for(i=0; i<data.length; i++){
                  html += '<option value="'+data[i].id_aspek_penilaian_p+'">'+data[i].aspek_penilaian+' ('+data[i].max_bobot+')'+'</option>';
              }
              $('.aspek_praktikum').html(html);
               
          }
      });
  });
});

</script>






 


        