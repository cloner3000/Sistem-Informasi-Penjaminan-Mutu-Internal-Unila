<link href="<?php echo base_url("assets/css/plugins/steps/jquery.steps.css");?>" rel="stylesheet">
    
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Manajemen Borang</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">
                    Manajemen Borang
                </li>
                <li class="breadcrumb-item active">
                    <strong>Setting Borang</strong>
                </li>
            </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Manajemen Borang</h5>
            </div>
            <div class="ibox-content">
                <form id="form" method="post" action="<?php echo base_url().'su/borang/act_edit_jenis_borang'?>" class="wizard-big">
                    <h1>Borang</h1>
                        <fieldset>
                            <h2>Informasi Borang</h2>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Nama Borang *</label>
                                        <input type="hidden" value="<?=$jenis_borang['id_jenis_borang']?>" name="id_jenis_borang" class="form-control" > 
                                        <input name="jenis_borang" type="text" placeholder="Nama Borang" value="<?php echo $jenis_borang['jenis_borang']?>" class="form-control required">
                                        <small class="text-success">*) nama tampilan</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Audit *</label>
                                        <select class="form-control" name="jenis_audit_id">
                                            <option value="">- Jenis Audit -</option>
                                            <?php foreach($jenis_audit->result() as $jenis):?>
                                            <option  value="<?php echo $jenis->id_jenis_audit?>"><?php echo $jenis->jenis_audit ?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun *</label>
                                        <input id="confirm" name="tahun" type="number" class="form-control required" value="<?php echo $jenis_borang['tahun']?>" placeholder="Tahun">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <div style="margin-top: 20px">
                                            <i class="fa fa-newspaper-o" style="font-size: 180px;color: #e5e5e5 "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <h1>Lanjutan</h1>
                        <fieldset>
                            <p>Form ini seperti kop pada borang yang ada di Microsoft Excel</p>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Judul Borang *</label>
                                        <input value="<?php echo $jenis_borang['judul_borang']?>" placeholder="Judul Borang" name="judul_borang" type="text" class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label>Area Borang *</label>
                                        <input value="<?php echo $jenis_borang['area_borang']?>" placeholder="Area Borang" name="area_borang" type="text" class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label>Kode *</label>
                                        <input value="<?php echo $jenis_borang['kode']?>" placeholder="Kode" name="kode" type="text" class="form-control required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Tanggal *</label>
                                        <input value="<?php echo $jenis_borang['tanggal']?>" placeholder="Tanggal" name="tanggal" type="text" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                    </div>
                                    <div class="form-group">
                                        <label>No. Revisi *</label>
                                        <input value="<?php echo $jenis_borang['no_revisi']?>" placeholder="No. Revisi" name="no_revisi" type="text" class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label>Status *</label>
                                        <select name="status" class="form-control">
                                            <option value="0">Tidak Digunakan</option>
                                            <option value="1">Digunakan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <div style="margin-top: 20px">
                                            <i class="fa fa-newspaper-o" style="font-size: 180px;color: #e5e5e5 "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <h1>Infotmasi Pembuatan Borang</h1>
                        <fieldset>
                            <h2>Informasi manajemen borang</h2>
                            <div class="row">
                                <div class="col-lg-8">
                                    <ul class="list-group clear-list m-t">
                                        <li class="list-group-item fist-item">
                                            Tombol <button class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></button> untuk melihat borang yang sudah di setting
                                        </li>
                                        <li class="list-group-item">
                                            Tombol <button class="btn btn-xs btn-warning"><i class="fa fa-cog"></i></button> untuk mengatur borang seperti manajemen Aspek Penilaian dan menambahkan Pertanyaan yang akan digunakan unutk mengaudit.
                                        </li>
                                        <li class="list-group-item">
                                            Tombol <button class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></button> untuk mengedit borang
                                        </li>
                                        <li class="list-group-item">
                                            Tampilan disamping akan muncul setalah proses ini di submit
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <div style="margin-top: 20px">
                                        <div class="file-box">
                                            <div class="file">
                                                <a href="#">
                                                <span class="corner"></span>
                                                    <div class="icon">
                                                        <i class="fa fa-file-excel-o"></i>
                                                    </div>
                                                    <div class="file-name">
                                                        Borang Matkul 2019
                                                        <br/>
                                                        <button class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></button>
                                                        <button class="btn btn-xs btn-warning"><i class="fa fa-cog"></i></button>
                                                        <button class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></button>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <h1>Finish</h1>
                        <fieldset>
                            <h2>Terms and Conditions</h2>
                                <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url("assets/js/plugins/steps/jquery.steps.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/plugins/validate/jquery.validate.min.js");?>"></script>

<script>
$(document).ready(function(){
    $("#wizard").steps();
        $("#form").steps({
            bodyTag       : "fieldset",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex)
                {
                    return true;
                }

                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18)
                {
                    return false;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }
                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18)
                {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3)
                {
                    $(this).steps("previous");
                }
            },
            onFinishing: function (event, currentIndex)
            {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },

            onFinished: function (event, currentIndex)
            {
                var form = $(this);

                // Submit form input
                form.submit();
            }
        });
    });
</script>