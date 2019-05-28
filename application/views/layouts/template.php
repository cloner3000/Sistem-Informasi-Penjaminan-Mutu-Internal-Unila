<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- =========================
    Meta Information
    ============================== -->
    <meta name="description" content="Sistem Penjaminan Mutu Internal Unila">
    <meta name="keywords" content="Audit, Audit Internal, SPMI, Unila, ilmu Komputer">
    <meta name="author" content="Adji Pangestu">

    <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/unila.png");?>">
    <title>E-LP3M - Universitas Lampung</title>

    <link href="<?php echo base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/font-awesome/css/font-awesome.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/animate.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/style.css");?>" rel="stylesheet">

    <link href="<?php echo base_url("assets/css/plugins/datapicker/datepicker3.css");?>" rel="stylesheet">
    
    <link href="<?php echo base_url("assets/css/plugins/chosen/bootstrap-chosen.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/plugins/sweetalert2/dist/sweetalert2.min.css");?>" rel="stylesheet"/>

</head>

<body>
    <!-- script -->

    <!-- Mainly scripts -->
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('/assets/js/jquery-3.1.1.min.js');?>"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('/assets/js/popper.min.js');?>"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.js');?>"></script>

    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('/assets/js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('/assets/js/plugins/slimscroll/jquery.slimscroll.min.js');?>"></script>

    <!-- Custom and plugin javascript -->
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('assets/js/inspinia.js');?>"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('assets/js/plugins/pace/pace.min.js');?>"></script>

    <script language="JavaScript" type="text/javascript" src="<?php echo base_url("assets/js/plugins/datapicker/bootstrap-datepicker.js");?>"></script>
    
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url("assets/plugins/sweetalert2/dist/sweetalert2.all.js");?>"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url("assets/plugins/sweetalert2/dist/sweetalert2.min.js");?>"></script>

    <!-- endscript -->

    <div id="wrapper">
        <!-- main menu -->
        <?php $this->view('layouts/main_menu');?>
        <!-- end main menu -->
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <!-- header -->
                    <?php $this->view('layouts/header');?>
                    <!-- end header -->
                    </div>

                    <!-- content -->
                    <?php echo $contents?>
                    <!-- end content -->


                    <!-- footer -->
                    <?php $this->view('layouts/footer');?>
                    <!-- end footer -->

                </div>
            </div>
    </div>
</body>
</html>
