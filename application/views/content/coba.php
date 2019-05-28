<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SiMAMI | LP3M</title>

    <link href="<?php echo base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/font-awesome/css/font-awesome.css");?>" rel="stylesheet">

    <link href="<?php echo base_url("assets/css/animate.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/style.css");?>" rel="stylesheet">

    <link href="<?php echo base_url("assets/css/plugins/datapicker/datepicker3.css");?>" rel="stylesheet">

    <link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css");?>" rel="stylesheet">

    <link href="<?php echo base_url("assets/css/plugins/daterangepicker/daterangepicker-bs3.css");?>" rel="stylesheet">

    <link href="<?php echo base_url("assets/css/plugins/select2/select2.min.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/plugins/chosen/bootstrap-chosen.css");?>" rel="stylesheet">

    <link href="<?php echo base_url("assets/css/plugins/footable/footable.core.css");?>" rel="stylesheet">  
    
    <link href="<?php echo base_url("assets/css/plugins/steps/jquery.steps.css");?>" rel="stylesheet">
    
    <link href="<?php echo base_url("assets/css/plugins/iCheck/custom.css");?>" rel="stylesheet">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?php echo base_url("assets/plugins/sweetalert2/dist/sweetalert2.all.min.css");?>">

</head>

<body>

<div id="wrapper">
<!-- main menu -->

            <!-- content -->
            <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Edit Data</h5>
                </div>
                <div class="ibox-content">
                    
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label"><b>Program Studi</b></label>
                            <div class="col-lg-10">
                                <input type="hidden" value="<?php echo $detail_user['id_tpm_prodi'] ?>" placeholder="Program Studi" class="form-control" disabled="true"> 
                                <input type="text" placeholder="Program Studi" class="form-control" disabled="true" value="<?php echo $detail_user['program_studi'] ?>"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label"><b>Nama</b></label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Nama" class="form-control" required> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label"><b>NIP</b></label>
                                <div class="col-lg-10">
                                    <input type="text" placeholder="NIP" class="form-control"  required> 
                                </div>
                        </div>
                                
                        <div class="modal-footer">
                                <a href="#"><button type="button" class="btn btn-danger">Batal</button></a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>


            <!-- end content -->


    

        </div>
</div>


    <!-- Mainly scripts -->
    <script src="<?php echo base_url("assets/js/jquery-3.1.1.min.js");?>"></script>

    <script src="<?php echo base_url("assets/js/bootstrap.js");?>"></script>

    <script src="<?php echo base_url("assets/js/plugins/metisMenu/jquery.metisMenu.js");?>"></script>
    <script src="<?php echo base_url("assets/js/plugins/slimscroll/jquery.slimscroll.min.js");?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url("assets/js/inspinia.js");?>"></script>
    <script src="<?php echo base_url("assets/js/plugins/pace/pace.min.js");?>"></script>

    <script src="<?php echo base_url("assets/js/plugins/dataTables/datatables.min.js");?>"></script>
    <script src="<?php echo base_url("assets/js/plugins/dataTables/dataTables.bootstrap4.min.js");?>"></script>

    <script src="<?php echo base_url("assets/js/my-script.js");?>"></script>

    <script src="<?php echo base_url("assets/js/plugins/datapicker/bootstrap-datepicker.js");?>"></script>

    <script src="<?php echo base_url("assets/js/plugins/chosen/chosen.jquery.js");?>"></script>
    <script src="<?php echo base_url("assets/js/plugins/select2/select2.full.min.js");?>"></script>

    <script src="<?php echo base_url("assets/js/plugins/footable/footable.all.min.js");?>"></script> 

    <script src="<?php echo base_url("assets/js/plugins/steps/jquery.steps.min.js");?>"></script>
    <!-- <script src="<?php echo base_url("assets/js/plugins/sweetalert/sweetalert.min.js");?>"></script> -->
    <script src="<?php echo base_url("assets/plugins/sweetalert2/dist/sweetalert2.all.min.js");?>"></script>
    <script>
        var base_url = '<?php echo base_url() ?>';
    </script>
    <script>$('.chosen-select').chosen({width: "100%"});</script>
   
</body>


</html>
