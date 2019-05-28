<div class="ibox-title">
    <h5>Daftar Mata Kuliah Kurikulum <?php echo $data_kurikulum['kurikulum']?> Prodi <?php echo $data_kurikulum['program_studi']?></h5>
    <div class="ibox-tools">
        <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
        </a>
        <a class="close-link">
            <i class="fa fa-times"></i>
        </a>
    </div>
</div>
<div class="ibox-content">
    <div class="table-responsive">
        <table id="daftar_mk" class="table table-striped table-bordered table-hover daftar_mk" >
            <thead>
                <tr>
                    <th>Kode MK</th>
                    <th>Nama MK</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($matakuliah as $matkul): ?>
                <?php  if ($data_kurikulum['id_kurikulum'] == $matkul['kurikulum_id']) {?>
                    <tr class="gradeC">
                        <td><?php echo $matkul['kode_mk']?></td>
                        <td><?php echo $matkul['nama_mk']?> (<?php echo $matkul['sks_teori']?>-<?php echo $matkul['sks_prak']?>) SKS</td>
                        <td>
                            <button class="btn btn-xs btn-primary ubah-matkul" id="id_mata_kuliah" data-toggle='modal' data-id_mata_kuliah="<?php echo $matkul['id_mata_kuliah']?>"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-xs btn-danger hapus-matkul" id="id_mata_kuliah" data-toggle='modal' data-id_mata_kuliah="<?php echo $matkul['id_mata_kuliah']?>"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Kode MK</th>
                    <th>Nama MK</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div id="edit-matkul" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <!-- <i class="fa fa-user modal-icon"></i> -->
            <h4 class="modal-title">Edit Data</h4>
        </div>
        <div class="modal-body">
            <div id="form_edit_matkul">
            
            </div>
        </div>
    </div>
    </div>
</div>

<script>
$(document).ready(function(){
    var daftar_mk = $('#daftar_mk').DataTable({
        "processing": true,
        "autoWidth" : false,
        stateSave   : true,
        "ordering": false,
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'print',
            customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            },
        ]
    })

    $('#daftar_mk').on('click', '.ubah-matkul', function(){
      var id_mata_kuliah = $(this).data('id_mata_kuliah');

      $.ajax({
        type     : "POST",
        url      : '<?php echo base_url(); ?>tpm/tpm_prodi/edit_matkul',
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
          id_mata_kuliah: id_mata_kuliah
        },
        success: function (data) {
          swal.close();
          $('#edit-matkul').modal('show');
          $('#form_edit_matkul').html(data);

          $('#edit_matkul').on('submit', function(){
            var kode_mk = $('#kode_mk').val();
            var nama_mk = $('#nama_mk').val();
            var sks_teori = $('#sks_teori').val();
            var sks_prak = $('#sks_prak').val();
            var total = $('#total').val();
            var bobot_teori = $('#bobot_teori').val();
            var bobot_prak = $('#bobot_prak').val();

            var id_matkul = $('#id_matkul').val();

            $.ajax({
              type      : "POST",
              url       : '<?php echo base_url(); ?>tpm/tpm_prodi/act_edit_matkul',          
              data: {
                kode_mk : kode_mk,
                nama_mk : nama_mk,
                sks_teori : sks_teori,
                sks_prak : sks_prak,
                total : total,
                bobot_teori : bobot_teori,
                bobot_prak : bobot_prak,
               
                id_matkul: id_matkul
              },
              dataType: "JSON",
              success : function (data) {
                swal({
                    type : "success",
                    title: "Edit",
                    text: "Mata Kuliah berhasil di edit",
                    showConfirmButton: false,
                    timer: 4000,
                });
                window.location.reload();            
              } 
            })
            return false;
          });
        }
      });
    })

    $('#daftar_mk').on('click', '.hapus-matkul', function(){
      var id_mata_kuliah = $(this).data('id_mata_kuliah');
      swal({
        title             : 'Konfirmasi',
        text              : "Anda ingin hapus Mata Kuliah",
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
            url      : 'act_hapus_matkul',
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
            data    : {id_mata_kuliah:id_mata_kuliah},
            dataType: "JSON",
            success : function(data){
                swal({
                    type : "success",
                    title: "Hapus",
                    text: "Mata Kuliah berhasil di hapus",
                    showConfirmButton: false,
                    timer: 4000,
                });
                window.location.reload();
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