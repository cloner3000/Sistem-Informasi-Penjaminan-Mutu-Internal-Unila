<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Rekapitulasi</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Rekapitulasi</strong>
                </li>      
            </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Kelola Rekapitulasi</h5>
                </div>
                <div class="ibox-content">
                    <form action="<?php echo base_url().'tpm/tpm_lab/update_tpm_lab'?>" method="post">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label"><b>Jenis Audit</b></label>
                            <div class="col-lg-10">
                                <select class="form-control" name="" id="">
                                    <option value="">- Pilih Jenis Audit</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label"><b>Tahun Akademik</b></label>
                            <div class="col-lg-10">
                                <input name="nama_tpm_lab" type="text" placeholder="Tahun Akademik" class="form-control" required> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label"><b>Semester</b></label>
                                <div class="col-lg-10">
                                    <input name="nip_tpm_lab" type="text" placeholder="Semester" class="form-control"  required> 
                                </div>
                        </div>
                                
                        <div class="modal-footer">
                            <button name="submit" value="Simpan" type="submit" class="btn btn-danger">Reset</button>
                            <button name="submit" value="Simpan" type="submit" class="btn btn-success">Proses</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

