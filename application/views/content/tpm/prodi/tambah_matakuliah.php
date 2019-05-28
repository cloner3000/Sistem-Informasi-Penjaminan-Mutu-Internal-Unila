<div class="ibox-content profile-content">  
    <form  id="tambah_matkul" class="form-horizontal">
        <div class="form-group">
            <label class="font-normal"><b>Kode Mata Kuliah</b></label>
                <input id="kurikulum_id" name="kurikulum_id" type="hidden" value="<?php echo $data_kurikulum['id_kurikulum']?>">
                <input id="prodi_id" name="prodi_id" type="hidden" value="<?php echo $data_kurikulum['prodi_id']?>">
                <input id="kode_mk" name="kode_mk" type="text" placeholder="Kode Matakuliah" class="form-control">
        </div>
        <div class="form-group">
            <label class="font-normal"><b>Nama Mata Kuliah</b></label>
            <input id="nama_mk" name="nama_mk" type="text" placeholder="Nama Matakuliah" class="form-control">
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-normal"><b>Sks Teori</b></label>
                    <input id="sks_teori" onkeyup="sumsks();" name="sks_teori" type="text" placeholder="SKS Teori" class="form-control">
                </div> 
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-normal"><b>Sks Praktikum</b></label>
                    <input id="sks_prak" onkeyup="sumsks();" name="sks_prak" type="text" placeholder="SKS Praktikum" class="form-control">
                    <small class="text-success">*) isi 0 jika tidak ada sks praktikum </small>
                </div> 
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-normal"><b>Total</b></label>
                    <input id="total" name="total" type="text" placeholder="Total" class="form-control">
                    
                </div> 
            </div>
        </div> 
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-normal"><b>Bobot Teori</b></label>
                    <input id="bobot_teori" onkeyup="sumsks();" name="bobot_teori" type="text" placeholder="Bobot Teori" class="form-control">
                </div> 
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-normal"><b>Bobot Praktikum</b></label>
                    <input id="bobot_prak" name="bobot_prak" type="text" placeholder="Bobot Praktikum" class="form-control">
                </div> 
            </div>
        </div>  
        <div class="modal-footer">
            <small class="text-success">*) Pada bagian Total, Bobot Teori, dan Bobot Praktikum pengisian akan dilakukan oleh sistem secara otomatis setelah mengisi sks teori dan praktikum </small>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<script>
              function sumsks() {
                  var kul = document.getElementById('sks_teori').value;
                  var prak = document.getElementById('sks_prak').value;
                  var result = parseInt(kul) + parseInt(prak);
                      if (!isNaN(result)) {
                       document.getElementById('total').value = result;
                      }

                  var total = document.getElementById('total').value;
                  var bokul= parseInt(kul) / parseInt(total);
                      if (!isNaN(bokul)) {
                       document.getElementById('bobot_teori').value = bokul.toFixed(2);
                      }

                  var total = document.getElementById('total').value;
                  var boprak= parseInt(prak) / parseInt(total);
                      if (!isNaN(boprak)) {
                       document.getElementById('bobot_prak').value = boprak.toFixed(2);
                      }

                 
                  }
              </script>